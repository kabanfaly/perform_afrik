<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Client controller
 *
 * @author Kaba N'faly
 * @since 01/24/17
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * @filesource client.php
 */
include_once 'Common_Controller.php';

class Client extends Common_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('client_model');
    }

    /**
     * get clients (customers)
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error = FALSE)
    {

        $data = array(
            'customers' => $this->client_model->get_clients(),
            'title' => lang('CUSTOMERS_MANAGEMENT'),
            'msg' => $msg,
            'error' => $error,
            'active' => 'client',
            'form_link' => site_url('client/edit')
        );

        $this->display($data, 'client/index');
    }

    /**
     * Displays a form to add or edit a customer
     * 
     * @param int $id_client customer id to modify
     */
    public function edit($id_client = NULL)
    {

        $data = array(
            'title' => lang('ADD_CUSTOMER'),
            'form_name' => 'client',
            'form_action' => site_url('client/save')
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
            if ($id_client !== NULL)
            {

                //get truck by id
                $customer = $this->client_model->get_clients($id_client);
                
                //merge row data with $data
                $data = array_merge_recursive($data, $customer);

                $data['title'] = lang('EDIT_CUSTOMER');
                $data['form_action'] = site_url('client/update');
            }

            $this->load->view('templates/form_header', $data);
            $this->load->view('client/form', $data);
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
     * Saves a customer
     */
    public function save()
    {
        //checks session
        if ($this->connected())
        {
            //get inputs
            $data = $this->get_inputs();
            
            if ($this->client_model->save($data) !== FALSE)
            {
                redirect('client/index/' . lang('SAVING_CUSTOMER_SUCCESS'));
            } else
            {
                redirect('client/index/' . lang('CUSTOMER_EXISTS') . ': ' . $data['nom'] . '/' . TRUE);
            }
        }
    }

    /**
     * Updates a customer
     */
    public function update()
    {
        //checks session
        if ($this->connected())
        {
            // get input values
            $data = $this->get_inputs();

            $id_client = $this->input->post('id_client');

            $where = array(Client_model::$PK => $id_client);

            // update
            if ($this->client_model->update($data, $where) !== FALSE)
            {
                redirect('client/index/' . lang('UPDATING_CUSTOMER_SUCCESS'));
            } else
            {
                redirect('client/index/' . lang('UPDATING_FAILED') . '/' . TRUE);
            }
        }
    }

    /**
     * Deletes a customer
     * @param int $id_client
     */
    public function delete($id_client)
    {
        //checks session
        if ($this->connected())
        {
            if ($this->client_model->delete(array(Client_model::$PK => $id_client)) !== FALSE)
            {
                redirect('client/index/' . lang('CUSTOMER_DELETION_SUCCESS'));
            } else
            {
                redirect('client/index/' . lang('DELETION_FAILED') . '/' . TRUE);
            }
        }
    }

}
