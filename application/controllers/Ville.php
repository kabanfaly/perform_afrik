<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Ville controller
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * * @filesource ville.php
 */

class Ville extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ville_model');
    }
    
    /**
     * get cities
     */
    public function index(){
        
        $data = array(
            'villes' => $this->ville_model->get_villes(),
            'title' => lang('VILLE_MANAGEMENT')
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('ville/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function view($id_ville = NULL){
        $data = array(
            'ville' => $this->ville_model->get_villes($id_ville),
            'title' => $lang['VILLE_VIEW']
        );
        
    }
}
