<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Ville controller
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * @filesource ville.php
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
    public function index()
    {

        $data = array(
            'cities' => $this->ville_model->get_villes(),
            'title' => lang('CITIES_MANAGEMENT')
        );

        $this->display($data, 'ville/index');
    }

    public function view($id_ville = NULL)
    {
        $data = array(
            'city' => $this->ville_model->get_villes($id_ville),
            'title' => $lang['CITY_VIEW']
        );
        
        $this->display($data, 'ville/index');
    }
   
    /**
     * Render page
     * @param array $data
     * @param string $page concerning page
     */
    private function display($data, $page)
    {
        $data['active'] = 'ville';
        $this->load->view('templates/header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer');
    }

}
