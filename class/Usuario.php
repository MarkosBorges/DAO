<?php

class Usuario{

	private $idusuario;
	private $deslogin; 
	private $dessenha;
	private $dtcadastro;

//########## Gets e Sets dos atributos privates #############
	public function getIdusuario(){
		return $this->idusuario;
	}
	public function setIdusuario($value){
		$this->idusuario = $value;
	}


	public function getDeslogin(){
		return $this->deslogin;
	}
	public function setDeslogin($value){
		$this->deslogin = $value;
	}


	public function getDessenha(){
		return $this->dessenha;
	}
	public function setDessenha($value){
		$this->dessenha = $value;
	}


	public function getDtcadastro(){
		return $this->dtcadastro;
	}
	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}
// ################### FIM Gets e Sets #####################
// $$$$$$$$$$$$$$$$$$$$ LOADBYID $$$$$$$$$$$$$$$$$$$$$$$$$$$$
	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id
		));

		if(count($results) > 0){
//			$row = $results[0];

			$this->setData($results[0]);
/*			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro'])); 
*/
			// Substituido por:	$this->setData($results[0]);
		}
	}

// ============== LISTAR todos usuários da tabela =================== //

	public static function getList(){ //traz lista de users //stático pois n precisa instanciar o objeto
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
	}

// ===================== SEARCH ====================== //
	public static function search($login){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
			':SEARCH'=>"%".$login."%"
		));
	}

// ======================= LOGIN ===================== //
	public static function login($login, $password){ //Obtém os dados do usuário que está autenticado
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

		if(count($results) > 0){
//			$row = $results[0];

	/*		$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
	*/
			$this->setData($results[0]);
		}else{
			throw new Exception("Login e/ou senha inválidos.", 1);
		}

	}
// ================ setData =================
	public function setData($data){
		$this->setIdusuario($data['idusuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro(new DateTime($data['dtcadastro']));
// ==========================================
	}
// ========================== INSERT ===============
	public function insert(){

		$sql = new Sql();
		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha()
		));

		if(count($results) > 0){
			$this->setData($results[0]);
		}

	}

// ====================== UPDATE =====================

	public function update($login, $password){

		$this->setDeslogin($login);
		$this->setDessenha($password);

		$sql = new Sql();

		$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
			 ':LOGIN'=>$this->getDeslogin(),
			 ':PASSWORD'=>$this->getDessenha(),
			 ':ID'=>$this->getIdusuario()
		));
	}
// ####################### DELETE ###############################
// * Habilitar os $this no loadbyId / Tirar comentátios dos $this
	public function delete(){
		
		$sql = new Sql();
		
		$sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
			':ID'=>$this->getIdusuario()
		));

		$this->setIdusuario(0);
		$this->setDeslogin("");
		$this->setDessenha("");
		$this->setDtcadastro(new DateTime());
	}


// ============ Método construct para receber login e senha 
	public function __construct($login = "", $password = ""){ 
		$this->setDeslogin($login);
		$this->setDessenha($password);
	}
// =================

	public function __toString(){ // dar echo no json com os dados do atributos

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}
}

?>