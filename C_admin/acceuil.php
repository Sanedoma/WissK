

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin.css">
  <link rel="shortcut icon" href="./images(1).jpeg" type="image/x-icon">
  <title>Administration</title>
</head>
<body>
<!-- Partie navbar -->
<section class="navbar">
    <div class="left-div">
        
    </div>
    <div class="right-div">
        <a href="../connexion.php?route=logout"><button class="button" >Logout</button></a>
    </div>
</section>

    <h1>Dashboard Administrateur</h1>
    <br><br>
    <h2>utilisateurs</h2>
    <form method="post" action="ban.php">
        <table>
            <tr>
                <th>Type</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Statut</th>
                <th>Activer/Désactiver</th>
            </tr>
            <?php
            $user_file = '../utilisateur.csv';
            $ban_file = '../ban.csv';
            $ban = array_map('str_getcsv', file($ban_file));
            $login_file = '../connexion.csv';
            $conn = array_map('str_getcsv', file($login_file));

            // Vérification de l'existence du fichier d'utilisateurs
            if (($file = fopen($user_file, 'r')) !== FALSE) {
                while (($data = fgetcsv($file, 16000, ",")) !== FALSE ) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($data[0]) . "</td>"; // Type de l'utilisateur
                    echo "<td>" . htmlspecialchars($data[2]) . "</td>"; // Nom de l'utilisateur
                    echo "<td>" . htmlspecialchars($data[3]) . "</td>"; // Pseudo de l'utilisateur
                    echo "<td>";
                    $connected = FALSE;
                    foreach($conn as $connect){
                        if($connect[0] == $data[3]){
                            echo "Connecté";
                            $connected = TRUE;
                            break;
                        }
                    }
                    if(!$connected){
                        echo "Déconnecté";
                    }
                    echo "</td>";
                    
                    // bouton pour bannir l'utilisateur
                    echo "<td>";
                    $banned = FALSE;
                    foreach($ban as $banish){
                        if($banish[0] == $data[3]){
                            echo "<input type='submit' name='". htmlspecialchars($data[3]) ."' value='deban'>";
                            $banned = TRUE;
                            break;
                        }
                    }
                    if(!$banned){
                        echo "<input type='submit' name='". htmlspecialchars($data[3]) ."' value='Ban'>";
                    }
                    echo "</td>";
                    
                    echo "</tr>";
                }
                fclose($file); // Fermeture du fichier
            }
            ?>
        </table>
    </form>

</body>
</html>
