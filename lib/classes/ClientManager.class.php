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
		$query = "INSERT INTO client(nom, prenom, rue, num, cp, ville, mail, mdp) VALUES(:nom, :prenom, :rue, :num, :cp, :ville, :mail, :mdp)";
		try 
		{
            $statement = $this->_db->prepare($query);
			$statement->bindValue(':nom', $cli->__get('nom'));
			$statement->bindValue(':prenom', $cli->__get('prenom'));
			$statement->bindValue(':rue', $cli->__get('rue'));
			$statement->bindValue(':num', $cli->__get('num'));
			$statement->bindValue(':cp', $cli->__get('cp'));
			$statement->bindValue(':ville', $cli->__get('ville'));
			$statement->bindValue(':mail', $cli->__get('mail'));
			$statement->bindValue(':mdp', $cli->__get('mdp'));
			$statement->execute();
			print "Insertion réussie CLASHEUR";
        } 
		catch (PDOException $e) 
		{
            print "Echec de l'insertion : " . $e;
        }
	}
	
	public function getClient($id) 
	{
		$_typeArray = array();
        try 
		{
            $query = "SELECT * FROM client WHERE id_client =:id_client as _typeArray";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id, PDO::PARAM_INT);
            $resultset->execute();
            $data = $resultset->fetchAll();
            $resultset->execute();
        } 
		catch (PDOException $e) 
		{
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) 
		{
            try 
			{
                $_typeArray[] = new Client($data);
            } 
			catch (PDOException $e) 
			{
                print $e->getMessage();
            }
        }
        return $_typeArray;
    }

	/*
	public function getListClient()
	{
		$persos = [];
		$q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages ORDER BY nom');
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$persos[] = new Personnage($donnees);
		}
		return $persos;
	}
	*/
}
?>