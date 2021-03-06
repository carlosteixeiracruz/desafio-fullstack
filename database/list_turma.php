<?php
/*
*Efetua a conex�o com o banco
*/
require_once("conexao.php");

class database_listTurma	{	
	/*fun��o Listar turma*/
	public function databaseListTurma()	{
		/*Instancia o objeto de acesso ao banco*/
		$objDataBase	= new conexao();
		$conect			= $objDataBase->bd();

		$query	= "SELECT t.id, t.turma, t.hora_inicio, t.hora_termino, u.nome professor, c.nome curso, s.nome sala
								FROM turma	t";
		$query	.= " JOIN	usuario_funcao uf";
			$query	.= " ON	t.usuario_funcaoid = uf.id";
		$query	.= " JOIN	usuario u";
			$query	.= " ON	uf.usuarioid = u.id";
		$query	.= " JOIN	curso c";
			$query	.= " ON	t.cursoid = c.id";
		$query	.= " JOIN	sala s";
			$query	.= " ON	t.salaid = s.id";
		$query	.= " GROUP BY t.turma";
		$query	.= " ORDER BY t.id DESC";
		
		
		$result = mysqli_query($conect, $query);

		return $result;
	}
	
	/*fun��o para Listar as Salas*/
	public function databaseListTurmaListSala($rowTurma = null)	{
		/*Instancia o objeto de acesso ao banco*/
		$objDataBase	= new conexao();
		$conect			= $objDataBase->bd();

		$query	= null;

		$query	= "SELECT s.nome sala
								FROM turma	t";
		$query	.= " JOIN	sala s";
			$query	.= " ON	t.salaid = s.id";
		$query	.= " WHERE t.turma =".$rowTurma;
		
		$result = mysqli_query($conect, $query);
    
		return $result;
	}
	/*termino*/
}
?>