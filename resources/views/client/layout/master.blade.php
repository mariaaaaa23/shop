<!DOCTYPE html>

<html lang="fa" style="font-family: 'Vazir', Tahoma, sans-serif; direction: rtl; text-align: right;"><!-- sherad by mellatweb.com -->
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="description" content="Fabulous is a creative, clean, fully responsive, powerful and multipurpose HTML Template with latest website trends. Perfect to all type of fashion stores.">
<meta name="keywords" content="HTML,CSS,womens clothes,fashion,mens fashion,fashion show,fashion week">
<meta name="author" content="JTV">
<title>Fabulous by mellatweb.com</title>

<!-- Favicons Icon -->
<link rel="icon" href="/client/images/favicon.ico" type="image/x-icon" />

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="/client/css/styles.css" media="all">



@yield('links')

<style>
  .like{
    color: red;
  }
</style>


</head>

<body class="cms-index-index cms-home-page">

<!-- Newsletter Popup -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog newsletter-popup">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <div class="modal-body">
        <h4 class="modal-title">Subscribe</h4>
        <form id="newsletter-form" method="post" action="#">
          <div class="content-subscribe">
            <div class="form-subscribe-header">
              <label>For all the latest news, products, collection...</label>
              <label>Subscribe now to get 20% off</label>
            </div>
            <div class="input-box">
              <input type="text" class="input-text newsletter-subscribe" title="Sign up for our newsletter" name="email" placeholder="Enter your email address">
            </div>
            <div class="actions">
              <button class="button-subscribe" title="Subscribe" type="submit">Subscribe</button>
            </div>
          </div>
          <div class="subscribe-bottom">
            <input name="notshowpopup" id="notshowpopup" type="checkbox">
            Don’t show this popup again </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Mobile Menu -->
