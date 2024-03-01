const alert = document.querySelectorAll('.alert'),
burger = document.querySelector('.burger'),
navbar = document.getElementById('Nav-Bar'),
home = document.getElementById('home'),
header = document.querySelector('header');

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
}, 1500);

// Auth password
const password = document.getElementById('password'),
check = document.getElementById('check');
if(password != undefined || check != undefined){
    check.addEventListener('click', () => {
        if(password.type == 'password'){
            password.type = 'text';
        } else if (password.type == 'text'){
            password.type = 'password';
        }
    });
}

// windows
if(home != undefined){
    if(home.getAttribute('data-bool')){
        window.addEventListener('scroll', () => {
            if(window.scrollY >= 100){
                header.classList.remove('transparent')
            } else {
                header.classList.add('transparent')
            }
        })
    }
}