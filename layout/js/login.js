document.addEventListener("DOMContentLoaded", function () {
    removeErrorMsg()
})

document.querySelector("#login").addEventListener("click", function (event) {
    event.preventDefault();
    if (document.form.username.value == "") {
        document.querySelector("#username-err").innerHTML = "Please, Enter username"
        errorMsg("#username-err")
    }
    else if (document.form.password.value == "") {
        document.querySelector("#password-err").innerHTML = "Please, Enter password"
        errorMsg("#password-err")
    }
    else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (xhttp.response != 0) {
                    console.log(xhttp.response)
                    errorHandler(xhttp.response)
                }
                else {
                    window.location.href = "/index.php"
                }
            }
        }
        xhttp.open("POST", "/login.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("&username=" + document.form.username.value
            + "&password=" + document.form.password.value)
    }
})

