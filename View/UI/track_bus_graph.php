<!doctype html>
<html>
<head>
 <meta charset="utf-8">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
	
	.nav-wrapper{
      padding:10px;
    }

    nav{
      background-color: rgba(177, 218, 143, 0.8);
      height:10%;
    }

    .breadcrumb{
      font-size: 23pt;
	  color:#3F8755;
    }

	table{
		margin-top:10%;
	}
	
	table > tbody > tr{
		height:118px;
	}
	
    table > tbody > tr:nth-child(even){
      background-image:url(../image/bus_R1.png);
	  background-repeat:no-repeat;
	  background-size: auto;
    }

    table > tbody >tr:nth-child(odd){
      background-image:url(../image/bus_L1.png);
	  background-repeat:no-repeat;
	  background-size: auto;
    }

    table > tbody > tr:first-child{
      background-image:url(../image/start.png);
	  background-repeat:no-repeat;
	  background-size:auto;
    }

    table > tbody >tr:last-child{
      background-image:url(../image/end.png);
	  background-repeat:no-repeat;
      background-size: auto;
    }
	
	td{
		text-indent:30%;
	}

    </style>

    <script>
    // side nav //
    (function($){
      $(function(){
        $('.button-collapse').sideNav();
      }); // end of document ready
    })(jQuery);

    $(".button-collapse").sideNav();

    $('.button-collapse').sideNav('show');
    // Hide sideNav
    $('.button-collapse').sideNav('hide');
    // Destroy sideNav
    $('.button-collapse').sideNav('destroy');

    </script>
</head>

<div>
  <div style="background-color:rgb(123, 193, 68); padding:10px;">
        <ul id="slide-out" class="side-nav">
          <li>
            <div class="user-view">
              <div class="background">
                <img src="img/bg3.jpg">
              </div>
              <a href="#!user"><img class="circle" src="img/user_icon.svg"></a>
              <a href="#!name"><span class="white-text name">John Doe</span></a>
              <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
            </div>
          </li>
          <li><a class="subheader">Bus</a></li>
          <li><a href="#!"><i class="material-icons">search</i>Search</a></li>
          <li><a href="#!"><i class="material-icons">error_outline</i>Alert</a></li>

          <li><div class="divider"></div></li>
          <li><a class="subheader">My Page</a></li>
          <li><a href="#!"><i class="material-icons">account_box</i>Profile</a></li>
          <li><a href="#!"><i class="material-icons">directions_bus</i>My Favourite Bus</a></li>
          <li><a href="#!"><i class="material-icons">nature_people</i>My Bus Stop</a></li>
          <li><a href="#!"><i class="material-icons">credit_card</i>Go Card</a></li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="large material-icons" style="color:white;">menu</i></a>
      </div>

      <!-- breadcrumb -->
      <nav>
        <div class="nav-wrapper">
            <div class="col s12" style="margin-left:10%;">
              <a href="#!" class="breadcrumb" style="color:#3F8755;">Search</a>
              <a href="#!" class="breadcrumb" style="color:#3F8755;">Result</a>
            </div>
        </div>
      </nav>

<div class="row">
	<div class="col s3"></div>
    <div class="col s6">
    	<table>
        	<tr>
            	<td>
                ppppppppppp
            	</td>
            </tr>
            <tr>
            	<td>
                </td>
            </tr>
            <tr>
            	<td>
                </td>
            </tr>
            <tr>
            	<td>
                </td>
            </tr>
        </table>
    </div>
    <div class="col s3"></div>


</html>
