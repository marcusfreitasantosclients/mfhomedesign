document.addEventListener("DOMContentLoaded", function () {
  const contactForms = [...document.querySelectorAll(".mf_contact_form")];

  const sendFormData = async (formData, form) => {
    const loadingSpinner = form.querySelector(".mf_loading_spinner");

    try {
      loadingSpinner.style.display = "flex";

      const response = await fetch(
        `${current_user_data.site_url}/wp-json/forms/v2/send-form-data`,
        {
          method: "POST",
          body: JSON.stringify(formData),
        }
      );

      console.log(response);
    } catch (e) {
      console.log(e);
    } finally {
      loadingSpinner.style.display = "none";
    }
  };

  contactForms.forEach((form) => {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      const formData = new FormData(form);

      const requestBody = {};

      formData.forEach((value, field) => {
        requestBody[field] = value;
      });

      sendFormData(requestBody, form);
    });
  });
});
