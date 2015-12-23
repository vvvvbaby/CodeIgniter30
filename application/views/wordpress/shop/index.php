<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Garbini</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url() ?>assets/css/shop/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo base_url() ?>assets/css/shop/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/shop/owl.theme.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/shop/owl.transitions.css" rel="stylesheet">

  <link href="<?php echo base_url() ?>assets/css/shop/style.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/shop/config.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

  <![endif]-->
</head>
<body>

<!-- Header -->
<header id="header">

  <!-- ========== TOP BAR START ========== -->

  <div id="top-bar">
    <div class="container">

      <nav id="language-selector">
        <ul class="nav nav-pills">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">English <b class="caret"></b></a>
            <ul role="menu" class="dropdown-menu">
              <li><a href="#">German</a></li>
              <li><a href="#">Spanish</a></li>
              <li><a href="#">Italian</a></li>
            </ul>
          </li>
        </ul>
      </nav>

      <nav id="shopping-cart">
        <a href="#">
          <i class="fa fa-shopping-cart fa-lg"></i> Cart
          <span class="fa-stack">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-stack-1x fa-inverse">3</i>
          </span>
        </a>
      </nav>

      <nav id="top-nav" role="navigation" class="navbar">
        <div class="navbar-header">
          <button data-target=".top-nav" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse top-nav">
          <ul class="nav navbar-nav">
            <li><a href="about-us.html">About</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="my-account.html">LogIn / Register</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

    </div>
  </div><!-- / #top-bar -->

  <!-- ========== TOP BAR START ========== -->

  <!-- ========== MENU START ========== -->

  <nav id="main-nav">
    <div class="navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-nav">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index-2.html"><img src="<?php echo base_url() ?>assets/img/shop/logo.png" alt="Garbini" class="img-responsive"></a>
        </div>
        <div class="navbar-collapse collapse main-nav">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="index-1.html" class="dropdown-toggle" data-toggle="dropdown">Home <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="index-2.html">Home #1 / Slider</a></li>
                <li><a href="index-alt.html">Home #2 / Categories</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">For Woman <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="category.html">Subcat #1</a></li>
                <li><a href="category.html">Subcat #2</a></li>
                <li><a href="category.html">Subcat #3</a></li>
                <li><a href="category.html">Subcat #4</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">For Men <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="category.html">Subcat #1</a></li>
                <li><a href="category.html">Subcat #2</a></li>
                <li><a href="category.html">Subcat #3</a></li>
                <li><a href="category.html">Subcat #4</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">For Kids <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="category.html">Subcat #1</a></li>
                <li><a href="category.html">Subcat #2</a></li>
                <li><a href="category.html">Subcat #3</a></li>
                <li><a href="category.html">Subcat #4</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">Accessories</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

</header>

<!-- ========== MENU END ========== -->

<!-- ========== SLIDER START ========== -->

<section id="slider">
  <div id="bs-carousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
      <li data-target="#bs-carousel" data-slide-to="1"></li>
      <li data-target="#bs-carousel" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active"><a href="#"><img src="http://placehold.it/1600x550" alt=""></a></div>
      <div class="item"><a href="#"><img src="http://placehold.it/1600x550" alt=""></a></div>
      <div class="item"><a href="#"><img src="http://placehold.it/1600x550" alt=""></a></div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#bs-carousel" data-slide="prev">
      <i class="fa fa-angle-left"></i>
      <!--span class="glyphicon glyphicon-chevron-left"></span-->
    </a>
    <a class="right carousel-control" href="#bs-carousel" data-slide="next">
      <i class="fa fa-angle-right"></i>
      <!--span class="glyphicon glyphicon-chevron-right"></span-->
    </a>
  </div>
</section>

<!-- ========== SLIDER END ========== -->

<!-- ========== CONTENT START ========== -->

