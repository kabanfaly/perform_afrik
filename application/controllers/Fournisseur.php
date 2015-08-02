<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Fournisseur controller
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * * @filesource fournisseur.php
 */
class Fournisseur extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('fournisseur_model');
    }

    /**
     * get fournisseurs (suppliers)
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error = FALSE)
    {

        $data = array(
            'suppliers' => $this->fournisseur_model->get_fournisseurs(),
            'title' => lang('SUPPLIERS_MANAGEMENT'),
            'msg' => $msg,
            'error' => $error,
            'form_link' => site_url('fournisseur/edit')
        );

        $this->display($data, 'fournisseur/index');
    }

    /**
     * Displays a form to add or edit a supplier
     * 
     * @param int $id_fournisseur truck id to modify
     */
    public function edit($id_fournisseur = NULL)
    {

        $data = array(
            'title' => lang('ADD_SUPPLIER'),
            'form_action' => site_url('fournisseur/save')
        );

        // preset data for modification form
        if ($id_fournisseur !== NULL)
        {

            //get truck by id
            $supplier = $this->fournisseur_model->get_fournisseurs($id_fournisseur);

            //merge row data with $data
            $data = array_merge_recursive($data, $supplier);

            $data['title'] = lang('EDIT_SUPPLIER');
            $data['form_action'] = site_url('fournisseur/update');
        }

        $this->load->view('fournisseur/form', $data);
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

        $data = array('nom' => $name, 'telephone' => $phone, 'adresse' => $address);

        return $data;
    }

    /**
     * Saves a supplier
     */
    public function save()
    {
        //get inputs
        $data = $this->get_inputs();

        // save if the supplier number doesn't exist
        if ($this->fournisseur_model->save($data) !== FALSE)
        {
            redirect('fournisseur/index/' . lang('SAVING_SUPPLIER_SUCCESS'));
        } else
        {
            redirect('fournisseur/index/' . lang('SUPPLIER_EXISTS'). ': ' . $data['nom'].'/'.TRUE);
        }
    }

    /**
     * Updates a supplier
     */
    public function update()
    {
        // get input values
        $data = $this->get_inputs();

        $id_fournisseur = $this->input->post('id_fournisseur');

        $where = array(Fournisseur_model::$pk => $id_fournisseur);

        // update
        if ($this->fournisseur_model->update($data, $where) !== FALSE)
        {
            redirect('fournisseur/index/' . lang('UPDATING_SUPPLIER_SUCCESS'));
        } else
        {
            redirect('fournisseur/index/' . lang('UPDATING_FAILED').'/'.TRUE);
        }
    }

    /**
     * Deletes a supplier
     * @param int $id_fournisseur
     */
    public function delete($id_fournisseur)
    {
        if ($this->fournisseur_model->delete(array(Fournisseur_model::$pk => $id_fournisseur)) !== FALSE)
        {
            redirect('fournisseur/index/' . lang('SUPPLIER_DELETION_SUCCESS'));
        } else
        {
            redirect('fournisseur/index/' . lang('DELETING_FAILED').'/'.TRUE);
        }
    }

    /**
     * Render page
     * @param array $data
     * @param string $page concerning page
     */
    private function display($data, $page)
    {
        $data['active'] = 'fournisseur';

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
