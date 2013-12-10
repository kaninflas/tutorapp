<?php
/**
 * @author Andréz Ortiz <@a_kanin>
 * @author Ilse Ferman <@ilseferman>
*/  
class TutorAlumnos extends AppModel {
	public $name = 'TutorAlumnos';
	public $useTable = 'tutor_alumnos';
	
	function tutor_tutorado($id){
		
		$cadena="
		SELECT * FROM 
		(
			SELECT 
				ta.id,
				ta.id_tutor,
				ta.id_alumno,
				CONCAT(a.nombre,' ',a.primer_apellido,' ',a.segundo_apellido) AS nombre,
				a.carrera,
				a.matricula,
				a.cuatrimestre
			FROM 
				tutor_alumnos ta,
				alumnos a,
				tutores t 
				WHERE ta.id_alumno=a.id AND ta.id_tutor='$id'
				GROUP BY a.matricula
		) info";		
		$resultado=$this->query($cadena);
		return $resultado;		
		
	}

}
?>