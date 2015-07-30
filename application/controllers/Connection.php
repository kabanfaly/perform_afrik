<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Connection controller
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * @filesource Connection.php
 */
class Connection extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('connection_model');
    }

    /**
     * Displays connection page
     */
    public function index()
    {

        $data = array(
            'title' => lang('CONNECTION')
        );

        $this->display($data, 'connection/index');
    }

    /**
     * Log user in
     */
    public function login()
    {
        $data = array(
            'title' => lang('CONNECTION'),
            'err_msg' => ''
        );

        $login = $this->input->post('login');
        $password = $this->input->post('password');

        //get admin
        $admin = $this->connection_model->get_admin($login, $password);
        
        if ($admin !== NULL)
        {
            $this->session->set_userdata('admin', $admin);
            redirect('dechargement/index');
        }else{
            $data['err_msg'] = lang('INVALID_LOGIN_PASSWORD');
            $this->display($data, 'connection/index');
        }
    }

    /**
     * Log user out
     */
    public function logout()
    {
        $this->session->unset_userdata('admin');
        $data = array(
            'title' => lang('CONNECTION'),
            'err_msg' => ''
        );

        $this->display($data, 'connection/index');
    }

    /**
     * Render page
     * @param array $data
     * @param string $page concerning page
     */
    private function display($data, $page)
    {
        $data['active'] = 'dechargement';
        $this->load->view('templates/header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer');
    }

}
