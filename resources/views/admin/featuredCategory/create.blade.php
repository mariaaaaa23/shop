@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد دسته بندی</h3>
                </div>

                <div class="card-body">

                    {{-- نمایش فرم ایجاد برای انتخاب دسته بندی والد --}}
                    <form action="{{ route('featuredCategory.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">دسته ویژه</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" disabled selected>دسته ویژه را انتخاب کنید...</option>
                                @foreach ($categories as $category )
                                    <option
                                    {{-- هنگام ویرایش دسته بندی ویژه اگه دسته بندی انتخاب شده باشه نمایش میده --}}
                                    {{ old('category_id', $featuredCategory->category_id ?? '') == $category->id ? 'selected' : '' }}
                                      value="{{ $category->id }}">{{ $category->title }}</option>
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