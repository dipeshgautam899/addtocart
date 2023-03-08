<?php
session_start();
// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "inventory_system";

$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch category data
$sql = "SELECT id, name FROM categories";
$result = mysqli_query($conn, $sql);

 // Close connection
 mysqli_close($conn);
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="./css/style.css.map">
</head>
<section class="bg1 text-light ">
  <div class="d-flex flex-row-reverse container ">
    <button type="button" class="btn btn-link">
      <div class="link">
        <a class="link" href="login.html">Login</a>
      </div>
    </button>
    <button type="button" class="btn btn-link">
      <div class="link">
        <a class="link" href="signup.html">Signup</a>
      </div>
    </button>
    <div class="p-2"><i class="bi bi-envelope"></i>&nbsp; info@sait.com.np</div>
    <div class="p-2"> <i class="bi bi-telephone"></i>&nbsp;+977-9851172368</div>
    <div class="social-links align-items-center me-5 ">
      <ul class=" text-success list  ">
        <div class="icons">
          <div class="circle-icon">
            <div class="inside"><i class="bi bi-messenger"></i>&nbsp;&nbsp;</div>
          </div>&nbsp;&nbsp;
          <div class="circle-icon">
            <div class="inside"><i class="bi bi-facebook"></i>&nbsp;&nbsp;</div>
          </div>&nbsp;&nbsp;
          <div class="circle-icon">
            <div class="inside"><i class="bi bi-twitter"></i>&nbsp;&nbsp;</div>
          </div>&nbsp;&nbsp;
          <div class="circle-icon">
            <div class="inside"><i class="bi bi-youtube"></i>&nbsp;&nbsp;</div>
          </div>&nbsp;&nbsp;
        </div>
      </ul>

    </div>

  </div>


</section>

<nav class="navbar navbar-expand-lg bg-light sticky-sm-top">
  <div class="container">
    <a class="navbar-brand" href="#"><img class="logo" src="./img/SAIT_Logo-removebg-preview.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item px-1">
          <a class="nav-link  fs-6" aria-current="page" href="index.html">Home</a>
        </li>
        <li class="nav-item px-1">
          <a class="nav-link fs-6" href="about.html">About Us</a>
        </li>
        <li class="nav-item px-1">
          <a class="nav-link active fs-6" href="view.html"> View Demo</a>
        </li>
        <li class="nav-item px-1">
          <a class="nav-link fs-6" href="contact.html"> Contact us</a>
        </li>
        <li class="nav-item px-1">
          <a class="nav-link fs-6" href=""> <i class="bi bi-cart4"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<section class="aditi container">
  <div class="container">
    <div class="row py-0">
      <div class="col-lg-4">
        <img class="qwe" src="./img/dinner.jpg">
      </div>
      <div class="col-lg-4">
        <img class="qwe" src="./img/SAIT Logo.jpg">
      </div>
      <div class="col-lg-4">
        <img class="qwe" src="./img/break.jpg">
      </div>
    </div>
  </div>
