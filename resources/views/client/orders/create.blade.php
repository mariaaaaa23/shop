@extends('client.layout.master')


@section('content')

<div class="main-container col1-layout">
    <div class="main container">
      <div class="row">
        <div class="col-sm-12">
          <div class="product-area">
            <div class="title-tab-product-category">
              <div class="text-center">
                <ul class="nav jtv-heading-style" role="tablist">
                  <li role="presentation" class=""><a href="#cart" aria-controls="cart" role="tab" data-toggle="tab">1 Shopping cart</a></li>
                  <li role="presentation" class="active"><a href="#checkout" aria-controls="checkout" role="tab" data-toggle="tab">2 ثبت سفارش</a></li>
                  <li role="presentation" class=""><a href="#complete-order" aria-controls="complete-order" role="tab" data-toggle="tab">3 Complete Order</a></li>
                </ul>
              </div>
            </div>
           
            
           <form action="{{ route('client.orders.store') }}" method="post">
            @csrf

            <div class="panel panel-default">
              <div class="panel-heading text-right">
                <i class="fa fa-ticket"></i>
                استفاده از کوپن تخفیف
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-9 col-sm-8 col-xs-12">
                    <input
                      type="text"
                      name="offer_code"
                      class="form-control"
                      placeholder="کد تخفیف خود را در اینجا وارد کنید">
                  </div>
                  <div class="col-md-3 col-sm-4 col-xs-12">
                    <button type="button" name="code" class="btn btn-primary btn-block">
                      اعمال کوپن
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading text-right">
                <i class="fa fa-shopping-cart"></i>
                سبد خرید
              </div>
            
              <div class="panel-body">
                <table class="table table-bordered">
                  <thead>
                    <tr class="text-center">
                      <th>تصویر</th>
                      <th>نام محصول</th>
                      <th></th>
                      <th>تعداد</th>
                      <th>قیمت واحد</th>
                      <th></th>
                    </tr>
                  </thead>
            
                  <tbody>
                    @foreach ($items as $item)
                    @php $product = $item['product'];
                    $productQty = $item['quantity'];
                     @endphp
                    <tr class="cart_item">
                        <td class="item-img"><a href="#"><img width="100" src="{{ asset('storage/' . $product->image) }}" alt="Product tilte is here "> </a></td>
                        <td class="item-title"><a href="#">{{ $product->name }} </a></td>
                        <td class="item-price"> تومان {{ $product->cost }} </td>
                        <td class="item-qty"><div class="cart-quantity">
                            <div class="product-qty">
                              <div class="cart-quantity">
                                <div class="cart-plus-minus">
                                <p>{{ \App\Models\Cart::totalItems() }}</p>
                                </div>
                              </div>
                            </div>
                          </div></td>
                        <td class="total-price"><strong>{{ $product->cost_whith_discount * $productQty }} تومان</strong></td>
                        <td class="remove-item"><a href="#"><i onclick="removeFromCart({{ $product->id }})"  class="fa fa-trash-o"></i></a></td>
                      </tr>
                      <tr>
                        <td colspan="4" class="text-right">جمع کل</td>
                        <td class="text-left">{{ \App\Models\Cart::totalAmount() }} تومان</td>
                      </tr>
              
                      
                    </tbody>
                  </table>
                </div>
              </div>
                      
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
                  <div class="panel panel-default">
                  <div class="panel-heading text-right">
                    <i class="fa fa-pencil"></i>
                     آدرس خود را وارد کنید
                  </div>
                
                  <div class="panel-body">
                    <textarea
                      name="address"
                      id="address"
                      class="form-control"
                      rows="4"
                      placeholder=" آدرس"></textarea>
                
                    <br>
                
                    <button type="submit" class="btn btn-primary">
                      ثبت  
                    </button>

           </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    
  </div>

@endsection