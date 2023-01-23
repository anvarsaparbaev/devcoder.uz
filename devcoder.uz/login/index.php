<?php
session_start();

// Подключаем настройки Googel API
include "google_verification.php";

// Подключаем библиотеку the Google API client library for PHP(https://code.google.com/p/google-api-php-client/downloads/list)
require_once 'src/Google_Client.php';
require_once 'src/contrib/Google_Oauth2Service.php';


$googleClient = new Google_Client();
$googleClient->setApplicationName('Your APP Name');
$googleClient->setClientId($clientID);
$googleClient->setClientSecret($clientSecret);
$googleClient->setRedirectUri($redirectURL);
$googleClient->setDeveloperKey($apiKey);

$google_oauthV2 = new Google_Oauth2Service($googleClient);

if (isset($_REQUEST['logout'])) 
{
  unset($_SESSION['token']);
  $googleClient->revokeToken();
  header('Location: ' . $redirectURL);
}


// Действие если отправлен код
if (isset($_GET['code'])) 
{ 
	$googleClient->authenticate($_GET['code']);
	$_SESSION['token'] = $googleClient->getAccessToken();
	header('Location: ' . $redirectURL);
	return;
}

// Действие если отправлен токен
if (isset($_SESSION['token'])) 
{ 
		$googleClient->setAccessToken($_SESSION['token']);
}


if ($googleClient->getAccessToken()) 
{
	  // Извлекаем данные пользователя и сохраняем их в виде массива
	  $data 				= $google_oauthV2->userinfo->get();
	  
	  $user_id 				= $data['id'];
	 
	  $user_name 			= $data['name'];
	 
	  $email 				= $data['email'];
	 
	  $profile_image_url 	= $data['picture'];

	  $_SESSION['token'] 	= $googleClient->getAccessToken();
	  
	  session_start(); 
       $_SESSION['email'] =$email; 
  header('location:view.php');
}
else 
{
	//Генерируем ссылку авторизации
	$login_url = $googleClient->createAuthUrl();

}



echo '<!DOCTYPE html>
<html lang="en">
<head>
	<title>Esap kodlari</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			
					<span class="login100-form-title p-b-26">
						DevCoder.uz Sistemag‘a kiriw
					</span> ';
if(isset($login_url)) //Пользователь не авторизован, показываем кнопку авторизации
{
	//echo '<a class="login" href="'.$login_url.'"><img src="index.jpg" /></a>';

	echo '<a  href="'.$login_url.'">
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Kiriw
							</button>
						</div>
					</div> </a>';

} 
else // Авторизация успешна, выводим информацию о пользователе
{

	/*foreach($data as $key=>$value){
		echo "$key is $value<br /><br />";
	}*/

	
	echo '<br /><a class="logout" href="?logout=1"> <h3> Sistemadan shiǵiw </h3> </a>'; 
}

echo '</body></html>';
?>

