<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Utilisateur model
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource Utilisateur_model.php
 */
class Utilisateur_model extends CI_Model
{

    /**
     * Utilisateur (user) table name
     * @var String
     */
    public static $TABLE_NAME = 'pa_utilisateur';

    /**
     * Utilisateur (user) table primary key
     * @var String
     */
    public static $PK = 'id_utilisateur';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * retreive user and his profile by his login and password
     * @param String $login
     * @param String $password
     * @param bool $check_status whether to check status or not
     * @return array
     */
    public function get_user_profile($login, $password, $check_status = true)
    {
        $this->db->select('u.*, p.nom as profil');
        $this->db->join('pa_profil p', 'u.id_profil = p.id_profil', 'INNER');

        $where = array('login' => $login, 'mot_de_passe' => $password);
        if ($check_status)
        {
            $where['statut'] = 1;
        }
        $query = $this->db->get_where(self::$TABLE_NAME . ' u', $where);
        return $query->row_array();
    }

    /**
     * retreives all users if the input parameter (id_utilisateur) is false, or 
     * retreives the user identified by the input parameter value
     * @param type $id_utilisateur
     * @return type array
     */
    public function get_users($id_utilisateur = false)
    {
        $this->db->select('u.*, p.nom as profil');
        $this->db->join('pa_profil p', 'u.id_profil = p.id_profil', 'INNER');

        if ($id_utilisateur === false)
        {
            $query = $this->db->get(self::$TABLE_NAME . ' u');
            return $query->result_array();
        }

        $query = $this->db->get_where(self::$TABLE_NAME . ' u', array(self::$PK => $id_utilisateur));
        return $query->row_array();
    }

    /**
     * Updates a user
     * 
     * @param array $data
     * @param array $where
     * @return boolean
     */
    public function update($data, $where)
    {
        // do update
        return $this->db->update(self::$TABLE_NAME, $data, $where);
    }

    /**
     * Deletes an user
     * 
     * @param array $where
     * @return boolean
     */
    public function delete($where)
    {
        return $this->db->delete(self::$TABLE_NAME, $where);
    }

    /**
     * Saves a supplier if it doesn't exist
     * 
     * @param array $data
     * @return boolean
     */
    public function save($data)
    {
        //find user
        if ($this->find_by_login($data['login']) === NULL)
        {
            return $this->db->insert(self::$TABLE_NAME, $data);
        }
        return FALSE;
    }

    /**
     * find a user identified by its login
     * @param String $login
     * @return mixed
     */
    public function find_by_login($login)
    {
        $query = $this->db->get_where(self::$TABLE_NAME, array('login' => $login));
        return $query->row_array();
    }

}
