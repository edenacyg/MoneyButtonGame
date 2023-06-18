<?php
session_start();
$timezone = date_default_timezone_set('Asia/Shanghai'); 
$time = date("m/d/Y H:i:A");

if($_SESSION['counter'] > 0){
if(isset($_POST['action']) && $_POST['action'] == "bet_low"){ 
    $_SESSION['counter'] = $_SESSION['counter']-1;
    $_SESSION['logs'] = 1;
    $_SESSION['bet_val'] = rand(-25,100);
        if($_SESSION['bet_val'] > 0){
            $_SESSION['mlogs'][] = "<p class='positive'>"."["." ".$time." "."]"." "."You pushed Low Risk "."Value is"." ".$_SESSION['bet_val'].". Your current money now id"." ".$_SESSION['money']." "."with"." ".$_SESSION['counter']." "."chance(s) left."."</p>";
        } else {
            $_SESSION['mlogs'][] = "<p class='negative'>"."["." ".$time." "."]"." "."You pushed Low Risk "."Value is"." ".$_SESSION['bet_val'].". Your current money now id"." ".$_SESSION['money']." "."with"." ".$_SESSION['counter']." "."chance(s) left."."</p>";
        }
    $_SESSION['money'] = $_SESSION['money']+$_SESSION['bet_val'];
    
} else if(isset($_POST['action']) && $_POST['action'] == "bet_mod"){
    $_SESSION['counter'] = $_SESSION['counter']-1;
    $_SESSION['logs'] = 2; 
    $_SESSION['bet_val'] = rand(-100,1000);
        if($_SESSION['bet_val'] > 0){
            $_SESSION['mlogs'][] = "<p class='positive'>"."["." ".$time." "."]"." "."You pushed Moderate Risk "."Value is"." ".$_SESSION['bet_val'].". Your current money now id"." ".$_SESSION['money']." "."with"." ".$_SESSION['counter']." "."chance(s) left."."</p>";
        } else { 
            $_SESSION['mlogs'][] = "<p class='negative'>"."["." ".$time." "."]"." "."You pushed Moderate Risk "."Value is"." ".$_SESSION['bet_val'].". Your current money now id"." ".$_SESSION['money']." "."with"." ".$_SESSION['counter']." "."chance(s) left."."</p>";
        }
    $_SESSION['money'] = $_SESSION['money']+$_SESSION['bet_val'];
    
} else if(isset($_POST['action']) && $_POST['action'] == "bet_high"){
    $_SESSION['counter'] = $_SESSION['counter']-1;
    $_SESSION['logs'] = 3; 
    $_SESSION['bet_val'] = rand(-100,2500);
        if($_SESSION['bet_val'] > 0){
            $_SESSION['mlogs'][] = "<p class='positive'>"."["." ".$time." "."]"." "."You pushed High Risk "."Value is"." ".$_SESSION['bet_val'].". Your current money now id"." ".$_SESSION['money']." "."with"." ".$_SESSION['counter']." "."chance(s) left."."</p>";
        } else {
            $_SESSION['mlogs'][] = "<p class='negative'>"."["." ".$time." "."]"." "."You pushed High Risk "."Value is"." ".$_SESSION['bet_val'].". Your current money now id"." ".$_SESSION['money']." "."with"." ".$_SESSION['counter']." "."chance(s) left."."</p>";
        }
    $_SESSION['money'] = $_SESSION['money']+$_SESSION['bet_val'];

} else if(isset($_POST['action']) && $_POST['action'] == "bet_severe"){
    $_SESSION['counter'] = $_SESSION['counter']-1;
    $_SESSION['logs'] = 4;
    $_SESSION['bet_val'] = rand(-500,5000);
    $_SESSION['bet_val'] = rand(-100,2500);
        if($_SESSION['bet_val'] > 0){
            $_SESSION['mlogs'][] = "<p class='positive'>"."["." ".$time." "."]"." "."You pushed Severe Risk "."Value is"." ".$_SESSION['bet_val'].". Your current money now id"." ".$_SESSION['money']." "."with"." ".$_SESSION['counter']." "."chance(s) left."."</p>";
        } else {
            $_SESSION['mlogs'][] = "<p class='negative'>"."["." ".$time." "."]"." "."You pushed Severe Risk "."Value is"." ".$_SESSION['bet_val'].". Your current money now id"." ".$_SESSION['money']." "."with"." ".$_SESSION['counter']." "."chance(s) left."."</p>";
        }
    $_SESSION['money'] = $_SESSION['money']+$_SESSION['bet_val'];
}

}   else if ($_SESSION['counter'] == 0){
    $_SESSION['mlogs'][] = "Game Over!";
}

if(isset($_POST['action']) && $_POST['action'] == "reset"){ 
    $_SESSION['coupon'] = 0;
    $_SESSION['log'] = 0;
    $_SESSION['counter']= 10;
    $_SESSION['money'] = 500;
    $_SESSION['logs'] = 0;
    $_SESSION['mlogs'] = [];
}

header("Location: money.php");

?>
