<?php 

class usuario
{
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;


	public function getIdusuario():int
	{
		return $this->idusuario;
	}

	public function getDeslogin():string
	{
		return $this->deslogin;
	}

	public function getDessenha():string
	{
		return $this->dessenha;
	}

	public function getDtcadastro()
	{
		return $this->dtcadastro;
	}

	public function setIdusuario($idusuario)
	{
		 $this->idusuario = $idusuario;
	}

	public function setDeslogin($deslogin)
	{
		 $this->deslogin = $deslogin;
	}

	public function setDessenha($dessenha)
	{
		 $this->dessenha = $dessenha;
	}

	public function setDtcadastro($dtcadastro)
	{
		 $this->dtcadastro = $dtcadastro;
	}


	public function loadByI($id)
	{
		$sql = new Sql();
		$results=$sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID",array(":ID"=>$id
	));

		if(count($results[0]) > 0)
		{
			$row = $results[0];
			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro($row['dtcadastro']);
		}
	}


	public function __toString()
	{
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()

		));
	}

}





 ?>