<?php
if (isset($_POST['submit'])) {
    $accepted = 0;
$email = $_POST['email'];
$newpassword = $_POST['password'];
$open = fopen("saveinfo.csv","r");
while(!feof($open)) {
    $check = fgetcsv($open);
    if ($check[1] == $email){
        $user = $check[0];
        $accepted = 1;
        print(nl2br("Password changed successfully\n"));
        print(nl2br("Return to the login page by <a href=login_page.php>Clicking Here</a>\n"));
    break;
    }
}
if ($accepted == 0){
print(nl2br("You are not registered\n"));
print(nl2br("Return to the registration page by <a href=register_page.php>Clicking Here</a>\n"));}

//fwrite($open, nl2br("$user,$email,$newpassword"."\n"));
fclose($open);
if ($accepted == 1) {
    $open = fopen("saveinfo.csv","a");
fwrite($open, nl2br("$user,$email,$newpassword"."\n"));
fclose($open);
}
}
?>
<html>
<body>
<form name="input" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']?>">
<p><label for="email">Email </label>
<input type="text" name="email" id="email" /></p>
<p><label for="password">New Password </label>
<input type="password" name="password" id="password" />
<p><input type="reset" name="reset" value="reset" /> 
<input type="submit" name="submit" value="submit" /></p>
</form>
</body>
</html>