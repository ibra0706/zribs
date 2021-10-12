const btn = document.querySelector('.uredi');
const overlay = document.querySelector('.overlay');
const closeBtn = document.querySelector('.close');
const checked = document.querySelectorAll('i');
console.log(checked);
let x;
btn.addEventListener('click', e=>{
    overlay.classList.add('yes');
    x = overlay.classList.contains('yes');
    e.preventDefault();
});

closeBtn.addEventListener('click', ()=>{
    overlay.classList.remove('yes');
});

checked.forEach(check=>{
  check.addEventListener('click', () =>{
    console.log('323');
  })
})

// checked.forEach((check) => {
//     check.addEventListener('click', () => {
//       let y = check.classList.contains('fa-check');
//       if (y === true) {
//         check.classList.add('green');
//       }
//       else{
//         check.classList.add('red');
//       }
//     });
//   });