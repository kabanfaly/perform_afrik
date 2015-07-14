<?php

/**
 * Description of dechargement_model
 *
 * @author kaba
 */
class Dechargement_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

}
