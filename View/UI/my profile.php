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
    }

    .mainpage{
      margin-top:10%;
    }

    .myprofile{
      margin-top:10%;
    }

    .profile_edit{
      float: right;
      margin-right:10%;
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

    <body>
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
              <a href="#!" class="breadcrumb" style="color:#3F8755;">My Page</a>
              <a href="#!" class="breadcrumb" style="color:#3F8755;">Profile</a>
            </div>
        </div>
      </nav>

      <div class="row">
        <div class="background">
          <img src="img/pexels-photo-403575_1.jpg" alt="" style="background-size:cover;"/>
        </div>
      </div>

      <div class="row">
        <div class="myprofile">
          <!-- User's Name -->
          <div class="row">
            <div class="col s2"></div>
            <div class="input-field col s8">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" class="validate">
              <label for="icon_prefix" data-error="wrong" data-success="right">First Name</label>
            </div>
            <div class="col s2"></div>
          </div>
          <div class="row">
            <div class="col s2"></div>
            <div class="input-field col s8">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" class="validate">
              <label for="icon_prefix" data-error="wrong" data-success="right">Last Name</label>
            </div>
            <div class="col s2"></div>
          </div>

          <!-- Email and Phone -->
          <div class="row">
            <div class="col s2"></div>
            <div class="input-field col s8">
              <i class="material-icons prefix">email</i>
              <input id="icon_prefix" type="email" class="validate">
              <label for="icon_prefix" data-error="wrong" data-success="right">Email</label>
            </div>
            <div class="col s2"></div>
          </div>
          <div class="row">
            <div class="col s2"></div>
            <div class="input-field col s8">
              <i class="material-icons prefix">phone</i>
              <input id="icon_prefix" type="tel" class="validate">
              <label for="icon_prefix" data-error="wrong" data-success="right">Phone</label>
            </div>
            <div class="col s2"></div>
          </div>

          <!-- button -->
          <div class="row">
            <div class="profile_edit">
              <a class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">edit</i></a>
            </div>
          </div>

        </div>
      </div>

</body>
</html>
