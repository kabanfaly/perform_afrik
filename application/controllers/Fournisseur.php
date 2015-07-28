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
     */
    public function index()
    {

        $data = array(
            'suppliers' => $this->fournisseur_model->get_fournisseurs(),
            'title' => lang('SUPPLIERS_MANAGEMENT')
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
