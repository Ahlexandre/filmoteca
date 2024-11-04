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
            <a href="#" class ="link">Modifier Vos Films</a>
        </li>
    </ul>
   
</nav>

</header>


<main>

<section id = "catalogue">
    
    <div class = "box">
        <h1 class = "titreFilm">Test</h1>
    <form class = "avis">
        <label for = "avis">Laissez votre avis</label>
        <textarea class = "avis" type="text" name="avis" id="avis" placeholder = "Avis"></textarea>
        <input class="btn" type="submit" name="submit" value="Envoyer">
    </form>
    </div>

</section>
</main>

<footer>

</footer>

<?php





?>
    
</body>
</html>

