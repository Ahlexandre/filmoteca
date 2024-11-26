<?php

include 'connexion.php';


if(isset($_GET['page'])){
    $page = $_GET['page'];
}

if ($page === 'contact') {
    echo "<h1>Page de Contact</h1>";
    var_dump("Vous êtes sur la page de contact");
} elseif ($page === 'films') {
    echo "<h1>Page des Films</h1>";
    var_dump("Vous êtes sur la page des films");
} else {
    echo "<h1>Page d'accueil</h1>";
    var_dump("Bienvenue sur la page d'accueil");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
    <link href="styles/style.css" rel="stylesheet">
</head>
<body>

<header>

<h1>
    Filmoteca
</h1>

<nav>
    <ul>
        <li>
            <a href="index.php?page=films" class="link">Vos Films</a>
        </li>
        <li>
            <a href="ajouterFilm.php" class="link">Ajouter Des Films</a>
        </li>
        <li>
            <a href="modifierFilm.php" class="link">Modifier Vos Films</a>
        </li>
        <li>
            <a href="index.php?page=films" class="Films">Films</a>
        </li>
        <li>
            <a href="index.php?page=contact" class="link">Contact</a>
        </li>
    </ul>

</nav>
</header>


<main>
<section id="catalogue">

<?php
    // Simulation d'une requête pour afficher des films
    $sql = "SELECT * FROM movie";
    $resultat = $conn->query($sql);
    if (mysqli_num_rows($resultat) > 0) {
        while ($listeFilm = mysqli_fetch_assoc($resultat)) {
?>
    <a target="_BLANK" href="page.php?id=<?php echo $listeFilm['id']; ?>">
    <div class="box">
        <table>
            <tr>
                <th> <h1 class="titreFilm"><?php echo $listeFilm['title']; ?></h1></th>
            </tr>
            <tr>
                <td> Date de sortie : <?php echo $listeFilm['year']; ?></td>
            </tr>
            <tr>
                <td> Synopsis : <?php echo $listeFilm['synopsis']; ?></td>
            </tr>
            <tr>
                <td> Réalisateur : <?php echo $listeFilm['director']; ?></td>
            </tr>
            <tr>
                <td> Genre : <?php echo $listeFilm['genre']; ?></td>
            </tr>
        </table>
        
        <br/>
        <p>Appuyer pour en savoir plus</p>
    </div>
    </a>
<?php
        }
    } else {
        echo "Vous n'avez aucun film";
    }
?>

<?php
if (isset($_POST["submit"])) {
    $avis = $_POST["avis"];
    $sql = "INSERT INTO avis(id, avis) VALUES('$id', '$avis')";
}
?>


</section>
</main>

<footer>

</footer>

<?php
?>

</body>
</html>
