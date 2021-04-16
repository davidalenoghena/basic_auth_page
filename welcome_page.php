<html>
<head>
<title>Form to Team Helsinki</title>
</head>
<body>
<?php
//include('config.php');
$user = $_GET["name"];
$email = $_GET["email"];
$password = $_GET["password"];
//print("<b>Thank You!</b><br />Your information has been added! You can see it by <a href=savedinfo.php>Clicking Here</a>");
$out = fopen("saveinfo.csv", "a");
if (!$out) {
print("Could not append to file");
exit;
}
else {
    fwrite($out, nl2br("$user,$email,$password"."\n"));
    fclose($out);
    echo($user.nl2br(", you are welcome to Team Helsinki \n"));
    echo("Please proceed to the login page by <a href=login_page.php>Clicking Here</a>");
}

?>
</body>
</html>