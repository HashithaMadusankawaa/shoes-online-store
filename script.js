function changView() {
  var signupBox = document.getElementById("signUpBox");
  var signinBox = document.getElementById("signInBox");

  if (signupBox.classList.contains("d-none")) {
    signupBox.classList.remove("d-none");
    signinBox.classList.add("d-none");
  } else {
    signupBox.classList.add("d-none");
    signinBox.classList.remove("d-none");
  }
}

function signup() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var password = document.getElementById("password");
  var mobile = document.getElementById("mobile");
  var gender = document.getElementById("gender");

  var form = new FormData();
  form.append("f", fname.value);
  form.append("l", lname.value);
  form.append("e", email.value);
  form.append("p", password.value);
  form.append("m", mobile.value);
  form.append("g", gender.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      if (response == "success") {
        document.getElementById("msg").innerHTML = "Registation Successfull";
        document.getElementById("msg").className = "alert alert-success";
        document.getElementById("msgdiv").className = "d-block";
      } else {
        document.getElementById("msg").innerHTML = response;
        document.getElementById("msgdiv").className = "d-block";
      }
    }
  };

  request.open("POST", "signupProcess.php", true);
  request.send(form);
}

function signin() {
  var email2 = document.getElementById("email2");
  var password2 = document.getElementById("password2");
  var rememberme = document.getElementById("rememberme");

  var form = new FormData();
  form.append("e", email2.value);
  form.append("p", password2.value);
  form.append("r", rememberme.Checked);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      if (response == "success") {
        document.getElementById("msg1").innerHTML = "Successfull";
        document.getElementById("msg1").className = "alert alert-success";
        document.getElementById("msgdiv1").className = "d-block";
        window.location = "home.php";
      } else {
        document.getElementById("msg1").innerHTML = response;
        document.getElementById("msgdiv1").className = "d-block";
      }
    }
  };

  request.open("POST", "signinProcess.php", true);
  request.send(form);
}

var forgotPasswordModal;
function forgotPassword() {
  var email = document.getElementById("email2");
  var form = new FormData();
  form.append("e", email.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var text = request.responseText;

      if (text == "Success") {
        alert(
          "Verification code has sent successfully. Please check your Email."
        );
        var modal = document.getElementById("fpmodal");
        forgotPasswordModal = new bootstrap.Modal(modal);
        forgotPasswordModal.show();
      } else {
        document.getElementById("msg1").innerHTML = text;
        document.getElementById("msgdiv1").className = "d-block";
      }
    }
  };

  request.open("POST", "forgotpasswordProccess.php", true);
  request.send(form);
}

function signout() {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "success") {
        window.location.reload();
      }
    }
  };
  request.open("GET", "signOutProcess.php", true);
  request.send();
}

function changeProfileImg() {
  var img = document.getElementById("profileimage");

  img.onchange = function () {
    var file = this.files[0];
    var url = window.URL.createObjectURL(file);

    document.getElementById("img").src = url;
  };
}

function updateProfile() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var province = document.getElementById("province");
  var district = document.getElementById("district");
  var city = document.getElementById("city");
  var pcode = document.getElementById("pcode");
  var image = document.getElementById("profileimage");

  var form = new FormData();

  form.append("f", fname.value);
  form.append("l", lname.value);
  form.append("m", mobile.value);
  form.append("l1", line1.value);
  form.append("l2", line2.value);
  form.append("p", province.value);
  form.append("d", district.value);
  form.append("c", city.value);
  form.append("pc", pcode.value);
  form.append("i", image.files[0]);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      if (response == "Updated" || response == "Saved") {
        window.location.reload();
      } else if (response == "You have not selected any image.") {
        alert("You have not selected any image.");
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "updateProfileProcess.php", true);
  request.send(form);
}

//add size processing function

function sizeadd(id) {
  var size = document.getElementById("size");
  var stock_quantity = document.getElementById("stock_quantity");

  var form = new FormData();

  form.append("size", size.value);
  form.append("stock_quantity", stock_quantity.value);
  form.append("pid", id);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;

      if (response.status == "success") {
        alert("size added");
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "addsizeprocess.php", true);
  request.send(form);
}

function savesize(id) {
  var size = document.getElementById("size");
  var stock_quantity = document.getElementById("stock_quantity");

  var form = new FormData();

  form.append("size", size.value);
  form.append("stock_quantity", stock_quantity.value);
  form.append("pid", id);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;

      if (response.status == "success") {
        alert("sizes added successfully");
        window.location.href = "myproduct.php";
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "savesizeprocess.php", true);
  request.send(form);
}

///////////////////////////////////

