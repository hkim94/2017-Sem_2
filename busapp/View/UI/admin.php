<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Login Form -->
        <form action="../../Controller/login_admin.php" method="post" name="adminForm" style="margin:15%; margin-top:30%;">
            <div class="input-field col s12"> <i class="material-icons prefix">account_circle</i>
                <input id="loginID" name="username" type="text" class="validate">
                <label for="loginID">Username</label>
            </div>
            <div class="input-field col s12"> <i class="material-icons prefix">lock</i>
                <input id="password" name="password" type="password" class="validate">
                <label for="password">Password</label>
            </div>
            <input type="hidden" name="login">
            <button type="submit" id="btnLogin" name="btnLogin" class="waves-effect waves-light btn" style="float:right; background-color:">Login</button>
        </form>    
</body>
</html>