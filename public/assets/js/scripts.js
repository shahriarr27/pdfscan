const section = document.querySelector('#shrink-video');
const sectionTop = section.offsetTop;
const sectionHeight = section.offsetHeight;
const windowHeight = window.innerHeight;

function shrinkSection() {
  const scrollPosition = window.scrollY;

  section.style.width = '100%';
  if (scrollPosition > sectionTop) {
    const percentScrolled = (scrollPosition - sectionTop) / (sectionHeight - windowHeight);
    const newWidth = 100 - percentScrolled * 40; // reduce width by 10%
    section.style.width = `${190 - newWidth}%`;
    if(190 - newWidth < 50){
      section.style.width = `33.33%`;
    }
    console.log(190 - newWidth);
  } else if (scrollPosition >= sectionTop + sectionHeight - windowHeight) {
    section.style.width = '90%'; // minimum width
  } else {
    section.style.width = '100%'; // full width
  }
}

window.addEventListener('scroll', shrinkSection);
