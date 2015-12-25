<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
    public static $table_name = 'pa_utilisateur';
    
    /**
     * Utilisateur (user) table primary key
     * @var String
     */
    public static $pk = 'id_camion';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * retreive user and his profile by his login and password
     * @param String $login
     * @param String $password
     * @return array
     */
    public function get_user_profile($login, $password)
    {
        $this->db->select('u.*, p.nom as profil');
        
        $this->db->join('pa_profil p', 'u.id_profil = p.id_profil', 'INNER');
        
        $query = $this->db->get_where('pa_utilisateur u', array('login' => $login, 'mot_de_passe' => $password));
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
       if ($id_utilisateur === false)
        {

            $query = $this->db->get(self::$table_name);
            return $query->result_array();
        }

        $query = $this->db->get_where(self::$table_name, array(self::$pk => $id_utilisateur));
        return $query->row_array();
    }
    

}
