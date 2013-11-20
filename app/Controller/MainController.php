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
	var $name="Main";
	var $uses= array('Users','Alumnos','Tutores','DPA');
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
     	$this->layout = 'index';
     }	
     //Se crea la funcion usuarios que sera llamada desde las vistas
     function usuarios(){
		$registrosUsuario=$this->Users->find('all',array('order'=>'id'));	//	almacenamos en una variable la consulta a la tabla users 
		foreach($registrosUsuario as $key => $value){
			$arrResp['items'][] = $value['Users'];
		}		
		print_r(json_encode($arrResp));//hacemos un  encode para enviar los datos en un json
		exit;
     }
     function alumnos(){
		$registrosAlumnos=$this->Alumnos->find('all',array('order'=>'id'));		
		foreach($registrosAlumnos as $key => $value){
			$arrResp['items'][] = $value['Alumnos'];
		}		
		print_r(json_encode($arrResp));
		exit;
     }
     function tutores(){
		$registrosTutores=$this->Tutores->find('all',array('order'=>'id'));		
		foreach($registrosTutores as $key => $value){
			$arrResp['items'][] = $value['Tutores'];
		}		
		print_r(json_encode($arrResp));
		exit;
     }
     function dpa(){
		$registrosDPA=$this->DPA->find('all',array('order'=>'id'));		
		foreach($registrosDPA as $key => $value){
			$arrResp['items'][] = $value['DPA'];
		}		
		print_r(json_encode($arrResp));
		exit;
     }
}

