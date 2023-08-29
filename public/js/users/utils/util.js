const validatePassword = () =>
{
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('password_confirmation');

    confirmPassword.addEventListener('input', () =>
    {
        if (password.value !== confirmPassword.value)
        {
            confirmPassword.setCustomValidity('Las contraseñas no coinciden.');
        }
        else if (password.value.length < 8)
        {
            confirmPassword.setCustomValidity('La contraseña debe tener al menos 8 caracteres.');
        }
        else
        {
            confirmPassword.setCustomValidity('');
        }
    });
    password.addEventListener('input', () => confirmPassword.setCustomValidity(''));
}

const dispatchEventSubmit = selectorName =>
{
    const event = new Event('submit',
    {
        'bubbles': true,
        'cancelable': true
    });
    document.querySelector(`.${ selectorName }`).dispatchEvent(event);
}

const showSweetAlertOk = (title, text, icon, url) =>
{
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
    }).then(result =>
    {
        if (result.isConfirmed)
        {
           window.location.replace(url)
        }
    })
}

