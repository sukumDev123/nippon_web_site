// const { babelConfig } = require("laravel-mix");
const domain = "https://staging.tanpong.me";
// const domain = "http://localhost/nippon/";
const loading = document.querySelector("#loading");
let searchType = "rgb-div";
let product_suggestion = [];
// let family_colors = [];
let province = {};

let districts = {};

// let firstPostId = 0;
function showListOfFamilyColorThisShade(shadeId) {
  console.log({ shadeId });
  if (loading) loading.className = "";
  // document.querySelector("#shade-filter").value = shadeId;
  fetch(domain + "/wp-json/api/v1/shade/" + shadeId)
    .then((d) => d.json())
    .then((d) => {
      if (d.colors.length) {
        const familyDiv = document.querySelector("#family-list");
        if (familyDiv.firstChild) {
          while (familyDiv.lastElementChild) {
            familyDiv.removeChild(familyDiv.lastElementChild);
          }
        }
        Array.from(d.colors).forEach((shade, index) => {
          const { name, ID, color } = shade;
          const box = document.createElement("div");
          box.className = "box-color";
          box.style.backgroundColor = color;
          if (index === 0)
            document.querySelector("#family-image").style.backgroundColor =
              color;
          box.addEventListener("click", () => {
            document.querySelector("#family-image").style.backgroundColor =
              color;
          });
          familyDiv.appendChild(box);
        });
      } else {
        const familyDiv = document.querySelector("#family-list");

        if (familyDiv.firstChild) {
          while (familyDiv.lastElementChild) {
            familyDiv.removeChild(familyDiv.lastElementChild);
            document.querySelector("#family-image").style.backgroundColor =
              "rgba(0,0,0,0)";
          }
        }
        familyDiv.innerHTML = `
      <h1 class='text-center'> Family color null </h1>
    `;
      }
      if (loading) loading.className = "hide";
    })
    .catch((e) => {
      if (loading) loading.className = "hide";
    });
  // if (shade[shadeId]) {
  //   if (shade[shadeId].length) {
  //     const familyDiv = document.querySelector("#family-list");
  //     if (familyDiv.firstChild) {
  //       while (familyDiv.lastElementChild) {
  //         familyDiv.removeChild(familyDiv.lastElementChild);
  //       }
  //     }
  //     Array.from(shade[shadeId]).forEach((shade, index) => {
  //       const { name, ID, color } = shade;
  //       const box = document.createElement("div");
  //       box.className = "box-color";
  //       box.style.backgroundColor = color;
  //       if (index === 0)
  //         document.querySelector("#family-image").style.backgroundColor = color;
  //       box.addEventListener("click", () => {
  //         document.querySelector("#family-image").style.backgroundColor = color;
  //       });
  //       familyDiv.appendChild(box);
  //     });
  //   }
  // } else {
  //   const familyDiv = document.querySelector("#family-list");
  //   if (familyDiv.firstChild) {
  //     while (familyDiv.lastElementChild) {
  //       familyDiv.removeChild(familyDiv.lastElementChild);
  //       document.querySelector("#family-image").style.backgroundColor =
  //         "rgba(0,0,0,0)";
  //     }
  //   }
  //   familyDiv.innerHTML = `
  //     <h1 class='text-center'> Family color null </h1>
  //   `;
  // }

  // if()
}

