<?php 
// make links active when on page
function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['PHP_SELF'], ".php");

    if ($current_file_name == $requestUri){
        echo 'class="active"';
    }else
        echo '';

}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog</title>
    <link rel="stylesheet" href="/css/foundation.css" />
    <link rel="stylesheet" href="/css/custom_blog.css" />
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300' rel='stylesheet' type='text/css'>
    <script src="/js/vendor/modernizr.js"></script>
</head>
<body class="grayBack">
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="{{{ action('HomeController@showIndex') }}}"><logo>Alissa Stephens </logo></h1>
        </li>
         <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="{{{ action('HomeController@showIndex') }}}">Home</a></li>
          <li><a href="{{{ action('HomeController@showResume') }}}" >Resume</a></li>
          <li><a href="{{{ action('HomeController@showPortfolio') }}}">Portfolio</a></li>
        </ul>

    </nav>

    <div class="row">

        <div class="large-9 columns" role="content">
            @yield('content')
        </div>    

        <aside class="large-3 columns">

            <h5>Categories</h5>
            <ul class="side-nav">
                <li><a href="#">News</a></li>
                <li><a href="#">Code</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Fun</a></li>
                <li><a href="#">Weasels</a></li>
            </ul>

            <div class="panel whiteBack">
                <h5>Featured</h5>
                <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow.</p>
                <a href="#">Read More →</a>
            </div>

        </aside>

    </div>

    <footer class="row">
        <div class="large-12 columns">
            <hr/>
            <div class="row">
                <div class="large-6 columns">
                    <p>© Copyright no one at all. Go to town.</p>
                </div>
                <div class="large-6 columns">
                    <ul class="inline-list right">
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                        <li><a href="#">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="/js/vendor/jquery.js"></script>
    <script src="/js/foundation.min.js"></script>
    <script src="/js/foundation/foundation.topbar.js"></script>
    <!-- Other JS plugins can be included here -->
    <script>
    $(document).foundation();
    </script>
</body>
</html>
