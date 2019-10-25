'use strict';

function el(selector) {
    return document.querySelector(selector);
}

function makeProductItem($template, product) {
    $template
        .querySelector('.win')
        .setAttribute('productId', product.id);
    $template.querySelector('.product-name').textContent = product.name;
    var pictures = product.picture.split(",");
    $template
        .querySelector('.card-img-top')
        .setAttribute('src', 'assets/images/products/' + pictures[0]);
    $template.querySelector('img').setAttribute('alt', product.name);
    $template.querySelector('.product-price').textContent = product.price;
    return $template;
}

function addProductToCart(content, item) {
    content.querySelector('.item-title').textContent = item.querySelector(
        '.product-name'
    ).textContent;

    content.querySelector('.item-price').textContent = item.querySelector(
        '.product-price'
    ).textContent;

    content
        .querySelector('.item-price')
        .setAttribute(
            'price',
            item.querySelector('.product-price').textContent
        );

    content.querySelector('.item-img').style.backgroundImage =
        'url(' + item.querySelector('img').getAttribute('src') + ')';
    return content;
}

function slideItem(content, item, i) {
    content.querySelector(".carousel-item__title").textContent = item.name;
    // content.querySelector('.carousel-item__subtitle').textContent = item.subtitle[i];
    content.querySelector(".carousel-item__subtitle").textContent = item.name;
  
    content.querySelector(".carousel-item__description").textContent =
      item.description;
  
    content.querySelector(".carousel-item__image").style.backgroundImage =
      "url(/assets/images/products/" + item.picture.split(",")[i] + ")";
  
    return content;
  }

function carousel(data) {
    let carouselItem = el('#carouselItem').content;

    let detailTemplate = el('#productDetail').content;

    let pictures = data.picture.split(",");
    
    for (let i = 0; i < pictures.length; i++) {
        detailTemplate
            .querySelector('.carousel-detail')
            .append(
                document.importNode(
                    slideItem(carouselItem, data, i),
                    true
                )
            );
    }

    el('.showcase').replaceWith(document.importNode(detailTemplate, true));

    document
        .querySelectorAll('.carousel-detail-item')[0]
        .classList.add('active-slide');

    var total = document.querySelectorAll('.carousel-detail-item').length;

    var current = 0;
    moveLR('#moveRight', 1);
    moveLR('#moveLeft', -1);

    function moveLR(eId, step) {
        el(eId).addEventListener('click', function() {
            let prev_next = current;
            current = current + step;
            setSlide(prev_next, current);
        });
    }

    function setSlide(prev, next) {
        let slide = current;
        if (next > total - 1) {
            slide = 0;
            current = 0;
        }
        if (next < 0) {
            slide = total - 1;
            current = total - 1;
        }
        document
            .querySelectorAll('.carousel-detail-item')
            [prev].classList.remove('active-slide');
        document
            .querySelectorAll('.carousel-detail-item')
            [slide].classList.add('active-slide');
    }
}

function _translate(img, offset=-150){
    let rect = img.getBoundingClientRect();
    let elements = ['translate3D('];
    return [...elements, rect.left - offset + 'px,', rect.top - offset + 'px,0)'].join('');
}

// ====================================================

function initStorage() {
    window.localStorage.getItem("basket") ?
      window.localStorage.getItem("basket") :
      window.localStorage.setItem("basket", JSON.stringify([]));
}

class Product {
    constructor(id, name, price, picture, amount) {
      this.id = id;
      this.name = name;
      this.price = price;
      this.picture = picture;
      this.amount = amount;
    }
}

function openCart() {
    showCart();
    el('.sidebar').classList.add('active');
    el('.overlay').classList.add('active');
}

function closeCart() {
    el('.sidebar').classList.remove('active');
    el('.overlay').classList.remove('active');
}


function getProducts() {
    return JSON.parse(window.localStorage.getItem("basket"));
}

function addProductToCart(content, item) {
    content.querySelector('.item-title').textContent = item.querySelector(
        '.product-name'
    ).textContent;

    content.querySelector('.item-price').textContent = item.querySelector(
        '.product-price'
    ).textContent;

    content
        .querySelector('.item-price')
        .setAttribute(
            'price',
            item.querySelector('.product-price').textContent
        );

    content.querySelector('.item-img').style.backgroundImage =
        'url(' + item.querySelector('img').getAttribute('src') + ')';
    return content;
}

function dataItem(id) {
    return data[id];
}

function getProductItem(item) {
    var pictures = item.picture.split(",");
    return {
      id: item.id,
      price: item.price,
      name: item.name,
      picture: "assets/images/products/" + pictures[0]
    };
}

