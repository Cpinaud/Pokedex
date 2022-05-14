function validar(){

    /*creo una variable de tipo booleano que en principio tendrá un valor true(verdadero),
    y que se convertirá en false(falso) cuando la condición no se cumpla*/
    var todo_correcto = true;
    
    /*El primer campo a comprobar es el del nombre. Lo traemos por id y verificamos
    la condición, en este caso, por ejemplo, le decimos que tiene que tener más de dos dígitos
    para que sea un nombre válido. Si no tiene más de dos dígitos, la variable todo_correcto
    devolverá false.*/
    
    if(document.getElementById('codigo').value.length > 6 ||  isNaN(document.getElementById('codigo').value)){
        todo_correcto = false;
    }
    
    
    
    
    }