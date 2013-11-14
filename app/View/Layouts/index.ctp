<?php 
/**
 * @class View/Layouts/index
 *
 * @desc Layout principal de TutorApp
 * 
 * @author Andréz Ortiz <@a_kanin>
 * @author Ilse Ferman <@ilseferman>
 * 
 * Todos los derechos reservados Novenitos 2013
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
 * @package       app/Views
 * @subpackage    app/View/index
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

        echo $this->Html->css('ext/shared/example');
        echo $this->Html->css('ext/shared/ux/portal');
        echo $this->Html->css('ext/shared/ux/GroupTabPanel');
        echo $this->Html->css('ext/ext-theme-neptune/ext-theme-neptune-all-debug');
        echo $this->Html->css('css');

        echo $this->Html->script('ext/ext-all-dev');
        echo $this->Html->script('ext/ext-theme-neptune/build/ext-theme-neptune');
        
        echo $this->Html->script('ext/shared/examples.js');
        echo $this->Html->script('js');

        ?> 

        <script>
            /* Variables Globales */
            var GLOBAL_PATH = '<?php echo $this->base . '/'; ?>';            
            
            /* Script que administra la carga de las librerías */
            Ext.Loader.setConfig({
                enabled:true,
                paths:{         
                    'Ext.ux':  GLOBAL_PATH + 'js/ext/src/ux/',
                    'Ext.app': GLOBAL_PATH + 'js/ext/classes/'
                }
            });
        </script>       
    </head>
    <body>       
        <?php echo $this->fetch('content'); ?>       
    </body>
</html>
