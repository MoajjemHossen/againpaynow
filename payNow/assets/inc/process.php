<?php 
//function page
require_once('functions.php');

//notun registration
if (isset($_POST['signupBtn']))
{
	$response = validData($_POST); //data validating function tii call deya hoilo

		if ($response['status'])
		{
			echo 'status is it true' ;
			if (newRegUsers($_POST)){
				header ("location:../../?login=success");
			}



		}else{
			$_SESSION['form_tottho']=$_POST;
       		$_SESSION['error'] = $response;
			header ("location:../../?registration=failed");	
		}

}
else{
	echo "no hit signupBtn";
}

//login process
if (isset($_REQUEST['signinbtn'])) {
	//print_r($_POST);
	$existsUserTottho =existsUsers($_POST['phone_email'],$_POST['password']);

		if (count($existsUserTottho)>0)
		{	
			$_SESSION ['existsUserTottho'] = $existsUserTottho;
			$_SESSION ['authorization']= true;
			header ('location:'.site_url($path).'?login_seccess');
		}else{
			header ('location:'.site_url($path).'?login_failed');
		}



}else{
	echo "no hit submitbtn";
}

//logout Process
if (isset($_GET['logout'])) {
	session_destroy();
	header ('location:'.site_url($path).'?logout_hoyeche');
}else{
	echo "no Logout";
}



// if (userExits($_POST['phone_email'],$_POST['password'])) {
// 	echo "okay";
// }else{
// 	echo "not okay";
// }

// //notun user signup

// $saradibeProthom = validData($_POST);

// 	//uporer call deya function thik thakle
// 	if ($saradibeProthom['status']) {

// 		echo "prothom statement </br>";
// 		if (createUser($_POST)) {

// 			header("location:../../?login=newuser");

// 		}else{
//     header("location:../../?signup=signup_failed");
// }


		
		
		



// 	}else{
// 		echo "saradibe Prothom no. thik nai";
// 	}


	






 ?>