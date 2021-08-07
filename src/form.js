jQuery(document).ready(function ($) {
  // $("#upload_form").on("submit", function (evt) {
  //   var form = $("evt.target"),
  //     fileElt = form.find("input#upload"),
  //     fileName = fileElt.val(),
  //     messages = form.find("iframe#messages").contents().find("body"),
  //     maxSize = 300000,
  //     fail = function (msg) {
  //       messages.append($("<P>").css("color", "red").text(msg));
  //       fileElt.focus();
  //     };

  //   if (fileName.length == 0) {
  //     fail("Please select a file.");
  //   } else if (!/\.(xls|xlsx)$/.test(fileName)) {
  //     fail("Only Excel files are permitted.");
  //   } else {
  //     var file = fileElt.get(0).files[0];
  //     if (file.size > maxSize) {
  //       fail(
  //         "The file is too large. The maximum size is " + maxSize + " bytes."
  //       );
  //     } else {
  //       return true;
  //     }
  //   }
  //   return false;
  // });
  $(".ui.form").form({
    fields: {
      log: "empty",
      pwd: "empty",
      email: "empty",
      emailVal: "empty",
      name: "empty",
      lastname: "empty",
      last_name: "empty",
      first_name: "empty",
      tel: "empty",
      resume_value: "empty",
      transcript_value: "empty",
      accept: "empty",

      // portfolio_link: "empty",
      pwd_confirm: "empty",
      accept: "empty",
    },
  });

  $(document).ready(function () {
    $(".ui.fluid.search.selection.dropdown").dropdown({
      clearable: true,
    });
  });
});

function uploadFile() {
  const resume_upload = document.querySelector("#resume_upload");
  const transcript_upload = document.querySelector("#transcript_upload");
  const cover_letter_upload = document.querySelector("#cover_letter_upload");
  const resume_value = document.querySelector("#resume_value");
  const transcript_value = document.querySelector("#transcript_value");
  const cover_letter_value = document.querySelector("#cover_letter_value");
  const icon_cancel = document.querySelector(".icon-cancel");
  const loading = document.querySelector("#loading");
  if (resume_upload && transcript_upload && cover_letter_upload) {
    icon_cancel.addEventListener("click", (e) => {
      document.querySelector(".popup-show").style.display = "none";
    });
    resume_upload.addEventListener("change", (e) => {
      e.preventDefault();
      loading.style.display = "flex";
      const form = new FormData();
      const file = resume_upload.files[0];
      form.append("upfile", file);
      const url = domain + "wp-json/api/v1/upload_file";

      fetch(url, {
        method: "POST",
        body: form,
      })
        .then((response) => response.json())
        .then((d) => {
          console.log({ d });
          loading.style.display = "none";

          document.querySelector(".resume_value_uploaded").style.display =
            "block";
          resume_value.value = d.id;
        });
    });
    transcript_upload.addEventListener("change", (e) => {
      e.preventDefault();
      loading.style.display = "flex";

      const form = new FormData();
      const file = transcript_upload.files[0];
      form.append("upfile", file);
      const url = domain + "wp-json/api/v1/upload_file";

      fetch(url, {
        method: "POST",
        body: form,
      })
        .then((response) => response.json())
        .then((d) => {
          console.log({ d });
          loading.style.display = "none";

          document.querySelector(".transcript_value_uploaded").style.display =
            "block";
          transcript_value.value = d.id;
        });
    });
    cover_letter_upload.addEventListener("change", (e) => {
      e.preventDefault();
      const form = new FormData();
      const file = cover_letter_upload.files[0];
      form.append("upfile", file);
      const url = domain + "wp-json/api/v1/upload_file";
      loading.style.display = "flex";

      fetch(url, {
        method: "POST",
        body: form,
      })
        .then((response) => response.json())
        .then((d) => {
          // console.log({ d });
          loading.style.display = "none";

          document.querySelector(".cover_letter_uploaded").style.display =
            "block";

          cover_letter_value.value = d.id;
          console.log({ cover_letter_value });
        });
    });
  }
}

