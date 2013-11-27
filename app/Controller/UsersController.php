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
    
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('add');
    }
    
    /*public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }*/

    public function login() {
        if ($this->request->is('post')) {
        	/*$logi = array();
        	$logi['User'] = $this->data; 
        	print_r($this->data);
        	print_r('login: '.$this->Auth->login($this->data));
        	exit;*/
           // $this->Auth->logout();
            
            if ( $this->Auth->login() ) {                
                //echo '{"success" : true, responseText": "' . $out . '"}';
                
                return $this->redirect($this->Auth->redirectUrl());
                //$out=  $this->requestAction($this->Auth->redirectUrl(), array('return'));
                //$out = $this->AppModel->removeScript($out);
                //echo '{"success" : true, "responseText": "' . $out . '"}';
                //echo $out;
                //exit;
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
            // else{                
            //     echo '{"success" : false, "responseText": "Usuario o password no válido, por favor intente uevamente"}';
            //     exit;
            // }

        }             
        $this->layout = 'index'; 
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
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['fecha'] = date('Y-m-d H:i:s');
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El usuario ha sido guardado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('El usuario no pudo ser guardado. Por favor intente nuevamente'));
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

?>