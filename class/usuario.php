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
			
			$this->setData($results[0]);
		}
	}

	public static function getList()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;"); 
	}

	public static function search($login)
	{
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin",
			array(":SEARCH"=>'%'.$login.'%'));
	}

	public function login($login,$password)
	{
		$sql = new Sql();
		$results=$sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD",array(":LOGIN"=>$login,":PASSWORD"=>$password
	));

		if(count($results[0]) > 0)
		{
			$row = $results[0];
			$this->setData($results[0]);
		}
		else
		{
			throw new Exception("Login ou senha inválidos", 1);
			
		}
	}

	public function setData($data)
	{

			$this->setIdusuario($data['idusuario']);
			$this->setDeslogin($data['deslogin']);
			$this->setDessenha($data['dessenha']);
			$this->setDtcadastro(new DateTime($data['dtcadastro']));
	}

	public function insert()
	{
		$sql = new Sql();
		$results = $sql->select("Call sp_usuarios_insert(:LOGIN,:PASSWORD)", array(
			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha()
		));

		if (count($results) > 0) 
		{
			$this->setData($results[0]);
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


	public function __construct($login = "",$password = "")
	{
		$this->setDeslogin=$login;
		$this->setDessenha=$password;
	}

	public function update($login,$password)
	{
		$this->setDeslogin($login);
		$this->setDessenha($password);
		$sql = new Sql();
		$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID",array(
			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha(),
			':ID'=>$this->getIdusuario()
		));
	}

}





 ?>