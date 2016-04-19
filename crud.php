<?php

class CRUD
{
	public $con;
	protected $tabela;
	
	function __construct()
	{
		$con = new PDO("mysql:host=localhost;dbname=luca11_brasil_tour", "luca11_brasil", "***********");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->con = $con;
	}
	
	function selecionar($id = false)
	{
		if ($id===false)
			$sql = "SELECT * FROM ".$this->tabela;
		else
			$sql = "SELECT * FROM ".$this->tabela." WHERE id_".$this->tabela." = :id";
		$sth = $this->con->prepare($sql);
		$sth->bindParam(":id", $id, PDO::PARAM_INT);
		$sth->execute();
		return $sth->fetchAll();
	}
	function deletar($id)
	{
		$sql = "DELETE FROM ".$this->tabela." WHERE id_".$this->tabela." = :id";
		$sth = $this->con->prepare($sql);
		$sth->bindParam(":id", $id, PDO::PARAM_INT);
		$sth->execute();
		return $sth->rowCount();
	}
	function apagar($id)
	{
		return $this->deletar($id);
	}
}

class CRUD_Administrador extends CRUD
{
	function __construct()
	{
		parent::__construct();
		$this->tabela = "Administrador";
	}
	
	function inserir($email, $senha, $gerMensagem, $gerAdmin)
	{
		$sql = "INSERT INTO Administrador (`email`, `senha`, `gerMensagem`, `gerAdmin`) VALUES (:email, :senha, :gerMensagem, :gerAdmin)";
		$sth = $this->con->prepare($sql);
		$sth->bindParam(":email", $email);
		$sth->bindParam(":senha", $senha);
		$sth->bindParam(":gerMensagem", $gerMensagem, PDO::PARAM_INT);
		$sth->bindParam(":gerAdmin", $gerAdmin, PDO::PARAM_INT);
		$sth->execute();
		return $sth->rowCount();
	}
	function atualizar($id, $email, $senha, $gerMensagem, $gerAdmin)
	{
		$sql = "UPDATE Administrador SET email = :email, senha = :senha, gerAdmin = :gerAdmin, gerMensagem = :gerMensagem".
		" WHERE id_Administrador = :id";
		$sth = $this->con->prepare($sql);
		$sth->bindParam(":email", $email);
		$sth->bindParam(":senha", $senha);
		$sth->bindParam(":gerMensagem", $gerMensagem, PDO::PARAM_INT);
		$sth->bindParam(":gerAdmin", $gerAdmin, PDO::PARAM_INT);
		$sth->bindParam(":id", $id, PDO::PARAM_INT);
		$sth->execute();
		return $sth->rowCount();
	}
	
	function __destruct()
	{
		$con = null;
	}
}

class CRUD_Anunciante extends CRUD
{
	function __construct()
	{
		parent::__construct();
		$this->tabela = "Anunciante";
	}
	
	function inserir($nome, $telefone, $email, $descricao, $situacao, $setor)
	{
		$sql = "INSERT INTO Anunciante (nome, telefone, email, descricao, situacao, setor) VALUES".
		"(:nome, :telefone, :email, :descricao, :situacao, :setor)";
		$sth = $this->con->prepare($sql);
		$sth->bindParam(":nome", $nome);
		$sth->bindParam(":telefone", $telefone);
		$sth->bindParam(":email", $email);
		$sth->bindParam(":descricao", $descricao);
		$sth->bindParam(":situacao", $situacao, PDO::PARAM_INT);
		$sth->bindParam(":setor", $setor, PDO::PARAM_INT);
		$sth->execute();
		return $sth->rowCount();
	}
	function atualizar($id, $nome, $telefone, $email, $descricao, $situacao, $setor)
	{
		$sql = "UPDATE Anunciante SET nome = :nome, telefone = :telefone, email = :email, descricao = :descricao ,".
		"situacao = :situacao, setor = :setor WHERE id_Anuciante = :id";
		$sth = $this->con->prepare($sql);
		$sth->bindParam(":nome", $nome);
		$sth->bindParam(":telefone", $telefone);
		$sth->bindParam(":email", $email);
		$sth->bindParam(":descricao", $descricao);
		$sth->bindParam(":situacao", $situacao, PDO::PARAM_INT);
		$sth->bindParam(":setor", $setor, PDO::PARAM_INT);
		$sth->bindParam(":id", $id, PDO::PARAM_INT);
		$sth->execute();
		return $sth->rowCount();
	}
	