function findColorClose(value, type, familyColors) {
  console.log({ value });
  if (type === "rgb") {
    const _value = value;
    const _dist = [];

    Array.from(familyColors).forEach((data) => {
      const { color, name } = data;
      const _hexToRGB = hexToRGB(color);

      const _d = distanceOfColor(_value, _hexToRGB.array);
      _dist.push({
        color,
        _d,
        name,
      });
    });
    const _sort = _dist.sort((a, b) => a._d - b._d);

    const suggestion1 = document.querySelector(
      ".suggestion1 > .card-color-family > #bk-family-color"
    );
    const titleFamilyColor = document.querySelector(
      ".suggestion1 .card-color-family #title-family-color"
    );
    // console.log({ suggestion1 });
    suggestion1.style.backgroundColor = _sort[0].color;
    titleFamilyColor.innerHTML = _sort[0].name;

    const _card = document.querySelector(".suggestion2 .shade4side");
    if (_card.firstChild) {
      while (_card.lastElementChild) {
        _card.removeChild(_card.lastElementChild);
      }
    }
    const _4Data = [];
    let _max = _sort.length;
    const sLength = _sort.length;
    if (sLength > 5) {
      _max = 5;
    }
    for (let i = 1; i < _max; i++) {
      _4Data.push(_sort[i]);
    }

    _4Data.forEach((sort) => {
      const _cardFamilyColor = document.createElement("div");
      _cardFamilyColor.className = "card-color-family";
      _cardFamilyColor.innerHTML = `
        <div id="bk-family-color" style="background-color:${sort.color}"></div>
        <h2 id="title-family-color">
          ${sort.name}
        </h2>
        
        `;
      _card.appendChild(_cardFamilyColor);
    });
    // suggestion1.style.backgroundColor = _sort[0].color;

    // console.log({ _sort });
  }
  if (loading) loading.className = "hide";
}
function distanceOfColor(rgbA, rgbB) {
  let labA = rgb2lab(rgbA);
  let labB = rgb2lab(rgbB);
  let deltaL = labA[0] - labB[0];
  let deltaA = labA[1] - labB[1];
  let deltaB = labA[2] - labB[2];
  let c1 = Math.sqrt(labA[1] * labA[1] + labA[2] * labA[2]);
  let c2 = Math.sqrt(labB[1] * labB[1] + labB[2] * labB[2]);
  let deltaC = c1 - c2;
  let deltaH = deltaA * deltaA + deltaB * deltaB - deltaC * deltaC;
  deltaH = deltaH < 0 ? 0 : Math.sqrt(deltaH);
  let sc = 1.0 + 0.045 * c1;
  let sh = 1.0 + 0.015 * c1;
  let deltaLKlsl = deltaL / 1.0;
  let deltaCkcsc = deltaC / sc;
  let deltaHkhsh = deltaH / sh;
  let i =
    deltaLKlsl * deltaLKlsl + deltaCkcsc * deltaCkcsc + deltaHkhsh * deltaHkhsh;
  return i < 0 ? 0 : Math.sqrt(i);
}

function rgb2lab(rgb) {
  let r = rgb[0] / 255,
    g = rgb[1] / 255,
    b = rgb[2] / 255,
    x,
    y,
    z;
  r = r > 0.04045 ? Math.pow((r + 0.055) / 1.055, 2.4) : r / 12.92;
  g = g > 0.04045 ? Math.pow((g + 0.055) / 1.055, 2.4) : g / 12.92;
  b = b > 0.04045 ? Math.pow((b + 0.055) / 1.055, 2.4) : b / 12.92;
  x = (r * 0.4124 + g * 0.3576 + b * 0.1805) / 0.95047;
  y = (r * 0.2126 + g * 0.7152 + b * 0.0722) / 1.0;
  z = (r * 0.0193 + g * 0.1192 + b * 0.9505) / 1.08883;
  x = x > 0.008856 ? Math.pow(x, 1 / 3) : 7.787 * x + 16 / 116;
  y = y > 0.008856 ? Math.pow(y, 1 / 3) : 7.787 * y + 16 / 116;
  z = z > 0.008856 ? Math.pow(z, 1 / 3) : 7.787 * z + 16 / 116;
  return [116 * y - 16, 500 * (x - y), 200 * (y - z)];
}

function hexToRGB(h) {
  let r = 0,
    g = 0,
    b = 0;

  // 3 digits
  if (h.length == 4) {
    r = "0x" + h[1] + h[1];
    g = "0x" + h[2] + h[2];
    b = "0x" + h[3] + h[3];

    // 6 digits
  } else if (h.length == 7) {
    r = "0x" + h[1] + h[2];
    g = "0x" + h[3] + h[4];
    b = "0x" + h[5] + h[6];
  }
  return {
    string: "rgb(" + +r + "," + +g + "," + +b + ")",
    array: [+r, +g, +b],
  };
  // return ;
}

// function loadSolutionFromPage(id) {
//   const solution_div = document.querySelector(".solution-div");
//   if (solution_div) {
//     solution_div.style.display = "flex";
//     while (solution_div.lastElementChild) {
//       solution_div.removeChild(solution_div.lastElementChild);
//     }
//     // console.log({ id });
//     if (loading) loading.className = "";

//     fetch(domain + "wp-json/wp/v2/pages/" + id)
//       .then((d) => d.json())
//       .then((d) => {
//         loading.className = "hide";
//         const solutions = Array.from(d.acf.post);
//         for (let i = 0; i < solutions.length; i++) {
//           const solution = solutions[i];
//           // console.log({ solution });
//           const createDivCard = document.createElement("div");
//           createDivCard.id = "solution" + solution.id;
//           createDivCard.onclick = function (event) {
//             solutionChange(solution.id);
//             createDivCard.className = "card-active";
//           };
//           // const _embedded = solution["_embedded"]["wp:featuredmedia"];
//           // const __embedded = _embedded ? _embedded[0] : {};
//           createDivCard.innerHTML = `
//             <a>
//               <img src="${__embedded?.source_url}" />
//               <h3 style="font-weight:bold">${solution?.title?.rendered}</h3>
//               <div class="bbb"></div>
//             </a>
//           `;
//           solution_div.appendChild(createDivCard);
//         }
//       })
//       .catch((e) => console.log({ e }));
//   }
// }

