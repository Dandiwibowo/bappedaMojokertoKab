<?php
  include '../connect.php';
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Lato&display=swap" rel="stylesheet">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="superadmin/css/superadmin.css">

      <meta name="description" content="INI WEBSITE" />
      <meta name="keywords" content="Kabupaten Probolinggo, KMK" />
      <meta name="author" content="Dandi Wibowo" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
      <meta charset="utf-8">
      <link rel="icon" href="images/logo.png" type="image/x-icon" />
      <title>KMK</title>
    </head>

    <body class="row" style="margin:0px; padding:0px; background:#f4f4f4;">
	  
    <div class="lform row col xl4 l4 m6 s12 push-xl4 push-l4 push-m3" style="background:white; text-align:center; padding:30px;">
      <p style="font-size:28px;">Login</p>
      <form style="text-align:left;" action="" method="post">

        <div class="col s12" style="padding: 0px; margin:0px;">
          Email: 
          <div class="col s12" style="padding: 0px; margin:0px;">
            <input type="text" id="email" placeholder="Email">
          </div>
        </div>

        <div class="col s12" style="padding: 0px; margin:0px;">
          Password: 
          <div class="col s12" style="padding: 0px; margin:0px;">
            <input id="pass" class="col s11" type="password" placeholder="Password">
            <a id="showPass" onclick="changePassType()" href="#" class="material-icons col s1">visibility</a>
          </div>
        </div>
        <div class="btn red" onclick="login()">Login</div>
      </form>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	  <script>
        $(document).ready(function(){
            $('.tooltipped').tooltip();
            $(".sidenav").sidenav();
            $(".tooltipped").tooltip();
            $(".collapsible").collapsible();
            $(".modal").modal();
            $('.dropdown-trigger').dropdown();
        });

        var passStat=0;
        window.onkeypress = function(event) {
            // console.log(event.keyCode)
            if (event.keyCode == 13) {
                login();
            }
        };
        function changePassType(){

            if(passStat == 1){
                $("#pass").attr("type","password");
                $("#showPass").html("visibility");
                passStat=0;

            }

            else{
                $("#pass").attr("type","text");
                $("#showPass").html("visibility_off");
                passStat=1;
            }
        }


        function login(){
            var email = $("#email").val();
            var pass = $("#pass").val();

            $.ajax({
                url: '<?php echo $URL; ?>/API/login',
                method: 'POST',
                data: {
                  "username":email,
                  "password":pass,
                },
                
                success: function (data) {
                  var response= JSON.stringify(data);
                  var myResponse=JSON.parse(response);

                  // console.log(myResponse.message);
                  if(myResponse.message=="Account Found"){
                    localStorage.setItem("token", myResponse.token);
                    localStorage.setItem("iduser", myResponse.data.id);
                    localStorage.setItem("nama", myResponse.data.nama);
                    localStorage.setItem("username", myResponse.data.username);
                    window.location="<?php echo $URL; ?>/admin/setting";
                  }
                  else{
                    alert(myResponse.message);
                  }
                  // console.log(JSON.stringify(myResponse.token));
                  // alert(data);
                }
            });
        }
    </script>

    </body>
  </html>
        