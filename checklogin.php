<?

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");
session_start();


$login = htmlspecialchars(stripslashes($_POST["email"]));
$password = htmlspecialchars(stripslashes($_POST["password"]));


$result = mysql_query("SELECT * FROM users WHERE login='$login'",$db); 
$myrow = mysql_fetch_array($result);
 if (empty($myrow['password']))
    { 
    	SmartUI::print_alert('<strong>Ошибка!</strong> Введеный Вами логин не найден.', 'warning');;
    	
    }else{
    	if ($myrow['password']==$password) 
    	{
    		echo "Успех";
    		 $_SESSION['login']=$myrow['login']; 
    		 $_SESSION['id']=$myrow['userid'];
    		 echo"<script type=\"text/javascript\"> window.location=\"index.php\";</script>";
		}else{
			SmartUI::print_alert('<strong>Ошибка!</strong> Логин и пароль не совпадают.', 'warning');;
		}
    }
?>