function loadSolutionFromPage(id) {
  const solution_div = document.querySelector(".solution-div");
  const info_solution = document.querySelector("#info-solution");

  if (solution_div) {
    solution_div.style.display = "flex";
    info_solution.style.display = "none";
    while (solution_div.lastElementChild) {
      solution_div.removeChild(solution_div.lastElementChild);
    }
    // console.log({ id });
    if (loading) loading.className = "";

    fetch(domain + "/wp-json/api/v1/solution/" + id)
      .then((d) => d.json())
      .then((page) => {
        loading.className = "hide";
        product_suggestion = page.products_suggestion;
        console.log({ product_suggestion });
        page.solutions.forEach((solution) => {
          const createDivCard = document.createElement("div");
          createDivCard.id = "solution" + solution.ID;
          createDivCard.onclick = function (event) {
            solutionChange(solution.ID);
            createDivCard.className = "card-active";
          };

          createDivCard.innerHTML = `
              <a>
              <img src="${solution["image"]}" />
              <h3 style="font-weight:bold">${solution["title"]}</h3>
              <div class="bbb"></div>
              </a>
          `;
          solution_div.appendChild(createDivCard);
        });
      });

    // _fetch[0].then(d => d.json()).then(d => console.log({f: d}))
  }
}

function HSLToRGB(h, s, l) {
  // Must be fractions of 1
  s /= 100;
  l /= 100;

  let c = (1 - Math.abs(2 * l - 1)) * s,
    x = c * (1 - Math.abs(((h / 60) % 2) - 1)),
    m = l - c / 2,
    r = 0,
    g = 0,
    b = 0;
}

function homePageInitSwiper() {
  // const product_card_swiper = new Swiper(".products-card-swiper", {
  //   slidesPerView: 1,
  //   spaceBetween: 20,
  //   breakpoints: {
  //     900: {
  //       slidesPerView: 3,
  //       spaceBetween: 50,
  //     },
  //   },
  // });
  const shade_swiper = new Swiper(".shade-swiper", {
    slidesPerView: 4,
    spaceBetween: 50,
  });
  const shade_swiper_family = new Swiper(".family-image", {
    slidesPerView: 1,
    // spaceBetween: 50,
    navigation: {
      nextEl: ".swiper-image-next",
      prevEl: ".swiper-image-prev",
    },
  });
  // const swiper_product_cate = new Swiper(".swiper-product-cate", {
  //   slidesPerView: 3,
  //   spaceBetween: 20,
  // });
  const product_owner = new Swiper(".products-card-owner-develop-swiper", {
    slidesPerView: 1,
  });
  const home_banner = new Swiper(".home-banner-swiper", {
    speed: 1000,
    autoplay: {
      delay: 3000,
      // disableOnInteraction: false,
    },
    pagination: {
      el: ".banner-pagination",
    },
  });

  const project_home_suggestion = new Swiper(".project_home_suggestion", {
    loop: true,
    speed: 1000,
    // autoplay: {
    //     delay: 3000,
    // },
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",

    coverflowEffect: {
      rotate: 0,
      stretch: -100,
      depth: 0,
      modifier: 1,
      slideShadows: true,
    },

    pagination: {
      el: ".pagination-inspire",
    },
    navigation: {
      nextEl: ".inspire-next",
      prevEl: ".inspire-prev",
    },
  });

  const footer_banner = new Swiper(".footer_banner", {
    // loop: true,
    pagination: {
      el: ".swiper-pagination",
    },
  });

  const newSwiper = new Swiper(".new-swiper", {
    pagination: {
      el: ".swiper-pagination",
    },
  });
  const shadeSuggestion = new Swiper(".shade-suggestion", {
    pagination: {
      el: ".shade-pagination",
    },
  });
  const newsSwiper = new Swiper(".news-swiper", {
    loop: true,
    speed: 1000,
    // autoplay: {
    //     delay: 3000,
    // },
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",

    coverflowEffect: {
      rotate: 0,
      stretch: -100,
      depth: 0,
      modifier: 1,
      slideShadows: true,
    },

    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  const swiper_project = new Swiper(".swiper-project", {
    pagination: {
      el: ".swiper-pagination",
    },
  });
  // const swiper_projects = new Swiper(".swiper-projects", {
  //   loop: true,
  //   speed: 1000,
  //   // autoplay: {
  //   //     delay: 3000,
  //   // },
  //   effect: "coverflow",
  //   grabCursor: true,
  //   centeredSlides: true,
  //   slidesPerView: "auto",

  //   coverflowEffect: {
  //     rotate: 0,
  //     stretch: -100,
  //     depth: 0,
  //     modifier: 1,
  //     slideShadows: true,
  //   },

  //   // Navigation arrows
  //   navigation: {
  //     nextEl: ".swiper-button-next",
  //     prevEl: ".swiper-button-prev",
  //   },
  //   // pagination: {
  //   //   el: ".swiper-pagination",
  //   // },
  // });

  const projectG2 = new Swiper(".project-swiper2", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });
  const projectG1 = new Swiper(".project-swiper1", {
    loop: true,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: projectG2,
    },
  });
  if (loading) loading.className = "hide";

  // const prev_id = document.querySelector("#prev-id");
  // const next_id = document.querySelector("#next-id");
  // if (prev_id && next_id) {
  //   prev_id.addEventListener("click", () => {});
  //   next_id.addEventListener("click", () => {
  //     // product_card_swiper.slideNext();
  //     // product_card_swiper.slick("slickNext");
  //     console.log({ product_card_swiper: product_card_swiper });
  //   });
  // }
}
const homePageHeaderOnFixed = () => {
  window.addEventListener("scroll", () => {
    const element = document.querySelector("body");
    try {
      const scrollTop =
        window.pageYOffset || document.documentElement.scrollTop;
      const home_header = document.querySelector("#home_header");
      if (element && home_header) {
        if (scrollTop >= 500) {
          if (!home_header.className.match(/home_header_fixed/)) {
            home_header.className += " home_header_fixed";
          }
        } else {
          const ddd = home_header.className
            .split(" ")
            .filter((c) => c != "home_header_fixed")
            .join(" ");
          home_header.className = ddd;
        }
      }
    } catch (error) {}
  });
};

