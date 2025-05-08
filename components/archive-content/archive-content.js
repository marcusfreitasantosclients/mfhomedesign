document.addEventListener("DOMContentLoaded", function () {
  const submitBtn = document.querySelector(
    ".filter_content_column .mf_default_btn"
  );
  const loadingSpinner = document.querySelector(".mf_loading_spinner");
  const contentContainer = document.querySelector(".filtered_content");

  const getPosts = async () => {
    const searchForm = document.querySelector(
      ".filter_content_column .searchform input"
    ).value;

    contentContainer.innerHTML = "";

    try {
      loadingSpinner.style.display = "flex";

      const response = await fetch(
        `${current_user_data.site_url}/wp-json/content/v2/get-content/?name=${searchForm}`
      );

      const responseJson = await response.json();
      console.log(responseJson);
      contentContainer.innerHTML = responseJson.content_cards;
    } catch (e) {
      console.log(e);
    } finally {
      loadingSpinner.style.display = "none";
    }
  };

  submitBtn.addEventListener("click", function (e) {
    e.preventDefault();
    getPosts();
  });
});
