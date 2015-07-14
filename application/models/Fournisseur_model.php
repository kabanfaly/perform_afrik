<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Fournisseur model
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource fournisseur_model.php
 */
class Fournisseur_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}
