//<script>
var estatus = Ext.create('Ext.data.Store', {
    fields: ['estatus'],
    data : [
        {"estatus":"Inicio"},
        {"estatus":"Seguimiento"},
        {"estatus":"Termino"}        
      ] 
});


vtnAltaTutoria=Ext.create('Ext.window.Window', {    
	title		: 'Nueva Tutoria',
	height		: 420,
	width		: 360,
	layout		: 'fit',
	closable	: true,
	closeAction	: 'destroy',
	maximizable	:false,
	constrain	:true,
	animateTarget: this	
});


var form=Ext.create('Ext.form.Panel', {    	
	height		: 410,
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
					hidden		: true,
					name		:'id_alumno',
					value 		: id_enviar				
				},
				{
					xtype		:'textfield',
					width		: 300,
					name		:'programa_educativo',
					fieldLabel	:'Programa Educativo',
					allowBlank	: false,
					blankText	:'Indique Programa Educativo'										
				},	
				{
					xtype		:'datefield',
					format 		:'Y-m-d',					
					width		: 300,
					name		:'fecha_asignacion',
					fieldLabel	:'Fecha asignacion',
					allowBlank	: false, 	
					blankText	:'Indique Fecha asignacion'										
				},
				{
					xtype		:'datefield',
					format 		:'Y-m-d',
					maxDate		: new Date(),
					width		: 300,
					name		:'fecha_sesion',
					fieldLabel	:'Fecha Sesion',
					allowBlank	: false, 	
					blankText	:'Indique Fecha Sesion'										
				},
				{
					xtype		:'combo',
					store 		:estatus,
                    displayField:'estatus',
                    valueField	:'estatus',
                    editable	:false,
					width		: 300,
					name		:'estatus',
					fieldLabel	:'Estatus',
					allowBlank	: false, 	
					blankText	:'Indique Estatus'										
				},
				{
					xtype		:'textfield',
					width		: 200,
					name		:'num_sesion',
					fieldLabel	:'Numero de la sesion ',
					allowBlank	: false,
					blankText	:'Indique Numero'										
				},	
				{
					xtype		:'textarea',
					width		: 300,
					name		:'acuerdos',
					fieldLabel	:'Acuerdos',
					allowBlank	: false, 	
					blankText	:'Indique Acuerdos'										
				},				
				{
					xtype		:'textfield',
					width		: 300,
					name		:'notas_personales',
					fieldLabel	:'Notas Personales',
					allowBlank	: true, 	
					blankText	:'Indique Notas Personales'										
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
	                    waitMsg:'Creando Tutoria...',
	                    waitTitle: 'Guardando...', 
	                    url: GLOBAL_PATH+'Main/tutoria_crear/',
	                    success: function(form, action) {		                     
		                    form.reset();
		                    vtnAltaTutoria.destroy();
		                    Ext.Msg.alert('¡Completado!',"Tutoria almacenada");
		            		tutorias.load();	                   
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

vtnAltaTutoria.add(form);
vtnAltaTutoria.doLayout();