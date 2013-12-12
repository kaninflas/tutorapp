//<script>
    //---------------------------------------------------------------
    //  Cargamos un store con los datos de los usuarios
    //---------------------------------------------------------------
    var storeIdUsuarios = Ext.create('Ext.data.Store', {         
        storeId: 'storeIdUsuarios',              
        autoSync: true,
        mode: 'remote',
        fields: ['id', 'nombre'],
        proxy: {
            type: 'ajax',
            api:{
                read      : GLOBAL_PATH + 'Main/list_idusuarios'
            }, 
            reader: {
                type: 'json',
                root: 'data'
            }
        }
    });


    vtnAltaTutor=Ext.create('Ext.window.Window', {    
	title		: 'Alta Tutor',
	height		: 210,
	width		: 360,
	layout		: 'fit',
	closable	: true,
	closeAction	: 'destroy',
	maximizable	:false,
	constrain	:true,
	animateTarget: this,	
    });


    var form=Ext.create('Ext.form.Panel', {    	
	height		: 200,
	width		: 350,
	layout		: 'fit',
	animateTarget: this,
	items		:
            [
            {
                xtype		: 'form',
                id 			: 'form',			
                bodyPadding	: 5,
                width		: 300,
                submitValue :true,
                items: [
                    {
                        xtype		:'textfield',
                        width		: 300,
                        name		:'nombre',
                        fieldLabel	:'Nombre',
                        allowBlank	: false,
                        blankText	:'Indique nombre'										
                    },	
                    {
                        xtype		:'textfield',
                        width		: 300,
                        name		:'primer_apellido',
                        fieldLabel	:'A. Paterno',
                        allowBlank	: false, 	
                        blankText	:'Indique Apellido'										
                    },
                    {
                        xtype		:'textfield',
                        width		: 300,
                        name		:'segundo_apellido',
                        fieldLabel	:'A. Materno',
                        allowBlank	: false,
                        blankText	:'Indique Apellido'										
                    },
                    
                    {
                        id          : 'combo_idUsuario',
                        name        : 'combo_idUsuario',
                        xtype       : 'combo',
                        valueField  : 'id',                                            
                        displayField: 'nombre',             
                        store       : storeIdUsuarios,
                        width       : 300,
                        fieldLabel  : 'Asignar Usuario:',
                        editable    : false,
                        allowBlank  : false,
                        listeners: {
                            listeners: {
                                beforequery: function(qe){
                                    delete qe.combo.lastQuery;                                    
                                }
                            }
                        }
                        
                    }

                ]
            }
	],
	buttons: [
            {
                text 	:'Guardar',
                handler	: function() {             	
                    var form = this.up('form').getForm(); 
                    
                    // Verifico que el usuario_id no vaya vacío
                    var combo_id_usuario = Ext.getCmp('combo_idUsuario')
                    
                    if( combo_id_usuario.getValue() == null || 
                        combo_id_usuario.getValue() == 0    || 
                        combo_id_usuario.getValue() == ''){
                        
                        userAdmin_flag  = true;
                        Ext.Ajax.request({
                            url: GLOBAL_PATH + 'Users/add',
                            method: 'GET',                                   
                            //scripts: true,
                            success: function(response){    
                                temp = new Function(response.responseText);
                                temp();
                                userAdmin_flag  = false;
                            },  
                            failure: function(response){
                                console.log("error: " + response.responseText);
                                console.log("error:" + response.status);
                            }
                        });
                    }
                    
                    if (form.isValid()) {
                  	form.submit({ 
	                    waitMsg:'Creando Tutor...',
	                    waitTitle: 'Guardando...', 
	                    url: GLOBAL_PATH+'Main/tutor_crear/',
	                    success: function(form, action) {		                     
                                form.reset();
                                vtnAltaTutor.destroy();
                                Ext.Msg.alert('¡Completado!',"El Tutor ha sido creado");
                                tutores.load();	                   
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

    vtnAltaTutor.add(form);
    vtnAltaTutor.doLayout();