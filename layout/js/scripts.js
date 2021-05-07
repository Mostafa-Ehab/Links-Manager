// Remove error on click the text field
function removeErrorMsg(input = "input") {
    let inputs = document.querySelectorAll(input)
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener("click", function () {
            for (j = 0; j < inputs.length; j++) {
                $(".error:nth-of-type(" + (j + 1) + ")").animate({
                    height: "0",
                    marginBottom: "0"
                }, "fast")
                document.querySelectorAll(".error")[j].innerHTML = ""
            }
        })
    }
}


// ErrorMessage Animation [Called From Error Handler]
function errorMsg(error, val = "24px") {
    $(error).animate({
        height: val,
        marginBottom: "16px"
    }, "fast")
}

// Ajax response Error Handler
function errorHandler(error) {
    /*
    ** Login Page 
    */
    if (error == 101) {
        document.querySelector("#username-err").innerHTML = "Please, Enter username"
        errorMsg("#username-err")
    }
    else if (error == 102) {
        document.querySelector("#password-err").innerHTMl = "Please, Enter password"
        errorMsg("#password-err")
    }
    else if (error == 103) {
        document.querySelector("#username-err").innerHTML = "Username or password are incorrect"
        errorMsg("#username-err")
    }

    /*
    ** Error In ID [Favourite || Delete]
    */
    else if (error == 111) {
        successMsg(".errorAlert:nth-child(2)")
        let i = 0;
        setInterval(function () {
            if (i == 1) {
                clearInterval()
                removeSuccessMsg(".errorAlert:nth-child(2)")
            }
            i++
        }, 1000)
    }

    /*
    ** Add New Link
    */
    else if (error == 121) {
        document.querySelector("#title-err").innerHTML = "Couldn't Automatically Get Title"
        errorMsg("#title-err")
    }
    else if (error == 122) {
        document.querySelector("#url-err").innerHTML = "URL is Invalid"
        errorMsg("#url-err")
    }

    else if (error == 123) {
        document.querySelector("#title-err").innerHTML = "Please, Enter Title"
        errorMsg("#title-err")
    }
}


// Remove Ajax response Success Message
function removeSuccessMsg(container = ".success") {
    $(container).animate({
        height: '0'
    }, "fast")

    $(".container").animate({
        marginTop: '76px'
    }, "fast")

}

// Ajax response Success Message
function successMsg(container = ".success") {
    $(container).animate({
        height: '86px'
    }, "fast")

    $(".container").animate({
        marginTop: '146px'
    }, "fast")

}

// Show Search Results
function showResults(results) {
    let table = document.querySelector("#accordion")
    for (let result of results) {
        let row = `
                <div class="card" data-id="` + result['ID'] + `">
                        <div class="card-header" id="head` + result['ID'] + `">
                            <div class="row">
                                <div class="col-11 text-row">
                                    <button class="btn btn-link collapse-button" data-toggle="collapse" data-target="#body` + result['ID'] + `" aria-controls="body` + result['ID'] + `">
                                        <i class="fa fa-chevron-circle-right"></i>
                                    </button>
                                    <a href='` + result['URL'] + `' target="_blank">
                                        ` + result['Title'] + `
                                    </a>
                                </div>
                                <div class="col-1">
                                    <div class="btn float-right ` + ((result['Fav'] == 1) ? 'yellow-star' : ('black-star')) + `">
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div id="body` + result['ID'] + `" class="collapse" aria-labelledby="head` + result['ID'] + `" data-parent="#accordion">
                        <div class="card-body">
                            <p>
                                <i class="fa fa-globe"></i>
                                <a href='` + result['URL'] + `' style="word-break: break-all;" target="_blank">
                                    ` + result['URL'] + `
                                </a>
                            </p>
                            <p>
                                <i class="fa fa-calendar-week"></i>
                                ` + result['Time'] + `
                            </p>
                        </div>
                        <div class="card-footer grid-container">
                            <div class="btn copy" data-clipboard-text="` + result['URL'] + `">
                                <i class="fa fa-copy"></i>
                            </div>
                            <div class="btn qrcode" data-toggle="modal" data-target="#QR` + result['ID'] + `">
                                <i class="fa fa-qrcode"></i>
                            </div>
                            <div class="btn">
                                <i class="fa fa-edit"></i>
                            </div>
                            <div class="btn qrcode" data-toggle="modal" data-target="#del` + result['ID'] + `">
                                <i class="fa fa-trash"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="QR` + result['ID'] + `" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">QR Code</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="fa fa-times"></i>
                                </span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <img class="qr-img" src='/?action=qrcode&url-id=` + result['ID'] + `'>
                                <div>
                                    <a href='` + result['URL'] + `' style="word-break: break-all;" target="_blank">
                                        ` + result['URL'] + `
                                    </a>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End QR Code Modal -->

                <!-- Start Delete Confirm Modal -->
                <div class="modal fade" id="del` + result['ID'] + `" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog del-confirm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete URL</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="fa fa-times"></i>
                                </span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <h5>Are you sure you want to delete this URL?</h5>
                            </div>

                            <div class="modal-footer del-confirm">
                                <button class="btn btn-primary" data-dismiss="modal">Close</button>
                                <button class="btn btn-outline-danger float-right delete" data-dismiss="modal" data-id="` + result['ID'] + `">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Delete Confirm Modal -->`
        table.innerHTML += row
    }
}

