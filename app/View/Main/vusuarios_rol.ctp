//<script>
    //---------------------------------------------------------------
    //  Cargamos un store con los datos del usuario seleccionado
    //---------------------------------------------------------------
    var storeUsers = Ext.create('Ext.data.Store', {         
        storeId: 'storeUsers',              
        autoSync: false,
        fields: ['id', 'nombre'],
        proxy: {
            type: 'ajax',
            api:{
                read      : GLOBAL_PATH + 'Main/vusuarios_listarol'
            },            
            extraParams: {                 
                rol: rol_usuario_seleccionado
            },
            reader: {
                type: 'json',
                root: 'data'
            }
        }
    });

    btnAsignaRol =Ext.create('Ext.window.Window', {    
	title		: 'Asignación de Rol',
	height		: 130,
	width		: 450,
	layout		: 'fit',
	closable	: true,
	closeAction	: 'destroy',
	maximizable	: false,
	constrain	: true,
	animateTarget: this	
    });


    var form=Ext.create('Ext.form.Panel', {    	
	height		: 130,
	width		: 450,
	layout		: 'fit',
	animateTarget: this,
	items		:
            [
            {
                xtype		: 'form',
                name            : 'formUsuariosRol',
                id              : 'formUsuariosRol',			
                bodyPadding	: 5,
                width		: 450,
                submitValue : true,
                items: [
                    {
                        id          : 'rol_id_user',
                        name        : 'id',
                        xtype       : 'combo',
                        valueField  : 'id',                                            
                        displayField: 'nombre',             
                        store       : storeUsers,
                        width       : 400,
                        fieldLabel  : 'Seleccione Usuario',
                        editable    : false,
                        padding     : '0 0 0 10'
                    },
                    {
                        xtype		:'textfield',					
                        hidden		: true,
                        name		:'id_usuario',
                        value 		: id_principal_usuario		
                    },
                    {
                        xtype		:'textfield',					
                        hidden		: true,
                        name		:'rol',
                        value 		: rol_usuario_seleccionado		
                    }
                ]
            }
	],
	buttons: [
            {
                text 	:'Agregar',
                handler	: function() { 
                    switch(rol_usuario_seleccionado){
                        case 'tutor':
                            <?php  echo $this->requestAction('Main/alta_tutor',array('return')); ?>//pedimos la ventana del DPA que se encuentra en otra vista
                            vtnAltaTutor.show();  
                            
                            <?php  ?>
                        break;
                        
                        case 'alumno':
                            <?php echo $this->requestAction('Main/alta_alumno', array('return'));?>//pedimos la ventana del alumno que se encuentra en otra vista
                            vtnAltaAlumno.show();  
                        break;
                        
                        case 'dpa':
                            <?php  echo $this->requestAction('Main/alta_dpa',array('return'));   ?>//pedimos la ventana del DPA que se encuentra en otra vista
                            vtnAltaDPA.show();
                        break;
                    }
                                
                }         		
            },
            
            
            {
                text 	:'Guardar',
                handler	: function() {             	
                    var form = this.up('form').getForm();                
                    if (form.isValid()) {
                  	form.submit({ 
	                    waitMsg:'Guardando',
	                    waitTitle: 'Guardando...', 
	                    url: GLOBAL_PATH+ 'Main/asigna_rol',
	                    success: function(form, action) {		                     
                                form.reset();
                                btnAsignaRol.destroy();
                                
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
                                
                                Ext.Msg.alert('¡Completado!',"Datos guardados");                 
	                    }	                     
                        });
                    }
                    else{
                        Ext.Msg.alert('Error', 'Debe llenar los datos del formulario');
                    }                 
                }         		
            }
	]
    });

    btnAsignaRol.add(form);
    btnAsignaRol.doLayout();
    

  