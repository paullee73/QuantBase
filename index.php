<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="index.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <title>Quantbase</title>
</head>

<body>
    <!-- navigation bar -->
    <header>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">QuantBase</a>
                </div>
                <!-- elements in navbar to collapse into button -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="exchange.php">Exchange</a>
                        </li>
                        <li>
                            <a href="portfolio.php">Portfolio</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="signup.php">
                                <span class="glyphicon glyphicon-user"></span> Sign Up</a>
                        </li>
                        <li>
                            <a href="login.php">
                                <span class="glyphicon glyphicon-log-in"></span> Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    </header>

    <!-- Jumbotron with stock market background for visuals -->
    <header class="jumbotron">
        <center>
            <div id="bigtalk">
                <br>
                <h2>Never Lose Touch with the Market</h2>
            </div>
        </center>
    </header>

    <!-- General summary of QuantBase -->
    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-4">
                <h3>Exchange</h3>
                <p>Find about more assets on the market and add them to your portfolio to stay updated.
                </p>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-4">
                <h3>Portfolio</h3>
                <p>Be notified via phone or e-mail when a stock of interest reaches an threshold value in exponential moving
                    average.
                </p>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
<footer class="footer">
    <div class="container" id="footer">
        <small>
            <center>
                Copyright © 2017 QuantBase Technologies
            </center>
        </small>
    </div>
</footer>

</html>