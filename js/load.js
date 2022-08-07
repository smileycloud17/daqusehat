// loading spinner
let fadetarget = document.querySelector(".loading");


function show_loading() {
  fadetarget.style.display = "block";
}
function hide_loading() {
  fadetarget.style.display = "none";
  let fadeEffect = setInterval (() =>{
      if (!fadetarget.style.opacity) {
          fadetarget.style.opacity = 1;
      }
      if (fadetarget.style.opacity > 0) {
          fadetarget.style.opacity -= 0.1;
      } else {
          clearInterval(fadeEffect)
          fadetarget.style.display = "none"
      }
  },100)
}