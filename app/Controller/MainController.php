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
  function dpa_crear(){
    $datos = $_POST;
      $arrDatos = array(
            'nombre'      => $datos['nombre'],//tomamos el campo directamiente de los datos transferidos atraves el post 
            'primer_apellido'   => $datos['primer_apellido'],//es importante que el NAME del campo sea EXACTAMENTE IGUAL al que tomaremos del POST
            'segundo_apellido'  => $datos['segundo_apellido']
        );  
      //Aqui guardamos el renglon
       $this->DPA->create();//creamos un regnlon vacio para
         $this->DPA->save($arrDatos);//posteriormente guardar ahi los datos del array que generamos

          $respuesta['success'] = true;
        $respuesta['msg']   = "Datos guardados";
        print_r(json_encode($respuesta));
      exit;          
   }
   function alta_dpa(){//funcion INDISPENSABLE que llama a la vista que genera la ventana para alta del dpa

   }    

   function borrar($modelo){
    //Funcion para borrar datos, dependiendo del modelo
    $raw='';
    $httpContent = fopen('php://input', 'r');
      while ($kb = fread($httpContent, 1024)) {
           $raw .= $kb;
      }
    fclose($httpContent);  
    $params = json_decode($raw); 
        $this->$modelo->delete(array('id'=>$params->id));
        $respuesta['msj']='Eliminacion completa';
        $respuesta['success'] = true;
        print_r(json_encode($respuesta));exit;
  }

}

