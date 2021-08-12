function compareProduct(e, url) {
  const button_search = document.querySelector("#button_search");
  //   button_search.addEventListener("click", (e) => {
  e.preventDefault();
  let _product_url = "";
  let _index = 0;
  ["product_1", "product_2", "product_3"].map((id, ind) => {
    const element = document.querySelector("#" + id);
    console.log({ [id]: element.value });
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
  $index = _cate.children.length;
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
        createOption(_cate, "", "", "Select");
      });

      ["cate1", "cate2", "cate3"].forEach((ele, index) => {
        const _cate = document.querySelector("#" + ele);
        // removeChildElementSelect(product_2);

        removeChildElementSelect(_cate, ele);
        createOption(_cate, "", "", "Select");
        if (d.product_term.length) {
          compare_cate_2.style.display = "flex";
        } else {
          compare_cate_2.style.display = "none";
        }
        d.product_term.forEach((term) => {
          console.log({ term });

          createOption(_cate, "cate_grade_" + index, term.term_id, term.name);
        });
      });
    })
    .catch((error) => console.log({ error }));
  console.log(mainCate.value);
  //   });
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
      .catch((e) => rej(errpr));
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
  const cate2 = document.querySelector("#cate2");
  const cate3 = document.querySelector("#cate3");
  console.log({ selected2_id });
  // compare-product-body
  // console.log({ c: cate1.value });
  if (!cate1.value) return;
  const url = domain + "/wp-json/api/v1/find_product";
  const data = {
    product_cat: cate1.value,
  };
  createOption(product_1, "", "", "select");
  fetchFunctionCate(url, data).then((d) => {
    // console.log({ d });
    const { products = [] } = d;
    const product_1 = document.querySelector("#product_1");

    removeChildElementSelect(product_1);
    createOption(product_1, "", "", "select");
    products.forEach((product, i) => {
      createOption(product_1, "product_" + i, product.product_id, product.name);
      cate2.disabled = false;
      cate3.disabled = false;
    });
  });
}
function onProductCate2Changed() {
  const cate2 = document.querySelector("#cate2");
  const url = domain + "/wp-json/api/v1/find_product";
  const data = {
    product_cat: cate2.value,
  };
  fetchFunctionCate(url, data).then((d) => {
    // console.log({ d });
    const { products = [] } = d;
    const product_2 = document.querySelector("#product_2");
    removeChildElementSelect(product_2);
    createOption(product_2, "", "", "select");
    products.forEach((product, i) => {
      createOption(product_2, "product_" + i, product.product_id, product.name);
    });
  });
}
function onProductCate3Changed() {
  const cate3 = document.querySelector("#cate3");
  const url = domain + "/wp-json/api/v1/find_product";
  const data = {
    product_cat: cate3.value,
  };
  createOption(product_3, "", "", "select");

  fetchFunctionCate(url, data).then((d) => {
    // console.log({ d });
    const { products = [] } = d;
    const product_3 = document.querySelector("#product_3");
    removeChildElementSelect(product_3);
    createOption(product_3, "", "", "select");

    products.forEach((product, i) => {
      createOption(product_3, "product_" + i, product.product_id, product.name);
    });
  });
}
