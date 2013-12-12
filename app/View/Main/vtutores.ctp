//<script>
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
              destroy   : '<?php echo $this->Html->url('/Main/borrar/TutorAlumnos')?>'
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
                            icon   : GLOBAL_PATH + 'img/delete.png',  
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
  