const onClickedHeader = () => {
  let header = document.querySelector("header#home_header");
  const menuTop = document.querySelectorAll("#menu-top-menu > li");
  if (!header) header = document.querySelector("header#page");

  if (header.className.match("header-active")) {
    const _ddd = header.className
      .split(" ")
      .filter((c) => c != "header-active")
      .join(" ");

    header.className = _ddd;
    Array.from(menuTop).forEach((_menu) => {
      if (_menu.className.match("menu-active")?.length) {
        const ddd = _menu.className
          .split(" ")
          .filter((c) => c != "menu-active")
          .join(" ");
        _menu.className = ddd;
        if (scrollTop >= 500) {
          const _ddd = header.className
            .split(" ")
            .filter((c) => c != "home_header_fixed")
            .join(" ");
          header.className = _ddd;
        }
      }
    });
  }
};

const headerClicked = () => {
  const menuTop = document.querySelectorAll("#menu-top-menu > li");
  // console.log({ menuTop });
  let header = document.querySelector("#home_header");

  const bk_header = document.querySelector(".bk-header");
  if (!header) header = document.querySelector("#page");

  if (menuTop && header && bk_header) {
    bk_header.addEventListener("click", () => {
      onClickedHeader();
    });

    Array.from(menuTop).forEach((menu) => {
      menu.querySelector("a").addEventListener("click", (event) => {
        // if (menu.querySelector("a").href.match("#"))
        if (menu.querySelector("a").href.match(/#/)) {
          event.preventDefault();

          Array.from(menuTop).forEach((_menu) => {
            if (_menu.className.match("menu-active")?.length) {
              const ddd = _menu.className
                .split(" ")
                .filter((c) => c != "menu-active")
                .join(" ");
              _menu.className = ddd;
              // const _ddd = header.className
              //   .split(" ")
              //   .filter((c) => c != "home_header_fixed")
              //   .join(" ");
              // header.className = _ddd;
            }
          });

          if (menu.className.match("menu-active")?.length) {
            const ddd = menu.className
              .split(" ")
              .filter((c) => c != "menu-active")
              .join(" ");
            menu.className = ddd;
            // const _ddd = header.className
            //   .split(" ")
            //   .filter((c) => c != "home_header_fixed")
            //   .join(" ");
            // header.className = _ddd;
          } else {
            menu.className += " menu-active";
            header.className += " header-active";
          }
        }
      });
    });
  }
};

const searchShade = () => {
  const search_selected = document.querySelector("#search-select");
  if (search_selected) {
    document.querySelector(".select-input").addEventListener("click", () => {
      if (search_selected.className.match(/selected-active/)) {
        const _className = search_selected.className
          .split(" ")
          .filter((c) => c !== "selected-active")
          .join(" ");

        // console.log({ _className });
        search_selected.className = _className;
        document.querySelector("#selected_shade_color").className =
          "select-custom";
      } else {
        search_selected.className += " selected-active";
        document.querySelector("#selected_shade_color").className =
          "select-custom active-ul";
      }
    });
  }
};
const onChangeColorFilter = (type, value) => {
  const rgb_div = document.querySelector("#rgb-div");
  const hex_div = document.querySelector("#hex-div");
  const cmyk_div = document.querySelector("#cmyk-div");
  searchType = type;
  if (rgb_div && hex_div && cmyk_div) {
    rgb_div.className = "";
    hex_div.className = "";
    cmyk_div.className = "";

    document.querySelector(`#${type}`).className = "active";
    document.querySelector("#search_type").value = value;
    const search_selected = document.querySelector("#search-select");
    if (search_selected.className.match(/selected-active/)) {
      const _className = search_selected.className
        .split(" ")
        .filter((c) => c !== "selected-active")
        .join(" ");

      // console.log({ _className });
      search_selected.className = _className;
      document.querySelector("#selected_shade_color").className =
        "select-custom";
    } else {
      search_selected.className += " selected-active";
      document.querySelector("#selected_shade_color").className =
        "select-custom active-ul";
    }
  }
};
const onPageShadeInit = () => {
  // if (firstPostId) showListOfFamilyColorThisShade(firstPostId);
  const shade_filter = document.querySelector("#shade-filter");
  if (shade_filter)
    shade_filter.addEventListener("change", (event) => {
      showListOfFamilyColorThisShade(+event.target.value);
    });

  // const shade_swiper = new Swiper(".shade-swiper", {
  //   slidesPerView: 4,
  //   // slidesPerColumn: 4,
  //   spaceBetween: 50,
  //   pagination: {
  //     el: "",
  //   },
  //   navigation: {
  //     nextEl: ".swiper-button-next",
  //     prevEl: ".swiper-button-prev",
  //   },
  // });
};
const onHideShowVDOLink = () => {
  const show_video_link = document.querySelector(".show-video-link");
  const video_link = document.querySelector(".video-link > img");
  if (show_video_link) {
    show_video_link.addEventListener("click", () => {
      if (show_video_link.className.match("show").length) {
        const _className = show_video_link.className
          .split(" ")
          .filter((c) => c != "show");

        show_video_link.className = _className;
      }
    });

    // show_video_link
  }
  if (video_link) {
    video_link.addEventListener("click", () => {
      show_video_link.className += " show";
    });
  }
};
const onSelectedFilterOnClick = () => {
  const product_filter_input = document.querySelector(
    "#product_filter .select-input #show_product"
  );
  const cate_filter_input = document.querySelector(
    "#categories_project_filter .select-input input"
  );
  const product_filter = document.querySelector("#product_filter ul");
  const categories_project_filter = document.querySelector(
    "#categories_project_filter ul"
  );
  const bk_filter_select = document.querySelector(".bk-filter-select");
  if (cate_filter_input && categories_project_filter) {
    cate_filter_input.addEventListener("click", (event) => {
      if (categories_project_filter.className.match("active")) {
        categories_project_filter.className = "";
        bk_filter_select.className = "bk-filter-select";
        document.querySelector(".cgi").className = "fas fa-chevron-down cgi";
      } else {
        categories_project_filter.className = "active";
        bk_filter_select.className = "bk-filter-select active";
        document.querySelector(".cgi").className += " active";
      }
    });
  }
  if (product_filter_input && product_filter) {
    product_filter_input.addEventListener("click", (event) => {
      if (product_filter.className.match("active")) {
        product_filter.className = "";
        bk_filter_select.className = "bk-filter-select";
        document.querySelector(".pfi").className = "fas fa-chevron-down pfi";
      } else {
        document.querySelector(".pfi").className += " active";
        product_filter.className = "active";
        bk_filter_select.className = "bk-filter-select active";
      }
    });
  }
  if (bk_filter_select) {
    bk_filter_select.addEventListener("click", () => {
      // if(bk_filter_select.className.match()
      bk_filter_select.className = "bk-filter-select";
      categories_project_filter.className = "";
      product_filter.className = "";
      document.querySelector(".pfi").className = "fas fa-chevron-down pfi";
      document.querySelector(".cgi").className = "fas fa-chevron-down cgi";
    });
  }
};
const select_product_id = (name, id) => {
  const product_filter = document.querySelector("#product_filter ul");

  const _product_value = document.querySelector("#show_product");
  const _product_value_ = document.querySelector("input[name=filter_product]");
  _product_value.value = name;
  _product_value_.value = id;
  product_filter.className = "";
  document.querySelector(".pfi").className = "fas fa-chevron-down pfi";

  // window.location.href = "?filter_product=" + id;
};
const select_project_name = (name, id) => {
  const categories_project_filter = document.querySelector(
    "#categories_project_filter ul"
  );
  const _product_value = document.querySelector("#show_cate");
  const _product_value_ = document.querySelector("input[name=type]");
  _product_value.value = name;
  _product_value_.value = id;
  categories_project_filter.className = "";
  document.querySelector(".cgi").className = "fas fa-chevron-down cgi";

  // window.location.href = "?filter_product=" + id;
};
const handleHeaderMobile = () => {
  const header_mobile_close = document.querySelector("#header_mobile_close");
  const header_mobiles = document.querySelector("#header_mobiles");
  const show_menus_mobile = document.querySelector(".show-menus-mobile");
  if (show_menus_mobile) {
    show_menus_mobile.addEventListener("click", (event) => {
      if (!header_mobiles.className) header_mobiles.className = "active";
      else header_mobiles.className = "";
    });
  }
  if (header_mobile_close) {
    header_mobile_close.addEventListener("click", (event) => {
      if (!header_mobiles.className) header_mobiles.className = "active";
      else header_mobiles.className = "";
    });
  }
};
const handleMenuClickedShowSubMenu = () => {
  const menu_top_menu_online = document.querySelectorAll(
    "#menu-top-menu-online > li"
  );
  if (menu_top_menu_online) {
    Array.from(menu_top_menu_online).map((menu) => {
      // menu.className += " active";
      menu.addEventListener("click", (event) => {
        // console.log({ c:});
        if (menu.children[1]) {
          console.log({ g: menu.children[1].className.match(/active/) });
          if (menu.children[1].className.match(/active/)) {
            menu.children[1].className = menu.children[1].className
              .split(" ")
              .filter((m) => m !== "active")
              .join(" ");
          } else {
            menu.children[1].className = " active";
          }
        }
      });
      // console.log({ menu });
    });
  }
};
function handleFilterProductMobile() {
  const filter_product_close = document.querySelector("#filter_product_close");
  const filter_product_mobiles = document.querySelector(
    "#filter_product_mobiles"
  );
  const product_cate = document.querySelectorAll(
    ".filter-content .product-cate-card"
  );
  const product_cate_clicked = document.querySelectorAll(
    ".filter-content .product-cate-card-clicked"
  );
  const filter_button = document.querySelector(".filter-button");
  if (filter_product_close) {
    filter_product_close.addEventListener("click", (event) => {
      filter_product_mobiles.className = "";
    });
  }
  if (filter_button) {
    filter_button.addEventListener("click", (event) => {
      filter_product_mobiles.className = "active";
    });
  }
  if (filter_product_mobiles) {
    // console.log({ product_cate });
    // if (filter_product_mobiles.className === "active") {
    Array.from(product_cate).forEach((productCate, index) => {
      product_cate_clicked[index].addEventListener("click", (event) => {
        if (productCate.className.match("active")) {
          productCate.className = " product-cate-card";
        } else {
          productCate.className = "product-cate-card active";
        }
      });
    });
    // }
  }
}

function handleFooterMenuClicked() {
  const footer_menu_mobile = document.querySelectorAll(
    ".footer-menu-mobile > div > ul > li"
  );
  if (footer_menu_mobile) {
    Array.from(footer_menu_mobile).forEach((ele) => {
      // console.log({ d: ele.children });
      if (ele.children[0]) {
        ele.children[0].addEventListener("click", (event) => {
          event.preventDefault();
          if (ele.className.match("active"))
            ele.className = ele.className
              .split(" ")
              .filter((c) => c != "active")
              .join(" ");
          else ele.className += " active";
        });
      }
    });
  }
}
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

  try {
    if (family_colors) {
      if (family_colors.length) findColorClose([0, 0, 0], "rgb", family_colors);
    }
    if (firstPostId) {
      onPageShadeInit();
    }
  } catch (error) {}
};

