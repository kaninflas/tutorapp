//<script>
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
                            icon   : GLOBAL_PATH + 'img/datos.png',  
                            tooltip: 'Datos Personales Alumno',                             
                            handler:function(grid, rowIndex, colIndex) {
                                var row=alumnos.getAt(rowIndex);
                                var id_seleccionado=row.get('id')
                                var nombre_seleccionado=row.get('nombre')+" "+row.get('primer_apellido')+" "+row.get('segundo_apellido');
                                
                                <?php  echo $this->requestAction('Main/alta_datos',array('return'))?>
                                vtnAltaDatos.show();                       
                            }
                        },
                         {                            
                            icon   : GLOBAL_PATH + 'img/delete.png',  
                            tooltip: 'Eliminar Alumno',                            
                            handler:function(grid, rowIndex, colIndex) {
                                Ext.MessageBox.confirm('¡Importante!', '¿Esta seguro de eliminar esto de manera permanente?', function(btn){
                                    if(btn == 'yes'){
                                        var renglon = grid.getStore().getAt(rowIndex);
                                        alumnos.remove(renglon);
                                    }
                                });
                            }
                        },

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
   