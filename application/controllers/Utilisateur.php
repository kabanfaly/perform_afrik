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

    /**
     * builds inputs value in an array
     * @return array
     */
    private function get_inputs()
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
            redirect('utilisateur/index/' . lang('USER_EXISTS'). ': ' . $data['nom'].'/'.TRUE);
        }
    }

    /**
     * Updates a user
     */
    public function update()
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
            redirect('utilisateur/index/' . lang('UPDATING_FAILED').'/'.TRUE);
        }
    }

    /**
     * Delete a utilisateur
     * @param int $id_utilisateur
     */
    public function delete($id_utilisateur)
    {
        if ($this->utilisateur_model->delete(array(Utilisateur_model::$PK => $id_utilisateur)) !== FALSE)
        {
            redirect('utilisateur/index/' . lang('USER_DELETION_SUCCESS'));
        } else
        {
            redirect('utilisateur/index/' . lang('DELETION_FAILED').'/'.TRUE);
        }
    }
}
