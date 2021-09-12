function split_paged_show() {
  const key = "paged_show";
  const re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
  const uri_split_paged_show = window.location.href.replace(re, "?");
  return uri_split_paged_show;
}

function mediaSelected() {
  const media_cat = document.querySelector("#media_cat");
  //   const uri = window.location.href.substring(
  //     0,
  //     window.location.href.indexOf("?")
  //   );
  //   const uri_split = window.location.href.split(/[?&]/);

  //   console.log({ dd: window.location.href.replace(re, "") });
  //   testURL.substring(0, testURL.indexOf('?'));
  //   if (media_cat.value) {
  const newUrl = updateQueryStringParameter(
    split_paged_show(),
    "media_cat",
    media_cat.value
  );
  window.location.href = newUrl;
  //   console.log({ newUrl });
}

function initYear(year) {
  const year_cat = document.querySelector("#year_cat");
  const yearNow = new Date().getFullYear();
  console.log({ year });
  if (year_cat)
    for (let i = yearNow; i > yearNow - 10; i--) {
      const option = document.createElement("option");
      option.value = i;
      option.innerHTML = i;
      if (i == year) option.selected = true;
      year_cat.appendChild(option);
    }
}
function onYearChange() {
  const year_cat = document.querySelector("#year_cat");

  const newUrl = updateQueryStringParameter(
    split_paged_show(),
    "year_cat",
    year_cat.value
  );
  console.log({ newUrl, ll: split_paged_show() });
  window.location.href = newUrl;
}
function updateQueryStringParameter(uri, key, value) {
  const re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
  //   const re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
  const separator = uri.indexOf("?") !== -1 ? "&" : "?";
  if (uri.match(re)) {
    return uri.replace(re, "$1" + key + "=" + value + "$2");
  } else {
    return uri + separator + key + "=" + value;
  }
}
