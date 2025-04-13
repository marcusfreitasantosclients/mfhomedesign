document.addEventListener("DOMContentLoaded", function () {
  const dropdowns = document.querySelectorAll(".navbar .dropdown");

  dropdowns.forEach((dropdown) => {
    const toggle = dropdown.querySelector(".dropdown-toggle");
    const menu = dropdown.querySelector(".dropdown-menu");

    if (window.innerWidth >= 992) {
      dropdown.addEventListener("mouseenter", () => {
        toggle.classList.add("show");
        menu.classList.add("show");
        toggle.setAttribute("aria-expanded", "true");
      });

      dropdown.addEventListener("mouseleave", () => {
        toggle.classList.remove("show");
        menu.classList.remove("show");
        toggle.setAttribute("aria-expanded", "false");
      });
    }
  });
});
