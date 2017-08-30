<?php
class TailleManager
{
	private $_db;
	
	public function __construct($db)
	{
		$this->_db = $db;
	}
	
	public function getAllTailles($id_type) 
	{
		$arrayTailles = array();
        try 
		{
            $query = "SELECT * FROM taille WHERE id_type =:id_type";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id_type);
            $resultset->execute();
			while($data = $resultset->fetch()) 
			{
				$arrayTailles[] = new Taille($data);
			}
        } 
		catch (PDOException $e) 
		{
            $arrayTailles = null;
        }
		return $arrayTailles;
    }
}
?>