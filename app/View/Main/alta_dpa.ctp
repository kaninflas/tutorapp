//<script>



vtnAltaDPA=Ext.create('Ext.window.Window', {    
	title		: 'Alta DPA',
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

			]
		}
	],
	buttons: [
		{
			text 	:'Guardar',
			handler	: function() {             	
                var form = this.up('form').getForm();                
                if (form.isValid()) {
                  	form.submit({ 
	                    waitMsg:'Creando DPA...',
	                    waitTitle: 'Guardando...', 
	                    url: GLOBAL_PATH+'Main/dpa_crear/',
	                    success: function(form, action) {		                     
		                    form.reset();
		                    vtnAltaDPA.destroy();
		                    Ext.Msg.alert('¡Completado!',"El DPA ha sido creado");
		            		dpa.load();	                   
	                    },	                     
                   });
                }
                else{
                   Ext.Msg.alert('Error', 'Debe llenar los datos del formulario');
                }                 
            }         		
		}
	]
});

vtnAltaDPA.add(form);
vtnAltaDPA.doLayout();