<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FEUPWorld</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{mix('/css/admin.css')}}">

        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>


    </head>
    <body>

        <div id="app">
            <vue-snotify></vue-snotify>
            <preloader-component></preloader-component>
            <router-view></router-view>
        </div>
        <script src="{{mix('/js/admin.js')}}" charset="utf-8"></script>
    </body>
</html>
