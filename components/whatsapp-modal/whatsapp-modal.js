document.addEventListener("DOMContentLoaded", function () {
  const closeWhatsappPopup = document.querySelector(
    ".whatsapp__popup .custom__popup_close"
  );
  const whatsappPopup = document.querySelector(".whatsapp__popup");

  closeWhatsappPopup.addEventListener("click", function () {
    whatsappPopup.style.display = "none";
  });

  const popupViewed = sessionStorage.getItem("whatsapp_popup_viewed");

  if (!popupViewed) {
    setTimeout(() => {
      whatsappPopup.classList.add("show__popup");
    }, 3000);

    sessionStorage.setItem("whatsapp_popup_viewed", true);
  }
});
