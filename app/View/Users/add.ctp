<?php
/**
 * @class View/Users
 *
 * @desc Vista con el formulario para añadir usuarios
 * 
 * @author Andréz Ortiz <@a_kanin>
 * 
 * Todos los derechos reservados Novenitos 2013, UNIPOLI
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * 
 * Ext JS Library 4.2 
 * Copyright(c) 2006-2011 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 *
 * @copyright     Copyright 2013, Unipoli, Ing. en Software
 * @version       TutorApp v 0.0.1
 * @package       app/View
 * @subpackage    app/View/User
*/
?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Añadir Usuario'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('correo');
        echo $this->Form->input('rol', array(
            'options' => array('admin' => 'Admin','dpa' => 'DPA', 'tutor' => 'Tutor', 'alumno' => 'Alumno')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>