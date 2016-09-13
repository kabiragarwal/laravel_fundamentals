<!DOCTYPE html>
<html>
    <head>
        <title>laravel Fundamentals</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="{{asset('/front/bootstrap.min.css')}}" >
        <link href="{{asset('/libs/select2-master/dist/css/select2.min.css')}}" rel="stylesheet" />

    </head>
    <body>
        <div class="container"> 
            @include('partials.nav')
             <?php //@include('partials.flash') ?>
            @include('flash::message')
             
             @yield('content') 
        </div>
        
        <script src="{{asset('/front/jquery.min.js')}}"></script>
        <script src="{{asset('/front/bootstrap.min.js')}}"></script>
        
        <script>
            //$('div.alert-success').not('.alert-important').delay(3000).slideUp(300);
            $('#flash-overlay-modal').modal();
        </script>
        
        <script src="{{asset('/libs/select2-master/dist/js/select2.min.js')}}"></script>
        @yield('footer')
    </body>
</html>
