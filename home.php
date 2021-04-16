<html>
<head>
<title>Team Helsinki</title>
</head>
<body>
<?php
    $accepted = 0;
    $email = $_GET["email"];
    $password = $_GET["password"];

    $open = fopen("saveinfo.csv", "r") or die("Unable to open file!");
    while(!feof($open)) {
        $check = fgetcsv($open);
        if ($check[1] == $email){
            if ($check[2] == $password ){
                $accepted = 1;
                print(nl2br("You've successfully logged in\n"));
                print(nl2br("Donate to my account by <a href=donation.php>Clicking Here</a>\n"));
            }
            else{
                print(nl2br("Please input correct password\n"));
                print(nl2br("Return to the login page by <a href=login_page.php>Clicking Here</a>\n"));
                print(nl2br("<a href=password_reset.php>Click Here</a> if you've forgotten your password\n"));
                break;
            }
        }
        if ($accepted == 0){
            print(nl2br("You are not registered\n"));
            print(nl2br("Return to the registration page by <a href=register_page.php>Clicking Here</a>\n"));
        }
    }
    
    fclose($open);
?>
</body>
</html>