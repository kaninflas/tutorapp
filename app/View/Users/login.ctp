<?php
/**
 * @class View/Users
 *
 * @desc Formulario para hacer login
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

<script>
    
    Ext.QuickTips.init(); 
    Ext.onReady(function(){ 
        var login = Ext.create('Ext.form.Panel',{ 
            frame: false,  
            id: 'userLoginForm',
            url: GLOBAL_PATH + "users/login",
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
                            Ext.getCmp('Login').handler.call(Ext.getCmp('Login').scope);
                        }
                    }
                }
            },
            items: 
                [ 
                { 
                    xtype: 'textfield', 
                    id: 'username',
                    fieldLabel: 'Usuario:', 
                    name: 'data[User][username]', 
                    allowBlank: false
                }, 
                {
                    xtype: 'textfield', 
                    id: 'password',
                    fieldLabel: 'Password:', 
                    name: 'data[User][password]', 
                    allowBlank: false, 
                    inputType: 'password' 
                },
                {
                    id: 'recordarUsuario',
                    xtype: 'checkboxfield',     
                    name: 'data[User][recordarUsuario]',
                    boxLabel: 'Recordar Usuario',
                    hideLabel: true,                        
                    style: 'margin-left:105px;'
                },
                {
                    id: 'recordarPassword',
                    xtype: 'checkboxfield',     
                    name: 'data[User][recordarPassword]',
                    boxLabel: 'Recordar Password',
                    hideLabel: true,                         
                    style: 'margin-left:105px;'
                }

            ]
        });

        var win = new Ext.Window({
            layout:'border',
            title: 'Login',
            closable: false,
            draggable: false,
            resizable: false,
            width: 450,
            height: 215,
            minWidth: 450,
            minHeight:215,
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
                login 
            ],



            buttons:
                [ 
                {
                    id:'Registrarse',
                    text: 'Registrarse',
                    handler: function(){   
                        
                        Ext.Ajax.request({
                            url: GLOBAL_PATH + 'Users/add',
                            method: 'GET',                                   
                            //scripts: true,
                            success: function(response){                                                         
                                win.close();
                                var body = Ext.getBody();
                                body.update(response.responseText,true);
                            },  
                            failure: function(response){
                                console.log("error: " + response.responseText);
                                console.log("error:" + response.status);
                            }
                        });                    
                            
                    }
                },
                
                { 
                    id: 'Login',
                    text: 'Login', 
                    handler: function(){ 
                        login.submit({ 
                            success: function(form, action){ 
                                //remember user
                                if(Ext.getCmp('recordarUsuario').getValue()){
                                    Ext.util.Cookies.set("rem_user",Ext.getCmp('username').getValue(""));                                                                                                
                                }else{
                                    Ext.util.Cookies.lear("rem_user");                                             
                                }
                                //remember pswd
                                if(Ext.getCmp('recordarPassword').getValue()){
                                    Ext.util.Cookies.set("rem_pswd",Ext.getCmp('password').getValue(""));                                                                                                
                                }else{
                                    Ext.util.Cookies.lear("rem_pswd");                                             
                                }
                                win.close();
                                    
                                Ext.Ajax.request({
                                    url: GLOBAL_PATH + 'Main/index',
                                    method: 'GET',       
                                    success: function(response){
                                        var body = Ext.getBody();
                                        body.update(response.responseText,true);
                                    },  
                                    failure: function(response){
                                        console.log("error: " + response.responseText);
                                        console.log("error:" + response.status);
                                    }
                                });    
                            }, 
                            failure: function(form, action){ 
                                Ext.Msg.alert('Error', action.response.responseText); 
                            } 
                        }); 
                    } 
                } 
            ] 
        });

        win.show();
        // fill with the cookies
        if (Ext.util.Cookies.get("rem_user")!=null){
            Ext.getCmp('username').setValue(Ext.util.Cookies.get("rem_user"));
            Ext.getCmp('recordarUsuario').setValue(true);
        }
        if (Ext.util.Cookies.get("rem_pswd")!=null){
            Ext.getCmp('password').setValue(Ext.util.Cookies.get("rem_pswd"));
            Ext.getCmp('recordarPassword').setValue(true);
        } 
    }); //Ext.OnReady*/
</script>

