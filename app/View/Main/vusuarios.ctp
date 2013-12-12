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
                read      : '<?php echo $this->Html->url('/Main/usuarios'); ?>',              
                destroy   : '<?php echo $this->Html->url('/Main/borrar/User'); ?>'
            },
            reader: {
                type: 'json',
                root: 'items'
            }
        }
    });
    //---------------------------------------------------------------
    //  Cargamos un store con el combobox de los tipos de usuarios
    //---------------------------------------------------------------
    var storeRoles = Ext.create('Ext.data.Store', {
        fields: ['nombre','rol'],
        data : [
            {nombre: 'Admin',       rol: 'admin'},
            {nombre: 'Dpa',         rol: 'dpa'},
            {nombre: 'Tutor',       rol: 'tutor'},
            {nombre: 'Alumno',      rol: 'alumno'},
            {nombre: 'Por Asignar', rol: 'Por Asignar' }
        ]
    });
    //---------------------------------------------------------------
    //  Creamos un grid que muestre los usuarios
    //---------------------------------------------------------------
    var gUsuarios= Ext.create('Ext.grid.Panel', {
        verticalScrollerType: 'paginggridscroller',
        title: 'Usuarios',
        store: usuarios,
        closable: false,  
        plugins: [{
                ptype: 'cellediting',
                clicksToEdit: 1
            }],          
        columns: [
            {
                header      : 'Id',  
                dataIndex   : 'id',   
                width       :  55               
            },
            {
                header      : 'Nombre Usuario',  
                dataIndex   : 'username',   
                width       :  150              
            },                
            {
                header      : 'Tipo Usuario',  
                dataIndex   : 'rol',  
                width       :  150,  
                editor: {
                    xtype: 'combobox',
                    store: storeRoles,
                    queryMode: 'local',
                    displayField: 'nombre',
                    valueField: 'rol',
                    listeners: {
                        /*
                         * Asigno roles y defino la relación del usuario que se creará.
                         */
                        select: function(combo, recs, opts){  
                            //Asigno id a usuario
                            id_principal_usuario = gUsuarios.getSelectionModel().getSelection()[0].data.id
                            rol_usuario_seleccionado = recs[0].data.rol
                            var storeUsuariosTipo;   
                             Ext.Ajax.request({
                                    url: GLOBAL_PATH + 'Users/asigna_rol',
                                    method: 'POST',     
                                    params:{
                                        rol: rol_usuario_seleccionado,
                                        id: id_principal_usuario
                                    },
                                    success: function(response){     
                                        usuarios.load();
                                    },  
                                    failure: function(response){
                                        console.log("error: " + response.responseText);
                                        console.log("error:" + response.status);
                                    }
                             }); 
                            /*if( rol_usuario_seleccionado == 'admin' || rol_usuario_seleccionado == 'Por Asignar'){                            
                                Ext.Ajax.request({
                                    url: GLOBAL_PATH + 'Users/asigna_rol',
                                    method: 'POST',     
                                    params:{
                                        rol: rol_usuario_seleccionado,
                                        id: id_principal_usuario
                                    },
                                    success: function(response){     
                                        usuarios.load();
                                    },  
                                    failure: function(response){
                                        console.log("error: " + response.responseText);
                                        console.log("error:" + response.status);
                                    }
                                }); 
                            }else{    
                                    <?php echo $this->requestAction('Main/vusuarios_rol', array('return')) ?>//pedimos la ventana del alumno que se encuentra en otra vista
                                    btnAsignaRol.show();   //como ya esta hecha la peticion a la vista ahora la abrimos con el mismo nombre que tiene                             
                                                               
                            }*/
                            combo.fireEvent('blur'); 
        
                            }
                        }
                    }
                    
                },
                {
                    header      : 'E-mail',  
                    dataIndex   : 'correo', 
                    width       :  250              
                },
                {
                    header      : 'Fecha de registro',  
                    dataIndex   : 'fecha',  
                    width       :   200               
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
   