<?php include "init.php"; ?>

<?php if(isset($_SESSION['id'])): ?>
  <?php header("location:profile.php"); ?>
  <?php endif; ?>
<?php 

if(isset($_POST['login'])){
$data = [
     'email'          => $_POST['email'],
     'password'       => $_POST['password'],
     'email_error'    => '',
     'password_error' => ''

 ];

 if(empty($data['email'])){
  $data['email_error'] = "Email is required";

 }

 if(empty($data['password'])){
  $data['password_error'] = "Password is required";
 }

 /*
     * Submit the login form
 */ 

 if(empty($data['email_error']) && empty($data['password_error'])){
  if($source->Query("SELECT * FROM usuario WHERE Email = ?", [$data['email']])){
    if($source->CountRows() > 0){
     $row = $source->Single();
     $id = $row->id;
     $db_password = $row->Contrasena;
     $name = $row->Nombre;
     $emailusuario = $row->Email;

     if(password_verify($data['password'], $db_password)){
      //AQUI PASA EL PASSGUOR

      $_SESSION["nombreUsuarioActivo"] = $name;
      $_SESSION["Contrasena"] = $db_password;
      $_SESSION['login_success'] = "Hi ". $_SESSION["nombreUsuarioActivo"]. " You have successfully logged in";
      $_SESSION["id"] = $id;
      $_SESSION["Email"] = $emailusuario;

      header("location:profile.php");

     } else {
      $data['password_error'] = "Please enter correct password";
      echo "1";

     }
    } else {
      $data['email_error'] = "Please enter correct email";
      echo "2";
    }

  }
 }

}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Login</title>
 <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
 <link rel="stylesheet" href="assets/css/style.css"> 
 <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400" rel="stylesheet"> 
 <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
 
 <div class="container">
  <div class="form">
   <div class="form-section">
    <form action="" method="POST">
      <div class="group">
        <?php 
        
        if(isset($_SESSION['account_created'])):?>
          <div class="success">
            <?php echo $_SESSION['account_created']; ?>
          </div>
        <?php endif; ?>
        <?php unset($_SESSION['account_created']); ?>

         
      </div>
     <div class="group">
      <h3 class="heading">User Login</h3>
     </div>
     <div class="group">
      <input type="email" name="email" class="control" placeholder="Enter your email.." value="<?php if(!empty($data['email'])): echo $data['email']; endif;?>">
      <div class="error">
        <?php if(!empty($data['email_error'])): ?>
          <?php echo $data['email_error']; ?>
        <?php endif; ?>
      </div>
     </div>
     <div class="group">
      <input type="password" name="password" class="control" placeholder="Enter your password..." value="<?php if(!empty($data['password'])): echo $data['password']; endif;?>">
      <div class="error">
        <?php if(!empty($data['password_error'])): ?>
          <?php echo $data['password_error']; ?>
        <?php endif; ?>
      </div>
     </div>
 
     <div class="group m20">
      <input type="submit" name="login" class="btn" value="Login &rarr;">
     </div>
     <div class="group m20">
      <a href="index.php" class="link">Create new account?</a>
     </div>
    </form>
   </div>
  </div>
 </div>


</body>
</html>