import { CountUp } from "countup.js";

export default class Counter {
  constructor() {
    this.initCounters();
  }

  private initCounters() {
    const counters = document.querySelectorAll("[data-counter]");
    counters.forEach((counter: Element) => {
      const [value, suffix] = counter.getAttribute("data-counter")?.split(",") || [];
      const countUp = new CountUp(counter as HTMLElement, Number(value), {
        duration: 3,
        suffix: suffix || "",
        enableScrollSpy: true,
        scrollSpyOnce: true
      });
      countUp.start();
    });
  }
}