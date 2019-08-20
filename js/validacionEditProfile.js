// EDITAR PERFIL


document.getElementById('submitEdit').addEventListener('click', validarEditarPerfil);


function validarNombreNuevo(e) {
    var usuarioNuevo = document.getElementById('usuarioNuevo');
    if (usuarioNuevo.value.length < 2){
        alert('El nombre no debe tener menos de 2 caracteres');
        //errores.style.display = 'block';
        //errores.innerHTML += '<li>El usuario no debe tener menos de 3 caracteres</li>';
        
        e.preventDefault(e)
    } else if(usuarioNuevo.value.length > 7){
        alert('El nombre no debe tener mas de 7 caracteres');
        //errores.style.display = 'block';
        //errores.innerHTML += '<li>El usuario no debe tener mas de 7 caracteres</li>';
        e.preventDefault(e)
    }
}


function validarDescripcion(e) {
    var descripcion = document.getElementById('descripcion');
    if (descripcion.value.length > 260){
        alert('La descripcion no debe tener mas de 260 caracteres');
        //errores.style.display = 'block';
        //errores.innerHTML += '<li>La contraseña no debe tener menos de 5 caracteres</li>';
        
        e.preventDefault(e)
    }
    //} else if(descripcion.value.length > 10){
    //    console.log('La contraseña no debe tener mas de 10 caracteres');
    //    errores.style.display = 'block';
    //    errores.innerHTML += '<li>La contraseña no debe tener mas de 10 caracteres</li>';
    //    e.preventDefault(e)
    //}
}


function validarEditarPerfil(e){
    //errores.innerHTML = '';

    validarNombreNuevo(e);
    validarDescripcion(e);
}