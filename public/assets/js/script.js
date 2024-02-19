const alert = document.querySelectorAll('.alert');

setTimeout(() => {
    alert.forEach(e => {
        e.remove();
    });
}, 1000);

const password = document.getElementById('password'),
check = document.getElementById('check');

check.addEventListener('click', () => {
    if(password.type == 'password'){
        password.type = 'text';
    } else if (password.type == 'text'){
        password.type = 'password';
    }
});