<section id="content">
  <div class="container">

    <div class="row ad-banners">  
      <div class="col-sm-4">
        <a href="#"><img src="<?php echo base_url() ?>assets/img/shop/images/ad-1.png" alt=""></a>
      </div>
      <div class="col-sm-4">
        <a href="#"><img src="<?php echo base_url() ?>assets/img/shop/images/ad-2.png" alt=""></a>
        <a href="#"><img src="<?php echo base_url() ?>assets/img/shop/images/ad-3.png" alt=""></a>
      </div>
      <div class="col-sm-4">
        <a href="#"><img src="<?php echo base_url() ?>assets/img/shop/images/ad-4.png" alt=""></a>
      </div>
    </div>

    <div class="products-carousel products-small products">

      <div class="banner">
        <img src="<?php echo base_url() ?>assets/img/shop/images/30-off.png" alt="">
      </div>

      <div class="carousel">
        <div>
          <div class="product">
            <div class="thumbnail">
              <a href="#"><img src="http://placehold.it/204x204" alt=""></a>
            </div>
            <hr>
            <div class="title">
              <h3><a href="#">Reshape Panties</a></h3>
              <p>by Jack &amp; Jones</p>
            </div>
          </div>
        </div>
        <div>
          <div class="product">
            <div class="thumbnail">
              <a href="#"><img src="http://placehold.it/204x204" alt=""></a>
            </div>
            <hr>
            <div class="title">
              <h3><a href="#">Reshape Panties</a></h3>
              <p>by Jack &amp; Jones</p>
            </div>
          </div>
        </div>
        <div>
          <div class="product">
            <div class="thumbnail">
              <a href="#"><img src="http://placehold.it/204x204" alt=""></a>
            </div>
            <hr>
            <div class="title">
              <h3><a href="#">Reshape Panties</a></h3>
              <p>by Jack &amp; Jones</p>
            </div>
          </div>
        </div>
        <div>
          <div class="product">
            <div class="thumbnail">
              <a href="#"><img src="http://placehold.it/204x204" alt=""></a>
            </div>
            <hr>
            <div class="title">
              <h3><a href="#">Reshape Panties</a></h3>
              <p>by Jack &amp; Jones</p>
            </div>
          </div>
        </div>
        <div>
          <div class="product">
            <div class="thumbnail">
              <a href="#"><img src="http://placehold.it/204x204" alt=""></a>
            </div>
            <hr>
            <div class="title">
              <h3><a href="#">Reshape Panties</a></h3>
              <p>by Jack &amp; Jones</p>
            </div>
          </div>
        </div>
        <div>
          <div class="product">
            <div class="thumbnail">
              <a href="#"><img src="http://placehold.it/204x204" alt=""></a>
            </div>
            <hr>
            <div class="title">
              <h3><a href="#">Reshape Panties</a></h3>
              <p>by Jack &amp; Jones</p>
            </div>
          </div>
        </div>
        <div>
          <div class="product">
            <div class="thumbnail">
              <a href="#"><img src="http://placehold.it/204x204" alt=""></a>
            </div>
            <hr>
            <div class="title">
              <h3><a href="#">Reshape Panties</a></h3>
              <p>by Jack &amp; Jones</p>
            </div>
          </div>
        </div>
        <div>
          <div class="product">
            <div class="thumbnail">
              <a href="#"><img src="http://placehold.it/204x204" alt=""></a>
            </div>
            <hr>
            <div class="title">
              <h3><a href="#">Reshape Panties</a></h3>
              <p>by Jack &amp; Jones</p>
            </div>
          </div>
        </div>
      </div>

    </div>

    <h2 class="align-center unbranded">Browse Our Store</h2>
    <div class="gap-25"></div>

    <ul class="products row">

      <li class="col-sm-3 first">
        <div class="product">
          <div class="thumbnail">
            <a href="product.html"><img src="http://placehold.it/263x388" alt=""></a>
            <input type="hidden" id="productid1" name="productid1" value="9578111"/>
            <a href="<?= 'addtoshop/'.$productid ?>" class="add-to-cart" title="Add to Cart">
              <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-shopping-cart  fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </div>
          <hr>
          <div class="title">
            <h3><a href="#">Reshape Panties</a></h3>
            <p>by Jack &amp; Jones</p>
          </div>
          <span class="price">$18</span>
        </div>
      </li>

      <li class="col-sm-3">
        <div class="product">
          <div class="thumbnail">
            <a href="product.html"><img src="http://placehold.it/263x388" alt=""></a>
            <a href="#" class="add-to-cart" title="Add to Cart">
              <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-shopping-cart  fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </div>
          <hr>
          <div class="title">
            <h3><a href="#">Reshape Panties</a></h3>
            <p>by Jack &amp; Jones</p>
          </div>
          <span class="price">$18</span>
        </div>
      </li>

      <li class="col-sm-3">
        <div class="product">
          <div class="thumbnail">
            <a href="product.html"><img src="http://placehold.it/263x388" alt=""></a>
            <a href="blog/addtoshop" class="add-to-cart" title="Add to Cart">
              <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-shopping-cart  fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </div>
          <hr>
          <div class="title">
            <h3><a href="#">Reshape Panties</a></h3>
            <p>by Jack &amp; Jones</p>
          </div>
          <span class="price">$18</span>
        </div>
      </li>

      <li class="col-sm-3 last">
        <div class="product">
          <div class="thumbnail">
            <a href="product.html"><img src="http://placehold.it/263x388" alt=""></a>
            <a href="#" class="add-to-cart" title="Add to Cart">
              <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-shopping-cart  fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </div>
          <hr>
          <div class="title">
            <h3><a href="#">Reshape Panties</a></h3>
            <p>by Jack &amp; Jones</p>
          </div>
          <span class="price">$18</span>
        </div>
      </li>

      <li class="col-sm-3 first">
        <div class="product">
          <div class="thumbnail">
            <a href="product.html"><img src="http://placehold.it/263x388" alt=""></a>
            <a href="#" class="add-to-cart" title="Add to Cart">
              <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-shopping-cart  fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </div>
          <hr>
          <div class="title">
            <h3><a href="#">Reshape Panties</a></h3>
            <p>by Jack &amp; Jones</p>
          </div>
          <span class="price">$18</span>
        </div>
      </li>

      <li class="col-sm-3">
        <div class="product">
          <div class="thumbnail">
            <a href="product.html"><img src="http://placehold.it/263x388" alt=""></a>
            <a href="#" class="add-to-cart" title="Add to Cart">
              <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-shopping-cart  fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </div>
          <hr>
          <div class="title">
            <h3><a href="#">Reshape Panties</a></h3>
            <p>by Jack &amp; Jones</p>
          </div>
          <span class="price">$18</span>
        </div>
      </li>

      <li class="col-sm-3">
        <div class="product">
          <div class="thumbnail">
            <a href="product.html"><img src="http://placehold.it/263x388" alt=""></a>
            <a href="#" class="add-to-cart" title="Add to Cart">
              <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-shopping-cart  fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </div>
          <hr>
          <div class="title">
            <h3><a href="#">Reshape Panties</a></h3>
            <p>by Jack &amp; Jones</p>
          </div>
          <span class="price">$18</span>
        </div>
      </li>

      <li class="col-sm-3 last">
        <div class="product">
          <div class="thumbnail">
            <a href="product.html"><img src="http://placehold.it/263x388" alt=""></a>
            <a href="#" class="add-to-cart" title="Add to Cart">
              <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-shopping-cart  fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </div>
          <hr>
          <div class="title">
            <h3><a href="#">Reshape Panties</a></h3>
            <p>by Jack &amp; Jones</p>
          </div>
          <span class="price">$18</span>
        </div>
      </li>

    </ul>


  </div>