function solutionChange(id, load_product = true) {
  if (loading) loading.className = "";
  const solution_div = document.querySelectorAll(".solution-div div");
  const info_solution = document.querySelector("#info-solution");
  info_solution.style.display = "block";
  const solution_div_array = Array.from(solution_div);
  console.log({ solution_div_array });
  if (solution_div_array?.length) {
    for (let i = 0; i < solution_div_array.length; i++) {
      const sDiv = solution_div_array[i];
      if (sDiv.className.match("card-active")?.length) sDiv.className = "";
      if (sDiv.id.match("solution" + id)?.length)
        sDiv.className = "card-active";
    }
  }
  fetch(domain + "/wp-json/wp/v2/solutions/" + id)
    .then((data) => {
      // console.log({ data });
      return data.json();
    })
    .then((data) => {
      console.log({ data });
      if (data.acf) {
        const {
          fixed: { step1, step2, step3 },
          problem,
        } = data.acf;
        const step1_title = document.querySelector("#step1_title");
        step1_title.innerHTML = step1.title;
        const step2_title = document.querySelector("#step2_title");
        step2_title.innerHTML = step2.title;
        const step3_title = document.querySelector("#step3_title");
        step3_title.innerHTML = step3.title;

        //
        const step1_detail = document.querySelector("#step1_detail");
        step1_detail.innerHTML = step1.detail;
        const step2_detail = document.querySelector("#step2_detail");
        step2_detail.innerHTML = step2.detail;
        const step3_detail = document.querySelector("#step3_detail");
        step3_detail.innerHTML = step3.detail;
        step1_image.src = "";
        step2_image.src = "";
        step3_image.src = "";
        before_image_problem.src = "";
        after_image_problem.src = "";

        if (step1.image) {
          const step1_image = document.querySelector("#step1_image");
          step1_image.src = step1.image.url;
        }
        if (step2.image) {
          const step2_image = document.querySelector("#step2_image");
          step2_image.src = step2.image.url;
        }
        if (step3.image) {
          const step3_image = document.querySelector("#step3_image");
          step3_image.src = step3.image.url;
        }

        if (problem.after_image) {
          const before_image_problem = document.querySelector(
            "#before_image_problem"
          );
          before_image_problem.src = problem.before_image.url;

          const after_image_problem = document.querySelector(
            "#after_image_problem"
          );
          after_image_problem.src = problem.after_image.url;
        }

        if (problem.title) {
          const problem_title = document.querySelector("#problem_title");
          problem_title.innerHTML = problem.title;

          const problem_sub_title =
            document.querySelector("#problem_sub_title");
          problem_sub_title.innerHTML = problem.sub_title;
          const problem_result = document.querySelector("#problem_result");
          problem_result.innerHTML = problem.result;

          const problem_cause = document.querySelector("#problem_cause");
          problem_cause.innerHTML = problem.cause;
        }

        if (load_product == true) {
          const product1 = document.querySelector("#products-1 .products-card");
          console.log({ product1: product1.lastElementChild, load_product });
          if (product1 || load_product != false)
            while (product1.lastElementChild) {
              if (product1.lastElementChild.value == "") break;
              product1.removeChild(product1.lastElementChild);
            }
          if (product_suggestion.length) {
            for (let i = 0; i < product_suggestion.length; i++) {
              const product_s = product_suggestion[i];
              const product_card = document.createElement("div");
              product_card.className = "product-card";
              product_card.innerHTML = `
              <a href="${product_s?.link}">
              <img src="${product_s?.image}" alt="image">
              <h4>
                     
                         ${product_s.title}
                    
                  </h4>
                  <p>${product_s.excerpt}</p>
                  
              </a>
              
              
              `;
              product1.appendChild(product_card);
              //         <div class="product-card">

              // </div>
            }
          } else {
            const product_card = document.createElement("div");
            product_card.style = "width:100%";
            product_card.innerHTML = `
              <h5 class='text-center'>Null product</h5>
            
            `;
            product1.appendChild(product_card);
          }
        }
      }
      if (loading) loading.className = "hide";

      // console.log({ data });
    })
    .catch((error) => {
      console.log({ error });
    });
}

