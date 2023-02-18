const backtoTop = document.querySelector("#backtoTop");

window.addEventListener("scroll", () => {
  if(window.pageYOffset > 200) {
    backtoTop.classList.add("active");
  } else {
    backtoTop.classList.remove("active");
  }
})