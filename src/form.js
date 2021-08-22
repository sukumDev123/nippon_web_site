// const { isNumber } = require("lodash");

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
      // console.log({ resume_upload:  });
      const resId = document.querySelector(".resume_value_uploaded");
      if (!resume_upload?.files[0]?.name) return;

      const typeFile = resume_upload.files[0].name.split(".");
      if (typeFile[1] !== "pdf") {
        loading.style.display = "none";
        resId.children[0].style.display = "none";
        resId.children[1].style.display = "none";
        resId.children[2].style.display = "block";
        return;
      }
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
          resId.children[2].style.display = "none";

          if (d.message) {
            resId.children[1].style.display = "block";
            resId.children[0].style.display = "none";
            resume_value.value = null;
          } else {
            resId.children[0].style.display = "block";
            resId.children[1].style.display = "none";

            resume_value.value = d.id;
          }
          // .style.display =
          //   "block";
        });
    });
    transcript_upload.addEventListener("change", (e) => {
      e.preventDefault();
      loading.style.display = "flex";
      const t = document.querySelector(".transcript_value_uploaded");
      if (!transcript_upload?.files[0]?.name) return;

      const typeFile = transcript_upload.files[0].name.split(".");

      if (typeFile[1] !== "pdf") {
        loading.style.display = "none";
        t.children[0].style.display = "none";
        t.children[1].style.display = "none";
        t.children[2].style.display = "block";
        return;
      }
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
          t.children[2].style.display = "none";

          if (d.message) {
            t.children[1].style.display = "block";
            t.children[0].style.display = "none";
            transcript_value.value = null;
          } else {
            t.children[0].style.display = "block";
            t.children[1].style.display = "none";
            transcript_value.value = d.id;
          }
        });
    });
    cover_letter_upload.addEventListener("change", (e) => {
      e.preventDefault();
      const cl = document.querySelector(".cover_letter_uploaded");
      if (!cover_letter_upload?.files[0]?.name) return;
      const typeFile = cover_letter_upload.files[0].name.split(".");
      if (typeFile[1] !== "pdf") {
        loading.style.display = "none";
        cl.children[0].style.display = "none";
        cl.children[1].style.display = "none";
        cl.children[2].style.display = "block";
        return;
      }
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
          cl.children[2].style.display = "none";

          if (d.message) {
            cl.children[1].style.display = "block";
            cl.children[0].style.display = "none";
            cover_letter_value.value = null;
          } else {
            cl.children[0].style.display = "block";
            cl.children[1].style.display = "none";
            cover_letter_value.value = d.id;
          }
          console.log({ cover_letter_value });
        });
    });
  }
}

// function saveData1() {
//   const button = document.querySelector("#wp-pass-signup");
//   const register = document.querySelector("#wp-register");
//   const sign_in_step1 = document.querySelector("#sign_in_step1");
//   const emailEle = document.querySelector("#emailVal");
//   const name = document.querySelector("#name");
//   const lastname = document.querySelector("#lastname");
//   const password = document.querySelector("#pwd");
//   const passwordConfirm = document.querySelector("#pwd_confirm");

//   if (button)
//     button.addEventListener("click", (e) => {
//       if (emailEle.value && password.value) {
//         e.preventDefault();
//         if (password.value === passwordConfirm.value) {
//           sign_in_step1.style.display = "none";
//         }
//       }
//     });
//   if (register)
//     register.addEventListener("click", (e) => {
//       // alert("test");
//       const passwordVal = password.value;
//       const emailVal = emailEle.value;
//       const nameVal = name.value;
//       const lastNameVal = lastname.value;
//       if (nameVal && lastNameVal) {
//         e.preventDefault();

//         const data = {
//           password: passwordVal,
//           email: emailVal,
//           first_name: nameVal,
//           last_name: lastNameVal,
//         };

//         // fetch(domain + "wp-json/api/v1/user/create", {
//         //   method: "POST",
//         //   headers: {
//         //     "Content-Type": "application/json",
//         //   },
//         //   body: JSON.stringify(data),
//         // })
//         //   .then((data) => data.json())
//         //   .then((d) => {
//         //     // const fm = document.querySelector(".form-message");
//         //     // fm.className = "form-message show";

//         //     // fullname.value = "";
//         //     // email.value = "";

