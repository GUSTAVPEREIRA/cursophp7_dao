<?php 

require_once("config.php");
/*
$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);*/
//carrega um usuário
//$root = new Usuario();
//$root->loadByI(3);
//echo $root;
//Carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista);
 
//Carrega um login
//$search = Usuario::search("ro");
//echo json_encode($search);
//Autentica login
//$usuario = new Usuario();

//$usuario->login("root","root");

//echo $usuario;
////////////////////// inserindo
//$aluno = new Usuario("aluno","@aluno");
//$aluno->insert();
//echo $aluno;
//Update
//$usuario = new Usuario();
//$usuario->loadByI(6);
//$usuario->update("professor","literatura");
////////////Deletando

$usuario = new Usuario();
$usuario->loadByI(6);
$usuario->delete();

echo $usuario;
 ?>