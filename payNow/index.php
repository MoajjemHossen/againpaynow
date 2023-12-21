<?php require_once ( "assets/inc/functions.php" ); 

 ?>
<?php
//header ongsho add kora hoiche
view_parts('header', 'payNow-easy send money');

if (isset($_SESSION['authorization']) && $_SESSION['authorization'] == true) {
    view_page('profile', 'Account Login Name');

}elseif (isset($_REQUEST['login'])) {

          view_page('signIn', 'New login');
    
}
elseif(isset($_REQUEST['contact'])){
    view_page('contact');
}

elseif (isset($_REQUEST['registration'])) {

        view_page('signup', 'New Reagistration');
    
}elseif (isset($_REQUEST['login'])) {
    view_page('signIn', 'LOgin tottho');
}

else{
    view_page('home', 'Home Page');

}


//pages add kora hoiche







// for clearing previous submitted form value
if(isset($_SESSION['form_tottho'])){
    unset($_SESSION['form_tottho']);
}

//footer section add kora hoiche
view_parts('footer');

 ?>

