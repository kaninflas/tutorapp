<?php

/**
 * @class Controller/UsersController
 *
 * @desc Controlador que se encarga de la lógica de los usuarios
 *
 * @author Andrez Ortiz <@a_kanin>
 * 
 * UNIPOLIDGO, Ing en Software
 *
 * @copyright     Copyright 2013, Novenitos
 * @version       TutorApp v 0.0.1
 */
class UsersController extends AppController {

    var $uses = array(
        'AppModel',
        'User'
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','login');
    }
    
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                echo '{"success" : true}';
                exit;
            }             
            echo "Usuario o password no válido, por favor intente nuevamente";
     
        }
        
        $this->layout = (!isset($_GET["Layout"]))? 'index' : '';
        
        if($this->Auth->loggedIn()){
            $this->render('/Main/index');
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario no válido'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {        
        $this->layout = "";
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['fecha'] = date('Y-m-d H:i:s');
            if ($this->User->save($this->request->data)) {
                //$this->Session->setFlash(__('El usuario ha sido guardado'));
                echo '{"success" : true}';
                exit;
            }
            //$this->Session->setFlash(__('El usuario no pudo ser guardado. Por favor intente nuevamente'));
            echo "El usuario o correo ya están registrados, intente con otro";
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario no válido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El usuario ha sido guardado.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('El usuario no pudo ser guardado. Por favor intente nuevamente.'));
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }
    
    public function asigna_rol() {
        $this->User->id = $this->request->data('id');
        if (!$this->User->exists()) {
            echo "{'success':false, 'responseText: 'Usuario no válido'}";
            exit;
        }
        
        if ($this->request->is('POST') || $this->request->is('PUT')) {
            if ($this->User->save($this->request->data)) {
                echo "{'success':true, responseText: 'El usuario ha sido guardado.'}";
                exit;
            }
            echo "{'success': false, responseText: 'El usuario no pudo ser guardado. Por favor intente nuevamente.'}";
        } 
        
        exit;
    }
    
    

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario no válido'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuario borrado'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El usuario no pudo ser guardado'));
        return $this->redirect(array('action' => 'index'));
    }

}
