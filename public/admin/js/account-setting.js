var myInput = document.getElementById("newpass");
var retype = document.getElementById("retype");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var symbol = document.getElementById("symbol");
var length = document.getElementById("length");
var feedback = document.getElementById("feedback");
var progress = document.getElementsByClassName("progress-bar");

myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

myInput.onkeyup = function() {
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }

    var Symbols = /[!$#%@]/g;
    if (myInput.value.match(Symbols)) {
        symbol.classList.remove("invalid");
        symbol.classList.add("valid");
    } else {
        symbol.classList.remove("valid");
        symbol.classList.add("invalid");
    }


}

retype.onfocus = function() {
    document.getElementById("feedback").style.display = "block";
}

retype.onblur = function() {
    document.getElementById("feedback").style.display = "none";
}

retype.onkeyup = function() {
    if (retype.value.length === 0) {
        retype.classList.remove("is-valid");
        retype.classList.add("is-invalid");
        feedback.classList.add("text-danger");
        $("#pesan").html("Tulis ulang <b>Kata Sandi Baru!</b>");
    } else {
        if (myInput.value === retype.value) {
            retype.classList.remove("is-invalid");
            retype.classList.add("is-valid");
            feedback.classList.remove("text-danger");
            feedback.classList.add("text-success");
            $("#pesan").html("Kata Sandi <b>Cocok!</b>");
        } else {
            retype.classList.remove("is-valid");
            retype.classList.add("is-invalid");
            feedback.classList.remove("text-success");
            feedback.classList.add("text-danger");
            $("#pesan").html("Kata Sandi <b>Tidak Cocok!</b>");
        }
    }
}