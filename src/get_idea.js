function selectCateGetIdeaChanged(url, checkedP, url_default) {
  // console.log({ url, checkedP });
  const select_get_idea_all = document.querySelector("#select_get_idea_all");
  if (select_get_idea_all.value) {
    if (checkedP === 1) {
      window.location.href = url + "&user_type=" + select_get_idea_all.value;
    } else {
      window.location.href = url + "?user_type=" + select_get_idea_all.value;
    }
  } else {
    window.location.href = url;
  }
}
function selectMostViewOrDateOrder(url, checkedP, url_default, checkedT) {
  // console.log({ url, checkedP });
  const orderby_get_idea = document.querySelector("#orderby_get_idea");
  if (orderby_get_idea.value) {
    if (checkedP === 1) {
      window.location.href = url + "&order_by=" + orderby_get_idea.value;
    } else {
      window.location.href = url + "?order_by=" + orderby_get_idea.value;
    }
  } else {
    window.location.href = url;
  }
}
