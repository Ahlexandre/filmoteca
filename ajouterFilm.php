<?php
include "connexion.php";

if (isset($_POST["submit"])) {
    $titre = $_POST["titre"];
    $year = $_POST["year"];
    $synopsis = $_POST["synopsis"];
    $director = $_POST["director"];
    $created = date('Y-m-d H:i:s');
    $deleted = date('Y-m-d H:i:s');
    $genre =$_POST["genre"];

    $sql = "INSERT INTO movie(title, year, synopsis, director, `created-at`, `deleted-at`, genre) VALUES('$titre', '$year', '$synopsis', '$director', '$created', '$deleted', '$genre')";

    $resultat = $conn->query($sql);

    echo "<br>";
    if ($resultat == TRUE) {
        echo "Un nouveau film a été ajouté";
    } else {
        echo "Echec d'ajout : " . $idcon->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ajouter des films</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>

<header>

<h1>
    Filmoteca
</h1>

<nav>
    <ul>
        <li>
            <a href="index.php" class ="link">Vos Films</a>
        </li>
        <li>
            <a href="ajouterFilm.php" target = "_BLANK" class ="link">Ajouter Des Films</a>
        </li>
        <li>
            <a href="modifierFilm.php"" class ="link">Modifier Vos Films</a>
        </li>
    </ul>
   
</nav>

</header>

<?php
?>
<section id="formulaire">
    <div class="formulaire-box">
        <form action="" method="POST">
            <h3>Ajouter un film</h3>
            <input class="box" type="text" name="titre" placeholder="Titre" required>
            <input class="box" type="date" name="year" placeholder="Année" required>
            <input class="box" type="text" name="synopsis" placeholder="Synopsis" required>
            <input class="box" type="text" name="director" placeholder="Directeur" required>
            <input class="box" type="text" name="genre" placeholder="Genre" required>
            <input class="btn" type="submit" name="submit" value="Ajouter">
        </form>
    </div>
</section>


</body>

<footer>
    
</footer>


</html>