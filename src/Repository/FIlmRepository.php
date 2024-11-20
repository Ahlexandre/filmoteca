<?php

class FilmRepository
{
    private $pdo;

    public function __construct()
    {
        // Configuration des informations de connexion
        $dsn = 'mysql:host=localhost;dbname=filmoteca';
        $username = 'filmoteca_user';
        $password = 'filmoteca_password';

        try {
            $this->pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getFilmById(int $id)
    {
        $sql = "SELECT * FROM films WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return $this->mapFilmEntity($row);
        }

        return null; 
    }


    public function mapFilmEntity(array $row)
    {
        $film = new FilmEntity();
        $film->setId($row['id']);
        $film->setTitle($row['title']);
        $film->setYear($row['year']);
        $film->setGenre($row['genre']);
        $film->setSynopsis($row['synopsis']);
        $film->setDirector($row['director']);
        $film->setDeletedAt($row['deleted_at']);
        $film->setCreatedAt($row['created_at']);

        return $film;
    }
}
