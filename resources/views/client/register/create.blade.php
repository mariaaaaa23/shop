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
                    
                    <div class="content">
                       
                        <div class="buttons-set">
                            
                        </div>
                    </div>
                </div>

                <div class="col-2 registered-users">
                    <strong></strong>
                    <div class="content">
                        <p style="font-size:18px">برای دریافت کد یکبار مصرف ایمیل خود را وارد کنید</p>

                        {{-- فرم ثبت ایمیل --}}
                        <form class="form-horzantal" method="POST" action="{{ route('client.register.sendmail') }}">
                            @csrf
                            <ul class="form-list">
                                <li>
                                    <label for="email">ایمیل <span class="required">*</span></label>
                                    <input type="email" title="email" class="input-text required-entry" id="email" value="" name="email" required>
                                </li>
                            </ul>

                            <p class="required">* Required Fields</p>
                            <div class="buttons-set">
                                <button id="send2" name="send" type="submit" class="button login"><span>ادامه</span></button>
                                <a class="forgot-word" href="forgot-password.html">Forgot Your Password?</a>
                            </div>
                        </form>

                    </div>
                </div>
            </fieldset>
        </div>

        <br><br><br><br><br>
    </div>
</section>

@endsection
