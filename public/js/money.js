function getMoney(texto){
    
    var compativelComParseFloat = texto.replace("R$ ","");
    compativelComParseFloat = compativelComParseFloat.replace(",",".");
    var valor = parseFloat(compativelComParseFloat);
    return valor;
}

function formatReal(numero){
    
    var temp = parseFloat(numero).toFixed(2);
    temp = temp.split('.');
    temp[0] = "R$ " + temp[0].split(/(?=(?:...)*$)/).join('.');
    return temp.join(',');
}