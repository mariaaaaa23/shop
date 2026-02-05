<div class="mega-menu-category">
  <ul class="nav">
    {{-- نمایش دسته های اصلی یا والد --}}
    @foreach ($categories as $category)
      <li class="mega-dropdown {{ $category->children->count() ? 'has-sub' : '' }}">
        <a href="#" class="dropdown-toggle">
          {{ $category->title }}

          {{-- اگر category → زیر دسته داشت → فلش (caret) نشان بده اگر زیر دسته نداشت → هیچی اضافه نکن --}}

          @if($category->children->count())
            <span class="caret"></span>
          @endif
        </a>

        {{-- این شرط مشخص می‌کنه: «آیا این دسته زیرمجموعه دارد؟ اگر دارد، منوی پاپ‌آپ/مگامنو نمایش بده. اگر نه، اصلاً این بخش را نساز.» --}}
        
        @if($category->children->count())
          <div class="wrap-popup column1">
            <div class="popup">
              <ul class="nav">
                {{-- نمایش زیر دسته ها --}}
                @foreach ($category->children as $childCategory)
                <li class="{{ $childCategory->children->count() ? 'dropdown-submenu' : '' }}">
                    <a href="/client/index.html">
                      {{ $childCategory->title }}


                      {{--اگر دسته زیرمجموعه داشته باشد → فلش نشان می‌دهد
                 اگر نداشته باشد → هیچ فلشی به‌طور اضافی دیده نمی‌شود. 
                children->count() > 0 بررسی وجود زیر دسته  --}}

                      @if ($childCategory->children->count() > 0)
                        <span class="caret-right">&rsaquo;</span>
                      @endif
                    </a>

                    {{-- اگر زیر دسته داشت، نمایش زیرترین دسته ها --}}

                    {{-- اگر دسته زیرمجموعه داشته باشد → زیرمنوی آن (level 3) نمایش داده می‌شود.اگر نداشته باشد:
                    اصلاً <ul> ساخته نمی‌شود منوی خالی نمایش داده نمی‌شود قالب بهم نمی‌ریزد 
                     children->count() > 0 بررسی وجود زیر دسته --}}

                     @if ($childCategory->children->count()>0)
                     <ul class="dropdown-menu">

                        {{--نمایش زیرمنوی لایه سوم  --}}
                        @foreach ($childCategory->children as $subCategory)
                          <li>
                            <a href="/client/version2/index.html">
                              {{ $subCategory->title }}</a></li>
                        @endforeach
                      </ul>
                    @endif
                  </li>
                @endforeach
                
                
              </ul>
            </div>
          </div>
        @endif
      </li>
    @endforeach
    </ul>
      
    

    <ul class="nav">
      <li class="mega-dropdown has-sub">
        <a href="#" class="dropdown-toggle">
        برندها
          <span class="caret"></span>
        </a>
    
        <div class="wrap-popup column1">
          <div class="popup">
            <ul class="nav">
              
              @foreach ($brands as $brand)
              <li class="dropdown-submenu has-sub">
                <a href="#">
                  {{-- اینجا داریم دو چیز را به هم وصل می‌کنیم: 'storage/' مقدار $brand->image
              اگر مقدار $brand->image این باشد:image/nike.png ترکیبشان می‌شود: storage/image/nike.png --}}
                  <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" title="{{ $brand->name }}" style="width:70px; height:30px; margin-right:5px;">
                  {{ $brand->name }}
                  <span class="caret-right">&rsaquo;</span>
                </a>
               
              @endforeach
    
              
            </ul>
          </div>
        </div>
      </li>
    </ul>





    
    
    
     
        <div class="wrap-popup column1">
          <div class="popup">
            <ul class="nav">
              <li><a href="/client/blog.html">Blog</a></li>
              <li><a href="/client/blog-archive.html">Blog Archive</a></li>
              <li><a href="/client/blog_single_post.html">Blog Single</a></li>
            </ul>
          </div>
        </div>
      </li>
      
    </ul>
    <div class="side-banner"><img src="/client/images/top-banner.jpg" alt="Flash Sale" class="img-responsive"></div>
  </div>
</div>
</div>
</div>
</div>

