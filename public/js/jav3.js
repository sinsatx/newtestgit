






const box = document.querySelector('.box2');
const card = document.querySelector('.card');

const babyYoda = document.querySelector('.card-character-img');
const title = document.querySelector('.card-info-title');
const subtitle = document.querySelector('.card-info-subtitle');
const seasons = document.querySelector('.card-info-seasons');






box.addEventListener('mousemove', (event) =>{


let xAxis = (event.pageX - window.innerWidth / 2) / 35;
let yAxis = (window.innerHeight / 2 - event.pageY) / 35;


card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;



});


box.addEventListener('mouseenter', (event) => {

card.style.transition = 'all 0.2s ease';

setTimeout(function (e) {

card.style.transition = 'none';
}, 400);


babyYoda.style.transform = 'translateZ(100px)';

title.style.transform = 'translateZ(100px)';
subtitle.style.transform = 'translateZ(100px)';
seasons.style.transform = 'translateZ(100px)';



} );




box.addEventListener('mouseleave', (event) => {

card.style.transition = 'transform 0.5s ease';
card.style.transform = 'rotateY(0deg) rotateX(0deg)';



babyYoda.style.transform = 'translateZ(0)';

title.style.transform = 'translateZ(0)';
subtitle.style.transform = 'translateZ(0)';
seasons.style.transform = 'translateZ(0)';



});


