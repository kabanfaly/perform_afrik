<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Preference model
 *
 * @author Kaba N'faly
 * @since 25/12/2015
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource preference_model.php
 */
class Preference_model extends CI_Model
{

    /**
     * Preference (preference) table name
     * @var String
     */
    public static $TABLE_NAME = 'pa_preference';

    /**
     * Preference (preference) table primary key
     * @var String
     */
    public static $PK = 'id_preference';
    public static $DEFAULT_PARAMETERS = array(
        'PHONE' => 'Tel: (+225) 20 22 57 02 / 77 77 03 03',
        'EMAIL' => 'performworld15@gmail.com',
        'ADDRESS' => 'Plateau Immeuble du Mali, 21 BP 2924, Abidjan 21, Côte D\'Ivoire',
        'FAX' => '',
        'COMPANY' => 'PERFORM WORLD',
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /**
     * get all parameters. Saves default parameters if any parameter is found
     * @return array
     */
    public function get_parameters()
    {
        // get parameters
        $result = $this->find_by_name('parameters');
        
        if ($result !== NULL)
        {
            return json_decode($result['valeur'], true);
        } else
        {   

            // save default parameters
            $data = array('nom' => 'parameters', 'valeur' => json_encode(self::$DEFAULT_PARAMETERS));
            $this->save($data);
            
            return self::$DEFAULT_PARAMETERS;
        }
        return self::$DEFAULT_PARAMETERS;
    }

     /**
     * Finds a preference by name
     * 
     * @param String $name
     * @return mixed
     */
    public function find_by_name($name)
    {

        $query = $this->db->get_where(self::$TABLE_NAME, array('nom' => $name));
        return $query->row_array();
    }
    /**
     * Saves a preference if it doesn't exist
     * 
     * @param array $data
     * @return boolean
     */
    public function save($data)
    {

        if ($this->find_by_name($data['nom']) === NULL)
        {
            return $this->db->insert(self::$TABLE_NAME, $data);
        }
        return FALSE;
    }

    /**
     * Updates a preference
     * 
     * @param array $data
     * @param array $where
     * @return boolean
     */
    public function update_parameters($data)
    {
        // do update
        return $this->db->update(self::$TABLE_NAME, $data, array('nom' => 'parameters'));
    }


}
