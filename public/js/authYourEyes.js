document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('form-login').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita el envío del formulario por defecto

        const form = event.target;
        const formData = new FormData(form);
        const csrfToken = form.querySelector('input[name="_token"]').value;
        const URL = form.querySelector('input[name="url"]').value;

        document.getElementById('email-error').innerText = '';
        document.getElementById('password-error').innerText = '';

        fetch(URL + '/auth', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                window.location.href = data.redirect;
            } else if (data.status === 'error' && data.errors) {
                // Mostrar los mensajes de error en los labels correspondientes
                if (data.errors.email) {
                    document.getElementById('email-error').innerText = data.errors.email.join(' ');
                }
                if (data.errors.password) {
                    document.getElementById('password-error').innerText = data.errors.password.join(' ');
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

    document.getElementById('email').addEventListener('input', function() {
        document.getElementById('email-error').textContent = '';
    });

    document.getElementById('password').addEventListener('input', function() {
        document.getElementById('password-error').textContent = '';
    });
});
