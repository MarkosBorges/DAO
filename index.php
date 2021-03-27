<?php

require_once("config.php");

/*$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);
*/

//Carrega 1 usuario
//$root = new Usuario();
//$root->loadbyId(1);

//echo $root;


//Carrega uma lista de users
//$lista = Usuario::getList();
//echo json_encode($lista);


//Carrega uma lista de usuarios buscando pelo login
//$search = Usuario::search("ma");
//echo json_encode($search);


//Carrega user usando login e senha
//$usuario = new Usuario();
//$usuario->login("maria","4321");

//echo $usuario;

//CARREGA UM USUÁRIO USANDO O LOGIN E A SENHA
//$usuario = new Usuario();
//$usuario->login("markos","1234");

//echo $usuario;

// =========== INSERT
//$aluno = new Usuario("JoSoares","Onzeemeia");

//substituido pelo metodo construtor
//$aluno->setDeslogin("aluno");
//$aluno->setDessenha("!@#$");

//$aluno->insert();

//echo $aluno;

//============== UPDATE
/*$usuario = new Usuario();
$usuario->loadbyId(7);

$usuario->update("Professor", "Girafales");
echo $usuario;
*/

// =========== DELETE
$usuario = new Usuario();
$usuario->loadbyId(7); // passa o ID do usuário que vai ser deletado
$usuario->delete();

echo $usuario;

?>