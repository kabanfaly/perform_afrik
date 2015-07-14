<?php
/**
 * Description of fournisseur_model
 *
 * @author kaba
 */
class Fournisseur_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}