</section>

<!-- ========== CONTENT END ========== -->

<!-- ========== FOOTER START ========== -->

<footer id="footer">
  <div class="container">
    <hr>
    <div class="row">

      <div class="col-sm-2">
        <aside class="widget widget_nav_menu">
          <h3 class="widget-title">Garbini</h3>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Log In / Sign Up</a></li>
            <li><a href="#">Checkout</a></li>
            <li><a href="#">My Wishlist</a></li>
            <li><a href="#">My Cart</a></li>
            <li><a href="#">What’s New</a></li>
          </ul>
        </aside>
      </div>

      <div class="col-sm-2">
        <aside class="widget widget_nav_menu">
          <h3 class="widget-title">Shop</h3>
          <ul>
            <li><a href="#">Cloting</a></li>
            <li><a href="#">Feeding Bottles</a></li>
            <li><a href="#">Diaper</a></li>
            <li><a href="#">Infant Clothes</a></li>
            <li><a href="#">Educational Baby Toys</a></li>
            <li><a href="#">Strollers &amp; Pams</a></li>
            <li><a href="#">Creams &amp; Ointments</a></li>
          </ul>
        </aside>
      </div>

      <div class="col-sm-2">
        <aside class="widget widget_nav_menu">
          <h3 class="widget-title">Info</h3>
          <ul>
            <li><a href="#">Company</a></li>
            <li><a href="#">Franchisee</a></li>
            <li><a href="#">Partners</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </aside>
      </div>

      <div class="col-sm-3">

        <aside class="widget widget_newsletter">
          <h3 class="widget-title">Newsletter</h3>
          <form action="#" id="newsletter">
            <label for="newsletter-email">Get Our Newsletter</label>
            <div class="input-group">
              <input type="text" name="newsletter-email" id="newsletter-email" placeholder="Email" class="form-control input-lg">
              <span class="input-group-btn">
                <button class="btn btn-default btn-lg" type="button"><i class="fa fa-envelope"></i></button>
              </span>
            </div>
          </form>
        </aside>

        <aside class="widget widget_social_profiles">
          <h3 class="widget-title">Lets Get Connected</h3>
          <ul class="social-profiles">
            <li>
              <a href="#" title="Facebook">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li>
              <a href="#" title="Google+">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li>
              <a href="#" title="Twitter">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li>
              <a href="#" title="Pinterest">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-pinterest fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li>
              <a href="#" title="LinkedIn">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
        </aside>

      </div>

      <div class="col-sm-3">
        
        <aside class="widget widget_text">
          <h3 class="widget-title">We Accept</h3>
          <img src="<?php echo base_url() ?>assets/img/shop/images/payments.png" alt="">
        </aside>

        <aside class="widget widget_text">
          <h3 class="widget-title">Free Shipping</h3>
          <p class="free-shipping"><i class="fa fa-plane fa-3x"></i> <span>On orders over $50</span></p>
        </aside>

      </div>

    </div>

  </div>

  <div id="copyright">
    <div class="container">&copy; Copyright Garbini 2014 | All Rights Reserved | Designed by <a href="http://themeforest.net/user/jthemes">jThemes</a></div>
  </div>

