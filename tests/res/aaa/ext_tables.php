<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
$TCA["tx_aaa_test"] = array (
	"ctrl" => array (
		'title'     => 'LLL:EXT:aaa/locallang_db.xml:tx_aaa_test',		
		'label'     => 'uid',	
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => "ORDER BY crdate",	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_aaa_test.gif',
	),
	"feInterface" => array (
		"fe_admin_fieldList" => "hidden",
	)
);
?>