</section>
<section class="text-center container bg-light data-sticky_parent">
  <div class=" bg-white">
    <div class="nav-about">
      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Order Online</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Overview</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gallery.html">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="table.html">Book a Table</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reviews</a>
        </li>
      </ul>
    </div>
    <div class="bg-light">
      <div class="row">
        <div class="col-lg-9">
          <div class="row">
            <div class="col-lg-4 py-3 bg-white">
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
              <div class="menu-item">
                <ul>
                  <?php
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-12 text-start py-3 "><a href="#' . $row["name"] . '">' . $row["name"] . '</a></div>';
                    }
                } else {
                    echo "No categories found.";
                }
                  ?>
                </ul>
              </div>
            </div>
            <div class="col-lg-8 p-2">
              <div class="row">
                <!-- <div class="col-lg-6">
                <div class="card text-start" style="width: 15rem;">
                    <img src="./img/food.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><strong>Chicken Burger</strong></h5>
                      <p class="card-text text-secondary">Chicken Burger</p>
                      <a href="#" class="btn btn-primary">Add To Cart</a>
                    </div>
                  </div>           
                </div>
                <div class="col-lg-6">
                  <div class="card text-start" style="width: 15rem;">
                    <img src="./img/food.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><strong>Chicken Burger</strong></h5>
                      <p class="card-text text-secondary">Chicken Burger</p>
                      <a href="#" class="btn btn-primary">Add To Cart</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card text-start" style="width: 15rem;">
                    <img src="./img/food.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><strong>Chicken Burger</strong></h5>
                      <p class="card-text text-secondary">Chicken Burger</p>
                      <a href="#" class="btn btn-primary">Add To Cart</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card text-start" style="width: 15rem;">
                    <img src="./img/food.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><strong>Chicken Burger</strong></h5>
                      <p class="card-text text-secondary">Chicken Burger</p>
                      
                      <a href="#" class="btn btn-primary">Add To Cart</a>
                    </div>
                  </div>
                </div> -->
                <div class="col-12 text-start text-danger">
                  <h2>FOOD MENU</h2>
                </div>

                <?php
                  // Initialize cart array if not already set
                  if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();
                  }
                  // Check if product was added to cart
                  if (isset($_POST['add-to-cart'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];

                    // Check if product already exists in cart
                    if (isset($_SESSION['cart'][$id])) {
                      // Update quantity and price of existing item
                      $_SESSION['cart'][$id]['quantity'] += $quantity;
                      $_SESSION['cart'][$id]['price'] = $price * $_SESSION['cart'][$id]['quantity'];
                    } else {
                      // Add new item to cart
                      $_SESSION['cart'][$id] = array(
                        'name' => $name,
                        'price' => $price * $quantity,
                        'quantity' => $quantity
                      );
                    }        
                  }

                  // Check if product was removed from cart
                  if (isset($_POST['remove-from-cart'])) {
                    $id = $_POST['id'];
                    unset($_SESSION['cart'][$id]);
                    }
                  // Check if cart was cleared  
                  if (isset($_POST['clear-cart'])) {
                    unset($_SESSION['cart']);   
                    }
                    // Fetch product data
                    $host = "localhost";
                    $user = "root";
                    $password = "";
                    $dbname = "inventory_system";

                    $conn = mysqli_connect($host, $user, $password, $dbname);

                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                $sql = "SELECT id, name, sale_price FROM products";
                $result = mysqli_query($conn, $sql);

                // Loop through the product data and generate HTML code
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      $id = isset($row['id']) ? $row['id'] : '';
                    $name = isset($row['name']) ? $row['name'] : '';
                    $salePrice = isset($row['sale_price']) ? $row['sale_price'] : '';
                        echo '<div class="col-12 text-start py-2">
                                  <div class="menuL bg-white">
                                      <h4><strong>' . $row['name'] . '</strong></h4>
                                      <strong>Rs.' . $row['sale_price'] . '</strong>
                                      <div class="d-grid d-md-flex justify-content-center">
                                          <form action="" method="POST" class="add-to-cart-form">
                                              <input type="hidden" name="id" value="'.$row["id"].'">
                                              <input type="hidden" name="name" value="'.$row["name"].'">
                                              <input type="hidden" name="price" value="'.$row["sale_price"].'">
                                              <input type="number" name="quantity" value="1" min="1" style="width: 40px;">
                                              <button type="submit" class="btn btn-outline-primary" class="add-to-cart" name="add-to-cart"><i class="bi bi-cart-plus"></i></button>
                                          </form>
                                      </div>
                                  </div>
                              </div>';
                              }
                          } else {
                              echo "No products found.";
                          }
                          
                          // Close connection
                          mysqli_close($conn);
                      ?>

              </div>
            </div>
          </div>
        </div>
        
        <div class="cart col-lg-3" id="cart">
          <h3>Shopping Cart</h3>
          <?php if (!empty($_SESSION['cart'])): ?>
          <?php
          $totalPrice = 0;
          foreach($_SESSION['cart'] as $id => $product) {
            $totalPrice += $product['price'] * $product['quantity'];
          }
          ?>
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($_SESSION['cart'] as $id => $product): ?>
              <tr>
                <td>
                  <?php echo $product['name']; ?>
                </td>
                <td>
                  <?php echo $product['price']; ?>
                </td>
                <td>
                  <?php echo $product['quantity']; ?>
                </td>

                <td>
                  <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" class="btn btn-danger" class="remove-from-cart" name="remove-from-cart"><i
                        class="bi bi-trash"></i></button>
                  </form>
                </td>
              </tr>
              <?php endforeach; ?>
              <tr>
                <td colspan="3" class="text-end"><strong>Total Price:</strong></td>
                <td><strong>
                    <?php echo $totalPrice; ?>
                  </strong></td>
              </tr>
            </tbody>
          </table>
          <div class="text-end">
            <form action="" method="POST" class="d-inline-block">
              <button type="submit" class="btn btn-danger" class="clear-cart" name="clear-cart">Clear Cart</button>
            </form>
            <form action="checkout.php" method="POST" class="d-inline-block">
              <button type="submit" class="btn btn-primary" name="checkout">Checkout</button>
            </form>
          </div>
          <?php else: ?>
          <p>Your cart is empty.</p>
          <?php endif; ?>
        </div>
      </div>

    </div>

