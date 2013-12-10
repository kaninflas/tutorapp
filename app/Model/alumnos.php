<?php
/**
 * @author Andréz Ortiz <@a_kanin>
 * @author Ilse Ferman <@ilseferman>
*/  
class Alumnos extends AppModel {
	public $name = 'Alumnos';
	public $useTable = 'alumnos';
	
	function disponibles($id){
		$cadena="
				SELECT * FROM 
				(
					
					SELECT * FROM alumnos
						WHERE id NOT IN
				    (SELECT id_alumno FROM tutor_alumnos)

				) info";		
		$resultado=$this->query($cadena);
		return $resultado;	
	}
}
?>