function addProduct() {
  var category = document.getElementById("category");
  var brand = document.getElementById("brand");
  var model = document.getElementById("model");
  var title = document.getElementById("title");
  var condition = 0;

  if (document.getElementById("b").checked) {
    condition = 1;
  } else if (document.getElementById("u").checked) {
    condition = 2;
  }

  var qty = document.getElementById("qty");
  var cost = document.getElementById("cost");
  var dwc = document.getElementById("dwc");
  var doc = document.getElementById("doc");
  var desc = document.getElementById("desc");
  var image = document.getElementById("imageuploader");

  var color1 = document.getElementById("colorInput1");
  var color2 = document.getElementById("colorInput2");
  var color3 = document.getElementById("colorInput3");
  var color4 = document.getElementById("colorInput4");

  var form = new FormData();

  form.append("ca", category.value);
  form.append("b", brand.value);
  form.append("m", model.value);
  form.append("t", title.value);
  form.append("con", condition);
  form.append("q", qty.value);
  form.append("co", cost.value);
  form.append("dwc", dwc.value);
  form.append("doc", doc.value);
  form.append("de", desc.value);
  form.append("c1", color1.value);
  form.append("c2", color2.value);
  form.append("c3", color3.value);
  form.append("c4", color4.value);

  var file_count = image.files.length;

  for (var x = 0; x < file_count; x++) {
    form.append("image" + x, image.files[x]);
  }

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = JSON.parse(request.responseText);

      if (response.status === "success") {
        alert("Product Saved Successfully.");
        window.location.href = `addsize.php?product_id=${response.product_id}`;
      } else {
        alert(response.message);
      }
    }
  };

  request.open("POST", "addProductProcess.php", true);
  request.send(form);
}

function changeProductImage() {
  var image = document.getElementById("imageuploader");

  image.onchange = function () {
    var file_count = image.files.length;

    if (file_count <= 3) {
      for (var x = 0; x < file_count; x++) {
        var file = this.files[x];
        var url = window.URL.createObjectURL(file);

        document.getElementById("i" + x).src = url;
      }
    } else {
      alert(
        file_count +
          " files. You are proceed to upload only 3 or less than 3 files."
      );
    }
  };
}

function changeStatus(id) {
  var product_id = id;

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "deactivated" || response == "activated") {
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };

  request.open("GET", "changeStatusProcess.php?id=" + product_id, true);
  request.send();
}

function sort1(x) {
  var search = document.getElementById("s");

  var time = "0";

  if (document.getElementById("n").checked) {
    time = "1";
  } else if (document.getElementById("o").checked) {
    time = "2";
  }
  

  var qty = "0";

  if (document.getElementById("h").checked) {
    qty = "1";
  } else if (document.getElementById("l").checked) {
    qty = "2";
  }

  

  var condition = "0";

  if (document.getElementById("b").checked) {
    condition = "1";
  } else if (document.getElementById("u").checked) {
    condition = "2";
  }

  var form = new FormData();
  form.append("s", search.value);
  form.append("t", time);
  form.append("q", qty);
  form.append("c", condition);
  form.append("page", x);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      document.getElementById("sort").innerHTML = response;
    }
  };

  request.open("POST", "sortProcess.php", true);
  request.send(form);
}

function clearSort() {
  window.location.reload();
}

var searchModel;
function searchmodel() {
  var modal = document.getElementById("searchModal");
  searchModel = new bootstrap.Modal(modal);
  searchModel.show();
}

function basicSearch(x) {
  var txt = document.getElementById("basic_search_txt");

  var form = new FormData();
  form.append("t", txt.value);

  form.append("page", x);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      document.getElementById("basicSearchResult").innerHTML = response;
    }
  };

  request.open("POST", "basicSearchProcess.php", true);
  request.send(form);
}

// Function to fetch live search results via AJAX
function fetchLiveSearchResults(searchValue) {
  // AJAX request
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Update live search results container with response
      document.getElementById("liveSearchResults").innerHTML = xhr.responseText;
    }
  };
  // Send AJAX request to a PHP script that fetches search results from the database
  xhr.open(
    "GET",
    "fetch_live_search_results.php?search=" + encodeURIComponent(searchValue),
    true
  );
  xhr.send();
}

function sendid(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      if (response == "Success") {
        window.location = "updateProduct.php";
      } else {
        alert(response);
      }
    }
  };

  request.open("GET", "sendIdProcess.php?id=" + id, true);
  request.send();
}

