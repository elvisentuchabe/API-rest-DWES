
const URL_JSON = '/api/productos';
let productosGlobales = [];
let usuarioActual = null;
let USUARIOS = [];
let timeoutBuscador = null;

document.addEventListener('DOMContentLoaded', () => {
    cargarUsuarios();
    cargarProductos();
    checkSesion();
    inicializarCarrito();
    checkCookies();
    configurarBusqueda();
    configurarLogin();
    configurarRegister();
    initGeolocalizacion();
});

// --- USUARIOS ---
function cargarUsuarios() {
    const usuariosGuardados = localStorage.getItem('usuariosDB');
    if (usuariosGuardados) {
        USUARIOS = JSON.parse(usuariosGuardados);
    } else {
        USUARIOS = [
            { user: 'admin', pass: '1234', nombre: 'Administrador' },
            { user: 'cliente', pass: '1234', nombre: 'Cliente Habitual' }
        ];
        localStorage.setItem('usuariosDB', JSON.stringify(USUARIOS));
    }
}

function configurarRegister() {
    const form = document.getElementById('formRegister');
    if(form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const user = document.getElementById('regUsuario').value;
            const pass = document.getElementById('regPassword').value;
            const nombre = document.getElementById('regNombre').value;

            if (USUARIOS.find(u => u.user === user)) {
                alert('Usuario ya existe'); return;
            }
            USUARIOS.push({ user, pass, nombre });
            localStorage.setItem('usuariosDB', JSON.stringify(USUARIOS));
            
            bootstrap.Modal.getInstance(document.getElementById('registerModal')).hide();
            login(user, pass);
        });
    }
}

function configurarLogin() {
    const form = document.getElementById('formLogin');
    if(form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            login(document.getElementById('usuarioInput').value, document.getElementById('passwordInput').value);
        });
    }
}

function login(user, pass) {
    const found = USUARIOS.find(u => u.user === user && u.pass === pass);
    if (found) {
        usuarioActual = found;
        localStorage.setItem('sesionActiva', JSON.stringify(usuarioActual));
        const modal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
        if(modal) modal.hide();
        document.getElementById('formLogin').reset();
        document.getElementById('loginError').style.display = 'none';
        actualizarUserUI();
        actualizarCarritoUI();
    } else {
        document.getElementById('loginError').style.display = 'block';
    }
}

function logout() {
    usuarioActual = null;
    localStorage.removeItem('sesionActiva');
    actualizarUserUI();
    actualizarCarritoUI();
}

function checkSesion() {
    const saved = localStorage.getItem('sesionActiva');
    if (saved) usuarioActual = JSON.parse(saved);
    actualizarUserUI();
}

function actualizarUserUI() {
    const container = document.getElementById('user-container');
    if (!container) return;
    
    if (usuarioActual) {
        container.innerHTML = `
            <div class="dropdown">
                <a href="#" class="text-white fs-5 dropdown-toggle text-decoration-none" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle text-primary"></i> ${usuarioActual.user}
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#" onclick="logout()">Cerrar Sesión</a></li>
                </ul>
            </div>`;
    } else {
        container.innerHTML = `
            <button class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#loginModal">ENTRAR</button>
            <button class="btn btn-primary btn-sm text-dark" data-bs-toggle="modal" data-bs-target="#registerModal">REGISTRO</button>`;
    }
}

async function cargarProductos(filtros = '') {
    try {
        const contenedor = document.getElementById('contenedor-productos');
        if(contenedor) contenedor.innerHTML = '<div class="text-center text-white my-5"><div class="spinner-border text-primary"></div></div>';

        const response = await fetch(URL_JSON + filtros);
        if (!response.ok) throw new Error("Error API");
        
        productosGlobales = await response.json();
        
        // Sumar visitas locales
        const visitasLocales = JSON.parse(localStorage.getItem('contadorVisitas')) || {};
        productosGlobales.forEach(p => {
            if (visitasLocales[p.id]) p.visitas += visitasLocales[p.id];
        });

        if (filtros === '') renderizarCarrusel(productosGlobales);
        renderizarCatalogo(productosGlobales);

    } catch (error) {
        console.error(error);
        const c = document.getElementById('contenedor-productos');
        if(c) c.innerHTML = `<h3 class="text-center text-danger mt-5">Error de conexión con API</h3>`;
    }
}

function obtenerImagen(img) {
    if (!img) return 'https://via.placeholder.com/300?text=Sin+Imagen';
    return img.startsWith('http') ? img : `/${img}`;
}

