//Función para mostrar un mensaje de confirmación
function eraseConfirm() {
        if(confirm("¿Desea eliminar la nota?") == false) {
            return false;
        } else {
            return true;
        }
    }

//Función para validar campos
function validarNota() {
    var xpeso, yaltura, znota, text;
    
    xpeso = document.getElementById("peso").value;
    yaltura = document.getElementById("altura").value;
    znota = document.getElementById("notes").value;
    
    function isEmptyOrSpaces(x){
    return x === null || x.match(/^ *$/) !== null;
	}
    
    var addr = '  ';

    if (isNaN(xpeso) || isEmptyOrSpaces(xpeso)) {
        document.getElementById('peso').style.borderColor = "#B22222";
        var pesomsj = false;
    } else {
        document.getElementById('peso').style.borderColor = "#f0f0f0";
    }

    if (isNaN(yaltura) || isEmptyOrSpaces(yaltura)) {
        document.getElementById('altura').style.borderColor = "#B22222";
        var alturamsj = false;
    } else {
        document.getElementById('altura').style.borderColor = "#f0f0f0";
    }

    if (isEmptyOrSpaces(znota)) {
        document.getElementById('notes').style.borderColor = "#B22222";
        var notamsj = false;
    } else {
        document.getElementById('notes').style.borderColor = "#f0f0f0";
    }

    // Get the value of the input field with id="numb"
    // If x is Not a Number or less than one or greater than 10
    if (pesomsj == false || alturamsj == false || notamsj == false) {
        alert('Los campos marcados estan vacíos o no cumplen con el formato.');
        return false;
    } else {
        return true;
    }
}