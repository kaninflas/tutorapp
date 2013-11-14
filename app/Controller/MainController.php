<?php
/**
 * @class Controller/MainController
 *
 * @desc Controlador principal de TutorApp
 *
 * @author Ilse Ferman  <@ilseferman>
 * @author Alex Prado   <@janhito>
 * @author Andrez Ortiz <@a_kanin>
 * 
 * UNIPOLIDGO, Ing en Software
 *
 * @copyright     Copyright 2013, Novenitos
 * @version       TutorApp v 0.0.1
 */

class MainController extends AppController {
	/**
	 * @desc Valido si el usuario introducido esta registrado.
	 * 
	 * @return json      
	 * @access public      
	 */
	function login(){
		$this->layout = 'index';
	}

	/**
     * @desc Renderizo la vista principal donde se juntan todas las vistas
     * @return object    
     * @access public      
     */
     function index(){

     }	
}

