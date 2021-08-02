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
// const domain = "http://localhost/nippon/";

function saveData1() {
  const button = document.querySelector("#wp-pass-signup");
  const register = document.querySelector("#wp-register");
  const sign_in_step1 = document.querySelector("#sign_in_step1");
  const emailEle = document.querySelector("#emailVal");
  const name = document.querySelector("#name");
  const lastname = document.querySelector("#lastname");
  const password = document.querySelector("#pwd");
  const passwordConfirm = document.querySelector("#pwd_confirm");

  button.addEventListener("click", (e) => {
    e.preventDefault();

    if (password.value === passwordConfirm.value) {
      sign_in_step1.style.display = "none";
    }
  });
  register.addEventListener("click", (e) => {
    e.preventDefault();
    // alert("test");
    const passwordVal = password.value;
    const emailVal = emailEle.value;
    const nameVal = name.value;
    const lastNameVal = lastname.value;
    const data = {
      password: passwordVal,
      email: emailVal,
      first_name: nameVal,
      last_name: lastNameVal,
    };
    console.log({ data });
    // api / v1 / uer / create;
    fetch(domain + "wp-json/api/v1/user/create", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((data) => data.json())
      .then((d) => {
        // const fm = document.querySelector(".form-message");
        // fm.className = "form-message show";

        // fullname.value = "";
        // email.value = "";

        // contact.value = "";
        // career.value = "";
        // careerV.value = "";
        // email_t.value = "";
        console.log({ d });
      })
      .catch((err) => console.log({ err }));
  });
}

saveData1();
