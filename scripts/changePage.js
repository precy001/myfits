const images = ['assets/images/home_backG_m.jpg', 'assets/images/home_backG_w.jpg', 'assets/images/home_backG_c.jpg']
/* const text = [`
            <div class="media"><span class="welcome"></span>
            <span class="note">WELCOME TO<span class="bold-note">MAYO-MOS GLOBAL NIGERIA LIMITED </span> </span>
            <div class="book-online">
            <a href="book-online.html" class="book">Book online</a>
            </div></div>`, 
            `<div class="each media"><span class="welcome">Reliable and trusted cleaning service provider</span>
            <span class="note">WE ENSURE<span class="bold-note">YOUR UTMOST SATISFACTION</span> </span>
            <div class="book-online">
            <a href="about-us.html" class="book">About-us</a>
            </div></div>`,
            `<div class="each media"><span class="welcome">mayo-mos Cleaning</span>
            <span class="note">WE TAKE THE STRESS<span class="bold-note">OUT OF CLEANING</span> </span>
            <div class="book-online">
            <a href="services.html" class="book">Our services</a>
            </div></div>`
        ]
const textElement = document.querySelector('.main') */
const element = document.querySelector('.main-index')
let currentIndex = 0

function changeBackgroundAndText(){
    element.style.backgroundImage = `url(${images[currentIndex]})`
    /* textElement.innerHTML = `${text[currentIndex]}` */
    if(currentIndex === 2){
        currentIndex = -1
    }
    currentIndex ++
}

changeBackgroundAndText();
setInterval(changeBackgroundAndText, 8000)

const menuBtn = document.querySelector('.hamburger');
const mobileMenu = document.querySelector('.mobile-nav')
menuBtn.addEventListener('click', function(){
    menuBtn.classList.toggle('is-active')
    mobileMenu.classList.toggle('is-active')
})
