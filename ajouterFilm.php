<?php
include "connexion.php";

if (isset($_POST["submit"])) {
    $titre = $_POST["titre"];
    $date = $_POST["date"];
    $image = $_POST["image"];

    $sql = "INSERT INTO films(titre, date, image) VALUES('$titre', '$date', '$image')";

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
            <a href="#" class ="link">Modifier Vos Films</a>
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
            <input class="box" type="date" name="date" placeholder="Date" required>
            <input class="box" type="text" name="image" placeholder="Lien vers l'image" required>
            <input class="btn" type="submit" name="submit" value="Ajouter">
        </form>
    </div>
</section>


</body>

<footer>
    
</footer>


</html>