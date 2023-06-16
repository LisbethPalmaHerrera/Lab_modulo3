<?php   
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
    $sql = "SELECT * FROM `usuarios`";  
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Prepare failed: " . $conn->error;
        exit;
    }
    //$result =$conn-> query($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        // Loop through the result set
        //$row = $result->fetch_assoc();
        
        //echo '<pre>'; print_r($datos_consulta); //die();
        header('Content-Type: application/json');
        
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
        //print_r($rows); //die();
        //echo $rows;

    }

?>