function updateProduct() {
  var title = document.getElementById("t");
  var qty = document.getElementById("q");
  var dwc = document.getElementById("dwc");
  var doc = document.getElementById("doc");
  var description = document.getElementById("d");
  var images = document.getElementById("imageuploader");

  var form = new FormData();
  form.append("t", title.value);
  form.append("q", qty.value);
  form.append("dwc", dwc.value);
  form.append("doc", doc.value);
  form.append("d", description.value);

  var file_count = images.files.length;

  for (var x = 0; x < file_count; x++) {
    form.append("i" + x, images.files[x]);
  }

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "Product has been Updated.") {
        window.location = "myproduct.php";
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "updateProductProcess.php", true);
  request.send(form);
}

function loadMainImg(id) {
  var sample_img = document.getElementById("productImg" + id).src;
  var main_img = document.getElementById("mainImg");
  main_img.src = sample_img;
  document.getElementById("productImg" + id).style.display = "Replace";
}

function addToWatchlist(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      if (response == "added") {
        document.getElementById("heart" + id).style.className = "text-danger";
        window.location.reload();
      } else if (response == "removed") {
        document.getElementById("heart" + id).style.className = "text-dark";
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };

  request.open("GET", "addToWatchlistProcess.php?id=" + id, true);
  request.send();
}

function removeFromWatchlist(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      if (response == "success") {
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };

  request.open("GET", "removeWatchlistProcess.php?id=" + id, true);
  request.send();
}

function addToCart(id) {
  var size = document.getElementById("size");
  var color = document.getElementById("color");

  var form = new FormData();

  form.append("id", id);
  form.append("size", size.value);
  form.append("color", color.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (alert == "Cart updated") {
        window.location = "cart.php";
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "addToCartProcess.php", true);
  request.send(form);
}

function changeQTY(id) {
  var qty = document.getElementById("qty_input").value;

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "Updated") {
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };

  request.open(
    "GET",
    "cartQtyUpdateProcess.php?qty=" + qty + "&id=" + id,
    true
  );
  request.send();
}

function deleteFromCart(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "Removed") {
        alert("Product removed from Cart.");
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };

  request.open("GET", "deleteFromCartProcess.php?id=" + id, true);
  request.send();
}

function payNow(id) {
  var qty = document.getElementById("qty_input").value;

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      var obj = JSON.parse(response);

      var mail = obj["umail"];

      var amount = obj["amount"];

      if (response == 1) {
        alert("Please Login.");
        window.location = "index.php";
      } else if (response == 2) {
        alert("Please update your profile.");
        window.location = "profile.php";
      } else {
        // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);

          alert("Payment completed. OrderID:" + orderId);
          saveInvoice(orderId, id, mail, amount, qty);
        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
          // Note: Prompt user to pay again or show an error page
          console.log("Payment dismissed");
        };

        // Error occurred
        payhere.onError = function onError(error) {
          // Note: show an error page
          console.log("Error:" + error);
        };

        // Put the payment variables here
        var payment = {
          sandbox: true,
          merchant_id: obj["mid"], // Replace your Merchant ID
          return_url:
            "http://localhost/WEBSITE%207/singaleProduct.php?id=" + id, // Important
          cancel_url:
            "http://localhost/WEBSITE%207/singaleProduct.php?id=" + id, // Important
          notify_url: "http://sample.com/notify",
          order_id: obj["id"],
          items: obj["item"],
          amount: amount + ".00",
          currency: "LKR",
          hash: obj["hash"], // *Replace with generated hash retrieved from backend
          first_name: obj["fname"],
          last_name: obj["lname"],
          email: mail,
          phone: obj["mobile"],
          address: obj["address"],
          city: obj["city"],
          country: "Sri Lanka",
          delivery_address: obj["address"],
          delivery_city: obj["city"],
          delivery_country: "Sri Lanka",
          custom_1: "",
          custom_2: "",
        };

        // Show the payhere.js popup, when "PayHere Pay" is clicked
        // document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
        // };
      }
    }
  };

  request.open("GET", "buyNowProcess.php?id=" + id + "&qty=" + qty, true);
  request.send();
}

function saveInvoice(orderId, id, mail, amount, qty) {
  var form = new FormData();
  form.append("o", orderId);
  form.append("i", id);
  form.append("m", mail);
  form.append("a", amount);
  form.append("q", qty);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      if (response == "success") {
        window.location = "invoice.php?id=" + orderId;
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "saveInvoiceProcess.php", true);
  request.send(form);
}

var av;
function adminVerification() {

    var email = document.getElementById("e");

    var form = new FormData();
    form.append("e", email.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                alert("Please take a look at your email to find the VERIFICATION CODE.");
                var adminVerificationModal = document.getElementById("verificationModal");
                av = new bootstrap.Modal(adminVerificationModal);
                av.show();
            } else {
                alert(response);
            }

        }
    }

    request.open("POST", "adminVerificationProcess.php", true);
    request.send(form);

}