function saveData1() {
  const button = document.querySelector("#wp-pass-signup");
  const register = document.querySelector("#wp-register");
  const sign_in_step1 = document.querySelector("#sign_in_step1");
  const emailEle = document.querySelector("#emailVal");
  const name = document.querySelector("#name");
  const lastname = document.querySelector("#lastname");
  const password = document.querySelector("#pwd");
  const passwordConfirm = document.querySelector("#pwd_confirm");

  if (button)
    button.addEventListener("click", (e) => {
      if (emailEle.value && password.value) {
        e.preventDefault();
        if (password.value === passwordConfirm.value) {
          sign_in_step1.style.display = "none";
        }
      }
    });
  if (register)
    register.addEventListener("click", (e) => {
      // alert("test");
      const passwordVal = password.value;
      const emailVal = emailEle.value;
      const nameVal = name.value;
      const lastNameVal = lastname.value;
      if (nameVal && lastNameVal) {
        e.preventDefault();

        const data = {
          password: passwordVal,
          email: emailVal,
          first_name: nameVal,
          last_name: lastNameVal,
        };

        // fetch(domain + "wp-json/api/v1/user/create", {
        //   method: "POST",
        //   headers: {
        //     "Content-Type": "application/json",
        //   },
        //   body: JSON.stringify(data),
        // })
        //   .then((data) => data.json())
        //   .then((d) => {
        //     // const fm = document.querySelector(".form-message");
        //     // fm.className = "form-message show";

        //     // fullname.value = "";
        //     // email.value = "";

        //     // contact.value = "";
        //     // career.value = "";
        //     // careerV.value = "";
        //     // email_t.value = "";
        //     console.log({ d });
        //   })
        //   .catch((err) => console.log({ err }));
      }
    });
}
function IsNumber() {
  const isNumber = document.querySelector(".isNumber");
  isNumber &&
    isNumber.addEventListener("keypress", (event) => {
      if (!/[0-9]/.test(event.key)) {
        event.preventDefault();
      }
    });
}
function validateEmail(email) {
  const re =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}
function saveCareer() {
  const firstName = document.querySelector("#first_name");
  const career_name = document.querySelector("#career_name");
  const lastName = document.querySelector("#last_name");
  const email = document.querySelector("#emailVal");
  const tel = document.querySelector("#tel");
  const portfolio_link = document.querySelector("#portfolio_link");
  const career_send = document.querySelector("#career_send");
  const resume_value = document.querySelector("#resume_value");
  const transcript_value = document.querySelector("#transcript_value");
  const cover_letter_value = document.querySelector("#cover_letter_value");

  if (career_send)
    career_send.addEventListener("click", (e) => {
      e.preventDefault();
      const data = {
        first_name: firstName.value,
        last_name: lastName.value,
        email: email.value,
        tel: tel.value,
        portfolio_link: portfolio_link.value,
        resume_cv: resume_value.value,
        transcript: transcript_value.value,
        cover_letter: cover_letter_value.value,
        career_name: career_name.value,
      };
      const valuesData = Object.keys(data);

      const required = {
        first_name: true,
        last_name: true,
        email: true,
        tel: true,
        resume_cv: true,
        transcript: true,
        portfolio_link: false,
        cover_letter: false,
        career_name: true,
      };
      const checkAllField = () => {
        const Dfilter = valuesData.reduce((all, v) => {
          if (required[v] === true && data[v]) all += 1;
          if (required[v] === false) all += 1;
          return all;
        }, 0);

        return Dfilter === valuesData.length;
      };

      const listInputs = document.querySelectorAll(".field.required");
      const _listInp = Array.from(listInputs);
      _listInp.map((i, index) => {
        if (i.children[1].children.length) {
          if (!i.children[1].children[0].value) {
            i.className = "field required error";
          } else {
            i.className = "field required";
          }
        } else {
          if (!i.children[1].value) {
            i.className = "field required error";
          } else {
            i.className = "field required";
          }
        }
      });
      const accept = document.querySelector("#accept").checked;
      if (!accept)
        document.querySelector("#accept_field").className = "field error";
      console.log({ dd: validateEmail(email.value) });
      if (!validateEmail(email.value)) {
        _listInp[2].className = "field required error";
      } else {
        _listInp[2].className = "field required";
      }
      if (checkAllField() && accept) {
        fetch(domain + "wp-json/api/v1/career/save", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(data),
        })
          .then((data) => data.json())
          .then((d) => {
            console.log({ d });
            document.querySelector(".popup-show").style.display = "flex";

            firstName.value = "";
            lastName.value = "";
            email.value = "";
            tel.value = "";
            portfolio_link.value = "";
            resume_value.value = "";
            transcript_value.value = "";
            cover_letter_value.value = "";
            document.querySelector(".resume_value_uploaded").style.display =
              "none";
            document.querySelector(".transcript_value_uploaded").style.display =
              "none";
            document.querySelector(".cover_letter_uploaded").style.display =
              "none";
          })
          .catch((err) => console.log({ err }));
      }
    });
}

