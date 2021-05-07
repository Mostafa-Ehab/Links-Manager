var time = document.querySelector(".time")

setInterval(function () {
    time.innerHTML = parseInt(time.innerHTML) - 1
}, 1000)