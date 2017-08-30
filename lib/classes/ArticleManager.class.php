<?php
class ArticleManager
{
	private $_db;
	
	public function __construct($db)
	{
		$this->_db = $db;
	}

	public function add(Article $article)
	{
		$verif;
		$query = "INSERT INTO article(id_article, image, nom, marque, prix, stock, id_type) VALUES(:id_article, :image, :nom, :marque, :prix, :stock, :id_type)";
		try 
		{
            $statement = $this->_db->prepare($query);
			$statement->bindValue(':id_article', $article->__get('id_article'));
			$statement->bindValue(':image', $article->__get('image'));
			$statement->bindValue(':nom', $article->__get('nom'));
			$statement->bindValue(':marque', $article->__get('marque'));
			$statement->bindValue(':prix', $article->__get('prix'));
			$statement->bindValue(':stock', $article->__get('stock'));
			$statement->bindValue(':id_type', $article->__get('id_type'));
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
	
	public function getArticle($id_article) 
	{
		$article = null;
        try 
		{
            $query = "SELECT * FROM article WHERE id_article =:id_article";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id_article);
            $resultset->execute();
			$verif=2;
			if($data = $resultset->fetch()) 
			{
				$article = new Article($data);
			}
        } 
		catch (PDOException $e) 
		{
            $article = null;
        }
		return $article;
    }

	public function getAllArticles($id_type) 
	{
		$arrayArticles = array();
        try 
		{
            $query = "SELECT * FROM article WHERE id_type =:id_type";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id_type);
            $resultset->execute();
			while($data = $resultset->fetch()) 
			{
				$arrayArticles[] = new Article($data);
			}
        } 
		catch (PDOException $e) 
		{
            $arrayArticles = null;
        }
		return $arrayArticles;
    }
}
?>