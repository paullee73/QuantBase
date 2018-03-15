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
                    <ul class="nav navbar-nav navbar-right" id="top-right">
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

    <!-- Form for logging in -->
    <center>
        <div id="welcome-msg">
        </div>
    </center>
    <div class="container" id="login-form">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8" id="form">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="inputEmail">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="inputPassword">
                </div>
                <button type="submit" class="btn btn-default" onClick="login()">Login</button>
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <center>
        <div id="signin-msg">
        </div>
    </center>

    <script>
        //constructor for user object
        function User(name, email, password) {
            this.name = name;
            this.email = email;
            this.password = password;
            this.stocks = [];
            this.signedIn = false;
            this.addStock = function (stock) {
                this.stocks.push(stock);
            }
        };
        // Validate user input by first, checking if inputted email has been registered, warn user
        // Then, if password is invalid, warn user
        // Otherwise, sign-in is valid and update signedIn attribute: false->true
        function login() {
            var enteredEmail = document.getElementById("inputEmail").value;
            var enteredPassword = document.getElementById("inputPassword").value;
            if (!(enteredEmail in sessionStorage)) {
                document.getElementById("signin-msg").innerHTML = "Email/password is incorrect";
            }
            var obj = $.parseJSON(sessionStorage.getItem(enteredEmail));
            if (enteredPassword != obj["password"]) {
                document.getElementById("signin-msg").innerHTML = "Email/password is incorrect";
            }
            else {
                document.getElementById("signin-msg").innerHTML = "";
                document.getElementById("login-form").style.display = "none";
                document.getElementById("welcome-msg").innerHTML = "Welcome " + obj['name'];
                document.getElementById("top-right").style.display = "none";
                // Update the stored user: signedIn variable
                sessionStorage.removeItem(enteredEmail);
                var user = new User(obj["name"], obj["email"], enteredPassword);
                user.stocks = obj["stocks"];
                user.signedIn = true;
                sessionStorage.setItem(enteredEmail, JSON.stringify(user));
            }
        }
    </script>




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