function renderizarCarrusel(productos) {
    const contenedor = document.getElementById('contenedor-carrusel');
    if (!contenedor) return;
    
    const destacados = [...productos].sort((a, b) => b.visitas - a.visitas).slice(0, 3);
    let html = '';
    
    destacados.forEach((prod, index) => {
        const active = index === 0 ? 'active' : '';
        const imgSrc = obtenerImagen(prod.imagen);
        
        html += `
            <div class="carousel-item ${active}">
                <img src="${imgSrc}" class="d-block w-100" style="height: 450px; object-fit: cover; cursor: pointer;" onclick="verDetalle(${prod.id})">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5 class="text-primary">TOP VENTAS</h5>
                    <h3>${prod.nombre}</h3>
                    <p>${prod.precio} €</p>
                    <button class="btn btn-primary" onclick="agregarAlCarrito(${prod.id}, '${prod.nombre}', ${prod.precio}, '${prod.imagen}')">LO QUIERO</button>
                </div>
            </div>`;
    });
    contenedor.innerHTML = html;
}

function renderizarCatalogo(productos) {
    const contenedor = document.getElementById('contenedor-productos');
    if (!contenedor) return;

    if (productos.length === 0) {
        contenedor.innerHTML = `<h3 class="text-center text-white mt-5">No hay productos</h3>`;
        return;
    }

    let html = '';
    productos.forEach(prod => {
        const imgSrc = obtenerImagen(prod.imagen);
        
        html += `
            <div class="col">
                <div class="card h-100 card-producto shadow-sm" style="cursor: pointer;" onclick="verDetalle(${prod.id})">
                    <div class="position-relative">
                        <img src="${imgSrc}" class="card-img-top" style="height: 250px; object-fit: cover;">
                        <div class="descripcion-overlay flex-column">
                            <span class="btn btn-sm btn-outline-light rounded-pill">VER DETALLES</span>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-white text-truncate">${prod.nombre}</h5>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="text-primary fw-bold">${prod.precio} €</span>
                            <button class="btn btn-sm btn-outline-primary" onclick="event.stopPropagation(); agregarAlCarrito(${prod.id}, '${prod.nombre}', ${prod.precio}, '${prod.imagen}')">AÑADIR</button>
                        </div>
                    </div>
                </div>
            </div>`;
    });
    contenedor.innerHTML = html;
}

function verDetalle(id) {
    const prod = productosGlobales.find(p => p.id === id);
    if (!prod) return;
    
    prod.visitas++;
    const v = JSON.parse(localStorage.getItem('contadorVisitas')) || {};
    v[id] = (v[id] || 0) + 1;
    localStorage.setItem('contadorVisitas', JSON.stringify(v));

    document.getElementById('carruselDestacados').style.display = 'none';
    document.getElementById('seccion-catalogo').style.display = 'none';
    
    const detalle = document.getElementById('seccion-detalle');
    const imgSrc = obtenerImagen(prod.imagen);
    
    detalle.innerHTML = `
        <div class="row mt-5">
            <div class="col-12 mb-4"><button class="btn btn-outline-secondary" onclick="volver()"><i class="bi bi-arrow-left"></i> VOLVER</button></div>
            <div class="col-md-6"><img src="${imgSrc}" class="img-fluid rounded border border-secondary"></div>
            <div class="col-md-6 text-white">
                <span class="badge bg-primary text-black mb-2">${prod.categoria || 'General'}</span>
                <h1>${prod.nombre}</h1>
                <p class="text-muted">${prod.descripcion || ''}</p>
                <h2 class="text-primary my-4">${prod.precio} €</h2>
                <button class="btn btn-primary btn-lg w-100" onclick="agregarAlCarrito(${prod.id}, '${prod.nombre}', ${prod.precio}, '${prod.imagen}')">AÑADIR A CESTA</button>
            </div>
        </div>`;
    detalle.style.display = 'block';
    window.scrollTo(0,0);
}

function volver() {
    document.getElementById('seccion-detalle').style.display = 'none';
    document.getElementById('carruselDestacados').style.display = 'block';
    document.getElementById('seccion-catalogo').style.display = 'block';
}

// --- CARRITO ---
function obtenerClaveCarrito() { return usuarioActual ? `carrito_${usuarioActual.user}` : 'carrito_invitado'; }

