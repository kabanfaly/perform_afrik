<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error=FALSE)
    {
        $data = array(
            'unloading' => $this->dechargement_model->get_dechargements(),
            'title' => lang('UNLOADING_MANAGEMENT'),
            'msg' => $msg,
            'error' => $error
        );

        $this->display($data, 'dechargement/index');
    }

    public function view($id_dechargement = NULL)
    {
        $data = array(
            'unload' => $this->dechargement_model->get_dechargements($id_dechargement),
            'title' => $lang['UNLOADING_VIEW']
        );

        $this->display($data, 'dechargement/index');
    }

    /**
     * Render page
     * @param array $data
     * @param string $page concerning page
     */
    private function display($data, $page)
    {
        $data['active'] = 'dechargement';
        
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
