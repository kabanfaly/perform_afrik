<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Transporteur controller
 *
 * @author Kaba N'faly
 * @since 01/24/17
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * @filesource transporteur.php
 */
include_once 'Common_Controller.php';

class Transporteur extends Common_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('transporteur_model');
    }

    /**
     * get transporteurs (carriers)
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error = FALSE)
    {

        $data = array(
            'carriers' => $this->transporteur_model->get_transporteurs(),
            'title' => lang('CARRIERS_MANAGEMENT'),
            'msg' => $msg,
            'error' => $error,
            'active' => 'transporteur',
            'form_link' => site_url('transporteur/edit')
        );

        $this->display($data, 'transporteur/index');
    }

    /**
     * Displays a form to add or edit a carrier
     * 
     * @param int $id_transporteur carrier id to modify
     */
    public function edit($id_transporteur = NULL)
    {

        $data = array(
            'title' => lang('ADD_CARRIER'),
            'form_name' => 'transporteur',
            'form_action' => site_url('transporteur/save')
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
            if ($id_transporteur !== NULL)
            {

                //get truck by id
                $carrier = $this->transporteur_model->get_transporteurs($id_transporteur);
                
                //merge row data with $data
                $data = array_merge_recursive($data, $carrier);

                $data['title'] = lang('EDIT_CARRIER');
                $data['form_action'] = site_url('transporteur/update');
            }

            $this->load->view('templates/form_header', $data);
            $this->load->view('transporteur/form', $data);
            $this->load->view('templates/form_footer', $data);
        }
    }

    /**
     * builds inputs value in an array
     * @return array
     */
    private function get_inputs()
    {

        // get input values
        $name = trim(ucwords(strtolower($this->input->post('nom'))));
        $phone = trim($this->input->post('telephone'));
        $address = trim($this->input->post('adresse'));
        $country = trim($this->input->post('pays'));

        $data = array('nom' => $name, 'telephone' => $phone, 'adresse' => $address, 'pays' => $country);

        return $data;
    }

    /**
     * Saves a carrier
     */
    public function save()
    {
        //checks session
        if ($this->connected())
        {
            //get inputs
            $data = $this->get_inputs();
            
            if ($this->transporteur_model->save($data) !== FALSE)
            {
                redirect('transporteur/index/' . lang('SAVING_CARRIER_SUCCESS'));
            } else
            {
                redirect('transporteur/index/' . lang('CARRIER_EXISTS') . ': ' . $data['nom'] . '/' . TRUE);
            }
        }
    }

    /**
     * Updates a carrier
     */
    public function update()
    {
        //checks session
        if ($this->connected())
        {
            // get input values
            $data = $this->get_inputs();

            $id_transporteur = $this->input->post('id_transporteur');

            $where = array(Transporteur_model::$PK => $id_transporteur);

            // update
            if ($this->transporteur_model->update($data, $where) !== FALSE)
            {
                redirect('transporteur/index/' . lang('UPDATING_CARRIER_SUCCESS'));
            } else
            {
                redirect('transporteur/index/' . lang('UPDATING_FAILED') . '/' . TRUE);
            }
        }
    }

    /**
     * Deletes a carrier
     * @param int $id_transporteur
     */
    public function delete($id_transporteur)
    {
        //checks session
        if ($this->connected())
        {
            if ($this->transporteur_model->delete(array(Transporteur_model::$PK => $id_transporteur)) !== FALSE)
            {
                redirect('transporteur/index/' . lang('CARRIER_DELETION_SUCCESS'));
            } else
            {
                redirect('transporteur/index/' . lang('DELETION_FAILED') . '/' . TRUE);
            }
        }
    }

}
