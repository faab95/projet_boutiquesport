<?php
class TypeManager
{
	private $_db;
	
	public function __construct($db)
	{
		$this->_db = $db;
	}

	public function add(Type $type)
	{
		$verif;
		$query = "INSERT INTO type(id_type, type_article) VALUES(:id_type, :type_article)";
		try 
		{
            $statement = $this->_db->prepare($query);
			$statement->bindValue(':id_type', $type->__get('id_type'));
			$statement->bindValue(':type_article', $type->__get('type_article'));
			$statement->execute();
			$verif = 1;
        } 
		catch (PDOException $e) 
		{
			$verif = 0;
			print $e;
		}
		return $verif;
	}
	/*
	public function getClient($email, $mdp) 
	{
		$arrayClient = array();
        try 
		{
            $query = "SELECT * FROM client WHERE email =:email AND mdp =:mdp";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $email);
			$resultset->bindValue(2, $mdp);
            $resultset->execute();
			while($data = $resultset->fetch()) 
			{
				$arrayClient[] = new Client($data);
			}
        } 
		catch (PDOException $e) 
		{
            $arrayClient = null;
        }
		return $arrayClient;
    }
*/
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