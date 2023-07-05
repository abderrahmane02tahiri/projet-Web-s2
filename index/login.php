<?php 
      $pdo=new PDO("mysql:host=localhost;dbname=organisation","root","");
     if(isset($_POST["ok"])){
      $pass=md5($_POST['password']);
      $login=$_POST['email'];
      $ins= $pdo->query("SELECT * from etudiant where login= '$login' and pass ='$pass'");
      $ins->setFetchMode(PDO::FETCH_ASSOC);
      $tab = $ins->fetchAll();
      if ($ins->rowCount() == 0) {
            echo'ce compte n`existe plus';
        }
      else{   
          session_start();
          $_SESSION['id']=$tab[0]['ID_ETUDIANT'];
        header ('location: profile.php');
      }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../New_folder/css/login.css" />
    <title>login</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="title">login</div>
      <form action="#" method='post'>
        <div class="field">
          <input type="text" name="email" id="email" required />
          <label for="email">Adresse Email </label>
        </div>
        <div class="field">
          <input type="password" name="password" id="password" required />
          <label for="password">Mot de passe</label>
        </div>
        <div class="content">

        </div>
        <div class="field">
          <input type="submit" value="Login" name="ok" />
        </div>

          </div>
        </div>
      </form>
    </div>
  </body>

</html>
