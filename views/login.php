<?php include "includes/header.php"; ?>

<script>
    function validateLoginForm() {
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        if (!passwordRegex.test(password)) {
            alert("Please enter a valid password. It must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one number.");
            return false;
        }

        return true;
    }
</script>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h2 class="text-center text-white">Login</h2>
                        <form id="loginForm" method="post" onsubmit="return validateLoginForm()">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                            </div>
                           
                            <button type="submit" class="btn btn-secondary btn-block mx-auto">Login</button>
                        </form>
                        <div class="mt-3 text-center">
                            <p class="text-muted">Not registered? <a href="/register/">Register here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