//         //     // contact.value = "";
//         //     // career.value = "";
//         //     // careerV.value = "";
//         //     // email_t.value = "";
//         //     console.log({ d });
//         //   })
//         //   .catch((err) => console.log({ err }));
//       }
//     });
// }

function faqOnHeaderClicked() {
  const card_faqs = document.querySelectorAll(".card-faq");
  // .card-faq-header
  const card_faqs_array = Array.from(card_faqs);
  card_faqs_array.forEach((card) => {
    console.log({ card });
    if (card.children[0])
      card.children[0].addEventListener("click", (e) => {
        //  = "";
        if (card.className.match(/active/)) {
          card.className = "card-faq";
        } else {
          card.className = "card-faq active";
        }
      });
  });
}

function IsNumber() {
  const isNumber = document.querySelectorAll(".isNumber");
  Array.from(isNumber).forEach((isN) => {
    isN &&
      isN.addEventListener("keypress", (event) => {
        // if (+event.key < 0) event.preventDefault();
        if (!/[0-9]/.test(event.key)) {
          event.preventDefault();
        }
      });
  });
}
function isPhone() {
  const isNumber = document.querySelectorAll(".isPhone");
  Array.from(isNumber).forEach((isN) => {
    isN &&
      isN.addEventListener("keypress", (event) => {
        if (!/[0-9]/.test(event.key)) {
          event.preventDefault();
        }
        // console.log({ d: isN.value });
        if (isN.value.length >= 10) {
          event.preventDefault();
        }
      });
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
        console.log({ v: step_1_value_a.value });
        const step_1_value_aV = +step_1_value_a.value;
        const step_1_value_bV = +step_1_value_b.value;
        const step_1_value_cV = +step_1_value_c.value;
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
        const step_2_value_aV = +step_2_value_a.value;
        const step_2_value_bV = +step_2_value_b.value;
        const step_2_value_cV = !step_2_value_c.value
          ? 1
          : +step_2_value_c.value;
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
        const step_3_value_aV = +step_3_value_a.value;
        const step_3_value_bV = +step_3_value_b.value;
        const step_3_value_cV = !step_3_value_c.value
          ? 1
          : +step_3_value_c.value;
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
        const step_4_value_aV = +step_4_value_a.value;
        const step_4_value_bV = +step_4_value_b.value;

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
                        <input class="isNumber" type="text" id="${inputId}">
                </div>
                <div class="column  cal-div">
                        <h5 for="A1">ความสูงของผนัง (เมตร)</h5>
                        <input class="isNumber" type="text" id="${input2Id}">
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
      setTimeout(() => {
        addExternal.scrollIntoView({
          behavior: "smooth",
          block: "center",
        });
        IsNumber();
      }, 100);
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
  const result_top_1 = document.querySelector("#result-top-1");
  const result_top_2 = document.querySelector("#result-top-2");
  const summary_calculate = document.querySelector(".summary-calculate");
  const result_bottom_1 = document.querySelector("#result-bottom-1");
  const result_bottom_2 = document.querySelector("#result-bottom-2");
  // const external_big_div = document.querySelector(".external-big-div");

  const reset_calculate_external = document.querySelector(
    "#reset_calculate_external"
  );
  if (submit_all_calculate_external && reset_calculate_external) {
    submit_all_calculate_external.addEventListener("click", (e) => {
      const children = external_big_div.children;
      const _childrenArrays = Array.from(children);
      summary_calculate.style.display = "block";
      // _c.forEach((c) => {
      //   console.log({ c: c.innerHTML });
      // });
      let allResult = 0;
      for (let i = 0; i < _childrenArrays.length; i++) {
        const resultId = i + 1;
        const result = document.querySelector("#result_external_" + resultId);
        console.log({ kk: +result?.innerHTML, resultId });
        allResult += +result?.innerHTML || 0;
      }
      const external_other_result = document.querySelector(
        "#external_other_result"
      );

      allResult += +external_other_result.innerHTML;

      result_top_1.innerHTML = (+allResult / 30).toFixed(2);
      result_top_2.innerHTML = (+allResult / 15).toFixed(2);
      result_bottom_1.innerHTML = (+allResult / 30).toFixed(2);
      result_bottom_2.innerHTML = (+allResult / 15).toFixed(2);
      document.querySelector("#summary_number_2").innerHTML = allResult;
      document.querySelector("#summary_number_1").innerHTML = allResult;
      setTimeout(() => {
        document.querySelector(".submit-calculate").scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }, 100);
    });
    reset_calculate_external.addEventListener("click", (e) => {
      const children = external_big_div.children;
      const _childrenArrays = Array.from(children);

      const external_input_1_1 = document.querySelector("#external_input_1_1");
      const external_input_2_1 = document.querySelector("#external_input_2_1");
      const result_external_1 = document.querySelector("#result_external_1");
      const summary_number_1 = document.querySelector("#summary_number_1");
      const summary_calculate = document.querySelector(".summary-calculate");
      external_input_1_1.value = "";
      external_input_2_1.value = "";
      result_external_1.innerHTML = 0;
      summary_number_1.innerHTML = 0;
      summary_calculate.style.display = "none";
      for (let i = _childrenArrays.length - 1; i >= 1; i--) {
        if (_childrenArrays[i])
          external_big_div.removeChild(_childrenArrays[i]);
      }
      setTimeout(() => {
        document.querySelector(".page-calculate").scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }, 100);
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

  const result_top_1 = document.querySelector("#result-top-1");
  const result_top_2 = document.querySelector("#result-top-2");
  const summary_calculate = document.querySelector(".summary-calculate");

  const result_bottom_1 = document.querySelector("#result-bottom-1");
  const result_bottom_2 = document.querySelector("#result-bottom-2");

  [submit_all_calculate, reset_calculate].forEach((element) => {
    if (element) {
      submit_all_calculate.addEventListener("click", () => {
        summary_calculate.style.display = "block";
        const step_1_result_value = +step_1_result.innerHTML;
        const step_2_result_value = +step_2_result.innerHTML;
        const step_3_result_value = +step_3_result.innerHTML;
        const step_4_result_value = +step_4_result.innerHTML;
        const summary =
          step_1_result_value -
          step_2_result_value -
          step_3_result_value -
          step_4_result_value;

        summary_number_1.innerHTML = summary;
        summary_number_2.innerHTML = summary;
        result_top_1.innerHTML = (summary / 30).toFixed(2);
        result_top_2.innerHTML = (summary / 15).toFixed(2);
        result_bottom_1.innerHTML = (summary / 30).toFixed(2);
        result_bottom_2.innerHTML = (summary / 15).toFixed(2);
        setTimeout(() => {
          document.querySelector(".submit-calculate").scrollIntoView({
            behavior: "smooth",
            block: "start",
          });
        }, 100);
      });
      reset_calculate.addEventListener("click", () => {
        summary_calculate.style.display = "none";

        step_1_result.innerHTML = "";
        step_2_result.innerHTML = "";
        step_3_result.innerHTML = "";
        step_4_result.innerHTML = "";
        summary_number_1.innerHTML = "";
        summary_number_2.innerHTML = "";
        step_1_value_a.value = "";
        step_1_value_b.value = "";
        step_1_value_c.value = "";
        step_2_value_a.value = "";
        step_2_value_b.value = "";
        step_2_value_c.value = "";
        step_3_value_a.value = "";
        step_3_value_b.value = "";
        step_3_value_c.value = "";
        step_4_value_a.value = "";
        step_4_value_b.value = "";

        document.querySelector(".summary-calculate").style.display = "none";
        setTimeout(() => {
          document.querySelector(".page-calculate").scrollIntoView({
            behavior: "smooth",
            block: "start",
          });
        }, 100);
      });
    }
  });
  //
}

function showMoreCalPageInternal() {
  const show_more_cal = document.querySelector("#show-more-cal");
  let clicked = false;
  if (show_more_cal) {
    show_more_cal.addEventListener("click", () => {
      // const title = document.querySelector("#show-more-cal .title");
      // const content = document.querySelector("#show-more-cal .content");

      // if (clicked === false) {
      //   title.className = "title active";
      //   content.className = "content active";
      //   clicked = true;
      // } else {
      //   title.className = "title ";
      //   content.className = "content ";
      //   clicked = false;
      // }

      setTimeout(() => {
        document.querySelector("#show-more-cal").scrollIntoView({
          behavior: "smooth",
          block: "center",
        });
      }, 100);
    });
  }
}

function saveFavorites(user_id, post_id, type, name_class_fav) {
  const data = {
    user_id: user_id.toString(),
    post_id: post_id.toString(),
    type,
  };

  const url = domain + "wp-json/api/v1/favorites";
  const blogs_fav = document.querySelector("." + name_class_fav);

  loadingOn();
  fetch(url, {
    method: "POST",
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((d) => {
      // console.log({ d });
      if (d.doing === "CREATED") {
        blogs_fav.children[0].className = "favorites-button hide";
        blogs_fav.children[1].className = "favorites-button-active show";
      } else {
        blogs_fav.children[0].className = "favorites-button show";
        blogs_fav.children[1].className = "favorites-button-active hide";
      }
      loadingOff();
    });
}

function saveFavoritesOnePost(user_id, post_id, type, ele1, ele2) {
  const data = {
    user_id: user_id.toString(),
    post_id: post_id.toString(),
    type,
  };

  const url = domain + "wp-json/api/v1/favorites";

  const _ele1 = document.querySelector("." + ele1);
  const _ele2 = document.querySelector("." + ele2);
  loadingOn();
  fetch(url, {
    method: "POST",
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((d) => {
      // console.log({ d });
      if (d.doing === "CREATED") {
        _ele1.className = "save_favorites_black hide";
        _ele2.className = "saved_favorites ";
      } else {
        _ele1.className = "save_favorites_black ";
        _ele2.className = "saved_favorites  hide";
      }
      loadingOff();
    });
}

function productFavorites(user_id, post_id, type, index = null) {
  const data = {
    user_id: user_id.toString(),
    post_id: post_id.toString(),
    type,
  };

  const url = domain + "wp-json/api/v1/favorites";
  const fav = document.querySelectorAll(`.heart`);

  loadingOn();
  fetch(url, {
    method: "POST",
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((d) => {
      // console.log({ d });
      if (index === null) {
        if (d.doing === "CREATED") {
          fav[0].className = "heart outline icon hide_show";
          fav[1].className = "heart icon show";
        } else {
          fav[0].className = "heart outline icon show";
          fav[1].className = "heart icon hide_show";
        }
      } else {
        if (d.doing === "CREATED") {
          fav[index].className = "heart outline icon hide_show";
          fav[index + 1].className = "heart icon show";
        } else {
          fav[index].className = "heart outline icon show";
          fav[index + 1].className = "heart icon hide_show";
        }
      }

      loadingOff();
    });
}
// function productFavorites(user_id, post_id, type, index = null) {
//   const data = {
//     user_id: user_id.toString(),
//     post_id: post_id.toString(),
//     type,
//   };

//   const url = domain + "wp-json/api/v1/favorites";

//   loadingOn();
//   fetch(url, {
//     method: "POST",
//     body: JSON.stringify(data),
//   })
//     .then((response) => response.json())
//     .then((d) => {
//       // console.log({ d });
//       if (index === null) {
//         if (d.doing === "CREATED") {
//           fav[0].className = "heart outline icon hide_show";
//           fav[1].className = "heart icon show";
//         } else {
//           fav[0].className = "heart outline icon show";
//           fav[1].className = "heart icon hide_show";
//         }
//       } else {
//         if (d.doing === "CREATED") {
//           fav[index].className = "heart outline icon hide_show";
//           fav[index + 1].className = "heart icon show";
//         } else {
//           fav[index].className = "heart outline icon show";
//           fav[index + 1].className = "heart icon hide_show";
//         }
//       }

//       loadingOff();
//     });
// }
function productFavoritesList(user_id, post_id, type, index = null) {
  const data = {
    user_id: user_id.toString(),
    post_id: post_id.toString(),
    type,
  };

  const fav1 = document.querySelector(`#product-favorites-tag-${index}`);
  const fav2 = document.querySelector(`#product-saved-favorites-tag-${index}`);
  const url = domain + "wp-json/api/v1/favorites";
  // const blogs_fav = document.querySelectorAll(".card-blog-save-favorites");

  // }
  // }
  loadingOn();
  fetch(url, {
    method: "POST",
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((d) => {
      if (d.doing === "CREATED") {
        fav1.className = "heart outline icon hide_show";
        fav2.className = "heart icon show";
      } else {
        fav1.className = "heart outline icon show";
        fav2.className = "heart icon hide_show";
      }

      loadingOff();
    });
}
function removeFavoritesList(user_id, post_id, type, nameClass, classCount) {
  const data = {
    user_id: user_id.toString(),
    post_id: post_id.toString(),
    type,
  };
  const cards = document.querySelector("." + nameClass);
  const checkCardLength = document.querySelectorAll("." + classCount);
  const url = domain + "wp-json/api/v1/favorites";

  loadingOn();

  fetch(url, {
    method: "POST",
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((d) => {
      // console.log({ d });
      // cards[index].style.display = "none";
      cards.remove();

      if (checkCardLength.length === 1) {
        onEmptyCardShow();
      }
      loadingOff();
    });
}
function onEmptyCardShow() {
  document.querySelector(".empty_data_page.hide").className = "empty_data_page";
}
function loadingOn() {
  const loading = document.querySelector("#loading");
  const loading_new = document.querySelector("#loading-new");

  if (loading) {
    loading.style.display = "flex";
  }
  if (loading_new) {
    loading_new.style.display = "flex";
  }
}
function loadingOff() {
  const loading = document.querySelector("#loading");
  const loading_new = document.querySelector("#loading-new");
  if (loading) {
    loading.style.display = "none";
    // loading.style.display = "flex";
  }
  if (loading_new) {
    loading_new.style.display = "none";
    // loading.style.display = "flex";
  }
}
function onSelected(eleId, url = null) {
  const _element = document.querySelector("#" + eleId);
  console.log({ v: _element.value, url });
  if (url) {
    //
    if (_element.value) window.location.href = url + "/?cate=" + _element.value;
    else window.location.href = url;
  }
}

function onSelectedShowList(elementId, elementId2) {
  const _element = document.querySelector("." + elementId);
  const _element2 = document.querySelector("." + elementId2);
  console.log({ d: _element.className });
  if (_element.className.match(/active/)) _element.className = elementId;
  else _element.className = elementId + " " + "active";
  if (_element2.className.match(/active/)) _element2.className = elementId2;
  else _element2.className = elementId2 + " " + "active";
}

function checkFieldRequired(checkedField = undefined, bigDiv = "") {
  let checkErr = true;
  const _keysId = [];
  const fieldRequired = bigDiv
    ? document.querySelectorAll(bigDiv + " .field.required")
    : document.querySelectorAll(".field.required");
  // const textAreaFieldRequired = document.querySelectorAll(".field.required");
  // Array.from().map(f => {
  //   if(!f.value) checkErr
  // })
  let data = {};
  for (let i = 0; i < Array.from(fieldRequired).length; i++) {
    const input = fieldRequired[i].querySelector("input");
    const select = fieldRequired[i].querySelector("select");
    const textarea = fieldRequired[i].querySelector("textarea");
    // console.log({ textarea });
    if (select) {
      if (!select.value) {
        // if(checkedField[select.id])
        if (checkedField) {
          if (checkedField[select.id]) {
            fieldRequired[i].className += " error";
            checkErr = false;
          }
        } else {
          fieldRequired[i].className += " error";
          checkErr = false;
        }
      } else {
        fieldRequired[i].className = fieldRequired[i].className
          .split(" ")
          .filter((c) => c !== "error")
          .join(" ");
        _keysId.push("#" + select.id);
        data[select.id] = select.value;
      }
    }
    if (textarea) {
      if (!textarea.value) {
        if (checkedField) {
          if (checkedField[textarea.id]) {
            fieldRequired[i].className += " error";
            checkErr = false;
          }
        } else {
          fieldRequired[i].className += " error";
          checkErr = false;
        }
      } else {
        fieldRequired[i].className = fieldRequired[i].className
          .split(" ")
          .filter((c) => c !== "error")
          .join(" ");
        _keysId.push("#" + textarea.id);
        data[textarea.id] = textarea.innerHTML;
      }
    } else {
      if (!input) continue;
      if (input.value === "on") {
        if (!input.checked) {
          if (checkedField) {
            if (checkedField[input.id]) {
              fieldRequired[i].className += " error";
              checkErr = false;
            }
          } else {
            fieldRequired[i].className += " error";
            checkErr = false;
          }
        } else {
          fieldRequired[i].className = fieldRequired[i].className
            .split(" ")
            .filter((c) => c !== "error")
            .join(" ");
          data[input.id] = input.checked;
          _keysId.push("#" + input.id);
        }
      } else {
        if (!input.value) {
          if (checkedField) {
            if (checkedField[input.id]) {
              fieldRequired[i].className += " error";
              checkErr = false;
            }
          } else {
            fieldRequired[i].className += " error";
            checkErr = false;
          }
        } else {
          fieldRequired[i].className = fieldRequired[i].className
            .split(" ")
            .filter((c) => c !== "error")
            .join(" ");
          _keysId.push("#" + input.id);
          data[input.id] = input.value;
        }
      }
    }
  }

  function clearData() {
    _keysId.forEach((k) => {
      document.querySelector(k).value = "";
      if (document.querySelector(k).value === "on")
        document.querySelector(k).checked = false;
    });
  }

  return {
    fieldRequired,
    checkErr,
    data,
    clear: clearData,
  };
}
function checkField(checkedField = undefined, bigDiv = "") {
  let checkErr = true;
  const _keysId = [];
  const fieldRequired = bigDiv
    ? document.querySelectorAll(bigDiv + " .field")
    : document.querySelectorAll(".field");
  // const textAreaFieldRequired = document.querySelectorAll(".field.required");
  // Array.from().map(f => {
  //   if(!f.value) checkErr
  // })
  let data = {};
  for (let i = 0; i < Array.from(fieldRequired).length; i++) {
    const input = fieldRequired[i].querySelector("input");
    const select = fieldRequired[i].querySelector("select");
    const textarea = fieldRequired[i].querySelector("textarea");
    // console.log({ textarea });
    if (select) {
      if (!select.value) {
        // if(checkedField[select.id])
        if (checkedField) {
          if (checkedField[select.id]) {
            fieldRequired[i].className += " error";
            checkErr = false;
          }
        } else {
          fieldRequired[i].className += " error";
          checkErr = false;
        }
      } else {
        fieldRequired[i].className = fieldRequired[i].className
          .split(" ")
          .filter((c) => c !== "error")
          .join(" ");
        _keysId.push("#" + select.id);
        data[select.id] = select.value;
      }
    }
    if (textarea) {
      if (!textarea.value) {
        if (checkedField) {
          if (checkedField[textarea.id]) {
            fieldRequired[i].className += " error";
            checkErr = false;
          }
        } else {
          fieldRequired[i].className += " error";
          checkErr = false;
        }
      } else {
        fieldRequired[i].className = fieldRequired[i].className
          .split(" ")
          .filter((c) => c !== "error")
          .join(" ");
        _keysId.push("#" + textarea.id);
        data[textarea.id] = textarea.innerHTML;
      }
    } else {
      if (!input) continue;
      if (input.value === "on") {
        if (!input.checked) {
          if (checkedField) {
            if (checkedField[input.id]) {
              fieldRequired[i].className += " error";
              checkErr = false;
            }
          } else {
            fieldRequired[i].className += " error";
            checkErr = false;
          }
        } else {
          fieldRequired[i].className = fieldRequired[i].className
            .split(" ")
            .filter((c) => c !== "error")
            .join(" ");
          data[input.id] = input.checked;
          _keysId.push("#" + input.id);
        }
      } else {
        if (!input.value) {
          if (checkedField) {
            if (checkedField[input.id]) {
              fieldRequired[i].className += " error";
              checkErr = false;
            }
          } else {
            fieldRequired[i].className += " error";
            checkErr = false;
          }
        } else {
          fieldRequired[i].className = fieldRequired[i].className
            .split(" ")
            .filter((c) => c !== "error")
            .join(" ");
          _keysId.push("#" + input.id);
          data[input.id] = input.value;
        }
      }
    }
  }

  function clearData() {
    _keysId.forEach((k) => {
      document.querySelector(k).value = "";
      if (document.querySelector(k).value === "on")
        document.querySelector(k).checked = false;
    });
  }

  return {
    fieldRequired,
    checkErr,
    data,
    clear: clearData,
  };
}

function saveFaqForm() {
  const faqForm = checkFieldRequired();

  // const url = "";
  popUpSuccessOff();
  if (faqForm.checkErr) {
    const url = domain + "wp-json/api/v1/save_faq";
    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(faqForm.data),
    })
      .then((d) => d.json())
      .then((d) => {
        // alert("success");
        //document.querySelector(".popup-show").style.display = "flex";
        popUpSuccessOn();
        faqForm.clear();
      });
  }
}
function popUpSuccessOff() {
  const icon_cancel = document.querySelector(".icon-cancel");
  icon_cancel.addEventListener("click", (e) => {
    document.querySelector(".popup-show").style.display = "none";
  });
}
function popUpSuccessOn() {
  document.querySelector(".popup-show").style.display = "flex";
}
