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
 * @filesource dechargement.php
 */

include_once 'Common_Controller.php';

class Dechargement extends Common_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dechargement_model');
        $this->load->model('camion_model');
        $this->load->model('fournisseur_model');
        $this->load->model('ville_model');
    }

    /**
     * get dechargement (unloading)
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error = FALSE)
    {
        $data = array(
            'unloadings' => $this->dechargement_model->get_dechargements(),
            'title' => lang('UNLOADING_MANAGEMENT'),
            'msg' => $msg,
            'error' => $error,
            'active' => 'dechargement',
            'form_link' => site_url('dechargement/edit')
        );

        if ($data['unloadings'] !== NULL)
        {
            foreach ($data['unloadings'] as &$unloading)
            {
                $trucks = $this->camion_model->get_camions($unloading['id_camion']);
                $suppliers = $this->fournisseur_model->get_fournisseurs($unloading['id_fournisseur']);
                $cities = $this->ville_model->get_villes($unloading['id_ville']);
                $unloading['camion'] = $trucks['numero'];
                $unloading['fournisseur'] = $suppliers['nom'];
                $unloading['ville'] = $cities['nom'];
                $unloading['date'] = $this->mk_app_date($unloading['date']);
            }
        }

        $this->display($data, 'dechargement/index');
    }

    /**
     * Displays a form to add or edit an unloading
     * 
     * @param int $id_dechargement unloading id to modify
     */
    public function edit($id_dechargement = NULL)
    {

        $data = array(
            'title' => lang('ADD_UNLOADING'),
            'form_action' => site_url('dechargement/save'),
            'form_name' => 'dechargement',
            'trucks' => $this->camion_model->get_camions(),
            'suppliers' => $this->fournisseur_model->get_fournisseurs(),
            'cities' => $this->ville_model->get_villes()
        );
        // preset data for modification form
        if ($id_dechargement !== NULL)
        {
            
            //get unloading by id
            $unloading = $this->dechargement_model->get_dechargements($id_dechargement);

            //merge row data with $data
            $data = array_merge_recursive($data, $unloading);

            $data['title'] = lang('EDIT_UNLOADING');
            $data['form_action'] = site_url('dechargement/update');
            $data['date'] = $this->mk_app_date($data['date']);
        }
        
        $this->load->view('templates/form_header', $data);
        $this->load->view('dechargement/form', $data);
        $this->load->view('templates/form_footer', $data);
    }

    /**
     * Delete an unloading
     * @param int $id_dechargement
     */
    public function delete($id_dechargement)
    {
        if ($this->dechargement_model->delete(array(Dechargement_model::$PK => $id_dechargement)) !== FALSE)
        {
            redirect('dechargement/index/' . lang('UNLOADING_DELETION_SUCCESS'));
        } else
        {
            redirect('dechargement/index/' . lang('DELETION_FAILED') . '/' . TRUE);
        }
    }

    /**
     * Converts application date format (dd/mm/YYYY) to db date format (YYYY-mm-dd)
     * @param string $date
     */
    private function mk_db_date($date){
        
        //application date format is dd/mm/YYYY
        
        $explode_date = explode('/', $date);
        return "{$explode_date[2]}-{$explode_date[1]}-{$explode_date[0]}";
        
    }
    /**
     * Converts bd date format (YYYY-mm-dd) to application date format (dd/mm/YYYY)
     * @param string $date
     */
    private function mk_app_date($date){
        
        $explode_date = explode('-', $date);
        return "{$explode_date[2]}/{$explode_date[1]}/{$explode_date[0]}";
        
    }
    /**
     * builds inputs value in an array
     * @return array
     */
    private function get_inputs()
    {

        // get input values
        $id_camion = $this->input->post('id_camion');
        $id_fournisseur = $this->input->post('id_fournisseur');
        $id_ville = $this->input->post('id_ville');
        
        $date = $this->mk_db_date($this->input->post('date'));        
        $good_bag = trim($this->input->post('bon_sac'));
        $torn_bag = trim($this->input->post('sac_dechire'));
        $gross_weight = trim($this->input->post('poids_brut'));
        $net_weight = trim($this->input->post('poids_net'));
        $humidity = trim($this->input->post('humidite'));
        $refracted_weight = trim($this->input->post('poids_refracte'));
        $total_bag = intval($good_bag) + intval($torn_bag);
        
        //$refracted_weight = $this->compute_refracted($good_bag, $torn_bag, $net_weight);

        $data = array('id_camion' => $id_camion, 'id_ville' => $id_ville, 'id_fournisseur' => $id_fournisseur,
            'date' => $date, 'bon_sac' => $good_bag, 'sac_dechire' => $torn_bag, 'sac_total' => $total_bag,
            'poids_brut' => $gross_weight, 'poids_net' => $net_weight, 'poids_refracte' => $refracted_weight, 'humidite' => $humidity);

        return $data;
    }

    /**
     * 
     * @param float $good_bag
     * @param float $torn_bag
     * @param float $net_weight
     * @return float
     */
    private function compute_refracted($good_bag, $torn_bag, $net_weight)
    {

        return abs(($good_bag + $torn_bag * 8) - $net_weight);
    }

    /**
     * Saves an unloading
     */
    public function save()
    {
        //get inputs
        $data = $this->get_inputs();

        // save unloading
        if ($this->dechargement_model->save($data) !== FALSE)
        {
            redirect('dechargement/index/' . lang('SAVING_UNLOADING_SUCCESS'));
        } else
        {
            redirect('dechargement/index/' . lang('SAVING_UNLOADING_FAILES') . '/' . TRUE);
        }
    }

    /**
     * Updates an unloading
     */
    public function update()
    {
        // get input values
        $data = $this->get_inputs();
        
        $id_dechargement = $this->input->post('id_dechargement');

        $where = array(Dechargement_model::$PK => $id_dechargement);
        
        // update
        if ($this->dechargement_model->update($data, $where) !== FALSE)
        {
            redirect('dechargement/index/' . lang('UPDATING_UNLOADING_SUCCESS'));
        } else
        {
            redirect('dechargement/index/' . lang('UPDATING_FAILED') . '/' . TRUE);
        }
    }

}
