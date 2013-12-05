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
    var tabs = 0;      
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
            html: ["<a href='<?php echo $this->html->url("/users/logout"); ?>'>Cerrar Sesión</a>"],
            height: 20
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
                                    <?php  echo $this->requestAction('Main/vusuarios',array('return'))?>
                                    contenedor.add(gUsuarios);                                    
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
                                    <?php  echo $this->requestAction('Main/valumnos',array('return'))?>                                   
                                    contenedor.add(gAlumnos);                                   
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
                                    <?php  echo $this->requestAction('Main/vtutores',array('return'))?>                                   
                                    contenedor.add(gTutores);                                    
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
                                    <?php  echo $this->requestAction('Main/vdpa',array('return'))?>
                                    contenedor.add(gDPA);    

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
                            minWidth        : 1024,
                            maxWidth        : 3200,
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
        Hola mundito
    </div>
<div id="div-content"  style="display:none;"></div>