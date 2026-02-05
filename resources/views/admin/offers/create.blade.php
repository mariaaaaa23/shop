@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">ایجاد تخفیف</h2>
                </div>

                <div class="card-body">

                    
                    <form action="{{ route('offers.store') }}" method="post" >
                        @csrf


                        <div class="form-group">
                           <label for="code">کد</label>
                           <input type="text"  class="form-control" name="code" id="code">
                        </div>

                        <div class="form-group">
                            <label for="starts_at">تاریخ ایجاد</label>
                            <input type="date" max="100" min="1" class="form-control" name="starts_at" id="starts_at">
                         </div>

                         <div class="form-group">
                            <label for="expires_at">تاریخ پایان</label>
                            <input type="date"  class="form-control" name="expires_at" id="expires_at">
                         </div>

                         

                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" code="ثبت" class="btn btn-primary">
                        </div>
                        
                    </form>

                </div>
            </div>

            @include('admin.layout.errors')

        </div>
    </div>

@endsection