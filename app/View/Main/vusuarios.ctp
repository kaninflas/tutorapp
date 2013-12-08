//<script>

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
                            icon   : GLOBAL_PATH + 'img/delete.png',  
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
                            icon   : GLOBAL_PATH + 'img/unlock.png',  
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
   