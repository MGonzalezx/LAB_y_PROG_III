

<!DOCTYPE HTML>  
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

/*Martin Gonzalez
Aplicación No 20 (Registro CSV)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario

include "usuario.php";

echo "<br> Creo los usuarios <br><br>";
$usuarioUno = new Usuario("Juan","juan123","juan@gmail.com");
$usuarioDos = new Usuario("Fede","fede456","fede@hotmail.com");





*/ 
// define variables and set to empty values
$nombreErr = $emailErr = $contraseniaErr= "";
$nombre = $email = $contrasenia = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nombre"])) {
    $nombreErr = "Nombre is required";
  } else {
    $nombre = test_input($_POST["nombre"]);
    // check if nombre only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre)) {
      $nombreErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["contrasenia"])) {
    $contraseniaErr = "Contrasenia is required";
  } else {
    $contrasenia = test_input($_POST["contrasenia"]);
    // check if contrasenia address is well-formed
    if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$contrasenia)) {
      $contraseniaErr = "Invalid contrasenia format";
    }
  }
    
}

/**Validate Form Data With PHP
The first thing we will do is to pass all variables through PHP's htmlspecialchars() function.

When we use the htmlspecialchars() function; then if a user tries to submit the following in a text field:

<script>location.href('http://www.hacked.com')</script>

- this would not be executed, because it would be saved as HTML escaped code, like this:

&lt;script&gt;location.href('http://www.hacked.com')&lt;/script&gt;

The code is now safe to be displayed on a page or inside an e-mail.

We will also do two more things when the user submits the form:

Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
Remove backslashes (\) from the user input data (with the PHP stripslashes() function)
The next step is to create a function that will do all the checking for us (which is much more convenient than writing the same code over and over again).

We will name the function test_input().

Now, we can check each $_POST variable with the test_input() function, and the script looks like this: */
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nombre: <input type="text" name="nombre">
  <span class="error">* <?php echo $nombreErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Contraseña: <input type="password"  name="contrasenia">
  <span class="error">* <?php echo $contraseniaErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php

include "usuario.php";
$miUsuario = new Usuario($nombre,$contrasenia,$email);

/*echo "<h2>Your Input:</h2>";
echo "Nombre: ".$nombre;
echo "<br>";
echo "E-mail: ". $email;
echo "<br>";
echo "Contraseña: ".$contrasenia;
echo "<br>";*/




echo PHP_EOL.$_POST['nombre'].' '.$_POST['email']. ' '. $_POST['contrasenia'] . PHP_EOL;

Usuario::Alta($miUsuario);


?>

</body>
</html>







