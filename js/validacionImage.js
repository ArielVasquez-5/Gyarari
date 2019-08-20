// Subir Imagen


document.getElementById('submitImg').addEventListener('click', validarSubida);


function validarNombreImg(e) {
    var nombreImg = document.getElementById('nombreImg');
    if (nombreImg.value.length < 2){
        alert('El nombre no debe tener menos de 2 caracteres');
        
        e.preventDefault(e)
    } else if(nombreImg.value.length > 15){
        alert('El nombre no debe tener mas de 15 caracteres');

        e.preventDefault(e)
    }
}


function validarDescripcion(e) {
    var textareaImg = document.getElementById('textareaImg');
    if (textareaImg.value.length > 260){
        alert('La descripcion no debe tener mas de 260 caracteres');
        
        e.preventDefault(e)
    }
}


function validarSubida(e){
    validarNombreImg(e);
    validarDescripcion(e);
}