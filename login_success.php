<?php
session_start();
if( isset($_SESSION['myusername']) )
{header("location:mainPage.php");
}


?>

<html>
<body>
Login Successful

</body>
</html>