<div id="jtv-mobile-menu">
  <ul>
    <li>
      <div class="mm-search">
        <form id="mob-search" name="search">
          <div class="input-group">
            <div class="input-group-btn">
              <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
              <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    <li><a href="/client/index.html">Home</a>
      <ul>
        <li><a href="/client/index.html">Home Shop 1</a></li>
        <li><a href="/client/version2/index.html">Home Shop 2</a></li>
        <li><a href="/client/version3/index.html">Home Shop 3</a></li>
        <li><a href="/client/version4/index.html">Home Shop 4</a></li>
      </ul>
    </li>
    <li><a href="#">Pages</a>
      <ul>
        <li><a href="/client/shop-shop-grid-sidebar.html">Shop Grid</a></li>
        <li><a href="/client/shop-grid-sidebar.html">Shop Grid Sidebar</a></li>
        <li><a href="/client/shop-shop-list-sidebar.html">Shop List</a></li>
        <li><a href="/client/shop-list-sidebar.html">Shop List Sidebar</a></li>
        <li><a href="/client/product-detail.html">Product Detail</a></li>
        <li><a href="/client/product-detail-sidebar.html">Product Detail Sidebar</a></li>
        <li><a href="/client/shopping-cart.html">سبد خرید </a></li>
        <li><a href="/client/checkout.html">Checkout</a></li>
        <li><a href="/client/wishlist.html">Wishlist</a></li>
        <li><a href="/client/dashboard.html">Dashboard</a></li>
        <li><a href="/client/compare.html">Compare Products</a></li>
        <li><a href="/client/complete-order.html">Complete Order</a></li>
        <li><a href="/client/my-account-information.html">Account Information</a></li>
        <li><a href="/client/about-us.html">About us</a></li>
        <li><a href="b/client/log.html">Blog</a>
          <ul>
            <li><a href="/client/blog.html">Blog</a></li>
            <li><a href="/client/blog-archive.html">Blog Archive</a></li>
            <li><a href="/client/blog_single_post.html">Blog Single</a></li>
          </ul>
        </li>
        <li><a href="/client/team.html">Team</a></li>
        <li><a href="/client/contact.html">Contact us</a></li>
        <li><a href="/client/404error.html">404 Error Page</a></li>
      </ul>
    </li>
    <li><a href="#">Men's</a>
      <ul>
        <li><a href="#">Jackets</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Coats</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Outerwear</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Bags</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Dresses</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Watches</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Fastrack</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Casio</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Sonata</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Maxima</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Footwear</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Sports</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Flat Sandals</a></li>
            <li><a href="/client/sho/client/p-grid-sidebar.html">Casual</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Sneakers</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Jwellery</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Bracelets</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Necklaces &amp; Pendent</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Pendants</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Pins &amp; Brooches</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Suits</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Casual Dresses</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Evening</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Designer</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Party</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Accessories</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Trousers</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Jeans</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Clothing</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Shirts</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a href="/client/shop-grid-sidebar.html">Women's </a>
      <ul>
        <li><a href="/client/shop-grid-sidebar.html">Clothing</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Dress sale</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Sarees</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Kurta & kurti</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Dress materials</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Salwar kameez sets</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Jewellery</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Rings</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Earrings</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Jewellery sets</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Pendants & lockets</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Plastic jewellery</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Beauty</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Make up</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Hair care</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Deodorants</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Bath & body</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Skin care</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Watches</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Fasttrack</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Casio</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Titan</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Tommy-Hilfiger</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Fossil</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Footwear</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Flats</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Heels</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Boots</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Slippers</a></li>
            <li><a href="s/client/hop-grid-sidebar.html">Shoes</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Accesories</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Backpacks</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Wallets</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Laptops Bags</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Belts</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Handbags</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a href="/client/shop-grid-sidebar.html">Kids</a>
      <ul>
        <li><a href="/client/shop-grid-sidebar.html">Clothing</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">T-Shirts</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Shirts</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Trousers</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Sleep Wear</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Accesories</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Backpacks</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Wallets</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Laptops Bags</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Belts</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Watches</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Fastrack</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Casio</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Titan</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Maxima</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Footwear</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Casual</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Sports</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Formal</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Sandals</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Computer</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">External Hard Disk</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Pendrives</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Headphones</a></li>
            <li><a href="/client/shop-grid-sidebar.html">PC Components</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Appliances</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Vaccum Cleaners</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Indoor Lighting</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Kitchen Tools</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Water Purifier</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a href="/client/shop-grid-sidebar.html">Accessories </a>
      <ul>
        <li><a href="/client/shop-grid-sidebar.html">Sunglasses</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Over-Sized</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Wayfarer</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Premium Brands</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Uv Glass</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Colores</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Watches</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Fastrack</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Timex</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Titan</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Fossil</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Casio</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Bags & Wallets</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Handbags</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Sling Bags</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Wallets & Belts</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Totes</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Travel Bags</a></li>
          </ul>
        </li>
        <li><a href="/client/shop-grid-sidebar.html">Western Wear</a>
          <ul>
            <li><a href="/client/shop-grid-sidebar.html">Jeans</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Polo's & T-Shirts</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Shirts Tops</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Gymwear</a></li>
            <li><a href="/client/shop-grid-sidebar.html">Sleep Wear</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a href="/client/blog.html">Blog</a></li>
    <li><a href="contact-us.html">Contact Us</a></li>
  </ul>
  <div class="top-links">
    


      {{-- در صورتی که کاربر لاگین نکرده این رو نمایش بده --}}
    @auth
    {{-- برای لاگوت --}}
    <form action="{{ route('client.logout') }}" method="post">
      @csrf
      @method('DELETE')
      <input type="submit" name="logout" class="btn btn-sm btn-danger" value="خروج">
    </form>
    @else
      <ul class="links">
        <li class="last"><a title="Login" href="{{ route('client.register') }}"><span>ورود/ثبت نام</span></a></li>
      </ul>
    @endauth
    
    
    <div class="language-box">
      <select class="selectpicker" data-width="fit">
        <option>English</option>
        <option>Francais</option>
        <option>German</option>
        <option>Español</option>
      </select>
    </div>
    <div class="currency-box">
      <form class="form-inline">
        <div class="input-group">
          <div class="currency-addon">
            <select class="currency-selector">
              <option data-symbol="$">USD</option>
              <option data-symbol="€">EUR</option>
              <option data-symbol="£">GBP</option>
              <option data-symbol="¥">JPY</option>
              <option data-symbol="$">CAD</option>
              <option data-symbol="$">AUD</option>
            </select>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="page"> 
  <!-- Header -->
  <header>
    <div class="header-container">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-sm-3 col-xs-12">
            <div class="logo"><a title="ecommerce Template" href="/client/client/index.html"><img alt="ecommerce Template" src="/client/images/logo.png"></a></div>
            <div class="nav-icon">
              <div class="mega-container visible-lg visible-md visible-sm">
                <div class="navleft-container">
                  <div class="mega-menu-title">
                    <h3><i class="fa fa-navicon"></i>دسته بندی ها</h3>
                  </div>

                  @include('client.layout.menu')

                  <div class="col-lg-9 col-sm-9 col-xs-12 jtv-rhs-header">
                    <div class="jtv-mob-toggle-wrap">
                    <div class="mm-toggle"><i class="fa fa-reorder"></i><span class="mm-label">Menu</span></div>
                    </div>
                    <div class="jtv-header-box">
                    <div class="search_cart_block">
                    <div class="search-box hidden-xs">
                      <form id="search_mini_form" action="#" method="get">
                        <input id="search" type="text" name="q" value="" class="searchbox" placeholder="Search entire store here..." maxlength="128">
                        <button type="submit" title="Search" class="search-btn-bg" id="submit-button"><span class="hidden-sm">Search</span><i class="fa fa-search hidden-xs hidden-lg hidden-md"></i></button>
                      </form>
                    </div>
                    <div class="right_menu">
                      <div class="menu_top">
                        <div class="top-cart-contain pull-right">
                          <div class="mini-cart">
                            {{-- {{ \App\Models\Cart::totalItems() }} نمایش تعداد کل محصولات    {{ \App\Models\Cart::totalItems() }} نمایش مبلغ کل محصولات در هدر سایت در سب.د خرید --}}
                            <div class="basket"> <a class="basket-icon" href="#">            <i class="fa fa-shopping-basket"></i>            <span id="total_items">{{ \App\Models\Cart::totalItems() }}</span>              سبد خرید            <span id="total_amount">{{ \App\Models\Cart::totalAmount() }}</span>        </a>
                              <div class="top-cart-content" id="menu-cart">
                                <div class="block-subtitle">
                                  <div class="top-subtotal"><span id="total_items">0</span> <span id="total_amount" class="price">0</span></div>
                                </div>
                                <div id="cart-table-body">
                                <ul class="mini-products-list" id="cart-sidebar">
                                  {{-- مینی کارت هدر سایت وقتی هاور میکنیم --}}

                                  @foreach (\App\Models\Cart::getItems() as $item )
                                  @php
                                    $product = $item['product'];
                                    $productQty = $item['quantity'];
                                  @endphp
                                  <li class="item" id="cart-row-{{ $product->id }}" >
                                    <div class="item-inner"><a class="product-image" title="{{ $product->name }}" href="/client/product-detail.html"><img alt="{{ $product->name }}" src="{{ $product->image_path }}"></a>
                                      <div class="product-details">
                                        {{-- onclick="removeFromCart($product->id)" حذف محصول از سبد خرید --}}
                                        <div class="access"><a class="btn-remove1" onclick="removeFromCart({{ $product->id }})" title="Remove This Item" href="#">Remove</a> <a class="btn-edit" title="Edit item" onclick="removeFromCart({{ $product->id }})" href="#"><i class="fa fa-pencil"></i><span class="hidden">Edit item</span></a> </div>
                                        <p class="product-name"><a href="/client/product-detail.html">{{ $product->name }}</a></p>
                                        <strong>{{ $productQty }}</strong> x <span class="price">تومان {{ $product->cost_with_discount }}</span></div>
                                    </div>
                                  </li>
                                  @endforeach
                                  
                                </ul>
                                </div>
                                <div class="actions"> <a href="{{ route('client.cart.index') }}" class="view-cart"><span>View Cart</span></a>
                                  <button onclick="window.location.href='{{ route('client.orders.create') }}'" class="btn-checkout" title="Checkout" type="button"><span>Checkout</span></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="language-box hidden-xs">
                        <select class="selectpicker" data-width="fit">
                          <option>English</option>
                          <option>Francais</option>
                          <option>German</option>
                          <option>Español</option>
                        </select>
                      </div>
                      <div class="currency-box hidden-xs">
                        <form class="form-inline">
                          <div class="input-group">
                            <div class="currency-addon">
                              <select class="currency-selector">
                                <option data-symbol="$">USD</option>
                                <option data-symbol="€">EUR</option>
                                <option data-symbol="£">GBP</option>
                                <option data-symbol="¥">JPY</option>
                                <option data-symbol="$">CAD</option>
                                <option data-symbol="$">AUD</option>
                              </select>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    </div>
                    <div class="top_section hidden-xs">
                    <div class="toplinks">
                      <div class="site-dir hidden-xs"> <a class="hidden-sm" href="#"><i class="fa fa-phone"></i> <strong>Hotline:</strong> +1 123 456 7890</a> 
                        {{-- اگه کاربر لاگین کرده بود نمایش بده لیست علاقه مندی ها رو --}}
                        @auth
                        <a href="{{ route('client.likes.index') }}"><i class="fa fa"></i> علاقه مندی ها  <span id="likes_count">({{ auth()->user()->likes()->count() }})</span></a> </div>
                        @endauth
                      <ul class="links">
                          {{-- در صورتی که کاربر لاگین نکرده این رو نمایش بده --}}
         @auth
           {{-- برای لاگوت --}}
           <form action="{{ route('client.logout') }}" method="post">
           @csrf
           @method('DELETE')
          <input type="submit" name="logout" class="btn btn-sm btn-danger" value="خروج">
    </form>
         @else
         <ul class="links"></ul>
        <li class="last"><a title="Login" href="{{ route('client.register') }}"><span>ورود/ثبت نام</span></a></li>
      </ul>
    @endauth
                      </ul>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
      </div>
    </div>
  </header>
  <!-- end header --> 
  <!-- Revslider -->
  


  @yield('content')
  
  <!-- Footer -->
  <footer>
    <div class="footer-inner">
      <div class="news-letter">
        <div class="container">
          <div class="heading text-center">
            <h2>Just Subscribe Now!</h2>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. Sed feugiat, tellus vel tristique posuere.</span> </div>
          <form>
            <input type="email" placeholder="Enter your email address" required>
            <button type="submit">Send me</button>
          </form>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <h4>About</h4>
            <div class="contacts-info">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
              <address>
              <i class="fa fa-location-arrow"></i> <span>resallat st. / ahar / tabriz / IR<br>
              New York, USA</span>
              </address>
              <div class="phone-footer"><i class="fa fa-phone"></i> 041-44235034</div>
              <div class="email-footer"><i class="fa fa-envelope"></i> <a href="/client/mailto:support@example.com"></a> </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-2 col-sm-6 col-xs-12">
            <h4>Helpful Links</h4>
            <ul class="links">
              <li><a href="#">Products</a></li>
              <li><a href="#">Find a Store</a></li>
              <li><a href="#">Features</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="/client/blog.html">Blog</a></li>
              <li><a href="/client/sitemap.html">Site Map</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-2 col-sm-6 col-xs-12">
            <h4>Shop</h4>
            <ul class="links">
              <li><a href="/client/about-us.html">About Us</a></li>
              <li><a href="/client/faq.html">FAQs</a></li>
              <li><a href="#">Shipping Methods</a></li>
              <li><a href="/client/contact.html">Contact</a></li>
              <li><a href="#">Support</a></li>
              <li><a href="#">Retailer</a></li>
            </ul>
          </div>
          <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6">
            <div class="social">
              <h4>Follow Us</h4>
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
              </ul>
            </div>
            <div class="payment-accept">
              <h4>Secure Payment</h4>
              <div class="payment-icon"><img src="/client/images/paypal.png" alt="paypal"> <img src="/client/images/visa.png" alt="visa"> <img src="/client/ima/client/ges/american-exp.png" alt="american express"> <img src="/client/images/mastercard.png" alt="mastercard"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12 coppyright text-center">© 2018 Fabulous, All rights reserved <a href="https://www.mellatweb.com/">MELLATWEB.COM <a/> .</div>
        </div>
      </div>
    </div>
  </footer>
