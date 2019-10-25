<?php 
include "init.php";
include "usuarioRegistrado.php";
if(isset($_SESSION['id'])){//para verificar si hay una sesión nula o no
  header("location:profile.php");
}
$usuarioR = new usuarioRegistrado();
if(isset($_POST['signup'])){
   
   $usuarioR->name = $_POST['full_name'];
   $data = [
       'name'            => $_POST['full_name'],
       'email'            => $_POST['email'],
       'password'         => $_POST['password'],
       'nickname'         => $_POST['nickname'],
       'Apellido1'         => $_POST['Apellido1'],
       'Apellido2'         => $_POST['Apellido2'],
       'telefono'         => $_POST['telefono'],

       'confirm_password' => $_POST['confirm'],
       'name_error'       => '',
       'email_error'      => '',
       'password_error'   => '',
       'Apellido1_error'  => '',
       'Apellido2_error'  => '',
       'nickname_error'   => '',
       'telefono_error'   => '',
       'confirm_error'    => ''


   ];
   

   /*
        * Name validation
   */ 
   if(empty($data['name'])){
    $data['name_error'] = "Name is required";
   } 

   if(empty($data['Apellido1'])){
    $data['Apellido1_error'] = "First last name is required";
   } 
   if(empty($data['Apellido2'])){
    $data['Apellido2_error'] = "Second last name is required";
   } 
   if(empty($data['nickname'])){
    $data['nickname_error'] = "User is required";
   }   

   /*
       * Email validation
   */ 
   if(empty($data['email'])){
    $data['email_error'] = "Your email is required";
   } else {
    if($source->Query("SELECT * FROM users WHERE email = ?", [$data['email']])){
      if($source->CountRows() > 0 ){
        $data['email_error'] = "Sorry email already exist";
      }
    }
   }

   /*
        * Password validations
   */ 

   if(empty($data['password'])){
      $data['password_error'] = "Password is required";
   } else if(strlen($data['password']) < 5){
      $data['password_error'] = "That password was too short";
   }
   if(empty($data['telefono'])){
      $data['telefono_error'] = "Phone number is required";
   } else if(strlen($data['password']) < 8){
      $data['telefono_error'] = "Hey, that's not a valid phone number";
   }

   /*
       * Confirm password validations
   */ 

   if(empty($data['confirm_password'])){

    $data['confirm_error'] = "Please confirm your password";

   } else if($data['password'] != $data['confirm_password']){
    $data['confirm_error'] = "Password did not match";
   }

   /*
        * Submit the form
   */ 

   if(empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_error'])){
     $password = password_hash($data['password'], PASSWORD_DEFAULT);
     if($source->Query("INSERT INTO usuario(Nombre,Apellido1,Apellido2,Nickname,Contrasena,Email,Celular ) VALUES (?,?,?,?,?,?,?)", [$usuarioR->name, $data ['Apellido1'], $data ['Apellido2'],$data ['nickname'], $password, $data ['email'],$data ['telefono']])){
     $_SESSION['account_created'] = "Your account is successfully created";
    header("location:login.php");
     }

   }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Sing Up</title>
 <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
 <link rel="stylesheet" href="assets/css/style.css"> 
 <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400" rel="stylesheet"> 
 <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</head>
<body>
 
 <div class="container">
  <div class="form">
   <div class="form-section">
    <form action="" method="POST">
     <div class="group">
      <h1 class="heading">Create account</h1>
     </div>
     <div class="group">
      <input type="text" name="full_name" class="control" placeholder="Enter your name..." value="<?php if(!empty($data['name'])): echo $data['name']; endif;?>">
      <div class="error">
        <?php if(!empty($data['name_error'])): ?>
          <?php echo $data['name_error']; ?>
        <?php endif; ?>
      </div>
     </div>
     <div class="group">
      <input type="text" name="Apellido1" class="control" placeholder="Enter your first last name..." value="<?php if(!empty($data['Apellido1'])): echo $data['Apellido1']; endif; ?>">
      <div class="error">
        <?php if(!empty($data['Apellido1_error'])): ?>
          <?php echo $data['Apellido1_error']; ?>
        <?php endif; ?>
      </div>
     </div>
     <div class="group">
      <input type="text" name="Apellido2" class="control" placeholder="Enter your second last name..." value="<?php if(!empty($data['Apellido2'])): echo $data['Apellido2']; endif; ?>">
      <div class="error">
        <?php if(!empty($data['Apellido2_error'])): ?>
          <?php echo $data['Apellido2_error']; ?>
        <?php endif; ?>
      </div>
     </div>    
     <div class="group">
      <input type="text" name="nickname" class="control" placeholder="Create your user..." value="<?php if(!empty($data['nickname'])): echo $data['nickname']; endif; ?>">
      <div class="error">
        <?php if(!empty($data['nickname_error'])): ?>
          <?php echo $data['nickname_error']; ?>
        <?php endif; ?>
      </div>
     </div>
     <div class="group">
      <input type="password" name="password" class="control" placeholder="Create your password..." value="<?php if(!empty($data['password'])): echo $data['password']; endif; ?>">
      <div class="error">
        <?php if(!empty($data['password_error'])): ?>
          <?php echo $data['password_error']; ?>
        <?php endif; ?>
      </div>
     </div>
     <div class="group">
      <input type="password" name="confirm" class="control" placeholder="Confirm your password..." value="<?php if(!empty($data['confirm_password'])): echo $data['confirm_password']; endif; ?>">
      <div class="error">
        <?php if(!empty($data['confirm_error'])): ?>
          <?php echo $data['confirm_error']; ?>
        <?php endif; ?>
      </div>
     </div>
     <div class="group">
      <input type="email" name="email" class="control" placeholder="Enter your email..." value="<?php if(!empty($data['email'])): echo $data['email']; endif; ?>">
      <div class="error">
        <?php if(!empty($data['email_error'])): ?>
          <?php echo $data['email_error']; ?>
        <?php endif; ?>
      </div>
    </div>          
     <div class="group">
      <input type="int" name="telefono" class="control" placeholder="Enter a phone number..." value="<?php if(!empty($data['telefono'])): echo $data['telefono']; endif; ?>">
      <div class="error">
        <?php if(!empty($data['telefono_error'])): ?>
          <?php echo $data['telefono_error']; ?>
        <?php endif; ?>
      </div>
     </div>
     
     <div class="group m20">
      <input type="submit" name="signup" class="btn" value="Create account &rarr;">
     </div>
     <div class="group m20">
      <a href="login.php" class="link">Already have an account ?</a>
     </div>
    </form>
   </div>
  </div>
 </div>


</body>
</html>