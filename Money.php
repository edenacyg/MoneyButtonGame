<?php
session_start();

if(!isset($_SESSION['counter'])){
    $_SESSION['counter'] = 10;
} 

if(!isset($_SESSION['logs'])){
    $_SESSION['logs'] = 0;
} 

if(!isset($_SESSION['money'])){
    $_SESSION['money'] = 500;
} 

if(!isset($_SESSION['bet_val'])){
    $_SESSION['bet_val'] = 0;
}

$timezone = date_default_timezone_set('Asia/Shanghai'); 
$time = date("m/d/Y H:i:A");
?>

<html>
	<head>
		<meta charset="utf-8">
        <title>Money Button Game</title>
        <meta name="description" content="Money Button Game - Village 88">
        <link rel="stylesheet" type="text/css" href="moneystyle.css">
	</head>
    <body>

        <div class="container">
            <h1>Your money: <?=$_SESSION['money']?> </h1>
            <h3>Chances left: <?=$_SESSION['counter']?> </h3>
            <form action='moneyprocess.php' method='POST'>
                <input type="hidden" name="action" value="reset"> 
                <div class="reset">
                    <input type="submit" name="submit" value="Reset!"> 
                </div>
            </form>

            <div class="bet">
                <h2>Low Risk</h2>
                <div class="bet_btn">
                    <form action='moneyprocess.php' method='POST'>
                        <input type="hidden" name="action" value="bet_low">
                        <input type="submit" name="farm" value="BET">
                    </form>
                </div>
                <h3>by -25 to 100</h3>   
            </div>
            <div class="bet">
                <h2>Moderate Risk</h2>
                <div class="bet_btn">
                    <form action='moneyprocess.php' method='POST'>
                        <input type="hidden" name="action" value="bet_mod">
                        <input type="submit" name="farm" value="BET">
                    </form>
                </div>
                <h3>by -100 to 1000</h3>   
            </div>
            <div class="bet">
                <h2>High Risk</h2>
                <div class="bet_btn">
                    <form action='moneyprocess.php' method='POST'>
                        <input type="hidden" name="action" value="bet_high">
                        <input type="submit" name="farm" value="BET">
                    </form>
                </div>
                <h3>by -500 to 2500</h3>   
            </div>
            <div class="bet">
                <h2>Severe Risk</h2>
                <div class="bet_btn">
                    <form action='moneyprocess.php' method='POST'>
                        <input type="hidden" name="action" value="bet_severe">
                        <input type="submit" name="farm" value="BET">
                    </form>
                </div>
                <h3>by -3000 to 5000</h3>   
            </div>

            <h3>Game Host:</h3>
            <div class="log">

<?php if($_SESSION['logs'] == 0){
?>
            <p><?= "["." ".$time." "."]"." "."Welcome to Money Button Game, risk taker! All you need to do is push buttons to try your luck. You have free 10 chances with initial money 500. Choose wisely and goodluck!" ?></p>
<?php } else { 
            if (is_array($_SESSION["mlogs"]) || is_object($_SESSION["mlogs"] ))
            {
?>
<?php           foreach($_SESSION["mlogs"] as $log){ 
                    if ($_SESSION['bet_val'] > 0){
?>                  <?= $log ?>           
<?php               } else if ($_SESSION['bet_val'] < 0) {
?>                  <?= $log ?>  
<?php               } else if ($_SESSION['counter'] == 0){
?>                      
<?php               }
                }    
            }
        }
?>
            </div>
        </div>
    </body>
</html>