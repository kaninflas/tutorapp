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
<div class="login-form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Por favor ingrese su usuario y su password'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>


<script >
       /* Ext.QuickTips.init(); 
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
                        name: 'username', 
                        allowBlank: false
                    }, 
                    {
                        xtype: 'textfield', 
                        id: 'password',
                        fieldLabel: 'Password:', 
                        name: 'password', 
                        allowBlank: false, 
                        inputType: 'password' 
                    },
                    {
                        id: 'recordarUsuario',
                        xtype: 'checkboxfield',     
                        name: 'recordarUsuario',
                        boxLabel: 'Recordar Usuario',
                        hideLabel: true,                        
                        style: 'margin-left:105px;'
                    },
                    {
                        id: 'recordarPassword',
                        xtype: 'checkboxfield',     
                        name: 'recordarPassword',
                        boxLabel: 'Recordar Password',
                        hideLabel: true,                         
                        style: 'margin-left:105px;'
                    }

                ], 
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
                        id: 'Login',
                        text: 'Login', 
                        handler: function(){ 
                            /*Ext.Ajax.request({
                                url: GLOBAL_PATH + 'users/login',
                                method: 'POST',
                                params:{ 

                                    'username': Ext.getCmp('username').getValue(),
                                    'password': Ext.getCmp('password').getValue()
                                },                                    
                                scripts: true,
                                success: function(response){ 
                                    console.log(response)
                                    console.log(response.success)
                                    if (!response.success){
                                        console.log("error ResponseText: " + response.responseText);
                                        console.log("error: Response Status:" + response.status);
                                    }else{

                                        var tmpFunc = new Function(response.responseText);
                                        tmpFunc();

                                        //remember user
                                        if(Ext.getCmp('recordarUsuario').getValue()){
                                            Ext.util.Cookies.set("rem_user",Ext.getCmp('username').etValue(""));     
                                        }else{
                                            Ext.util.Cookies.clear("rem_user");             
                                        }

                                        //remember pswd
                                        if(Ext.getCmp('recordarPassword').getValue()){
                                            Ext.util.Cookies.set("rem_pswd",Ext.getCmp('password').etValue(""));                        
                                        }else{
                                            Ext.util.Cookies.clear("rem_pswd");           
                                        }

                                        win.close();

                                    }
                                }
                            });  
							*
                            login.submit({ 
                                success: function(form, action){ 
                                    Ext.Msg.alert('Success', 'Logged In');

                                    console.log(form);
                                    console.log(action); 

                                    //remember user
                                    if(Ext.getCmp('recordarUsuario').getValue()){
                                        Ext.util.Cookies.set("rem_user",Ext.getCmp('username').etValue(""));                                                                                                
                                    }else{
                                        Ext.util.Cookies.lear("rem_user");                                             
                                    }
                                    //remember pswd
                                    if(Ext.getCmp('recordarPassword').getValue()){
                                        Ext.util.Cookies.set("rem_pswd",Ext.getCmp('password').etValue(""));                                                                                                
                                    }else{
                                        Ext.util.Cookies.lear("rem_pswd");                                             
                                    }

                                    win.close();
                                }, 
                                failure: function(form, action){ 
                                    Ext.Msg.alert('Error', 'Usuario o password incorrecto, vuelva a ntentar'); 
                                    console.log(action.response.responseText);
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