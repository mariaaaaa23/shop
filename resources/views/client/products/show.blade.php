@extends('client.layout.master')

@section('content')

@section('links')

<link rel="stylesheet" type="text/css" href="css/styles.css" media="all">

@endsection



<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ul>
          <li class="home"> <a href="index.html" title="Go to Home Page">خانه</a> <span>/</span></li>
          <li><a href="shop-grid-sidebar.html" title="">{{ $product->category->title }}</a> <span>/ </span></li>
          <li><a href="shop-grid-sidebar.html" title="">{{ $product->name }}</a> <span>/</span></li>
          
        </ul>
      </div>
    </div>
  </div>
</div>


<div class="container">
    <div class="row">
      <div class="col-sm-9 col-xs-12">
        <div class="product-view">
          <div class="product-essential">
            <form action="#" method="post" id="product_addtocart_form">
              <div class="product-img-box col-lg-5 col-sm-5 col-xs-12">
                <div class="product-image">
                  <div class="product-full">
                    <div class="new-label new-top-left"> New </div>
                    <img id="product-zoom" src="{{ asset('storage/' . $product->image) }}" data-zoom-image="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"/> </div>
                  <div class="more-views">
                    <div class="slider-items-products">
                      <div id="jtv-more-views-img" class="product-flexslider hidden-buttons product-img-thumb">
                        <div class="slider-items slider-width-col4 block-content">
                          <table border="0" cellpadding="5">
                            <tr>
                              {{-- گالری محصولات --}}
                                @foreach($product->pictures as $picture)
                                    <td>
                                        <a href="{{ asset('storage/' . $picture->path) }}">
                                            <img 
                                                src="{{ asset('storage/' . $picture->path) }}" 
                                                width="80"
                                                height="80">
                                        </a>
                                    </td>
                                @endforeach
                            </tr>
                        </table>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end: more-images --> 
              </div>
              <div class="product-shop col-lg-7 col-sm-7 col-xs-12">
                <div class="product-name">
                  <h1>{{ $product->name }}</h1>
                </div>
                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                <div class="price-block">
                  <div class="price-box">
                    
                    <p class="special-price"> <span class="price-label">Special Price</span><span class="price"> تومان {{ $product->cost_whith_discount}}  </span></p>
                    {{-- اگر تخفیف وجود داشت قیمت اصلی رو نمایش میده خط میزنه و قیمت تخفیفی نمایش میده-
                       به عبارتی دیگر یعنی اگر محصول تخفیف داره --}}
                    @if($product->has_discount)
                    <p class="old-price"> <span class="price-label">Regular Price:</span><span class="price"> {{ $product->cost }}</span></p>
                    @endif
                    <p class="availability in-stock"><span>In Stock</span></p>
                  </div>
                </div>
                <div class="short-description">
                  <h2>{{ $product->name }}</h2>
                  <p> برند :  {{ $product->brand->name }}</p>
                  <p>محصولات : {{ $product->id }}</p>

                </div>
                <div class="add-to-box">
                  <div class="add-to-cart">
                    <div class="pull-left">
                      <div class="custom pull-left">
                        <label>تعداد:</label>
                        <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                        <input type="number" class="qty" title="Qty" value="1" maxlength="12" id="input-qty" name="qty">
                        <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                      </div>
                    </div>
                    {{--onClick="addToCart({{ $product->id }});" وقتی روی دکمه افزودن به سبد خریذد کلیک میکنیم بره سبد خرید باید بره محصول  --}}
                    <button onClick="addToCart({{ $product->id }});" class="button btn-cart" title="Add to Cart" type="button"><i class="fa fa-shopping-cart"></i> افزودن به سبد خرید </button>
                  </div>
                  <div class="email-addto-box">
                    <ul class="add-to-links">
                      {{-- onclick="like(); وقتی کلیک میکنیم رنگ قرمز بشه قلب 
                     @if($product->is_liked) like @endif  چک میکنه اگه کاربر لایک کرده بود کلاس لایک بهش میده --}}
                      <li><a class="link-wishlist" href="javascript:void(0)"><i id="like-{{ $product->id }}"class="fa fa-heart @if($product->is_liked) like @endif" onclick="like({{ $product->id }})"></i><span>افزودن به علاقه مندی ها</span></a></li>
                      <li><a class="link-compare" href="compare.html"><i class="fa fa-signal"></i><span>Add to Compare</span></a></li>
                      <li><a class="email-friend" href="#"><i class="fa fa-envelope"></i><span>Email to a Friend</span></a></li>
                    </ul>
                  </div>
                </div>
                <div class="social">
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                  </ul>
                </div>
                <div class="product-next-prev"> <a class="product-next" href="#"><i class="fa fa-angle-left"></i></a> <a class="product-prev" href="#"><i class="fa fa-angle-right"></i></a> </div>
              </div>
            </form>
          </div>
        </div>
        <div class="product-collateral">
          <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
            <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Product Description </a></li>
            <li><a href="#product_tabs_tags" data-toggle="tab"> دیدگاه {{ $product->comments->count() }}</a></li>
            <li><a href="#reviews_tabs" data-toggle="tab">Reviews</a></li>
            <li><a href="#product_tabs_custom" data-toggle="tab">Custom Tab</a></li>
          </ul>
          <div id="productTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="product_tabs_description">
              <div class="std">

                @php
                // گروه ویژگی ها یا همان گروه مشخصات از دسته بندی گرفته میشن
                   $propertyGroups=$product->category->propertyGroups;
                @endphp

                <div class="product-specifications mt-4">
                  <h4>ویژگی ها</h4>

                 {{-- روی گروه ها ویژگی حلقه میزنه --}}
                  @foreach ($propertyGroups as $group)
                  <table class="table table-bordered">
                    <tbody>
                        <tr>
                          {{-- اسم گروه ویژگی ها --}}
                            <th>{{ $group->title }}</th>
                            {{-- حلقه روی ویژگی های هر گروه --}}
                               @foreach ($group->properties as $property)
                               {{-- نام ویژگی --}}
                               <td>{{ $property->title }}</td>
                               {{-- مقدار ویژگی --}}
                               <td>{{ $property->getValueForProduct($product) }}</td>
                               @endforeach
                        </tr>
                        
                    </tbody>
                </table>
                  @endforeach
                     

                  
              </div>
              </div>
            </div>
            <div class="tab-pane fade" id="product_tabs_tags">
              <div class="box-collateral box-tags">
                <div class="tags">
                  @auth
                  {{-- کاربر باید لاگین کرده باشه که کامنت فرم کامنت بهش نمایش بده --}}
                  <form id="addTagForm" action="{{ route('client.products.comments.store',$product) }}" method="post">
                    @csrf
                    <div class="form-add-tags">
                      <label for="content">یک دیدگاه بنویسید </label>
                      <div class="input-box">
                        <textarea class="input-text" name="content" id="content" rows="5"></textarea>
                        <div class="form-group">
                        <input type="submit" name="" id="" value="ثبت" class="btn btn-primary btn-sm">
                      </div>
                      </div>
                      <!--input-box--> 
                    </div>
                  </form>
                  @endauth
                </div>
                <!--tags-->
                {{-- نمایش کامنت های کاربران 
                latest()->get()  برای اینکه جدیدترین کامنت بیاد اول--}}
                @foreach ($product->comments()->latest()->get() as $comment )
                <table class="table table-bordered table-hover text-center">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>نام کاربر</th>
                          <th>ایمیل</th>
                          <th>متن نظر</th>
                          <th>امتیاز</th>
                          <th>تاریخ</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td></td>
                          <td>{{ $comment->user->name }} </td>
                          <td>maryam@gmail.com</td>
                          <td>{{ $comment->content }}</td>
                          <td>⭐⭐⭐⭐⭐</td>
                          {{-- برای اینکه چند زمان پیش کامنت گذاشته --}}
                          <td>{{ $comment->created_at->diffForHumans() }}</td>
                          
                      </tr>
                  </tbody>
              </table>
                @endforeach
              </div>
            </div>
            <div class="tab-pane fade" id="reviews_tabs">
              <div class="box-collateral box-reviews" id="customer-reviews">
                <div class="box-reviews1">
                  <div class="form-add">
                    <form id="review-form" method="post" action="http://www.jtvcommerce.com/review/product/post/id/176/">
                      <h3>Write Your Own Review</h3>
                      <fieldset>
                        <h4>How do you rate this product? <em class="required">*</em></h4>
                        <span id="input-message-box"></span>
                        <table id="product-review-table" class="data-table">
                          <thead>
                            <tr class="first last">
                              <th>&nbsp;</th>
                              <th><span class="nobr">1 *</span></th>
                              <th><span class="nobr">2 *</span></th>
                              <th><span class="nobr">3 *</span></th>
                              <th><span class="nobr">4 *</span></th>
                              <th><span class="nobr">5 *</span></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="first odd">
                              <th>Price</th>
                              <td class="value"><input type="radio" class="radio" value="11" id="Price_1" name="ratings[3]"></td>
                              <td class="value"><input type="radio" class="radio" value="12" id="Price_2" name="ratings[3]"></td>
                              <td class="value"><input type="radio" class="radio" value="13" id="Price_3" name="ratings[3]"></td>
                              <td class="value"><input type="radio" class="radio" value="14" id="Price_4" name="ratings[3]"></td>
                              <td class="value last"><input type="radio" class="radio" value="15" id="Price_5" name="ratings[3]"></td>
                            </tr>
                            <tr class="even">
                              <th>Value</th>
                              <td class="value"><input type="radio" class="radio" value="6" id="Value_1" name="ratings[2]"></td>
                              <td class="value"><input type="radio" class="radio" value="7" id="Value_2" name="ratings[2]"></td>
                              <td class="value"><input type="radio" class="radio" value="8" id="Value_3" name="ratings[2]"></td>
                              <td class="value"><input type="radio" class="radio" value="9" id="Value_4" name="ratings[2]"></td>
                              <td class="value last"><input type="radio" class="radio" value="10" id="Value_5" name="ratings[2]"></td>
                            </tr>
                            <tr class="last odd">
                              <th>Quality</th>
                              <td class="value"><input type="radio" class="radio" value="1" id="Quality_1" name="ratings[1]"></td>
                              <td class="value"><input type="radio" class="radio" value="2" id="Quality_2" name="ratings[1]"></td>
                              <td class="value"><input type="radio" class="radio" value="3" id="Quality_3" name="ratings[1]"></td>
                              <td class="value"><input type="radio" class="radio" value="4" id="Quality_4" name="ratings[1]"></td>
                              <td class="value last"><input type="radio" class="radio" value="5" id="Quality_5" name="ratings[1]"></td>
                            </tr>
                          </tbody>
                        </table>
                        <input type="hidden" value="" class="validate-rating" name="validate_rating">
                        <div class="review1">
                          <ul class="form-list">
                            <li>
                              <label class="required" for="nickname_field">Nickname<em>*</em></label>
                              <div class="input-box">
                                <input type="text" class="input-text" id="nickname_field" name="nickname">
                              </div>
                            </li>
                            <li>
                              <label class="required" for="summary_field">Summary<em>*</em></label>
                              <div class="input-box">
                                <input type="text" class="input-text" id="summary_field" name="title">
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="review2">
                          <ul>
                            <li>
                              <label class="required " for="review_field">Review<em>*</em></label>
                              <div class="input-box">
                                <textarea rows="3" cols="5" id="review_field" name="detail"></textarea>
                              </div>
                            </li>
                          </ul>
                          <div class="buttons-set">
                            <button class="button submit" title="Submit Review" type="submit"><span>Submit Review</span></button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
                <div class="box-reviews2">
                  <h3>Customer Reviews</h3>
                  <div class="box visible">
                    <ul>
                      <li>
                        <table class="ratings-table">
                          <tbody>
                            <tr>
                              <th>Value</th>
                              <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                            </tr>
                            <tr>
                              <th>Quality</th>
                              <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                            </tr>
                            <tr>
                              <th>Price</th>
                              <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="review">
                          <h6><a href="#">Lorem ipsum dolor sit amet</a></h6>
                          <small>Review by <span>Sophia </span>on 15/01/2018 </small>
                          <div class="review-txt">Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante.</div>
                        </div>
                      </li>
                      <li class="even">
                        <table class="ratings-table">
                          <tbody>
                            <tr>
                              <th>Value</th>
                              <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                            </tr>
                            <tr>
                              <th>Quality</th>
                              <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                            </tr>
                            <tr>
                              <th>Price</th>
                              <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="review">
                          <h6><a href="#">Lorem ipsum dolor sit amet</a></h6>
                          <small>Review by <span>William</span>on 05/02/2018 </small>
                          <div class="review-txt">Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero.</div>
                        </div>
                      </li>
                      <li>
                        <table class="ratings-table">
                          <tbody>
                            <tr>
                              <th>Value</th>
                              <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                            </tr>
                            <tr>
                              <th>Quality</th>
                              <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                            </tr>
                            <tr>
                              <th>Price</th>
                              <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="review">
                          <h6><a href="#">Lorem ipsum dolor sit amet</a></h6>
                          <small>Review by <span> Mason</span>on 10/02/2018 </small>
                          <div class="review-txt last">Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper.</div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="actions"> <a class="button view-all" id="revies-button" href="#"><span><span>View all</span></span></a> </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="product_tabs_custom">
              <div class="product-tabs-content-inner clearfix">
                <p>Lorem Ipsum is
                  simply dummy text of the printing and typesetting industry. Lorem Ipsum
                  has been the industry's standard dummy text ever since the 1500s, when 
                  an unknown printer took a galley of type and scrambled it to make a type
                  specimen book. It has survived not only five centuries, but also the 
                  leap into electronic typesetting, remaining essentially unchanged. It 
                  was popularised in the 1960s with the release of Letraset sheets 
                  containing Lorem Ipsum passages, and more recently with desktop 
                  publishing software like Aldus PageMaker including versions of Lorem 
                  Ipsum.</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Related Products Slider -->
        <div class="jtv-related-products">
          <div class="slider-items-products">
            <div class="jtv-new-title">
              <h2>Related Products</h2>
            </div>
            <div class="related-block">
              <div id="jtv-related-products-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid">
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="{{ asset('storage/'. $product->image) }}"> </a>
                          <div class="new-label new-top-left">new</div>
                          <div class="mask-shop-white"></div>
                          <div class="new-label new-top-left">new</div>
                          <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                          </a> <a href="compare.html">
                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                          </a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product tilte is here" href="#"> Product tilte is here </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$115.00</span></span></div>
                            </div>
                            <div class="actions">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="{{ asset('storage/' . $product->image) }}"> </a>
                          <div class="sale-label sale-top-right">Sale</div>
                          <div class="mask-shop-white"></div>
                          <div class="new-label new-top-left">new</div>
                          <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                          </a> <a href="compare.html">
                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                          </a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product tilte is here" href="#"> Product tilte is here </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$99.00</span></span></div>
                            </div>
                            <div class="actions">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                          <div class="mask-shop-white"></div>
                          <div class="new-label new-top-left">new</div>
                          <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                          </a> <a href="compare.html">
                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                          </a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product tilte is here" href="#"> Product tilte is here </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$79.90</span></span></div>
                            </div>
                            <div class="actions">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                          <div class="sale-label sale-top-left">Sale</div>
                          <div class="mask-shop-white"></div>
                          <div class="new-label new-top-left">new</div>
                          <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                          </a> <a href="compare.html">
                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                          </a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product tilte is here" href="#"> Product tilte is here </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$49.00</span></span></div>
                            </div>
                            <div class="actions">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                          <div class="mask-shop-white"></div>
                          <div class="new-label new-top-left">new</div>
                          <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                          </a> <a href="compare.html">
                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                          </a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product tilte is here" href="#"> Product tilte is here </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$97.00</span></span></div>
                            </div>
                            <div class="actions">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                          <div class="mask-shop-white"></div>
                          <div class="new-label new-top-left">new</div>
                          <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                          </a> <a href="compare.html">
                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                          </a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product tilte is here" href="#"> Product tilte is here </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$199.00</span></span></div>
                            </div>
                            <div class="actions">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                          <div class="mask-shop-white"></div>
                          <div class="new-label new-top-left">new</div>
                          <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                          </a> <a href="compare.html">
                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                          </a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product tilte is here" href="#"> Product tilte is here </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$75.00</span></span></div>
                            </div>
                            <div class="actions">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
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
        
        <!-- Related Products Slider End --> 
        
        <!-- Upsell Product Slider -->
        
        <div class="jtv-upsell-products">
          <div class="slider-items-products">
            <div class="jtv-new-title">
              <h2>Upsell Product</h2>
            </div>
            <div class="upsell-block">
              <div id="jtv-upsell-products-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid">
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                          <div class="new-label new-top-left">new</div>
                          <div class="mask-shop-white"></div>
                          <div class="new-label new-top-left">new</div>
                          <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                          </a> <a href="compare.html">
                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                          </a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product tilte is here" href="#"> Product tilte is here </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$95.99</span></span></div>
                            </div>
                            <div class="actions">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                          <div class="sale-label sale-top-right">Sale</div>
                          <div class="mask-shop-white"></div>
                          <div class="new-label new-top-left">new</div>
                          <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                          </a> <a href="compare.html">
                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                          </a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product tilte is here" href="#"> Product tilte is here </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$39.00</span></span></div>
                            </div>
                            <div class="actions">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                          <div class="mask-shop-white"></div>
                          <div class="new-label new-top-left">new</div>
                          <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                          </a> <a href="compare.html">
                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                          </a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product tilte is here" href="#"> Product tilte is here </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$49.00</span></span></div>
                            </div>
                            <div class="actions">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                          <div class="sale-label sale-top-left">Sale</div>
                          <div class="mask-shop-white"></div>
                          <div class="new-label new-top-left">new</div>
                          <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                          </a> <a href="compare.html">
                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                          </a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product tilte is here" href="#"> Product tilte is here </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$69.00</span></span></div>
                            </div>
                            <div class="actions">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                          <div class="mask-shop-white"></div>
                          <div class="new-label new-top-left">new</div>
                          <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                          </a> <a href="compare.html">
                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                          </a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product tilte is here" href="#"> Product tilte is here </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$19.00</span></span></div>
                            </div>
                            <div class="actions">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                          <div class="mask-shop-white"></div>
                          <div class="new-label new-top-left">new</div>
                          <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                          </a> <a href="compare.html">
                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                          </a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product tilte is here" href="#"> Product tilte is here </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$129.00</span></span></div>
                            </div>
                            <div class="actions">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                          <div class="mask-shop-white"></div>
                          <div class="new-label new-top-left">new</div>
                          <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                          </a> <a href="compare.html">
                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                          </a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product tilte is here" href="#"> Product tilte is here </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$139.00</span></span></div>
                            </div>
                            <div class="actions">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
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
        <!-- End Upsell  Slider --> 
      </div>
      <div class="sidebar col-sm-3 col-xs-12">
        <aside class="sidebar">
          <div class="custom-slider">
            <div>
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li class="active" data-target="#carousel-example-generic" data-slide-to="0"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active"><img src="images/slide3.jpg" alt="New Arrivals">
                    <div class="carousel-caption">
                      <h3><a title=" Sample Product" href="#">New Arrivals</a></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </div>
                  <div class="item"><img src="images/slide1.jpg" alt="Top Fashion">
                    <div class="carousel-caption">
                      <h3><a title=" Sample Product" href="#">Top Fashion</a></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </div>
                  <div class="item"><img src="images/slide2.jpg" alt="Mid Season">
                    <div class="carousel-caption">
                      <h3><a title=" Sample Product" href="#">Mid Season</a></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#" data-slide="prev"> <span class="sr-only">Previous</span></a> <a class="right carousel-control" href="#" data-slide="next"> <span class="sr-only">Next</span></a></div>
            </div>
          </div>
          <div class="block product-price-range ">
            <div class="block-title">
              <h3>Price</h3>
            </div>
            <div class="block-content">
              <div class="slider-range">
                <div data-label-reasult="Range:" data-min="0" data-max="500" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="50" data-value-max="350">
                  <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 10%; width: 60%;"></div>
                  <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 10%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 70%;"></span></div>
                <div class="amount-range-price">Range: $10 - $550</div>
                <ul class="check-box-list">
                <li>
                  <div class="pretty p-icon p-smooth">
                    <input type="checkbox" name="cc" value="p1" />
                    <div class="state p-success"> <i class="icon fa fa-check"></i>
                      <label for="p1"> $20 - $100<span class="count">(5)</span> </label>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="pretty p-icon p-smooth">
                    <input type="checkbox" name="cc" value="p2" />
                    <div class="state p-success"> <i class="icon fa fa-check"></i>
                      <label for="p1"> $100 - $300<span class="count">(12)</span> </label>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="pretty p-icon p-smooth">
                    <input type="checkbox" name="cc" value="p3" />
                    <div class="state p-success"> <i class="icon fa fa-check"></i>
                      <label for="p1"> $300 - $500<span class="count">(15)</span> </label>
                    </div>
                  </div>
                </li>
              </ul>
              </div>
            </div>
          </div>
          <div class="block block-cart">
            <div class="block-title ">
              <h3>My Cart</h3>
            </div>
            <div class="block-content">
              <div class="summary">
                <p class="amount">There are <a href="shopping_cart.html">3 items</a> in your cart.</p>
                <p class="subtotal"> <span class="label">Cart Subtotal:</span> <span class="price">$227.99</span> </p>
              </div>
              <div class="ajax-checkout">
                <button class="button button-checkout" title="Submit" type="submit"><span>Checkout</span></button>
              </div>
              <p class="block-subtitle">Recently added item(s) </p>
              <ul>
                <li class="item"> <a href="shopping_cart.html" title="Product Title Here" class="product-image"><img src="images/products/product-fashion-1.jpg" alt="Product Title Here"></a>
                  <div class="product-details">
                    <div class="access"> <a href="shopping_cart.html" title="Remove This Item" class="jtv-btn-remove"> <span class="icon"></span> Remove </a> </div>
                    <p class="product-name"> <a href="shopping_cart.html">Product Title Here</a> </p>
                    <strong>1</strong> x <span class="price">$99.99</span> </div>
                </li>
                <li class="item"> <a href="shopping_cart.html" title="Product Title Here" class="product-image"><img src="images/products/product-fashion-1.jpg" alt="Product Title Here"></a>
                  <div class="product-details">
                    <div class="access"> <a href="shopping_cart.html" title="Remove This Item" class="jtv-btn-remove"> <span class="icon"></span> Remove </a> </div>
                    <p class="product-name"> <a href="shopping_cart.html">Product Title Here</a> </p>
                    <strong>1</strong> x <span class="price">$88.00</span> </div>
                </li>
                <li class="item"> <a href="shopping_cart.html" title="Product Title Here" class="product-image"><img src="images/products/product-fashion-1.jpg" alt="Product Title Here"></a>
                  <div class="product-details">
                    <div class="access"> <a href="shopping_cart.html" title="Remove This Item" class="jtv-btn-remove"> <span class="icon"></span> Remove </a> </div>
                    <p class="product-name"> <a href="shopping_cart.html">Product Title Here</a> </p>
                    <strong>1</strong> x <span class="price">$98.00</span> </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="block block-compare">
            <div class="block-title ">Compare Products (2)</div>
            <div class="block-content">
              <ol id="compare-items">
                <li class="item">
                  <input type="hidden" value="2173" class="compare-item-id">
                  <a class="jtv-btn-remove" title="Remove This Item" href="#"></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>Product Title Here</a></li>
                <li class="item">
                  <input type="hidden" value="2174" class="compare-item-id">
                  <a class="jtv-btn-remove" title="Remove This Item" href="#"></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>Product Title Here</a></li>
                <li class="item">
                  <input type="hidden" value="2175" class="compare-item-id">
                  <a class="jtv-btn-remove" title="Remove This Item" href="#"></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>Product Title Here</a></li>
              </ol>
              <div class="ajax-checkout">
                <button type="submit" title="Submit" class="button button-compare"><span>Compare</span></button>
                <button type="submit" title="Submit" class="button button-clear"><span>Clear</span></button>
              </div>
            </div>
          </div>
          <div class="block block-list block-viewed">
            <div class="block-title">
              <h3>Recently Viewed</h3>
            </div>
            <div class="block-content">
              <ol id="recently-viewed-items">
                <li class="item">
                  <p class="product-name"><a href="#"><i class="fa fa-angle-right"></i>Product Title Here</a></p>
                </li>
                <li class="item">
                  <p class="product-name"><a href="#"><i class="fa fa-angle-right"></i>Product Title Here</a></p>
                </li>
                <li class="item">
                  <p class="product-name"><a href="#"><i class="fa fa-angle-right"></i>Product Title Here</a></p>
                </li>
              </ol>
            </div>
          </div>
          <div class="block block-poll">
            <div class="block-title">
              <h3>Community Poll</h3>
            </div>
            <form id="pollForm" action="#" method="post" onSubmit="return validatePollAnswerIsSelected();">
              <div class="block-content">
                <p class="block-subtitle">What is your favorite color</p>
                <ul id="poll-answers">
                  <li>
                    <input type="radio" name="vote" class="radio poll_vote" id="vote_1" value="1">
                    <span class="label">
                    <label for="vote_1">Green</label>
                    </span> </li>
                  <li>
                    <input type="radio" name="vote" class="radio poll_vote" id="vote_2" value="2">
                    <span class="label">
                    <label for="vote_2">Red</label>
                    </span> </li>
                  <li>
                    <input type="radio" name="vote" class="radio poll_vote" id="vote_3" value="3">
                    <span class="label">
                    <label for="vote_3">Black</label>
                    </span> </li>
                  <li>
                    <input type="radio" name="vote" class="radio poll_vote" id="vote_4" value="4">
                    <span class="label">
                    <label for="vote_4">Pink</label>
                    </span> </li>
                </ul>
                <div class="actions">
                  <button type="submit" title="Vote" class="button button-vote"><span>Vote</span></button>
                </div>
              </div>
            </form>
          </div>
          <div class="block block-tags">
            <div class="block-title">
              <h3>Popular Tags</h3>
            </div>
            <div class="block-content">
              <div class="tags-list"> <a href="#">Jwellery</a> <a href="#">Bag</a> <a href="#">Clothing</a> <a href="#">Shoes</a> <a href="#">Watches</a> <a href="#">Beauty</a> <a href="#">Accessories</a> </div>
              <div class="actions"> <a href="#" class="view-all">View All Tags</a> </div>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>


@endsection

@section('scripts')



@endsection