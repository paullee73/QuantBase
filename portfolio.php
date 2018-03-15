<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="index.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- addin jQuery to the file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script>
        // perform the ajax request on the page load
        $(document).ready(function () {
            // get the top 5 companies, set default for now
            var companies = ["GOOGl", "AMZN", "FB", "MSFT", "TWTR"];
            var num = 1;
            for (i = 0; i < companies.length; i++) {
                $.ajax({
                    url: "https://www.alphavantage.co/query?function=EMA&symbol=" + companies[i] + "&interval=15min&time_period=10&series_type=close&apikey=B35PYTKDNDCDQVK2",
                    type: 'GET', //get request for the API
                    async: false, //we want async to be off here so the data is loaded in order
                    cache: false,
                    timeout: 30000,
                    error: function () {
                        return true;
                    },
                    success: function (data, status) {

                        var name = (data["Meta Data"]["1: Symbol"]); //get the name of the stock from the API
                        var date = (data["Meta Data"]["3: Last Refreshed"]);//get the time of last update of the stock
                        var obj = data["Technical Analysis: EMA"]
                        var emaVal = obj[Object.keys(obj)[0]]["EMA"]; //get the EMA value of the stock
                        document.getElementById("stock" + num).innerHTML = name; //set the name on the table
                        document.getElementById("ema" + num).innerHTML = emaVal;//set the EMA value on the table
                        document.getElementById("date" + num).innerHTML = date;//set the date on the table
                        num++;
                    }
                });
            };
        });
    </script>
    <script>
        function removeRow(num) {
            var rowName = "row" + num;
            document.getElementById(rowName).style.display = "none";
        }
    </script>
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
    <div class="container" style="padding-top: 60px">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Stock</th>
                    <th>Current EMA</th>
                    <th>Last Checked</th>
                </tr>
            </thead>
            <tbody>
                <tr id="row1">
                    <td>
                        <img class="icons" src="google.png" alt="Google">
                    </td>
                    <td id="stock1"></td>
                    <td id="ema1"></td>
                    <td id="date1"></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-md" onClick="removeRow(1)">Remove</button>
                    </td>
                </tr>
                <tr id="row2">
                    <td>
                        <img class="icons" src="amazon.png" alt="Amazon">
                    </td>
                    <td id="stock2"></td>
                    <td id="ema2"></td>
                    <td id="date2"></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-md" onClick="removeRow(2)">Remove</button>
                    </td>
                </tr>
                <tr id="row3">
                    <td>
                        <img class="icons" src="facebook.png" alt="Facebook">
                    </td>
                    <td id="stock3"></td>
                    <td id="ema3"></td>
                    <td id="date3"></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-md" onClick="removeRow(3)">Remove</button>
                    </td>
                </tr>
                <tr id="row4">
                    <td>
                        <img class="icons" src="microsoft.png" alt="Microsoft">
                    </td>
                    <td id="stock4"></td>
                    <td id="ema4"></td>
                    <td id="date4"></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-md" onClick="removeRow(4)">Remove</button>
                    </td>
                </tr>
                <tr id="row5">
                    <td>
                        <img class="icons" src="twitter.png" alt="Twitter">
                    </td>
                    <td id="stock5"></td>
                    <td id="ema5"></td>
                    <td id="date5"></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-md" onClick="removeRow(5)">Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>


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