// Control Favourites Ad or Remove [Called on Start or Search]
function favourites() {
    let stars = document.querySelectorAll(".black-star, .yellow-star")
    for (let i = 0; i < stars.length; i++) {
        stars[i].addEventListener("click", function (event) {
            let current = event.currentTarget
            let id = current.parentNode.parentNode.parentNode.parentNode.getAttribute("data-id")
            let xhttp = new XMLHttpRequest()
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.response == 0) {
                        if (current.classList.contains("black-star")) {
                            document.querySelector(".errorAlert:nth-child(3) span").innerHTML = "Added URL To "
                        }
                        else {
                            document.querySelector(".errorAlert:nth-child(3) span").innerHTML = "Removed URL From"
                        }
                        current.classList.toggle("black-star")
                        current.classList.toggle("yellow-star")
                        successMsg(".errorAlert:nth-child(3)")
                        let i = 0;
                        setInterval(function () {
                            if (i == 1) {
                                clearInterval()
                                removeSuccessMsg(".errorAlert:nth-child(3)")
                            }
                            i++
                        }, 1000)
                    }
                    else {
                        document.querySelector(".errorAlert:nth-child(2) span").innerHTML = id
                        errorHandler(this.response)
                    }
                }
            }
            xhttp.open("GET", "/?action=fav&url-id=" + id + "&no-render", true);
            xhttp.send()
        })
    }
}

// Copy Button Handler
function copy() {
    let buttons = document.querySelectorAll(".copy");
    for (let i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function (event) {

            let text = event.currentTarget.getAttribute("data-clipboard-text");

            document.getElementById("copyText").value = text

            copyText = document.getElementById("copyText")

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand("copy");

            // textAlert("Copied to Clipboard");

            successMsg(".errorAlert:nth-child(4)")
            let i = 0;
            setInterval(function () {
                if (i == 1) {
                    clearInterval()
                    removeSuccessMsg(".errorAlert:nth-child(4)")
                }
                i++
            }, 1000)
        })
    }
}

// Delete Button Handler
function deleteFunc() {
    let buttons = document.querySelectorAll(".delete")
    for (let i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function (event) {
            let id = event.target.getAttribute("data-id")
            let xhttp = new XMLHttpRequest()
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.response == 0) {
                        successMsg(".errorAlert:nth-child(5)")
                        let i = 0;
                        setInterval(function () {
                            if (i == 1) {
                                clearInterval()
                                removeSuccessMsg(".errorAlert:nth-child(5)")
                            }
                            i++
                        }, 1000)
                        document.querySelector(".card[data-id='" + id + "']").remove()
                    }
                    else {
                        document.querySelector(".errorAlert:nth-child(2) span").innerHTML = id
                        errorHandler(this.response)
                    }
                }
            }
            xhttp.open("GET", "/?action=delete&url-id=" + id + "&no-render", true)
            xhttp.send()
        })
    }
}

