const emailReg =
  /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;

function registerStep1(e) {
  e.preventDefault();
  const checked = {
    emailVal: 1,
    pwd: 1,
    confirm_password: 1,
  };
  const inputRegis = checkFieldRequired(checked);
  // console.log({ inputRegis });
  const sign_in_step1 = document.querySelector("#sign_in_step1");
  const sign_in_step2 = document.querySelector("#sign_in_step2");
  // if()
  // const keys = Object.keys(inputRegis.data);
  const fieldsRequired1 = ["emailVal", "pwd", "confirm_password"];
  let checkPhase1 = fieldsRequired1.filter((c) => inputRegis.data[c]).length;
  clearPointingShow();
  if (fieldsRequired1.length > checkPhase1) {
    return;
  }
  if (!emailReg.test(inputRegis.data["emailVal"])) {
    showPointingShow("#email_format_error");
    return;
  }
  if (inputRegis.data["pwd"].length < 8) {
    showPointingShow("#password_more_8_length");
    return;
  }
  if (inputRegis.data["confirm_password"].length < 8) {
    showPointingShow("#password_confirm_more_8_length");
    return;
  }
  if (inputRegis.data["pwd"] !== inputRegis.data["confirm_password"]) {
    // password_new_and_password_confirm
    showPointingShow("#password_new_and_password_confirm");
    return;
  }
  buttonLoadingShow();

  fetch(domain + "wp-json/api/v1/user/check_user_exists", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      emailVal: inputRegis.data["emailVal"],
    }),
  })
    .then((data) => data.json())
    .then((d) => {
      // console.log({ d });
      buttonLoadingHide();
      if (d.message == "user_exists") {
        document.querySelector("#message_error_exists_user").style.opacity =
          "1";
      } else {
        sign_in_step1.style.display = "none";
        sign_in_step2.style.display = "block";
      }
    });
}
function buttonLoadingShow() {
  const bn = document.querySelectorAll(".button-normal");
  const bl = document.querySelectorAll(".button-loading");
  bn.forEach((b) => {
    b && (b.style.display = "none");
  });
  bl.forEach((b) => {
    b && (b.style.display = "block");
  });
  // bl.style.display = "block";
}
function buttonLoadingHide() {
  // const bn = document.querySelector(".button-normal");
  // const bl = document.querySelector(".button-loading");
  // bn.style.display = "block";
  // bl.style.display = "none";
  const bn = document.querySelectorAll(".button-normal");
  const bl = document.querySelectorAll(".button-loading");
  bn.forEach((b) => {
    b && (b.style.display = "block");
  });
  bl.forEach((b) => {
    b && (b.style.display = "none");
  });
}
function registerForm() {
  const inputRegis = checkFieldRequired();
  const sign_in_step2 = document.querySelector("#sign_in_step2");
  const sign_in_step3 = document.querySelector("#sign_in_step3");
  const userId = document.querySelector("#userId");

  console.log({ inputReg: inputRegis.data });
  // console.log({ keys });
  let fieldsRequireRegis = [
    "emailVal",
    "pwd",
    "confirm_password",
    "accept_email",
    "accept_pdpa",
    "other",
    "type_user",
    "phone_number",
    "date",
    "month",
    "year",
    "name",
    "lastname",
  ]; ///user/create

  if (userId && userId.value) {
    fieldsRequireRegis = [
      "accept_email",
      "accept_pdpa",
      "other",
      "type_user",
      "phone_number",
      "date",
      "month",
      "year",
      "name",
      "lastname",
    ];
    // createUser.userId = userId;
  }
  //   const inputRegis = checkFieldRequired([
  //     "emailVal",
  //     "pwd",
  //     "confirm_password",
  //   ]);

  let checkToRegister = fieldsRequireRegis.filter(
    (c) => inputRegis.data[c]
  ).length;
  clearPointingShow();
  if (checkToRegister === fieldsRequireRegis.length) {
    const date = inputRegis.data["date"];
    const month = inputRegis.data["month"];
    const year = inputRegis.data["year"];
    const date_class = new Date(`${year}-${month}-${date}`);
    if (date_class.getMonth() + 1 != month || date_class.getDate() != date) {
      alert("date invalid");
      showPointingShow("#date_format_error");

      return;
    } else {
      let createUser = {
        emailVal: inputRegis.data["emailVal"],

        accept_email: inputRegis.data["accept_email"],
        accept_pdpa: inputRegis.data["accept_pdpa"],
        other: inputRegis.data["other"],
        type_user: inputRegis.data["type_user"],
        phone_number: inputRegis.data["phone_number"],
        name: inputRegis.data["name"],
        lastname: inputRegis.data["lastname"],
        birthday: `${year}-${month}-${date}`,
      };
      if (userId && userId.value) {
        createUser.userId = userId.value;
      } else {
        createUser = {
          ...createUser,
          pwd: inputRegis.data["pwd"],
          confirm_password: inputRegis.data["confirm_password"],
        };
      }
      buttonLoadingShow();
      fetch(domain + "wp-json/api/v1/user/create", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(createUser),
      })
        .then((data) => data.json())
        .then((d) => {
          buttonLoadingHide();
          // if (d.message?.errors) {
          //   const { errors } = d.message;
          //   if (errors.existing_user_login) {
          //   }
          // } else {
          //   sign_in_step2.style.display = "none";
          //   sign_in_step3.style.display = "block";
          // }
          window.location = domain + "/wp-login.php?action=register";

          console.log({ d });
        })
        .catch((err) => {
          buttonLoadingHide();

          console.log({ err });
        });
    }
    // console.log({ date_class:  });
  }
}

