/* eslint-disable @typescript-eslint/no-explicit-any */
declare const Swiper: any;

export default class Slider {
  constructor() {
    this.initRecentProjectsSlider();
  }

  private initRecentProjectsSlider() {
    const recentProjectsNode = document.querySelector(".recent-projects__slider") as HTMLElement;
    if (!recentProjectsNode) return;
    new Swiper(recentProjectsNode, {
      loop: true,
      wrapperClass: "recent-projects__slider-wrapper",
      slideClass: "slide-rp",
      spaceBetween: 340,
      autoplay: {
        delay: 5000,
        pauseOnMouseEnter: true,
      },
      slidesPerView: 1,
      parallax: true,
      speed: 1800,
      navigation: {
        nextEl: ".recent-projects__slider-next",
        prevEl: ".recent-projects__slider-prev",
      },
    });
  }
}
