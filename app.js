// const { babelConfig } = require("laravel-mix");
const loading = document.querySelector("#loading");
let searchType = "rgb-div";
// let family_colors = [];

// let firstPostId = 0;
function showListOfFamilyColorThisShade(shadeId) {
  if (loading) loading.className = "";
  document.querySelector("#shade-filter").value = shadeId;
  if (shade[shadeId]) {
    if (shade[shadeId].length) {
      const familyDiv = document.querySelector("#family-list");
      if (familyDiv.firstChild) {
        while (familyDiv.lastElementChild) {
          familyDiv.removeChild(familyDiv.lastElementChild);
        }
      }
      Array.from(shade[shadeId]).forEach((shade, index) => {
        const { name, ID, color } = shade;
        const box = document.createElement("div");
        box.className = "box-color";
        box.style.backgroundColor = color;
        if (index === 0)
          document.querySelector("#family-image").style.backgroundColor = color;
        box.addEventListener("click", () => {
          document.querySelector("#family-image").style.backgroundColor = color;
        });
        familyDiv.appendChild(box);
      });
    }
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

  // if()
}

function findColorClose(value, type, familyColors) {
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
    _sort.splice(0, 1);
    const _card = document.querySelector(".suggestion2 .shade4side");
    if (_card.firstChild) {
      while (_card.lastElementChild) {
        _card.removeChild(_card.lastElementChild);
      }
    }
    _sort.forEach((sort) => {
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
  const product_card_swiper = new Swiper(".products-card-swiper", {
    slidesPerView: 3,
    spaceBetween: 50,
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
    // loop: true,
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
  const swiper_project = new Swiper(".swiper-product", {
    pagination: {
      el: ".swiper-pagination",
    },
  });
  const swiper_projects = new Swiper(".swiper-projects", {
    // loop: true,
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
    // pagination: {
    //   el: ".swiper-pagination",
    // },
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
    const element = document.querySelector("#home-content");
    // if (document.querySelector(".card-content").scrollTop === window.scrollY) {
    //   alert("test");
    //   // document.querySelector(".card-content").style.backgroundColor = "red";
    // }
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    const home_header = document.querySelector("#home_header");
    if (element && home_header) {
      if (element.offsetTop <= scrollTop) {
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
  });
};

const onClickedHeader = () => {
  if (header.className.match(/header-active/)) {
    const _ddd = home_header.className
      .split(" ")
      .filter((c) => c != "header-active")
      .join(" ");
    header.className = _ddd;
    Array.from(menuTop).forEach((_menu) => {
      if (_menu.className.match(/menu-active/)) {
        const ddd = _menu.className
          .split(" ")
          .filter((c) => c != "menu-active")
          .join(" ");
        _menu.className = ddd;
        const _ddd = home_header.className
          .split(" ")
          .filter((c) => c != "home_header_fixed")
          .join(" ");
        home_header.className = _ddd;
      }
    });
  }
};

const headerClicked = () => {
  const menuTop = document.querySelectorAll("#menu-top-menu > li");
  // console.log({ menuTop });
  const header = document.querySelector("header");

  const bk_header = document.querySelector(".bk-header");
  if (menuTop && header && bk_header) {
    bk_header.addEventListener("click", () => {
      onClickedHeader();
    });

    Array.from(menuTop).forEach((menu) => {
      menu.querySelector("a").addEventListener("click", (event) => {
        // if (menu.querySelector("a").href.match("#"))
        if (menu.querySelector("a").href.match(/#/)) event.preventDefault();

        Array.from(menuTop).forEach((_menu) => {
          if (_menu.className.match(/menu-active/)) {
            const ddd = _menu.className
              .split(" ")
              .filter((c) => c != "menu-active")
              .join(" ");
            _menu.className = ddd;
            const _ddd = home_header.className
              .split(" ")
              .filter((c) => c != "home_header_fixed")
              .join(" ");
            home_header.className = _ddd;
          }
        });

        if (menu.className.match(/menu-active/)) {
          const ddd = menu.className
            .split(" ")
            .filter((c) => c != "menu-active")
            .join(" ");
          menu.className = ddd;
          const _ddd = home_header.className
            .split(" ")
            .filter((c) => c != "home_header_fixed")
            .join(" ");
          home_header.className = _ddd;
        } else {
          menu.className += " menu-active";
          header.className += " header-active";
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
        document.querySelector(".select-custom").className = "select-custom";
      } else {
        search_selected.className += " selected-active";
        document.querySelector(".select-custom").className =
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
      document.querySelector(".select-custom").className = "select-custom";
    } else {
      search_selected.className += " selected-active";
      document.querySelector(".select-custom").className =
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

  const shade_swiper = new Swiper(".shade-swiper", {
    slidesPerView: 4,
    // slidesPerColumn: 4,
    spaceBetween: 50,
    pagination: {
      el: "",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
};
window.onload = () => {
  homePageInitSwiper();
  headerClicked();
  homePageHeaderOnFixed();
  searchShade();

  try {
    if (family_colors)
      if (family_colors.length) findColorClose([0, 0, 0], "rgb", family_colors);
  } catch (error) {}

  // if (firstPostId) {
  onPageShadeInit();
  // }
};

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
