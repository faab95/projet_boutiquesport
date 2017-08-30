<?php
class ClientManager
{
	private $_db;
	
	public function __construct($db)
	{
		$this->_db = $db;
	}

	public function add(Client $cli)
	{
		$verif;
		$query = "INSERT INTO client(nom, prenom, rue, num, cp, ville, email, mdp) VALUES(:nom, :prenom, :rue, :num, :cp, :ville, :email, :mdp)";
		try 
		{
            $resultset = $this->_db->prepare($query);
			$resultset->bindValue(1, $cli->__get('nom'));
			$resultset->bindValue(2, $cli->__get('prenom'));
			$resultset->bindValue(3, $cli->__get('rue'));
			$resultset->bindValue(4, $cli->__get('num'));
			$resultset->bindValue(5, $cli->__get('cp'));
			$resultset->bindValue(6, $cli->__get('ville'));
			$resultset->bindValue(7, $cli->__get('email'));
			$resultset->bindValue(8, $cli->__get('mdp'));
			$resultset->execute();
			$verif = 1;
        } 
		catch (PDOException $e) 
		{
			$query = "SELECT * FROM client WHERE email =:email";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $cli->__get('email'));
            $resultset->execute();
			if($resultset->fetch())
			{
				$verif = -1;
			}
			else
			{
				$verif = 0;
			}
		}
		return $verif;
	}
	
	public function getClient($email, $mdp) 
	{
		$client =  null;
        try 
		{
            $query = "SELECT * FROM client WHERE email =:email AND mdp =:mdp";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $email);
			$resultset->bindValue(2, $mdp);
            $resultset->execute();
			if($data = $resultset->fetch()) 
			{
				$client = new Client($data);
			}
        } 
		catch (PDOException $e) 
		{
            $client = null;
        }
		return $client;
    }
	
	public function getClientById($id_client) 
	{
		$client =  null;
        try 
		{
            $query = "SELECT * FROM client WHERE id_client =:id_client";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id_client);
            $resultset->execute();
			if($data = $resultset->fetch()) 
			{
				$client = new Client($data);
			}
        } 
		catch (PDOException $e) 
		{
            $client = null;
        }
		return $client;
    }
	
	public function update($cli) 
	{
		$verif;
        try 
		{
            $query = "UPDATE client SET nom=:nom, prenom=:prenom, rue=:rue, num=:num, cp=:cp, ville=:ville, email=:email, mdp=:mdp WHERE id_client=:id_client";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $cli->__get('nom'));
			$resultset->bindValue(2, $cli->__get('prenom'));
			$resultset->bindValue(3, $cli->__get('rue'));
			$resultset->bindValue(4, $cli->__get('num'));
			$resultset->bindValue(5, $cli->__get('cp'));
			$resultset->bindValue(6, $cli->__get('ville'));
			$resultset->bindValue(7, $cli->__get('email'));
			$resultset->bindValue(8, $cli->__get('mdp'));
			$resultset->bindValue(9, $cli->__get('id_client'));
            $resultset->execute();
			$verif = $resultset->rowCount();
        } 
		catch (PDOException $e) 
		{
			$verif = 0;
        }
		return $verif;
    }
}
?>