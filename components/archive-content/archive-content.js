document.addEventListener("DOMContentLoaded", function () {
  const submitBtn = document.querySelector(
    ".filter_content_column .mf_default_btn"
  );
  const loadingSpinner = document.querySelector(".mf_loading_spinner");
  const contentContainer = document.querySelector(".filtered_content");

  const getSearchQuery = () => {
    const searchInput = document.querySelector(
      ".filter_content_column .searchform input"
    );
    const value = searchInput ? searchInput.value.trim() : "";
    return value !== "" ? `name=${encodeURIComponent(value)}` : null;
  };

  const getCheckedValuesQuery = (selector, key) => {
    const inputs = document.querySelectorAll(selector);
    const selectedValues = [...inputs]
      .filter((input) => input.checked)
      .map((input) => input.value);

    return selectedValues.length > 0
      ? `${key}=${selectedValues.join(",")}`
      : null;
  };

  const buildQueryString = () => {
    const queryParts = [
      getSearchQuery(),
      getCheckedValuesQuery(".filter_content_categories input", "categories"),
      getCheckedValuesQuery(".filter_content_brands input", "brands"),
      getCheckedValuesQuery(".filter_content_designers input", "designers"),
    ].filter(Boolean); // remove nulls

    return queryParts.length ? `&${queryParts.join("&")}` : "";
  };

  const getPosts = async () => {
    contentContainer.innerHTML = "";

    try {
      loadingSpinner.style.display = "flex";

      const queryString = buildQueryString();
      const baseUrl = `${current_user_data.site_url}/wp-json/content/v2/get-content/?post_type=product${queryString}`;
      console.log(baseUrl);

      const response = await fetch(baseUrl);
      const responseJson = await response.json();

      if (responseJson.total > 0) {
        contentContainer.innerHTML = responseJson.content_cards;
      } else {
        contentContainer.innerHTML = "<span>Nothing found.</span>";
      }
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
