const btn = document.querySelector('.uredi');
const overlay = document.querySelector('.overlay');
const closeBtn = document.querySelector('.close');

let x;
btn.addEventListener('click', e=>{
    overlay.classList.add('yes');
    x = overlay.classList.contains('yes');
    e.preventDefault();
});

console.log(closeBtn);

closeBtn.addEventListener('click', ()=>{
    overlay.classList.remove('yes');
})