//<script>
    //---------------------------------------------------------------
    //  Cargamos un store con todos los datos de la tabla alumnos
    //---------------------------------------------------------------
    var alumnos = Ext.create('Ext.data.Store', {         
        storeId: 'alumnos',      
        autoLoad: true,
        autoSync: true,
        fields: ['id', 'nombre','primer_apellido','segundo_apellido','carrera','matricula','cuatrimestre','id_usuario'],
        proxy: {
            type: 'ajax',
            api:{
                read: '<?php echo $this->Html->url('/Main/alumnos'); ?>',
                destroy   : '<?php echo $this->Html->url('/Main/borrar/Alumnos') ?>'
            },
            reader: {
                type: 'json',
                root: 'items'
            }
        }
    });



    //---------------------------------------------------------------
    //  Creamos un grid que muestre los alumnos
    //---------------------------------------------------------------
    var gAlumnos = Ext.create('Ext.grid.Panel', {
        verticalScrollerType: 'paginggridscroller',
        title   : 'Alumnos',
        store   : alumnos, 
        closable: false, 
        plugins: [{
                ptype: 'cellediting',
                clicksToEdit: 1
            }],    
        listeners:{
            
            itemclick: function(view,record,item,index,e,options){  
                console.log(record.data);
                /*Ext.Ajax.request({
                    url: GLOBAL_PATH + 'Users/asigna_rol',
                    method: 'POST',     
                    params:{
                        rol: recs[0].data.rol,
                        id: gUsuarios.getSelectionModel().getSelection()[0].data.id
                    },
                    success: function(response){     
                        usuarios.load();
                    },  
                    failure: function(response){
                        console.log("error: " + response.responseText);
                        console.log("error:" + response.status);
                    }
                });  */ 
            }
        },
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
                        icon   : GLOBAL_PATH + 'img/delete.png',  
                        tooltip: 'Eliminar Alumno',                            
                        handler:function(grid, rowIndex, colIndex) {
                            Ext.MessageBox.confirm('¡Importante!', '¿Esta seguro de eliminar esto de manera permanente?', function(btn){
                                if(btn == 'yes'){
                                    var renglon = grid.getStore().getAt(rowIndex);
                                    alumnos.remove(renglon);
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
                                    <?php echo $this->requestAction('Main/alta_alumno', array('return')) ?>//pedimos la ventana del alumno que se encuentra en otra vista
                                                    vtnAltaAlumno.show();   //como ya esta hecha la peticion a la vista ahora la abrimos con el mismo nombre que tiene                                    
                                                }
                                            }]
        }],
    
        /* Ventana de los datos del alumno que aparece con dar click en una fila*/
        login : function(e,c){
                
                var win=Ext.getCmp('idAlumnoDatos');
                
                if(win==undefined){
                    var form = Ext.create('Ext.form.Panel', {
                        //layout: 'absolute',
                        url: GLOBAL_PATH+ "Main/datosAlumno_List",
                        defaultType: 'textfield',
                        border: false,
                        layout:'auto',
                        bodyPadding: 10,
                        defaults:{
                            fieldWidth: 60,
                            enableKeyEvents:true,
                            listeners:{
                                specialKey: function(field, el)
                                {
                                    if(el.getKey() == Ext.EventObject.ENTER)
                                    {
                                        Ext.getCmp('btnEnter').handler.call(Ext.getCmp('btnEnter').scope);
                                    }
                                }
                            }
                        },
                        //bodyStyle: "background-image:url(blue.jpg) !important",
                        items: [
                            {
                                id:"idLoginUser",
                                fieldLabel: 'Usuario:',//lan["user"],
                                msgTarget: 'side',
                                allowBlank: false,
                                name: 'user'
                            },
                            {
                                id:"idLoginPswd",
                                inputType: 'password',
                                fieldLabel: 'Password:',//lan["pswd"],
                                name: 'password'
                            },
                            {
                                id: 'idRememberUser',
                                xtype: 'checkboxfield',		
                                name: 'recordarUsuario',
                                boxLabel: 'Recordar Usuario', //lan["r_user"],
                                hideLabel: true,                        
                                style: 'margin-left:105px;margin-top:8px;'
                            },
                            {
                                id: 'idRememberPswd',
                                xtype: 'checkboxfield',		
                                name: 'recordarUsuario',
                                boxLabel: 'Recordar Password',//lan["r_psd"],
                                hideLabel: true,                         
                                style: 'margin-left:105px;margin-top:8px;'
                            }
                            
                        ]
                    });
                    
                    var win = Ext.create('Ext.window.Window', {
                        id : 'idWinLogin',
                        title: 'Login',//lan["login"],
                        width: 350,
                        height: 200,
                        minWidth: 350,
                        minHeight:200,
                        layout: 'fit',
                        plain:true,
                        closable:false,
                        items: form,
			
                        buttons: [{
                                id: 'btnEnter',
                                text: 'Entrar',//lan["enter"],
                                handler: function() {
                                    form.submit({
                                        success: function(form,action){
                                            //remember user
                                            if(Ext.getCmp('idRememberUser').getValue()){
                                                Ext.util.Cookies.set("rem_user",Ext.getCmp('idLoginUser').getValue(""));																								
                                            }else{
                                                Ext.util.Cookies.clear("rem_user");												
                                            }
                                            //remember pswd
                                            if(Ext.getCmp('idRememberPswd').getValue()){
                                                Ext.util.Cookies.set("rem_pswd",Ext.getCmp('idLoginPswd').getValue(""));																								
                                            }else{
                                                Ext.util.Cookies.clear("rem_pswd");												
                                            }
                                            
                                            win.close();
                                            vDesk.load();
                                            
                                        },
                                        failure: function(form, action,a,b,c) {
                                            //console.log(action.result.error);
                                            
                                            if (action.result.error==0){
                                                error=action.result.msg;
                                            }else{
                                                error='Usuario y contraseña incorrectos, desea intentar nuevamente'//lan["bad_login"];
                                            }
                                            
                                            Ext.Msg.confirm('Error',/*lan["error"],*/error,
                                            function(btn, text){
                                                if (btn == 'yes'){
                                                    Ext.getCmp('idLoginUser').setValue("");
                                                    Ext.getCmp('idLoginPswd').setValue("");	
                                                    Ext.getCmp('idLoginUser').focus('', 200);
                                                } else {
                                                    var url = window.location.href;
                                                    var nohttp = url.split('//')[1];
                                                    var hostPort = nohttp.split('/')[0]
                                                    window.location = 'http://' + hostPort;															
                                                }
                                                
                                            },this);
                                            //MyExtDesk.login(); //Ext.Msg.alert('Failed', action.result.msg); 
                                        }
                                        
                                    })
                                    
                                }
                                
                            },{
                                text: 'Cancelar'//lan["cancel"]
                            }]
                    },this);
                    
                    
                }else{
                    Ext.getCmp('idLoginUser').setValue("");
                    Ext.getCmp('idLoginPswd').setValue("");						
                }
                // fill with the cookies
                if (Ext.util.Cookies.get("rem_user")!=null){
                    Ext.getCmp('idLoginUser').setValue(Ext.util.Cookies.get("rem_user"));
                    Ext.getCmp('idRememberUser').setValue(true);
                }
                if (Ext.util.Cookies.get("rem_pswd")!=null){
                    Ext.getCmp('idLoginPswd').setValue(Ext.util.Cookies.get("rem_pswd"));
                    Ext.getCmp('idRememberPswd').setValue(true);
                }
                
                win.show();
                
                
                
                
            
            
            
        }   
                            
    });
   