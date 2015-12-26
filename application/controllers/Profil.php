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
            'form_link' => site_url('profil/edit')
        );

        $this->display($data, 'profil/index');
    }

    /**
     * Displays a form to add or edit a profil
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
     * Saves a profil
     */
    public function save()
    {
        //get inputs
        $data = $this->get_inputs();

        // save if the profil number doesn't exist
        if ($this->profil_model->save($data) !== FALSE)
        {
            redirect('profil/index/' . lang('SAVING_PROFILE_SUCCESS'));
        } else
        {
            redirect('profil/index/' . lang('PROFILE_EXISTS'). ': ' . $data['nom'].'/'.TRUE);
        }
    }

    /**
     * Updates a profil
     */
    public function update()
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
            redirect('profil/index/' . lang('UPDATING_FAILED').'/'.TRUE);
        }
    }

    /**
     * Delete a profil
     * @param int $id_profil
     */
    public function delete($id_profil)
    {
        if ($this->profil_model->delete(array(Profil_model::$PK => $id_profil)) !== FALSE)
        {
            redirect('profil/index/' . lang('PROFILE_DELETION_SUCCESS'));
        } else
        {
            redirect('profil/index/' . lang('DELETION_FAILED').'/'.TRUE);
        }
    }
}