</div>

<!-- JavaScript --> 
<script src="/client/js/jquery.min.js"></script> 
<script src="/client/js/bootstrap.min.js"></script> 
<script src="/client/js/revslider.js"></script> 
<script src="/client/js/main.js"></script> 
<script src="/client/js/owl.carousel.min.js"></script> 
<script src="/client/js/mob-menu.js"></script> 
<script src="/client/js/countdown.js"></script> 



<script>
  jQuery(document).ready(function() {
      jQuery("#rev_slider_1").show().revolution({
          sliderType: "standard",
          sliderLayout: "auto",
          delay: 5000,
          navigation: {
              arrows:{enable:true}
          },
          gridwidth: 1170,
          gridheight: 450
      });
  });
  </script>
  

<script>
  function like(productId){
   

    $.ajax({
      // ریکوئستمون از نوع پست
      type: 'post',
      // مقصد url کجاست
      // productId قراره از ورودی بگیریم
      url: '/likes/' + productId,

       data: {
        // که لاراول بتونه به بک اندمون اعتماد کنه و پردازش کنه ریکوئستمون یا درخواستمون رو
        _token : "{{ csrf_token() }}"
      },

      // وقتی ریکوئستمون به صورت موفقیت آمیز انجام شد بلاک success اجرا خواهد شد
      // 
       success: function (data) {
       var icon = $('#like-' + productId); 
       // اگه آیکون کلاس لایک رو داره بیا ریموو کن یعنی حذف کن اگه برای بار دوم کاربر کلیک کرد
      // وگرنه بیا کلاس لایک رو اضافه کن
       icon.toggleClass('like');
       $('#likes_count').text(data.likes_count)
      }

      

    });
  }

  // برای افزودن به سبد خرید
  function addToCart(productId) 
  {
    // برای صفحه کلاینت هوم
    var quantity = 1;


    // به محض اینکه تعداد بیشتر از صفر باشه
    if($('#input-qty').length){
      // $('#input-qty')باید اسم ایدی دکممون باشه
     quantity= $('#input-qty').val()
    }

    
    $.ajax({
      type: "post",
      url: "/cart/"+ productId,
      data: {
       _token: "{{ csrf_token() }}",
      //  تعداد سفارش
      quantity: quantity

      },
      success: function(data){
        $('#total_items').text(data.total_items);
        $('#total_amount').text(data.total_amount);

        // console.log(data.cart['productId']);


        // اگه محصولی قبلا به سبد خرید اضافه کرده بودیم این رو دیگه اضافه نشه که محصول تکراری وارد سبد خرید نشه
        // یعنی چک کنیم اون محصول صفر باشه یعنی وجود نداشته باشه دیگه اضافه بشه
        if($('#cart-row-' + productId).length == 0){

          var product = data.cart[productId]['product'];
          var productQty = data.cart[productId]['quantity'];


          // دسترسی به سبد خرید از طریق پروداکت آیدی
        // به آخرین رویی که وجود داره ییک رو دیگه اضاف کن
        $('#cart-table-body:last-child').append('<li class="item" id="cart-row-' + product.id + '">'
                                   + '<div class="item-inner"><a class="product-image" title="'+ product.name +'" href="/client/product-detail.html"><img alt="'+ product.name +'" src="'+ product.image_path +'"></a>'
                                     + '<div class="product-details">'
                                        
                                       + '<div class="access"><a class="btn-remove1" onclick="removeFromCart('+ product.id +')" title="Remove This Item" href="#">Remove</a> <a class="btn-edit" title="Edit item" onclick="removeFromCart('+ product.id +')" href="#"><i class="fa fa-pencil"></i><span class="hidden">Edit item</span></a> </div>'
                                      + '<p class="product-name"><a href="/client/product-detail.html">' + product.name + '</a></p>'
                                       + '<strong>' + productQty + '</strong> x <span class="price">تومان ' + product.cost_whith_discount + '</span></div>'
                                   + '</div>'
                                  + '</li>'
                                );

        }

        
      }

    })

  }



    // برای حذف از سبد خرید
    function removeFromCart(productId) {
    $.ajax({
        type: "delete",
        url: "/cart/" + productId,
        data: {
            _token: "{{ csrf_token() }}"
        },
        success: function(data){
            // به cart دسترسی بده
            $('#total_items').text(data.cart.total_items);
            $('#total_amount').text(data.cart.total_amount);
            $('#cart-row-' + productId).remove();
        }
    });
}

  
  
  function updateCart(productId) {
    let qty = $('#qty-' + productId).val();

    $.ajax({
        type: 'post',
        url: '/cart/' + productId,
        data: {
            _token: "{{ csrf_token() }}",
            qty: qty   // 👈 همین مهمه
        },
        success: function (data) {
            $('#total_items').text(data.total_items);
            $('#total_amount').text(data.total_amount);
        }
    });
}
    
  
  


