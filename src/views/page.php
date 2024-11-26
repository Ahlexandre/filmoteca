<?php
include 'connexion.php';

$film_id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang = "fr">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title></title>
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
            <a href="modifierFilm.php" class ="link">Modifier Vos Films</a>
        </li>
    </ul>
   
</nav>
</header>

<?php
    $sql = "SELECT * FROM movie WHERE id = $film_id";
    $resultat = $conn->query($sql);
    if(mysqli_num_rows($resultat)>0){
        while($listeFilm = mysqli_fetch_assoc($resultat)){

?>
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
        <form class = "avis" method = "POST" action = "">
        <label for = "avis">Laissez votre avis</label>
        <textarea class = "avis" type="text" name="avis" id="avis" placeholder = "Avis"></textarea>
        <input class="btn" type="submit" name="submit" value="Envoyer">
    </form>
    </div>
<?php 
        }
    }
 ?>

 <?php 
 $film_id = $_GET["id"];
 if (isset($_POST["submit"])){
    $avis = $_POST["avis"];
    $sql = "INSERT INTO avis(idfilm, avis) VALUES('$film_id', '$avis')";
    $soumettre_avis = $conn->query($sql);
 }
 

 $sql2 = "SELECT * FROM avis WHERE idfilm = $film_id";
 $selection_avis = $conn->query($sql2);

 if(mysqli_num_rows($selection_avis)>0){
    while($listeCommentaire = mysqli_fetch_assoc($selection_avis)){
        echo $listeCommentaire["avis"]."<br>";
    }
 }else{
    echo "Il n'y aucun avis sur ce film";
 }


 ?>

</body>
</html>
