
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/blog-home.css" rel="stylesheet">
    <link href="/css/blog-post.css" rel="stylesheet">
    <link href="/css/bootstrap-markdown.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{{ action('PostsController@index') }}}">Code_Blog</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/posts">Blog</a>
                    </li>
                    <li>
                        <a href="/portfolio">Projects</a>
                    </li>
                    <li>
                        <a href="/resume">Resume</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check()) 
                        @if(Auth::id() == 1)
                            <li>
                                <a href="posts/create">Create Post</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{{ action('HomeController@doLogout') }}}">Logout</a>
                        </li>
                    @else 
                        <li>
                            <!-- Trigger the login modal with a button -->
                            <a data-toggle="modal" data-target="#myModal" href="#">Login</a>
                        </li>
                        <li>
                            <!-- Redirect to create user page -->
                            <a  href="{{{ action('HomeController@showUserCreate') }}}">New User</a>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">User Login</h4>
                </div>
                {{ Form::open(array('action' => 'HomeController@doLogin')) }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{{ Input::old('email') }}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{{ Input::old('password') }}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" >Login</button>
                    </div>
                {{-- </form> --}}
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container">

            @yield('content')

    </div>

    {{-- widget wells go here --}}

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    {{-- Google Analytics --}}
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-66829693-1', 'auto');
        ga('send', 'pageview');

    </script>

    @yield('script')

</body>

</html>
