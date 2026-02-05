@extends('client.layout.master')

@section('content')

<div class="main-container col1-layout">
    <div class="container">
      <div class="row">
        <section class="col-sm-12 col-xs-12">
          <div class="cart-page-area">
            <h2>لیست علاقه مندی ها</h2>
            <form method="post" action="#">
              <div class="table-responsive">
                <table class="shop-cart-table">
                  <thead>
                    <tr>
                      <th class="product-thumbnail ">تصویر</th>
                      <th class="product-name ">نام</th>
                      <th class="product-name ">دسته بندی</th>
                      <th class="product-price ">قیمت</th>
                      <th class="product-subtotal ">Stock</th>
                      <th class="product-quantity">Add Item</th>
                      <th class="product-remove">Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product )
                    <tr class="cart_item">
                        <td class="item-img"><a href="#"><img alt="{{ $product->name }} " src="{{ asset('storage/' . $product->image) }}"> </a></td>
                        <td class="item-title"><a href="{{ route('client.products.show', $product) }}"> {{ $product->name }} </a></td>
                        <td class="item-qty">{{ $product->category->title }}</td>
                        <td class="item-price">{{ $product->cost }}</td>
                        <td class="item-qty"> In Stock </td>
                        <td class="total-price"><a class="btn-def btn2" href="#">Add To Cart</a></td>
                        <td class="remove-item">
                          <form action="{{ route('client.likes.destroy', $product) }}" method="POST">
                              @csrf
                              @method('DELETE')
                      
                              <button type="submit" class="btn btn-danger btn-sm">
                                  <i class="fa fa-trash-o"></i>
                              </button>
                          </form>
                      </td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </form>
          </div>
        </section>
      </div>
    </div>
  </div>

@endsection