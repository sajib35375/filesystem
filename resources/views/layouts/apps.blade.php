<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
   @include('partials.head')
   <body class="home-page home-1 home page body_style_wide body_type_2 body_transparent article_style_stretch scheme_original sidebar_show wpb-js-composer vc_responsive no-js">
      <div class="body_wrap">
         <div class="page_wrap">
            @include('layouts.header')
            <!-- </.top_panel_wrap> -->
            <div class="page_content_wrap">
                @if (Auth::guard('admin')->check())

                @include('layouts.sidemenu')
                @else
                @include('user.sidemenu')
                @endif
               @yield('main')

            </div>
            @include('layouts.footer')
         </div>
      </div>


<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark">{{__('Delete Confirmation')}}</h5>
                <button type="button" class="close ticket-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <p class="text-dark">{{__('Are You Sure To Delete this Data')}}?</p>

                    <div class="d-flex justify-content-end text-dark">

                            <input type="hidden" name="id">

                            &nbsp;
                        <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


    @if (Auth::guard('admin')->check())
        <a href="https://app.crisp.chat/website/1875d047-63b3-4489-9f34-3dec3ba66332/inbox/session_4e84b12c-c34a-42a1-8304-ac6ff3e6576d/" target="_blank" class="admin_message"><img src="https://www.jrmyprtr.com/wp-content/uploads/2014/06/messaging.png"></a>
    @endif

      @if (Auth::guard('web')->check())
          <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="1875d047-63b3-4489-9f34-3dec3ba66332";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
      @endif

      @include('partials.scripts')
      @include('errors.notification')
      @stack('scripts')

   </body>
</html>
