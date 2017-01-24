<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Transitaire controller
 *
 * @author Kaba N'faly
 * @since 01/24/17
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/controllers
 * @filesource transitaire.php
 */
include_once 'Common_Controller.php';

class Transitaire extends Common_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('transitaire_model');
    }

    /**
     * get transitaires (forwarding agents)
     * 
     * @param String $msg message to display
     * @param boolean $error if $msg is an error message
     */
    public function index($msg = '', $error = FALSE)
    {

        $data = array(
            'forwarding_agents' => $this->transitaire_model->get_transitaires(),
            'title' => lang('FORWARDING_AGENTS_MANAGEMENT'),
            'msg' => $msg,
            'error' => $error,
            'active' => 'transitaire',
            'form_link' => site_url('transitaire/edit')
        );

        $this->display($data, 'transitaire/index');
    }

    /**
     * Displays a form to add or edit a forwarding agent
     * 
     * @param int $id_transitaire forwarding agent id to modify
     */
    public function edit($id_transitaire = NULL)
    {

        $data = array(
            'title' => lang('ADD_FORWARDING_AGENT'),
            'form_name' => 'transitaire',
            'form_action' => site_url('transitaire/save')
        );

        //checks session
        if (!$this->connected())
        {
            $data = array(
                'title' => lang('CONNECTION')
            );
            $this->load->view('templates/header', $data);
            $this->load->view('connexion/index', $data);
            $this->load->view('templates/footer');
        } else
        {
            // preset data for modification form
            if ($id_transitaire !== NULL)
            {

                //get truck by id
                $forwarding_agent = $this->transitaire_model->get_transitaires($id_transitaire);

                //merge row data with $data
                $data = array_merge_recursive($data, $forwarding_agent);

                $data['title'] = lang('EDIT_FORWARDING_AGENT');
                $data['form_action'] = site_url('transitaire/update');
            }

            $this->load->view('templates/form_header', $data);
            $this->load->view('transitaire/form', $data);
            $this->load->view('templates/form_footer', $data);
        }
    }

    /**
     * builds inputs value in an array
     * @return array
     */
    private function get_inputs()
    {

        // get input values
        $name = trim(ucwords(strtolower($this->input->post('nom'))));
        $phone = trim($this->input->post('telephone'));
        $address = trim($this->input->post('adresse'));
        $country = trim($this->input->post('pays'));

        $data = array('nom' => $name, 'telephone' => $phone, 'adresse' => $address, 'pays' => $country);

        return $data;
    }

    /**
     * Saves a forwarding agent
     */
    public function save()
    {
        //checks session
        if ($this->connected())
        {
            //get inputs
            $data = $this->get_inputs();
            
            if ($this->transitaire_model->save($data) !== FALSE)
            {
                redirect('transitaire/index/' . lang('SAVING_FORWARDING_AGENT_SUCCESS'));
            } else
            {
                redirect('transitaire/index/' . lang('FORWARDING_AGENT_EXISTS') . ': ' . $data['nom'] . '/' . TRUE);
            }
        }
    }

    /**
     * Updates a forwarding agent
     */
    public function update()
    {
        //checks session
        if ($this->connected())
        {
            // get input values
            $data = $this->get_inputs();

            $id_transitaire = $this->input->post('id_transitaire');

            $where = array(Transitaire_model::$PK => $id_transitaire);

            // update
            if ($this->transitaire_model->update($data, $where) !== FALSE)
            {
                redirect('transitaire/index/' . lang('UPDATING_FORWARDING_AGENT_SUCCESS'));
            } else
            {
                redirect('transitaire/index/' . lang('UPDATING_FAILED') . '/' . TRUE);
            }
        }
    }

    /**
     * Deletes a forwarding agent
     * @param int $id_transitaire
     */
    public function delete($id_transitaire)
    {
        //checks session
        if ($this->connected())
        {
            if ($this->transitaire_model->delete(array(Transitaire_model::$PK => $id_transitaire)) !== FALSE)
            {
                redirect('transitaire/index/' . lang('FORWARDING_AGENT_DELETION_SUCCESS'));
            } else
            {
                redirect('transitaire/index/' . lang('DELETION_FAILED') . '/' . TRUE);
            }
        }
    }

}
