<?php

require "DBconfig.php";

$action = new databaseaction();

if(isset($_POST['login'])){
    $action->login($_POST['email'],$_POST['password']);
}

?>

<?php include "../sections/header.php"?>

        <div class="container d-flex justify-content-center">
            <div class="col-lg-6 mt-5">
            <h1 class="ps-4 pe-4">Login</h1>
            <form class="p-4" action="login.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
                <!-- <a class="ms-5" href="login.php">I lost password</a> -->
                <a class="ms-5" href="signup.php">Register new account</a>
            </form>
            <?php echo $action->message?>
            </div>
        </div>

<?php include "../sections/footer.php"?>