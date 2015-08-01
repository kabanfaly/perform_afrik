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
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error = FALSE)
    {
        $data = array(
            'cities' => $this->ville_model->get_villes(),
            'title' => lang('CITIES_MANAGEMENT'),
            'msg' => $msg,
            'error' => $error
        );

        $this->display($data, 'ville/index');
    }

    /**
     * Save a city
     */
    public function save()
    {
        // get city name
        $name = str_replace(' ', '', ucfirst(strtolower($this->input->post('nom'))));

        // save if the city number doesn't exist
        if ($this->ville_model->save(array('nom' => $name)) !== FALSE)
        {
            $this->index(lang('SAVING_CITY_SUCCESS'));
        } else
        {
            $this->index(lang('CITY_EXISTS') . ': ' . $name, TRUE);
        }
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
     * Delete a city
     * @param int $id_ville
     */
    public function delete($id_ville)
    {
        $this->ville_model->delete(array(Ville_model::$pk => $id_ville));
    }

    /**
     * Render page
     * @param array $data
     * @param string $page concerning page
     */
    private function display($data, $page)
    {
        $data['active'] = 'ville';

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
