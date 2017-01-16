<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Produit controller
 *
 * @author Kaba N'faly
 * @since 28/12/16
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * @filesource produit.php
 */
include_once 'Common_Controller.php';

class Produit extends Common_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('produit_model');        
    }
    
     /**
     * Display all produits (products)
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error = FALSE)
    {
       
        $data = array(
            'produits' => $this->produit_model->get_produits(),
            'title' => lang('PRODUCTS_MANAGEMENT'),
            'msg' => $msg,
            'error' => $error,
            'active' => 'produit',
            'form_link' => site_url('produit/edit')
        );

        $this->display($data, 'produit/index');
    }
    
    /**
     * Displays a form to add or edit a supplier
     * 
     * @param int $id_produit product id to modify
     */
    public function edit($id_produit = NULL)
    {

        $data = array(
            'title' => lang('ADD_PRODUCT'),
            'form_name' => 'produit',
            'form_action' => site_url('produit/save')
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
            if ($id_produit !== NULL)
            {

                //get truck by id
                $supplier = $this->produit_model->get_produits($id_produit);

                //merge row data with $data
                $data = array_merge_recursive($data, $supplier);

                $data['title'] = lang('EDIT_PRODUCT');
                $data['form_action'] = site_url('produit/update');
            }

            $this->load->view('templates/form_header', $data);
            $this->load->view('produit/form', $data);
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

        $data = array('nom' => $name);

        return $data;
    }

    /**
     * Saves a supplier
     */
    public function save()
    {
        //checks session
        if ($this->connected())
        {
            //get inputs
            $data = $this->get_inputs();
            
            if ($this->produit_model->save($data) !== FALSE)
            {
                redirect('produit/index/' . lang('SAVING_PRODUCT_SUCCESS'));
            } else
            {
                redirect('produit/index/' . lang('PRODUCT_EXISTS') . ': ' . $data['nom'] . '/' . TRUE);
            }
        }
    }

    /**
     * Updates a supplier
     */
    public function update()
    {
        //checks session
        if ($this->connected())
        {
            // get input values
            $data = $this->get_inputs();

            $id_produit = $this->input->post('id_produit');

            $where = array(Produit_model::$PK => $id_produit);

            // update
            if ($this->produit_model->update($data, $where) !== FALSE)
            {
                redirect('produit/index/' . lang('UPDATING_PRODUCT_SUCCESS'));
            } else
            {
                redirect('produit/index/' . lang('UPDATING_FAILED') . '/' . TRUE);
            }
        }
    }

    /**
     * Deletes a supplier
     * @param int $id_produit
     */
    public function delete($id_produit)
    {
        //checks session
        if ($this->connected())
        {
            if ($this->produit_model->delete(array(Produit_model::$PK => $id_produit)) !== FALSE)
            {
                redirect('produit/index/' . lang('PRODUCT_DELETION_SUCCESS'));
            } else
            {
                redirect('produit/index/' . lang('DELETION_FAILED') . '/' . TRUE);
            }
        }
    }

}
