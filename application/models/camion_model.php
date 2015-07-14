<?php
/**
 * Description of camion_model
 *
 * @author kaba
 */
class Camion_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}
