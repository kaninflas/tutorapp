//<script>
    var id_enviar=0;  
   //---------------------------------------------------------------
   //  Cargamos un store con los datos de los alumnos
   //---------------------------------------------------------------
   var alumnos = Ext.create('Ext.data.Store', {         
        storeId: 'alumnos',              
        autoSync: true,
        fields: ['id', 'nombre'],
        proxy: {
            type: 'ajax',
            api:{
              read      : '<?php echo $this->Html->url('/Main/alumnos_matricula');?>', 
            },
            reader: {
                type: 'json',
                root: 'items'
            }
        }
    });
   //---------------------------------------------------------------
   //  Cargamos un store con tutorias
   //---------------------------------------------------------------
   var tutorias = Ext.create('Ext.data.Store', {         
        storeId: 'dpa',              
        pageSize:20,    
        fields: ['id', 'programa_educativo','fecha_asignacion','num_sesion','fecha_sesion','acuerdos','estatus','notas_personales'],
        proxy: {
            type: 'ajax',
            api:{
              read      : '<?php echo $this->Html->url('/Main/tutorias')?>',              
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
        }     
    });
var vtnTutorias = Ext.create('Ext.panel.Panel', {
    layout: {
        type    : 'vbox',
        align   : 'stretch'     
    },    
    title: 'Tutorias',
    items: [
        {
            xtype   : 'panel',          
            flex    : 2,            
            items:
            [
                {
                    id          : 'enviar_alumno',
                    xtype       : 'combo',
                    valueField  : 'id',                                            
                    displayField: 'nombre',             
                    store       : alumnos,
                    width       : 400,
                    fieldLabel  : 'Seleccione Alumno',
                    editable    : false,
                    padding     : '0,0,0,20'
                },
                {
                    xtype       :'button',
                    text        :'Cargar',
                    margin      : '5, 0, 10, 105',
                    handler     : function() {                                                                                  
                       var valor=Ext.getCmp('enviar_alumno').value;
                       id_enviar=valor;
                       var store= Ext.getStore(tutorias).getProxy();                                                      
                          Ext.apply(store.api, {                                                         
                              read    : '<?php echo $this->Html->url('/Main/tutorias/');?>'+id_enviar                              
                          });                     
                        tutorias.load();
                    }
                },
                 {
                    xtype: 'grid',          
                    flex: 1,            
                    verticalScrollerType: 'paginggridscroller',
                    title   : 'Historial Tutorias',
                    store   :  tutorias, 
                    closable: false,          
                    columns: [
                        {
                            header      : 'Id',  
                            dataIndex   : 'id',                              
                        },
                        {
                            header      : 'programa_educativo ',  
                            dataIndex   : 'programa_educativo',                               
                        },  
                        {
                            header      : 'fecha_asignacion ',  
                            dataIndex   : 'fecha_asignacion',                              
                        },
                        {
                            header      : 'fecha_sesion',  
                            dataIndex   : 'fecha_sesion',                              
                        },                                      
                        {
                            header      : 'num_sesion',  
                            dataIndex   : 'num_sesion',                              
                        },
                        {
                            header      : 'acuerdos',  
                            dataIndex   : 'acuerdos',
                            minWidth    : 200                             
                        },
                        {
                            header      : 'estatus',  
                            dataIndex   : 'estatus',                             
                        },
                        {
                            header      : 'notas_personales',  
                            dataIndex   : 'notas_personales',                             
                        },
                    ],
                    dockedItems : [
                        {
                            xtype   : 'toolbar',
                            items   : 
                                    [
                                        {                    
                                            text    : 'Nueva Tutoria',
                                            scope   : this,
                                            handler : function(){  
                                                if (id_enviar=="0"){
                                                    Ext.Msg.alert("¡Error!","Porfavor seleccione un alumno, y presione el boton cargar");
                                                }
                                                else
                                                {
                                                    <?php echo $this->requestAction('Main/alta_tutoria', array('return')) ?>
                                                    vtnAltaTutoria.show();   
                                                }                                                
                                            }
                                        }   
                                    ]
                        }
                    ],              
                }
            
            ]
        },
    ]

});
    


  