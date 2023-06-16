
<!--<!DOCTYPE html>
<html>
    <head>
        <title>Proyecto Bjob</title>
        <meta name="Bjob" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="/cursoSQL/style.css" type="text/css">
        <script type="text/javascript" src="/index.js"></script>
    </head>
    <body>
            onsubmit="submitFunction()"
            <form class="form" method="POST" action="" id="formulario"> 
                <h2 id="tituloForm" >Formulario de registro</h2>
                <output>Nombre :</output>
                <div class="container_input">
                    <input name="inputName" type="text" placeholder="Nombre" style="background-color: white;width: 90%;" required ><em>(requerido)</em>
                </div>

                <output>Apellido :</output>
                <div class="container_input">
                    <input name="inputapellido" type="text" placeholder="Nombre" style="background-color: white;width: 90%;" required ><em>(requerido)</em>
                </div>

                 <output>Email :</output>
                 <div class="container_input">
                    <input name="inputEmail" type="email" placeholder="lisbeth@example.com" style="background-color: white;width: 90%;" required/><em>(requerido)</em>
                </div>
                
                <center> <input type="submit" value="Enviar" /></center>
            </form>
    </body>
</html>-->
<?php
class Usuario{
    
    private $name;
    private $surname1;
    private $surname2;
    private $mail;
    private $user;
    private $pass;

