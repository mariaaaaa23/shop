@extends('admin.layout.master')

@section('content')

   <div class="row">
       <div class="col-sm-12">
          <div class="card">

            <div class="card-header">
                <h2 class="card.title">
                    محصولات
                </h2>
            </div>

            <div class="card-body">
               
                <table id="example2" class="table table-bordered table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>برند</th>
                            <th>دسته بندی</th>
                            <th>تصویر</th>
                            <th>گالری</th>
                            <th>ویژگی ها</th>
                            <th>کامنت ها</th>
                            <th>تخفیف</th>
                            <th>تاریخ ایجاد</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)
                        <tr>
                          <td>{{ $product->id }}</td>
                          <td>{{ $product->name }}</td>
                          <td>{{ $product->cost }}</td>
                          <td>{{ $product->brand->name }}</td>
                          <td>{{ $product->category->title}}</td>
                          <td>
                            <img src="{{ asset('storage/' . $product->image) }}" width="100" alt="">
                          </td>
                          <td>
                            <a href="{{ route('products.pictures.index', $product) }}" class="btn btn-sm btn-warning">گالری</a>
                          </td>
                          <td>
                            <a href="{{ route('products.properties.index', $product) }}" class="btn btn-sm btn-warning">ویژگی ها</a>
                          </td>
                          <td>
                            <a href="{{ route('products.comments.index', $product) }}" class="btn btn-sm btn-warning">کامنت ها</a>
                          </td>

                          
                            {{-- اگر تخفیف وجود داشت قیمت اصلی رو نمایش میده خط میزنه و قیمت تخفیفی نمایش میده-
                              به عبارتی دیگر یعنی اگر محصول تخفیف داره --}}
                              <td>
                                @if($product->discount)
                                    <p>{{ $product->discount->value }}</p>
                            
                                    <form action="{{ route('products.discounts.destroy', ['product'=>$product , 'discount'=>$product->discount]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-sm btn-danger" value="حذف">
                                    </form>
                                @else
                                    <a href="{{ route('products.discounts.create', $product) }}" class="btn btn-sm btn-success">
                                        ایجاد تخفیف
                                    </a>
                                @endif
                            </td>


                            <td></td>

                         
                          <td>
                            <a href="{{ route('products.edit',$product )}}" class="btn btn-sm btn-primary">ویرایش</a>
                          </td>
                          <td>
                            <form action="{{ route('products.destroy',$product) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <input type="submit" class="btn btn-sm btn-danger" value="حذف">
                            </form>
                          </td>
                        </tr>
                        
                    @endforeach
                    </tbody>


                     
                    <tfoot>
                    <tr>
                        <th>#</th>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>برند</th>
                            <th>دسته بندی</th>
                            <td></td>
                            <td>گالری</td>
                            <td>ویژگی ها</td>
                            <td>کامنت ها</td>
                            <td>تخفیف</td>
                            <th>تاریخ ایجاد</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
    
       </div>
   </div>

@endsection

@section('scripts')

   <!-- DataTables -->
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables/dataTables.bootstrap4.js"></script>

@endsection