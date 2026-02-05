@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">ویژگی های محصول {{$product->name}} </h2>
                </div>

                  @php
                     $propertyGroups=$product->category->propertyGroups
                  @endphp
                        

                <div class="card-body">

                    {{-- enctype="multipart/form-data"  یعنی فرمی که چند بخشی هست  برای اینکه فایلی رو آپلود کنیم بفرستیم سمت سرور--}}
                    <form action="{{ route('products.properties.store',$product) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        
                            {{-- برای نمایش نام گروه مشخصات --}}
                        @foreach ($propertyGroups as $group )
                        <h3>{{ $group->title }}</h3>

                    <div class="row">
                        {{-- برای هر کدوم از این ویژگی ها بیا و یک تکست باکس قرار بده که داخلش اسم ویژگی باشه--}}
                        @foreach ($group->properties as $property)
                        <div class="form-group col-sm-6">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="name">{{ $property->title }}</label>
                                   </div>

                                <div class="col-sm-10">
                                    {{--properties[...] این یعنی داده‌ها به صورت آرایه (array) ارسال می‌شن.
                                     [{{ $property->id }}]['value']  مقدار id هر property رو به صورت داینامیک جایگزین می‌کنه این یعنی داخل هر propertyو یک کلید به نام value داریم. 
                                      چون یه فیلد مجازا داریم که اونم باید مقدار دهی بشه بخاطر همین آرایه--}}
                                      {{-- value="{{ $property->getValueForProduct($product) }}  برای نمایش مقدار --}}
                                    <input type="text" class="form-control" name="properties[{{ $property->id }}][value]" id="title" value="{{ $property->getValueForProduct($product) }}">
                                </div>

                            </div>
                         </div>
                        
                        @endforeach
                    </div>
                    @endforeach
                        

                        

                        

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