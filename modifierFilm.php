<?php
include "connexion.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
    <link href = "styles/style.css" rel = "stylesheet">
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
            <a href="ajouterFilm.php" class ="link">Ajouter Des Films</a>
        </li>
        <li>
            <a href="#" class ="link">Modifier Vos Films</a>
        </li>
    </ul>
   
</nav>
</header>


<main>
<section>

<table class = "tableauFilm">
    <tr>
        <th>Titre</th>
        <th>Année</th>
        <th>Synopsis</th>
        <th>Réalisateur</th>
        <th>Genre</th>
        <th>Action</th>
        </tr>
<?php
    $sql = "SELECT * FROM movie";
    $resultat = $conn->query($sql);
    if(mysqli_num_rows($resultat)>0){
        while($listeFilm = mysqli_fetch_assoc($resultat)){
?>

        <tr>
                <td> <?php echo $listeFilm['title']; ?></td>
                <td> <?php echo $listeFilm['year']?></td>
                <td> <?php echo $listeFilm['director']?></td>
                <td> <?php echo $listeFilm['genre']?></td>
            </tr>
        </table>

<?php
        }
    }else{
        echo "Vous n'avez aucun film";
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

