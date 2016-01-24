<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Magasin controller
 *
 * @author Kaba N'faly
 * @since 24/01/16
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * @filesource magasin.php
 */
include_once 'Common_Controller.php';

class Magasin extends Common_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('magasin_model');
    }

    /**
     * get shops
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error = FALSE)
    {
        $data = array(
            'shops' => $this->magasin_model->get_magasins(),
            'title' => lang('SHOPS_MANAGEMENT'),
            'msg' => $msg,
            'error' => $error,
            'active' => 'magasin',
            'form_link' => site_url('magasin/edit')
        );

        $this->display($data, 'magasin/index');
    }

    /**
     * Displays a form to add or edit a shop
     * 
     * @param int $id_magasin shop id to modify
     */
    public function edit($id_magasin = NULL)
    {

        $data = array(
            'title' => lang('ADD_SHOP'),
            'form_name' => 'magasin',
            'form_action' => site_url('magasin/save')
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
            if ($id_magasin !== NULL)
            {

                //get shop by id
                $shop = $this->magasin_model->get_magasins($id_magasin);

                //merge row data with $data
                $data = array_merge_recursive($data, $shop);

                $data['title'] = lang('EDIT_SHOP');
                $data['form_action'] = site_url('magasin/update');
            }

            $this->load->view('templates/form_header', $data);
            $this->load->view('magasin/form', $data);
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
        $name = trim(ucfirst(strtolower($this->input->post('nom'))));

        $data = array('nom' => $name);

        return $data;
    }

    /**
     * Saves a shop
     */
    public function save()
    {
        //checks session
        if ($this->connected())
        {
            //get inputs
            $data = $this->get_inputs();

            // save if the shop number doesn't exist
            if ($this->magasin_model->save($data) !== FALSE)
            {
                redirect('magasin/index/' . lang('SAVING_SHOP_SUCCESS'));
            } else
            {
                redirect('magasin/index/' . lang('SHOP_EXISTS') . ': ' . $data['nom'] . '/' . TRUE);
            }
        }
    }

    /**
     * Updates a shop
     */
    public function update()
    {
        //checks session
        if ($this->connected())
        {
            // get input values
            $data = $this->get_inputs();

            $id_magasin = $this->input->post('id_magasin');

            $where = array(Magasin_model::$PK => $id_magasin);

            // update
            if ($this->magasin_model->update($data, $where) !== FALSE)
            {
                redirect('magasin/index/' . lang('UPDATING_SHOP_SUCCESS'));
            } else
            {
                redirect('magasin/index/' . lang('UPDATING_FAILED') . '/' . TRUE);
            }
        }
    }

    /**
     * Delete a shop
     * @param int $id_magasin
     */
    public function delete($id_magasin)
    {
        //checks session
        if ($this->connected())
        {
            if ($this->magasin_model->delete(array(Magasin_model::$PK => $id_magasin)) !== FALSE)
            {
                redirect('magasin/index/' . lang('SHOP_DELETION_SUCCESS'));
            } else
            {
                redirect('magasin/index/' . lang('DELETION_FAILED') . '/' . TRUE);
            }
        }
    }

}
