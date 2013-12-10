//<script>
	var id_enviar=0;
   //---------------------------------------------------------------
   //  Cargamos un store con todos los datos de la tabla tutor_alumnos
   //	donde el id_enviar sea el tutor seleccionado
   //---------------------------------------------------------------
   var tutor_alumnos = Ext.create('Ext.data.Store', {         
        storeId: 'tutor_alumnos',       
        autoSync: true,       
        fields: ['id', 'nombre','carrera','matricula','cuatrimestre'],
        proxy: {
            type: 'ajax',
            api:{
              read 		: '<?php echo $this->Html->url('/Main/alumnos_asignados/');?>'+id_enviar,              
              destroy   : '<?php echo $this->Html->url('/Main/borrar/TutorAlumnos')?>'
            },
            reader: {
                type: 'json',
                root: 'items'
            }
        }
    });
   //---------------------------------------------------------------
   //  Cargamos un store con todos los datos de la tabla alumnos  
   //---------------------------------------------------------------
   var alumnos = Ext.create('Ext.data.Store', {         
        storeId: 'alumnos',              
        autoSync: true,
        fields: ['id', 'nombre','primer_apellido','segundo_apellido','carrera','matricula','cuatrimestre','id_usuario'],
        proxy: {
            type: 'ajax',
            api:{
              read 		: '<?php echo $this->Html->url('/Main/alumnos_disponibles');?>'+id_enviar,                            
            },
            reader: {
                type: 'json',
                root: 'items'
            }
        }
    });
   //---------------------------------------------------------------
   //  Cargamos un store con todos los datos de la tabla dpa
   //---------------------------------------------------------------
   var dpa = Ext.create('Ext.data.Store', {         
        storeId: 'dpa',      
        autoLoad: true,
        autoSync: true,
        pageSize:20,    
        fields: ['id', 'nombre'],
        proxy: {
            type: 'ajax',
            api:{
              read      : '<?php echo $this->Html->url('/Main/dpa_nombres')?>',              
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
        }     
    });
var vtnAsignar = Ext.create('Ext.panel.Panel', {
    layout: {
        type 	: 'vbox',
        align 	: 'stretch'     
    },    
    title: 'Asignar Tutores',
    items: [
	    {
	        xtype 	: 'panel',	        
	        flex 	: 2,	        
	        items:
	        [
	        	{
	        		id 			: 'enviar_tutor',
	        		xtype 		: 'combo',
	        		valueField 	: 'id',                                            
        			displayField: 'nombre',        		
        			store 		: dpa,
        			width		: 400,
	        		fieldLabel 	: 'Seleccione Tutor',
	        		editable 	: false,
	        		padding		: '0,0,0,20'
	        	},
	        	{
	        		xtype		:'button',
	        		text 		:'Cargar',
	        		margin		: '5, 0, 10, 105',
	        		handler 	: function() {	        			
				       var valor=Ext.getCmp('enviar_tutor').value;
				       id_enviar=valor;
				       var store= Ext.getStore(tutor_alumnos).getProxy();                                                      
		                  Ext.apply(store.api, {                                                         
		                      read    : '<?php echo $this->Html->url('/Main/alumnos_asignados/');?>'+id_enviar,
		                      destroy   : '<?php echo $this->Html->url('/Main/borrar/TutorAlumnos')?>'              
		                  });				      
				       	tutor_alumnos.load();
				       	var store_alumnos= Ext.getStore(alumnos).getProxy();                                                      
		                  Ext.apply(store_alumnos.api, {                                                         
		                      read    : '<?php echo $this->Html->url('/Main/alumnos_disponibles/');?>'+id_enviar,		                      
		                  });				      
				       	alumnos.load();
				        Ext.getCmp('recibir_tutor').setValue(valor);
				    }
	        	},
	        	 {
			        xtype: 'grid',	        
			        flex: 1,	        
			        verticalScrollerType: 'paginggridscroller',
		            title   : 'Alumnos asignados',
		            store   :  tutor_alumnos, 
		            closable: false,          
		            columns: [
		                {
		                    header      : 'Id',  
		                    dataIndex   : 'id',   
		                    width       :  55,               
		                },
		                {
		                    header      : 'Matricula ',  
		                    dataIndex   : 'matricula',   
		                    width       :  150,               
		                },  
		                {
		                    header      : 'Nombre ',  
		                    dataIndex   : 'nombre',   
		                    width       :  150,               
		                },                		                
		                {
		                    header      : 'Carrera',  
		                    dataIndex   : 'carrera',  
		                    width       :   150,               
		                },
		                {
		                    header      : 'Cuatrimestre',  
		                    dataIndex   : 'cuatrimestre', 
		                    width       :  70                
		                },
		                {
		                    xtype   : 'actioncolumn',
		                    width   :  100,
		                    header  : '',
		                    items   : 
		                    [
		                        {                            
		                            icon   : GLOBAL_PATH+'img/delete.png',  
		                            tooltip: 'Eliminar Alumno',                            
		                            handler:function(grid, rowIndex, colIndex) {
		                                   var renglon = grid.getStore().getAt(rowIndex);
		                                        tutor_alumnos.remove(renglon);
		                                        alumnos.load();
		                                    		                                
		                            }
		                        }
		                    ]
		                }
                	]              
	    		}
	        
	        ]
	    }, 
	      {
	        xtype 	: 'panel',	        
	        flex 	: 2,	        
	        items:
	        [
	        		{
			        xtype: 'grid',	        
			        flex: 1,	        
			        verticalScrollerType: 'paginggridscroller',
		            title   : 'Alumnos Disponibles',
		            store   : alumnos, 
		            closable: false, 
		            layout: {
						        type 	: 'fit',
						        align 	: 'stretch'     
						    },
		            columns: [
		                {
		                    header      : 'Id',  
		                    dataIndex   : 'id',   		                    
		                },
		                {
		                    header      : 'Matricula ',  
		                    dataIndex   : 'matricula',   		                    
		                },  
		                {
		                    header      : 'Nombre ',  
		                    dataIndex   : 'nombre',   		                               
		                },                
		                {
		                    header      : 'Apellido Paterno',  
		                    dataIndex   : 'primer_apellido',  		                    
		                },
		                {
		                    header      : 'Apellido Materno',  
		                    dataIndex   : 'segundo_apellido', 		                   
		                },
		                {
		                    header      : 'Carrera',  
		                    dataIndex   : 'carrera',  		                   
		                },
		                {
		                    header      : 'Cuatrimestre',  
		                    dataIndex   : 'cuatrimestre', 		                   
		                },
		                {
		                    xtype   : 'actioncolumn',		                    
		                    header  : '',
		                    items   : 
		                    [
		                        {                            
		                            icon   : GLOBAL_PATH + 'img/add.png',  
		                            tooltip: 'Agregar Alumno',                            
		                            handler:function(grid, rowIndex, colIndex) {
		                            			var renglon = grid.getStore().getAt(rowIndex);
		                            			var alumno=alumnos.getAt(rowIndex).get('id');	

		                 						Ext.Ajax.request({			                 						                      			
                                         			url:'<?php echo $this->Html->url('/Main/asignar_alumno/'); ?>'+id_enviar, 					
                                         			scripts: false,
                                         			params: {
												        id_alumno:alumno,
												        id_tutor: id_enviar
												    },
												    success: function(){												    	 
				                                        alumnos.remove(renglon);																
												    },
												});
												tutor_alumnos.load();												 
		                                }
		                            
		                        }
		                    ]
		                }
                	]              
	    		}
	        ]
	    }, 
	   
    ]

});
 	


  