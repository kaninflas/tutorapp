//<script>
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
                            icon   : GLOBAL_PATH + 'img/delete.png',  
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