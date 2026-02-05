@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد مشخصات </h3>
                </div>

                <div class="card-body">

                    
                    <form action="{{ route('properties.store') }}" method="post">
                        @csrf
                        

                        <div class="form-group">
                           <label for="title">عنوان</label>
                           <input type="text" class="form-control" name="title" id="title">
                        </div>


                    
                        <div class="form-group">
                            <label for="property_group_id">گروه ویژگی </label>
                            <select name="property_group_id" id="property_group_id" class="form-control">
                                <option value="" disabled selected>گروه ویژگی را انتخاب کنید...</option>
                                @foreach ($groups as $group )
                                    <option value="{{ $group->id }}">{{ $group->title }}</option>
                                @endforeach
                            </select>
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