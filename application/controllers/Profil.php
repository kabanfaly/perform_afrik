<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Profil controller
 *
 * @author Kaba N'faly
 * @since 25/12/2015
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * @filesource Profil.php
 */
include_once 'Common_Controller.php';

class Profil extends Common_Controller
{

    /**
     * Unloading (dechargement) table's columns on which restriction has to be done
     * @var array
     */
    public static $UNLOADING_COLUMNS_RIGHTS = array(
        "id_camion" => false,
        "id_magasin" => false,
        "id_ville" => false,
        "id_fournisseur" => false,
        "id_produit" => false,
        "date" => false,
        "bon_sac" => false,
        "sac_dechire" => false,
        "sac_total" => false,
        "poids_brut" => false,
        "poids_net" => false,
        "poids_refracte" => false,
        "humidite" => false,
        "qualite" => false,
        "prix" => false,
        "total" => false
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('profil_model');
    }

    /**
     * get profiles
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error = FALSE)
    {
        $data = array(
            'profiles' => $this->profil_model->get_profiles(),
            'title' => lang('PROFILES_MANAGEMENT'),
            'msg' => $msg,
            'error' => $error,
            'active' => 'profil',
            'form_link' => site_url('profil/edit'),
            'right_link' => site_url('profil/right'),
        );

        $this->display($data, 'profil/index');
    }

    /**
     * Displays a form to add or edit a profile
     * 
     * @param int $id_profil profil id to modify
     */
    public function edit($id_profil = NULL)
    {

        $data = array(
            'title' => lang('ADD_PROFILE'),
            'form_name' => 'profil',
            'form_action' => site_url('profil/save')
        );

        //checks session
        if (!$this->connected())
        {
            $data = array(
                'title' => lang('CONNECTION')
            );
            $this->load->view('templates/header', $data);
            $this->load->view('connexion/index', $data);
            $this->load->view('templates/footer');
        } else
        {
            // preset data for modification form
            if ($id_profil !== NULL)
            {

                //get profile by id
                $profile = $this->profil_model->get_profiles($id_profil);

                //merge row data with $data
                $data = array_merge_recursive($data, $profile);

                $data['title'] = lang('EDIT_PROFILE');
                $data['form_action'] = site_url('profil/update');
            }

            $this->load->view('templates/form_header', $data);
            $this->load->view('profil/form', $data);
            $this->load->view('templates/form_footer', $data);
        }
    }

    /**
     * retreive profile restrictions on unloading table
     * @param type $id_profil
     */
    public function right($id_profil)
    {
        $data = array(
            'title' => lang('EDIT_RIGHT'),
            'form_name' => 'right',
            'form_action' => site_url('profil/update_right')
        );

        //checks session
        if (!$this->connected())
        {
            $data = array(
                'title' => lang('CONNECTION')
            );
            $this->load->view('templates/header', $data);
            $this->load->view('connexion/index', $data);
            $this->load->view('templates/footer');
        } else
        {
            // Retreive profile's rights (restrictions)
            $profile = $this->profil_model->get_profiles($id_profil);
            
            //merge row data with $data
            $data = array_merge_recursive($data, $profile);

            if (empty($profile['droits_colonnes_dechargement']))
            {
                $data['unloading_columns_rights'] = self::$UNLOADING_COLUMNS_RIGHTS;
            } else
            {
                $profile_rights = json_decode($profile['droits_colonnes_dechargement'], TRUE);
                // merging columns 
                $data['unloading_columns_rights'] = array_merge(self::$UNLOADING_COLUMNS_RIGHTS, $profile_rights);
            }
            
        }
        $this->load->view('templates/form_header', $data);
        $this->load->view('profil/permission', $data);
        $this->load->view('templates/form_footer', $data);
    }

    /**
     * Update profile rights on unloading table's columns
     */
    public function update_right()
    {
        //checks session
        if ($this->connected())
        {
            $id_profil = $this->input->post('id_profil');

            // get authorized columns (checked)
            $authorized_columns = $this->input->post('authorized_columns');

            // get restrictions
            $profile_rights = self::$UNLOADING_COLUMNS_RIGHTS;

            // set to true authorized columns
            foreach ($authorized_columns as $ac)
            {
                $profile_rights[$ac] = TRUE;
            }

            $data['droits_colonnes_dechargement'] = json_encode($profile_rights);
            $where = array(Profil_model::$PK => $id_profil);

            // update
            if ($this->profil_model->update($data, $where) !== FALSE)
            {   
                //update current user's session
                $this->update_user_session();
                redirect('profil/index/' . lang('UPDATING_PROFILE_RIGHTS_SUCCESS'));
            } else
            {
                redirect('profil/index/' . lang('UPDATING_PROFILE_RIGHTS_FAILED') . '/' . TRUE);
            }
        }
    }

    /**
     * builds inputs value in an array
     * @return array
     */
    private function get_inputs()
    {

        // get input values
        $name = str_replace(' ', '', ucfirst(strtolower($this->input->post('nom'))));

        $data = array('nom' => $name);

        return $data;
    }

    /**
     * Saves a profile
     */
    public function save()
    {
        //checks session
        if ($this->connected())
        {
            //get inputs
            $data = $this->get_inputs();

            // save if the profil number doesn't exist
            if ($this->profil_model->save($data) !== FALSE)
            {
                redirect('profil/index/' . lang('SAVING_PROFILE_SUCCESS'));
            } else
            {
                redirect('profil/index/' . lang('PROFILE_EXISTS') . ': ' . $data['nom'] . '/' . TRUE);
            }
        }
    }

    /**
     * Updates a profile
     */
    public function update()
    {
        //checks session
        if ($this->connected())
        {
            // get input values
            $data = $this->get_inputs();

            $id_profil = $this->input->post('id_profil');

            $where = array(Profil_model::$PK => $id_profil);

            // update
            if ($this->profil_model->update($data, $where) !== FALSE)
            {
                redirect('profil/index/' . lang('UPDATING_PROFILE_SUCCESS'));
            } else
            {
                redirect('profil/index/' . lang('UPDATING_FAILED') . '/' . TRUE);
            }
        }
    }

    /**
     * Delete a profile
     * @param int $id_profil
     */
    public function delete($id_profil)
    {
        //checks session
        if ($this->connected())
        {
            if ($this->profil_model->delete(array(Profil_model::$PK => $id_profil)) !== FALSE)
            {
                redirect('profil/index/' . lang('PROFILE_DELETION_SUCCESS'));
            } else
            {
                redirect('profil/index/' . lang('DELETION_FAILED') . '/' . TRUE);
            }
        }
    }

}
