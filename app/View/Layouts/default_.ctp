<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
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
        echo $this->Html->meta('icon');

        echo $this->Html->css('normalize');
        echo $this->Html->css('bootstrap/bootstrap.min');
        echo $this->Html->css('css');

        echo $this->Html->script('jquery.min');
        echo $this->Html->script('prefixfree');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('scripts');
        echo $this->Html->script('js');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>        
    </head>
    <body>       
        <?php //echo $this->fetch('content'); ?>
        
        <section class="container">
            <div class="row clearfix">
                <div class="col-md-2 column">
                    <?php
                    echo $this->Html->image('unipoli.jpg', array(
                        'alt' => 'UNIPOLI',
                        'width' => '150px'));
                    ?>
                </div>
                <header class="col-md-10 column">
                    <div class="row clearfix">
                        <div class="col-md-10 column">
                            <div class="page-header">
                                <h1>
                                    Administrador <small><?php echo $title_for_layout ?></small>
                                </h1>
                            </div>
                        </div>
                        <div class="col-md-2 column">
                            <?php 
                                echo $this->Html->image('logo.png', array(
                                    'alt' => 'TutoApp',
                                    'width' => '150px',
                                    'class'=>'img-circle'));
                            ?>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6 column">
                            <button type="button" class="btn btn-lg btn-block active">Default</button>
                        </div>
                        <div class="col-md-6 column">
                            <button type="button" class="btn btn-block active btn-lg">Default</button>
                        </div>
                    </div>
                </header>
            </div>
            <div class="row clearfix">
                <div class="col-md-2 column">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar">                                    
                                </span><span class="icon-bar">                                    
                                </span><span class="icon-bar"></span>
                            </button> <a class="navbar-brand" href="#">TutorApp</a>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active col-md-12">
                                    <a href="#">Registros</a>
                                </li>
                                <li class="col-md-12">
                                    <a href="#">Alumnos</a>
                                </li>
                                <li class="col-md-12">
                                    <a href="#">Tutores</a>
                                </li>
                                <li class="col-md-12">
                                    <a href="#">DPA</a>
                                </li>
                                <!-- Ppor si se necesita un dropdown
                                  <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">Action</a>
                                        </li>
                                        <li>
                                            <a href="#">Another action</a>
                                        </li>
                                        <li>
                                            <a href="#">Something else here</a>
                                        </li>
                                        <li class="divider">
                                        </li>
                                        <li>
                                            <a href="#">Separated link</a>
                                        </li>
                                        <li class="divider">
                                        </li>
                                        <li>
                                            <a href="#">One more separated link</a>
                                        </li>
                                    </ul>
                                </li>-->
                            </ul>
                            
                            <!-- No borrar es para el search box                            
                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div> <button type="submit" class="btn btn-default">Submit</button>
                            </form>-->
                            
                        </div>

                    </nav>
                </div>
                <div class="col-md-10 column">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Product
                                </th>
                                <th>
                                    Payment Taken
                                </th>
                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    01/04/2012
                                </td>
                                <td>
                                    Default
                                </td>
                            </tr>
                            <tr class="active">
                                <td>
                                    1
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    01/04/2012
                                </td>
                                <td>
                                    Approved
                                </td>
                            </tr>
                            <tr class="success">
                                <td>
                                    2
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    02/04/2012
                                </td>
                                <td>
                                    Declined
                                </td>
                            </tr>
                            <tr class="warning">
                                <td>
                                    3
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    03/04/2012
                                </td>
                                <td>
                                    Pending
                                </td>
                            </tr>
                            <tr class="danger">
                                <td>
                                    4
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    04/04/2012
                                </td>
                                <td>
                                    Call in to confirm
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        
        
        <footer>
            
        </footer>
    </body>
</html>
