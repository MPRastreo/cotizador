// Form Validation
(() =>
{
    validatePassword();

    'use strict'
    const formAdd = document.querySelectorAll('.form-add-user')[0];

    formAdd.addEventListener('submit', event =>
    {
        if (formAdd.checkValidity())
        {
            event.preventDefault()
            addNewUser();
        }
    }, false);

    const formEdit = document.querySelectorAll('.form-edit-user')[0];
    formEdit.addEventListener('submit', event =>
    {
        if (formEdit.checkValidity())
        {
            event.preventDefault()
            editUser();
        }
    }, false)
})()

const addNewUser = () =>
{
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const password_confirmation = document.getElementById('password_confirmation').value;
    const roles = document.getElementById('roles').value;

    axios.post('/users',
    {
        name: name,
        email: email,
        password: password,
        password_confirmation: password_confirmation,
        roles: roles
    })
    .then(response =>
    {
        if (response.status === 200)
        {
            showSweetAlertOk('¡Exito!', response.data['message'], 'success', '/users');
        }
        else if (response.status === 500)
        {
            showSweetAlertOk('¡Lo sentimos!', response.data['message'], 'error', '/users');
        }
        else
        {
            showSweetAlertOk('¡Lo sentimos!', 'Hubo un error inesperado', 'error', '/users');
        }
    })
    .catch(error =>
    {
        Swal.fire
        (
            '¡Lo sentimos!',
            'Hay un error de conexión con el servidor, intente de nuevo',
            'error'
        )
    });
}

const fillUserData = user =>
{
    document.getElementById('edit_button').click();

    const { email, id, name, roles } = user;
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_roles').value = roles[0]['name'];
}

const editUser = () =>
{
    const id = document.getElementById('edit_id').value;
    const name = document.getElementById('edit_name').value;
    const email = document.getElementById('edit_email').value;
    const roles = document.getElementById('edit_roles').value;

    axios.put(`/users/${id}`,
    {
        id: id,
        name: name,
        email: email,
        roles: roles
    })
    .then(response =>
    {
        if (response.status === 200)
        {
            showSweetAlertOk('¡Exito!', response.data['message'], 'success', '/users');
        }
        else if (response.status === 500)
        {
            showSweetAlertOk('¡Lo sentimos!', response.data['message'], 'error', '/users');
        }
        else
        {
            showSweetAlertOk('¡Lo sentimos!', 'Hubo un error inesperado', 'error', '/users');
        }
    })
    .catch(error =>
    {
        Swal.fire
        (
            '¡Lo sentimos!',
            'Hay un error de conexión con el servidor, intente de nuevo',
            'error'
        )
    });
}

const deleteUser = id =>
{
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede deshacer',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Si, eliminar',
        cancelButtonText: 'Cancelar'
    }).then(result =>
    {
        if (result.isConfirmed)
        {
            axios.delete(`/users/${id}`).then(response =>
            {
                if (response.status === 200)
                {
                    showSweetAlertOk('¡Exito!', response.data['message'], 'success', '/users');
                }
                else if (response.status === 500)
                {
                    showSweetAlertOk('¡Lo sentimos!', response.data['message'], 'error', '/users');
                }
                else
                {
                    showSweetAlertOk('¡Lo sentimos!', 'Hubo un error inesperado', 'error', '/users');
                }
            })
            .catch(error =>
            {
                Swal.fire
                (
                    '¡Lo sentimos!',
                    'Hay un error de conexión con el servidor, intente de nuevo',
                    'error'
                )
            });
        }
    })
}