</footer>

<!-- ========== FOOTER END ========== -->

<div id="cart-panel" class="panel-left">
  <aside class="widget_shopping_cart">
    <h3>Shopping Cart</h3>
    <ul class="cart_list">
      <li>
        <a href="http://coffeecreamthemes.com/themes/perfekta/wordpress/s/flying-ninja/">
          <img alt="" src="http://placehold.it/60x60">
          Reshape Panties
        </a>
        <span class="quantity">1 × <span class="amount">$12.00</span></span>
      </li>
      <li>
        <a href="http://coffeecreamthemes.com/themes/perfekta/wordpress/s/flying-ninja/">
          <img alt="" src="http://placehold.it/60x60">
          Reshape Panties
        </a>
        <span class="quantity">1 × <span class="amount">$12.00</span></span>
      </li>
      <li>
        <a href="http://coffeecreamthemes.com/themes/perfekta/wordpress/s/flying-ninja/">
          <img alt="" src="http://placehold.it/60x60">
          Reshape Panties
        </a>
        <span class="quantity">1 × <span class="amount">$12.00</span></span>
      </li>
    </ul>
    <p class="total"><strong>Subtotal:</strong> <span class="amount">$36.00</span></p>
    <p class="buttons">
      <a class="btn btn-default btn-lg btn-block" href="shopping-cart.html">View Cart</a>
      <a class="btn btn-primary btn-lg btn-block" href="my-account.html">Checkout</a>
    </p>
  </aside>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url() ?>assets/js/shop/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/shop/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/shop/jquery.jpanelmenu.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/shop/main.js"></script>

</body>
</html>
