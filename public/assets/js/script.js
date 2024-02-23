const alert = document.querySelectorAll('.alert'),
burger = document.querySelector('.burger'),
navbar = document.getElementById('Nav-Bar'),
header = document.querySelector('header');

console.log(navbar)

// Responsive Nav
burger.addEventListener('click', () => {
    burger.classList.toggle('burger-active')
    navbar.classList.toggle('nav-expand');
});


// Notification Timer
setTimeout(() => {
    alert.forEach(e => {
        e.remove();
    });
}, 1000);

// windows
window.addEventListener('scroll', () => {
    if(window.scrollY >= 100){
        header.classList.remove('transparent')
    } else {
        header.classList.add('transparent')
    }
})

// Auth password
const password = document.getElementById('password'),
check = document.getElementById('check');

check.addEventListener('click', () => {
    if(password.type == 'password'){
        password.type = 'text';
    } else if (password.type == 'text'){
        password.type = 'password';
    }
});


