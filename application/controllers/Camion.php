<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
    public function index()
    {

        $data = array(
            'trucks' => $this->camion_model->get_camions(),
            'title' => lang('TRUCKS_MANAGEMENT')
        );

        $this->display($data, 'camion/index');
    }

    public function view($id_camion = NULL)
    {
        $data = array(
            'truck' => $this->camion_model->get_camions($id_camion),
            'title' => $lang['TRUCK_VIEW']
        );

        $this->display($data, 'camion/index');
    }

    /**
     * Render page
     * @param array $data
     * @param string $page concerning page
     */
    private function display($data, $page)
    {
        $data['active'] = 'camion';
        
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
