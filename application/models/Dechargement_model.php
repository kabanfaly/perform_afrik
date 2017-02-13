<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Dechargement model
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource dechargement_model.php
 */
class Dechargement_model extends CI_Model
{

    /**
     * Dechargement (unloading) table name
     * @var String
     */
    public static $TABLE_NAME = 'pa_dechargement';

    /**
     * Dechargement (unloading) table primary key
     * @var String
     */
    public static $PK = 'id_dechargement';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * retrieves all unloading if the input parameter (id_dechargement) is false, or 
     * retrieves the unloading identified by the input parameter value.
     * Id the parameter id_magasin (shop id) is set to true retrieved data will be only defined shop
     * @param int $id_dechargement
     * @param int $id_magasin
     * @return  array
     */
    public function get_dechargements($id_dechargement = false, $id_magasin = false)
    {
        $this->db->select('d.*, f.nom as fournisseur, c.numero as camion, v.nom as ville, m.nom as magasin, p.nom as produit');
        $this->db->join('pa_magasin m', 'd.id_magasin = m.id_magasin', 'INNER');
        $this->db->join('pa_fournisseur f', 'd.id_fournisseur = f.id_fournisseur', 'INNER');
        $this->db->join('pa_camion c', 'd.id_camion = c.id_camion', 'INNER');
        $this->db->join('pa_produit p', 'd.id_produit = p.id_produit', 'INNER');
        $this->db->join('pa_ville v', 'd.id_ville = v.id_ville', 'INNER');
        
        if ($id_dechargement === false)
        {

            if ($id_magasin)
            {
                $query = $this->db->get_where(self::$TABLE_NAME . ' d', array('d.id_magasin' => $id_magasin));
            } else
            {
                $query = $this->db->get(self::$TABLE_NAME . ' d');
            }
            return $query->result_array();
        }

        $query = $this->db->get_where(self::$TABLE_NAME . ' d', array(self::$PK => $id_dechargement));
        return $query->row_array();
    }
    /**
     * retrieves all unloading and sum the content by product
     * @param int $id_magasin
     * @return  array
     */
    public function get_sum_dechargements($id_magasin = false)
    {
        $this->db->select('sum(d.bon_sac) bon_sac, sum(d.sac_dechire) sac_dechire, sum(d.sac_total) sac_total,'
                . ' sum(d.poids_brut) poids_brut, sum(d.poids_net) poids_net, '
                . ' sum(d.poids_refracte) poids_refracte, sum(d.humidite) humidite,'
                . ' sum(d.qualite) qualite, sum(d.prix) prix, sum(d.total) total,'
                . ' m.nom as magasin, p.nom as produit');
        $this->db->join('pa_magasin m', 'd.id_magasin = m.id_magasin', 'INNER');
        $this->db->join('pa_fournisseur f', 'd.id_fournisseur = f.id_fournisseur', 'INNER');
        $this->db->join('pa_camion c', 'd.id_camion = c.id_camion', 'INNER');
        $this->db->join('pa_produit p', 'd.id_produit = p.id_produit', 'INNER');
        $this->db->join('pa_ville v', 'd.id_ville = v.id_ville', 'INNER');
        $this->db->group_by("d.id_produit, d.id_magasin");
        

        if ($id_magasin)
        {
            $query = $this->db->get_where(self::$TABLE_NAME . ' d', array('d.id_magasin' => $id_magasin));
        } else
        {
            $query = $this->db->get(self::$TABLE_NAME . ' d');
        }
        return $query->result_array();

        return $query->row_array();
    }

    /**
     * Saves a unloading
     * @param array $data
     * @return boolean
     */
    public function save($data)
    {
        return $this->db->insert(self::$TABLE_NAME, $data);
    }

    /**
     * Updates an unloading
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
     * Delete a unload
     * 
     * @param array $where
     * @return boolean
     */
    public function delete($where)
    {
        return $this->db->delete(self::$TABLE_NAME, $where);
    }

}
