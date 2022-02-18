<?php

require "DBconfig.php";

$action = new databaseaction();

if(isset($_POST['registration'])){
    $action->registerdata($_POST['email'],$_POST['password']);
}

?>

<?php include "../sections/header.php"?>

    <body>
        <div class="container d-flex justify-content-center">
            <div class="col-lg-6 mt-5">
            <h1 class="ps-4 pe-4">Registration</h1>
            <form class="p-4" action="signup.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn btn-primary" name="registration">Register</button>
                <a class="ms-5" href="login.php">I have an account</a>
            </form>
            <?php echo $action->message?>
            </div>
        </div>

<?php include "../sections/footer.php"?>
