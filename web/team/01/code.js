function clicked() {
    alert("You clicked me!!!!!!!")
}

function setColorBiggest() {
    var color = document.getElementById("colorInput").value;
    document.getElementById("biggest").style.backgroundColor = color;
}

function setColorBiggestJQuery() {
    $("#biggest").css("background-color", $("#colorInput").val());
}

function fadeMedium() {
    if ($("#medium").is(':visible')){
        $("#medium").fadeOut(300);
    } else {
        $("#medium").fadeIn(300);
    }
}