function onDefault(text) {
  const optionCreate = document.createElement("option");
  optionCreate.value = "";
  optionCreate.innerHTML = text;
  return optionCreate;
}

function onLoadDate(dateDefault = null) {
  let dateDefault_ = null;
  if (dateDefault) dateDefault_ = new Date(dateDefault);
  // console.log({ dateDefault_ });
  const _date = document.querySelector("#date");
  const _month = document.querySelector("#month");
  const _year = document.querySelector("#year");
  _date.appendChild(onDefault("เลือกวันเกิด"));
  _month.appendChild(onDefault("เลือกเดือนเกิด"));
  _year.appendChild(onDefault("เลือกปีเกิด"));
  const format0 = (n) => (n > 9 ? n : "0" + n);
  for (let i = 1; i < 32; i++) {
    const optionCreate = document.createElement("option");
    const _valueDate = format0(i);
    optionCreate.value = _valueDate;
    optionCreate.innerHTML = _valueDate;
    if (dateDefault_) {
      const _dateF = format0(dateDefault_.getDate());
      if (_dateF == _valueDate) optionCreate.selected = true;
    }
    _date.appendChild(optionCreate);
  }

  [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ].forEach((month, indexMonth) => {
    const monthI = indexMonth + 1;
    const optionCreate = document.createElement("option");
    const _valueMonth = format0(monthI);
    optionCreate.value = _valueMonth;
    optionCreate.innerHTML = month;
    if (dateDefault_) {
      const _monthF = format0(dateDefault_.getMonth() + 1);
      if (_monthF == _valueMonth) optionCreate.selected = true;
    }
    _month.appendChild(optionCreate);
  });
  for (
    let i = new Date().getFullYear();
    i > new Date().getFullYear() - 150;
    i--
  ) {
    const optionCreate = document.createElement("option");
    optionCreate.value = i;
    optionCreate.innerHTML = i;
    if (dateDefault_) {
      const _yearF = format0(dateDefault_.getFullYear());
      if (_yearF == i) optionCreate.selected = true;
    }
    _year.appendChild(optionCreate);
  }
}

function clearPointingShow() {
  const pointingAlerts = document.querySelectorAll(".pointing-show");
  pointingAlerts.forEach((pointingAlert) => {
    pointingAlert.className = pointingAlert.className.replace(
      "pointing-show",
      "pointing-alert"
    );
  });
}

function showPointingShow(elementHash) {
  const element = document.querySelector(elementHash);
  if (element) {
    const _className = element.className.replace(
      "pointing-alert",
      "pointing-show"
    );
    document.querySelector(elementHash).className = _className;
  } else {
    console.log({ elementHash });
  }
}
checkFieldRequired;
function editProfileInfo(e) {
  e.preventDefault();
  const inputRegis = checkFieldRequired(undefined, ".edit-account-form");
  const userId = document.querySelector("#userId");
  const postId = document.querySelector("#postId");
  const fieldsRequireRegis = [
    "emailVal",
    "type_user",
    "phone_number",
    "date",
    "month",
    "year",
    "name",
    "lastname",
  ];

  clearPointingShow();
  // .className.replace("pointing-alert", "pointing-show");
  console.log({ data: inputRegis.data });

  let checkPhase1 = fieldsRequireRegis.filter((c) => inputRegis.data[c]).length;
  if (fieldsRequireRegis.length === checkPhase1) {
    const date = inputRegis.data["date"];
    const month = inputRegis.data["month"];
    const year = inputRegis.data["year"];
    const date_class = new Date(`${year}-${month}-${date}`);
    if (!emailReg.test(inputRegis.data["emailVal"])) {
      showPointingShow("#email_format_error");
      return;
    }
    if (inputRegis.data["phone_number"].length !== 10) {
      showPointingShow("#phone_number_10_alert");
      return;
    }
    if (date_class.getMonth() + 1 != month || date_class.getDate() != date) {
      showPointingShow("#date_format_error");
      return;
    } else {
      const createUser = {
        emailVal: inputRegis.data["emailVal"],
        userId: userId.value,
        postId: postId.value,
        type_user: inputRegis.data["type_user"],
        phone_number: inputRegis.data["phone_number"],
        name: inputRegis.data["name"],
        lastname: inputRegis.data["lastname"],
        birthday: `${year}-${month}-${date}`,
      };
      buttonLoadingShow();
      fetch(domain + "wp-json/api/v1/user/update", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(createUser),
      })
        .then((data) => data.json())
        .then((d) => {
          buttonLoadingHide();
        })
        .catch((err) => {
          buttonLoadingHide();

          console.log({ err });
        });
    }
    // console.log({ date_class:  });
  }
}

