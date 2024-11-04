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
            <a href="#" class ="link">Vos Films</a>
        </li>
        <li>
            <a href="ajouterFilm.php" class ="link">Ajouter Des Films</a>
        </li>
        <li>
            <a href="modifierFilm.php" class ="link">Modifier Vos Films</a>
        </li>
    </ul>
   
</nav>
</header>


<main>
<section id = "catalogue">

<?php
    $sql = "SELECT * FROM movie";
    $resultat = $conn->query($sql);
    if(mysqli_num_rows($resultat)>0){
        while($listeFilm = mysqli_fetch_assoc($resultat)){
?>
    <a target = "_BLANK" href="page.php?id=<?php echo $listeFilm['id']; ?>">
    <div class = "box">
        <table>
            <tr>
                <th> <h1 class = "titreFilm"><?php echo $listeFilm['title']; ?></h1></th>
            </tr>
            <tr>
                <td> Date de sortie : <?php echo $listeFilm['year']?></td>
            </tr>
            <tr>
                <td> Synopsis : <?php echo $listeFilm['synopsis']?></td>
            </tr>
            <tr>
                <td> Réalisateur : <?php echo $listeFilm['director']?></td>
            </tr>
            <tr>
                <td> Genre : <?php echo $listeFilm['genre']?></td>
            </tr>
        </table>
        
        <br/>
        <p>Appuyer pour en savoir plus</p>
    </div>
    </a>
<?php
        }
    }else{
        echo "Vous n'avez aucun film";
    }
?>

<?php

if(isset($_POST["submit"])){
    $avis = $_POST["avis"];

    $sql = "INSERT INTO avis(id,avis) VALUES('$id', '$avis')";
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

