$(window).on("hashchange", function () {

	if (location.hash.slice(1) == "signup") {
		console.log("cambiando a formulario de registro");
		$(".page").addClass("extend");
		$("#login").removeClass("active");
		$("#signup").addClass("active");

	} else {
		console.log("cambiando a formulario de inicio de sesión");
		$(".page").removeClass("extend");
        $("#signup").removeClass("active");
		$("#login").addClass("active");

	}
});
$(window).trigger("hashchange");

function validateLoginForm() {
	var name = document.getElementById("logName").value;
	var password = document.getElementById("logPassword").value;

	if (name == "" || password == "") {
		document.getElementById("errorMsg").innerHTML = "Por favor, complete todos los campos requeridos"
		return false;
	}

	else if (password.length < 8) {
		document.getElementById("errorMsg").innerHTML = "La contraseña debe tener al menos 8 caracteres"
		return false;
	}
	else {
		alert("Successfully logged in");
		return true;
	}

}
function validateSignupForm() {
	var mail = document.getElementById("signEmail").value;
	var name = document.getElementById("signName").value;
	var password = document.getElementById("signPassword").value;
    var firstName = document.getElementById("signFirstName").value;
    var role = document.getElementById("signRole").value;


	if (mail == "" || name == "" || password == "" || firstName == "" || role == "") {
		document.getElementById("errorMsg").innerHTML = "Por favor, complete todos los campos requeridos"
		return false;
	}

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expresión regular para validar correos
    if (!emailPattern.test(mail)) {
        document.getElementById("errorMsg").innerHTML = "Por favor, ingrese un correo electrónico válido.";
        return false;
    }

	else if (password.length < 8) {
		document.getElementById("errorMsg").innerHTML = "La contraseña debe tener al menos 8 caracteres"
		return false;
	}
	else {
		alert("Registro exitoso");
		return true;
	}

}