function verify() {
  var code = document.getElementById("vcode");

  var form = new FormData();
  form.append("c", code.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "success") {
        av.hide();
        window.location = "adminPanel.php";
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "verificationProcess.php", true);
  request.send(form);
}

function sendfeedback(id) {
  var email = document.getElementById("email");
  var feed = document.getElementById("feed");

  var form = new FormData();
  form.append("pid", id);
  form.append("feed", feed.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status === 200 && request.readyState == 4) {
      var response = request.responseText;
      if (response == "success") {
        alert("Thank you for your feedback.");
        window.location.href = "home.php";
      } else {
        alert(response);
      }
    } else {
    }
  };

  request.open("POST", "feedbaackprocess.php", true);
  request.send(form);
}

function checkout(id) {
  var pid = id;
  var cheackout = document.getElementById("checkoutButton");

  var form = new FormData();
  form.append("pid", pid.value);

  if (pid) {
    window.location.href = "placeorder.php?pid= " + pid;
  } else {
    alert("Oops!");
  }
}

function placeorder(pid) {
  var pid = pid;

  var form = new FormData();
  form.append("pid", pid.value);
  if (pid) {
    window.location.href = "shipping.php?pid= " + pid;
  } else {
    alert(" Oops! ");
  }
}

function generateOrderID() {
  const date = new Date();
  const timestamp = date.getTime();
  const randomNum = Math.floor(Math.random() * 1000);
  return "ORD-" + timestamp + "-" + randomNum;
}

function confirmorder() {
  var totalElement = document
    .getElementById("total")
    .textContent.replace("Rs.", "")
    .replace(".00", "")
    .trim();
  var shippingElement = document
    .getElementById("shipping")
    .textContent.replace("Rs.", "")
    .replace(".00", "")
    .trim();
  var subtotalElement = document
    .getElementById("subtotal")
    .textContent.replace("Rs.", "")
    .replace(".00", "")
    .trim();
  var orderID = generateOrderID(); // Generate order ID

  var form = new FormData();

  form.append("total", totalElement);
  form.append("subtotal", subtotalElement);
  form.append("shipping", shippingElement);
  form.append("order_id", orderID);

  // Add order ID to form data

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status === 200 && request.readyState == 4) {
      var response = request.responseText;
      if (response == "success") {
        alert("Thank you for placing the order!");
        window.location.href = "invoice.php";
      } else {
        alert(response);
      }
    } else {
    }
  };

  request.open("POST", "saveInvoiceProcess.php", true);
  request.send(form);
}

$(document).ready(function () {
  $(".items").slick({
    infinite: true,
    lazyLoad: "ondemand",
    slidesToShow: 3,
    slidesToScroll: 3,
  });
});



function filter() {
 
  var sort = document.getElementById("sortby");

  var form = new FormData();
  form.append("sort", sort.value);


  
  var request = new XMLHttpRequest();

  request.onreadystatechange = function(){

    if (request.status === 200 && request.readyState == 4) {
      var response = request.responseText;
      document.getElementById('product-list').innerHTML = response;
    }
  };

  request.open("POST", "filterprocess.php", true);
  request.send(form);

}

function filter1() {
 
  var sort = document.getElementById("sortby");

  var form = new FormData();
  form.append("sort", sort.value);


  
  var request = new XMLHttpRequest();

  request.onreadystatechange = function(){

    if (request.status === 200 && request.readyState == 4) {
      var response = request.responseText;
      document.getElementById('product-list1').innerHTML = response;
    }
  };

  request.open("POST", "filterprocess1.php", true);
  request.send(form);

}


function filter2() {
 
  var sort = document.getElementById("sortby");

  var form = new FormData();
  form.append("sort", sort.value);


  
  var request = new XMLHttpRequest();

  request.onreadystatechange = function(){

    if (request.status === 200 && request.readyState == 4) {
      var response = request.responseText;
      document.getElementById('product-list2').innerHTML = response;
    }
  };

  request.open("POST", "filterprocess2.php", true);
  request.send(form);

}

function filterProducts() {
  var gender = "0";

  if (document.getElementById("m").checked) {
    gender = "1";
  } else if (document.getElementById("w").checked) {
    gender = "2";
  }else if (document.getElementById("k").checked) {
    gender = "3";
  }

  
  var form = new FormData();
  
 var values =  form.append("g", gender);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      
      document.getElementById("product-list3").innerHTML = response;
      
    }
  };

  request.open("POST", "adfilterprocess.php", true);
  request.send(form);

  
}


