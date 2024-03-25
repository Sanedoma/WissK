<?php
session_start();

function updateUserProfile($type, $email, $newPassword){   
    // Chemin vers le fichier CSV
    $file_path = "./utilisateur.csv";
    // Lire le contenu du fichier CSV dans un tableau
    $users_online = array_map('str_getcsv', file($file_path));

    $rep = FALSE;
    $data = []; // Initialisation du tableau $data

    // Parcourir le tableau pour trouver l'utilisateur et mettre à jour ses informations
    foreach ($users_online as $key => $user) {
        if ($user[3] == $email) {
            // Sauvegarde des informations de l'utilisateur avant la modification du mot de passe
            $data = [$user[1], $user[2], $user[3]];
            // Mettre à jour le type et le mot de passe de l'utilisateur
            $users_online[$key] = [$type, $user[1], $user[2], $user[3], $newPassword];
            $rep = TRUE; // La mise à jour a été effectuée avec succès
        }
    }

    if ($rep) {
        // Réécrire tout le contenu du fichier CSV avec les informations mises à jour
        $file = fopen($file_path, "w");
        foreach ($users_online as $user) {
            fputcsv($file, $user);
        }
        fclose($file);
    }

    return $rep;
}


 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newPassword = $_POST['new_password']; 
    $type = $_POST['type'];
    $email = $_POST['mail'];
 
    if (updateUserProfile($type, $email, $newPassword) == TRUE){

        echo "Profil mis à jour avec succès";
        header("Location: index.html");
    } else {
        
        echo "Échec de la mise à jour du profil";
        header("Location: accont.php");
    }

}
