<?php 
/**
 * @class View/Layouts/login
 *
 * @desc Layout de login
 * 
 * @author Andréz Ortiz <@a_kanin>
 * 
 * Todos los derechos reservados Novenitos 2013
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * 
 * @copyright     Copyright 2013, Unipoli, Ing. en Software
 * @version       TutorApp v 0.0.1
 * @package       app/View
 * @subpackage    app/View/layouts
*/
$description = __d('cake_dev', 'TutorApp');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php echo $this->Html->charset(); ?>        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php echo $description ?>:
            <?php echo $title_for_layout; ?>
        </title>        

        <?php
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');

        echo $this->Html->meta('icon',$this->Html->url('/img/logo.png'));

        echo $this->Html->css('css');        
        echo $this->Html->script('js');

        ?>      
    </head>
    <body>       
        <?php echo $this->fetch('content'); ?>       
    </body>
</html>
