<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Utilisateur controller
 *
 * @author Kaba N'faly
 * @since 04/01/2016
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * @filesource utilisateur.php
 */
include_once 'Common_Controller.php';

class Utilisateur extends Common_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('utilisateur_model');
        $this->load->model('profil_model');
    }

    /**
     * get users
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error = FALSE)
    {

        $data = array(
            'users' => $this->utilisateur_model->get_users(),
            'title' => lang('USERS_MANAGEMENT'),
            'msg' => $msg,
            'error' => $error,
            'active' => 'utilisateur',
            'form_link' => site_url('utilisateur/edit')
        );

        $this->display($data, 'utilisateur/index');
    }

    /**
     * Displays a form to add or edit a user
     * 
     * @param int $id_utilisateur user id to modify
     */
    public function edit($id_utilisateur = NULL)
    {

        $data = array(
            'title' => lang('ADD_USER'),
            'form_name' => 'utilisateur',
            'profiles' => $this->profil_model->get_profiles(),
            'form_action' => site_url('utilisateur/save')
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
            if ($id_utilisateur !== NULL)
            {

                //get utilisateur by id
                $utilisateur = $this->utilisateur_model->get_users($id_utilisateur);

                //merge row data with $data
                $data = array_merge_recursive($data, $utilisateur);

                $data['title'] = lang('EDIT_USER');
                $data['form_action'] = site_url('utilisateur/update');
            }
            $this->load->view('templates/form_header', $data);
            $this->load->view('utilisateur/form', $data);
            $this->load->view('templates/form_footer', $data);
        }
    }

    /**
     * display user account page
     * @param type $id_utilisateur
     */
    public function my_account($id_utilisateur, $msg = '', $error = FALSE)
    {
        $data = array(
            'title' => lang('MY_PROFILE'),
            'form_name' => 'utilisateur',
            'active' => 'utilisateur',
            'configuration' => true,
            'profiles' => $this->profil_model->get_profiles(),
            'form_action' => site_url('utilisateur/save'),
            'msg' => $msg,
            'error' => $error
        );

        //checks admin session
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
            if ($id_utilisateur !== NULL)
            {

                //get utilisateur by id
                $utilisateur = $this->utilisateur_model->get_users($id_utilisateur);

                //merge row data with $data
                $data = array_merge_recursive($data, $utilisateur);

                $data['title'] = lang('MY_ACCOUNT');
                $data['form_action'] = site_url('utilisateur/update');
                $data['myaccount_username_change_form'] = site_url('utilisateur/update_name');
                $data['myaccount_login_change_form'] = site_url('utilisateur/update_login');
                $data['myaccount_password_change_form'] = site_url('utilisateur/update_password');
                $data['myaccount_profile_change_form'] = site_url('utilisateur/update_profile');
            }
            $this->load->view('templates/header', $data);
            $this->load->view('utilisateur/compte', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    /**
     * Update user name 
     */
    public function update_name()
    {
        //checks session
        if ($this->connected())
        {
            $data['nom'] = ucfirst(strtolower(trim($this->input->post('nom'))));
            $data['prenom'] = ucfirst(strtolower(trim($this->input->post('prenom'))));

            $id_utilisateur = $this->input->post('id_utilisateur');

            $this->update_user_info($id_utilisateur, $data, lang('UPDATING_USER_NAME_OK'));
        }
    }

    /**
     * Update user login 
     */
    public function update_login()
    {
        //checks session
        if ($this->connected())
        {
            $data['login'] = trim($this->input->post('login'));
            $data['mot_de_passe'] = $this->input->post('mot_de_passe');
            $id_utilisateur = $this->input->post('id_utilisateur');

            //check user password
            $utilisateur = $this->utilisateur_model->get_users($id_utilisateur);
            if ($utilisateur['mot_de_passe'] === $data['mot_de_passe'])
            {
                $this->update_user_info($id_utilisateur, $data, lang('UPDATING_USER_LOGIN_OK'));
            } else
            {
                redirect('utilisateur/my_account/' . $id_utilisateur . '/' . lang('WRONG_PASSWORD') . '/' . TRUE);
            }
        }
    }

    /**
     * Update user password 
     */
    public function update_password()
    {
        //checks session
        if ($this->connected())
        {
            $current_password = $this->input->post('mot_de_passe');
            $data['mot_de_passe'] = $this->input->post('new_mot_de_passe');
            $id_utilisateur = $this->input->post('id_utilisateur');

            //check user current password
            $utilisateur = $this->utilisateur_model->get_users($id_utilisateur);

            if ($utilisateur['mot_de_passe'] === $current_password)
            {
                $this->update_user_info($id_utilisateur, $data, lang('UPDATING_USER_PASSWORD_OK'));
            } else
            {
                redirect('utilisateur/my_account/' . $id_utilisateur . '/' . lang('WRONG_CURRENT_PASSWORD'). '/'. TRUE);
            }
        }
    }

    /**
     * Update user profile 
     */
    public function update_profile()
    {
        //checks session
        if ($this->connected())
        {
            $data['id_profil'] = $this->input->post('id_profil');
            $id_utilisateur = $this->input->post('id_utilisateur');

            $this->update_user_info($id_utilisateur, $data, lang('UPDATING_USER_PROFILE_OK'));
        }
    }

    /**
     * update user account info
     * @param int $id_utilisateur
     * @param array $data
     */
    public function update_user_info($id_utilisateur, $data, $msg='', $error=FALSE)
    {
        //checks session
        if ($this->connected())
        {

            $where = array(Utilisateur_model::$PK => $id_utilisateur);

            // update
            if ($this->utilisateur_model->update($data, $where) !== FALSE)
            {
                redirect('utilisateur/my_account/' . $id_utilisateur. '/' . $msg . '/'. $error);
            }
        }
    }

    /**
     * builds inputs value in an array
     * @return array
     */
    private function
    get_inputs()
    {

        // get input values
        $data['nom'] = ucfirst(strtolower(trim($this->input->post('nom'))));
        $data['prenom'] = ucfirst(strtolower(trim($this->input->post('prenom'))));
        $data['login'] = trim($this->input->post('login'));
        $data['mot_de_passe'] = $this->input->post('mot_de_passe');
        $data['id_profil'] = $this->input->post('id_profil');
        $data['statut'] = $this->input->post('statut');

        return $data;
    }

    /**
     * Saves a user
     */
    public function save()
    {
        //get inputs
        $data = $this->get_inputs();

        // save if the utilisateur number doesn't exist
        if ($this->utilisateur_model->save($data) !== FALSE)
        {
            redirect('utilisateur/index/' . lang('SAVING_USER_SUCCESS'));
        } else
        {
            redirect('utilisateur/index/' . lang('USER_EXISTS') . ': ' . $data['nom'] . '/' . TRUE);
        }
    }

    /**
     * Updates a user
     */
    public function update()
    {
        //checks session
        if ($this->connected())
        {
            // get input values
            $data = $this->get_inputs();

            $id_utilisateur = $this->input->post('id_utilisateur');

            $where = array(Utilisateur_model::$PK => $id_utilisateur);

            // update
            if ($this->utilisateur_model->update($data, $where) !== FALSE)
            {
                redirect('utilisateur/index/' . lang('UPDATING_USER_SUCCESS'));
            } else
            {
                redirect('utilisateur/index/' . lang('UPDATING_FAILED') . '/' . TRUE);
            }
        }
    }

    /**
     * Delete a utilisateur
     * @param int $id_utilisateur
     */
    public function delete($id_utilisateur)
    {
        //checks session
        if ($this->connected())
        {
            if ($this->utilisateur_model->delete(array(Utilisateur_model::$PK => $id_utilisateur)) !== FALSE)
            {
                redirect('utilisateur/index/' . lang('USER_DELETION_SUCCESS'));
            } else
            {
                redirect('utilisateur/index/' . lang('DELETION_FAILED') . '/' . TRUE);
            }
        }
    }

    /**
     * Change user status to either one
     * @param int $id_utilisateur user id
     * @param int $status new status
     */
    public function set_status($id_utilisateur, $status)
    {
        //checks session
        if ($this->connected())
        {
            $data = array('statut' => $status);
            $where = array(Utilisateur_model::$PK => $id_utilisateur);
            // set status
            $this->utilisateur_model->update($data, $where);

            redirect('utilisateur/index');
        }
    }

}
