import "../styles/main.scss";
import Typed from "typed.js";
import GLightbox from "glightbox";

document.addEventListener("DOMContentLoaded", () => {
  const target = document.getElementById("hero-typed");
  const words = target?.dataset.typed?.split(",");
  new Typed(target, {
    strings: words,
    typeSpeed: 80,
    backSpeed: 35,
    loop: true,
  });

  GLightbox({
    selector: '.lightbox'
  });
});
