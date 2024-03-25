<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="acceuil.css">
    <title>accueil</title>
</head>

<body>
<section class="navbar">
    <div class="left-div">
        
    </div>
    <div class="right-div">
        <a href="../connexion.php?route=logout"><button class="button" >Logout</button></a>
    </div>
</section>

    <h1>Accueil</h1>

    <p>Bienvenue sur WissKa vous avez si dessous les liens pour nos differente offre</p>

    <div class='link'>
        <ul>
            <li><a href=""></a></li>
        </ul>
    </div>
    <form action="mail.php" method="post">
        <div class="input-box">
            <input type="email" class="input-field" placeholder="Email" id="ID" name="ID" required>
            <i class="bx bx-user"></i>
        </div>
        <div class="input-box">
            <input type="text" class="input-field" placeholder="object" id="object" name="object">
            <i class="bx bx-lock-alt"></i>
        </div>
        <div class="input-box">
            <textarea name="message" id="message" cols="30" rows="10">entrer votre message</textarea>
        </div>
        <div class="input-box">
            <input type="submit" class="submit" value="Sign In">
        </div>
    </form>
    <br><br><br>
</body>
<br>
<section>
<footer>
    <div class = "footer_reseaux">
        <ul>
            <li><a href="">Instagram</a></li>
            <li><a href="">LinkedIn</a></li>
        </ul>
    </div>
    <div class = ""></div>
    <p> <a href="">Mentions légales</a> | <a href="">Politique de Confidentialité</a></p>
    <p>Made by "Nom de l'asso"</p>
</footer>
</section>
</html>