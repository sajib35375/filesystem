<header class="top_panel_wrap">
    <div class="top_panel_wrap_inner">
       <div class="menu_pushy">
          <span class="icon-menu">Menu</span>
       </div>
       <div class="content_wrap">
          <div class="contact_logo">
             <div class="logo">
                <a href="index.html">
                <img src="{{ asset('assets/images/logo_dark.png') }}" class="logo_main" alt="" width="241" height="53">
                <img src="{{ asset('assets/images/logo_dark.png') }}" class="logo_fixed" alt="" width="241" height="53">
                </a>
             </div>
          </div>
       </div>
       <div class="sidebar_wrap sidebar">
          <div class="top_panel_controls">

             <div class="search_wrap search_style_fullscreen search_state_closed">
                <div class="search_form_wrap">
                   <form role="search" method="get" class="search_form" action="#">
                      <button type="submit" class="search_submit sc_button" title="Open search">
                      <span class="icon-search-1"></span>
                      </button>
                      <input type="text" class="search_field" placeholder="Search" value="" name="s" />
                      <a class="search_close icon-cancel"></a>
                   </form>
                </div>
             </div>

             <div class="sidebar_pushy">
                 @if (Auth::guard('admin')->check())
                 <a href="{{ route('profile.view') }}"><img style="width: 40px;height: 40px;border-radius: 50%;" src="{{ Auth::guard('admin')->user()->photo ? asset('admin/image/user/'. Auth::guard('admin')->user()->photo ) : asset('images/index67.png') }}" class="logo_side" alt="" width="241" height="53"></a>
                 @else
                 <a href="{{ route('profile.view') }}"><img style="width: 40px;height: 40px;border-radius: 50%;" src="{{ Auth::guard('web')->user()->photo ? asset('admin/image/user/'. Auth::guard('web')->user()->photo ) : asset('images/index67.png') }}" class="logo_side" alt="" width="241" height="53"></a>

                 @endif
             </div>
          </div>
       </div>
    </div>
 </header>
