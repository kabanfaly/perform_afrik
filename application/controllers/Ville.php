<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Ville controller
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * @filesource ville.php
 */
class Ville extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ville_model');
    }

    /**
     * get cities
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error = FALSE)
    {
        $data = array(
            'cities' => $this->ville_model->get_villes(),
            'title' => lang('CITIES_MANAGEMENT'),
            'msg' => $msg,
            'error' => $error,
            'form_link' => site_url('ville/edit')
        );

        $this->display($data, 'ville/index');
    }

    /**
     * Displays a form to add or edit a city
     * 
     * @param int $id_ville city id to modify
     */
    public function edit($id_ville = NULL)
    {

        $data = array(
            'title' => lang('ADD_CITY'),
            'form_action' => site_url('ville/save')
        );

        // preset data for modification form
        if ($id_ville !== NULL)
        {

            //get city by id
            $city = $this->ville_model->get_villes($id_ville);

            //merge row data with $data
            $data = array_merge_recursive($data, $city);

            $data['title'] = lang('EDIT_CITY');
            $data['form_action'] = site_url('ville/update');
        }

        $this->load->view('ville/form', $data);
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
     * Saves a city
     */
    public function save()
    {
        //get inputs
        $data = $this->get_inputs();

        // save if the city number doesn't exist
        if ($this->ville_model->save($data) !== FALSE)
        {
            redirect('ville/index/' . lang('SAVING_CITY_SUCCESS'));
        } else
        {
            redirect('ville/index/' . lang('CITY_EXISTS'). ': ' . $data['nom'].'/'.TRUE);
        }
    }

    /**
     * Updates a city
     */
    public function update()
    {
        // get input values
        $data = $this->get_inputs();

        $id_ville = $this->input->post('id_ville');

        $where = array(Ville_model::$pk => $id_ville);

        // update
        if ($this->ville_model->update($data, $where) !== FALSE)
        {
            redirect('ville/index/' . lang('UPDATING_CITY_SUCCESS'));
        } else
        {
            redirect('ville/index/' . lang('UPDATING_FAILED').'/'.TRUE);
        }
    }

    /**
     * Delete a city
     * @param int $id_ville
     */
    public function delete($id_ville)
    {
        if ($this->ville_model->delete(array(Ville_model::$pk => $id_ville)) !== FALSE)
        {
            redirect('ville/index/' . lang('CITY_DELETION_SUCCESS'));
        } else
        {
            redirect('ville/index/' . lang('DELETING_FAILED').'/'.TRUE);
        }
    }

    /**
     * Render page
     * @param array $data
     * @param string $page concerning page
     */
    private function display($data, $page)
    {
        $data['active'] = 'ville';

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