	function __destruct()
	{
		$con = null;
	}
}
class CRUD_Cidade extends CRUD
{
	function __construct()
	{
		parent::__construct();
		$this->tabela = "Cidade";
	}
	
	function inserir($nome)
	{
		$sql = "INSERT INTO Cidade SET nome = :nome";
		$sth = $this->con->prepare($sql);
		$sth->bindParam(":nome", $nome);
		$sth->execute();
		return $sth->rowCount();
	}
	function atualizar($id, $nome)
	{
		$sql = "UPDATE Cidade SET nome = :nome WHERE id_Cidade = :id";
		$sth = $this->con->prepare($sql);
		$sth->bindParam(":nome", $nome);
		$sth->bindParam(":id", $id, PDO::PARAM_INT);
		$sth->execute();
		return $sth->rowCount();
	}
	
	function __destruct()
	{
		$con = null;
	}
}

class CRUD_Foto extends CRUD
{
	function __construct()
	{
		parent::__construct();
		$this->tabela = "Foto";
	}
	
	function inserir($url, $nome)
	{
		$sql = "INSERT INTO Foto (`url`, `nome`) VALUES (:url, :nome)";
		$sth = $this->con->prepare($sql);
		$sth->bindParam(":url", $url);
		$sth->bindParam(":nome", $nome);
		$sth->execute();
		return $sth->rowCount();
	}
	function atualizar($id, $url, $nome)
	{
		$sql = "UPDATE Foto SET nome = :nome, url = :url WHERE id_Foto = :id";
		$sth = $this->con->prepare($sql);
		$sth->bindParam(":nome", $nome);
		$sth->bindParam(":url", $url);
		$sth->bindParam(":id", $id, PDO::PARAM_INT);
		$sth->execute();
		return $sth->rowCount();
	}
	
	function __destruct()
	{
		$con = null;
	}
}

class CRUD_Informacao extends CRUD
{
	function __construct()
	{
		parent::__construct();
		$this->tabela = "Informacao";
	}
	
	function inserir($descricao, $setor, $posicao, $cidade)
	{
		$sql = "INSERT INTO Informacao (descricao, posicao, setor, fk_id_Cidade) VALUES (:descricao, :posicao, :setor, :cidade)";
		$sth = $this->con->prepare($sql);
		$sth->bindParam(":descricao", $descricao);
		$sth->bindParam(":setor", $setor, PDO::PARAM_INT);
		$sth->bindParam(":posicao", $posicao, PDO::PARAM_INT);
		$sth->bindParam(":cidade", $cidade, PDO::PARAM_INT);
		$sth->execute();
		return $sth->rowCount();
	}
	function atualizar($id, $descricao, $setor, $posicao)
	{
		$sql = "UPDATE Informacao SET descricao = :descricao, posicao = :posicao, setor = :setor WHERE id_Informacao = :id";
		$sth = $this->con->prepare($sql);
		$sth->bindParam(":descricao", $descricao);
		$sth->bindParam(":posicao", $posicao, PDO::PARAM_INT);
		$sth->bindParam(":setor", $setor, PDO::PARAM_INT);
		$sth->bindParam(":id", $id, PDO::PARAM_INT);
		$sth->execute();
		return $sth->rowCount();
	}
	
	function __destruct()
	{
		$con = null;
	}
}

//$admin = new CRUD_Cidade();
//var_dump($admin->deletar(3));

?>
