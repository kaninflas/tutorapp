//<script>



vtnAltaAlumno=Ext.create('Ext.window.Window', {    
	title		: 'Alta Alumno',
	height		: 260,
	width		: 360,
	layout		: 'fit',
	closable	: true,
	closeAction	: 'destroy',
	maximizable	:false,
	constrain	:true,
	animateTarget: this,	
});


var form=Ext.create('Ext.form.Panel', {    	
	height		: 250,
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
					xtype		:'textfield',
					width		: 300,
					name		:'carrera',
					fieldLabel	:'Carrera',
					allowBlank	: false,
					blankText	:'Indique carrera'										
				},
				{
					xtype		:'textfield',
					width		: 300,
					name		:'matricula',
					fieldLabel	:'Matricula',
					allowBlank	: false,
					blankText	:'Indique Matricula'										
				},
				{
					xtype		:'textfield',
					width		: 300,
					name		:'cuatrimestre',
					fieldLabel	:'Cuatrimestre',
					allowBlank	: false,
					blankText	:'Indique cuatrimestre'										
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
	                    waitMsg:'Creando Alumno...',
	                    waitTitle: 'Guardando...', 
	                    url: GLOBAL_PATH+'Main/alumno_crear/',
	                    success: function(form, action) {		                     
		                    form.reset();
		                    vtnAltaAlumno.destroy();
		                    Ext.Msg.alert('¡Completado!',"El Alumno ha sido creado");
		            		alumnos.load();	                   
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

vtnAltaAlumno.add(form);
vtnAltaAlumno.doLayout();