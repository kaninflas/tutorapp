<?php
/**
 * @class View/index
 *
 * @desc vista de inicio de TutorApp
 * 
 * @author Andréz Ortiz <@a_kanin>
 * @author Ilse Ferman <@ilseferman>
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
 * @package       app/Views
 * @subpackage    app/View/index
 */
?>

<script>  
    var activo_usuario  =false; 
    var activo_alumno   =false;
    var activo_tutor    =false;
    var activo_dpa      =false;
    var activo_asignar  =false;
    var activo_tutorias =false;
    var id_usuario= "<?php echo  CakeSession::read('Auth.User.id')?>";
    //Ext.require(['*']);  
    var tutorias = Ext.create('Ext.data.Store', {         
        storeId: 'tutorias',              
        pageSize:20, 
        autoLoad:true,   
        fields: ['id', 'programa_educativo','fecha_asignacion','num_sesion','fecha_sesion','acuerdos','estatus'],
        proxy: {
            type: 'ajax',
            api:{
              read      : '<?php echo $this->Html->url('/Main/tutorias_alumnos/')?>'+id_usuario,              
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
    Ext.onReady(function(){
        
       Ext.create('Ext.container.Container', {
            layout: {
                type: 'vbox',
                align: 'center',
                pack: 'center'
            } ,       
            border: false,
            renderTo: Ext.getBody(),
            items: 
            [
                {
                    xtype   : 'panel',                                      
                    frame   : true,
                    width   : 1000,   
                    height  : 600,                                     
                    layout  :'hbox',
                    items   :
                    [
                         {
                            xtype: 'grid',          
                            flex: 1,            
                            verticalScrollerType: 'paginggridscroller',
                            title   : 'Historial Tutorias',
                            store   :  tutorias, 
                            closable: false,          
                            columns: [                                
                                {
                                    header      : 'Programa educativo ',  
                                    dataIndex   : 'programa_educativo',
                                    minWidth    : 150                                 
                                },  
                                {
                                    header      : 'Fecha asignacion ',  
                                    dataIndex   : 'fecha_asignacion',
                                    minWidth    : 150                                
                                },
                                {
                                    header      : 'Fecha sesion',  
                                    dataIndex   : 'fecha_sesion', 
                                    minWidth    : 150                               
                                },                                      
                                {
                                    header      : 'N° Sesion',  
                                    dataIndex   : 'num_sesion',  
                                    minWidth    : 150                              
                                },
                                {
                                    header      : 'Acuerdos',  
                                    dataIndex   : 'acuerdos',
                                    minWidth    : 250                             
                                },
                                {
                                    header      : 'Estatus',  
                                    dataIndex   : 'estatus',
                                    minWidth    : 150                               
                                },
                            ],
                        }
                    ]

                },
            ]
        });
    });

</script>
<div id="centerTab" class="x-hide-display">    
    <div id="img-wrapp">
    <?php
        echo $this->Html->image('Logopoli.png', array('id'=> 'logopoli', 'width'=>564, 'height'=>186));
        echo $this->Html->image('logo.png'    , array('id'=> 'tutorapplogo', 'width'=>170, 'height'=>170));
        echo "<h1>TutorApp<br>Sistema Institucional para Tutorías</h1>";
        echo $this->Html->image('unipollo.png', array('id'=> 'unipollo', 'width'=>300, 'height'=>320));
    ?>
    </div>
</div>
<div id="div-content"  style="display:none;"></div>