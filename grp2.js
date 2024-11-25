// code for onclick for info button
function showInfo(containerId) {
    document.getElementById(containerId).style.display = 'block';
}

// code for onlick for exit button
function hideInfo(containerId) {
    document.getElementById(containerId).style.display = 'none';
}

// Slideshow
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName('slide');
    var dots = document.getElementsByClassName('dot');
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(' active', '');
    }
    slides[slideIndex - 1].style.display = 'block';
    dots[slideIndex - 1].className += ' active';
    setTimeout(showSlides, 2000);
}

// for backtotop button
let backToTopBtn = document.getElementById('backToTop');

window.onscroll = function () {
    if (
        document.body.scrollTop > 15 ||
        document.documentElement.scrollTop > 15
    ) {
        backToTopBtn.style.display = 'block';
    } else {
        backToTopBtn.style.display = 'none';
    }
};

// Function to scroll to the top of the document
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth',
    });
}
// Function to update the time and greeting
function updateTime() {
    const options = {
        timeZone: 'Asia/Manila',
        hour12: true,
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
    };
    const currentTime = new Date().toLocaleTimeString('en-US', options);

    const hour = new Date().getHours();
    let greeting;

    if (hour >= 5 && hour < 12) {
        greeting = 'Good Morning';
    } else if (hour >= 12 && hour < 18) {
        greeting = 'Good Afternoon';
    } else {
        greeting = 'Good Evening';
    }

    document.getElementById('realTime').textContent =
        greeting + '! Current Time: ' + currentTime;
}

setInterval(updateTime, 1000);
setInterval(updateTime, 1000);
const contactBtn = document.getElementById('contactBtn');
const contactForm = document.getElementById('contactForm');
const closeBtn = document.getElementById('closeBtn');

contactBtn.onclick = () => {
    contactForm.style.display = 'flex';
};

// Close the form when close button
closeBtn.onclick = () => {
    contactForm.style.display = 'none';

    document.getElementById('contactFormElement').reset();
};

closeBtn.onclick = () => {
    contactForm.style.display = 'none';
    document.getElementById('contactFormElement').reset();
    document.getElementById('responseMessage').innerHTML = '';
};

// Close the form when outside of the form content and reset the form
window.onclick = (event) => {
    if (event.target === contactForm) {
        contactForm.style.display = 'none';
        document.getElementById('contactFormElement').reset();
        document.getElementById('responseMessage').innerHTML = '';
    }
};

// for name and email
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');

nameInput.addEventListener('input', () => {
    const nameValue = nameInput.value;

    if (nameValue) {
        emailInput.value = `${nameValue}@gmail.com`;
        emailInput.setSelectionRange(
            emailInput.value.length,
            emailInput.value.length
        );
    } else {
        emailInput.value = '';
    }
});

// livesearch result ajax
function showResult(str) {
    if (str.length == 0) {
        document.getElementById('livesearch').innerHTML = '';
        document.getElementById('livesearch').style.border = '0px';
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('livesearch').innerHTML = this.responseText;
            document.getElementById('livesearch').style.border =
                '1px solid #A5ACB2';
        }
    };
    xmlhttp.open('GET', 'livesearch.php?q=' + str, true);
    xmlhttp.send();
}
