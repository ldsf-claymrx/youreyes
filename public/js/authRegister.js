document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('form-register').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita el envío del formulario por defecto

        const form = event.target;
        const formData = new FormData(form);
        const csrfToken = form.querySelector('input[name="_token"]').value;
        const URL = form.querySelector('input[name="url"]').value;

        fetch(URL + '/register', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                Swal.fire({
                    title: 'Solicitud Enviada',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                cleanInputs();
            } else if (data.status === 'error' && data.errors) {
                // Mostrar los mensajes de error en los labels correspondientes
                if (data.errors.name) {
                    document.getElementById('name-error').innerText = data.errors.name.join(' ');
                }
                if (data.errors.lastname) {
                    document.getElementById('lastname-error').innerText = data.errors.lastname.join(' ');
                }
                if (data.errors.position) {
                    document.getElementById('position-error').innerText = data.errors.position.join(' ');
                }
                if (data.errors.email) {
                    document.getElementById('email-error').innerText = data.errors.email.join(' ');
                }
                if (data.errors.password) {
                    document.getElementById('password-error').innerText = data.errors.password.join(' ');
                }
                if (data.errors.sex) {
                    document.getElementById('sex-error').innerText = data.errors.sex.join(' ');
                }
            } else {
                Swal.fire({
                    title: data.message,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Error al procesar la solicitud.',
                text: error,
                icon: 'error',
                footer: 'Favor de ponerse en contacto. <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">DavidClayMRX</a>',
                confirmButtonText: 'OK'
            });
        });
    });

    document.getElementById('name').addEventListener('input', function() {
        document.getElementById('name-error').textContent = '';
    });

    document.getElementById('lastname').addEventListener('input', function() {
        document.getElementById('lastname-error').textContent = '';
    });

    document.getElementById('position').addEventListener('input', function() {
        document.getElementById('position-error').textContent = '';
    });

    document.getElementById('email').addEventListener('input', function() {
        document.getElementById('email-error').textContent = '';
    });

    document.getElementById('password').addEventListener('input', function() {
        document.getElementById('password-error').textContent = '';
    });

    document.querySelectorAll('input[name="sex"]').forEach((radio) => {
        radio.addEventListener('change', function() {
            document.getElementById('sex-error').textContent = '';
        });
    });

    function cleanInputs() {
        document.getElementById('name').value = '';
        document.getElementById('lastname').value = '';
        document.getElementById('email').value = '';
        document.getElementById('password').value = '';
        
        document.querySelectorAll('input[name="sex"]').forEach((radio) => {
            radio.checked = false;
        });
    }
});
