<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
		input {
			display: inline-block;
			width: 1.9em;
		}
		#modal1 {
			height:90vh;
			background-color: white;
		}
		#modal2 {
			height:40vh;
			margin:0px auto;
		}
		#modal1 > .material-icons {
			float:left;
			display: inline-block;
		}
		#modal2 > .material-icons {
			float:left;
			display: inline-block;
		}
		.carousel {
			height:70vh;
		}
		.carousel > img {
			background-size:100% auto;
			background-repeat: no-repeat;
		}
	</style>
    <script>
    function activateModal() {
    // initialise modal element
    var modalEl = document.createElement('div');
    modalEl.style.width = '80%';
    modalEl.style.height = 'auto';
    modalEl.style.margin = '5%; auto';
    modalEl.style.backgroundColor = '#fff';

    // show modal
    mui.overlay('on', modalEl);
    }

    $(document).ready(function() {
      $('.modal').modal();
    });

    </script>
    </head>

    <body style="background-image:url(View/image/index_bg2.svg); background-size:cover; background-repeat:no-repeat;">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Modal Trigger -->
    <div class="row" style="margin-top:100%;"></div>
    <div class="row" style="margin-top:5%;">
    	<div class="col s12">
        	<div class="col s1"></div>
            <div class="col s10 center-align">
                <a class="waves-effect waves-light btn-large modal-trigger" style="background-color:white; color:rgb(122, 193, 67);" href="#modal1"><i class="material-icons right">edit</i>Sign up</a>
            </div>
    		<div class="col s1"></div>
        </div>
    </div>
	<div class="row" style="margin-top:5%;">
    	<div class="col s12">
    		<div class="col s1"></div>
    			<div class="col s10 center-align">
	                <a class="waves-effect waves-light btn-large modal-trigger" style="background-color:white; color:rgb(122, 193, 67);" href="#modal2"><i class="material-icons right">lock</i>Login</a>
            	</div>
    		<div class="col s1"></div>
  		</div>
    </div>

    <!-- Registration -->
    <div class="row">
	    <form action="Controller/pdoReg.php" method="post" class="col s12">
    	    <div id="modal1" class="modal modal-fixed-footer">
        	    <div class="modal-content"> 
            	    <!-- inputs -->
                	<div class="row">
                        <!-- Go Card number -->
                        <div class="row">
                            <div class="input-field col s12"> <i class="material-icons prefix">credit_card</i>
                                <input id="gocardno" name="gocardno" type="text" class="validate" required>
                                <label for="gocardno" data-error="wrong" data-success="right">Gocard Number</label>
                            </div>
                        </div>
                        <!-- Username -->
                        <div class="row">
                            <div class="input-field col s12"> <i class="material-icons prefix">account_circle</i>
                                <input id="username" name="username" type="text" class="validate" required>
                                <label for="username" data-error="wrong" data-success="right">Username</label>
                            </div>
                         <!-- Password -->
                            <div class="input-field col s12"> <i class="material-icons prefix">lock</i>
                                <input id="password" name="password" type="password" class="validate" required>
                                <label for="password" data-error="wrong" data-success="right">Password</label>
                            </div>
                        </div>
                    
                        <!-- User's Name -->
                        <div class="row">
                            <div class="input-field col s12"> <i class="material-icons prefix">account_circle</i>
                                <input id="fname" name="fname" type="text" class="validate" required>
                                <label for="fname" data-error="wrong" data-success="right">First Name</label>
                            </div>            
                            <div class="input-field col s12"> <i class="material-icons prefix">account_circle</i>
                                <input id="lname" name="lname" type="text" class="validate" required>
                                <label for="lname" data-error="wrong" data-success="right">Last Name</label>
                            </div>
                        </div>
                    
                        <!-- Email and Phone -->
                        <div class="row">
                            <div class="input-field col s12"> <i class="material-icons prefix">email</i>
                                <input id="email" name="email" type="email" class="validate" required>
                                <label for="email" data-error="wrong" data-success="right">Email</label>
                            </div>
                            <div class="input-field col s12"> <i class="material-icons prefix">phone</i>
                                <input id="phone" name="mobile" type="tel" class="validate" required>
                                <label for="phone" data-error="wrong" data-success="right">Phone</label>
                            </div>
                        </div>
                  </div>
        	</div>
            <div class="modal-footer">
            	<button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Register</button>
	            <a href="#!" onClick="" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
            </div>
          </form>
    </div>
    
    <!-- Login Form -->
    <form action="Controller/pdoLogin.php" method="post" class="col s12">
	    <div id="modal2" class="modal modal-fixed-footer">
    		<div class="modal-content">
        	    <div class="row">    
                    <div class="row">
                        <div class="input-field col s12"> <i class="material-icons prefix">account_circle</i>
                            <input id="loginID" name="username" type="text" class="validate" required>
                            <label for="loginID">Username</label>
                        </div>
                        <div class="input-field col s12"> <i class="material-icons prefix">lock</i>
                            <input id="password" name="password" type="password" class="validate" required>
                            <label for="password">Password</label>
                        </div>
                        	<input type="hidden" name="login">
                    </div>
            	</div>
            </div>
            <div class="modal-footer">
            	<button type="submit" name="btnLogin" class="modal-action modal-close waves-effect waves-green btn-flat">Login</button>
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancle</a>
            </div>
		</div>
	</form>
</body>
</html>