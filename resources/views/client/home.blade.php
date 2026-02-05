@extends('client.layout.master')


@section('content')


<div class="container jtv-home-revslider">
  <div class="row">
    {{-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"> --}}
      <aside style="border:1px solid #ddd;padding:10px;border-radius:6px">
          <h3 style="margin-bottom:10px;font-size:16px">دسته‌بندی محصولات</h3>
  
          @foreach ($categories as $category)
              <details style="border-bottom:1px solid #eee;padding:6px 0">
                  <summary style="
                      cursor:pointer;
                      font-weight:bold;
                      font-size:14px;
                      list-style:none;
                  ">
                      {{ $category->title }}<span class="caret-right">&rsaquo;</span>
                  </summary>
                 {{-- اگر تعداد زیر دسته ها بیشتر از صفرتا بود نمایش بده زیر دسته ها را --}}
                  @if ($category->has_children)
                  
                      <ul style="padding-right:15px;margin-top:6px">

                          @foreach ($category->children as $subCategory)

                              <li style="margin:5px 0">
                                  <a href="#"
                                     style=" font-size:13px;color:#555;text-decoration:none">
                                     {{-- نمایش زیر دسته ها--}}
                                      {{ $subCategory->title }}
                                  </a>
                              </li>
                          @endforeach
                      </ul>
                  @endif
              </details>
          @endforeach
  
      </aside>
  {{-- </div> --}}

            
         
    @foreach ($sliders as $slider)
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
      <div class="banner-block"> <a href="{{ $slider->links }}"> <img src="{{ asset('storage/'.$slider->image) }}" alt=""> </a>
        <div class="text-des-container pad-zero">
          <div class="text-des">
            <p>Designer</p>
            <h2>Handbags</h2>
          </div>
        </div>
      </div>
      
    </div>
    @endforeach

  </div>
</div>
     
    
    
    </div>
  </div>
  <!-- Support Policy Box -->
  <div class="container">
    <div class="support-policy-box">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="support-policy"> <i class="fa fa-truck"></i>
            <div class="content">Free Shipping on order over $49</div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="support-policy"> <i class="fa fa-phone"></i>
            <div class="content">Need Help +1 123 456 7890</div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="support-policy"> <i class="fa fa-refresh"></i>
            <div class="content">30 days return Service</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Container -->

  {{-- نمایش دسته بندی های محصولات --}}
       @foreach ($categories as $category )
           

       <section class="main-container">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-xs-12">
              <div class="col-main">
                <div class="jtv-featured-products">
                  <div class="slider-items-products">
                    <div class="jtv-new-title">
                      <h2>{{ $category->title }}</h2>
                    </div>
                    <div id="featured-slider" class="product-flexslider hidden-buttons">
                      <div class="slider-items slider-width-col4 products-grid">
                        @foreach ($category->getAllSubCategoryProducts() as $product )

                        <div class="item">
                            <div class="item-inner">
                              <div class="item-img">
                                <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="{{ route('client.products.show', $product) }}"> <img alt="Product tilte is here" src="{{asset('storage/' . $product->image)  }}"> </a>
                                 {{-- اگر تخفیف وجود داشت قیمت اصلی رو نمایش میده خط میزنه و قیمت تخفیفی نمایش میده-
                                    به عبارتی دیگر یعنی اگر محصول تخفیف داره --}}
                                 @if($product->has_discount)

                                  <div class="new-label new-top-left">{{$product->discount_value }}%</div>

                                  @endif
                                  <div class="mask-shop-white"></div>
                                  <a class="quickview-btn" href="{{ route('client.products.show', $product) }}"><span>Quick View</span></a> <a href="{{ route('client.products.show', $product) }}">
                                  <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                  </a> <a href="{{ route('client.products.show', $product) }}">
                                  <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                  </a> </div>
                              </div>
                              <div class="item-info">
                                <div class="info-inner">
                                  <div class="item-title"> <a title="Product tilte is here" href="/client/product-detail.html">{{ $product->name }}</a> </div>
                                  <div class="item-content">
                                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                    <div class="item-price">
                                      
                                      <div class="price-box"> <span class="regular-price"> <span class="price">{{ $product->cost_whith_discount}}</span></span>
                                       
                                          {{-- اگر تخفیف وجود داشت قیمت اصلی رو نمایش میده خط میزنه و قیمت تخفیفی نمایش میده-
                                          به عبارتی دیگر یعنی اگر محصول تخفیف داره --}}
                                      @if($product->has_discount)
                                        <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> {{ $product->cost }} </span> </p>
                                      @endif
                                          
                                        
                                      </div>
                                    </div>
                                    <div class="actions">
                                      <div class="add_cart">
                                        {{--onClick="addToCart({{ $product->id }});" وقتی روی دکمه افزودن به سبد خریذد کلیک میکنیم بره سبد خرید باید بره محصول  --}}
                                      <button onClick="addToCart({{ $product->id }});" class="button btn-cart" title="Add to Cart" type="button"><i class="fa fa-shopping-cart"></i> افزودن به سبد خرید </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </div>
                          
                        @endforeach
                        </div>
                       

       @endforeach
          <!-- End Trending Products Slider --> 
          
          <!-- Latest Blog -->
          <div class="jtv-latest-blog">
            <div class="jtv-new-title">
              <h2>Latest News</h2>
            </div>
            <div class="row">
              <div class="blog-outer-container">
                <div class="blog-inner">
                  <div class="col-xs-12 col-sm-4 blog-preview_item">
                    <div class="entry-thumb jtv-blog-img-hover"> <a href="/client/blog_single_post.html"> <img alt="Blog" src="/client/images/blog-img1.jpg"> </a> </div>
                    <h4 class="blog-preview_title"><a href="/client/blog_single_post.html">Neque porro quisquam est qui</a></h4>
                    <div class="blog-preview_info">
                      <ul class="post-meta">
                        <li><i class="fa fa-user"></i>By <a href="#">admin</a></li>
                        <li><i class="fa fa-comments"></i><a href="#">8 comments</a></li>
                        <li><i class="fa fa-clock-o"></i><span class="day">12</span><span class="month">Feb</span></li>
                      </ul>
                      <div class="blog-preview_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. <a class="read_btn" href="/client/blog_single_post.html">Read More</a></div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 blog-preview_item">
                    <div class="entry-thumb jtv-blog-img-hover"> <a href="/client/blog_single_post.html"> <img alt="Blog" src="/client/images/blog-img1.jpg"> </a> </div>
                    <h4 class="blog-preview_title"><a href="/client/blog_single_post.html">Neque porro quisquam est qui</a></h4>
                    <div class="blog-preview_info">
                      <ul class="post-meta">
                        <li><i class="fa fa-user"></i>By <a href="#">admin</a></li>
                        <li><i class="fa fa-comments"></i><a href="#">20 comments</a></li>
                        <li><i class="fa fa-clock-o"></i><span class="day">25</span><span class="month">Feb</span></li>
                      </ul>
                      <div class="blog-preview_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. <a class="read_btn" href="/client/blog_single_post.html">Read More</a></div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 blog-preview_item">
                    <div class="entry-thumb jtv-blog-img-hover"> <a href="/client/blog_single_post.html"> <img alt="Blog" src="/client/images/blog-img1.jpg"> </a> </div>
                    <h4 class="blog-preview_title"><a href="/client/blog_single_post.html">Dolorem ipsum quia dolor sit amet</a></h4>
                    <div class="blog-preview_info">
                      <ul class="post-meta">
                        <li><i class="fa fa-user"></i>By <a href="#">admin</a></li>
                        <li><i class="fa fa-comments"></i><a href="#">8 comments</a></li>
                        <li><i class="fa fa-clock-o"></i><span class="day">15</span><span class="month">Jan</span></li>
                      </ul>
                      <div class="blog-preview_desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem dolore lauda. <a class="read_btn" href="/client/blog_single_post.html">Read More</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Latest Blog --> 
        </div>
      </div>
    </div>
  </section>
  
  <!-- Collection Banner -->
  <div class="jtv-collection-area">
    <div class="container">
      <div class="column-right pull-left col-sm-4 no-padding"> <a href="#"> <img src="/client/images/women-top.jpg" alt="Top Collections"> </a>
        <div class="col-right-text">
          <h5 class="text-uppercase">Top Collections <span> 35% </span> get it now</h5>
        </div>
      </div>
      <div class="column-left pull-right col-sm-8 no-padding">
        <div class="column-left-top">
          <div class="col-left-top-left pull-left col-sm-8 no-padding"> <a href="#"> <img src="/client/images/men-suits.jpg" alt="Men's Suits"> </a>
            <div class="col-left-top-left-text">
              <h5 class="text-uppercase">Dressing for your Wedding</h5>
              <h3 class="text-uppercase">Men's Suits</h3>
              <h5 class="text-uppercase">Look Good, Feel Good</h5>
            </div>
          </div>
          <div class="col-left-top-right pull-right col-sm-4 no-padding"> <a href="#"> <img src="/client/images/footwear.jpg" alt="footwear"> </a>
            <div class="col-left-top-right-text text-center">
              <h5 class="text-uppercase">Footwear Fashion Sale</h5>
              <h3>50%</h3>
              <h5 class="text-uppercase">Buy 1, Get 1</h5>
            </div>
          </div>
        </div>
        <div class="column-left-bottom col-sm-12 no-padding">
          <div class="col-left-bottom-left pull-left col-sm-4 no-padding"> <a href="#"> <img src="/client/images/handbag.jpg" alt="Handbag"> </a>
            <div class="col-left-bottom-left-text">
              <h5 class="text-uppercase">What's New?</h5>
              <h3 class="text-uppercase">Bag's</h3>
              <h5 class="text-uppercase">Everyday<br>
                Low Prices</h5>
            </div>
          </div>
          <div class="col-left-bottom-right pull-right col-sm-8 no-padding"> <a href="#"> <img src="/client/images/watch-banner.jpg" alt="Watch"> </a>
            <div class="col-left-bottom-right-text">
              <h5 class="text-uppercase">Never Miss a Second</h5>
              <h3 class="text-uppercase">Watch</h3>
              <h5 class="text-uppercase">Time to buy a watch!</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- collection area end -->
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-xs-12">
        <div class="jtv-hot-deal-product">
        <div class="jtv-new-title">
              <h2>Deals Of The Day</h2>
            </div>
          <ul class="products-grid">
            <li class="right-space two-height item">
              <div class="item-inner">
                <div class="item-img">
                  <div class="item-img-info"><a href="#" title="Product tilte is here" class="product-image"><img src="/client/images/products/product-fashion-1.jpg" alt="Product tilte is here"> </a>
                    <div class="hot-label hot-top-left">Hot Deal</div>
                    <div class="mask-shop-white"></div>
                    <a class="quickview-btn" href="/client/quick-view.html"><span>Quick View</span></a> <a href="/client/wishlist.html">
                      <ul class="add-to-links">
                     {{-- onclick="like(); وقتی کلیک میکنیم رنگ قرمز بشه قلب 
                     @if($product->is_liked) like @endif  چک میکنه اگه کاربر لایک کرده بود کلاس لایک بهش میده --}}
                     <li><a class="link-wishlist" href="javascript:void(0)"><i id="like-{{ $product->id }}"class="fa fa-heart @if($product->is_liked) like @endif" onclick="like({{ $product->id }})"></i><span> </span></a></li>
                    </ul>
                    </a> <a href="/client/compare.html">
                    <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                    </a> </div>
                    <div class="jtv-timer-box">
                  <div class="countbox_1 timer-grid"></div>
                </div>
                </div>
                
                <div class="item-info">
                  <div class="info-inner">
                    <div class="item-title"> <a title="Product tilte is here" href="/client/product-detail.html">Product tilte is here </a> </div>
                    <div class="item-content">
                      <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                      <div class="item-price">
                        <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span></span></div>
                      </div>
                      <div class="actions">
                        <div class="add_cart">
                          <button class="button btn-cart" onClick="addToCart({{ $product->id }});" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12 hidden-sm">
        <div class="sidebar-banner">
        <div class="jtv-top-banner"> <a href="#"> <img src="/client/images/banner3.jpg" alt="banner"> </a> </div>
        <div class="jtv-top-banner"> <a href="#"> <img src="/client/images/banner4.jpg" alt="banner"> </a> </div></div>
      </div>
      <!-- Top Seller Slider -->
      <div class="col-sm-4 col-xs-12">
        <div class="jtv-top-products">
          <div class="slider-items-products">
            <div class="jtv-new-title">
              {{-- نمایش دسته بندی ویژه --}}
              <h2>{{ $featuredCategory->category->title }}</h2>
            </div>
            <div id="top-products-slider{{ $subCategory->id }}" class="product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col4 products-grid">
                <div class="item">
                  <div class="item-inner">
                    <div class="item-img">
                      
                      @foreach ($featuredCategory->category->children as $subCategory )
                      <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="{{ $subCategory->id }}">{{ $subCategory->title }} <img alt="Product tilte is here" src="/client/images/products/product-fashion-1.jpg">{{ $subCategory->title }} </a>
                        <div class="mask-shop-white"></div>
                        <div class="new-label new-top-left">new</div>
                        <a class="quickview-btn" href="/client/quick-view.html"><span>Quick View</span></a> <a href="/client/wishlist.html">
                        <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                        </a> <a href="/client/compare.html">
                        <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                        </a> </div>
                      @endforeach
                    </div>
                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title"> <a title="Product tilte is here" href="/client/product-detail.html">{{ $subCategory->title }} </a> </div>
                        <div class="item-content">
                          <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                          <div class="item-price">
                            <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span></span></div>
                          </div>
                          <div class="actions">
                            <div class="add_cart">
                              <button class="button btn-cart" onClick="addToCart({{ $product->id }});" type="button"><span><i class="fa fa-shopping-cart"></i> افزودن به سبد خرید  </span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="item-inner">
                    <div class="item-img">
                      <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="/client/product-detail.html"> <img alt="Product tilte is here" src="/client/images/products/product-fashion-1.jpg"> </a>
                        <div class="sale-label sale-top-right">Sale</div>
                        <div class="mask-shop-white"></div>
                        <div class="new-label new-top-left">new</div>
                        <a class="quickview-btn" href="/client/quick-view.html"><span>Quick View</span></a> <a href="/client/wishlist.html">
                        <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                        </a> <a href="/client/compare.html">
                        <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                        </a> </div>
                    </div>
                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title"> <a title="Product tilte is here" href="/client/product-detail.html">Product tilte is here </a> </div>
                        <div class="item-content">
                          <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                          <div class="item-price">
                            <div class="price-box">
                              <p class="special-price"> <span class="price-label">Special Price</span><span class="price"> $156.00 </span></p>
                              <p class="old-price"> <span class="price-label">Regular Price:</span><span class="price"> $167.00 </span></p>
                            </div>
                          </div>
                          <div class="actions">
                            <div class="add_cart">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> افزودن به سبد خرید  </span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="item-inner">
                    <div class="item-img">
                      <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="/client/product-detail.html"> <img alt="Product tilte is here" src="/client/images/products/product-fashion-1.jpg"> </a>
                        <div class="mask-shop-white"></div>
                        <div class="new-label new-top-left">new</div>
                        <a class="quickview-btn" href="/client/quick-view.html"><span>Quick View</span></a> <a href="/client/wishlist.html">
                        <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                        </a> <a href="/client/compare.html">
                        <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                        </a> </div>
                    </div>
                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title"> <a title="Product tilte is here" href="/client/product-detail.html">Product tilte is here </a> </div>
                        <div class="item-content">
                          <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                          <div class="item-price">
                            <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span></span></div>
                          </div>
                          <div class="actions">
                            <div class="add_cart">
                              <button class="button btn-cart" onClick="addToCart({{ $product->id }});" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Top Seller Slider --> 
      </div>
    </div>
  </div>
  
  <!-- Brand Logo -->
  <div class="container jtv-brand-logo-block">
    <div class="jtv-brand-logo">
      <div class="slider-items-products">
        <div id="jtv-brand-logo-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col6">

            {{-- نمایش برندها--}}
            @foreach ($brands as $brand )
            <div class="item"><a href="#"><img src="{{asset('storage/' . $brand->image)  }}" alt="{{ $brand->name }}" ></a> </div>
            @endforeach

            
          </div>
        </div>
      </div>
    </div>
  </div>

{{-- نمایش دسته بندی ویژه --}}
  <div class="featured-products">

    <!-- Tabs -->
    <ul class="tabs">
      @foreach ($featuredCategory->category->children as $subCategory)
        <li
          class="tab "
          data-tab="tab-{{ $subCategory->id }}"
        >
          {{ $subCategory->title }}
        </li>
      @endforeach
    </ul>
  
    <!-- Tab Contents -->
    @foreach ($featuredCategory->category->children as $subCategory)
      <div
        class="tab-content"
        id="tab-{{ $subCategory->id }}"
      >
        <div class="products-row">
  
          @forelse ($subCategory->products as $product)
            <div class="product-card">
              <a href="{{ route('client.products.show',$product) }}">
                <img src="{{ asset('storage/' . $product->image) }}">
              </a>
  
              <h3>
                <a href="{{ route('client.products.show',$product) }}">
                  {{ $product->name }}
                </a>
              </h3>
  
              <p>
                @if ($product->has_discount)
                    <del>{{ number_format($product->cost) }} تومان</del><br>
                    {{ number_format($product->cost_whith_discount) }} تومان
                @else
                    {{ number_format($product->cost) }} تومان
                @endif
            </p>
            
            <i id="like-{{ $product->id }}" 
              class="fa fa-heart @if($product->is_liked) like @endif" 
              onclick="like({{ $product->id }})"></i>
           
  
              <button onClick="addToCart({{ $product->id }});">افزودن به سبد</button>
            </div>
          @empty
            <p>محصولی برای این دسته ثبت نشده</p>
          @endforelse
  
        </div>
      </div>
    @endforeach
  
  </div>
  
  
  <style>
  /* Tabs */
  .tabs {
    display: flex;
    list-style: none;
    padding: 0;
    margin-bottom: 15px;
    border-bottom: 2px solid #eee;
  }
  .tab {
    padding: 10px 20px;
    cursor: pointer;
    border: 1px solid transparent;
    margin-right: 5px;
  }
  .tab.active {
    border: 1px solid #ccc;
    border-bottom: 0;
    background: #fff;
    font-weight: bold;
  }
  
  /* Tab contents */
  .tab-content {
    display: none;
  }
  .tab-content.active {
    display: block;
  }
  
  /* محصولات ردیف افقی */
  .products-row {
    display: flex;
    overflow-x: auto;
    gap: 15px;
    padding-bottom: 10px;
  }
  .products-row::-webkit-scrollbar {
    height: 6px;
  }
  .products-row::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 3px;
  }
  
  /* کارت محصول */
.product-card {
  width: 120px; /* عرض کوچکتر */
  border: 1px solid #eee;
  padding: 5px; /* کم کردن padding */
  text-align: center;
  flex-shrink: 0;
  font-size: 12px; /* متن کوچکتر */
}

.product-card img {
  width: 100%;
  height: auto;
  border-radius: 4px;
}

.product-card h3 {
  font-size: 12px;          /* اندازه متن کوچیک */
  margin: 5px 0;
  white-space: nowrap;      /* متن در یک خط */
  overflow: hidden;         /* اضافه متن مخفی میشه */
  text-overflow: ellipsis;  /* سه نقطه (...) اضافه میشه */
}



  </style>

<script>
  document.querySelectorAll('.tab').forEach(tab => {
    tab.addEventListener('click', () => {
  
      document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
      document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
  
      tab.classList.add('active');
      document.getElementById(tab.dataset.tab).classList.add('active');
    });
  });
  </script>
  

@endsection


