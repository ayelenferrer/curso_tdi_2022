function agregarCarrito(id, nombre, precio, imagen, descripcion) {
   //limpiarCarrito() 
var datastring = localStorage.getItem('productosCarrito')??'[]';
    var cantidad = document.getElementById('cantidad'+id).value
    window.location.href = '../carrito/agregaraCarrito.php?id=' + id + '&cantidad='+ cantidad;
    /*var boton = document.getElementById('boton'+id)
    boton.style.display = "none"

    
    if (!datastring){
        datastring = '[]'
    }
    
    var data = JSON.parse(datastring)
    console.log(data)    
    
    
    
    
    
    
        var newdata = data.push({id,nombre,precio,cantidad:Number(cantidad),imagen,descripcion}) 
        localStorage.setItem('productosCarrito', JSON.stringify(data));
    */
}

function limpiarCarrito(){
    localStorage.setItem('productosCarrito',"");
}

function obtenerCantidad(id){
    return document.getElementById('cantidad'+id).value

}