</section>




<!-- Start footer -->
<footer class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <h4>OUR COMPANY</h4>
        <div>
          <a href="index.html">
            <img class="logo" src="./img/SAIT Logo.jpg">
          </a>
        </div>
        <p> S.A I.T Solutions and Trade Concern<br>
      </div>
      <div class="col-lg-3">
        <h4>Information</h4>

        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms and conditions</a></li>
      </div>
      <div class="col-lg-3">
        <h4>Our SERVICES</h4>
        <i class="bi bi-geo-alt"></i>
        Maharajganj, Kathmandu, Nepal<br>
        <i class="bi bi-geo-alt"></i>
        Zero KM, Pokhara, Nepal<br>
        <i class="bi bi-phone"></i>
        (977) 9801067391, 9802835022<br>
        <i class="bi bi-envelope"></i>
        info@sait.com.np </p>
      </div>
      <div class="col-lg-3">
        <h4>Google Map</h4>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14126.288765997744!2d85.3298522!3d27.7304922!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb65a807441bde4fc!2sS.A%20I.T%20Solution%20and%20Trade%20Concern%20-%20Kathmandu%2C%20Nepal!5e0!3m2!1sen!2snp!4v1675879034164!5m2!1sen!2snp"
          frameborder="0" width=100% height=200px style="border:0;" allowfullscreen=""></iframe>
      </div>
    </div>
  </div>
</footer>

<footer id="footer">
  <div class="container">
    <div class="credits">
      <p class="text-center">© Copyright 2023 | All Rights Reserved | Powered by
        <a href='https://www.sait.com.np' target='_blank'> <strong>S.A I.T Solution and Trade Concern.</strong></a>
      </p>
    </div>
  </div>
</footer><!-- End footer -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {
    $(".owl-carousel").owlCarousel({
      items: 5,
      nav: true
    });
  });
</script>
<script>
  $(document).ready(function () {
    // Define an empty cart array
    var cart = [];

    // Handle add to cart button click
    $('.add-to-cart').click(function () {
      // Get the product id
      var id = $(this).data('id');

      // Check if the product is already in the cart
      var cartItem = cart.find(item => item.id === id);
      if (cartItem) {
        // If the product is already in the cart, increment its quantity
        cartItem.quantity++;
      } else {
        // If the product is not in the cart, add it
        cart.push({ id: id, quantity: 1 });
      }

      // Update the cart UI
      updateCartUI();
    });

    // Handle remove from cart button click
    $('.remove-from-cart').click(function () {
      // Get the product id
      var id = $(this).data('id');

      // Find the index of the product in the cart
      var index = cart.findIndex(item => item.id === id);

      // If the product is in the cart, remove it
      if (index !== -1) {
        cart.splice(index, 1);
      }

      // Update the cart UI
      updateCartUI();
    });

    // Function to update the cart UI
    function updateCartUI() {
      // Get the cart items element
      var cartItemsElement = $('#cart-items');

      // Clear the cart items element
      cartItemsElement.empty();

      // Iterate over the cart items and add them to the cart UI
      cart.forEach(function (item) {
        var product = getProductById(item.id);
        var li = $('<li></li>');
        li.text(product.name + ' x ' + item.quantity + ' = $' + (product.price * item.quantity));
        cartItemsElement.append(li);
      });
    }

    // Function to get a product by its id
    function getProductById(id) {
      // This is just a dummy implementation, replace with your own implementation
      if (id === 1) {
        return { id: 1, name: 'Product 1', price: 10 };
      } else if (id === 2) {
        return { id: 2, name: 'Product 2', price: 20 };
      }
    }
  });

</script>


</html>
