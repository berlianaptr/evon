<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome to Evon!</title>
	 <link rel="stylesheet" media="all" href="<?php echo base_url()?>assets/css/login.css" type="text/css">
	
</head>

	<body>
		<h1>Welcome to Evon!</h1>
    <div id="login">
      <div class="center">
          <h2>Masuk</h2>
          <p>Selamat Datang !</p>
          <form class="fl" action="<?php echo site_url('welcome/login') ?>" method="post">
            <input class="itpw" type="text" name="user" placeholder="Username or Email"><br>
            <input class="itpw" type="password" name="pass" placeholder="Password"><br>
            <input class="its" type="submit" name="login" value="Masuk">
          </form>

          <p><a href="#">Forget your password ?</a> | <a href="#">Created an account</a>  </p>

      </div>
    </div>

  </body>

	


</html>