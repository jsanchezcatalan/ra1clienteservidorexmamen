<?php

header('Access-Control-Allow-Origin: *');

$productos = [
    [
        "id" => 1,
        "nombre" => "Camiseta básica",
        "descripcion" => "Camiseta de algodón 100% en varios colores.",
        "precio" => 12.99,
        "imgen" => "https://www.shutterstock.com/image-vector/white-tshirt-mockup-front-back-600nw-2550865929.jpg",
        "categoria" => "camisetas"
    ],
    [
        "id" => 2,
        "nombre" => "Pantalón vaquero",
        "descripcion" => "Pantalón de mezclilla azul clásico.",
        "precio" => 29.95,
        "imgen" => "https://m.media-amazon.com/images/I/61VCrxLgH4L._UY1000_.jpg",
        "categoria" => "pantalones"
    ],
    [
        "id" => 3,
        "nombre" => "Zapatillas correr",
        "descripcion" => "Zapatillas ligeras y cómodas para el día a día.",
        "precio" => 45.50,
        "imgen" => "https://img.freepik.com/foto-gratis/nuevas-zapatillas-negras-aisladas-sobre-fondo-blanco_93675-135051.jpg",
    ],
    [
        "id" => 4,
        "nombre" => "sudadera con capucha",
        "descripcion" => "Sudadera cómoda con capucha.",
        "precio" => 60.50,
        "imgen" => "https://m.media-amazon.com/images/I/71ilfVJuCNL._UF894,1000_QL80_.jpg",
        "categoria" => "sudaderas"
    ],
    [
        "id" => 5,
        "nombre" => "Chaqueta de cuero",
        "descripcion" => "Chaqueta elegante de cuero.",
        "precio" => 45.90,
        "imgen" => "https://media.cuir-city.com/catalogue/lst_n-a-file-66db218475b84.jpg",
        "categoria" => "chaquetas"
    ],
        [
        "id" => 6,
        "nombre" => "pañuelos",
        "descripcion" => "pañuelos de seda",
        "precio" => 45.50,
        "imgen" => "https://julunggul.com/wp-content/uploads/2021/08/panuelos-de-mujer-de-imitacion-seda-de-flores-blanco-y-azul.jpg",
        "categoria" => "pañuelos"
    ],
    [
        "id" => 7,
        "nombre" => "bolsos",
        "descripcion" => "bolsos informales",
        "precio" => 20.50,
        "imgen" => "https://www.lodi.es/68953-large_default/bolso-charme-rafia-natural-negro-bolsos-mujer-online.jpg",
        "categoria" => "bolsos"
    ],
    [
        "id" => 8,
        "nombre" => "cinturones",
        "descripcion" => "cinturones de cuero",
        "precio" => 15.50,
        "imgen" => "https://miguelbellido.es/wp-content/uploads/2023/08/cinturones-online-0000805038221923002a.jpg",
        "categoria" => "cinturones"
    ],
    [
        "id" => 9,
        "nombre" => "calcetines",
        "descripcion" => "calcetines deportivos",
        "precio" => 9.50,
        "imgen" => "https://hookeshop.com/6802-superlarge_default/calcetines-rayas-finas-azul-claro-y-teja.jpg",
        "categoria" => "calcetines"
    ],
];

if (isset($_GET['id'])) {
    header('Content-Type: application/json');
    $id = intval($_GET['id']);
    foreach ($productos as $p) {
        if ($p['id'] === $id) {
            echo json_encode($p);
            exit;
        }
    }
    echo json_encode(["error" => "Producto no encontrado"]);
 }else if (isset($_GET['modo']) && $_GET['modo'] === 'texto') {
    header('Content-Type: text/html; charset=UTF-8');
    mostrarProductosJSON($productos);
} //Pista debes detectar el max con  el get para el ejercicio--> Ejercicio 4: Filtrado de productos por GET
else {
    echo json_encode($productos);
}


///Función que muestra por pantalla un listado de productos.
//http://localhost/ra1clienteservidorexmamen/servidor/api.php?modo=texto
function mostrarProductosJSON($productos) {
    echo "--- Lista de productos ---<br>";
    $json = json_encode($productos);
    $array = json_decode($json, true);
    //Crear un foreach para recorrerlo  y pintar por pantalla, el id, nombre y precio del producto
    foreach ($array as $producto){
        echo "ID: " . $producto['id'];
        echo "<br>";
        echo "Nombre: " . $producto['nombre'];
        echo "<br>";
        echo "Precio: " . $producto['precio'];
        echo "<br><br>";
    }
}
