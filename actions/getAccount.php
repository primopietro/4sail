<?php
if(!isset($_SESSION['current_user'])){session_start();}


$finalString ="";

$finalString .= "<div style='width:100%;'><h4 class='h4Login'>".$_SESSION['current_user']['first_name']. " ". $_SESSION['current_user']['last_name']."</h4></div>";
$finalString .= "<form>";
$finalString .= "<div class='divInput'><label for='first_name' style='margin-left: 58px;'>First name</label><br><input id='first_name' class='emailPasswordInput' name='first_name' type='text' value='".$_SESSION['current_user']['first_name']."' placeholder='ex: Joe'></input></div>";
$finalString .= "<div class='divInput' style='padding-top: 4px;'><label for='last_name' style='margin-left: 58px;'>Last name</label><br><input id='last_name' class='emailPasswordInput' name='last_name' type='text' value='".$_SESSION['current_user']['last_name']."' placeholder='ex: Doe'></input></div>";

$finalString .= "<div class='divInput'><label for='email' style='margin-left: 58px;'>Email</label><br><input id='email' class='emailPasswordInput' name='email' type='text' value='". $_SESSION['current_user']['email']."' placeholder='ex: test@gmail.com'></input></div>";

$finalString .= "<div class='divInput'><label for='password' style='margin-left: 58px;'>Password</label><br><input id='password' class='emailPasswordInput' name='password' type='password' value='".$_SESSION['current_user']['password']."' placeholder='Password'></input></div>";

$finalString .= "<div class='divInput'><label for='phone' style='margin-left: 58px;'>Phone number</label><br><input id='phone' class='emailPasswordInput' name='phone' type='text' value='".$_SESSION['current_user']['phone']."' placeholder='ex: (819) 582-9971'></input></div>";

$finalString .= "<div class='divInput'><label for='address' style='margin-left: 58px;'>Address</label><br><input id='address' class='emailPasswordInput' name='address' type='text' value='".$_SESSION['current_user']['address']."' placeholder='ex: 1838 rue dunant'></input></div>";

$finalString .= "<span id='error'></span>";
$finalString .= "<div class='divButton'><a class='btn btn-fill btnConfirmProfile'>Confirm</a></div>";
$finalString .= "</form>";


echo $finalString;



