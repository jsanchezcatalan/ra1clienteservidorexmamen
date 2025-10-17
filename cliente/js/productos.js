document.addEventListener('DOMContentLoaded', async () => {
  const contenedor = document.getElementById('contenedor-productos');
  const productos = await obtenerProductos();

productos.forEach(p => {
  const card = document.createElement('div');
  card.className = "col-md-4";
  card.innerHTML = `
    <div class="card h-100 shadow-sm">
      <img src="${p.imgen}" class="card-img-top" alt="${p.nombre}">
      <div class="card-body text-center">
        <h5 class="card-title">${p.nombre}</h5>
        <p class="card-text">${p.descripcion}</p>
        <p class="campo categoria">Categoría: ${p.categoria}</p>
        <p class="fw-bold">${p.precio.toFixed(2)} €</p>
        <a href="producto.html?id=${p.id}" class="btn btn-primary">Ver detalle</a>
      </div>
    </div>
  `;
  contenedor.appendChild(card);
  //Cambiar los estilos
    const tarjeta = card.querySelector('.card');
    const titulo = card.querySelector('.card-title');
    const texto = card.querySelector('.card-text');

    tarjeta.style.backgroundColor = '#1f65b6ff'; // Fondo claro
    titulo.style.color = '#333';               // Título oscuro
    texto.style.color = '#880909ff';                // Texto gris
});
});
