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
            'error' => $error
        );

        $this->display($data, 'fournisseur/index');
    }

    public function view($id_fournisseur = NULL)
    {
        $data = array(
            'supplier' => $this->fournisseur_model->get_fournisseurs($id_fournisseur),
            'title' => $lang['SUPPLIER_VIEW']
        );
        $this->display($data, 'fournisseur/index');
    }

    /**
     * Save a supplier
     */
    public function save()
    {
        // get supplier name
        $name = trim(ucwords(strtolower($this->input->post('nom'))));

        // save if the supplier number doesn't exist
        if ($this->fournisseur_model->save(array('nom' => $name)) !== FALSE)
        {
            $this->index(lang('SAVING_SUPPLIER_SUCCESS'));
        } else
        {
            $this->index(lang('SUPPLIER_EXISTS') . ': ' . $name, TRUE);
        }
    }

    /**
     * Delete a supplier
     * @param int $id_fournisseur
     */
    public function delete($id_fournisseur)
    {
        $this->fournisseur_model->delete(array(Fournisseur_model::$pk => $id_fournisseur));
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
