document.addEventListener("DOMContentLoaded", function () {
    removeErrorMsg("#addLink input")
    favourites()
    copy()
    deleteFunc()
})

// Search
let search = document.querySelector("#search")
search.addEventListener("keyup", function () {
    let xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let table = document.querySelector("#accordion")
            table.innerHTML = ""

            let results = JSON.parse(this.response)
            if (results.length == 0) {
                document.querySelector(".errorAlert:nth-child(1) a").setAttribute("href", "https://google.com/search?q=" + search.value)
                successMsg(".errorAlert:nth-child(1)")
            }
            else {
                removeSuccessMsg(".errorAlert:nth-child(1)")
                showResults(results)
            }
            favourites()
            copy()
            deleteFunc()
        }
    }
    xhttp.open("GET", "/?action=search&q=" + search.value + "&no-render", true);
    xhttp.send()
})

// Automatically Get Title
let URLInput = document.querySelector("#url")
URLInput.addEventListener("keyup", function () {
    if (URLInput.value != "" && document.querySelector("#title").value == "") {
        let xhttp = new XMLHttpRequest()
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.response == 121 || this.response == 122) {
                    errorHandler(this.response)
                }
                else {
                    document.querySelector("#title").value = this.response
                }
            }
        }
        xhttp.open("GET", "/?action=title&url=" + encodeURIComponent(URLInput.value) + "&no-render", true)
        xhttp.send()
    }
})


// Add New Link handler
document.querySelector("#sendLink").addEventListener("click", function (event) {
    let url = document.querySelector("#url")
    let title = document.querySelector("#title")

    event.preventDefault();
    if (url.value == "") {
        document.querySelector("#url-err").innerHTML = "Please, Enter URL"
        errorMsg("#url-err")
    }
    else if (title.value == "") {
        document.querySelector("#title-err").innerHTML = "Please, Enter Title"
        errorMsg("#title-err")
    }
    else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (xhttp.response != 0) {
                    errorHandler(xhttp.response)
                }
                else {
                    location.reload()
                }
            }
        }
        xhttp.open("POST", "/?action=add&no-render", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("&url=" + url.value
            + "&title=" + title.value)
    }
})

