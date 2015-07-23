<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Camion controller
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * @filesource camion.php
 */

class Camion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('camion_model');
    }
    
    /**
     * get camions
     */
    public function index(){
        
        $data = array(
            'camions' => $this->camion_model->get_camions(),
            'title' => lang('TRUCKS_MANAGEMENT'),
            'active' => 'camion',
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('camion/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function view($id_camion = NULL){
        $data = array(
            'camion' => $this->camion_model->get_camions($id_camion),
            'title' => $lang['TRUCK_VIEW']
        );
        
    }
}
