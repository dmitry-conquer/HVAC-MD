
export default class ToTopButton {
  private readonly selectors: Record<string, string> = {
    root: "[data-js-top-top-button]",
  };
  private readonly states: Record<string, string> = {
    isVisible: "is-visible",
  };
  private rootElement: HTMLElement | null;
  private scrollOffset = 400;

  constructor() {
    this.rootElement = document.querySelector(this.selectors.root);
    this.bindEvents();
  }

  private toggleVisibility = () => {
    if (window.scrollY > this.scrollOffset) {
      this.rootElement?.classList.add(this.states.isVisible);
    } else {
      this.rootElement?.classList.remove(this.states.isVisible);
    }
  };

  private bindEvents() {
    window.addEventListener("scroll", this.toggleVisibility);
  }
}
