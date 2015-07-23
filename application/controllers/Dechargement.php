<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Dechargement controller
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * * @filesource dechargement.php
 */

class Dechargement extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dechargement_model');
    }
    
    /**
     * get dechargement (unloading)
     */
    public function index(){
        
        $data = array(
            'dechargements' => $this->dechargement_model->get_dechargements(),
            'title' => lang('UNLOADING_MANAGEMENT'),
            'active' => 'dechargement',
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('dechargement/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function view($id_dechargement = NULL){
        $data = array(
            'dechargement' => $this->dechargement_model->get_dechargements($id_dechargement),
            'title' => $lang['UNLOADING_VIEW']
        );
        
    }
}
