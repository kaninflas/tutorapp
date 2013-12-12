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
    var $uses = array(
        'User',
        'Alumnos',
        'Tutores',
        'DPA',
        'TutorAlumnos',
        'Tutorias'
    );
   
    public function beforeFilter() {
        parent::beforeFilter();       
        if($this->action == 'index'){            
            if ($this->Auth->user('rol') != 'admin') {
                $this->redirect('index_'. $this->Auth->user('rol'));
            }
        } 
    }

    /**
     * @desc Renderizo la vista principal donde se juntan todas las vistas
     * @return object    
     * @access public      
     */
    function index() {
        $this->layout = '';
    }

    /**
     * @desc Renderizo la vista principal donde se juntan todas las vistas
     * @return object    
     * @access public      
     */
    function index_alumno() {
        $this->layout = '';
    }

    /**
     * @desc Renderizo la vista principal donde se juntan todas las vistas
     * @return object    
     * @access public      
     */
    function index_tutor() {
        $this->layout = '';
    }

    /**
     * @desc Renderizo la vista principal donde se juntan todas las vistas
     * @return object    
     * @access public      
     */
    function index_dpa() {
        $this->layout = '';
    }

    /**
     * @desc Renderizo usuarios a la vista principal
     * @return object    
     * @access public      
     */
    function usuarios() {
        $registrosUsuario = $this->User->find('all', array('order' => 'id'));        //        almacenamos en una variable la consulta a la tabla users 
        foreach ($registrosUsuario as $key => $value) {
            $arrResp['items'][] = $value['User'];
        }
        print_r(json_encode($arrResp)); //hacemos un  encode para enviar los datos en un json
        exit;
    }

    /**
     * @desc Renderizo alumnos a la vista principal
     * @return object    
     * @access public      
     */
    function alumnos() {
        $registrosAlumnos = $this->Alumnos->find('all', array('order' => 'id'));
        foreach ($registrosAlumnos as $key => $value) {
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
    function tutores() {
        $registrosTutores = $this->Tutores->find('all', array('order' => 'id'));
        foreach ($registrosTutores as $key => $value) {
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
    function dpa() {
        $registrosDPA = $this->DPA->find('all', array('order' => 'id'));
        foreach ($registrosDPA as $key => $value) {
            $arrResp['items'][] = $value['DPA'];
        }
        print_r(json_encode($arrResp));
        exit;
    }

    function alta_dpa() {//funcion INDISPENSABLE que llama a la vista que genera la ventana para alta del dpa
    }

    function dpa_crear() {
        $datos = $_POST;
        $arrDatos = array(
            'nombre' => $datos['nombre'], //tomamos el campo directamiente de los datos transferidos atraves el post 
            'primer_apellido' => $datos['primer_apellido'], //es importante que el NAME del campo sea EXACTAMENTE IGUAL al que tomaremos del POST
            'segundo_apellido' => $datos['segundo_apellido']
        );
        //Aqui guardamos el renglon
        $this->DPA->create(); //creamos un regnlon vacio para
        $this->DPA->save($arrDatos); //posteriormente guardar ahi los datos del array que generamos

        $respuesta['success'] = true;
        $respuesta['msg'] = "Datos guardados";
        print_r(json_encode($respuesta));
        exit;
    }

    function borrar($modelo) {
        //Funcion para borrar datos, dependiendo del modelo
        $raw = '';
        $httpContent = fopen('php://input', 'r');
        while ($kb = fread($httpContent, 1024)) {
            $raw .= $kb;
        }
        fclose($httpContent);
        $params = json_decode($raw);
        $this->$modelo->delete(array('id' => $params->id));
        $respuesta['msj'] = 'Eliminacion completa';
        $respuesta['success'] = true;
        print_r(json_encode($respuesta));
        exit;
    }

    function alta_tutor() {
        
    }

    function tutor_crear() {
        $datos = $_POST;
        $arrDatos = array(
            'nombre' => $datos['nombre'], //tomamos el campo directamiente de los datos transferidos atraves el post 
            'primer_apellido' => $datos['primer_apellido'], //es importante que el NAME del campo sea EXACTAMENTE IGUAL al que tomaremos del POST
            'segundo_apellido' => $datos['segundo_apellido']
        );
        //Aqui guardamos el renglon
        $this->Tutores->create(); //creamos un regnlon vacio para
        $this->Tutores->save($arrDatos); //posteriormente guardar ahi los datos del array que generamos

        $respuesta['success'] = true;
        $respuesta['msg'] = "Datos guardados";
        print_r(json_encode($respuesta));
        exit;
    }

    function alta_alumno() {
        
    }

    function alumno_crear() {
        $datos = $_POST;
        $arrDatos = array(
            'nombre' => $datos['nombre'], //tomamos el campo directamiente de los datos transferidos atraves el post 
            'primer_apellido' => $datos['primer_apellido'], //es importante que el NAME del campo sea EXACTAMENTE IGUAL al que tomaremos del POST
            'segundo_apellido' => $datos['segundo_apellido'],
            'carrera' => $datos['carrera'],
            'matricula' => $datos['matricula'],
            'cuatrimestre' => $datos['cuatrimestre']
        );
        //Aqui guardamos el renglon
        $this->Alumnos->create(); //creamos un regnlon vacio para
        $this->Alumnos->save($arrDatos); //posteriormente guardar ahi los datos del array que generamos

        $respuesta['success'] = true;
        $respuesta['msg'] = "Datos guardados";
        print_r(json_encode($respuesta));
        exit;
    }

    function activar($id) {  //funcion para activar un usuario 
        $this->User->id = $id;
        $this->User->saveField('activo', '1');
    }

    function vdpa() {
        
    }

    function vusuarios() {
        
    }

    function valumnos() {
        
    }

    function vtutores() {
        
    }

    function vasignar() {
        
    }

    function vtutorias() {
        
    }

    function alumnos_asignados($id_tutor) {
        $this->loadModel('TutorAlumnos');
        $arreglo = $this->TutorAlumnos->tutor_tutorado($id_tutor);

        if ($arreglo == null) {
            print_r(json_encode('Arreglo Vacio'));
            exit;
        }
        foreach ($arreglo as $key => $value) {
            $respuesta['items'][] = $value['info'];
        }
        print_r(json_encode($respuesta));
        exit;
    }

    function alumnos_disponibles($id_tutor) {
        $arreglo = $this->Alumnos->disponibles($id_tutor);

        if ($arreglo == null) {
            print_r(json_encode('Arreglo Vacio'));
            exit;
        }
        foreach ($arreglo as $key => $value) {
            $respuesta['items'][] = $value['info'];
        }
        print_r(json_encode($respuesta));
        exit;
    }

    function asignar_alumno($id) {
        $this->layout = '';
        $datos = $_POST;
        $arrDatos = array(
            'id_tutor' => $datos['id_tutor'],
            'id_alumno' => $datos['id_alumno']
        );

        $this->TutorAlumnos->create();
        $this->TutorAlumnos->save($arrDatos);
        $respuesta['success'] = true;
        $respuesta['msg'] = "Informacion guardada correctamente";
        print_r(json_encode($respuesta));
        exit;
    }

    function dpa_nombres() {
        $registrosDPA = $this->DPA->find('all', array('order' => 'id'));
        foreach ($registrosDPA as $key => $value) {
            $value['DPA']['nombre'] = $value['DPA']['nombre'] . ' ' . $value['DPA']['primer_apellido'] . ' ' . $value['DPA']['segundo_apellido'];
            $arrResp['items'][] = $value['DPA'];
        }
        print_r(json_encode($arrResp));
        exit;
    }

    function tutorias($id) {
        $registrosTutorias = $this->Tutorias->hechas($id);
        $arrResp = $registrosTutorias;
        foreach ($registrosTutorias as $key => $value) {
            $arrResp['items'][] = $value['Tutorias'];
        }
        print_r(json_encode($arrResp));
        exit;
    }

    function alumnos_matricula() {
        $registrosAlumnos = $this->Alumnos->find('all', array('order' => 'id'));
        foreach ($registrosAlumnos as $key => $value) {
            $value['Alumnos']['nombre'] = $value['Alumnos']['matricula'] . ' - ' . $value['Alumnos']['nombre'] . ' ' . $value['Alumnos']['primer_apellido'] . ' ' . $value['Alumnos']['segundo_apellido'];
            $arrResp['items'][] = $value['Alumnos'];
        }
        print_r(json_encode($arrResp));
        exit;
    }

    function alta_tutoria() {
        
    }

    function tutoria_crear() {
        $datos = $_POST;
        $arrDatos = array(
            'programa_educativo' => $datos['programa_educativo'],
            'fecha_asignacion' => $datos['fecha_asignacion'],
            'fecha_sesion' => $datos['fecha_sesion'],
            'estatus' => $datos['estatus'],
            'num_sesion' => $datos['num_sesion'],
            'acuerdos' => $datos['acuerdos'],
            'id_alumno' => $datos['id_alumno'],
            'notas_personales' => $datos['notas_personales']
        );
        //Aqui guardamos el renglon
        $this->Tutorias->create(); //creamos un regnlon vacio para
        $this->Tutorias->save($arrDatos); //posteriormente guardar ahi los datos del array que generamos

        $respuesta['success'] = true;
        $respuesta['msg'] = "Datos guardados";
        print_r(json_encode($respuesta));
        exit;
    }

    function vusuarios_listarol() {
        switch ($_GET['rol']) {
            case 'alumno':
                $arr = $this->Alumnos->find('all', array('order' => 'primer_apellido, segundo_apellido, nombre'));
                foreach ($arr as $value) {
                    $value['Alumnos']['nombre'] = $value['Alumnos']['matricula'] . ' - ' . ' ' . $value['Alumnos']['primer_apellido'] . ' ' . $value['Alumnos']['segundo_apellido'] . ' ' . $value['Alumnos']['nombre'];
                    $arrResp['data'][] = $value['Alumnos'];
                }
                break;

            case 'tutor':
                $arr = $this->Tutores->find('all', array('order' => 'primer_apellido, segundo_apellido, nombre'));
                foreach ($arr as $value) {
                    $value['Tutores']['nombre'] = $value['Tutores']['primer_apellido'] . ' ' . $value['Tutores']['segundo_apellido'] . ' ' . $value['Tutores']['nombre'];
                    $arrResp['data'][] = $value['Tutores'];
                }
                break;

            case 'dpa':
                $arr = $this->DPA->find('all', array('order' => 'carrera,primer_apellido, segundo_apellido, nombre'));
                foreach ($arr as $value) {
                    $value['DPA']['nombre'] = $value['DPA']['carrera'] . ' - ' . ' ' . $value['DPA']['primer_apellido'] . ' ' . $value['DPA']['segundo_apellido'] . ' ' . $value['DPA']['nombre'];
                    $arrResp['data'][] = $value['DPA'];
                }
                break;

            case 'admin':
                break;

            default:
                break;
        }
        echo json_encode($arrResp);
        exit;
    }

    function vusuarios_rol() {
        
    }

    function asigna_rol() {
        $modelo = "";
        switch ($this->request->data('rol')) {
            case 'alumno':
                $modelo = "Alumnos";
                break;

            case 'tutor':
                $modelo = "Tutores";
                break;

            case 'dpa':
                $modelo = "DPA";
                break;

            default:
                exit;
                break;
        }

        $this->$modelo->id = $this->request->data('id');

        if (!$this->$modelo->exists()) {
            echo "{'success':false, 'responseText: 'Usuario no válido'}";
            exit;
        }

        if ($this->request->is('POST') || $this->request->is('PUT')) {
            if ($this->$modelo->save($this->request->data)) {
                echo "{'success':true, responseText: 'El usuario ha sido guardado.'}";
                exit;
            }
            echo "{'success': false, responseText: 'El usuario no pudo ser guardado. Por favor intente nuevamente.'}";
        }

        exit;
    }

}