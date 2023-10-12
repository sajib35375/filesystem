<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
   @include('partials.head')
   <body class="">
        @yield('content')
      @include('partials.scripts')
      @include('errors.notification')
      @stack('scripts')
   </body>
</html>
