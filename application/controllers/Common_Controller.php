<?php

/**
 * Description of Common
 *
 * @author kaba
 */
class Common_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    
     /**
     * Render page
     * @param array $data
     * @param string $page concerning page
     */
    public function display($data, $page)
    {
        //checks admin session
        if (!$this->session->has_userdata('user'))
        {
            $data = array(
                'title' => lang('CONNECTION')
            );
            $page = 'connexion/index';
        }

        $this->load->view('templates/header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer');
    }
}
