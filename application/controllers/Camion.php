<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Camion controller
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * @filesource camion.php
 */
class Camion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('camion_model');
    }

    /**
     * get trucks 
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error = FALSE)
    {

        $data = array(
            'trucks' => $this->camion_model->get_camions(),
            'title' => lang('TRUCKS_MANAGEMENT'),
            'msg' => $msg,
            'error' => $error,
            'form_link' => site_url('camion/edit')
        );

        $this->display($data, 'camion/index');
    }

    /**
     * Displays a form to add or edit a truck
     * 
     * @param int $id_camion truck id to modify
     */
    public function edit($id_camion = NULL)
    {

        $data = array(
            'title' => lang('ADD_TRUCK'),
            'form_action' => site_url('camion/save')
        );

        // preset data for modification form
        if ($id_camion !== NULL)
        {

            //get truck by id
            $truck = $this->camion_model->get_camions($id_camion);

            //merge row data with $data
            $data = array_merge_recursive($data, $truck);

            $data['title'] = lang('EDIT_TRUCK');
            $data['form_action'] = site_url('camion/update');
        }

        $this->load->view('camion/form', $data);
    }

    /**
     * builds inputs value in an array
     * @return array
     */
    private function get_inputs()
    {

        // get input values
        $number = str_replace(' ', '', strtoupper($this->input->post('numero')));

        $data = array('numero' => $number);

        return $data;
    }

    /**
     * Saves a truck
     */
    public function save()
    {
        //get inputs
        $data = $this->get_inputs();

        // save if the truck number doesn't exist
        if ($this->camion_model->save($data) !== FALSE)
        {
            redirect('camion/index/' . lang('SAVING_TRUCK_SUCCESS'));
        } else
        {
            redirect('camion/index/' . lang('TRUCK_EXISTS'). ': ' . $data['numero'].'/'.TRUE);
        }
    }

    /**
     * updates a truck
     */
    public function update()
    {
        //get inputs
        $data = $this->get_inputs();

        $id_camion = $this->input->post('id_camion');

        $where = array(Camion_model::$pk => $id_camion);

        // update
        if ($this->camion_model->update($data, $where) !== FALSE)
        {
            redirect('camion/index/' . lang('UPDATING_TRUCK_SUCCESS'));
        } else
        {
            redirect('camion/index/' . lang('UPDATING_FAILED').'/'.TRUE);
        }
    }

    /**
     * Deletes a truck
     * @param int $id_camion
     */
    public function delete($id_camion)
    {
        if ($this->camion_model->delete(array(Camion_model::$pk => $id_camion)) !== FALSE)
        {
            redirect('camion/index/' . lang('TRUCK_DELETION_SUCCESS'));
        } else
        {
            redirect('camion/index/' . lang('DELETING_FAILED').'/'.TRUE);
        }
    }

    /**
     * Render page
     * @param array $data
     * @param string $page concerning page
     */
    private function display($data, $page)
    {
        $data['active'] = 'camion';

        //checks admin session
        if (!$this->session->has_userdata('user'))
        {
            $data = array(
                'title' => lang('CONNECTION')
            );
            $page = 'connexion/index';
        }
        $this->load->view('templates/header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer');
    }

}
