<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Agenda</title>

        <!-- Bootstrap -->
        <link href="{{ url('/css/app.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 page-header">
                    <h1>
                        code.education
                        <small>
                            <i class="glyphicon glyphicon-phone"></i> Agenda Telefônica
                        </small>
                        <span class="pull-right">
                            <form class="form-inline" action="#" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                      <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                      </span>
                                </div>
                            </form>
                        </span>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @foreach(range('A','Z') as $letter)
                        <a href="#" class="btn btn-primary btn-xs">{{ $letter }}</a>
                    @endforeach
                </div>
            </div>
            <div class="row">
                @yield('content')
            </div>
        </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ url('/js/scripts.js') }}"></script>
    </body>
</html>