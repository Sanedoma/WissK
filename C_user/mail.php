<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="acceuil.css">
    <title>Réservation</title>
</head>
<body>
<section class="navbar">
    <div class="left-div">
        <a href="./acceuil.php"><img src="../logowissk3.png" alt=""></a>
    </div>
    <div class="right-div">
        <a href="../connexion.php?route=logout"><button class="button" >Logout</button></a>
    </div>
</section>

    <h1>Réservation des places</h1>
<form method="post">
        <div class="input-box">
            <input type="email" class="input-field" placeholder="Email" id="ID" name="ID" required>
            <i class="bx bx-user"></i>
        </div>
        <div class="input-box">
            <input type="number" class="input-field" placeholder="nombre de billet" id="billet" name="billet">
            <i class="bx bx-lock-alt"></i>
        </div>
        <div class="input-box">
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Entrer votre message"></textarea>
        </div>
        <div class="input-box">
            <input type="submit" class="submit" value="Envoyer">
        </div>
    
<?php
if(isset($_POST['message'])){
    $message= "voci un commande de " . $_POST['billet']. "pour le compte" . $_POST['ID'] . "vers " .$_GET['name']. "voci le messsage:" .$_POST['message'];
    $return=mail($_POST['ID'] /* Email de Wissem */,"Réservation", $message, "Reply-to:" . $_POST['ID']);
    if($return){
        echo "<p>Le message à été envoyer. Vous receverez bientôt un Email avec votre (vos) Billet(s).</p>";
        echo "<a href='./acceuil.php'>Revenir à l'accueil</a>";
        }else{
        echo "<p>Le message n'a pas été envoyer. Un problème est survenue</p>";
        echo "<a href='./acceuil.php'>Revenir à l'accueil</a>";
    }
}
?>
</form>

</body>
</html>
