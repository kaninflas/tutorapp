<?php

/**
 * @class Model
 *
 * @desc Modelo responsable de encontrar, guardar y validar cualquier dato de usuarios
 *
 * @author Andrez Ortiz <@a_kanin>
 * @author Ilse Ferman  <@ilseferman>
 * 
 * UNIPOLIDGO, Ing en Software
 *
 * @copyright     Copyright 2013, Novenitos
 * @version       TutorApp v 0.0.1
 * @package       app.Model
 */
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    public $name = 'User';
    public $useTable = 'users';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere un username'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere un password'
            )
        ),
        'rol' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'dpa', 'tutor', 'alumno', 'Por Asignar')),
                'message' => 'Ingrese un rol válido',
                'allowEmpty' => false
            )
        ),
        'correo' => array(
            'valid' => array(
                'rule' => 'email',
                'message' => 'Ingrese un correo válido',
                'allowEmpty' => false
            )
        )
    );

    public function beforeSave($options = array()) {
        //Hasheo el password antes de guardarlo a la BD
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
            
            //Reviso que el usuario no exista antes de guardarlo
            $opts = array(
                'conditions' => array(
                    'or' => array(
                        'username' => $this->data[$this->alias]['username'],
                        'correo' => $this->data[$this->alias]['correo']
                    )
                )
            );
            $out = $this->find('first', $opts);
            if (empty($out)) {
                return true;
            }else
                return false;
        }
    }

}