function calculateInternalRoomStep1() {
  const step_1_value_a = document.querySelector("#step_1_value_a");
  const step_1_value_b = document.querySelector("#step_1_value_b");
  const step_1_value_c = document.querySelector("#step_1_value_c");
  const step_1_result = document.querySelector("#step_1_result");

  // .addEventListener("")
  [step_1_value_a, step_1_value_b, step_1_value_c].forEach((element) => {
    element &&
      element.addEventListener("keyup", (e) => {
        const step_1_value_aV = parseInt(step_1_value_a.value) || 0;
        const step_1_value_bV = parseInt(step_1_value_b.value) || 0;
        const step_1_value_cV = parseInt(step_1_value_c.value) || 0;
        const sum = 2 * (step_1_value_aV + step_1_value_bV) * step_1_value_cV;
        step_1_result.innerHTML = sum;
      });
  });
}
function calculateInternalRoomStep2() {
  const step_2_value_a = document.querySelector("#step_2_value_a");
  const step_2_value_b = document.querySelector("#step_2_value_b");
  const step_2_value_c = document.querySelector("#step_2_value_c");
  const step_2_result = document.querySelector("#step_2_result");

  // .addEventListener("")
  [step_2_value_a, step_2_value_b, step_2_value_c].forEach((element) => {
    element &&
      element.addEventListener("keyup", (e) => {
        const step_2_value_aV = parseInt(step_2_value_a.value) || 0;
        const step_2_value_bV = parseInt(step_2_value_b.value) || 0;
        const step_2_value_cV = parseInt(step_2_value_c.value) || 1;
        const sum = step_2_value_aV * step_2_value_bV * step_2_value_cV;
        console.log({ step_2_value_cV });
        step_2_result.innerHTML = sum;
      });
  });
}
function calculateInternalRoomStep3() {
  const step_3_value_a = document.querySelector("#step_3_value_a");
  const step_3_value_b = document.querySelector("#step_3_value_b");
  const step_3_value_c = document.querySelector("#step_3_value_c");
  const step_3_result = document.querySelector("#step_3_result");

  // .addEventListener("")
  [step_3_value_a, step_3_value_b, step_3_value_c].forEach((element) => {
    element &&
      element.addEventListener("keyup", (e) => {
        const step_3_value_aV = parseInt(step_3_value_a.value) || 0;
        const step_3_value_bV = parseInt(step_3_value_b.value) || 0;
        const step_3_value_cV = parseInt(step_3_value_c.value) || 1;
        const sum = step_3_value_aV * step_3_value_bV * step_3_value_cV;
        console.log({ step_3_value_cV });
        step_3_result.innerHTML = sum;
      });
  });
}
function calculateInternalRoomStep4() {
  const step_4_value_a = document.querySelector("#step_4_value_a");
  const step_4_value_b = document.querySelector("#step_4_value_b");

  const step_4_result = document.querySelector("#step_4_result");

  // .addEventListener("")
  [step_4_value_a, step_4_value_b].forEach((element) => {
    element &&
      element.addEventListener("keyup", (e) => {
        const step_4_value_aV = parseInt(step_4_value_a.value) || 0;
        const step_4_value_bV = parseInt(step_4_value_b.value) || 0;

        const sum = step_4_value_aV * step_4_value_bV;

        step_4_result.innerHTML = sum;
      });
  });
}
function addPlusButton() {
  const plus_button = document.querySelector(".plus-button");
  const external_big_div = document.querySelector(".external-big-div");
  let countElement = 1;
  const _inputDefault1 = document.querySelector("#external_input_1_1");
  const _inputDefault2 = document.querySelector("#external_input_2_1");
  const _resultDefault = document.querySelector("#result_external_1");
  [_inputDefault1, _inputDefault2].forEach((element) => {
    element &&
      element.addEventListener("keyup", (e) => {
        const _input1Val = parseInt(_inputDefault1.value) || 0;
        const _input2Val = parseInt(_inputDefault2.value) || 0;
        _resultDefault.innerHTML = _input1Val * _input2Val;
      });
  });
  const _external_other_value_a = document.querySelector(
    "#external_other_value_a"
  );
  const _external_other_value_b = document.querySelector(
    "#external_other_value_b"
  );
  const _external_other_result = document.querySelector(
    "#external_other_result"
  );
  [_external_other_value_a, _external_other_value_b].forEach((element) => {
    element &&
      element.addEventListener("keyup", (e) => {
        const _input1Val = parseInt(_external_other_value_a.value) || 0;
        const _input2Val = parseInt(_external_other_value_b.value) || 0;
        _external_other_result.innerHTML = _input1Val * _input2Val;
      });
  });
  if (plus_button) {
    plus_button.addEventListener("click", (e) => {
      const addExternal = document.createElement("div");
      addExternal.className = "external-div";
      const _countE = ++countElement;
      const inputId = "external_input_1_" + _countE;
      const input2Id = "external_input_2_" + _countE;
      const result = "result_external_" + _countE;
      addExternal.innerHTML = `
      
      <div>
            <h2   class="ui header primary-text">
            ผนังด้านที่ ${_countE}
            </h2>
            <div class="ui three columns grid">
                <div class="column cal-div">
                        <h5 for="A1"> ความกว้างของผนัง (เมตร)</h5>
                        <input type="text" id="${inputId}">
                </div>
                <div class="column  cal-div">
                        <h5 for="A1">ความสูงของผนัง (เมตร)</h5>
                        <input type="text" id="${input2Id}">
                </div>
                <div class="column ">
                    <div class="cal-result-step4">
                        <h5>พื้นที่ทาฝ้า</h5> 
                        <h1 id="${result}">0</h1>   
                        <h5>ตารางเมตร</h5>   
                    </div>
                </div>
            </div>
      
      </div>
      `;

      external_big_div.appendChild(addExternal);
      const _input1 = document.querySelector("#" + inputId);
      const _input2 = document.querySelector("#" + input2Id);
      const _result = document.querySelector("#" + result);
      [_input1, _input2].forEach((element) => {
        element &&
          element.addEventListener("keyup", (e) => {
            const _input1Val = parseInt(_input1.value) || 0;
            const _input2Val = parseInt(_input2.value) || 0;
            _result.innerHTML = _input1Val * _input2Val;
          });
      });
    });
  }
}
function summaryExternalCal() {
  const submit_all_calculate_external = document.querySelector(
    "#submit_all_calculate_external"
  );
  const external_big_div = document.querySelector(".external-big-div");
  if (submit_all_calculate_external) {
    submit_all_calculate_external.addEventListener("click", (e) => {
      const children = external_big_div.children;
      const _childrenArrays = Array.from(children);
      // _c.forEach((c) => {
      //   console.log({ c: c.innerHTML });
      // });
      let allResult = 0;
      for (let i = 0; i < _childrenArrays.length; i++) {
        const resultId = i + 1;
        const result = document.querySelector("#result_external_" + resultId);
        console.log({ kk: result.innerHTML });
        allResult += parseInt(result.innerHTML);
      }
      const external_other_result = document.querySelector(
        "#external_other_result"
      );
      allResult += +external_other_result.innerHTML;
      document.querySelector("#summary_number_2").innerHTML = allResult;
      document.querySelector("#summary_number_1").innerHTML = allResult;
      // console.log({ _c });
    });
  }
}
function calculateInternalRoomSummary() {
  const submit_all_calculate = document.querySelector("#submit_all_calculate");
  const reset_calculate = document.querySelector("#reset_calculate");
  const step_1_result = document.querySelector("#step_1_result");
  const step_2_result = document.querySelector("#step_2_result");
  const step_3_result = document.querySelector("#step_3_result");
  const step_4_result = document.querySelector("#step_4_result");
  const summary_number_1 = document.querySelector("#summary_number_1");
  const summary_number_2 = document.querySelector("#summary_number_2");

  const step_1_value_a = document.querySelector("#step_1_value_a");
  const step_1_value_b = document.querySelector("#step_1_value_b");
  const step_1_value_c = document.querySelector("#step_1_value_c");

  const step_2_value_a = document.querySelector("#step_2_value_a");
  const step_2_value_b = document.querySelector("#step_2_value_b");
  const step_2_value_c = document.querySelector("#step_2_value_c");

  const step_3_value_a = document.querySelector("#step_3_value_a");
  const step_3_value_b = document.querySelector("#step_3_value_b");
  const step_3_value_c = document.querySelector("#step_3_value_c");

  const step_4_value_a = document.querySelector("#step_4_value_a");
  const step_4_value_b = document.querySelector("#step_4_value_b");

  [submit_all_calculate, reset_calculate].forEach((element) => {
    if (element) {
      submit_all_calculate.addEventListener("click", () => {
        document.querySelector(".summary-calculate").style.display = "block";

        const step_1_result_value = parseInt(step_1_result.innerHTML) || 0;
        const step_2_result_value = parseInt(step_2_result.innerHTML) || 0;
        const step_3_result_value = parseInt(step_3_result.innerHTML) || 0;
        const step_4_result_value = parseInt(step_4_result.innerHTML) || 0;
        const summary =
          step_1_result_value -
          step_2_result_value -
          step_3_result_value -
          step_4_result_value;

        summary_number_1.innerHTML = summary;
        summary_number_2.innerHTML = summary;
      });
      reset_calculate.addEventListener("click", () => {
        step_1_result.innerHTML = 0;
        step_2_result.innerHTML = 0;
        step_3_result.innerHTML = 0;
        step_4_result.innerHTML = 0;
        summary_number_1.innerHTML = 0;
        summary_number_2.innerHTML = 0;
        step_1_value_a.value = 0;
        step_1_value_b.value = 0;
        step_1_value_c.value = 0;
        step_2_value_a.value = 0;
        step_2_value_b.value = 0;
        step_2_value_c.value = 0;
        step_3_value_a.value = 0;
        step_3_value_b.value = 0;
        step_3_value_c.value = 0;
        step_4_value_a.value = 0;
        step_4_value_b.value = 0;

        document.querySelector(".summary-calculate").style.display = "none";
      });
    }
  });
  //
}

function showMoreCalPageInternal() {
  const show_more_cal = document.querySelector("#show-more-cal .title");
  let clicked = false;
  if (show_more_cal) {
    show_more_cal.addEventListener("click", () => {
      const title = document.querySelector("#show-more-cal .title");
      const content = document.querySelector("#show-more-cal .content");

      if (clicked === false) {
        title.className = "title active";
        content.className = "content active";
        clicked = true;
      } else {
        title.className = "title ";
        content.className = "content ";
        clicked = false;
      }
    });
  }
}
