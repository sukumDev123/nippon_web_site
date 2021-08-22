function compareProduct(e, url) {
  const button_search = document.querySelector("#button_search");
  //   button_search.addEventListener("click", (e) => {
  e.preventDefault();
  let _product_url = "";
  let _index = 0;
  [
    "product_1",
    "product_2",
    "product_3",
    "mainCate",
    "cate1",
    "cate2",
    "cate3",
  ].map((id, ind) => {
    const element = document.querySelector("#" + id);
    // console.log({ [id]: element.value });
    if (element)
      if (element.value) {
        if (_index == 0) _product_url += `?${[id]}=${element.value}`;
        else _product_url += `&${[id]}=${element.value}`;
        _index++;
      }
  });
  // console.log({  });
  if (_product_url) {
    window.location.href = url + _product_url;
  }
  //   });
  // window
}

function removeChildElementSelect(_cate, ele) {
  // $index = _cate.children.length;

  while (_cate.firstChild) {
    _cate.removeChild(_cate.firstChild);
    // --$index;
    // if ($index == 1) {
    //   break;
    // }
  }
}

function mainCateChanged() {
  const mainCate = document.querySelector("#mainCate");
  const url = domain + "/wp-json/api/v1/product_cate";
  const compare_cate_2 = document.querySelector("#compare_cate_2");
  //   mainCate.addEventListener("change", (e) => {
  const data = {
    product_cat: mainCate.value,
  };

  fetchFunctionCate(url, data)
    .then((d) => {
      // const grade = document;

      ["product_1", "product_2", "product_3"].forEach((element) => {
        const _cate = document.querySelector("#" + element);
        removeChildElementSelect(_cate, element);
        createOption(_cate, "", "", "เลือกเกรด");
      });
      // console.log({ d: d.product_term.length });
      if (d.product_term.length) {
        compare_cate_2.style.display = "flex";
        ["cate1", "cate2", "cate3"].forEach((ele, index) => {
          const _cate = document.querySelector("#" + ele);
          removeChildElementSelect(_cate, ele);
          createOption(_cate, "", "", "เลือกเกรด");
          d.product_term.forEach((term) => {
            console.log({ term });
            createOption(_cate, "cate_grade_" + index, term.name, term.name);
          });
        });
      } else {
        const url2 = domain + "/wp-json/api/v1/find_product";
        ["cate1", "cate2", "cate3"].forEach((element) => {
          const _cate = document.querySelector("#" + element);
          _cate.style.display = "none";
          _cate.value = "";
        });
        const data = {
          cate_main: mainCate.value,
          // sub_cate: mainCate.value,
        };
        fetchFunctionCate(url2, data).then((d) => {
          const { products = [] } = d;
          console.log({ products });
          ["product_1", "product_2", "product_3"].forEach((ele, i) => {
            const product_1 = document.querySelector("#" + ele);
            removeChildElementSelect(product_1);
            createOption(product_1, "", "", "เลือกเกรด");
            products.forEach((product, i) => {
              createOption(
                product_1,
                `product-option-${ele}-i`,
                product.product_id,
                product.name
              );
            });
          });
        });
      }
    })
    .catch((error) => console.log({ error }));
}

function fetchFunctionCate(url, data) {
  loadingOn();
  return new Promise((res, rej) => {
    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((d) => d.json())
      .then((d) => {
        loadingOff();
        res(d);
      })
      .catch((e) => rej(e));
  });
}

function createOption(mainElement, id, value, text) {
  const option = document.createElement("option");
  option.id = id;
  option.value = value;
  option.innerHTML = text;
  mainElement.appendChild(option);
}

function onProductCate1Changed(selected2_id) {
  const cate1 = document.querySelector("#cate1");
  const mainCate = document.querySelector("#mainCate");

  if (!cate1.value) return;
  const url = domain + "/wp-json/api/v1/find_product_grade";
  const data = {
    cate_main: mainCate.value,
    cate_sub: cate1.value,
  };
  const product_1 = document.querySelector("#product_1");

  removeChildElementSelect(product_1);
  createOption(product_1, "", "", "เลือกผลิตภัณฑ์");
  fetchFunctionCate(url, data).then((d) => {
    const { products = [] } = d;

    products.forEach((product, i) => {
      createOption(
        product_1,
        "product-option-" + i,
        product.product_id,
        product.name
      );
    });
  });
}
function onProductCate2Changed() {
  const cate2 = document.querySelector("#cate2");
  const url = domain + "/wp-json/api/v1/find_product_grade";
  const data = {
    cate_main: mainCate.value,
    cate_sub: cate2.value,
  };
  const product_2 = document.querySelector("#product_2");
  removeChildElementSelect(product_2);
  createOption(product_2, "", "", "เลือกผลิตภัณฑ์");
  fetchFunctionCate(url, data).then((d) => {
    const { products = [] } = d;
    products.forEach((product, i) => {
      createOption(
        product_2,
        "product-option-2-" + i,
        product.product_id,
        product.name
      );
    });
  });
}
function onProductCate3Changed() {
  const cate3 = document.querySelector("#cate3");
  const url = domain + "/wp-json/api/v1/find_product_grade";
  const data = {
    cate_main: mainCate.value,
    cate_sub: cate3.value,
  };
  const product_3 = document.querySelector("#product_3");
  removeChildElementSelect(product_3);
  createOption(product_3, "", "", "เลือกผลิตภัณฑ์");
  fetchFunctionCate(url, data).then((d) => {
    const { products = [] } = d;
    products.forEach((product, i) => {
      createOption(
        product_3,
        "product-option-3-" + i,
        product.product_id,
        product.name
      );
    });
  });
}

function onProduct1Selected() {
  const product_1 = document.querySelector("#product_1");
  const cate2 = document.querySelector("#cate2");
  const cate3 = document.querySelector("#cate3");
  const product_2 = document.querySelector("#product_2");
  const product_3 = document.querySelector("#product_3");
  console.log({ c: product_1.value });
  if (product_1.value) {
    cate3.disabled = false;
    cate2.disabled = false;
    product_2.disabled = false;
    product_3.disabled = false;
  } else {
    cate3.value = "";
    cate2.value = "";
    product_2.value = "";
    product_3.value = "";
    product_2.disabled = true;
    product_3.disabled = true;
    cate3.disabled = true;
    cate2.disabled = true;
  }
}
