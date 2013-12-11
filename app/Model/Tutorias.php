<?php
/**
 * @author Andréz Ortiz <@a_kanin>
 * @author Ilse Ferman <@ilseferman>
*/  
class Tutorias extends AppModel {
	public $name = 'Tutorias';
	public $useTable = 'tutorias';
	function hechas($id){
		$cadena="
				SELECT * FROM 
				(					
					SELECT * FROM tutorias
						WHERE id_alumno='$id'
				) Tutorias";		
		$resultado=$this->query($cadena);
		return $resultado;	
	}
	
}
?>