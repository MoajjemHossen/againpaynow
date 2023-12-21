
<?php 
session_start();
require_once ('connect.php');

//index a khondo khondo ongsho add korar jonno
function view_parts($parts, $page_title = "")
{
	include "assets/inc/$parts.php";
}

//index a page add korar jonno
function view_page($page, $page_title = "" ){
	include "assets/pages/$page.php";
}


//site er url etiii
function site_url($path){
	$site_url = "http://localhost/rawcoding/payNow/";
	return $site_url.$path;
}


//*************/////

//Data Validation khbe validData($tottho) ei function diye valid

function validData($tottho)
{

		$fullName	= $tottho['fullName'] ?? "";
		$cellphone 	= $tottho['cellphone'] ?? "";
		$email 		= $tottho['email'] ?? "";
		$password 	= $tottho['password'] ?? "";


		$return_tottho = [
		'status'	=> true,
		'message'	=> 'Somosto khalighor puron hye geche',

		];

		

		if (!$password) {
				$return_tottho ['status']	= false;
				$return_tottho ['message']	= 'password is Blank';
				$return_tottho ['field']	= 'password';
		}

		if (!$email) {
				$return_tottho ['status']	= false;
				$return_tottho ['message']	= 'Email is Blank';
				$return_tottho ['field']	= 'email';
		}

		if (!$cellphone) {
				$return_tottho ['status']	= false;
				$return_tottho ['message']	= 'Number is Blank';
				$return_tottho ['field']	= 'cellphone';
		}

		if (!$fullName) {
				$return_tottho ['status']	= false;
				$return_tottho ['message']	= 'Name is Blank';
				$return_tottho ['field']	= 'fullName';
		}

		

		

		


		//email ebong mobile number er aage bebohar hoyeche kina dekhte ei funtion call deya hoche
		if(checkUsedEmail($email))
		{
			$return_tottho['status']	= false;
			$return_tottho['message']	= 'email is already Used!!';
			$return_tottho['field']		= 'email';
		}

		if(checkUsedNumber($cellphone))
		{
			$return_tottho['status']	= false;
			$return_tottho['message']	= 'Mobile Number is already Used!!';
			$return_tottho['field']		= 'cellphone';
		}


		return $return_tottho;

}



//for showing error messages
function showError($field)
{
    if (isset($_SESSION["error"]) && $_SESSION["error"]["field"] == $field) {
        echo ' <div class="alert alert-danger  mt-2" role="alert"  >' .
            $_SESSION["error"]["message"] .
            "</div>";
        unset($_SESSION["error"]);
    }
}

// Previous submited value show korar jonno ei function
function showPreviousValue($field)
{
    if (isset($_SESSION["form_tottho"])){
        return $_SESSION["form_tottho"][$field];
    }
    return "";
}

//email er aage bebohar hoyeche kina dekhte eii funtion
function checkUsedEmail($email)
{
	global $dbConnect;

		$selectQuery ="SELECT COUNT(*)as rowgulotheke FROM paynowusers WHERE email='$email'";
		$runQuery = mysqli_query($dbConnect,$selectQuery);
		$return_tottho = mysqli_fetch_assoc($runQuery);
		return $return_tottho['rowgulotheke'];
}

//mobile number er aage bebohar hoyeche kina dekhte eii function
function checkUsedNumber($cellphone)
{
	global $dbConnect;

		$selectQuery = " SELECT COUNT(*) as rowgulotheke FROM paynowusers WHERE mobile ='$cellphone' ";
		$runQuery = mysqli_query($dbConnect, $selectQuery);
		$return_tottho = mysqli_fetch_assoc($runQuery);
		return $return_tottho['rowgulotheke'];

}

//notun user er registration tottho database a insert
function newRegUsers($totthoreg)
{
	global $dbConnect;

		$fullName  = $totthoreg['fullName'];
		$email 	   = $totthoreg['email'];
		$cellphone = $totthoreg['cellphone'];
		$password  = $totthoreg['password'];

		$insertQuery = " INSERT INTO paynowusers (fullName, mobile, email, password) VALUES ('$fullName','$cellphone', '$email', '$password' ) ";
		$runInsertQuery = mysqli_query ($dbConnect,$insertQuery);

		if ($runInsertQuery) {

			$newUserID= mysqli_insert_id($dbConnect);
			accountOpnBlnc($newUserID);
			return true;
		}
		return false;


}



// for checking user is exists or not function korlam
function existsUsers($phone_email, $password)
{
	global $dbConnect;
		$query = "SELECT * FROM paynowusers WHERE (mobile='$phone_email' || email='$phone_email') && password= '$password' ";
		$runQuery = mysqli_query($dbConnect,$query);
		$return_data = mysqli_fetch_assoc($runQuery) ?? array();
		return $return_data;

}

//account opening offer Balance Function
function accountOpnBlnc($user_id)
{
	global $dbConnect;

		$insertQuery = "INSERT INTO trans (from_user_id,to_user_id,amount) VALUES(121,$user_id,500)";
		return mysqli_query($dbConnect,$insertQuery);
}








//error message dekhanor jonno ei function
// function showError($field)
// {
// 	if(isset($_SESSION['error']) && $_SESSION['error']['field']== $field )
// 	{
// 		echo "<p style= 'color:red' >". $_SESSION["error"]["message"] ."</p>";
// 		unset($_SESSION["error"]);
// 	}
// }

//input field a previous submit kora values show korar jonno
// function showPreviousValue($field)
// {
// 	if (isset($_SESSION['form_tottho']))
// 	{
// 		return $_SESSION['form_tottho'][$field];
// 	}

// 	return "";
// }


//mobile numberti er aage bebohar hoyeche kina dekhar jonno eii function
// function checkCellphone($cellphone)
// {
// 	global $dbConnect;

// 		$checkQuery = "SELECT  COUNT(*) as row FROM paynowusers WHERE cellphone ='$cellphone' ";
// 		$runQuery = mysqli_query($dbConnect, $checkQuery);
// 		$return_tottho = mysqli_fetch_assoc($runQuery);
// 		return $return_tottho['row'];

// }


// //error message er jonno ei function
// function error_mmessage($field)
// {
// 	if (isset($_SESSION["error"]) && $_SESSION["error"]["field"] == $field) {
// 		echo ' <div class="alert alert-danger mt-2" role="alert">' .
//             $_SESSION["error"]["message"] .
//             "</div>";
// 		unset($_SESSION["error"]);
// 	}
	
// }

// //for showing previous submited form values
// function showFormValue($field)
// {
//     if (isset($_SESSION["form_data"])) {
//         return $_SESSION["form_data"][$field];
//     }
//     return "";
// }




// //notun user create
// function createUser($tottho){
// 	global $dbConnect;

// 		$fullName =  $tottho['fullName'];

// 		$dataInsert = "INSERT INTO paynowusers (fullName) VALUES ('$fullName') ";
// 		$runInsertQuery = mysqli_query($dbConnect, $dataInsert);

// 		if ($runInsertQuery == true) {
// 			echo "Data Inserted";
// 		}else{
// 			echo "Not Inserted";
// 		}

// }


// function createUser($tottho)
// {	

// 	global $dbConnect;

// 	$fullName =  $tottho['fullName'];
// 	$dataInsertt= "INSERT INTO paynowusers (fullName) VALUES ('$fullName') ";
// 	$run = mysqli_query ($dbConnect, $dataInsertt);
// }


 ?>
