<?php
session_start();


if (isset($_POST['type'])&& isset($_POST['nom'])&& isset($_POST['prenom']) && isset($_POST['ID']) && isset($_POST['password'])){
    $file_name="utilisateur.csv";
   
    $file =fopen($file_name, "a");
 
    $id= $_POST["ID"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $password = $_POST["password"];
    $type = $_POST["type"];
   
    $emailPattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,4}$/';
    $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@$!%*#?&])[A-Za-z0-9@$!%*#?&]{8,}$/';
    $emailValid = preg_match($emailPattern, $id);
    $passwordValid = preg_match($passwordPattern, $password);
 
    if (!$emailValid) {
        echo "L'adresse email est invalide !";
    } elseif (!$passwordValid) {
        echo "Votre mot de passe doit avoir une longueur minimale de 8 caractères et contenir au moins une lettre minuscule, une lettre majuscule, un chiffre, et un caractère spécial parmi @$!%*#?&";
    } elseif (userExists($file_name, $id)) {
        echo "Un utilisateur avec cet email existe déjà !";
    } else {
 
        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
 
 
        if ($file !== false) {
            fputcsv($file, [$_POST["type"], $_POST["nom"], $_POST["prenom"], $_POST["ID"], $password_hash,]);
            fclose($file);
            $_SESSION['username'] = $id;
            $_SESSION['type'] = $type;
            if($type == "admin"){
                header("Location: ./C_admin/acceuil.php");   
            }else{
                header("Location: ./C_user/acceuil.php");
            }
            
        }
 
        if(!empty($_POST['g-recaptcha-response']) || isset($_POST['g-recaptcha-response'])) {
            $secret="6LdHMKApAAAAAHcZ_DY8URQDTKGijDsmsRacATFt";
            $response = $_POST['g-recaptcha-response'];
            $data=json_decode($response);
       
        }
    }
}
function userExists($file_name, $id) {
    $file = fopen($file_name, "r");
   
       if ($file !== false) {
           while (($user = fgetcsv($file)) !== false) {
               if (isset($user[3]) && $user[3] === $id) {
                   fclose($file);
                   return true;
               }
           }
   
           fclose($file);
       }
   
       return false;
   }
 
?>