@extends('client.layout.master')

@section('content')

<section class="main-container col1-layout">
    <div class="main container">
        <div class="account-login">
            <div class="page-title">
                <h2>ثبت نام حساب کاربری</h2>
            </div>
            <fieldset class="col2-set">
                <div class="col-1 new-users">
                    <strong></strong>
                    <div class="content">
                       
                        <div class="buttons-set">
                            
                        </div>
                    </div>
                </div>

                <div class="col-2 registered-users">
                    <strong></strong>
                    <div class="content">
                      

                        {{-- فرم ثبت ایمیل --}}
                        <form class="form-horzantal" method="POST" action="{{ route('client.register.verifyOtp', $user) }}">
                            @csrf
                            <ul class="form-list">
                                <li>
                                    <label for="email">کد یکبار مصرف <span class="required">*</span></label>
                                    <input type="text" title="otp" maxlength="5" minlength="5" max="99999" min="11111" placeholder="کد یکبار مصرف" class="input-text required-entry" id="otp" value="" name="otp" required>
                                </li>
                            </ul>

                            <p class="required">* Required Fields</p>
                            <div class="buttons-set">
                                <button id="send2" name="send" type="submit" class="button login"><span>تایید</span></button>
                                <a class="forgot-word" href="forgot-password.html">Forgot Your Password?</a>
                            </div>
                        </form>

                        {{-- نمایش ارور --}}
                        @if (count($errors->all()) > 0)
            <ul style="font-size: 18px" class="bg-danger">
              @foreach ($errors->all() as $error )
                  <li class="text-white">{{ $error }}</li>
              @endforeach 
          </ul>  
          @endif


                    </div>
                </div>
            </fieldset>
        </div>

        <br><br><br><br><br>
    </div>
</section>

@endsection
