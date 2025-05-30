document.addEventListener("DOMContentLoaded", function () {
  const popup = document.querySelector(".custom__popup");
  const popupCloseBtn = document.querySelector(
    ".custom__popup .custom__popup_close"
  );
  const popupDelay = 1000;

  popupCloseBtn.addEventListener("click", function () {
    popup.classList.remove("show__popup");
  });

  setTimeout(() => {
    popup.classList.add("show__popup");
  }, popupDelay);
});
