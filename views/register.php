<?php include "includes/header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Form</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: 0;
        }

        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-block {
            margin-top: 20px;
        }

        .error-message {
            color: #dc3545;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h2 class="text-center text-white">Inscription</h2>
                        <form id="signupForm" method="post">
                            <div class="form-group">
                                <label for="name">Nom:</label>
                                <input type="text" class="form-control" id="name" name="nom" required>
                                <span id="nomError" class="error-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <span id="emailError" class="error-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span id="passwordError" class="error-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirmer le mot de passe:</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                <span id="confirmPasswordError" class="error-message"></span>
                            </div>
                            <button type="submit" class="btn btn-secondary btn-block" name="submit" onclick="validateForm(event)">S'inscrire</button>
                        </form>
                        <div class="mt-3 text-center">
                            <p class="text-muted">Déjà un compte ? <a href="">Connectez-vous ici</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateForm(e) {
            e.preventDefault();

            var nom = document.forms["signupForm"]["nom"].value;
            var email = document.forms["signupForm"]["email"].value;
            var password = document.forms["signupForm"]["password"].value;
            var confirmPassword = document.forms["signupForm"]["confirmPassword"].value;

            var nameRegex = /^[a-zA-Z\s]+$/;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

            var errors = [];

            if (!nameRegex.test(nom)) {
                errors.push("Invalid name (only letters and spaces)");
            }

            if (!emailRegex.test(email)) {
                errors.push("Invalid email address");
            }

            if (!passwordRegex.test(password)) {
                errors.push("Password must contain at least one uppercase letter, one lowercase letter, one digit, and be at least 8 characters long");
            }

            if (password !== confirmPassword) {
                errors.push("Passwords do not match");
            }

            document.getElementById("nomError").innerText = errors.find(e => e.includes("name")) || "";
            document.getElementById("emailError").innerText = errors.find(e => e.includes("email")) || "";
            document.getElementById("passwordError").innerText = errors.find(e => e.includes("Password")) || "";
            document.getElementById("confirmPasswordError").innerText = errors.find(e => e.includes("Passwords do not match")) || "";

            if (errors.length === 0) {
                document.getElementById("signupForm").submit();
            }
        }
    </script>
</body>

</html>
