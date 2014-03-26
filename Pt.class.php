<?php
/**
 * 
 */
include("App.class.php");

class Pt{


	public static function createApp(){

		return new App(dirname($_SERVER['SCRIPT_FILENAME']));
	}
}