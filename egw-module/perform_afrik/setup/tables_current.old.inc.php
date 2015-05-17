<?php
/**
 * eGroupWare - Setup
 * http://www.egroupware.org
 * Created by eTemplates DB-Tools written by ralfbecker@outdoor-training.de
 *
 * @license http://opensource.org/licenses/gpl-license.php GPL - GNU General Public License
 * @package perform_afrik
 * @subpackage setup
 * @version $Id$
 */


$phpgw_baseline = array(
	'egw_pa_camion' => array(
		'fd' => array(
			'id_camion' => array('type' => 'auto','nullable' => False),
			'numero' => array('type' => 'varchar','precision' => '45','nullable' => False)
		),
		'pk' => array('id_camion'),
		'fk' => array(),
		'ix' => array(),
		'uc' => array()
	),
	'egw_pa_dechargement' => array(
		'fd' => array(
			'id_dechargement' => array('type' => 'auto','nullable' => False),
			'id_camion' => array('type' => 'int','precision' => '11','nullable' => False),
			'id_ville' => array('type' => 'int','precision' => '11','nullable' => False),
			'id_fournisseur' => array('type' => 'int','precision' => '11','nullable' => False),
			'date' => array('type' => 'date','nullable' => False),
			'bon_sac' => array('type' => 'int','precision' => '11'),
			'sac_dechire' => array('type' => 'int','precision' => '11'),
			'poids_brut' => array('type' => 'int','precision' => '11'),
			'poids_net' => array('type' => 'int','precision' => '11'),
			'poids_refracte' => array('type' => 'int','precision' => '11'),
			'humidite' => array('type' => 'int','precision' => '11')
		),
		'pk' => array('id_dechargement'),
		'fk' => array(),
		'ix' => array('id_camion','id_ville','id_fournisseur'),
		'uc' => array()
	),
	'egw_pa_fournisseur' => array(
		'fd' => array(
			'id_fournisseur' => array('type' => 'auto','nullable' => False),
			'nom' => array('type' => 'varchar','precision' => '45','nullable' => False),
			'prenom' => array('type' => 'varchar','precision' => '45','nullable' => False),
			'telephone' => array('type' => 'varchar','precision' => '45'),
			'adresse' => array('type' => 'text')
		),
		'pk' => array('id_fournisseur'),
		'fk' => array(),
		'ix' => array(),
		'uc' => array()
	)
);
