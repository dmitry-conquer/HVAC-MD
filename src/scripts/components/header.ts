export class Header {
  private readonly selectors: Record<string, string> = {
    root: "[data-js-header]",
    overlay: "[data-js-header-overlay]",
    triggerButton: "[data-js-header-trigger-button]",
  };

  private readonly states: Record<string, string> = {
    isActive: "is-active",
    isLock: "is-lock",
  };

  private readonly attributes: Record<string, string> = {
    ariaExpanded: "aria-expanded",
  };

  private rootElement: HTMLElement | null;
  private overlayElement: HTMLElement | null;
  private triggerButtonElement: HTMLElement | null;

  constructor() {
    this.rootElement = document.querySelector(this.selectors.root);
    this.overlayElement = this.rootElement?.querySelector(this.selectors.overlay) || null;
    this.triggerButtonElement = this.rootElement?.querySelector(this.selectors.triggerButton) || null;

    if (!this.isReady) return;
    this.bindEvents();
  }

  private isReady(): boolean {
    return !!(this.rootElement && this.overlayElement && this.triggerButtonElement);
  }

  onTriggerButtonClick = (): void => {
    this.triggerButtonElement?.classList.toggle(this.states.isActive);
    this.overlayElement?.classList.toggle(this.states.isActive);
    document.body.classList.toggle(this.states.isLock);
    document.documentElement.classList.toggle(this.states.isLock);
    this.triggerButtonElement?.setAttribute(this.attributes.ariaExpanded, this.triggerButtonElement.classList.contains(this.states.isActive) ? "true" : "false");
  };

  bindEvents(): void {
    this.triggerButtonElement?.addEventListener("click", this.onTriggerButtonClick);
  }
}

export default Header;
