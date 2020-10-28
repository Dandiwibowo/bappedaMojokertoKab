<?php include "../connect.php"; ?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Lato&display=swap" rel="stylesheet">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="<?php echo $URL; ?>/superadmin/css/superadmin.css">

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

      <meta name="description" content="INI WEBSITE" />
      <meta name="keywords" content="Kabupaten Probolinggo, KMK" />
      <meta name="author" content="Dandi Wibowo" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
      <meta charset="utf-8">
      <link rel="icon" href="<?php echo $URL; ?>/images/logo.png" type="image/x-icon" />
      <title>Admin KMK</title>
    </head>

    <body class="row" style="margin:0px; padding:0px; background:#f4f4f4;">
	
	  <!--isi-->
	  <div class="col s12 l8 push-l3 isi">
      <?php
        $pageLoad=$_GET['pg'];
        include "page/$pageLoad.php";
      ?>
    </div>
		
		
	
	  
	  <!--navbar-->
	  <?php include 'nav.php';?>
  
    <!--JavaScript at end of body for optimized loading-->
    
	  <script>

        $(document).ready(function(){
            $('.tooltipped').tooltip();
            $(".sidenav").sidenav();
            $(".tooltipped").tooltip();
            $(".collapsible").collapsible();
            $(".modal").modal();
            $('.dropdown-trigger').dropdown();
            $('.datepicker').datepicker();
        });

        
  </script>

    </body>
  </html>
        