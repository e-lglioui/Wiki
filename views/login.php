
<?php include"includes/header.php";
?>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h2 class="text-center text-white">Login</h2>
                        <form id="loginForm">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                           
                            <button type="submit" class="btn btn-secondary btn-block mx-auto">Login</button>
                        </form>
                        <div class="mt-3 text-center">
                            <p class="text-muted">Not registered? <a href="registration.html">Register here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    
