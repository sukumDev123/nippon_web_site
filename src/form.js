jQuery(document).ready(function ($) {
  //   $.fn.api.settings.api = {
  //     test: "google.co",
  //   };

  //   console.log({ $: $(".ui.form") });

  $(".ui.form").form({
    fields: {
      log: "empty",
      pwd: "empty",
      email: "empty",
    },
  });
  $("#standard_calendar").calendar();
  //   $(".button").button("loading");
});
const togglePassword = document.querySelector("#togglePassword");
// const password = document.querySelector("#pwd");
// console.log({ togglePassword });
togglePassword.addEventListener("click", (e) => alert("asdsd"));
