<?php
namespace ExeOutput;

class Storage {
	public static function getConfig() {
		//$folder=exo_getglobalvariable('HEPubStorageLocation','');
		$folder=__DIR__.'/';
		$config=array();
		if (file_exists($folder.'config.json')) {
			$config=json_decode(file_get_contents($folder.'config.json'),true);
		}
		return $config;
	}
	
	public static function setConfig($config) {
		//$folder=exo_getglobalvariable('HEPubStorageLocation','');
		$folder=__DIR__.'/';
		file_put_contents($folder.'config.json',json_encode($config));
	}
	
}
