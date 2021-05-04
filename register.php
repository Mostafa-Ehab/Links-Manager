<?php
include "templates/dbconnect.php";
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
    else if (empty($_POST['confirmPass']))
    {
        echo 104;
        exit;
    }
    else if ($_POST['password'] != $_POST['confirmPass'])
    {
        echo 105;
        exit;
    }
    else
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = '$user'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) != 0) {
            echo 106;
            exit;
        }
        else
        {   
            session_start();
            $token = session_id();
            $passhash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password) values('$user', '$passhash')";
            if (mysqli_query($conn, $sql))
            {
                $_SESSION['id'] = $id = mysqli_insert_id($conn);
                $token = $id . $token;
                $sql = "UPDATE users SET session = '$token' WHERE id = $id";
                if (mysqli_query($conn, $sql))
                {
                    setcookie("token", $token, time() + 3600);
                    echo 0;
                }
                else
                {
                    echo "Internal Error" . mysqli_error($conn);
                }
            }
            else
            {
                echo "Internal Error" . mysqli_error($conn);
            }
            exit;
        }
    }
}
else if (isset($_COOKIE['token']))
{
    if (isset($_SESSION['id']))
    {
        session_unset();
        session_destroy();
    }
    $token = $_COOKIE['token'];
    $sql = "SELECT id FROM users WHERE session = '$token'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0)
    {
        setcookie("token", "", time() - 3600);
        header("Location: /register.php");
        exit;
    }
    else
    {
        session_start();
        $_SESSION['id'] = mysqli_fetch_assoc($result)['id'];
        header("Location: /");
        exit;
    }
}
else
{
    $title = "Links Manager - Register";
    $name = "register";
    include "templates/header.php";
?>
        <nav class="navbar navbar-expand-md navbar-light bg-light border fixed-top">
             <!-- logo -->
            <a class="navbar-brand col-2 nav-icon" href="/">
                <img src="img/logo.png" alt="logo" style="width:50px;">
            </a>
        </nav>
        <main class="contain">
            <form name="form">
                <div>
                    <p id="username" class="text-danger check"> </p>
                    <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text">
                </div>
                <div>
                    <p id="password" class="text-danger check"> </p>
                    <input class="form-control" name="password" placeholder="Password" type="password">
                </div>
                <div>
                    <p id="confirmPass" class="text-danger check"> </p>
                    <input class="form-control" name="confirmPass" placeholder="Confirm Password" type="password">
                </div>
                <div>
                    <p> </p>
                    <button class="btn btn-primary form-control" id="registerBtn">Log In</button>
                </div>
            </form>
            <br><br>
            <div class="row">
                <div class="col-sm" id="login">
                    <a href="/login.php" class="text-primary"> Alreade have an account? login </a>
                </div>
            </div>
        </main>
    <script>
        
        document.querySelector("#registerBtn").addEventListener("click", function (event) {
            event.preventDefault();
            if (document.form.username.value == "")
            {
                document.querySelector("#username").innerHTML = "Please, Enter username";
            }
            else if (document.form.password.value == "")
            {
                document.querySelector("#password").innerHTML = "Please, Enter password";
            }
            else if (document.form.confirmPass.value == "")
            {
                document.querySelector("#confirmPass").innerHTML = "Please, Confirm password";
            }
            else if (document.form.password.value != document.form.confirmPass.value)
            {
                document.querySelector("#confirmPass").innerHTML = "Two passwords don't match";
            }
            else
            {
                request();
            }
        });

        function request()
        {
            //console.log("Funcation has been called");
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    if (xhttp.response != 0)
                    {
                        //console.log(xhttp.response);
                        errorHandler(xhttp.response);
                    }
                    else
                    {
                        window.location.href = "/";
                    }
                }
            };
            xhttp.open("POST", "/register", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("username=" + document.form.username.value
                    + "&password=" + document.form.password.value
                    + "&confirmPass=" + document.form.confirmPass.value);
        }

        function errorHandler(error)
        {
            if (error == 101)
            {
                document.querySelector("#username").innerHTML = "Please, Enter username";
            }
            else if (error == 102)
            {
                document.querySelector("#password").innerHTML = "Please, Enter Password";
            }
            else if (error == 104)
            {
                document.querySelector("#confirmPass").innerHTML = "Please, Confirm password";
            }
            else if (error == 105)
            {
                document.querySelector("#confirmPass").innerHTML = "Two passwords don't match";
            }
            else if (error == 106)
            {
                document.querySelector("#username").innerHTML = "Username already exist please choose different one";
            }
            else
            {
                console.log(error);
            }
        }

        // Remove error on click the text field
        document.querySelectorAll("input")[0].addEventListener("click", function()  
        {
            for (i = 0; i < 3; i++)
            {
                document.querySelectorAll(".check")[i].innerHTML = "";
            }
        });

        document.querySelectorAll("input")[1].addEventListener("click", function()  
        {
            for (i = 0; i < 3; i++)
            {
                document.querySelectorAll(".check")[i].innerHTML = "";
            }
        });

        document.querySelectorAll("input")[2].addEventListener("click", function()  
        {
            for (i = 0; i < 3; i++)
            {
                document.querySelectorAll(".check")[i].innerHTML = "";
            }
        });
    </script>
    </body>
</html>

<?php } ?>