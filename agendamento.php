<?php

include_once 'conectar.php';
class agendamento
{
	private $id;
	private $nome;
	private $telefone;
	private $origem;
	private $datacontato;
	private $observacao;
	private $conn;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($iid){
		$this->id = $iid;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setNome($name){
		$this->nome=$name;
	}
	
	public function getTelefone(){
		return $this->telefone;
	}
	
	public function setTelefone($tel){
		$this->telefone=$tel;
	}
	
	public function getOrigem(){
		return $this->origem;
	}
	
	public function setOrigem($org){
		$this->origem=$org;
	}
	
	public function getDataContato(){
		return $this->DataContato;
	}
	
	public function setDataContato($cont){
		$this->DataContato=$cont;
	}
	
	public function getObservacao(){
		return $this->observacao;
	}
	
	public function setObservacao($obs){
		$this->observacao=$obs;
	}
	
	function salvar()
	{
		try
		{
			$this-> conn = new Conectar();
			$sql = $this->conn->prepare("insert into agendamentos values (null,?,?,?,?,?)");
			@$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
			@$sql-> bindParam(2, $this->getTelefone(), PDO::PARAM_STR);
			@$sql-> bindParam(3, $this->getOrigem(), PDO::PARAM_STR);
			@$sql-> bindParam(4, $this->getDataContato(), PDO::PARAM_STR);
			@$sql-> bindParam(5, $this->getObservacao(), PDO::PARAM_STR);
			if($sql -> execute() == 1)
			{
				return "<center>Registro salvo com sucesso!</center>";
			}
			$this->conn = null;
		}
		catch(PDOException $exc)
		{
			echo "Erro ao salvar o registro." . $exc->getMessage();
		}
	}

	function consultar()
	{
		try
		{
			$this-> conn = new Conectar();
			$sql = $this->conn->prepare("select * from agendamentos where nome like?");
			@$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
			$sql->execute();
			return $sql->fetchAll();
			$this->conn = null;
		}
		catch(PDOException $exc)
		{
			echo "Erro ao executar consulta. " . $exc->getMessage();
		}
	}

	function exclusao()
	{
		try
		{
			$this->conn = new Conectar();
			$sql = $this->conn->prepare("delete from agendamentos where id = ?");
			@$sql->bindParam(1, $this->getId(), PDO::PARAM_STR);
			if($sql->execute() == 1)
			{
				return "<center>Excluido com sucesso!</center>";
			}
			else
			{
				return "Erro na exclusao!";
			}
			$this->conn = null;
		}
		catch(PDOException $exc)
		{
			echo "Erro ao excluir." . $exc -> getMessage();
		}
	}

	function listar()
	{
		try
		{
			$this-> conn = new Conectar();
			$sql = $this->conn->query("select * from agendamentos order by id");
			$sql->execute();
			return $sql->fetchAll();
			$this->conn = null;
		}
		catch(PDOException $exc)
		{
			echo "Erro ao executar consulta. " . $exc->getMessage();
		}
	}

	function alterar()
	{
		try
		{
			$this -> conn = new Conectar();
			$sql = $this->conn->prepare("select * from agendamentos where id = ?");
			@$sql-> bindParam(1, $this->getId(), PDO::PARAM_STR);
			$sql->execute();
			return $sql -> fetchAll();
			$this -> conn = null;
		}
		catch(PDOException $exc)
		{
			echo "Erro ao alterar." . $exc->getMessage();
		}
	}

	function alterar2()
	{
		try
		{
			$this->conn = new Conectar();
			$sql = $this->conn->prepare("update agendamentos set nome = ?, telefone = ?, origem = ?, data_contato = ?, observacao = ?  where id = ?");
			@$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
			@$sql-> bindParam(2, $this->getTelefone(), PDO::PARAM_STR);
			@$sql-> bindParam(3, $this->getOrigem(), PDO::PARAM_STR);
			@$sql-> bindParam(4, $this->getDataContato(), PDO::PARAM_STR);
			@$sql-> bindParam(5, $this->getObservacao(), PDO::PARAM_STR);
			@$sql-> bindParam(6, $this->getId(), PDO::PARAM_STR);
			if($sql->execute() == 1)
			{
				return "Registro alterado com sucesso!";
			}
			$this->conn=null;
		}
		catch(PDOException $exc)
		{
			echo "Erro ao salvar o registro. " . $exc->getMessage();
		}
	}
}

