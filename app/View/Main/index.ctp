<?php
/**
 * @class View/index
 *
 * @desc vista de inicio de TutorApp
 * 
 * @author Andréz Ortiz <@a_kanin>
 * @author Ilse Ferman <@ilseferman>
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
 * @package       app/Views
 * @subpackage    app/View/index
 */
?>

<script>  
    var activo_usuario  =false; 
    var activo_alumno   =false;
    var activo_tutor    =false;
    var activo_dpa      =false;
    var activo_asignar  =false;
    var activo_tutorias =false;
    var id_principal_usuario= "<?php echo  CakeSession::read('Auth.User.id')?>";

    //Ext.require(['*']);   
    Ext.onReady(function(){   
        var viewport = new Ext.Viewport({
            layout: "border",
            border: false,
            renderTo: Ext.getBody(),
            items: [
                // ------------------------------------------------------------------
                {
                    region: "north",
                    id : "toolbar-area",
                    xtype: 'panel',
                    title: 'Bienvenido Administrador: <?php echo  CakeSession::read('Auth.User.username')?>',
                    html: ["<a href='<?php echo $this->html->url("/users/logout"); ?>'>Cerrar Sesión</a>"],
                    height: 30,
                    tools:[{
                            type : 'gear',
                            tooltip: 'Cerrar Sesión',
                            handler: function(){
                                Ext.MessageBox.confirm('Confirmar', 'Esta seguro que desea cerrar sesion?', function(btn){
                                    if(btn == 'yes')
                                        window.location = GLOBAL_PATH + "users/logout";
                                });
                            }
                        }]
                
                },

                // ------------------------------------------------------------------
                // MENU IZQUIERDO
                // ------------------------------------------------------------------
                {
                    region: 'west',
                    xtype: 'panel',
                    split: true,
                    resizeable: false,
                    maxWidth : 350,
                    minWidth : 349,
                    collapsible: true,
                    title: 'Explorador',
                    width: 350,
                    minSize: 150,
                    // --------------------------------------------------------------
                    title: 'Menu ',
                    layout: 'border',
                    border: false,
                    id: "west",
                    items: [
                        {
                            region : "north",
                            height: 500,
                            split : true,
                            id : "left-form-panel",
                            items : 
                                [
                                {
                                    xtype    :'button',
                                    text     :'Usuarios',
                                    scale    :'large',                            
                                    maxWidth : 350,
                                    minWidth : 310, 
                                    margin   : 20,
                                    listeners:
                                        {
                                        click:function()
                                        {
                                    
                                            Ext.getCmp('instrucciones').setText('Seleccione a los usuarios que desee activar al dar click sobre ellos');
                                            var contenedor=Ext.getCmp('main');
                                            if(!activo_usuario)     
                                            {                               
<?php echo $this->requestAction('Main/vusuarios', array('return')) ?>
                                                                                        contenedor.add(gUsuarios); 
                                                                                        contenedor.getLayout().setActiveItem(gUsuarios);                                   
                                                                                        activo_usuario=true;
                                                                                    }
                                                                                }
                                                                            }
                                                                        },
                                                                        {
                                                                            xtype    :'button',
                                                                            text     :'Alumnos',
                                                                            scale    :'large',                            
                                                                            maxWidth : 350,
                                                                            minWidth : 310, 
                                                                            margin   : 20,
                                                                            listeners:
                                                                                {
                                                                                click:function()
                                                                                {
                                                                                    Ext.getCmp('instrucciones').setText('Altas, Bajas y modificaciones de Alumnos registrados');
                                                                                    var contenedor=Ext.getCmp('main'); 
                                       
                                                                                    if(!activo_alumno){                                        
<?php echo $this->requestAction('Main/valumnos', array('return')) ?>
                                                                                        contenedor.add(gAlumnos);
                                                                                        contenedor.getLayout().setActiveItem(gAlumnos);                                   
                                                                                        activo_alumno=true;
                                                                                    }
                                                                                }
                                                                            }
                                                                        },
                                                                        {
                                                                            xtype    :'button',
                                                                            text     :'Tutores',
                                                                            scale    :'large',                            
                                                                            maxWidth : 350,
                                                                            minWidth : 310, 
                                                                            margin   : 20,
                                                                            listeners:
                                                                                {
                                                                                click:function()
                                                                                {
                                                                                    Ext.getCmp('instrucciones').setText('Altas, Bajas y modificaciones de Tutores registrados');
                                                                                    var contenedor=Ext.getCmp('main'); 
                                                                                    if(!activo_tutor)
                                                                                    {
<?php echo $this->requestAction('Main/vtutores', array('return')) ?>
                                                                                        contenedor.add(gTutores); 
                                                                                        contenedor.getLayout().setActiveItem(gTutores);                                   
                                                                                        activo_tutor=true;
                                                                                    }
                                                                                }
                                                                            }
                                                                        },
                                                                        {
                                                                            xtype    :'button',
                                                                            text     :'DPA',
                                                                            scale    :'large',                            
                                                                            maxWidth : 350,
                                                                            minWidth : 310, 
                                                                            margin   : 20,
                                                                            listeners:
                                                                                {
                                                                                click:function()
                                                                                {
                                                                                    Ext.getCmp('instrucciones').setText('Altas, Bajas y modificaciones de DPA registrados');
                                                                                    var contenedor=Ext.getCmp('main'); 
                                    
                                                                                    if(!activo_dpa)
                                                                                    {
<?php echo $this->requestAction('Main/vdpa', array('return')) ?>
                                                                                        contenedor.add(gDPA); 
                                                                                        contenedor.getLayout().setActiveItem(gDPA);   
                                                                                        activo_dpa=true;
                                                                                    }
                                                                                }
                                                                            }
                                                                        },
                                                                        {
                                                                            xtype    :'button',
                                                                            text     :'Asignación Tutores',
                                                                            scale    :'large',                            
                                                                            maxWidth : 350,
                                                                            minWidth : 310, 
                                                                            margin   : 20,
                                                                            listeners:
                                                                                {
                                                                                click:function()
                                                                                {
                                                                                    Ext.getCmp('instrucciones').setText('Asignar alumnos a los tutores, Carta de Asignación');
                                                                                    var contenedor=Ext.getCmp('main');
                                                                                    if(!activo_asignar)
                                                                                    {
<?php echo $this->requestAction('Main/vasignar', array('return')) ?>
                                                                                        contenedor.add(vtnAsignar); 
                                                                                        contenedor.getLayout().setActiveItem(vtnAsignar);   
                                                                                        activo_asignar=true;
                                                                                    }
                                                                            }
                                                                        }
                                                                    },
                                                                    {
                                                                            xtype    :'button',
                                                                            text     :'Tutorias',
                                                                            scale    :'large',                            
                                                                            maxWidth : 350,
                                                                            minWidth : 310, 
                                                                            margin   : 20,
                                                                            listeners:
                                                                                {
                                                                                click:function()
                                                                                {
                                                                                    Ext.getCmp('instrucciones').setText('Crear y Revisar las tutorias del alumno');
                                                                                    var contenedor=Ext.getCmp('main');
                                                                                    if(!activo_tutorias)
                                                                                    {
<?php echo $this->requestAction('Main/vtutorias', array('return')) ?>
                                                                                        contenedor.add(vtnTutorias); 
                                                                                        contenedor.getLayout().setActiveItem(vtnTutorias);   
                                                                                        activo_tutorias=true;
                                                                                    }
                                                                            }
                                                                        }
                                                                    },

                                                                ]                    
                                                            },
                                                            {
                                                                region: 'center',                    
                                                                items :
                                                                    [
                                                                    {                            
                                                                        xtype   : 'label',
                                                                        text    : 'Instrucciones de Uso',
                                                                        id      : 'instrucciones',
                                                                    }
                                                                ]
                                                            }
                                                        ]
                                                    },
                                                    // ------------------------------------------------------------------
                                                    {
                                                        region: 'center',
                                                        xtype: 'panel',
                                                        // --------------------------------------------------------------
                                                        layout: 'border',
                                                        border: 10,
                                                        items: [

                                                            {
                                                                region  : 'center',                                                            
                                                                items   :
                                                                    [
                                                                    {
                                                                        xtype           :'tabpanel',
                                                                        id              :'main',
                                                                        deferredRender  : false,
                                                                        activeTab       : 0,
                                                                        minWidth        : '100%',
                                                                        maxWidth        : '100%',
                                                                        items           : 
                                                                            [
                                                                            {
                                                                                contentEl   : 'centerTab',
                                                                                title       : 'Principal',
                                                                                closable    : false,
                                                                                autoScroll  : true,
                                                                                id          : 'mainContainer'
                                                                            }
                                                                        ],                            
                                                                    }
                                                                ]
                                                            },
                                                            /*
                  {
                    region: 'south',
                    title: "Selection", 
                    split: true,
                    height: 200,
                    collapsible: true,
                    html: 'Nested Center'
                  }
                                                             */

                                                        ]
                                                    },        
                                                ]//fin de las regiones


                                            }); 
                                        });

</script>
<div id="centerTab" class="x-hide-display">
    <div id="img-wrapp">
    <?php
        echo $this->Html->image('Logopoli.png', array('id'=> 'logopoli', 'width'=>564, 'height'=>186));
        echo $this->Html->image('logo.png'    , array('id'=> 'tutorapplogo', 'width'=>170, 'height'=>170));
        echo "<h1>TutorApp<br>Sistema Institucional para Tutorías</h1>";
        echo $this->Html->image('unipollo.png', array('id'=> 'unipollo', 'width'=>300, 'height'=>320));
    ?>
    </div>
</div>
<div id="div-content"  style="display:none;"></div>