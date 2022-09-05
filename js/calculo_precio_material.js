function calcular() {

    var peso = $.ajax({
        url: 'actualizar_valor.php',
        dataType: 'text',
        async: false
    }).responseText;



    var test = document.getElementById('material');
    var option = parseFloat(test.value);

    var valor = Math.floor(peso) * option;
    var final = (valor / 1000).toFixed(2);

    document.getElementById('precio_total').value = final + " $";
    
    // document.getElementById("calculo_peso").innerHTML = valor;
}