<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
    public function index(){
        
        $data = array(
            'fournisseurs' => $this->fournisseur_model->get_fournisseurs(),
            'title' => lang('SUPPLIERS_MANAGEMENT'),
            'active' => 'fournisseur',
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('fournisseur/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function view($id_fournisseur = NULL){
        $data = array(
            'fournisseur' => $this->fournisseur_model->get_fournisseurs($id_fournisseur),
            'title' => $lang['SUPPLIER_VIEW']
        );
        
    }
}
