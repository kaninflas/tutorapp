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
   //---------------------------------------------------------------
   //  Cargamos un store con todos los datos de la tabla dpa
   //---------------------------------------------------------------
   var dpa = Ext.create('Ext.data.Store', {         
        storeId: 'dpa',      
        autoLoad: true,
        autoSync: true,
        pageSize:20,    
        fields: ['id', 'nombre','primer_apellido','segundo_apellido','id_usuario'],
        proxy: {
            type: 'ajax',
            api:{
              read      : '<?php echo $this->Html->url('/Main/dpa')?>',
              destroy   : '<?php echo $this->Html->url('/Main/borrar/DPA')?>'
            },
            reader: {
                type: 'json',
                root: 'items'
            },
            writer: {
                type: 'json'
            }
        },
        listeners: {
            write: function(store, operation){
            var record = operation.getRecords()[0],
            name = Ext.String.capitalize(operation.action),
            verb;

            if (name == 'Destroy') {
                record = operation.records[0];
                verb = 'eliminado';
                dpa.load();
            } 
            Ext.Msg.alert('Operacion exitosa', "DPA " + verb + " correctamente");

            }
        }     
    });
   //---------------------------------------------------------------
   //  Creamos un grid que muestre los DPA
   //---------------------------------------------------------------
    var gDPA= Ext.create('Ext.grid.Panel', {
            verticalScrollerType: 'paginggridscroller',
            title: 'DPA',
            store: dpa,
            closable: false,            
            columns: [
                {
                    header      : 'Id',  
                    dataIndex   : 'id',   
                    width       :  55,               
                },
                {
                    header      : 'Nombre',  
                    dataIndex   : 'nombre',   
                    width       :  150,               
                },                
                {
                    header      : 'Apellido Paterno',  
                    dataIndex   : 'primer_apellido',  
                    width       :  150,                
                },
                {
                    header      : 'Apellido Materno',  
                    dataIndex   : 'segundo_apellido', 
                    width       :  150,                
                },
                {
                    header      : 'Id usuario',  
                    dataIndex   : 'id_usuario',  
                    width       :  100,               
                }, 
                {
                    xtype   : 'actioncolumn',
                    width   :  100,
                    header  : '',
                    items   : 
                    [
                        {                            
                            icon   : '../tutorapp/app/webroot/img/delete.png',  
                            tooltip: 'Eliminar DPA',                            
                            handler:function(grid, rowIndex, colIndex) {
                                Ext.MessageBox.confirm('¡Importante!', '¿Esta seguro de eliminar esto de manera permanente?', function(btn){
                                    if(btn == 'yes'){
                                        var renglon = grid.getStore().getAt(rowIndex);
                                        dpa.remove(renglon);
                                    }
                                });
                            }
                        }
                    ]
                }              
            ],
             dockedItems : [{
                xtype   : 'toolbar',
                items   : [{
                    
                    text    : 'Agregar',
                    scope   : this,
                    handler : function(){  
                        <?php  echo $this->requestAction('Main/alta_dpa',array('return'))?>//pedimos la ventana del DPA que se encuentra en otra vista
                        vtnAltaDPA.show();   //como ya esta hecha la peticion a la vista ahora la abrimos con el mismo nombre que tiene                                    
                    }
                }]
            }],
                        
    }); 
    //---------------------------------------------------------------
   //  Cargamos un store con todos los datos de la tabla tutores
   //---------------------------------------------------------------
   var tutores = Ext.create('Ext.data.Store', {         
        storeId: 'tutores',      
        autoLoad: true,
        autoSync:true,
        fields: ['id', 'nombre','primer_apellido','segundo_apellido','id_usuario'],
        proxy: {
            type: 'ajax',
            api:{
              read      : '<?php echo $this->Html->url('/Main/tutores');?>',
              destroy   : '<?php echo $this->Html->url('/Main/borrar/Tutores')?>'
            },
            reader: {
                type: 'json',
                root: 'items'
            }
        }
    });
   //---------------------------------------------------------------
   //  Creamos un grid que muestre los Tutores
   //---------------------------------------------------------------
    var gTutores= Ext.create('Ext.grid.Panel', {
            verticalScrollerType: 'paginggridscroller',
            title: 'Tutores',
            store: tutores,
            closable: false,            
            columns: [
                {
                    header      : 'Id',  
                    dataIndex   : 'id',   
                    width       :  55,               
                },
                {
                    header      : 'Nombre',  
                    dataIndex   : 'nombre',   
                    width       :  150,               
                },                
                {
                    header      : 'Apellido Paterno',  
                    dataIndex   : 'primer_apellido',  
                    width       :  150,                
                },
                {
                    header      : 'Apellido Materno',  
                    dataIndex   : 'segundo_apellido', 
                    width       :  150,                
                },
                {
                    header      : 'Id usuario',  
                    dataIndex   : 'id_usuario',  
                    width       :  55,               
                }, 
                {
                    xtype   : 'actioncolumn',
                    width   :  100,
                    header  : '',
                    items   : 
                    [
                        {                            
                            icon   : '../tutorapp/app/webroot/img/delete.png',  
                            tooltip: 'Eliminar Tutor',                            
                            handler:function(grid, rowIndex, colIndex) {
                                Ext.MessageBox.confirm('¡Importante!', '¿Esta seguro de eliminar esto de manera permanente?', function(btn){
                                    if(btn == 'yes'){
                                        var renglon = grid.getStore().getAt(rowIndex);
                                        tutores.remove(renglon);
                                    }
                                });
                            }
                        }
                    ]
                }              
            ],
             dockedItems : [{
                xtype   : 'toolbar',
                items   : [{
                    
                    text    : 'Agregar',
                    scope   : this,
                    handler : function(){  
                        <?php  echo $this->requestAction('Main/alta_tutor',array('return'))?>//pedimos la ventana del DPA que se encuentra en otra vista
                        vtnAltaTutor.show();   //como ya esta hecha la peticion a la vista ahora la abrimos con el mismo nombre que tiene                                    
                    }
                }]
            }],              
                        
    }); 
  

   //---------------------------------------------------------------
   //  Cargamos un store con todos los datos de la tabla usuarios
   //---------------------------------------------------------------
   var usuarios = Ext.create('Ext.data.Store', { 
      storeId: 'usuarios',      
      autoLoad: true,
      autoSync: true,
        fields: ['id', 'username','password','rol','correo','fecha','activo'],
        proxy: {
            type: 'ajax',
            api:{
              read      : '<?php echo $this->Html->url('/Main/usuarios');?>',              
              destroy   : '<?php echo $this->Html->url('/Main/borrar/User');?>'
            },
            reader: {
                type: 'json',
                root: 'items'
            }
        }
    });
   //---------------------------------------------------------------
   //  Creamos un grid que muestre los usuarios
   //---------------------------------------------------------------
    var gUsuarios= Ext.create('Ext.grid.Panel', {
            verticalScrollerType: 'paginggridscroller',
            title: 'Usuarios',
            store: usuarios,
            closable: false,            
            columns: [
                {
                    header      : 'Id',  
                    dataIndex   : 'id',   
                    width       :  55,               
                },
                {
                    header      : 'Nombre Usuario',  
                    dataIndex   : 'username',   
                    width       :  150,               
                },                
                {
                    header      : 'Tipo Usuario',  
                    dataIndex   : 'rol',  
                    width       :  150,                
                },
                {
                    header      : 'E-mail',  
                    dataIndex   : 'correo', 
                    width       :  250,                
                },
                {
                    header      : 'Fecha de registro',  
                    dataIndex   : 'fecha',  
                    width       :   200,               
                },
                {
                    header      : 'Estatus',  
                    dataIndex   : 'activo', 
                    width       :  100,
                    renderer    : function(val) {
                        if (val=='0'){return 'Inactivo';}
                        else{return 'Activo';}                        
                    }               
                },
                {
                    xtype   : 'actioncolumn',
                    width   :  100,
                    header  : '',
                    items   : 
                    [
                        {                            
                            icon   : '../tutorapp/app/webroot/img/delete.png',  
                            tooltip: 'Eliminar Usuario',                            
                            handler:function(grid, rowIndex, colIndex) {
                                Ext.MessageBox.confirm('¡Importante!', '¿Esta seguro de eliminar esto de manera permanente?', function(btn){
                                    if(btn == 'yes'){
                                        var renglon = grid.getStore().getAt(rowIndex);
                                        usuarios.remove(renglon);
                                        usuarios.load();
                                    }
                                });
                            }
                        },
                        {                            
                            icon   : '../tutorapp/app/webroot/img/unlock.png',  
                            tooltip: 'Activar Usuario',                                                                           
                            handler:function(grid, rowIndex, colIndex) {
                                Ext.MessageBox.confirm('¡Importante!', '¿Esta seguro de activar al usuario?', function(btn){
                                    if(btn == 'yes'){
                                        var renglon = grid.getStore().getAt(rowIndex);                                        
                                        var id=renglon.get('id');

                                        Ext.Ajax.request({
                                             url:'<?php echo $this->Html->url('/Main/activar/') ?>'+id,
                                             scripts: false,
                                             success: function(response){usuarios.load();},
                                             failure: function(response){usuarios.load();}
                                         });                                          
                                    }
                                });
                            }
                        },
                    ]
                }   
            ]            
    }); 
    //---------------------------------------------------------------
   //  Cargamos un store con todos los datos de la tabla alumnos
   //---------------------------------------------------------------
   var alumnos = Ext.create('Ext.data.Store', {         
        storeId: 'alumnos',      
        autoLoad: true,
        autoSync: true,
        fields: ['id', 'nombre','primer_apellido','segundo_apellido','carrera','matricula','cuatrimestre','id_usuario'],
        proxy: {
            type: 'ajax',
            api:{
              read: '<?php echo $this->Html->url('/Main/alumnos');?>',
              destroy   : '<?php echo $this->Html->url('/Main/borrar/Alumnos')?>'
            },
            reader: {
                type: 'json',
                root: 'items'
            }
        }
    });



   //---------------------------------------------------------------
   //  Creamos un grid que muestre los alumnos
   //---------------------------------------------------------------
    var gAlumnos = Ext.create('Ext.grid.Panel', {
            verticalScrollerType: 'paginggridscroller',
            title   : 'Alumnos',
            store   : alumnos, 
            closable: false,          
            columns: [
                {
                    header      : 'Id',  
                    dataIndex   : 'id',   
                    width       :  55,               
                },
                {
                    header      : 'Matricula ',  
                    dataIndex   : 'matricula',   
                    width       :  150,               
                },  
                {
                    header      : 'Nombre ',  
                    dataIndex   : 'nombre',   
                    width       :  150,               
                },                
                {
                    header      : 'Apellido Paterno',  
                    dataIndex   : 'primer_apellido',  
                    width       :  150,                
                },
                {
                    header      : 'Apellido Materno',  
                    dataIndex   : 'segundo_apellido', 
                    width       :  150,                
                },
                {
                    header      : 'Carrera',  
                    dataIndex   : 'carrera',  
                    width       :   150,               
                },
                {
                    header      : 'Cuatrimestre',  
                    dataIndex   : 'cuatrimestre', 
                    width       :  70                
                },
                {
                    xtype   : 'actioncolumn',
                    width   :  100,
                    header  : '',
                    items   : 
                    [
                        {                            
                            icon   : '../tutorapp/app/webroot/img/delete.png',  
                            tooltip: 'Eliminar Alumno',                            
                            handler:function(grid, rowIndex, colIndex) {
                                Ext.MessageBox.confirm('¡Importante!', '¿Esta seguro de eliminar esto de manera permanente?', function(btn){
                                    if(btn == 'yes'){
                                        var renglon = grid.getStore().getAt(rowIndex);
                                        alumnos.remove(renglon);
                                    }
                                });
                            }
                        }
                    ]
                }              
            ],
             dockedItems : [{
                xtype   : 'toolbar',
                items   : [{                    
                    text    : 'Agregar',
                    scope   : this,
                    handler : function(){  
                        <?php  echo $this->requestAction('Main/alta_alumno',array('return'))?>//pedimos la ventana del alumno que se encuentra en otra vista
                        vtnAltaAlumno.show();   //como ya esta hecha la peticion a la vista ahora la abrimos con el mismo nombre que tiene                                    
                    }
                }]
            }],     
        });
   
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