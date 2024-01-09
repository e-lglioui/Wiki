
<?php include"includes/header.php";
?>


<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h2 class="text-center text-white">Inscription</h2>
                        <form id="signupForm">
                            <div class="form-group">
                                <label for="name">Nom:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirmer le mot de passe:</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            </div>
                            <button type="submit" class="btn btn-secondary btn-block">S'inscrire</button>
                        </form>
                        <div class="mt-3 text-center">
                            <p class="text-muted">Déjà un compte ? <a href="login.html">Connectez-vous ici</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>