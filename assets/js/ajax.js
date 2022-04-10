function loginForm() {
    let form = document.getElementById('loginForm');
    const datosForm = new FormData(form);
    fetch('http://localhost/Lupablogs/controlador/login.php', {
        method: 'POST',
        body: datosForm
    })
        .then(response => {
            return response.text();
        })
        .then(data => {

            if (data == "True") {
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

function deletePost(id) {
    let list_id = document.getElementById('id' + id);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            fetch('http://localhost/Lupablogs/controlador/deletePost.php', {
                method: 'POST',
                body: JSON.stringify({ id: id })
            })
                .then(response => {
                    return response.text()
                })
                .then(data => {
                    if (data == "Ok") {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        list_id.classList.add('d-none');
                    } else {
                        Swal.fire(
                            'Cancel!',
                            'Don´t have been deleted',
                            'error'
                        )
                    }
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
                    title: 'Succesfully!',
                    text: 'You have been registered correctly',
                    icon: 'success',
                    confirmButtonText: false
                })
                form.reset();
                window.location.href = "http://localhost/Lupablogs/vistas/index.php";

            } else if (data == "Ya existe") {
                Swal.fire({
                    title: 'Error!',
                    text: 'The user already exists',
                    icon: 'error',
                    confirmButton: false
                })
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Error, don´t have been registered',
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
    fetch('http://localhost/Lupablogs/controlador/uploadImage.php', {
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

function alterPost(id) {
    let alterForm = document.getElementById('alterForm');
    const datosForm = new FormData(alterForm);
    datosForm.append('id', id);
    fetch('http://localhost/Lupablogs/controlador/alterPost.php', {
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
                    text: 'Se ha modificado el post correctamente',
                    icon: 'success',
                    footer: '<a href="#">Quiero ver mi articulo!</a>',
                })
                alterForm.reset();
                window.location.href = "http://localhost/Lupablogs/vistas/dashboard.php";

            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Error, no se ha podido modificar el post',
                    icon: 'error',
                })
            }
        }
        )
}