</script>

@yield('scripts')

<script>
jQuery(document).ready(function(){
jQuery('#rev_slider_1').show().revolution({
dottedOverlay: 'none',
delay: 5000,
startwidth: 858,
startheight: 500,

hideThumbs: 200,
thumbWidth: 200,
thumbHeight: 50,
thumbAmount: 2,

navigationType: 'thumb',
navigationArrows: 'solo',
navigationStyle: 'round',

touchenabled: 'on',
onHoverStop: 'on',

swipe_velocity: 0.7,
swipe_min_touches: 1,
swipe_max_touches: 1,
drag_block_vertical: false,

spinner: 'spinner0',
keyboardNavigation: 'off',

navigationHAlign: 'center',
navigationVAlign: 'bottom',
navigationHOffset: 0,
navigationVOffset: 20,

soloArrowLeftHalign: 'left',
soloArrowLeftValign: 'center',
soloArrowLeftHOffset: 20,
soloArrowLeftVOffset: 0,

soloArrowRightHalign: 'right',
soloArrowRightValign: 'center',
soloArrowRightHOffset: 20,
soloArrowRightVOffset: 0,

shadow: 0,
fullWidth: 'on',
fullScreen: 'off',

stopLoop: 'off',
stopAfterLoops: -1,
stopAtSlide: -1,

shuffle: 'off',

autoHeight: 'off',
forceFullWidth: 'on',
fullScreenAlignForce: 'off',
minFullScreenHeight: 0,
hideNavDelayOnMobile: 1500,

hideThumbsOnMobile: 'off',
hideBulletsOnMobile: 'off',
hideArrowsOnMobile: 'off',
hideThumbsUnderResolution: 0,

hideSliderAtLimit: 0,
hideCaptionAtLimit: 0,
hideAllCaptionAtLilmit: 0,
startWithSlide: 0,
fullScreenOffsetContainer: ''
});
});
</script> 
<!-- Hot Deals Timer --> 
<script>
var dthen1 = new Date("12/25/17 11:59:00 PM");
start = "08/04/15 03:02:11 AM";
start_date = Date.parse(start);
var dnow1 = new Date(start_date);
if (CountStepper > 0)
ddiff = new Date((dnow1) - (dthen1));
else
ddiff = new Date((dthen1) - (dnow1));
gsecs1 = Math.floor(ddiff.valueOf() / 1000);

var iid1 = "countbox_1";
CountBack_slider(gsecs1, "countbox_1", 1);
</script>
</body>
</html>
