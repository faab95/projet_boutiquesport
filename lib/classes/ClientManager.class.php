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
            $statement = $this->_db->prepare($query);
			$statement->bindValue(':nom', $cli->__get('nom'));
			$statement->bindValue(':prenom', $cli->__get('prenom'));
			$statement->bindValue(':rue', $cli->__get('rue'));
			$statement->bindValue(':num', $cli->__get('num'));
			$statement->bindValue(':cp', $cli->__get('cp'));
			$statement->bindValue(':ville', $cli->__get('ville'));
			$statement->bindValue(':email', $cli->__get('email'));
			$statement->bindValue(':mdp', $cli->__get('mdp'));
			$statement->execute();
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
}
?>