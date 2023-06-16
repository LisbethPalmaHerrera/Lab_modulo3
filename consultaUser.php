<!DOCTYPE html>
<html>
<head>
  <title>Botón PHP</title>
  <style>
    body {
      background-color: black;
      color: #00FF00;
      font-family: 'Courier New', Courier, monospace;
    }
    
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    th, td {
      border: 1px solid #00FF00;
      padding: 8px;
      text-align: left;
    }
    
    th {
      background-color: #000;
    }
    
    tr:nth-child(even) {
      background-color: #000;
    }
    
    tr:nth-child(odd) {
      background-color: #001100;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <button id="ejecutarBtn">Consulta los Usuarios</button>
  </br></br></br>
    <div id="contentTable"></div>
  <script>
    $(document).ready(function() {
      $("#ejecutarBtn").click(function() {
        $.ajax({
          url: "dataUsers.php",
          type: "POST",
          success: function(response) {
            // Manejar la respuesta del servidor aquí
            //alert(response);
            //console.log(response);
            var table = "<table>";
            table += "<thead><tr><th>ID</th><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Email</th><th>Usuario</th><th>Contraseña</th></tr></thead>";
            table += "<tbody>";
            
            for (var i = 0; i < response.length; i++) {
            table += "<tr>";
            table += "<td>" + response[i].id + "</td>";
            table += "<td>" + response[i].nombre + "</td>";
            table += "<td>" + response[i].apellido1 + "</td>";
            table += "<td>" + response[i].apellido2 + "</td>";
            table += "<td>" + response[i].email + "</td>";
            table += "<td>" + response[i].user + "</td>";
            //table += "<td>" + response[i].password + "</td>";
            table += "<td>**********</td>";
            table += "</tr>";
            }

            table += "</tbody></table>";

            // Insertar la tabla en la div "dataTable"
            $("#contentTable").html(table);
            //$("#contentTable").html(response);
            
          }
        });
      });
    });
  </script>
</body>
</html>