function onSearchColor() {
  if (searchType === "rgb-div") {
    const r = document.querySelector("#r").value;
    const g = document.querySelector("#g").value;
    const b = document.querySelector("#b").value;
    findColorClose([+r, +g, +b], "rgb", family_colors);
  }
  if (searchType === "hex-div") {
    const hex = document.querySelector("#hex").value;
    // console.log({ hex });
    const { array } = hexToRGB(hex);
    findColorClose(array, "rgb", family_colors);
  }
  if (searchType === "cmyk-div") {
    const c = document.querySelector("#c").value;
    const m = document.querySelector("#m").value;
    const y = document.querySelector("#y").value;
    const k = document.querySelector("#k").value;
    const { r, g, b } = cmyk2rgb(c, m, y, k, false);
    findColorClose([+r, +g, +b], "rgb", family_colors);
  }
}

function cmyk2rgb(c, m, y, k, normalized) {
  c = c / 100;
  m = m / 100;
  y = y / 100;
  k = k / 100;

  c = c * (1 - k) + k;
  m = m * (1 - k) + k;
  y = y * (1 - k) + k;

  let r = 1 - c;
  let g = 1 - m;
  let b = 1 - y;

  if (!normalized) {
    r = Math.round(255 * r);
    g = Math.round(255 * g);
    b = Math.round(255 * b);
  }

  return {
    r: r,
    g: g,
    b: b,
  };
}
function loadP() {
  const provinceElement = document.querySelector("#province");

  Promise.all([
    fetch(domain + "/wp-content/themes/nippontheme/assets/json/province.json"),
    fetch(domain + "/wp-content/themes/nippontheme/assets/json/districts.json"),
  ]).then((d) => {
    const [_province, _districts] = d;
    _province.json().then((p) => {
      // province.push(p);
      while (provinceElement.lastElementChild) {
        if (provinceElement.lastElementChild.value == "") break;
        provinceElement.removeChild(provinceElement.lastElementChild);
      }
      Array.from(p).forEach((d) => {
        if (!province[d.PROVINCE_ID]) province[d.PROVINCE_ID] = d;
        const createOption = document.createElement("option");
        createOption.value = d.PROVINCE_ID;
        createOption.innerHTML = d.PROVINCE_NAME;
        provinceElement.appendChild(createOption);
      });

      // console.log({ province });
    });
    _districts.json().then((d) => {
      districts = d.reduce((obj, data) => {
        if (!obj[data.PROVINCE_ID]) obj[data.PROVINCE_ID] = [];
        obj[data.PROVINCE_ID].push(data);
        return obj;
      }, {});
      // console.log({ districts });
    });
  });
}
function loadD(id) {
  const district = districts[id];
  const districtElement = document.querySelector("#district");

  districtElement.style = "display: block";
  while (districtElement.lastElementChild) {
    if (
      districtElement.lastElementChild.value == "" ||
      districtElement.lastElementChild.value == "เมือง"
    )
      break;
    districtElement.removeChild(districtElement.lastElementChild);
  }
  Array.from(district).forEach((d) => {
    const createOption = document.createElement("option");
    createOption.value = d.DISTRICT_NAME;
    createOption.innerHTML = d.DISTRICT_NAME;
    districtElement.appendChild(createOption);
  });
  document.querySelector("#province").value = id;
}
function loadLocation(url = "") {
  const countryElement = document.querySelector("#country");
  const provinceElement = document.querySelector("#province");
  const districtElement = document.querySelector("#district");

  if (provinceElement && districtElement && countryElement) {
    countryElement.addEventListener("change", (event) => {
      const { value } = event.target;
      if (value.toUpperCase() === "TH") {
        provinceElement.style = "display: block;";
        loadP();
      } else {
        provinceElement.style = "display: none;";
      }
    });

    provinceElement.addEventListener("change", (event) => {
      const { value } = event.target;
      loadD(value);
    });
    const cat_product = document.querySelector("#cat_product");

    document
      .querySelector("#location_search")
      .addEventListener("click", (event) => {
        event.preventDefault();
        const countryValue = countryElement.value;
        const provinceValue = provinceElement.value;
        const districtValue = districtElement.value;

        const catProductValue = cat_product.value;
        let search = url;
        let search_all = "";
        if (catProductValue) {
          search += "?cat_product=" + catProductValue;
          // "&country=" +
          // countryValue +
          // "&province=" +
          // province[provinceValue].PROVINCE_NAME;
          if (countryValue) {
            search += "&country=" + countryValue;
          }
          if (provinceValue) {
            search += "&province=" + provinceValue;
            search_all = province[provinceValue].PROVINCE_NAME;
          }
          if (districtValue) {
            search += "&district=" + districtValue;
            search_all =
              districtValue + " " + province[provinceValue].PROVINCE_NAME;
          }
          if (countryValue != "th") {
            search_all += " " + countryValue;
          }
        } else {
          // search +=
          //   "?country=" +
          //   countryValue +
          //   "&province=" +
          //   province[provinceValue].PROVINCE_NAME;
          if (countryValue) {
            search += "?country=" + countryValue;
          }

          if (provinceValue) {
            search += "&province=" + provinceValue;
            search_all = province[provinceValue].PROVINCE_NAME;
          }
          if (districtValue) {
            search += "&district=" + districtValue;
            search_all =
              districtValue + " " + province[provinceValue].PROVINCE_NAME;
          }
          if (countryValue != "th") {
            search_all += " " + countryValue;
          }
        }

        // let search_all = province[provinceValue].PROVINCE_NAME;
        // if (districtValue) {
        //   search += "&district=" + districtValue;

        // }

        console.log({ search, search_all });

        if (search) {
          window.location.href = search;
          if (search_all) {
            window.location.href = search + "&search=" + search_all;
          }
        }
      });
  }
}
