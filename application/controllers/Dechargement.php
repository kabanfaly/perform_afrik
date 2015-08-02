<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Dechargement controller
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * * @filesource dechargement.php
 */
class Dechargement extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dechargement_model');
        $this->load->model('camion_model');
        $this->load->model('fournisseur_model');
    }

    /**
     * get dechargement (unloading)
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error = FALSE)
    {
        $data = array(
            'unloading' => $this->dechargement_model->get_dechargements(),
            'title' => lang('UNLOADING_MANAGEMENT'),
            'msg' => $msg,
            'error' => $error,
            'form_link' => site_url('dechargement/edit')
        );

        $this->display($data, 'dechargement/index');
    }

    /**
     * Displays a form to add or edit an unloading
     * 
     * @param int $id_dechargement unloading id to modify
     */
    public function edit($id_dechargement = NULL)
    {

        $data = array(
            'title' => lang('ADD_UNLOADING'),
            'form_action' => site_url('dechargement/save')
        );

        // preset data for modification form
        if ($id_dechargement !== NULL)
        {

            //get unloading by id
            $unloading = $this->dechargement_model->get_dechargements($id_dechargement);

            //merge row data with $data
            $data = array_merge_recursive($data, $unloading);

            $data['title'] = lang('EDIT_UNLOADING');
            $data['form_action'] = site_url('dechargement/update');
        }

        $this->load->view('dechargement/form', $data);
    }

    /**
     * Delete an unloading
     * @param int $id_dechargement
     */
    public function delete($id_dechargement)
    {
        if ($this->dechargement_model->delete(array(Dechargement_model::$pk => $id_dechargement)) !== FALSE)
        {
            $this->index(lang('UNLOADING_DELETION_SUCCESS'));
        } else
        {
            $this->index(lang('DELETING_FAILED'), TRUE);
        }
    }

    /**
     * builds inputs value in an array
     * @return array
     */
    private function get_inputs()
    {

        //TO DO
    }

    /**
     * Saves a city
     */
    public function save()
    {
        //TO DO
        $this->index();
    }

    /**
     * Updates a city
     */
    public function update()
    {
        //TO DO
        $this->index();
    }

    /**
     * Render page
     * @param array $data
     * @param string $page concerning page
     */
    private function display($data, $page)
    {
        $data['active'] = 'dechargement';

        //checks admin session
        if (!$this->session->has_userdata('admin'))
        {
            $data = array(
                'title' => lang('CONNECTION')
            );
            $page = 'connection/index';
        }
        $this->load->view('templates/header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer');
    }

}
