<?php
use PHPMailer\PHPMailer\PHPMailer;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8" />
</head>
<body>
<form action="" method="post">
    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" placeholder="vul je naam in"><br>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="vul je email in"><br>
    <label for="onderwerp">Onderwerp</label>
    <input type="text" id="onderwerp" name="onderwerp" placeholder="onderwerp"><br>
    <p>Je klacht</p>
    <textarea name="klacht" id="klacht" rows="4"></textarea><br>
    <input type="submit" value="submit">
</form>
</body>
</html>
<?php
require '../vendor/autoload.php';
if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $naam = $_POST['naam'];
    $onderwerp = $_POST['onderwerp'];
    $klacht = $_POST['klacht'];

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $mail->Subject = $onderwerp;
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = '5e4ffb3e0f58b9';
    $mail->Password = 'c504e41922f2d7';
    $mail->isHTML(true);
    $mail->From = "itskoenwonders@gmail.com";
    $mail->FromName = "support";

    $mail->msgHTML($klacht);
    $mail->addAddress($email);
    $mail->AddCC("info@koenwonders.nl");
    if (!$mail->send()) {
        echo "mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Mail is gestuurd!";
    }
} ?>