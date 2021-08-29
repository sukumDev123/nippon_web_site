// const domain = "https://staging.tanpong.me/";
const domain = "http://localhost/nippon/";

window.onload = () => {
  homePageInitSwiper();
  headerClicked();
  homePageHeaderOnFixed();
  searchShade();
  onHideShowVDOLink();
  onSelectedFilterOnClick();
  handleHeaderMobile();
  handleMenuClickedShowSubMenu();
  handleFilterProductMobile();
  handleFooterMenuClicked();
  loadLocation();
  saveUserInfo();
  saveCareer();
  isPhone();
  IsNumber();
  uploadFile();
  showMoreCalPageInternal();
  calculateInternalRoomStep1();
  calculateInternalRoomStep2();
  calculateInternalRoomStep3();
  calculateInternalRoomStep4();
  calculateInternalRoomSummary();
  addPlusButton();
  summaryExternalCal();
  faqOnHeaderClicked();
  view_more_info_on_click();
  onResetButtonInit();

  const message_right = document.querySelector(".message-right");
  const contact_message_box = document.querySelector(".contact-message-box");
  const arrow_up_to_top = document.querySelector(".arrow-up-to-top");
  const closeEmailF = document.querySelector(".icon-items");
  if (closeEmailF) {
    closeEmailF.addEventListener("click", (event) => {
      const user_info = document.querySelector("#user_info");
      user_info.className = "";
    });
  }
  if (message_right && contact_message_box) {
    contact_message_box.addEventListener("click", () => {
      if (message_right.className == "message-right active") {
        message_right.className = "message-right";
        contact_message_box.className = "contact-message-box ";
      } else {
        message_right.className = "message-right active";
        contact_message_box.className = "contact-message-box active";
      }
    });
    arrow_up_to_top.addEventListener("click", () => {
      window.scrollTo(0, 0);
    });
  }
  try {
    if (family_colors) {
      if (family_colors.length) findColorClose([0, 0, 0], "rgb", family_colors);
    }

    if (firstPostId) {
      onPageShadeInit();
    }
  } catch (error) {}
};
