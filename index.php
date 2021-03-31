<?php

require_once("config.php");

/*
$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);
*/

// ############# Carrega 1 user ############## PROBLEMA
//$root = new Usuario();
//$root->loadbyId(5);

//echo $root;


// ###################### Lista Users #################
//Carrega uma lista de users
//$lista = Usuario::getList();
//echo json_encode($lista);


//Carrega uma lista de usuarios buscando pelo login = SEARCH
//$search = Usuario::search("ma");
//echo json_encode($search);

// ################## LOGIN SENHA ##################### PROBLEMA
//CARREGA UM USUÁRIO USANDO O LOGIN E A SENHA
/*
$usuario = new Usuario();
$usuario->login("markos","1234");

echo $usuario;
*/

// ============== INSERT ===============
/*
$aluno = new Usuario("Gil","Gomes");
$aluno->insert();
echo $aluno;
*/

//substituido pelo metodo construtor (acima)
/*$aluno = new Usuario();
$aluno->setDeslogin("Markovisk");
$aluno->setDessenha("Borgesky");

$aluno->insert();
echo $aluno;

*/
//============== UPDATE =============
/*
$usuario = new Usuario();
$usuario->loadbyId(6);

$usuario->update("Alan", "Turing");
echo $usuario;
*/

// =========== DELETE ==================
 
$usuario = new Usuario();
$usuario->loadbyId(13); // passa o ID do usuário que vai ser deletado
$usuario->delete();

echo $usuario;

?>