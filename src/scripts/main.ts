import "../styles/main.scss";
import Typed from "typed.js";
import GLightbox from "glightbox";
import Aos from "aos";
import Lenis from "lenis";
import ToTopButton from "./components/toTopButton";
import Header from "./components/header";
import Slider from "./components/sliders";
//@ts-expect-error ignore useDynamicAdapt
import { useDynamicAdapt } from "./dynamicAdapt";

document.addEventListener("DOMContentLoaded", () => {
  new Header();
  new Slider();

  const target = document.getElementById("hero-typed");
  if (target) {
    const words = target?.dataset.typed?.split(",");
    new Typed(target, {
      strings: words,
      typeSpeed: 80,
      backSpeed: 35,
      loop: true,
    });
  }

  GLightbox({
    selector: ".lightbox",
  });

  Aos.init({
    once: true,
    duration: 800,
  });

  new ToTopButton();

  const lenis = new Lenis({
    anchors: true,
  });

  function raf(time: number) {
    lenis.raf(time);
    requestAnimationFrame(raf);
  }
  requestAnimationFrame(raf);

  useDynamicAdapt();
});
