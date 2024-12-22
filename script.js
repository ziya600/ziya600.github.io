// Sayfa yüklendiğinde animasyon eklemek
document.addEventListener("DOMContentLoaded", function() {
    const hero = document.getElementById("hero");
    hero.classList.add("fade-in");
});

// "Projelerimi Gör" butonuna tıklayınca projeler bölümüne kaydır
const scrollToProjectsButton = document.querySelector('.btn-primary');
scrollToProjectsButton.addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('projects').scrollIntoView({ behavior: 'smooth' });
});

// Sayfa kaydırıldığında header'ı sabitlemek
window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
        header.classList.add('sticky');
    } else {
        header.classList.remove('sticky');
    }
});

// Basit scroll efekti için CSS sınıfı eklemek
document.addEventListener("scroll", function() {
    const sections = document.querySelectorAll("section");
    sections.forEach(section => {
        const rect = section.getBoundingClientRect();
        if (rect.top >= 0 && rect.bottom <= window.innerHeight) {
            section.classList.add("in-view");
        } else {
            section.classList.remove("in-view");
        }
    });
});
