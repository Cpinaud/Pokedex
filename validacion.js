document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
  });
  
  function validarFormulario(evento) {
    evento.preventDefault();
    var codigo = document.getElementById('codigo').value;
    
    if(isNaN(codigo)) {
      alert('El código debe ser numérico');
      return;
    }
    if(!!document.getElementById("newCodigo")){
      var newCodigo = document.getElementById('newCodigo').value;
      if(isNaN(newCodigo)) {
        alert('El código debe ser numérico');
        return;
      }
    }
   
    var name = document.getElementById('name').value;
    if(name.length>20) {
        alert('El nombre no puede tener mas de 20 caracteres');
        return;
      }
    this.submit();
  }



 
    