function agregarAlCarrito(id, nombre, precio, imagen) {
    if (!usuarioActual) {
        new bootstrap.Modal(document.getElementById('loginModal')).show();
        return;
    }
    const clave = obtenerClaveCarrito();
    let c = JSON.parse(localStorage.getItem(clave)) || [];
    c.push({ id, nombre, precio, imagen });
    localStorage.setItem(clave, JSON.stringify(c));
    actualizarCarritoUI();
    alert("Añadido al carrito");
}

function eliminarDelCarrito(index) {
    const clave = obtenerClaveCarrito();
    let c = JSON.parse(localStorage.getItem(clave)) || [];
    c.splice(index, 1);
    localStorage.setItem(clave, JSON.stringify(c));
    actualizarCarritoUI();
}

function inicializarCarrito() { actualizarCarritoUI(); }

function actualizarCarritoUI() {
    const clave = obtenerClaveCarrito();
    const c = JSON.parse(localStorage.getItem(clave)) || [];
    
    // Actualizar burbuja
    const count = document.getElementById('contador-carrito');
    if(count) count.innerText = c.length;
    
    // Actualizar modal
    const body = document.getElementById('carrito-body');
    const totalElemento = document.getElementById('carrito-total'); // ¡AQUÍ ESTABA EL ERROR!

    if (body && totalElemento) {
        body.innerHTML = '';
        let total = 0;
        
        if (c.length === 0) {
            body.innerHTML = '<p class="text-center text-muted">Vacío</p>';
        } else {
            c.forEach((p, i) => {
                total += parseFloat(p.precio);
                const imgSrc = obtenerImagen(p.imagen);
                
                body.innerHTML += `
                    <div class="card mb-2 bg-dark text-white border-secondary">
                        <div class="row g-0 align-items-center">
                            <div class="col-3"><img src="${imgSrc}" class="img-fluid"></div>
                            <div class="col-9 position-relative">
                                <div class="card-body p-2">
                                    <small>${p.nombre}</small>
                                    <div class="text-primary">${p.precio} €</div>
                                    <button onclick="eliminarDelCarrito(${i})" class="btn btn-link text-danger p-0 position-absolute top-0 end-0 me-2"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>`;
            });
        }
        totalElemento.innerText = total.toFixed(2) + ' €';
    }
}

// --- BUSCADOR ---
function configurarBusqueda() {
    const input = document.getElementById('inputBuscar');
    const btns = document.querySelectorAll('.filter-btn, .btn-categoria');
    
    input.addEventListener('input', (e) => {
        clearTimeout(timeoutBuscador);
        timeoutBuscador = setTimeout(() => {
            if(document.getElementById('seccion-detalle').style.display === 'block') volver();
            const val = e.target.value;
            cargarProductos(val ? `?buscar=${val}` : '');
        }, 300);
    });

    btns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            btns.forEach(b => b.classList.remove('active'));
            const target = e.target.closest('button');
            target.classList.add('active');
            volver();
            
            const cat = target.getAttribute('data-cat') || target.getAttribute('data-categoria');
            input.value = '';
            
            if (!cat || cat === 'all' || cat === 'todos') cargarProductos();
            else cargarProductos(`?categoria=${cat}`);
        });
    });

    // Voz simple
    const btnVoz = document.getElementById('btnVoz');
    if (btnVoz && ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window)) {
        const SR = window.SpeechRecognition || window.webkitSpeechRecognition;
        const rec = new SR();
        rec.lang = 'es-ES';
        btnVoz.addEventListener('click', () => rec.start());
        rec.onresult = (e) => {
            input.value = e.results[0][0].transcript;
            input.dispatchEvent(new Event('input'));
        };
    } else if(btnVoz) {
        btnVoz.style.display = 'none';
    }
}

// --- COOKIES Y GEO ---
function checkCookies() {
    if (!document.cookie.includes("aceptar_cookies=true")) {
        const el = document.getElementById('cookieModal');
        if(el) {
            const m = new bootstrap.Modal(el, {backdrop:'static', keyboard:false});
            m.show();
            document.getElementById('btn-aceptar-cookies').addEventListener('click', () => {
                document.cookie = "aceptar_cookies=true; path=/; max-age=" + (365*24*60*60);
                m.hide();
            });
        }
    }
}

function initGeolocalizacion() {
    const div = document.getElementById('geo-info');
    if (div && navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (pos) => div.innerHTML = `<i class="bi bi-geo-alt-fill"></i> ${pos.coords.latitude.toFixed(2)}, ${pos.coords.longitude.toFixed(2)}`,
            () => div.innerHTML = `<i class="bi bi-geo-alt"></i> No permitida`
        );
    }
}