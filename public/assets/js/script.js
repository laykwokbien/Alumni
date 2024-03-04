const alert = document.querySelectorAll('.alert'),
burger = document.querySelector('.burger'),
navbar = document.getElementById('Nav-Bar'),
home = document.getElementById('home'),
alumni = document.getElementById('alumni'),
about = document.getElementById('about'),
visi = document.getElementById('visi'),
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
if(home != undefined || about != undefined || alumni != undefined){
    window.addEventListener('scroll', () => {
        if(window.scrollY >= 100){
            header.classList.remove('transparent')
        } else {
            header.classList.add('transparent')
        }
    })
}
// Visi
let visiContent = [
    {
        'nama': "Berjaya dan Berteknologi",
        'isi': "SMKN 1 Bondowoso Berjaya Dalam Menerapkan Teknologi Terkini",
    },
    {
        'nama': "Berbudaya",
        'isi': "Penerapan Pendidikan yang mengintegrasikan nilai - nilai budaya lokal dalam proses belajar mengajar",
    },
    {
        'nama': "Berakhlak",
        'isi': "Penerapan Pendidikan yang menekankan Pentingnya Nilai-nilai Moral dan Etika Dalam Proses Belajar Mengajar",
    }
];

for(let i = 0; i < visiContent.length; i++){
    let div = document.createElement('div');
    div.classList.add('d-flex');
    div.classList.add('flex-column');
    div.classList.add('gap-3');
    div.classList.add('col-4');
    div.classList.add('text-center');
    let h2 = document.createElement('h2');
    h2.innerHTML = visiContent[i].nama;
    let p = document.createElement('p');
    p.innerHTML = visiContent[i].isi;
    div.append(h2)
    div.append(p)
    visi.append(div)
}