function newPasswordForm(e) {
  e.preventDefault();
  const inputRegis = checkFieldRequired(undefined, ".reset-password-form");

  console.log({ inputRegis: inputRegis, test: ".reset-password-form" });
  const userId = document.querySelector("#userId");
  console.log({ inputRegis: inputRegis.data, userId: userId.value });
  clearPointingShow();

  if (inputRegis.data["password_1"] === inputRegis.data["password_2"]) {
    const data = {
      oldPassword: inputRegis.data["password_old"],
      userId: userId.value,
      newPassword: inputRegis.data["password_1"],
    };
    fetch(domain + "wp-json/api/v1/user/change-password", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((data) => data.json())
      .then((d) => {
        buttonLoadingHide();
        if (d.message == "password_not_match_old") {
          showPointingShow("#password_not_match_old");
        }
      })
      .catch((err) => {
        buttonLoadingHide();

        console.log({ err });
      });
  } else {
    showPointingShow("#password_new_and_password_confirm");
  }
}

function onResetPasswordSubmit() {
  const inputRegis = checkFieldRequired();

  const btn_slide_reset_password = document.querySelector(
    "#btn-slide-reset-password"
  );
  const _rage_button_box = document.querySelector(".rage-button_box");

  const clearBtn = () => {
    btn_slide_reset_password.value = 0;
    _rage_button_box.style.left = 0;
    _rage_button_box.style.transform = "translate(0%)";
  };
  clearPointingShow();

  if (btn_slide_reset_password) {
    if (+btn_slide_reset_password.value !== 100) {
      clearBtn();
    }
    // console.log({ email: inputRegis.data });
    if (inputRegis.data?.emailVal) {
      const syntaxEmail = emailReg.test(inputRegis.data["emailVal"]);
      if (!syntaxEmail) {
        showPointingShow("#email_format_error");
        clearBtn();
        return;
      } else {
        const data = {
          emailVal: emailVal.value,
        };
        buttonLoadingShow();
        fetch(domain + "wp-json/api/v1/lost_password", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(data),
        })
          .then((data) => data.json())
          .then((d) => {
            buttonLoadingHide();
            if (d.message == "OK") {
              // showPointingShow("#password_not_match_old");
              document.querySelector("#lost_password_success").style.display =
                "block";
              document.querySelector("#lost_password_form").style.display =
                "none";
            }
          })
          .catch((err) => {
            buttonLoadingHide();

            console.log({ err });
          });
      }
    } else {
      clearBtn();
    }
  }
}
function onResetButtonInit() {
  const btn_slide_reset_password = document.querySelector(
    "#btn-slide-reset-password"
  );
  const _rage_button_box = document.querySelector(".rage-button_box");

  document.documentElement.classList.add("js");

  btn_slide_reset_password &&
    btn_slide_reset_password.addEventListener(
      "input",
      (e) => {
        _rage_button_box.style.left = +btn_slide_reset_password.value + "%";
        _rage_button_box.style.transform =
          "translate(-" + btn_slide_reset_password.value + "%)";
        // _W.style.setProperty("--val", +_R.value);
      },
      false
    );
}
function onResetKeyDown() {
  console.log({ donw: "asdasds" });
  const btn_slide_reset_password = document.querySelector(
    "#btn-slide-reset-password"
  );
  // const rage_button_box = document.querySelector(".rage-button_box");
}

function resetPassword() {
  // const password_1 = document.querySelector("");
  const inputReg = checkFieldRequired();
  const emailVal = document.querySelector("#emailVal");
  const filedChecked = ["password_1", "password_2"];
  const loopChecked = filedChecked.filter(
    (field) => inputReg.data[field]
  ).length;
  const everyFieldNotEmpty = filedChecked.length === loopChecked;
  clearPointingShow();
  if (everyFieldNotEmpty) {
    const password1More8Chart = inputReg.data["password_1"].length >= 8;
    if (!password1More8Chart) {
      showPointingShow("#password_more_8_length");
      return;
    }
    const password1AndPassword2Eq =
      inputReg.data["password_1"] === inputReg.data["password_2"];
    if (!password1AndPassword2Eq) {
      showPointingShow("#password_new_and_password_confirm");
      return;
    }
    buttonLoadingShow();
    const data = {
      emailVal: emailVal.value,
      password: inputReg.data["password_1"],
    };
    fetch(domain + "wp-json/api/v1/reset_password", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((data) => data.json())
      .then((d) => {
        buttonLoadingHide();
        if (d.message == "OK") {
          // showPointingShow("#password_not_match_old");
          document.querySelector("#reset_password_success").style.display =
            "block";
          document.querySelector("#reset_password_form").style.display = "none";
        }
      })
      .catch((err) => {
        buttonLoadingHide();

        console.log({ err });
      });
  }
}
