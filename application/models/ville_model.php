<?php
/**
 * Description of ville_model
 *
 * @author kaba
 */
class Ville_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}
