//<script>



vtnAltaDatos=Ext.create('Ext.window.Window', {    
	title		: nombre_seleccionado,
	height		: 490,
	width		: 650,
	layout		: 'fit',
	closable	: true,
	closeAction	: 'destroy',
	maximizable	:false,
	constrain	:true,
	animateTarget: this,	
});


var form=Ext.create('Ext.form.Panel', {    	
	height		: 480,
	width		: 650,
	layout		: 'fit',
	animateTarget: this,

	items		:
	[
		{
			xtype		: 'form',
			id 			: 'form',			
			bodyPadding	: 15 ,
			width		: 650,
			submitValue :true,			
			items: [					
				{
					xtype	: 'fieldcontainer',
                    layout 	: 'hbox',
                    items	:
                    [
                    	{
                    		xtype	:'label',
                    		width	:70,
                    		padding :'5',
                    		text 	:'CALLE'
                    	},
                    	{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,							
							name		:'calle',														
							blankText	:'Indique Calle'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'COLONIA'
                    	},
						{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,
							name		:'colonia',														
							blankText	:'Indique colonia'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'C.P.'
                    	},
						{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,
							name		:'codigo_postal',														
							blankText	:'Indique codigo postal '										
						},
                    ]
				},
				{
					xtype	: 'fieldcontainer',
                    layout 	: 'hbox',
                    items	:
                    [
                    	{
                    		xtype	:'label',
                    		width	:70,
                    		padding :'5',
                    		text 	:'TEL.'
                    	},
                    	{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,							
							name		:'telefono',														
							blankText	:'Indique telefono'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'CELULAR'
                    	},
						{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,
							name		:'celular',														
							blankText	:'Indique celular'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'OTRO'
                    	},
						{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,
							name		:'otro_telefono',														
							blankText	:'Indique otro telefono'										
						},
                    ]
				},
				{
					xtype	: 'fieldcontainer',
                    layout 	: 'hbox',
                    items	:
                    [
                    	{
                    		xtype	:'label',
                    		width	:70,

                    		padding :'5',
                    		text 	:'CORREO'
                    	},
                    	{
							xtype		:'textfield',
							width		: 530,							
							allowBlank	: false,							
							name		:'puesto_trabajo',														
							blankText	:'Indique puesto trabajo'										
						},					
                    ]
				},
				{
					xtype	: 'fieldcontainer',
                    layout 	: 'hbox',
                    items	:
                    [
                    	{
                    		xtype	:'label',
                    		width	:70,
                    		padding :'5',
                    		text 	:'SEXO'
                    	},
                    	{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,							
							name		:'sexo',														
							blankText	:'Indique sexo'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'ESTADO CIVIL'
                    	},
						{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,
							name		:'estado_civil',														
							blankText	:'Indique estado civil'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'VIVE CON'
                    	},
						{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,
							name		:'vive_con',														
							blankText	:'Indique vive con'										
						},
                    ]
				},
				{
					xtype	: 'fieldcontainer',
                    layout 	: 'hbox',
                    items	:
                    [
                    	{
                    		xtype	:'label',
                    		width	:70,
                    		padding :'5',
                    		text 	:' TIPO SANGRE'
                    	},
                    	{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,							
							name		:'tipo_sangre',														
							blankText	:'Indique tipo sangre'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'LUGAR NACIMIENTO'
                    	},
						{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,
							name		:'lugar_nacimiento',														
							blankText	:'Indique lugar_nacimiento'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'FECHA NACIMIENTO'
                    	},
						{
							xtype		:'datefield',
							format 		:'Y-m-d',
							width		: 130,							
							allowBlank	: false,
							name		:'fecha_nacimiento',														
							blankText	:'Indique fecha nacimiento'										
						},
                    ]
				},
				{
					xtype	: 'fieldcontainer',
                    layout 	: 'hbox',
                    items	:
                    [
                    	{
                    		xtype	:'label',
                    		width	:70,
                    		padding :'5',
                    		text 	:'BECADO'
                    	},
                    	{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,							
							name		:'becado',														
							blankText	:'Indique becado'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'TIPO BECA'
                    	},
						{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,
							name		:'tipo_beca',														
							blankText	:'Indique tipo beca'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'INSTANCIA BECA'
                    	},
						{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,
							name		:'instancia_beca',														
							blankText	:'Indique instancia beca'										
						},
                    ]
				},
				{
					xtype	: 'fieldcontainer',
                    layout 	: 'hbox',
                    items	:
                    [
                    	{
                    		xtype	:'label',
                    		width	:70,
                    		padding :'5',
                    		text 	:'TRABAJA'
                    	},
                    	{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,							
							name		:'trabaja',														
							blankText	:'Indique trabaja'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'EMPRESA'
                    	},
						{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,
							name		:'empresa_trabajo',														
							blankText	:'Indique empresa trabajo'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'HORIARIO'
                    	},
						{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,
							name		:'horario',														
							blankText	:'Indique horario'										
						},
                    ]
				},				
				{
					xtype	: 'fieldcontainer',
                    layout 	: 'hbox',
                    items	:
                    [
                    	{
                    		xtype	:'label',
                    		width	:200,
                    		padding :'5',
                    		text 	:'PUESTO DE TRABAJO'
                    	},
                    	{
							xtype		:'textfield',
							width		: 400,							
							allowBlank	: false,							
							name		:'puesto_trabajo',														
							blankText	:'Indique puesto trabajo'										
						},					
                    ]
				},
				{
					xtype	: 'fieldcontainer',
                    layout 	: 'hbox',
                    items	:
                    [
                    	{
                    		xtype	:'label',
                    		width	:70,
                    		padding :'5',
                    		text 	:'SERVICIO MEDICO'
                    	},
                    	{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,							
							name		:'servicio_medico',														
							blankText	:'Indique servicio medico'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'TRATMTO. MEDICO'
                    	},
						{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,
							name		:'tratamiento_medico',														
							blankText	:'Indique tratamiento medico'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'OBSERV. TRATMTO.'
                    	},
						{
							xtype		:'textfield',
							width		: 130,							
							allowBlank	: false,
							name		:'tratamiento_observaciones',														
							blankText	:'Indique tratamiento observaciones'										
						},
                    ]
				},
				{
					xtype	: 'fieldcontainer',
                    layout 	: 'hbox',
                    items	:
                    [
                    	{
                    		xtype	:'label',
                    		width	:70,
                    		padding :'5',
                    		text 	:'FECHA'
                    	},
                    	{
							xtype		:'datefield',
							format 		:'Y-m-d',
							width		: 130,							
							allowBlank	: false,							
							name		:'fecha',														
							blankText	:'Indique fecha'										
						},
						{
                    		xtype 	:'label',
                    		width 	:70,
                    		padding :'5',
                    		text 	:'OBSERV.'
                    	},
						{
							xtype		:'textfield',
							width		: 330,							
							allowBlank	: false,
							name		:'observaciones',														
							blankText	:'Indique observaciones'										
						},
                    ]
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
		                    vtnAltaDatos.destroy();
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

vtnAltaDatos.add(form);
vtnAltaDatos.doLayout();