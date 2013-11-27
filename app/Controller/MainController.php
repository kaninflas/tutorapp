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

//     /* Modelos que usa la BD */
	var $uses= array(
			'User',
			'Alumnos',
			'Tutores',
			'DPA'
	);
	
     /**
     * @desc Renderizo la vista principal donde se juntan todas las vistas
     * @return object    
     * @access public      
     */
     function index(){
     	$this->layout = 'index';
     }	
    /**
     * @desc Renderizo usuarios a la vista principal
     * @return object    
     * @access public      
     */
     function usuarios(){
		$registrosUsuario= $this->User->find('all',array('order'=>'id'));	//	almacenamos en una variable la consulta a la tabla users 
		foreach($registrosUsuario as $key => $value){
			$arrResp['items'][] = $value['User'];
		}		
		print_r(json_encode($arrResp));//hacemos un  encode para enviar los datos en un json
		exit;
     }
     /**
      * @desc Renderizo alumnos a la vista principal
      * @return object    
      * @access public      
      */
     function alumnos(){
		$registrosAlumnos=$this->Alumnos->find('all',array('order'=>'id'));		
		foreach($registrosAlumnos as $key => $value){
			$arrResp['items'][] = $value['Alumnos'];
		}		
		print_r(json_encode($arrResp));
		exit;
     }     
     /**
      * @desc Renderizo tutores a la vista principal
      * @return object    
      * @access public      
      */
     function tutores(){
		$registrosTutores=$this->Tutores->find('all',array('order'=>'id'));		
		foreach($registrosTutores as $key => $value){
			$arrResp['items'][] = $value['Tutores'];
		}		
		print_r(json_encode($arrResp));
		exit;
     }     
     /**
      * @desc Renderizo dpa a la vista principal
      * @return object    
      * @access public      
      */
     function dpa(){
		$registrosDPA=$this->DPA->find('all',array('order'=>'id'));		
		foreach($registrosDPA as $key => $value){
			$arrResp['items'][] = $value['DPA'];
		}		
		print_r(json_encode($arrResp));
		exit;
     }
}

