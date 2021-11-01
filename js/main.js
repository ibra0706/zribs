const btn = document.querySelector(".uredi");
const overlay = document.querySelector(".overlay");
const closeBtn = document.querySelector(".close");
// Adrian was here
const checked = document.querySelectorAll("label");
const inputs = document.querySelectorAll("input");
// const ja = document.querySelectorAll('i');

let x;
btn.addEventListener("click", (e) => {
  overlay.classList.add("yes");
  x = overlay.classList.contains("yes");
  e.preventDefault();
});

// closeBtn.addEventListener('click', ()=>{
//     overlay.classList.remove('yes');
// });

// checked.forEach((check) => {
//     check.addEventListener('click', () => {
//       let y = check.classList.contains('green1');
//       console.log(y);
//       if (y === true) {
//         check.classList.add('green');
//       }
//       else{
//         check.classList.add('red');
//       }
//     });
//   });
let j = 0;
inputs.forEach((input) => {
  input.addEventListener("click", () => {
    const china = input.nextSibling.nextSibling.firstChild;
    if (j === 0) {
      j++;
      china.style.color = "green";
      console.log(china);
    } else {
      j--;
      china.style.color = "black";
    }
  });
});
