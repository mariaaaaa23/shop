@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">ایجاد تخفیف</h2>
                </div>

                <div class="card-body">

                    
                    <form action="{{ route('products.discounts.store', $product) }}" method="post" >
                        @csrf


                        <div class="form-group">
                           <label for="value">مقدار</label>
                           <input type="number" max="100" min="1" class="form-control" name="value" id="value">
                        </div>

                        

                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" value="ثبت" class="btn btn-primary">
                        </div>
                        
                    </form>

                </div>
            </div>

            @include('admin.layout.errors')

        </div>
    </div>

@endsection