    //seters
    public function setName($name){
        $this->name = $name;
    }
    public function setUser($user){
        $this->user = $user;
    }
    public function setPass($pass){
        $this->pass = $pass;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function setSurname1($surname1){
        $this->surname1 = $surname1;
    }
    public function setSurname2($surname2){
        $this->surname2 = $surname2;
    }
    //geters
    public function getName(){
        return $this->name;
    }
    public function getUser(){
        return $this->user;
    }
    public function getPass(){
        return $this->pass;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getSurname1(){
        return $this->surname1;
    }
    public function getSurname2(){
        return $this->surname2;
    }

}
if($_POST){
    $usuario= new Usuario();
    //conexion PDO 
    $servername = "localhost";
    $username="root";
    $password="";
    $dbname="cursosql";
    //echo '<script>alert("Mensaje de alerta 1");</script>';
    // create conexion 
    $conn =new mysqli($servername, $username, $password, $dbname);
    // check conexion 
    if($conn -> connect_error){
        die("conection failed:". $conn->connect_error);
    }
    // prevenir queryinjection 
    /*$usuario->setName(htmlentities($_POST['imputName'],ENT_QUOTES));
    $usuario->setSurname1(htmlentities($_POST['inputFirstSurname'],ENT_QUOTES));
    $usuario->setSurname2(htmlentities($_POST['inputSecondSurname'],ENT_QUOTES));
    $usuario->setMail(htmlentities($_POST['imputEmail'],ENT_QUOTES));
    $usuario->setUser(htmlentities($_POST['login'],ENT_QUOTES));
    $usuario->setPass(htmlentities($_POST['inputClave1'],ENT_QUOTES));
    */
    if(validaruser($usuario)!=0){
        //validaruser($usuario);
    //echo '<pre>'; print_r($usuario); die;
        if(buscarUsuario($usuario->getMail(),$conn)){
        //$crud->insertar($usuario);
            insertarUser($usuario,$conn);
            echo '<script>alert("Registro completado con éxito");
                window.location.href = "consultaUser.php";
                </script>';
                //sleep(2);
                //header('Location: consultaUser.php');
                exit;
        }else{
            echo '<script>alert("USUARIO EXISTENTE!, Pruebe con otro email");
                window.location.href = "index.html";
                </script>';
            //echo '<pre>'; print_r($usuario); die();
            //header('Location: index.html');
        }

    }else{
        echo "<script>
            alert('Error al validar los campos!');
            window.location.href = 'index.html';
            </script>";

            //echo '<pre>'; print_r($usuario); die();
        //header('Location: index.html'); 
    }

    /*
    $nombre = $_POST['imputName'];
    $apellido = $_POST['inputFirstSurname'];
    $apellido_2 = $_POST['inputSecondSurname'];
    $email = $_POST['imputEmail']; 
    $user =$_POST['login'];
    $pass=$_POST['inputClave1'];
    
    // comprobar valores recibidos

    echo '<pre>'; print_r($usuario); die();
    //conexion PDO 
    $servername = "localhost";
    $username="root";
    $password="";
    $dbname="cursosql";
    echo '<script>alert("Mensaje de alerta 1");</script>';
    // create conexion 
    $conn =new mysqli($servername, $username, $password, $dbname);
    // check conexion 
    if($conn -> connect_error){
        die("conection failed:". $conn->connect_error);
    }

    
    
    //consulta del email en BBDD 
    //SELECT * FROM `usuarios` WHERE `email`='maximart27@gmail.com';
    $sql = "SELECT * FROM `usuarios` WHERE  `email`=?";  
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Prepare failed: " . $conn->error;
        exit;
    }
    //$result =$conn-> query($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        // Loop through the result set
        //$row = $result->fetch_assoc();
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        echo '<pre>';
        var_dump(count($rows));
        echo '</pre>';

        echo '<script>alert("Mensaje de alerta2");</script>';
        if(count($rows)==0){
            // insert values
            $sql_insert ="INSERT INTO usuarios(`nombre`, `apellido1`, `apellido2`, `email`, `user`, `password`) VALUES ('$nombre','$apellido','$apellido_2','$email','$user','$pass')";
            //$stmt = $conn->prepare($sql);
            //$stmt->execute();
            //$response = $stmt->get_result();
            $respuesta_insert =$conn-> query($sql_insert);

            if($respuesta_insert) {
                echo 'Registro completado con éxito'; 
                header('Location: consultaUser.php'); 
                exit;
            }else{
                echo "Error:" . $sql_insert . "</br>" . $conn -> error;
                 
            }
        }else {
            // Redireccion a consultar usuarios
            echo '<script>alert("Mensaje de alerta");</script>';
            die;
            header('Location: index.html'); 
            exit;
        }

        foreach ($rows as $row) {
            /*$column1 = $row['nombre'];
            $column2 = $row['apellido1'];
            $column3 = $row['apellido2'];
            $column4 = $row['email'];
            $column5 = $row['user'];

            echo "Column 1: " . $column1 . "<br>";
            echo "Column 2: " . $column2 . "<br>";
            echo "Column 3: " . $column3 . "<br>";
            echo "Column 4: " . $column4 . "<br>";
            echo "Column 5: " . $column5 . "<br>";
        }
    } else {
        echo "Query failed: " . $conn->error;
    }
    echo '<pre>';
    var_dump($result);
    echo '</pre>';
    die();
    $sql ="INSERT INTO usuario (nombre, apellido, email) VALUES ('$nombre','$apellido','$email')";
    
    if($conn-> query($sql) === TRUE) {
        echo "se ha insertado correctamente";
    }else {
        echo "Error:" . $sql . "</br>" . $conn -> error;
    }*/

    $stmt->close();
    $conn-> close();
}

function validaruser($usuario){ 

    //$pattern = '/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/';
    $patter_name = '/^[a-zA-Z\s]*$/';
    
    $patter_user ='/^[a-zA-Z0-9._%+-]*$/';
    
    //echo ($_POST['imputName']);
    if(empty($_POST['imputName'])){
        $booleaName= false;
    }elseif (preg_match($patter_name,$_POST['imputName'])) {
        $usuario->setName(validate_input($_POST['imputName']));
        $booleaName= true;
        //echo '<script>alert("valido el usuario")</script>';
    }else{
        $booleaName= false;
        //echo '<script>alert("usuario false")</script>';
    }

    if(empty($_POST['inputFirstSurname'])){
        $booleaSurname1= false;
    }elseif (preg_match($patter_name,$_POST['inputFirstSurname'])) {
        $usuario->setSurname1(validate_input($_POST['inputFirstSurname']));
        $booleaSurname1= true;
        //echo '<script>alert("valido el usuario")</script>';
    }else{
        $booleaSurname1= false;
        //echo '<script>alert("usuario false")</script>';
    }

    if(empty($_POST['inputSecondSurname'])){
        $booleaSurname2= false;
    }elseif (preg_match($patter_name,$_POST['inputSecondSurname'])) {
        $usuario->setSurname2(validate_input($_POST['inputSecondSurname']));
        $booleaSurname2= true;
        //echo '<script>alert("valido el usuario")</script>';
    }else{
        $booleaSurname2= false;
        //echo '<script>alert("usuario false")</script>';
    }

    if(empty($_POST['imputEmail'])){
        $booleaEmail= false;
    }elseif (filter_var($_POST['imputEmail'],FILTER_VALIDATE_EMAIL)){
    $usuario->setMail(validate_input($_POST['imputEmail']));
        $booleaEmail=true;
        //echo '<script>alert("valido el email")</script>';
    }else{
        $booleaEmail=false;

    }

    if(empty($_POST['login'])){
        $booleaUser= false;
    }elseif (preg_match($patter_user,$_POST['login'])) {
        $usuario->setUser(validate_input($_POST['login']));
        $booleaUser= true;
        //echo '<script>alert("valido el usuario")</script>';
    }else{
        $booleaUser= false;
        //echo '<script>alert("usuario false")</script>';
    }
    

    if(empty($_POST['inputClave1'])){
        
        $booleaPass= false;
    }elseif (strlen($_POST['inputClave1'])>=4 && strlen($_POST['inputClave1'])<=8 ) {
        
        $usuario->setPass(validate_input($_POST['inputClave1']));
        $booleaPass= true;
        //echo '<script>alert("valido el usuario")</script>';
    }else{
        
        $booleaPass= false;
        //echo '<script>alert("usuario false")</script>';
    }

    if($booleaName==true && $booleaEmail==true && $booleaSurname1==true && $booleaSurname2==true && $booleaUser==true && $booleaPass==true){
        echo '<script>alert("validacion de campos introducido correcto");</script>';
			return 1;
    }else{
        echo '<script>alert("error en la validacion de campos introducos");</script>';
        //echo "Name = ".$booleaName." email = ".$booleaEmail." ap1= ".$booleaSurname1." ap2=".$booleaSurname2." booleaUser= ".$booleaUser. "  booleaPass= ".$booleaPass;
        return 0;
    }

}

function validate_input($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}

function buscarUsuario($value_email,$data_conn){

    $sql = "SELECT * FROM `usuarios` WHERE  `email`=?";  
    $stmt = $data_conn->prepare($sql);
    if (!$stmt) {
        echo "Prepare failed: " . $data_conn->error;
        exit;
    }
    //$result =$conn-> query($sql);
    $stmt->bind_param("s", $value_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        // Loop through the result set
        //$row = $result->fetch_assoc();
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        

        //echo '<script>alert("Mensaje de alerta2");</script>';
        if(count($rows)==0){
            return true;
        }else{
            return false;
        }

    }
}
function insertarUser($usuario,$data_conn){
    $nombre = $usuario->getName();
    $apellido = $usuario->getSurname1();
    $apellido_2 =$usuario->getSurname2();
    $email =$usuario-> getMail();
    $user = $usuario->getUser();
    $pass = $usuario->getPass();
    $sql_insert ="INSERT INTO usuarios(`nombre`, `apellido1`, `apellido2`, `email`, `user`, `password`) VALUES ('$nombre','$apellido','$apellido_2','$email','$user','$pass')";
            //$stmt = $conn->prepare($sql);
            //$stmt->execute();
            //$response = $stmt->get_result();
            $respuesta_insert =$data_conn-> query($sql_insert);

            if($respuesta_insert) {
                echo 'Registro completado con éxito'; 
                //echo '<script>alert("se ha insertado correctamente");</script>';
                //header('Location: consultaUser.php'); 
                //exit;
            }else{
                echo "Error:" . $sql_insert . "</br>" . $data_conn -> error;
            }
}
?>