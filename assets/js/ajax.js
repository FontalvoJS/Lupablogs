function loginForm() {
    let form = document.getElementById('loginForm');
    const datosForm = new FormData(form);
    fetch('http://localhost/Lupablogs/controlador/login.php', {
        method: 'POST',
        body: datosForm
    })
        .then(response => {
            let data = response.text();
            return data;
        })
        .then(data => {
            if (data == "Ok") {
                window.location.href = "http://localhost/Lupablogs/vistas/index.php";
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Usuario o contraseña incorrectos',
                    icon: 'error',
                    confirmButton: false
                })
            }
        })
}

function registroForm() {
    let form = document.getElementById('registroForm');
    const datosForm = new FormData(form);
    fetch('http://localhost/Lupablogs/controlador/registro.php', {
        method: 'POST',
        body: datosForm
    })
        .then(response => {
            let data = response.text();
            return data;
        })
        .then(data => {
            if (data == "Ok") {
                Swal.fire({
                    title: 'Registro',
                    text: 'Usuario registrado correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                })
            } else if (data == "Ya existe") {
                Swal.fire({
                    title: 'Error!',
                    text: 'El usuario ya existe',
                    icon: 'error',
                    confirmButton: false
                })
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Error, no se ha podido registrar el usuario',
                    icon: 'error',
                    confirmButton: false
                })
            }
        })
}

function createPost() {
    let form = document.getElementById('createPost');
    const datosForm = new FormData(form);
    fetch('http://localhost/Lupablogs/controlador/createPost.php', {
        method: 'POST',
        body: datosForm
    })
        .then(response => {
            let data = response.text();
            return data;
        })
        .then(data => {
            if (data == "Ok") {
                Swal.fire({
                    title: 'Muy bien!',
                    text: 'Se ha subido tu artículo correctamente',
                    icon: 'success',
                    footer: '<a href="#">Quiero ver mi articulo!</a>',
                })


            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Error, no se ha podido crear el post',
                    icon: 'error',
                })
            }
        })
}

function uploadImages(image) {
    var data = new FormData();
    data.append("files", image);
    fetch('../http://localhost/Lupablogs/controlador/uploadImage.php', {
        method: 'POST',
        body: data
    })
        .then(response => {
            return response.text()
        })
        .then(url => {
            var image = $('<img>').attr('src', 'http://localhost/Lupablogs/assets/imgs_articulos/' + url).attr('class', 'img-fluid');
            $('#summernote').summernote("insertNode", image[0]);
        })
}