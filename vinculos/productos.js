const whatsapp = "https://wa.me/51956881315?text=Hola,%20quiero%20información%20sobre%20este%20producto";

// LISTA DE PRODUCTOS
const productos = {
    
condensadores: [
{
img:"./imgproductos/Condensadores - Evaporadores/imagen1.avif",
nombre:"Condensing Unit Built-in Series, 1~1.5 HP Temp. Range -40~+10℃"
},
{
img:"./imgproductos/Condensadores - Evaporadores/imagen2.jpg",
nombre:"Condensing Unit Fixed Frequency Series, 2~4 HP Temp. Range -40~+10℃"
},
{
img:"./imgproductos/Condensadores - Evaporadores/imagen3.jpeg",
nombre:"Condensing Unit Fixed Frequency Series, 5~7 HP Temp. Range -40~+10℃"
},
{
img:"./imgproductos/Condensadores - Evaporadores/imagen4.jpeg",
nombre:"Condensing Unit Fixed Frequency Series, 8 HP Temp. Range -40~+10℃"
}
],

sistemas:[
{
img:"./imgproductos/imagen1.avif",
nombre:"Sistema de refrigeración industrial 1~1.5 HP"
},
{
img:"./imgproductos/imagen2.jpg",
nombre:"Sistema de refrigeración comercial"
},
{
img:"./imgproductos/imagen3.jpeg",
nombre:"Sistema Fixed Frequency 2~4 HP"
}
],

compresores:[
{
img:"./imgproductos/compresores/cp1.jpeg",
nombre:"B Series 3.5-7HP"
},
{
img:"./imgproductos/compresores/cp2.jpeg",
nombre:"C Series 8-15HP"
},
{
img:"./imgproductos/compresores/cp3.jpeg",
nombre:"F Series 18/20/25HP R410A"
},
{
img:"./imgproductos/compresores/cp4.jpeg",
nombre:"B Series 4-10HP"
},
{
img:"./imgproductos/compresores/cp5.jpeg",
nombre:"C Series 8-15HP"
},
{
img:"./imgproductos/compresores/cp6.jpeg",
nombre:"D Series 6-25HP AC/DC INV"
}
]

};


// GENERADOR DE CARDS
function cargarProductos(categoria,id){

const contenedor = document.getElementById(id);

categoria.forEach(producto => {

contenedor.innerHTML += `
<div class="card">

<img src="${producto.img}" alt="${producto.nombre}" loading="lazy">

<p>${producto.nombre}</p>

<a href="${whatsapp}%20${encodeURIComponent(producto.nombre)}">
Comprar
</a>

</div>
`;

});

}


// CARGAR PRODUCTOS
cargarProductos(productos.condensadores,"condensadores");
cargarProductos(productos.sistemas,"sistemas");
cargarProductos(productos.compresores,"compresores");