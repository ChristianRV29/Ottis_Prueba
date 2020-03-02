var formatosValidos = [
    'image/jpeg',
    'image/png',
    'image/jpg'
];



function validarFormato(file){

    for(var i = 0; i < formatosValidos.length; i++){

        if (file.type === formatosValidos[i]){

            return true;
        }

        else {

            return false;
        }
    }
}

function onChange(event){

    var file = event.target.files[0];

    console.log(file);

    if (validarFormato(file) == true){

        alert("Formato valido");
        
    }

}