/******/ (() => {
  // webpackBootstrap
  /******/ var __webpack_modules__ = {
    /***/ "./src/app.js":
      /*!********************!*\
  !*** ./src/app.js ***!
  \********************/
      /***/ () => {
        function _slicedToArray(arr, i) {
          return (
            _arrayWithHoles(arr) ||
            _iterableToArrayLimit(arr, i) ||
            _unsupportedIterableToArray(arr, i) ||
            _nonIterableRest()
          );
        }

        function _nonIterableRest() {
          throw new TypeError(
            "Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
          );
        }

        function _unsupportedIterableToArray(o, minLen) {
          if (!o) return;
          if (typeof o === "string") return _arrayLikeToArray(o, minLen);
          var n = Object.prototype.toString.call(o).slice(8, -1);
          if (n === "Object" && o.constructor) n = o.constructor.name;
          if (n === "Map" || n === "Set") return Array.from(o);
          if (
            n === "Arguments" ||
            /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)
          )
            return _arrayLikeToArray(o, minLen);
        }

        function _arrayLikeToArray(arr, len) {
          if (len == null || len > arr.length) len = arr.length;
          for (var i = 0, arr2 = new Array(len); i < len; i++) {
            arr2[i] = arr[i];
          }
          return arr2;
        }

        function _iterableToArrayLimit(arr, i) {
          var _i =
            arr &&
            ((typeof Symbol !== "undefined" && arr[Symbol.iterator]) ||
              arr["@@iterator"]);
          if (_i == null) return;
          var _arr = [];
          var _n = true;
          var _d = false;
          var _s, _e;
          try {
            for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) {
              _arr.push(_s.value);
              if (i && _arr.length === i) break;
            }
          } catch (err) {
            _d = true;
            _e = err;
          } finally {
            try {
              if (!_n && _i["return"] != null) _i["return"]();
            } finally {
              if (_d) throw _e;
            }
          }
          return _arr;
        }

        function _arrayWithHoles(arr) {
          if (Array.isArray(arr)) return arr;
        }

        // const { babelConfig } = require("laravel-mix");
        // const domain = "https://staging.tanpong.me/";
        var domain = "http://localhost/nippon/";
        var loading = document.querySelector("#loading");
        var searchType = "rgb-div"; // let family_colors = [];
        // let firstPostId = 0;

        function showListOfFamilyColorThisShade(shadeId) {
          if (loading) loading.className = ""; // document.querySelector("#shade-filter").value = shadeId;

          if (shade[shadeId]) {
            if (shade[shadeId].length) {
              var familyDiv = document.querySelector("#family-list");

              if (familyDiv.firstChild) {
                while (familyDiv.lastElementChild) {
                  familyDiv.removeChild(familyDiv.lastElementChild);
                }
              }

              Array.from(shade[shadeId]).forEach(function (shade, index) {
                var name = shade.name,
                  ID = shade.ID,
                  color = shade.color;
                var box = document.createElement("div");
                box.className = "box-color";
                box.style.backgroundColor = color;
                if (index === 0)
                  document.querySelector(
                    "#family-image"
                  ).style.backgroundColor = color;
                box.addEventListener("click", function () {
                  document.querySelector(
                    "#family-image"
                  ).style.backgroundColor = color;
                });
                familyDiv.appendChild(box);
              });
            }
          } else {
            var _familyDiv = document.querySelector("#family-list");

            if (_familyDiv.firstChild) {
              while (_familyDiv.lastElementChild) {
                _familyDiv.removeChild(_familyDiv.lastElementChild);

                document.querySelector("#family-image").style.backgroundColor =
                  "rgba(0,0,0,0)";
              }
            }

            _familyDiv.innerHTML =
              "\n      <h1 class='text-center'> Family color null </h1>\n    ";
          }

          if (loading) loading.className = "hide"; // if()
        }

        function findColorClose(value, type, familyColors) {
          console.log({
            value: value,
          });

          if (type === "rgb") {
            var _value = value;
            var _dist = [];
            Array.from(familyColors).forEach(function (data) {
              var color = data.color,
                name = data.name;

              var _hexToRGB = hexToRGB(color);

              var _d = distanceOfColor(_value, _hexToRGB.array);

              _dist.push({
                color: color,
                _d: _d,
                name: name,
              });
            });

            var _sort = _dist.sort(function (a, b) {
              return a._d - b._d;
            });

            var suggestion1 = document.querySelector(
              ".suggestion1 > .card-color-family > #bk-family-color"
            );
            var titleFamilyColor = document.querySelector(
              ".suggestion1 .card-color-family #title-family-color"
            ); // console.log({ suggestion1 });

            suggestion1.style.backgroundColor = _sort[0].color;
            titleFamilyColor.innerHTML = _sort[0].name;

            var _card = document.querySelector(".suggestion2 .shade4side");

            if (_card.firstChild) {
              while (_card.lastElementChild) {
                _card.removeChild(_card.lastElementChild);
              }
            }

            var _4Data = [];
            var _max = _sort.length;
            var sLength = _sort.length;

            if (sLength > 5) {
              _max = 5;
            }

            for (var i = 1; i < _max; i++) {
              _4Data.push(_sort[i]);
            }

            _4Data.forEach(function (sort) {
              var _cardFamilyColor = document.createElement("div");

              _cardFamilyColor.className = "card-color-family";
              _cardFamilyColor.innerHTML =
                '\n        <div id="bk-family-color" style="background-color:'
                  .concat(
                    sort.color,
                    '"></div>\n        <h2 id="title-family-color">\n          '
                  )
                  .concat(sort.name, "\n        </h2>\n        \n        ");

              _card.appendChild(_cardFamilyColor);
            }); // suggestion1.style.backgroundColor = _sort[0].color;
            // console.log({ _sort });
          }

          if (loading) loading.className = "hide";
        }

        function distanceOfColor(rgbA, rgbB) {
          var labA = rgb2lab(rgbA);
          var labB = rgb2lab(rgbB);
          var deltaL = labA[0] - labB[0];
          var deltaA = labA[1] - labB[1];
          var deltaB = labA[2] - labB[2];
          var c1 = Math.sqrt(labA[1] * labA[1] + labA[2] * labA[2]);
          var c2 = Math.sqrt(labB[1] * labB[1] + labB[2] * labB[2]);
          var deltaC = c1 - c2;
          var deltaH = deltaA * deltaA + deltaB * deltaB - deltaC * deltaC;
          deltaH = deltaH < 0 ? 0 : Math.sqrt(deltaH);
          var sc = 1.0 + 0.045 * c1;
          var sh = 1.0 + 0.015 * c1;
          var deltaLKlsl = deltaL / 1.0;
          var deltaCkcsc = deltaC / sc;
          var deltaHkhsh = deltaH / sh;
          var i =
            deltaLKlsl * deltaLKlsl +
            deltaCkcsc * deltaCkcsc +
            deltaHkhsh * deltaHkhsh;
          return i < 0 ? 0 : Math.sqrt(i);
        }

        function rgb2lab(rgb) {
          var r = rgb[0] / 255,
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
          var r = 0,
            g = 0,
            b = 0; // 3 digits

          if (h.length == 4) {
            r = "0x" + h[1] + h[1];
            g = "0x" + h[2] + h[2];
            b = "0x" + h[3] + h[3]; // 6 digits
          } else if (h.length == 7) {
            r = "0x" + h[1] + h[2];
            g = "0x" + h[3] + h[4];
            b = "0x" + h[5] + h[6];
          }

          return {
            string: "rgb(" + +r + "," + +g + "," + +b + ")",
            array: [+r, +g, +b],
          }; // return ;
        }

        function loadSolutionFromPage(id) {
          var solution_div = document.querySelector(".solution-div");
          var info_solution = document.querySelector("#info-solution");
          var solutions_div = document.querySelectorAll(".solution-div");

          if (solutions_div) {
            console.log({
              solutions_div: solutions_div,
            });
          }

          if (solution_div) {
            solution_div.style.display = "flex";
            info_solution.style.display = "none";

            while (solution_div.lastElementChild) {
              solution_div.removeChild(solution_div.lastElementChild);
            } // console.log({ id });

            if (loading) loading.className = "";
            fetch(domain + "wp-json/wp/v2/solutions?_embed&page_parent=" + id)
              .then(function (d) {
                return d.json();
              })
              .then(function (d) {
                loading.className = "hide";
                var solutions = Array.from(d);

                var _loop = function _loop(i) {
                  var _solution$title;

                  var solution = solutions[i]; // console.log({ solution });

                  var createDivCard = document.createElement("div");
                  createDivCard.id = "solution" + solution.id;

                  createDivCard.onclick = function (event) {
                    solutionChange(solution.id);
                    createDivCard.className = "card-active";
                  };

                  var _embedded = solution["_embedded"]["wp:featuredmedia"];

                  var __embedded = _embedded ? _embedded[0] : {};

                  createDivCard.innerHTML =
                    '\n            <a>\n              <img src="'
                      .concat(
                        __embedded === null || __embedded === void 0
                          ? void 0
                          : __embedded.source_url,
                        '" />\n              <h3 style="font-weight:bold">'
                      )
                      .concat(
                        solution === null || solution === void 0
                          ? void 0
                          : (_solution$title = solution.title) === null ||
                            _solution$title === void 0
                          ? void 0
                          : _solution$title.rendered,
                        "</h3>\n             \n            </a>\n          "
                      );
                  solution_div.appendChild(createDivCard);
                };

                for (var i = 0; i < solutions.length; i++) {
                  _loop(i);
                }
              })
              ["catch"](function (e) {
                return console.log({
                  e: e,
                });
              });
          }
        }

        function HSLToRGB(h, s, l) {
          // Must be fractions of 1
          s /= 100;
          l /= 100;
          var c = (1 - Math.abs(2 * l - 1)) * s,
            x = c * (1 - Math.abs(((h / 60) % 2) - 1)),
            m = l - c / 2,
            r = 0,
            g = 0,
            b = 0;
        }

        function homePageInitSwiper() {
          var product_card_swiper = new Swiper(".products-card-swiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
              900: {
                slidesPerView: 3,
                spaceBetween: 50,
              },
            },
          });
          var shade_swiper = new Swiper(".shade-swiper", {
            slidesPerView: 4,
            spaceBetween: 50,
          }); // const swiper_product_cate = new Swiper(".swiper-product-cate", {
          //   slidesPerView: 3,
          //   spaceBetween: 20,
          // });

          var product_owner = new Swiper(
            ".products-card-owner-develop-swiper",
            {
              slidesPerView: 1,
            }
          );
          var home_banner = new Swiper(".home-banner-swiper", {
            speed: 1000,
            autoplay: {
              delay: 3000, // disableOnInteraction: false,
            },
            pagination: {
              el: ".banner-pagination",
            },
          });
          var project_home_suggestion = new Swiper(".project_home_suggestion", {
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
          var footer_banner = new Swiper(".footer_banner", {
            // loop: true,
            pagination: {
              el: ".swiper-pagination",
            },
          });
          var newSwiper = new Swiper(".new-swiper", {
            pagination: {
              el: ".swiper-pagination",
            },
          });
          var shadeSuggestion = new Swiper(".shade-suggestion", {
            pagination: {
              el: ".shade-pagination",
            },
          });
          var newsSwiper = new Swiper(".news-swiper", {
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
          var swiper_project = new Swiper(".swiper-project", {
            pagination: {
              el: ".swiper-pagination",
            },
          }); // const swiper_projects = new Swiper(".swiper-projects", {
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

          var projectG2 = new Swiper(".project-swiper2", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
          });
          var projectG1 = new Swiper(".project-swiper1", {
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
          if (loading) loading.className = "hide"; // const prev_id = document.querySelector("#prev-id");
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

        var homePageHeaderOnFixed = function homePageHeaderOnFixed() {
          window.addEventListener("scroll", function () {
            var element = window;

            try {
              var _scrollTop =
                window.pageYOffset || document.documentElement.scrollTop;

              var home_header = document.querySelector("#home_header");

              if (element && home_header) {
                if (element.offsetTop <= _scrollTop) {
                  if (!home_header.className.match(/home_header_fixed/)) {
                    home_header.className += " home_header_fixed";
                  }
                } else {
                  var ddd = home_header.className
                    .split(" ")
                    .filter(function (c) {
                      return c != "home_header_fixed";
                    })
                    .join(" ");
                  home_header.className = ddd;
                }
              }
            } catch (error) {}
          });
        };

        var onClickedHeader = function onClickedHeader() {
          var _header$className$mat;

          var header = document.querySelector("header#home_header");
          var menuTop = document.querySelectorAll("#menu-top-menu > li");
          if (!header) header = document.querySelector("header#page");

          if (
            (_header$className$mat =
              header.className.match("header-active")) !== null &&
            _header$className$mat !== void 0 &&
            _header$className$mat.length
          ) {
            var _ddd = header.className
              .split(" ")
              .filter(function (c) {
                return c != "header-active";
              })
              .join(" ");

            header.className = _ddd;
            Array.from(menuTop).forEach(function (_menu) {
              var _menu$className$match;

              if (
                (_menu$className$match =
                  _menu.className.match("menu-active")) !== null &&
                _menu$className$match !== void 0 &&
                _menu$className$match.length
              ) {
                var ddd = _menu.className
                  .split(" ")
                  .filter(function (c) {
                    return c != "menu-active";
                  })
                  .join(" ");

                _menu.className = ddd;

                if (element.offsetTop > scrollTop) {
                  var _ddd2 = header.className
                    .split(" ")
                    .filter(function (c) {
                      return c != "home_header_fixed";
                    })
                    .join(" ");

                  header.className = _ddd2;
                }
              }
            });
          }
        };

        var headerClicked = function headerClicked() {
          var menuTop = document.querySelectorAll("#menu-top-menu > li"); // console.log({ menuTop });

          var header = document.querySelector("#home_header");
          var bk_header = document.querySelector(".bk-header");
          if (!header) header = document.querySelector("#page");

          if (menuTop && header && bk_header) {
            bk_header.addEventListener("click", function () {
              onClickedHeader();
            });
            Array.from(menuTop).forEach(function (menu) {
              menu
                .querySelector("a")
                .addEventListener("click", function (event) {
                  // if (menu.querySelector("a").href.match("#"))
                  if (menu.querySelector("a").href.match(/#/)) {
                    var _menu$className$match3;

                    event.preventDefault();
                    Array.from(menuTop).forEach(function (_menu) {
                      var _menu$className$match2;

                      if (
                        (_menu$className$match2 =
                          _menu.className.match("menu-active")) !== null &&
                        _menu$className$match2 !== void 0 &&
                        _menu$className$match2.length
                      ) {
                        var ddd = _menu.className
                          .split(" ")
                          .filter(function (c) {
                            return c != "menu-active";
                          })
                          .join(" ");

                        _menu.className = ddd;

                        var _ddd = header.className
                          .split(" ")
                          .filter(function (c) {
                            return c != "home_header_fixed";
                          })
                          .join(" ");

                        header.className = _ddd;
                      }
                    });

                    if (
                      (_menu$className$match3 =
                        menu.className.match("menu-active")) !== null &&
                      _menu$className$match3 !== void 0 &&
                      _menu$className$match3.length
                    ) {
                      var ddd = menu.className
                        .split(" ")
                        .filter(function (c) {
                          return c != "menu-active";
                        })
                        .join(" ");
                      menu.className = ddd; // const _ddd = header.className
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

        var searchShade = function searchShade() {
          var search_selected = document.querySelector("#search-select");

          if (search_selected) {
            document
              .querySelector(".select-input")
              .addEventListener("click", function () {
                if (search_selected.className.match(/selected-active/)) {
                  var _className = search_selected.className
                    .split(" ")
                    .filter(function (c) {
                      return c !== "selected-active";
                    })
                    .join(" "); // console.log({ _className });

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

        var onChangeColorFilter = function onChangeColorFilter(type, value) {
          var rgb_div = document.querySelector("#rgb-div");
          var hex_div = document.querySelector("#hex-div");
          var cmyk_div = document.querySelector("#cmyk-div");
          searchType = type;

          if (rgb_div && hex_div && cmyk_div) {
            rgb_div.className = "";
            hex_div.className = "";
            cmyk_div.className = "";
            document.querySelector("#".concat(type)).className = "active";
            document.querySelector("#search_type").value = value;
            var search_selected = document.querySelector("#search-select");

            if (search_selected.className.match(/selected-active/)) {
              var _className = search_selected.className
                .split(" ")
                .filter(function (c) {
                  return c !== "selected-active";
                })
                .join(" "); // console.log({ _className });

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

        var onPageShadeInit = function onPageShadeInit() {
          // if (firstPostId) showListOfFamilyColorThisShade(firstPostId);
          var shade_filter = document.querySelector("#shade-filter");
          if (shade_filter)
            shade_filter.addEventListener("change", function (event) {
              showListOfFamilyColorThisShade(+event.target.value);
            });
          var shade_swiper = new Swiper(".shade-swiper", {
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

        var onHideShowVDOLink = function onHideShowVDOLink() {
          var show_video_link = document.querySelector(".show-video-link");
          var video_link = document.querySelector(".video-link > img");

          if (show_video_link) {
            show_video_link.addEventListener("click", function () {
              if (show_video_link.className.match("show").length) {
                var _className = show_video_link.className
                  .split(" ")
                  .filter(function (c) {
                    return c != "show";
                  });

                show_video_link.className = _className;
              }
            }); // show_video_link
          }

          if (video_link) {
            video_link.addEventListener("click", function () {
              show_video_link.className += " show";
            });
          }
        };

        var onSelectedFilterOnClick = function onSelectedFilterOnClick() {
          var product_filter_input = document.querySelector(
            "#product_filter .select-input #show_product"
          );
          var cate_filter_input = document.querySelector(
            "#categories_project_filter .select-input input"
          );
          var product_filter = document.querySelector("#product_filter ul");
          var categories_project_filter = document.querySelector(
            "#categories_project_filter ul"
          );
          var bk_filter_select = document.querySelector(".bk-filter-select");

          if (cate_filter_input && categories_project_filter) {
            cate_filter_input.addEventListener("click", function (event) {
              if (categories_project_filter.className.match("active")) {
                categories_project_filter.className = "";
                bk_filter_select.className = "bk-filter-select";
                document.querySelector(".cgi").className =
                  "bi bi-chevron-down cgi";
              } else {
                categories_project_filter.className = "active";
                bk_filter_select.className = "bk-filter-select active";
                document.querySelector(".cgi").className += " active";
              }
            });
          }

          if (product_filter_input && product_filter) {
            product_filter_input.addEventListener("click", function (event) {
              if (product_filter.className.match("active")) {
                product_filter.className = "";
                bk_filter_select.className = "bk-filter-select";
                document.querySelector(".pfi").className =
                  "bi bi-chevron-down pfi";
              } else {
                document.querySelector(".pfi").className += " active";
                product_filter.className = "active";
                bk_filter_select.className = "bk-filter-select active";
              }
            });
          }

          if (bk_filter_select) {
            bk_filter_select.addEventListener("click", function () {
              // if(bk_filter_select.className.match()
              bk_filter_select.className = "bk-filter-select";
              categories_project_filter.className = "";
              product_filter.className = "";
              document.querySelector(".pfi").className =
                "bi bi-chevron-down pfi";
              document.querySelector(".cgi").className =
                "bi bi-chevron-down cgi";
            });
          }
        };

        var select_product_id = function select_product_id(name, id) {
          var product_filter = document.querySelector("#product_filter ul");

          var _product_value = document.querySelector("#show_product");

          var _product_value_ = document.querySelector(
            "input[name=filter_product]"
          );

          _product_value.value = name;
          _product_value_.value = id;
          product_filter.className = "";
          document.querySelector(".pfi").className = "bi bi-chevron-down pfi"; // window.location.href = "?filter_product=" + id;
        };

        var select_project_name = function select_project_name(name, id) {
          var categories_project_filter = document.querySelector(
            "#categories_project_filter ul"
          );

          var _product_value = document.querySelector("#show_cate");

          var _product_value_ = document.querySelector("input[name=type]");

          _product_value.value = name;
          _product_value_.value = id;
          categories_project_filter.className = "";
          document.querySelector(".cgi").className = "bi bi-chevron-down cgi"; // window.location.href = "?filter_product=" + id;
        };

        var handleHeaderMobile = function handleHeaderMobile() {
          var header_mobile_close = document.querySelector(
            "#header_mobile_close"
          );
          var header_mobiles = document.querySelector("#header_mobiles");
          var show_menus_mobile = document.querySelector(".show-menus-mobile");

          if (show_menus_mobile) {
            show_menus_mobile.addEventListener("click", function (event) {
              if (!header_mobiles.className)
                header_mobiles.className = "active";
              else header_mobiles.className = "";
            });
          }

          if (header_mobile_close) {
            header_mobile_close.addEventListener("click", function (event) {
              if (!header_mobiles.className)
                header_mobiles.className = "active";
              else header_mobiles.className = "";
            });
          }
        };

        var handleMenuClickedShowSubMenu =
          function handleMenuClickedShowSubMenu() {
            var menu_top_menu_online = document.querySelectorAll(
              "#menu-top-menu-online > li"
            );

            if (menu_top_menu_online) {
              Array.from(menu_top_menu_online).map(function (menu) {
                // menu.className += " active";
                menu.addEventListener("click", function (event) {
                  // console.log({ c:});
                  if (menu.children[1]) {
                    console.log({
                      g: menu.children[1].className.match(/active/),
                    });

                    if (menu.children[1].className.match(/active/)) {
                      menu.children[1].className = menu.children[1].className
                        .split(" ")
                        .filter(function (m) {
                          return m !== "active";
                        })
                        .join(" ");
                    } else {
                      menu.children[1].className = " active";
                    }
                  }
                }); // console.log({ menu });
              });
            }
          };

        function handleFilterProductMobile() {
          var filter_product_close = document.querySelector(
            "#filter_product_close"
          );
          var filter_product_mobiles = document.querySelector(
            "#filter_product_mobiles"
          );
          var product_cate = document.querySelectorAll(
            ".filter-content .product-cate-card"
          );
          var filter_button = document.querySelector(".filter-button");

          if (filter_product_close) {
            filter_product_close.addEventListener("click", function (event) {
              filter_product_mobiles.className = "";
            });
          }

          if (filter_button) {
            filter_button.addEventListener("click", function (event) {
              filter_product_mobiles.className = "active";
            });
          }

          if (filter_product_mobiles) {
            // console.log({ product_cate });
            // if (filter_product_mobiles.className === "active") {
            Array.from(product_cate).forEach(function (productCate) {
              productCate.addEventListener("click", function (event) {
                if (productCate.className.match("active")) {
                  productCate.className = " product-cate-card";
                } else {
                  productCate.className = "product-cate-card active";
                }
              });
            }); // }
          }
        }

        function handleFooterMenuClicked() {
          var footer_menu_mobile = document.querySelectorAll(
            ".footer-menu-mobile > div > ul > li"
          );

          if (footer_menu_mobile) {
            Array.from(footer_menu_mobile).forEach(function (ele) {
              // console.log({ d: ele.children });
              if (ele.children[0]) {
                ele.children[0].addEventListener("click", function (event) {
                  event.preventDefault();
                  if (ele.className.match("active"))
                    ele.className = ele.className
                      .split(" ")
                      .filter(function (c) {
                        return c != "active";
                      })
                      .join(" ");
                  else ele.className += " active";
                });
              }
            });
          }
        }

        window.onload = function () {
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
              if (family_colors.length)
                findColorClose([0, 0, 0], "rgb", family_colors);
            }

            if (firstPostId) {
              onPageShadeInit();
            }
          } catch (error) {}
        };

        function solutionChange(id) {
          console.log({
            id: id,
          });
          if (loading) loading.className = "";
          var solution_div = document.querySelectorAll(".solution-div div");
          var info_solution = document.querySelector("#info-solution");
          info_solution.style.display = "block";
          var solution_div_array = Array.from(solution_div);
          console.log({
            solution_div_array: solution_div_array,
          });

          if (
            solution_div_array !== null &&
            solution_div_array !== void 0 &&
            solution_div_array.length
          ) {
            for (var i = 0; i < solution_div_array.length; i++) {
              var _sDiv$className$match, _sDiv$id$match;

              var sDiv = solution_div_array[i];
              if (
                (_sDiv$className$match =
                  sDiv.className.match("card-active")) !== null &&
                _sDiv$className$match !== void 0 &&
                _sDiv$className$match.length
              )
                sDiv.className = "";
              if (
                (_sDiv$id$match = sDiv.id.match("solution" + id)) !== null &&
                _sDiv$id$match !== void 0 &&
                _sDiv$id$match.length
              )
                sDiv.className = "card-active";
            }
          }

          fetch(domain + "/wp-json/wp/v2/solutions/" + id)
            .then(function (data) {
              // console.log({ data });
              return data.json();
            })
            .then(function (data) {
              console.log({
                data: data,
              });

              if (data.acf) {
                var _data$acf = data.acf,
                  _data$acf$fixed = _data$acf.fixed,
                  step1 = _data$acf$fixed.step1,
                  step2 = _data$acf$fixed.step2,
                  step3 = _data$acf$fixed.step3,
                  problem = _data$acf.problem;
                var step1_title = document.querySelector("#step1_title");
                step1_title.innerHTML = step1.title;
                var step2_title = document.querySelector("#step2_title");
                step2_title.innerHTML = step2.title;
                var step3_title = document.querySelector("#step3_title");
                step3_title.innerHTML = step3.title; //

                var step1_detail = document.querySelector("#step1_detail");
                step1_detail.innerHTML = step1.detail;
                var step2_detail = document.querySelector("#step2_detail");
                step2_detail.innerHTML = step2.detail;
                var step3_detail = document.querySelector("#step3_detail");
                step3_detail.innerHTML = step3.detail;
                console.log({
                  g: step1.image,
                });

                if (step1.image) {
                  var step1_image = document.querySelector("#step1_image");
                  step1_image.src = step1.image.sizes.thumbnail;
                }

                if (step2.image) {
                  var step2_image = document.querySelector("#step2_image");
                  step2_image.src = step2.image.sizes.thumbnail;
                }

                if (step3.image) {
                  var step3_image = document.querySelector("#step3_image");
                  step3_image.src = step3.image.sizes.thumbnail;
                } //

                console.log({
                  problem: problem.after_image,
                });

                if (problem.after_image) {
                  var before_image_problem = document.querySelector(
                    "#before_image_problem"
                  );
                  before_image_problem.src = problem.before_image.url;
                  var after_image_problem = document.querySelector(
                    "#after_image_problem"
                  );
                  after_image_problem.src = problem.after_image.url;
                }

                if (problem.title) {
                  var problem_title = document.querySelector("#problem_title");
                  problem_title.innerHTML = problem.title;
                  var problem_sub_title =
                    document.querySelector("#problem_sub_title");
                  problem_sub_title.innerHTML = problem.sub_title;
                  var problem_result =
                    document.querySelector("#problem_result");
                  problem_result.innerHTML = problem.result;
                  var problem_cause = document.querySelector("#problem_cause");
                  problem_cause.innerHTML = problem.cause;
                }
              }

              if (loading) loading.className = "hide"; // console.log({ data });
            })
            ["catch"](function (error) {
              console.log({
                error: error,
              });
            });
        }

        function onSearchColor() {
          if (searchType === "rgb-div") {
            var r = document.querySelector("#r").value;
            var g = document.querySelector("#g").value;
            var b = document.querySelector("#b").value;
            findColorClose([+r, +g, +b], "rgb", family_colors);
          }

          if (searchType === "hex-div") {
            var hex = document.querySelector("#hex").value; // console.log({ hex });

            var _hexToRGB2 = hexToRGB(hex),
              array = _hexToRGB2.array;

            findColorClose(array, "rgb", family_colors);
          }

          if (searchType === "cmyk-div") {
            var c = document.querySelector("#c").value;
            var m = document.querySelector("#m").value;
            var y = document.querySelector("#y").value;
            var k = document.querySelector("#k").value;

            var _cmyk2rgb = cmyk2rgb(c, m, y, k, false),
              _r = _cmyk2rgb.r,
              _g = _cmyk2rgb.g,
              _b = _cmyk2rgb.b;

            findColorClose([+_r, +_g, +_b], "rgb", family_colors);
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
          var r = 1 - c;
          var g = 1 - m;
          var b = 1 - y;

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

        function loadLocation() {
          var province = {};
          var districts = {};
          var countryElement = document.querySelector("#country");
          var provinceElement = document.querySelector("#province");
          var districtElement = document.querySelector("#district");

          if (provinceElement && districtElement && countryElement) {
            countryElement.addEventListener("change", function (event) {
              var value = event.target.value;

              if (value.toUpperCase() === "TH") {
                Promise.all([
                  fetch(
                    "https://staging.tanpong.me/wp-content/themes/nippontheme/assets/json/province.json"
                  ),
                  fetch(
                    "https://staging.tanpong.me/wp-content/themes/nippontheme/assets/json/districts.json"
                  ),
                ]).then(function (d) {
                  var _d2 = _slicedToArray(d, 2),
                    _province = _d2[0],
                    _districts = _d2[1];

                  _province.json().then(function (p) {
                    // province.push(p);
                    while (provinceElement.lastElementChild) {
                      if (provinceElement.lastElementChild.value == "") break;
                      provinceElement.removeChild(
                        provinceElement.lastElementChild
                      );
                    }

                    Array.from(p).forEach(function (d) {
                      if (!province[d.PROVINCE_ID]) province[d.PROVINCE_ID] = d;
                      var createOption = document.createElement("option");
                      createOption.value = d.PROVINCE_ID;
                      createOption.innerHTML = d.PROVINCE_NAME;
                      provinceElement.appendChild(createOption);
                    }); // console.log({ province });
                  });

                  _districts.json().then(function (d) {
                    districts = d.reduce(function (obj, data) {
                      if (!obj[data.PROVINCE_ID]) obj[data.PROVINCE_ID] = [];
                      obj[data.PROVINCE_ID].push(data);
                      return obj;
                    }, {});
                    console.log({
                      districts: districts,
                    });
                  });
                });
              }
            });
            provinceElement.addEventListener("change", function (event) {
              var value = event.target.value;
              var district = districts[value];
              console.log({
                district: district,
              });

              while (districtElement.lastElementChild) {
                if (
                  districtElement.lastElementChild.value == "" ||
                  districtElement.lastElementChild.value == "เมือง"
                )
                  break;
                districtElement.removeChild(districtElement.lastElementChild);
              }

              Array.from(district).forEach(function (d) {
                var createOption = document.createElement("option");
                createOption.value = d.DISTRICT_NAME;
                createOption.innerHTML = d.DISTRICT_NAME;
                districtElement.appendChild(createOption);
              });
            });
            var cat_product = document.querySelector("#cat_product");
            document
              .querySelector("#location_search")
              .addEventListener("click", function (event) {
                var provinceValue = provinceElement.value;
                var districtValue = districtElement.value;
                var countryValue = countryElement.value;
                var catProductValue = cat_product.value;
                var search = "";
                var search_all = "";

                if (catProductValue) {
                  search += "?cat_product=" + catProductValue; // "&country=" +
                  // countryValue +
                  // "&province=" +
                  // province[provinceValue].PROVINCE_NAME;

                  if (countryValue) {
                    search += "&country=" + catProductValue;
                  }

                  if (provinceValue) {
                    search +=
                      "&province=" + province[provinceValue].PROVINCE_NAME;
                    search_all =
                      districtValue +
                      " " +
                      province[provinceValue].PROVINCE_NAME;
                  }
                } else {
                  // search +=
                  //   "?country=" +
                  //   countryValue +
                  //   "&province=" +
                  //   province[provinceValue].PROVINCE_NAME;
                  if (countryValue) {
                    search += "?country=" + catProductValue;
                  }

                  if (provinceValue) {
                    search +=
                      "&province=" + province[provinceValue].PROVINCE_NAME;
                    search_all =
                      districtValue +
                      " " +
                      province[provinceValue].PROVINCE_NAME;
                  }
                } // let search_all = province[provinceValue].PROVINCE_NAME;
                // if (districtValue) {
                //   search += "&district=" + districtValue;
                // }

                console.log({
                  search_all: search_all,
                });
                window.location.href = search + "&search=" + search_all;
              });
          }
        }

        /***/
      },

    /***/ "./src/main.scss":
      /*!***********************!*\
  !*** ./src/main.scss ***!
  \***********************/
      /***/ (
        __unused_webpack_module,
        __webpack_exports__,
        __webpack_require__
      ) => {
        "use strict";
        __webpack_require__.r(__webpack_exports__);
        // extracted by mini-css-extract-plugin

        /***/
      },

    /******/
  };
  /************************************************************************/
  /******/ // The module cache
  /******/ var __webpack_module_cache__ = {};
  /******/
  /******/ // The require function
  /******/ function __webpack_require__(moduleId) {
    /******/ // Check if module is in cache
    /******/ var cachedModule = __webpack_module_cache__[moduleId];
    /******/ if (cachedModule !== undefined) {
      /******/ return cachedModule.exports;
      /******/
    }
    /******/ // Create a new module (and put it into the cache)
    /******/ var module = (__webpack_module_cache__[moduleId] = {
      /******/ // no module.id needed
      /******/ // no module.loaded needed
      /******/ exports: {},
      /******/
    });
    /******/
    /******/ // Execute the module function
    /******/ __webpack_modules__[moduleId](
      module,
      module.exports,
      __webpack_require__
    );
    /******/
    /******/ // Return the exports of the module
    /******/ return module.exports;
    /******/
  }
  /******/
  /******/ // expose the modules object (__webpack_modules__)
  /******/ __webpack_require__.m = __webpack_modules__;
  /******/
  /************************************************************************/
  /******/ /* webpack/runtime/chunk loaded */
  /******/ (() => {
    /******/ var deferred = [];
    /******/ __webpack_require__.O = (result, chunkIds, fn, priority) => {
      /******/ if (chunkIds) {
        /******/ priority = priority || 0;
        /******/ for (
          var i = deferred.length;
          i > 0 && deferred[i - 1][2] > priority;
          i--
        )
          deferred[i] = deferred[i - 1];
        /******/ deferred[i] = [chunkIds, fn, priority];
        /******/ return;
        /******/
      }
      /******/ var notFulfilled = Infinity;
      /******/ for (var i = 0; i < deferred.length; i++) {
        /******/ var [chunkIds, fn, priority] = deferred[i];
        /******/ var fulfilled = true;
        /******/ for (var j = 0; j < chunkIds.length; j++) {
          /******/ if (
            (priority & (1 === 0) || notFulfilled >= priority) &&
            Object.keys(__webpack_require__.O).every((key) =>
              __webpack_require__.O[key](chunkIds[j])
            )
          ) {
            /******/ chunkIds.splice(j--, 1);
            /******/
          } else {
            /******/ fulfilled = false;
            /******/ if (priority < notFulfilled) notFulfilled = priority;
            /******/
          }
          /******/
        }
        /******/ if (fulfilled) {
          /******/ deferred.splice(i--, 1);
          /******/ result = fn();
          /******/
        }
        /******/
      }
      /******/ return result;
      /******/
    };
    /******/
  })();
  /******/
  /******/ /* webpack/runtime/hasOwnProperty shorthand */
  /******/ (() => {
    /******/ __webpack_require__.o = (obj, prop) =>
      Object.prototype.hasOwnProperty.call(obj, prop);
    /******/
  })();
  /******/
  /******/ /* webpack/runtime/make namespace object */
  /******/ (() => {
    /******/ // define __esModule on exports
    /******/ __webpack_require__.r = (exports) => {
      /******/ if (typeof Symbol !== "undefined" && Symbol.toStringTag) {
        /******/ Object.defineProperty(exports, Symbol.toStringTag, {
          value: "Module",
        });
        /******/
      }
      /******/ Object.defineProperty(exports, "__esModule", { value: true });
      /******/
    };
    /******/
  })();
  /******/
  /******/ /* webpack/runtime/jsonp chunk loading */
  /******/ (() => {
    /******/ // no baseURI
    /******/
    /******/ // object to store loaded and loading chunks
    /******/ // undefined = chunk not loaded, null = chunk preloaded/prefetched
    /******/ // [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
    /******/ var installedChunks = {
      /******/ "/assets/js/main": 0,
      /******/ "assets/css/main": 0,
      /******/
    };
    /******/
    /******/ // no chunk on demand loading
    /******/
    /******/ // no prefetching
    /******/
    /******/ // no preloaded
    /******/
    /******/ // no HMR
    /******/
    /******/ // no HMR manifest
    /******/
    /******/ __webpack_require__.O.j = (chunkId) =>
      installedChunks[chunkId] === 0;
    /******/
    /******/ // install a JSONP callback for chunk loading
    /******/ var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
      /******/ var [chunkIds, moreModules, runtime] = data;
      /******/ // add "moreModules" to the modules object,
      /******/ // then flag all "chunkIds" as loaded and fire callback
      /******/ var moduleId,
        chunkId,
        i = 0;
      /******/ for (moduleId in moreModules) {
        /******/ if (__webpack_require__.o(moreModules, moduleId)) {
          /******/ __webpack_require__.m[moduleId] = moreModules[moduleId];
          /******/
        }
        /******/
      }
      /******/ if (runtime) var result = runtime(__webpack_require__);
      /******/ if (parentChunkLoadingFunction) parentChunkLoadingFunction(data);
      /******/ for (; i < chunkIds.length; i++) {
        /******/ chunkId = chunkIds[i];
        /******/ if (
          __webpack_require__.o(installedChunks, chunkId) &&
          installedChunks[chunkId]
        ) {
          /******/ installedChunks[chunkId][0]();
          /******/
        }
        /******/ installedChunks[chunkIds[i]] = 0;
        /******/
      }
      /******/ return __webpack_require__.O(result);
      /******/
    };
    /******/
    /******/ var chunkLoadingGlobal = (self["webpackChunk"] =
      self["webpackChunk"] || []);
    /******/ chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
    /******/ chunkLoadingGlobal.push = webpackJsonpCallback.bind(
      null,
      chunkLoadingGlobal.push.bind(chunkLoadingGlobal)
    );
    /******/
  })();
  /******/
  /************************************************************************/
  /******/
  /******/ // startup
  /******/ // Load entry module and return exports
  /******/ // This entry module depends on other loaded chunks and execution need to be delayed
  /******/ __webpack_require__.O(undefined, ["assets/css/main"], () =>
    __webpack_require__("./src/app.js")
  );
  /******/ var __webpack_exports__ = __webpack_require__.O(
    undefined,
    ["assets/css/main"],
    () => __webpack_require__("./src/main.scss")
  );
  /******/ __webpack_exports__ = __webpack_require__.O(__webpack_exports__);
  /******/
  /******/
})();
