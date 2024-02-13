document.getElementById('agregar').addEventListener('click', function() {
    var edad = document.getElementById('edad').value;
    var lista = document.getElementById('ingresados');    
    //validar que haya un numero en edad que sea entre 0 a 100
    if (edad == '' || isNaN(edad) || edad < 0 || edad > 100) {
        alertify.set('notifier','position', 'top-right');
        alertify.notify('Edad no válida', 'error');        
        return;
    }
    var option = document.createElement('option');
    option.value = edad;
    option.text = edad;    
    lista.appendChild(option);
    document.getElementById('edad').value = '';    
});

document.getElementById('frmedades').addEventListener('submit', function(event) {    
    var lista = document.getElementById('ingresados');
    if (lista.options.length == 0) {
        alertify.set('notifier','position', 'top-right');
        alertify.notify('Debe ingresar al menos una edad', 'error');
        event.preventDefault();
    }
});