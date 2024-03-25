document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche le formulaire de soumettre de manière traditionnelle

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Vous pouvez ajouter ici une logique pour vérifier les identifiants
    console.log('Tentative de connexion avec :', username, password);

    // Ici, vous pourriez faire une requête à un serveur pour vérifier les identifiants
    // et rediriger l'utilisateur ou afficher un message d'erreur selon le cas.
});