function addProduct(prod) {
    let tmpProducts = getProducts();
  
    if (tmpProducts.length > 0) {
      let exist = tmpProducts.some(elem => {
        return elem.id === prod.id;
      });
      if (exist) {
        tmpProducts.forEach(elem => {
          if (elem.id === prod.id) {
            elem.amount += 1;
          }
        });
      } else {
        tmpProducts.push(
          new Product(
            prod.id,
            prod.name,
            prod.price,
            prod.picture.split(",")[0],
            1
          )
        );
      }
    } else {
      tmpProducts.push(
        new Product(prod.id, prod.name, prod.price, prod.picture.split(",")[0], 1)
      );
    }
    window.localStorage.setItem("basket", JSON.stringify(tmpProducts));
  }
  

function plusProduct(id){
    let tmpProducts = getProducts();
    tmpProducts.forEach(elem => {
        if(elem.id === +(id)){
          elem.amount += 1;
        }
    });
    window.localStorage.setItem("basket",JSON.stringify(tmpProducts));
}

function minusProduct(id){
    let tmpProducts = getProducts();
    tmpProducts.forEach(elem => {
        if(elem.id === +(id)){
          elem.amount -= 1;
        }
    });
    window.localStorage.setItem("basket",JSON.stringify(tmpProducts));
}

function removeProduct(index){
    let tmpProducts = getProducts();
    tmpProducts.splice(tmpProducts.indexOf(tmpProducts.find(x => x.id === +(index))), 1);
    window.localStorage.setItem("basket",JSON.stringify(tmpProducts));
}

function productInCart(content, item) {
    content.querySelector('.cart-item').setAttribute('id', item.id);
    content.querySelector('.item-title').textContent = item.name;
    content.querySelector('.item-price').textContent = item.price;
    content.querySelector('.quontity').textContent = item.amount;
    content.querySelector('.item-price').setAttribute(            'price', item.price);
    content.querySelector('.item-img').style.backgroundImage= 'url('+ item.picture+")";
    content.querySelector('.item-price'
    ).innerText = parseFloat(item.price * item.amount).toFixed(2);
    return content;
}

function updateTotal() {
    var quantities = 0,
    total = 0,
    $cartTotal = document.querySelector('.cart-total span'),
    items = document.querySelector('.cart-items').children;
    Array.from(items).forEach(function (item) {
        total += parseFloat(item.querySelector('.item-price').textContent);
    });
    $cartTotal.textContent = parseFloat(Math.round(total * 100) / 100).toFixed(2);
}

function showCart() {
    let shoppingCart = getProducts();
    if (shoppingCart.length == 0) {
        console.log("Your Shopping Cart is Empty!");
        return;
    }
    document.querySelector(".cart-items").innerHTML = '';
    shoppingCart.forEach(function (item) {
        let template = document.getElementById("cartItem").content;
        productInCart(template, item);
        
        document.querySelector(".cart-items").append(document.importNode(productInCart(template, item), true));

    });
    updateTotal();
}
//=====================================================

// const url = 'https://my-json-server.typicode.com/couchjanus/db/products';
// const url = 'http://localhost:3000/products';

const url = "/api/shop";

