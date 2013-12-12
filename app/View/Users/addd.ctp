<?php
/**
 * @class View/Users
 *
 * @desc Vista con el formulario para añadir usuarios
 * 
 * @author Andréz Ortiz <@a_kanin>
 * 
 * Todos los derechos reservados Novenitos 2013, UNIPOLI
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * 
 * Ext JS Library 4.2 
 * Copyright(c) 2006-2011 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 *
 * @copyright     Copyright 2013, Unipoli, Ing. en Software
 * @version       TutorApp v 0.0.1
 * @package       app/View
 * @subpackage    app/View/User
 */
?>
//<script > 
    var add = Ext.create('Ext.form.Panel',{ 
        frame: false,  
        id: 'userAddForm',
        url: GLOBAL_PATH + "users/add",
        layout:'auto',
        region: 'center',
        bodyPadding: 10,  
        //renderTo: Ext.get('logindiv'),
        defaults:{
            fieldWidth: 60,
            enableKeyEvents:true,
            listeners:{
                specialKey: function(field, el)
                {
                    if(el.getKey() == Ext.EventObject.ENTER)
                    {
                        Ext.getCmp('Add').handler.call(Ext.getCmp('Add').scope);
                    }
                }
            }
        },
        items: 
            [ 
            { 
                xtype: 'textfield', 
                id: 'username_add',
                fieldLabel: 'Usuario:', 
                name: 'data[User][username]', 
                allowBlank: false
            }, 
            {
                xtype: 'textfield', 
                id: 'password_add',
                fieldLabel: 'Password:', 
                name: 'data[User][password]', 
                allowBlank: false, 
                inputType: 'password' 
            },
            {
                xtype: 'textfield', 
                vtype: 'email',
                id: 'correo_id', 
                fieldLabel: 'Correo:',
                name: 'data[User][correo]',
                allowBlank: false
            },
            {
                id          : 'combo_idUsuario',
                name        : 'combo_idUsuario',
                xtype       : 'combo',
                valueField  : 'id',                                            
                displayField: 'nombre',             
                store       : comboRoles,
                width       : 300,
                fieldLabel  : 'Asignar Rol:',
                editable    : false                       
            }

        ]
    });

    var winadd = new Ext.Window({
        layout:'border',
        id: 'win-add',
        title: 'Registrar',
        resizable: false,	
        width: 450,
        height: 200,
        minWidth: 450,
        minHeight:185,
        plain: true,
        border: true,
        items: [
            {
                xtype: 'panel',
                region: 'west',
                width: 150,
                bodyPadding: 20,
                html: '<img width="120" src="'+GLOBAL_PATH + 'img/unipoli.jpg" id="img-avatar"/>'
            }, 
            add 
        ],



        buttons:
            [ 
                
            { 
                id: 'Add',
                text: 'Registrar', 
                handler: function(){ 
                    if(add.isValid()){                            
                        add.submit({ 
                            //scripts: true,
                            success: function(form, action){ 
                                //Ext.Msg.alert('Gracias', 'Usuario Guardado');                                
                                //winlog.close();
                                Ext.Ajax.request({
                                    url: GLOBAL_PATH,
                                    method: 'GET',
                                    params: {
                                        Layout: true
                                    },
                                    //scripts: true,
                                    success: function(response){                                                         
                                        winadd.close();
                                        /*var str = str_replace(str,"<script>",'');
                                            eval(str);*/
                                    },  
                                    failure: function(response){
                                        console.log("error: " + response.responseText);
                                        console.log("error:" + response.status);
                                    }
                                });  
                                //window.location.href(GLOBAL_PATH);
                            }, 
                            failure: function(form, action){ 
                                Ext.Msg.alert('Error', action.response.responseText); 
                            } 
                        }); 
                    }
                } 
            } 
        ] 
    });

    winadd.doLayout();
    winadd.show();