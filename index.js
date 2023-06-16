//var mailInput = document.querySelector('#inputEmail');
var pattern = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
var patter_name = /^[a-zA-Z\s]*$/;
var patter_user =/^[a-zA-Z0-9._%+-]*$/
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("formulario").addEventListener('submit', validarFormulario); 
});
/*mailInput.addEventListener('input', function(event) {

  console.log("entro en el evento");
  if (pattern.test(event.target.value)) {
      mailInput.style.setProperty('border','1px solid green','important');
  } else {
      // Mostrar la foto que muestra que el correo no es válido
      mailInput.style.setProperty('border','1px solid red','important');
  }
});*/

// Comprobar el campo de nombre 
setTimeout(function(){
  
  document.getElementById("inputName").addEventListener('keyup',function(e){
    let popupFoto = document.getElementById("img1");
    if (patter_name.test(e.target.value)) {
        document.getElementById("inputName").style.setProperty('border','5px solid green','important');
        popupFoto.src='/cursoSQL/imagenes/success-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    } else {
        // Mostrar la foto que muestra que el correo no es válido
        document.getElementById("inputName").style.setProperty('border','2px solid red','important');
        popupFoto.src='/cursoSQL/imagenes/error-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    }
    
    if(""==e.target.value){
        document.getElementById("inputName").style.setProperty('border','2px solid red','important');
        document.getElementById("inputName").style.setProperty('border','2px solid red','important');
        popupFoto.src='/cursoSQL/imagenes/error-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    }
    
  });
}, 1);	

setTimeout(function(){
  
  document.getElementById("inputFirstSurname").addEventListener('keyup',function(e){
    let popupFoto = document.getElementById("img5");
    if (patter_name.test(e.target.value)) {
        document.getElementById("inputFirstSurname").style.setProperty('border','5px solid green','important');
        popupFoto.src='/cursoSQL/imagenes/success-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    } else {
        // Mostrar la foto que muestra que el correo no es válido
        document.getElementById("inputFirstSurname").style.setProperty('border','2px solid red','important');
        popupFoto.src='/cursoSQL/imagenes/error-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    }
    
    if(""==e.target.value){
        document.getElementById("inputFirstSurname").style.setProperty('border','2px solid red','important');
        //document.getElementById("inputFirstSurname").style.setProperty('border','2px solid red','important');
        popupFoto.src='/cursoSQL/imagenes/error-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    }
    
  });
}, 1);

setTimeout(function(){
  
  document.getElementById("inputSecondSurname").addEventListener('keyup',function(e){
    let popupFoto = document.getElementById("img6");
    if (patter_name.test(e.target.value)) {
        document.getElementById("inputSecondSurname").style.setProperty('border','5px solid green','important');
        popupFoto.src='/cursoSQL/imagenes/success-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    } else {
        // Mostrar la foto que muestra que el correo no es válido
        document.getElementById("inputSecondSurname").style.setProperty('border','2px solid red','important');
        popupFoto.src='/cursoSQL/imagenes/error-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    }
    
    if(""==e.target.value){
        document.getElementById("inputSecondSurname").style.setProperty('border','2px solid red','important');
        //document.getElementById("inputFirstSurname").style.setProperty('border','2px solid red','important');
        popupFoto.src='/cursoSQL/imagenes/error-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    }
    
  });
}, 1);

// Comprobar el campo de email
setTimeout(function(){
  let popupFoto = document.getElementById("img2");
  document.getElementById("inputEmail").addEventListener('keyup',function(e){
    //console.log("evento del email");
    if (pattern.test(e.target.value)) {
        document.getElementById("inputEmail").style.setProperty('border','5px solid green','important');
        popupFoto.src='/cursoSQL/imagenes/success-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    } else {
        // Mostrar la foto que muestra que el correo no es válido
        document.getElementById("inputEmail").style.setProperty('border','2px solid red','important');
        //popupFoto.src='cursoSQl/imagenes/error-icon.svg';
        popupFoto.src='/cursoSQL/imagenes/error-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    }
  });
}, 1);

// Comprobar Login
setTimeout(function(){
  
  document.getElementById("inputLogin").addEventListener('keyup',function(e){
    let popupFoto = document.getElementById("img7");
    if (patter_user.test(e.target.value)) {
        document.getElementById("inputLogin").style.setProperty('border','5px solid green','important');
        popupFoto.src='/cursoSQL/imagenes/success-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";s
    } else {
        // Mostrar la foto que muestra que el correo no es válido
        document.getElementById("inputLogin").style.setProperty('border','2px solid red','important');
        popupFoto.src='/cursoSQL/imagenes/error-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    }
    
    if(""==e.target.value){
        document.getElementById("inputLogin").style.setProperty('border','2px solid red','important');
        //document.getElementById("inputFirstSurname").style.setProperty('border','2px solid red','important');
        popupFoto.src='/cursoSQL/imagenes/error-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    }
    
  });
}, 1);
// Comprobar el campo de clave
setTimeout(function(){
  let popupFoto = document.getElementById("img3");
  document.getElementById("inputClave1").addEventListener('keyup',function(e){
    //console.log("evento del email");
    if (e.target.value.length<=8 &&e.target.value.length>=4) {
        document.getElementById("inputClave1").style.setProperty('border','5px solid green','important');
        popupFoto.src='/cursoSQl/imagenes/success-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    } else {
        // Mostrar la foto que muestra que el correo no es válido
        document.getElementById("inputClave1").style.setProperty('border','2px solid red','important');
        popupFoto.src='/cursoSQl/imagenes/error-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    }
  });
}, 1);

//keypress
setTimeout(function(){
  let popupFoto = document.getElementById("img4");
  document.getElementById("inputClave2").addEventListener('keyup',function(e){
    let clave = document.querySelector("#inputClave1");
    // console.log("evento clave 2"+ clave.value);
    // console.log(e.target.value);
    if (clave.value==e.target.value) {
      document.getElementById("inputClave2").style.setProperty('border','5px solid green','important');
      popupFoto.src='/cursoSQl/imagenes/success-icon.svg';
      popupFoto.style.width="20px";
      popupFoto.style.height="20px";
      popupFoto.style.margin="auto";
    } else {
        // Mostrar la foto que muestra que el correo no es válido
        document.getElementById("inputClave2").style.setProperty('border','2px solid red','important');
        popupFoto.src='/cursoSQl/imagenes/error-icon.svg';
        popupFoto.style.width="20px";
        popupFoto.style.height="20px";
        popupFoto.style.margin="auto";
    }
  });
}, 1);
	


function validarFormulario(evento){
  
    evento.preventDefault();
    const thirdInput = document.querySelector("#inputClave1");
    const fourthInput = document.querySelector("#inputClave2");

    if (thirdInput.value==fourthInput.value) {
      //alert("Se ha enviado correctamente la solicitud");
    }else{
      alert("Las contraseñas no son iguales, introduzaca de nuevo sus valores");
      return;
    }
   
    this.submit();
}