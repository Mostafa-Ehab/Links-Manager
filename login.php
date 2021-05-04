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
    else
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = '$user'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            echo 103;
            exit;
        }
        else
        {
            $dbrow = mysqli_fetch_assoc($result);
            $passhash = $dbrow["password"];
            $_SESSION["id"] = $id = $dbrow['id'];
            if (password_verify($pass, $passhash))
            {
                // Start login
                session_start();
                // Token already exist in database
                if (!empty($dbrow['session']))
                {
                    setcookie("token", $dbrow['session'], time() + 86400);
                }
                // Update Cookies with the value in database
                else
                {
                    $token = $id . session_id();
                    $sql = "UPDATE users SET session = '$token' WHERE id = '$id'";
                    mysqli_query($conn, $sql);
                    setcookie("token", $token, time() + 86400);
                }
                //echo "updated database and setcookies";
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
        header("Location: /login.php");
        exit;
    }
    else
    {
        session_start();
        $_SESSION['id'] = mysqli_fetch_assoc($result)['id'];
        echo "redirect to index";
        header("Location: /");
        exit;
    }
}
else
{
    $title = "Links Manager - Login";
    $name = "login";
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
                    <p> </p>
                    <button class="btn btn-primary form-control" id="loginBtn">Log In</button>
                </div>
            </form>
            <br><br>
            <div class="row">
                <div class="col-sm" id="register">
                    <a href="/register.php" class="text-primary"> Don't have account? Create account</a>
                </div>
            </div>
        </main>
        <script>
            document.querySelector("#loginBtn").addEventListener("click", function(event) 
            {
                event.preventDefault();
                if (document.form.username.value == "")
                {
                    document.querySelector("#username").innerHTML = "Please, Enter username";
                }
                else if (document.form.password.value == "")
                {
                    document.querySelector("#password").innerHTML = "Please, Enter password";
                }
                else
                {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function()
                    {
                        if (this.readyState == 4 && this.status == 200)
                        {
                            //console.log(xhttp.response);
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
                    }
                    xhttp.open("POST", "/login.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.send("&username=" + document.form.username.value
                            + "&password=" + document.form.password.value);
                }
            });

            function errorHandler(error)
            {
                if (error == 101)
                {
                    document.querySelector("#username").innerHTML = "Please, Enter username";
                }
                else if (error == 102)
                {
                    document.querySelector("#password").innerHTMl = "Please, Enter password";
                }
                else if (error == 103)
                {
                    document.querySelector("#username").innerHTML = "Username or password are incorrect";
                }
            }

            // Remove error on click the text field
            document.querySelectorAll("input")[0].addEventListener("click", function()  
            {
                for (i = 0; i < 2; i++)
                {
                    document.querySelectorAll(".check")[i].innerHTML = "";
                }
            });

            document.querySelectorAll("input")[1].addEventListener("click", function()  
            {
                for (i = 0; i < 2; i++)
                {
                    document.querySelectorAll(".check")[i].innerHTML = "";
                }
            });
        </script>
    </body>
</html>

<?php } ?>