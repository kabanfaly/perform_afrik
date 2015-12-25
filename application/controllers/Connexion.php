<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Connexion controller
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * @filesource Connexion.php
 */
class Connexion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('utilisateur_model');
    }

    /**
     * Displays connexion page
     */
    public function index()
    {

        $data = array(
            'title' => lang('CONNECTION')
        );

        $this->display($data, 'connexion/index');
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
        $user = $this->utilisateur_model->get_user_profile($login, $password);
        
        if ($user !== NULL)
        {
            $this->session->set_userdata('user', $user);
            redirect('dechargement/index');
        }else{
            $data['err_msg'] = lang('INVALID_LOGIN_PASSWORD');
            $this->display($data, 'connexion/index');
        }
    }

    /**
     * Log user out
     */
    public function logout()
    {
        $this->session->unset_userdata('user');
        $data = array(
            'title' => lang('CONNECTION'),
            'err_msg' => ''
        );

        $this->display($data, 'connexion/index');
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
