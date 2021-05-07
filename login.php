<?php
session_start();
include "includes/functions/init.php";

$pageTitle = "Login";

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    if (isset($_SESSION['id']))
    {
        session_unset();
        session_destroy();
    }
    if (empty($_POST['username']))
    {
        echo 101;
        exit;
    }
    else if (empty($_POST['password']))
    {
        echo 102;
        exit;
    }
    else
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM Users WHERE Username = ?");
        $stmt->execute(array($user));

        if ($stmt->rowCount() == 0) {
            echo 103;
            exit;
        }
        else
        {
            $dbrow = $stmt->fetch();

            $passhash = $dbrow["Password"];
            if (password_verify($pass, $passhash))
            {
                // Start login
                $_SESSION["id"] = $dbrow['ID'];
                $_SESSION['username'] = $dbrow['Username'];

                echo 0;
                exit;
            }
            else
            {
                echo 103;
                exit;
            }
        }
    }
    exit;
}
else
{
    if (isset($_SESSION['id']))
    {
        header("Location: index.php");
    }
    
    include "$tmp/header.php";
    ?>

        <body class="login">

        <h1 class="text-center"> Login </h1>
        <form name="form">
            <!-- Start Username field -->
                <p id="username-err" class="text-danger error"> </p>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="uername" placeholder="Enter Username" autocomplete="off">
                    </div>
                </div>
            <!-- End Username field -->

            <!-- Start Password field -->
                <p id="password-err" class="text-danger error"> </p>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" autocomplete="off">
                    </div>
                </div>
            <!-- End Password field -->

            <!-- Start Save Button field -->
                <div class="form-group">
                    <!-- <div class="col-sm-10"> -->
                        <button type="submit" class="btn btn-primary" id="login"><i class="fa fa-sign-in-alt"></i> Login</button>
                    <!-- </div> -->
                </div>
            <!-- End Save Button field -->
        </form>
        <script src="layout/js/login.js"></script>
    
    <?php
        include "$tmp/footer.php";
}
    
?>