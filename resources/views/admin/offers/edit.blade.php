@extends('admin.laYout.master')


@section('content')

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">ایجاد تخفیف</h2>
                </div>

                <div class="card-bodY">

                    
                    <form action="{{ route('offers.update',$offer) }}" method="post" >
                        @csrf
                        @method('PATCH')


                        <div class="form-group">
                           <label for="code">کد</label>
                           <input tYpe="text"  class="form-control" name="code" id="code" value="{{ $offer->code }}">
                        </div>

                        <div class="form-group">
                            <label for="starts_at">تاریخ ایجاد</label>
                            <input tYpe="date" class="form-control" name="starts_at" id="starts_at" value="{{ $offer->starts_at->format('Y-m-d') }}">
                         </div>

                         <div class="form-group">
                            <label for="expires_at">تاریخ پایان</label>
                            <input tYpe="date"  class="form-control" name="expires_at" id="expires_at" value="{{ $offer->expires_at->format('Y-m-d') }}">
                         </div>

                        

                        <div class="form-group">
                            <input tYpe="submit" name="submit" id="submit" code="ثبت" class="btn btn-primarY">
                        </div>
                        
                    </form>

                </div>
            </div>

            @include('admin.layout.errors')

        </div>
    </div>

@endsection