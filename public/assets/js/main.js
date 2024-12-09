const btn = document.querySelectorAll(".button");
const login = document.querySelector(".login");
const register = document.querySelector(".registration");
const loginSuccess = document.querySelector(".login-success");
const checkBtn = document.querySelector("#check");
btn.forEach((btn) => {
  btn.addEventListener("click", () => {});
});
let action = "login";
const handleCheck = () => {
  if (action === "login") {
    action = "register";
    login.style.display = "none";
    register.style.display = "block";
  } else {
    action = "login";
    login.style.display = "block";
    register.style.display = "none";
  }
};
const successHandler = () => {
  loginSuccess.style.display = "block";
  login.style.display = "none";
  register.style.display = "none";
  if (action === "login") {
    loginSuccess.innerHTML += `<h1>Thành công</h1>
    <p>Chúng tôi đã nhận được yêu cầu của bạn;<br /> chúng tôi sẽ xử lí ngay</p>`;
  }
  if (action === "register") {
    loginSuccess.innerHTML += `<h1>Thành công</h1>
    <p>Chúng tôi đã nhận được yêu cầu của bạn;<br /> chúng tôi sẽ xử lí ngay</p>
    `;
  }
};

// Banner
let currentImageIndex = 0;
const images = document.querySelectorAll(".banner-image");

function showImage(index) {
  for (let i = 0; i < images.length; i++) {
    images[i].style.display = "none";
  }
  images[index].style.display = "block";
}

function nextImage() {
  currentImageIndex = (currentImageIndex + 1) % images.length;
  showImage(currentImageIndex);
}

setInterval(nextImage, 3000);



// Pop-up
document.addEventListener("DOMContentLoaded", () => {
  const addToCartButton = document.querySelector(".add-to-cart");

  addToCartButton.addEventListener("click", () => {
      const product = {
          title: document.querySelector(".product-title").innerText,
          price: document.querySelector(".product-price").innerText.replace('Giá: ', ''),
          image: document.querySelector(".main-image").getAttribute('src'),
          quantity: 1
      };
      let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    
      const existingProductIndex = cartItems.findIndex(item => item.title === product.title);
      if (existingProductIndex !== -1) {
          cartItems[existingProductIndex].quantity += 1;
      } else {

          cartItems.push(product);
      }
      localStorage.setItem('cartItems', JSON.stringify(cartItems));

      document.getElementById("popupContainer").style.display = "block";
      document.querySelector(".popup-content").textContent =
        "Sản phẩm đã được thêm vào giỏ hàng!";
  });
});

document.querySelector(".checkout").addEventListener("click", function () {
  document.getElementById("popupContainer").style.display = "block";
  document.querySelector(".popup-content").textContent =
    "Chuyển đến trang thanh toán.";
});
document.querySelector(".submit-review-button").addEventListener("click", function () {
  document.getElementById("popupContainer").style.display = "block";
  document.querySelector(".popup-content").textContent =
    "Chúng tôi đã ghi nhận đánh giá của bạn.";
});
function closePopup() {
  document.getElementById("popupContainer").style.display = "none";
}

// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


