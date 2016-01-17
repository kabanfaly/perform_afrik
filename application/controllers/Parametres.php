<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Ville controller
 *
 * @author Kaba N'faly
 * @since 26/12/2015
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * @filesource Parametres.php
 */
include_once 'Common_Controller.php';

class Parametres extends Common_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('preference_model');
    }

    /**
     * Displays parameters
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error = FALSE)
    {
        $data = array(
            'title' => lang('PARAMETERS'),
            'msg' => $msg,
            'error' => $error,
            'active' => 'parametres',
            'configuration' => TRUE,
            'form_action' => site_url('parametres/update')
        );

        $this->display($data, 'parametres/index');
    }

    /**
     * Saves a city
     */
    public function update()
    {
        //checks session
        if ($this->connected())
        {
            //get inputs
            $company = trim($this->input->post('COMPANY'));
            $phone = trim($this->input->post('PHONE'));
            $fax = trim($this->input->post('FAX'));
            $email = trim($this->input->post('EMAIL'));
            $address = trim($this->input->post('ADDRESS'));

            // build parameters array
            $parameters = array('COMPANY' => $company, 'PHONE' => $phone, 'FAX' => $fax, 'EMAIL' => $email, 'ADDRESS' => $address);

            $data = array('valeur' => json_encode($parameters));

            // save if the city number doesn't exist
            if ($this->preference_model->update_parameters($data) !== FALSE)
            {
                $this->session->set_userdata('parameters', $parameters);
                redirect('parametres/index/' . lang('SAVING_PARAMETERS_SUCCESS'));
            }
        }
    }

}
