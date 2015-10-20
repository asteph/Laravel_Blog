{{-- view for showing codeup projects --}}
@extends('layouts.master')

@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Project Portfolio
                <small></small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Project One -->
    <div class="row">
        <div class="col-md-7">
            <a href="http://airtalkvfr.com">
                <img class="img-responsive" src="/img/airtalk.png" alt="screen shot of airtalk">
            </a>
        </div>
        <div class="col-md-5">
            <h3>Airtalk</h3>
            <h4>Laravel, PHP, mySQL, JavaScript, jQuery, Twitter Bootstrap, HTML, CSS</h4>
            <p>Application to help VFR pilots practice effective radio communication techniques. Features include questions and flashcards that track the user's progress and reintroduces material that is answered incorrectly. Development done in a Vagrant environment. Version control using Git and GitHub.</p>
            <a class="btn btn-primary" href="http://airtalkvfr.com">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
    <!-- /.row -->

    <hr>

{{--     <!-- Project Two -->
    <div class="row">
        <div class="col-md-7">
            <a href="/event-finder">
                <img class="img-responsive" src="/img/eventFinder.png" alt="screen shot of event finder">
            </a>
        </div>
        <div class="col-md-5">
            <h3>Event Finder</h3>
            <h4>Laravel, PHP, mySQL, JavaScript, HTML, CSS</h4>
            <p>Application that allows users to create and find events. Tracks event attendees, populates a calendar for each user, and displays map of event locations. Incorporates Google Maps API, Ways Generators, and Esensi Model.</p>
            <a class="btn btn-primary" href="/event-finder">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
    <!-- /.row -->

    <hr> --}}

    <!-- Project Three -->
    <div class="row">
        <div class="col-md-7">
            <a href="/whack-a-mouse">
                <img class="img-responsive" src="/img/whackamouse.png" alt="screen shot of whackamouse">
            </a>
        </div>
        <div class="col-md-5">
            <h3>Whack-A-Mouse</h3>
            <h4>HTML, CSS, JavaScript, and jQuery</h4>
            <p>A custom version of the classic game Whack-a-mole. Gained experience using event listeners, adding and removing classes, and incorporating html5 audio.</p>
            <a class="btn btn-primary" href="/whack-a-mouse">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Project Four -->
    <div class="row">

        <div class="col-md-7">
            <a href="/simplesimon">
                <img class="img-responsive" src="/img/simplesimon.png" alt="screen shot of simple simon">
            </a>
        </div>
        <div class="col-md-5">
            <h3>Simple Simon</h3>
            <h4>HTML, CSS, JavaScript, and jQuery</h4>
            <p>Simple Simon is a memory game with 4 colors that play randomly adding one color to the sequence after each turn. Players must select the correct color sequence for as many rounds as possible.</p>
            <a class="btn btn-primary" href="/simplesimon">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Project Five -->
    <div class="row">
        <div class="col-md-7">
            <a href="/calculator">
                <img class="img-responsive" src="/img/calculator.png" alt="screen shot of the calculator" style="margin-left: 30px;">
            </a>
        </div>
        <div class="col-md-5">
            <h3>Vanilla JS Calculator</h3>
            <h4>HTML, CSS, and JavaScript</h4>
            <p>This calculator uses HTML buttons for its inputs, and three text input fields for handling its data. When a user clicks the number keys, their value is inserted into the first input until an operand is chosen which will populate the second input, and finally the second value can be input into the third input. Gained experience assigning JavaScript event listeners and logic.</p>
            <a class="btn btn-primary" href="/calculator">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
    <!-- /.row -->

@stop