(function() {

    initStorage();
    
    if (localStorage) {
        console.log("It's basket storage");
    }

    el('#sidebarCollapse').addEventListener('click', () => openCart());
    el('.dismiss').addEventListener('click', () => closeCart());
    el('.overlay').addEventListener('click', () => closeCart());
    
    const template = el('#productItem').content;

    fetch(url)
    .then(function(response) {
        if (response.status !== 200) {
            console.log(
                'Looks like there was a problem. Status Code: ' +
                    response.status
            );
            return;
        }
        response.json().then(function(data) {
            data.forEach(function(el) {
                document
                    .querySelector('.showcase')
                    .append(makeProductItem(template, el).cloneNode(true));
            });

            const content = el('#cartItem').content;
            let addToCarts = document.querySelectorAll('.add-to-cart');

            addToCarts.forEach(function(addToCart) {
                addToCart.addEventListener('click', function() {
                    let id = this.closest('.card')
                        .querySelector('.win')
                        .getAttribute('productId');

                        fetch(url + '/' + id).then(response => {
                            response.json().then(data => {
                                addProduct(getProductItem(data));
                            });
                        });

                    let imgItem = this.closest('.card').querySelector('img');
                    let win = this.closest('.card').querySelector('.win');
                    if (imgItem) {
                        let imgClone = imgItem.cloneNode(true);
                        imgClone.classList.add('offset-img');
                        document.body.appendChild(imgClone);
                        imgItem.style.transform = 'rotateY(180deg)';
                        win.style.display = 'block';
                        imgClone.animate([{transform: _translate(imgItem)},
                            {transform: _translate(document.querySelector('#sidebarCollapse'), 50) + 'perspective(500px) scale3d(0.1, 0.1, 0.2)'},], {
                            duration: 2000,
                        })
                        .onfinish = function() {
                            imgClone.remove();
                            imgItem.style.transform = 'rotateY(0deg)';
                            win.style.display = 'none';
                        };
                    }
                });
            });

            document.querySelector('.cart-items').addEventListener(
                'click',
                function(e) {
                    if (e.target && e.target.matches('.remove-item')) {
                        let index = e.target.closest('.cart-item').getAttribute('id');
                        removeProduct(index);
                        e.target.parentNode.parentNode.remove();
                        updateTotal();
                    }
                    if (e.target && e.target.matches('.plus')) {
                        let el = e.target;
                        let price = parseFloat(
                            el.parentNode.nextElementSibling
                                .querySelector('.item-price')
                                .getAttribute('price')
                        );

                        let id = el.closest('.cart-item').getAttribute('id');
                        plusProduct(id);
                        let val = parseInt(el.previousElementSibling.innerText);
                        val = el.previousElementSibling.innerText = val + 1;
                        
                        el.parentNode.nextElementSibling.querySelector(
                            '.item-price'
                        ).innerText = parseFloat(price * val).toFixed(2);
                        updateTotal();
                    }

                    if (e.target && e.target.matches('.minus')) {
                        let el = e.target;
                        let price = parseFloat(
                            el.parentNode.nextElementSibling
                                .querySelector('.item-price')
                                .getAttribute('price')
                        );
                        
                        let val = parseInt(el.nextElementSibling.innerText);
                        let id = el.closest('.cart-item').getAttribute('id');
                        if (val > 1) {
                            minusProduct(id);
                            val = el.nextElementSibling.innerText = val - 1;
                        }
                        el.parentNode.nextElementSibling.querySelector(
                            '.item-price'
                        ).innerText = parseFloat(price * val).toFixed(2);
                        updateTotal();
                    }
                },
                false
            );

            const viewDetails = document.querySelectorAll('.view-detail');
            viewDetails.forEach(function(element) {
                element.addEventListener('click', function() {
                    let id = this.closest(".card")
                    .querySelector('.win')
                    .getAttribute('productId');
                    
                    fetch("api/product/" + id).then(response => {
                        response.json().then(data => {
                            carousel(data);
                        });
                    });
                });
            });

            document.querySelector('.clear-cart').addEventListener('click', () => {
                localStorage.removeItem('basket');
                initStorage();
                document.querySelector('.cart-items').innerHTML = '';
                updateTotal();
            });
        });
    })
    .catch(function(err) {
            console.log('Fetch Error :-S', err);
    });

    document.querySelector(".checkout__trigger").addEventListener("click", () => {
        fetch("/api/check").then(response => {
          if (response.status !== 200) {
            console.log(
              "Looks like there was a problem. Status Code: " + response.status
            );
            return;
          }
    
          response.json().then(d => {
            if (d.r === "fail") location.assign(d.url);
    
            closeCart();
            if (localStorage.basket && localStorage.basket.length > 2) {
              const $templateCheck = document.getElementById("order-form").content;
    
              let cart_total = document.querySelector(".cart-total span")
                .textContent;
              $templateCheck.querySelector("span.price").textContent =
                "$" + cart_total;
              $templateCheck.querySelector("#sub_price").textContent =
                "$" + cart_total;
    
              let sub_tax = 2.45;
              let sub_ship = 4.0;
              let calculated_total = parseFloat(cart_total) + sub_tax + sub_ship;
    
              $templateCheck.querySelector("#sub_tax").textContent =
                "$" + parseFloat(sub_tax);
              $templateCheck.querySelector(".sub_ship").textContent =
                "$" + sub_ship;
              $templateCheck.querySelector("#calculated_total").textContent =
                "$" + calculated_total;
    
              $templateCheck.querySelector("#first_name").value = d.first_name;
              $templateCheck.querySelector("#last_name").value = d.last_name;
              $templateCheck.querySelector("#phone_number").value = d.phone_number;
    
              document.querySelector(".showcase--wrapper").innerHTML = "";
    
              document
                .querySelector(".showcase--wrapper")
                .append(document.importNode($templateCheck, true));
    
              // ----------------------------------------
    
              document
                .querySelector("#complete")
                .addEventListener("click", function() {
                //   console.log('getProducts() ', getProducts());  
                  let cart = getProducts();
                  fetch("/api/cart", {
                    method: "POST", // *GET, POST, PUT, DELETE, etc.
                    // mode: "cors", // no-cors, cors, *same-origin
                    // cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                    // credentials: "same-origin", // include, *same-origin, omit
                    headers: {
                      "Content-Type": "application/json"
                      // "Content-Type": "application/x-www-form-urlencoded",
                    },
                    // redirect: "follow", // manual, *follow, error
                    // referrer: "no-referrer", // no-referrer, *client
    
                    body: JSON.stringify({
                      cart: cart,
                      first_name: document.querySelector("#first_name").value,
                      last_name: document.querySelector("#last_name").value,
                      phone_number: document.querySelector("#phone_number").value
                    })
                  })
                    .then(function(response) {
                      console.log("Request success: ", response);
                      localStorage.removeItem("basket");
                      document.querySelector(".cart-items").innerHTML = "";
                      updateTotal();
                      document.location.replace("/profile");
                    })
                    .catch(function(error) {
                      console.log(error);
                    });
                });
            }
          });
        });
      });
})();
