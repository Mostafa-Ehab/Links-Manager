<?php
    include "templates/cookie.php";
    $title = "Links Manager";
    $name = "index";
    include "templates/header.php";
?>
        <nav class="navbar navbar-expand-md navbar-light bg-light border fixed-top">
             <!-- logo -->
            <a class="navbar-brand col-2 nav-icon" href="/">
                <img src="img/logo.png" alt="logo" style="width:50px;">
            </a>
            <div class="col-sm-8 col-6">
                <input class="form-control" type="search" placeholder="Search" id="search" onkeyup="search()" autocomplete="off">
            </div>
            <div class="col-sm-2 col-4 row">
                <div class="col-sm-4 col-2 nav-icon"></div>
                <button class="btn col-5 col-sm-4 nav-icon" id="getBookmarks" fav="false"> 
                    <svg viewBox="0 -10 511.98685 511" width="20px" xmlns="http://www.w3.org/2000/svg">
                        <path d="m114.59375 491.140625c-5.609375 0-11.179688-1.75-15.933594-5.1875-8.855468-6.417969-12.992187-17.449219-10.582031-28.09375l32.9375-145.089844-111.703125-97.960937c-8.210938-7.167969-11.347656-18.519532-7.976562-28.90625 3.371093-10.367188 12.542968-17.707032 23.402343-18.710938l147.796875-13.417968 58.433594-136.746094c4.308594-10.046875 14.121094-16.535156 25.023438-16.535156 10.902343 0 20.714843 6.488281 25.023437 16.511718l58.433594 136.769532 147.773437 13.417968c10.882813.980469 20.054688 8.34375 23.425782 18.710938 3.371093 10.367187.253906 21.738281-7.957032 28.90625l-111.703125 97.941406 32.9375 145.085938c2.414063 10.667968-1.726562 21.699218-10.578125 28.097656-8.832031 6.398437-20.609375 6.890625-29.910156 1.300781l-127.445312-76.160156-127.445313 76.203125c-4.308594 2.558594-9.109375 3.863281-13.953125 3.863281zm141.398438-112.875c4.84375 0 9.640624 1.300781 13.953124 3.859375l120.277344 71.9375-31.085937-136.941406c-2.21875-9.746094 1.089843-19.921875 8.621093-26.515625l105.472657-92.5-139.542969-12.671875c-10.046875-.917969-18.6875-7.234375-22.613281-16.492188l-55.082031-129.046875-55.148438 129.066407c-3.882812 9.195312-12.523438 15.511718-22.546875 16.429687l-139.5625 12.671875 105.46875 92.5c7.554687 6.613281 10.859375 16.769531 8.621094 26.539062l-31.0625 136.9375 120.277343-71.914062c4.308594-2.558594 9.109376-3.859375 13.953126-3.859375zm-84.585938-221.847656s0 .023437-.023438.042969zm169.128906-.0625.023438.042969c0-.023438 0-.023438-.023438-.042969zm0 0"/>
                    </svg>
                </button>
                <button class="col-5 col-sm-4 btn nav-icon" id="logout">
                    <svg viewBox="0 0 512.00533 512" width="20px" xmlns="http://www.w3.org/2000/svg"><path d="m320 277.335938c-11.796875 0-21.332031 9.558593-21.332031 21.332031v85.335937c0 11.753906-9.558594 21.332032-21.335938 21.332032h-64v-320c0-18.21875-11.605469-34.496094-29.054687-40.554688l-6.316406-2.113281h99.371093c11.777344 0 21.335938 9.578125 21.335938 21.335937v64c0 11.773438 9.535156 21.332032 21.332031 21.332032s21.332031-9.558594 21.332031-21.332032v-64c0-35.285156-28.714843-63.99999975-64-63.99999975h-229.332031c-.8125 0-1.492188.36328175-2.28125.46874975-1.027344-.085937-2.007812-.46874975-3.050781-.46874975-23.53125 0-42.667969 19.13281275-42.667969 42.66406275v384c0 18.21875 11.605469 34.496093 29.054688 40.554687l128.386718 42.796875c4.351563 1.34375 8.679688 1.984375 13.226563 1.984375 23.53125 0 42.664062-19.136718 42.664062-42.667968v-21.332032h64c35.285157 0 64-28.714844 64-64v-85.335937c0-11.773438-9.535156-21.332031-21.332031-21.332031zm0 0"/><path d="m505.75 198.253906-85.335938-85.332031c-6.097656-6.101563-15.273437-7.9375-23.25-4.632813-7.957031 3.308594-13.164062 11.09375-13.164062 19.714844v64h-85.332031c-11.777344 0-21.335938 9.554688-21.335938 21.332032 0 11.777343 9.558594 21.332031 21.335938 21.332031h85.332031v64c0 8.621093 5.207031 16.40625 13.164062 19.714843 7.976563 3.304688 17.152344 1.46875 23.25-4.628906l85.335938-85.335937c8.339844-8.339844 8.339844-21.824219 0-30.164063zm0 0"/></svg>
                </button>
            </div>
        </nav>

        <div class="row main">
            <div class="col-md-4 contain" id="contain">
            <!-- Get Stored Links -->
            
            <!-- QR Code -->
            </div>
            <div class="col-md-8 qr-code">
                
            </div>
            <!-- <div id="esc">
                <svg height="30px" viewBox="0 0 365.696 365.696" xmlns="http://www.w3.org/2000/svg"><path d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0"/></svg>
            </div> -->
        </div>

        <!-- Add Link -->
        <div id="add_page">
            <p class="add_title"> Add Link </p>
            <form name="form">
                <div class="form-group">
                    <label for="title"> Title: </label> <p class="text-danger check"></p>
                    <input type="text" class="form-control" placeholder="Enter title" id="title" autocomplete="off">
                </div>
                <br/>
                <div class="form-group">
                    <label for="url"> URL: </label> <p class="text-danger check"></p>
                    <input type="url" class="form-control" placeholder="Enter URL" id="url" autocomplete="off">
                </div>
                <br/>
                <button id="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <button type="button" class="btn" id="add"> Add Link 
            <svg height="30px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m256 0c-141.164062 0-256 114.835938-256 256s114.835938 256 256 256 256-114.835938 256-256-114.835938-256-256-256zm112 277.332031h-90.667969v90.667969c0 11.777344-9.554687 21.332031-21.332031 21.332031s-21.332031-9.554687-21.332031-21.332031v-90.667969h-90.667969c-11.777344 0-21.332031-9.554687-21.332031-21.332031s9.554687-21.332031 21.332031-21.332031h90.667969v-90.667969c0-11.777344 9.554687-21.332031 21.332031-21.332031s21.332031 9.554687 21.332031 21.332031v90.667969h90.667969c11.777344 0 21.332031 9.554687 21.332031 21.332031s-9.554687 21.332031-21.332031 21.332031zm0 0"/></svg>
        </button>

        <!-- Popup on click copy -->
        <div id="popup">
            <p> Copied to Clipboard </p>
        </div>

        <div id="delConfirm" class="col-md-3 col-sm-5 col-11">
        </div>
        <input type="text" id="forCopy">

        <!-- --------------------------------------------------------------- -->
        <script>
            var Stared = `<path d="m499.574219 188.503906c-3.199219-9.921875-11.988281-16.9375-22.398438-17.898437l-141.355469-12.84375-55.894531-130.835938c-4.117187-9.578125-13.503906-15.765625-23.933593-15.765625-10.433594 0-19.820313 6.207032-23.9375 15.808594l-55.890626 130.816406-141.378906 12.839844c-10.386718.941406-19.175781 7.957031-22.378906 17.878906-3.21875 9.921875-.234375 20.777344 7.617188 27.648438l106.859374 93.695312-31.511718 138.773438c-2.300782 10.199218 1.664062 20.734375 10.136718 26.878906 4.519532 3.328125 9.875 4.992188 15.230469 4.992188 4.628907 0 9.238281-1.234376 13.355469-3.710938l121.898438-72.894531 121.875 72.875c8.917968 5.351562 20.160156 4.882812 28.609374-1.238281 8.46875-6.144532 12.4375-16.683594 10.132813-26.882813l-31.507813-138.769531 106.859376-93.699219c7.847656-6.867187 10.835937-17.726563 7.613281-27.667969zm0 0" fill="#ffc107"/><path d="m114.617188 491.136719c-5.632813 0-11.203126-1.746094-15.957032-5.183594-8.855468-6.398437-12.992187-17.429687-10.582031-28.09375l32.9375-145.066406-111.703125-97.964844c-8.210938-7.1875-11.347656-18.515625-7.976562-28.90625 3.371093-10.367187 12.542968-17.726563 23.402343-18.730469l147.820313-13.417968 58.410156-136.746094c4.308594-10.046875 14.121094-16.535156 25.023438-16.535156 10.902343 0 20.714843 6.488281 25.023437 16.511718l58.410156 136.769532 147.796875 13.417968c10.882813.980469 20.054688 8.34375 23.425782 18.710938 3.371093 10.386718.253906 21.738281-7.980469 28.90625l-111.679688 97.941406 32.9375 145.066406c2.414063 10.667969-1.726562 21.695313-10.578125 28.09375-8.8125 6.378906-20.566406 6.914063-29.890625 1.324219l-127.464843-76.160156-127.445313 76.203125c-4.308594 2.582031-9.109375 3.859375-13.929687 3.859375zm141.375-112.871094c4.84375 0 9.640624 1.300781 13.953124 3.859375l120.277344 71.9375-31.085937-136.941406c-2.21875-9.769532 1.089843-19.925782 8.621093-26.515625l105.472657-92.523438-139.542969-12.671875c-10.003906-.894531-18.667969-7.1875-22.59375-16.46875l-55.101562-129.046875-55.148438 129.066407c-3.902344 9.238281-12.5625 15.53125-22.589844 16.429687l-139.519531 12.671875 105.46875 92.519531c7.554687 6.59375 10.839844 16.769531 8.621094 26.539063l-31.082031 136.941406 120.277343-71.9375c4.328125-2.558594 9.128907-3.859375 13.972657-3.859375zm-84.585938-221.824219v.019532zm169.152344-.066406v.023438s0 0 0-.023438zm0 0"/>`;
            var unStared = `<path d="m114.59375 491.140625c-5.609375 0-11.179688-1.75-15.933594-5.1875-8.855468-6.417969-12.992187-17.449219-10.582031-28.09375l32.9375-145.089844-111.703125-97.960937c-8.210938-7.167969-11.347656-18.519532-7.976562-28.90625 3.371093-10.367188 12.542968-17.707032 23.402343-18.710938l147.796875-13.417968 58.433594-136.746094c4.308594-10.046875 14.121094-16.535156 25.023438-16.535156 10.902343 0 20.714843 6.488281 25.023437 16.511718l58.433594 136.769532 147.773437 13.417968c10.882813.980469 20.054688 8.34375 23.425782 18.710938 3.371093 10.367187.253906 21.738281-7.957032 28.90625l-111.703125 97.941406 32.9375 145.085938c2.414063 10.667968-1.726562 21.699218-10.578125 28.097656-8.832031 6.398437-20.609375 6.890625-29.910156 1.300781l-127.445312-76.160156-127.445313 76.203125c-4.308594 2.558594-9.109375 3.863281-13.953125 3.863281zm141.398438-112.875c4.84375 0 9.640624 1.300781 13.953124 3.859375l120.277344 71.9375-31.085937-136.941406c-2.21875-9.746094 1.089843-19.921875 8.621093-26.515625l105.472657-92.5-139.542969-12.671875c-10.046875-.917969-18.6875-7.234375-22.613281-16.492188l-55.082031-129.046875-55.148438 129.066407c-3.882812 9.195312-12.523438 15.511718-22.546875 16.429687l-139.5625 12.671875 105.46875 92.5c7.554687 6.613281 10.859375 16.769531 8.621094 26.539062l-31.0625 136.9375 120.277343-71.914062c4.308594-2.558594 9.109376-3.859375 13.953126-3.859375zm-84.585938-221.847656s0 .023437-.023438.042969zm169.128906-.0625.023438.042969c0-.023438 0-.023438-.023438-.042969zm0 0"/>`
            window.onload = function(e) {
                search();
            }

            function search(text = document.querySelector("#search").value)
            {
                var fav = (document.querySelector("#getBookmarks").getAttribute("fav") == "false") ? "" : true;
                //console.log(fav);
                //console.log("Your search is " + text)
                /*console.log("Request sent");
                if (fav == true)
                {
                    document.querySelector("#getBookmarks").setAttribute("fav", "false");
                    document.querySelector("#getBookmarks svg").innerHTML = unStared;
                }*/

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()
                {
                    if (this.readyState == 4 && this.status == 200)
                    {
                        //console.log(xhttp.response)
                        document.querySelector("#contain").innerHTML = "";
                        if (xhttp.response == "no match")
                        {
                            var fav = (document.querySelector("#getBookmarks").getAttribute("fav") == "false") ? "" : true;
                            if (fav == true)
                            {
                                var node = `<p id="noMatch" class="alert alert-warning"> Bookmark is empty. </p>`
                            }
                            else
                            {
                                var node = `<p id="noMatch" class="alert alert-warning"> No match found
                                                <a href="https://www.google.com/search?q=` + text + `"> try google search </a>
                                            </p>`
                            }
                            document.querySelector("#contain").innerHTML = node;
                        }
                        else
                        {
                            var result = JSON.parse(xhttp.response);
                            for (var i = 0; i < result.length; i++)
                            {
                                var fav = (result[i]['fav'] == '0') ? "Bookmark" : "Unbookmark"
                                var node = `
                                    <div class="block row" id="block` + result[i]['id'] + `">
                                        <div class="col-10">
                                            <div class="row">
                                                <p class="col-8"> ` + result[i]['title'] + ` </p>
                                                <span class="time col-4"> ` + result[i]['time'] + ` </span>
                                            </div>
                                            <div class="row">
                                                <div class="col-10">
                                                    <a href="` + result[i]['url'] + `" class="col-10" target="_blank">
                                                            ` + result[i]['url'] + ` </a>
                                                </div>
                                                <div class="row col-2" style="float: right;">
                                                    <!--<div class="col-2"></div>-->
                                                    <button class="copy btn col-6"
                                                        data-clipboard-text="` + result[i]['url'] + `">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 210.107 210.107" style="enable-background:new 0 0 210.107 210.107; width: 20px;"
                                                            xml:space="preserve">
                                                            <g>
                                                                <path style="fill:#1D1D1B;"
                                                                    d="M168.506,0H80.235C67.413,0,56.981,10.432,56.981,23.254v2.854h-15.38
                                                                                                c-12.822,0-23.254,10.432-23.254,23.254v137.492c0,12.822,10.432,23.254,23.254,23.254h88.271
                                                                                                c12.822,0,23.253-10.432,23.253-23.254V184h15.38c12.822,0,23.254-10.432,23.254-23.254V23.254C191.76,10.432,181.328,0,168.506,0z
                                                                                                M138.126,186.854c0,4.551-3.703,8.254-8.253,8.254H41.601c-4.551,0-8.254-3.703-8.254-8.254V49.361
                                                                                                c0-4.551,3.703-8.254,8.254-8.254h88.271c4.551,0,8.253,3.703,8.253,8.254V186.854z M176.76,160.746
                                                                                                c0,4.551-3.703,8.254-8.254,8.254h-15.38V49.361c0-12.822-10.432-23.254-23.253-23.254H71.981v-2.854
                                                                                                c0-4.551,3.703-8.254,8.254-8.254h88.271c4.551,0,8.254,3.703,8.254,8.254V160.746z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown dropleft col-6">
                                                        <button class="btn btn-default noPadding" type="button" id="` + result[i]['id'] + `" data-toggle="dropdown">
                                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 408 408"
                                                                style="enable-background:new 0 0 408 408; width: 20px;" xml:space="preserve">
                                                                <g id="more-vert">
                                                                    <path d="M204,102c28.05,0,51-22.95,51-51S232.05,0,204,0s-51,22.95-51,51S175.95,102,204,102z M204,153c-28.05,0-51,22.95-51,51
                                                                                                    s22.95,51,51,51s51-22.95,51-51S232.05,153,204,153z M204,306c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51
                                                                                                    S232.05,306,204,306z"></path>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="` + result[i]['id'] + `">
                                                            <li role="presentation">
                                                                <button class="btn btn-default" id="fav` + result[i]['id'] + `" onclick="mark(` + result[i]['id'] + `)"
                                                                    style="width: 100%; text-align: left;">
                                                                ` + fav + `
                                                                </button>
                                                            </li>
                                                            <li role="presentation">
                                                                <button class="btn btn-default" onclick="askDelete(` + result[i]['id'] + `)"
                                                                    style="width: 100%; text-align: left;">
                                                                    Delete
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="col-2 btn" id="` + result[i]['id'] + `" onclick="showQR(this)">
                                            <svg class="qr" enable-background="new 0 0 24 24" viewBox="0 0 24 24" height="60px" xmlns="http://www.w3.org/2000/svg"><g><path d="m23 8.696c-.553 0-1-.448-1-1v-4.74c0-.527-.429-.956-.955-.956h-4.74c-.553 0-1-.448-1-1s.447-1 1-1h4.74c1.63 0 2.955 1.326 2.955 2.956v4.74c0 .552-.447 1-1 1z"/></g><g><path d="m1 8.696c-.553 0-1-.448-1-1v-4.74c0-1.63 1.325-2.956 2.955-2.956h4.74c.553 0 1 .448 1 1s-.447 1-1 1h-4.74c-.526 0-.955.429-.955.956v4.74c0 .552-.447 1-1 1z"/></g><g><path d="m21.045 24h-4.74c-.553 0-1-.448-1-1s.447-1 1-1h4.74c.526 0 .955-.429.955-.956v-4.74c0-.552.447-1 1-1s1 .448 1 1v4.74c0 1.63-1.325 2.956-2.955 2.956z"/></g><g><path d="m7.695 24h-4.74c-1.63 0-2.955-1.326-2.955-2.956v-4.74c0-.552.447-1 1-1s1 .448 1 1v4.74c0 .527.429.956.955.956h4.74c.553 0 1 .448 1 1s-.447 1-1 1z"/></g><g><path d="m9.478 11.159h-4.978c-.553 0-1-.448-1-1v-5.659c0-.552.447-1 1-1h4.978c.553 0 1 .448 1 1v5.659c0 .552-.448 1-1 1zm-3.978-2h2.978v-3.659h-2.978z"/></g><g><path d="m19.5 20.5h-4.75c-.553 0-1-.448-1-1v-3.182c0-.552.447-1 1-1s1 .448 1 1v2.182h2.75v-3h-1.182c-.553 0-1-.448-1-1s.447-1 1-1h2.182c.553 0 1 .448 1 1v5c0 .552-.447 1-1 1z"/></g><g><path d="m19.5 9.591h-4.091c-.553 0-1-.448-1-1v-4.091c0-.552.447-1 1-1h4.091c.553 0 1 .448 1 1v4.091c0 .552-.447 1-1 1zm-3.091-2h2.091v-2.091h-2.091z"/></g><g><path d="m12.478 14.136h-7.978c-.553 0-1-.448-1-1s.447-1 1-1h6.978v-6.727c0-.552.447-1 1-1s1 .448 1 1v7.727c0 .552-.448 1-1 1z"/></g><g><path d="m15.25 13.886c-.553 0-1-.448-1-1v-1.363c0-.552.447-1 1-1h4.5c.553 0 1 .448 1 1s-.447 1-1 1h-3.5v.363c0 .552-.447 1-1 1z"/></g><g><path d="m12.022 19.201c-.553 0-1-.448-1-1v-2.272c0-.552.447-1 1-1s1 .448 1 1v2.272c0 .552-.447 1-1 1z"/></g><g><path d="m9.25 20.5h-4.75c-.553 0-1-.448-1-1v-3.636c0-.552.447-1 1-1h4.75c.553 0 1 .448 1 1v3.636c0 .552-.447 1-1 1zm-3.75-2h2.75v-1.636h-2.75z"/></g></svg>
                                        </button>
                                    </div>`
                                document.querySelector("#contain").insertAdjacentHTML('beforeend', node);
                            }
                        }
                        copyAnimate();
                    }
                };
                xhttp.open("GET", "/get.php?fav=" + fav + "&q="+ text, true);
                xhttp.send(); 
            }

            /* -----------------------------------------------------------------------------------------
            ----------------------------------- Favourites And Bookmarks -------------------------------
            ----------------------------------------------------------------------------------------- */

            function mark(id)
            {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()
                {
                    if (this.readyState == 4 && this.status == 200)
                    {
                        var bookmark = document.getElementById("fav" + id);
                        if (bookmark.innerHTML.trim() == "Bookmark")
                        {
                            bookmark.innerHTML = "Unbookmark";
                            textAlert("Added to Bookmark");
                        }
                        else
                        {
                            bookmark.innerHTML = "Bookmark";
                            textAlert("Removed from Bookmark");
                            if (document.querySelector("#getBookmarks").getAttribute("fav") == "true")
                            {
                                $("#block" + id).animate({
                                    height: 0
                                }, "fast", search);
                            }
                        }
                    }
                };
                xhttp.open("POST", "/handler.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("fav=" + id);

            }

            // Delete is Confirmed
            function del(id)
            {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()
                {
                    if (this.readyState == 4 && this.status == 200)
                    {
                        textAlert("URL has been deleted");
                        if (document.querySelector("#getBookmarks").getAttribute("fav") == "true")
                        {
                            $("#block" + id).animate({
                                height: 0
                            }, "fast", search);
                        }
                        else
                        {
                            $("#block" + id).animate({
                                height: 0
                            }, "fast", search);
                        }
                        document.querySelector("#delConfirm").innerHTML = "";
                    }
                };
                xhttp.open("POST", "/handler.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("del=" + id);
            }

            // Ask for delete confirmation
            function askDelete(id)
            {
                document.querySelector("#delConfirm").innerHTML = `
                <div>
                    <p> Are you sure you want to delete the URL? </p>
                    <button class="btn btn-danger" onclick="del(` + id + `)"> Delete </button>
                    <button class="btn btn-default float-right" onclick="cancelDel()"> Cancel </button>
                </div> `
            }

            function cancelDel()
            {
                document.querySelector("#delConfirm").innerHTML = "";
            }

            // Get bookmarks
            document.querySelector("#getBookmarks").addEventListener("click", function () {
                if (this.getAttribute("fav") == "false")
                {
                    this.setAttribute("fav", "true");
                    document.querySelector("#getBookmarks svg").innerHTML = Stared;
                }
                else
                {
                    this.setAttribute("fav", "false");
                    document.querySelector("#getBookmarks svg").innerHTML = unStared;
                }
                search();
            });

            // Ask for Logout
            document.querySelector("#logout").addEventListener("click", function () {
                document.querySelector("#delConfirm").innerHTML = `
                <div>
                    <p> Are you sure you want to logout? </p>
                    <a class="btn btn-danger" href="logout.php"> Logout </a>
                    <button class="btn btn-default float-right" onclick="cancelDel()"> Cancel </button>
                </div> `
            })

            /* -----------------------------------------------------------------------------------------
            ---------------------------------------- Show QR -------------------------------------------
            ----------------------------------------------------------------------------------------- */
            function showQR(node)
            {
                var url = "qr.php?img=" + node.getAttribute("id");

                // If There is no QRCode Child
                if (!document.querySelector("#qr_code"))
                {
                    var img = document.createElement("img")

                    // Append Image Child
                    img.setAttribute("id", "qr_code");
                    img.setAttribute("src", url);
                    document.querySelector(".qr-code").appendChild(img);
                    var qr = document.querySelector("#qr_code")

                    // Add Image style
                    qr.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
                    qr.style.borderRadius = "15px";
                    qr.style.backgroundColor = "#fff";

                    // Animation For Large screen
                    if (document.documentElement.clientWidth > "600")
                    {
                        $("#qr_code").animate({
                            height: "600px",
                            width: "600px"
                        }, "slow");
                    }
                    // Animation For Small Screens
                    else
                    {
                        var height = document.documentElement.clientWidth;
                        $("#qr_code").animate({
                            height: height - 20 + "px",
                            width: height - 20 + "px"
                        }, "slow");
                    }
                }
                // If QRCode Child Already Exist
                else if (document.querySelector("#qr_code").getAttribute("src") != url)
                {
                    var img = document.createElement("img");

                    // Append Image Child
                    img.setAttribute("id", "qr_code2");
                    img.setAttribute("src", url);
                    document.querySelector(".qr-code").appendChild(img);
                    var qr = document.querySelector("#qr_code2");

                    // Add Image style
                    qr.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
                    qr.style.borderRadius = "15px";
                    qr.style.backgroundColor = "#fff";

                    // Animation For Large Screen
                    if (document.documentElement.clientWidth > "600")
                    {
                        $("#qr_code2").animate({
                            height: "600px",
                            width: "600px"
                        }, "slow", function(event){document.querySelector("#qr_code").remove();});
                    }
                    // Animation For Small Screens
                    else
                    {
                        var height = document.documentElement.clientWidth;
                        $("#qr_code2").animate({
                            height: height - 20 + "px",
                            width: height - 20 + "px"
                        }, "slow", function(event){document.querySelector("#qr_code").remove();});
                    }
                    document.querySelector("#qr_code2").setAttribute("id", "qr_code");
                }
                // Hide QRCode
                else
                {
                    hideQR();
                }
            }

            function hideQR()
            {
                $("#qr_code").animate({
                    height: "0",
                    width: "0"
                }, "slow", function (){
                    document.querySelector("#qr_code").remove();
                });
            }

            document.querySelector(".qr-code").addEventListener("click", hideQR);

            /* -----------------------------------------------------------------------------------------
            ----------------------------------- Submit New Link ----------------------------------------
            ----------------------------------------------------------------------------------------- */

            document.querySelector("#submit").addEventListener("click", function (event)
            {
                event.preventDefault()
                var title = document.querySelector("#title").value;
                var url = document.querySelector("#url").value;

                // Validate Inputs
                if (!title)
                {
                    document.querySelector("#title").previousSibling.previousSibling.innerHTML = "Please Enter title";
                }
                else if (!url)
                {
                    document.querySelector("#url").previousSibling.previousSibling.innerHTML = "Please Enter URL";
                }
                else if (!validURL(url))
                {
                    document.querySelector("#url").previousSibling.previousSibling.innerHTML = "Sorry URL is Invalid";
                }
                // Send Request
                else
                {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function()
                    {
                        if (this.readyState == 4 && this.status == 200)
                        {
                            if (xhttp.response == 0)
                            {
                                search();
                                document.querySelector("#title").value = "";
                                document.querySelector("#url").value = "";
                                addLink();
                            }
                            else
                            {
                                console.log(xhttp.response);
                                check_inputs(xhttp.respone);
                            }
                        }
                    };
                    xhttp.open("POST", "/handler.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.send("title=" + title + "&url=" + url);
                }
            });

            // Check Server Errors
            function check_inputs(error)
            {
                if (error == "Please Enter title")
                {
                    document.querySelector("#title").previousSibling.previousSibling.innerHTML = "Please Enter title";
                }
                else if (error == "Please Enter URL")
                {
                    document.querySelector("#url").previousSibling.previousSibling.innerHTML = "Please Enter URL";
                }
                else if (error == "Sorry URL is Invalid")
                {
                    document.querySelector("#url").previousSibling.previousSibling.innerHTML = "Sorry URL is Invalid";
                }
                else
                {
                    document.querySelector("#title").previousSibling.previousSibling.innerHTML = "Unknown Error occured";
                }
            }

            /* -----------------------------------------------------------------------------------------
            -------------------------------------- New Link Form ---------------------------------------
            ----------------------------------------------------------------------------------------- */

            document.querySelector("#add").addEventListener("click", addLink);

            function addLink()
            {
                // If Form Already Opened Close it
                if (document.querySelector("#add_page").style.height == "95%"
                    || document.querySelector("#add_page").style.height == "600px")
                {
                    $("#add_page").animate({
                        height: "30px",
                        width: "120px"
                    });
                }
                // Open The form
                else
                {
                    // Animation For Small Screens
                    if (document.documentElement.clientWidth < "600")
                    {
                        $("#add_page").animate({
                            height: "95%",
                            width: "95%"
                        });
                    }
                    //Animation for Large Screens
                    else
                    {
                        $("#add_page").animate({
                            height: "600px",
                            width: "450px"
                        });
                    }
                }
            }

            /* -------------------- Automatically Get Page title -------------------- */
            document.form.url.addEventListener("change", function(){
                var url = document.form.url.value;
                if (validURL(url))
                {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function()
                    {
                        if (this.readyState == 4 && this.status == 200)
                        {
                            //console.log(xhttp.response);
                            document.form.title.value = xhttp.response;
                        }
                    };
                    xhttp.open("GET", "/handler.php?q=" + url, true);
                    xhttp.send();
                }
            });

            /* -----------------------------------------------------------------------------------------
            ----------------------------------------- Copy Button --------------------------------------
            ----------------------------------------------------------------------------------------- */

            function copyAnimate()
            {
                var copyButtons = document.getElementsByClassName("copy");

                for (var i = 0; i < copyButtons.length; i++)
                {
                    copyButtons[i].addEventListener("click", function () {

                        var text = this.getAttribute("data-clipboard-text");

                        document.getElementById("forCopy").value = text

                        copyText = document.getElementById("forCopy")


                        /* Select the text field */
                        copyText.select();
                        copyText.setSelectionRange(0, 99999); /* For mobile devices */

                        /* Copy the text inside the text field */
                        document.execCommand("copy");

                        textAlert("Copied to Clipboard");
                    });
                }
            }
            
            function textAlert(text)
            {
                document.querySelector("#popup p").innerHTML = text;
                $("#popup").animate({
                    top: '200px',
                    opacity: '0',
                }, "slow");
                $("#popup").animate({
                    top: "-50px",
                    opacity: "0"
                }, "fast");
                $("#popup").animate({
                    top: "-50px",
                    opacity: "1"
                }, "fast");
            }

            /* -----------------------------------------------------------------------------------------
            ----------------------------------- Remove Form Error Message ------------------------------
            ----------------------------------------------------------------------------------------- */

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

            /*----------------------------- URL Validation --------------------------*/
            function validURL(str)
            {
                var pattern = new RegExp('^((https?|ftp?|chrome?):\\/\\/)?'+ // protocol
                    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
                    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
                    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
                    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
                    '(\\#[-a-z\\d_]*)?'+ 
                    '(\\?[;&a-z\\d%_.~+=-]*)?', 'i'); // fragment locator
                return !!pattern.test(str);
            }
        </script>
    </body>
</html>