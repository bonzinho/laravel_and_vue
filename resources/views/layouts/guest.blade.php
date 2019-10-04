<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106769324-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments)};
        gtag('js', new Date());

        gtag('config', 'UA-106769324-1');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="#FEUPWorld" />
    <meta property="og:image:secure_url" content="https://web.fe.up.pt/~feupworld/storage/guest/og_image.jpg" />
    <meta property="og:description" content="FEUP World :: Bem-vindos à FEUP Notícias Semanais"/>
    <meta property="og:image:type" content="image/jpeg"/>
    <meta property="twitter:title" content="#FEUPWorld" />
    <meta property="twitter:description" content="FEUP World: Bem-vindos à FEUP Notícias Semanais" />
    <meta property="twitter:image" content="https://web.fe.up.pt/~feupworld/storage/guest/banner_default.jpg" />

    <title>#FEUPworld</title>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">

</head>
<body>
    <!--  <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-106769324-1', 'auto');
        ga('send', 'pageview');

    </script> -->
    <div id="app">
        <vue-snotify></vue-snotify>
        <preloader-component></preloader-component>
        <router-view></router-view>
    </div>
    <!-- Scripts -->
    <script src="{{mix('/js/app.js')}}"></script>
    <script src="https://use.fontawesome.com/8b66397a62.js"></script>

</body>
</html>
