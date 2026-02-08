
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

// --- GESTIÓN DE USUARIOS (Local) ---
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
    const formRegister = document.getElementById('formRegister');
    if(formRegister) {
        formRegister.addEventListener('submit', (e) => {
            e.preventDefault();
            const nombre = document.getElementById('regNombre').value;
            const user = document.getElementById('regUsuario').value;
            const pass = document.getElementById('regPassword').value;

            if (USUARIOS.find(u => u.user === user)) {
                alert('¡Ese usuario ya existe! Prueba con otro.');
                return;
            }

            const nuevoUsuario = { user, pass, nombre };
            USUARIOS.push(nuevoUsuario);
            localStorage.setItem('usuariosDB', JSON.stringify(USUARIOS));

            const modalRegisterEl = document.getElementById('registerModal');
            const modalRegister = bootstrap.Modal.getInstance(modalRegisterEl);
            modalRegister.hide();

            login(user, pass);
            alert(`¡Cuenta creada! Bienvenido, ${nombre}.`);
        });
    }
}

function configurarLogin() {
    const formLogin = document.getElementById('formLogin');
    if(formLogin) {
        formLogin.addEventListener('submit', (e) => {
            e.preventDefault();
            const user = document.getElementById('usuarioInput').value;
            const pass = document.getElementById('passwordInput').value;
            login(user, pass);
        });
    }
}

function login(user, pass) {
    const usuarioEncontrado = USUARIOS.find(u => u.user === user && u.pass === pass);
    if (usuarioEncontrado) {
        usuarioActual = usuarioEncontrado;
        localStorage.setItem('sesionActiva', JSON.stringify(usuarioActual));
        
        const modalLoginEl = document.getElementById('loginModal');
        const modalLogin = bootstrap.Modal.getInstance(modalLoginEl);
        if(modalLogin) modalLogin.hide();

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
    const sesionGuardada = localStorage.getItem('sesionActiva');
    if (sesionGuardada) usuarioActual = JSON.parse(sesionGuardada);
    actualizarUserUI();
}

function actualizarUserUI() {
    const container = document.getElementById('user-container');
    if (usuarioActual) {
        container.innerHTML = `
            <div class="dropdown">
                <a href="#" class="text-white fs-5 dropdown-toggle text-decoration-none" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle text-primary"></i> <span class="fs-6 ms-1">${usuarioActual.user}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#" onclick="logout()">Cerrar Sesión</a></li>
                </ul>
            </div>
        `;
    } else {
        container.innerHTML = `
            <div class="d-flex gap-2">
                <button class="btn btn-outline-primary btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#loginModal">
                    ENTRAR
                </button>
                <button class="btn btn-primary btn-sm fw-bold text-dark" data-bs-toggle="modal" data-bs-target="#registerModal">
                    REGISTRARSE
                </button>
            </div>
        `;
    }
}

async function cargarProductos(filtros = '') {
    try {
        const contenedor = document.getElementById('contenedor-productos');
        
        if(contenedor) contenedor.innerHTML = '<div class="col-12 text-center text-white my-5"><div class="spinner-border text-primary" role="status"></div><p>Cargando catálogo...</p></div>';
        const response = await fetch(URL_JSON + filtros);
        
        if (!response.ok) throw new Error("Error al conectar con la API");
        
        productosGlobales = await response.json();
        
        const visitasLocales = JSON.parse(localStorage.getItem('contadorVisitas')) || {};
        productosGlobales.forEach(prod => {
            if (visitasLocales[prod.id]) prod.visitas += visitasLocales[prod.id];
        });

        if (filtros === '') {
            renderizarCarrusel(productosGlobales);
        }
        
        renderizarCatalogo(productosGlobales);

    } catch (error) { 
        console.error("Error API:", error);
        const contenedor = document.getElementById('contenedor-productos');
        if(contenedor) contenedor.innerHTML = `<div class="col-12 text-center text-danger mt-5"><h3>Error al cargar la tienda.</h3><p>Verifica que el servidor (php artisan serve) esté encendido.</p></div>`;
    }
}

function renderizarCarrusel(productos) {
    const contenedor = document.getElementById('contenedor-carrusel');
    if (!contenedor) return;
    const destacados = [...productos].sort((a, b) => b.visitas - a.visitas).slice(0, 3);
    
    let html = '';
    destacados.forEach((prod, index) => {
        const activeClass = index === 0 ? 'active' : ''; 
        const imgSrc = prod.imagen.startsWith('http') ? prod.imagen : `/${prod.imagen}`;

        html += `
            <div class="carousel-item ${activeClass}">
                <img src="${imgSrc}" class="d-block w-100" alt="${prod.nombre}" 
                     style="cursor: pointer; object-fit: cover;" onclick="verDetalle(${prod.id})"
                     width="1200" height="450"> 
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h5 class="display-6 fw-bold text-uppercase text-primary">TOP VENTAS</h5>
                    <h3 class="text-white">${prod.nombre}</h3>
                    <p class="fs-5 text-white">${prod.precio} €</p>
                    <button class="btn btn-primary fw-bold" onclick="agregarAlCarrito(${prod.id}, '${prod.nombre}', ${prod.precio}, '${prod.imagen}')">LO QUIERO</button>
                </div>
            </div>`;
    });
    contenedor.innerHTML = html;
}

function renderizarCatalogo(productos) {
    const contenedor = document.getElementById('contenedor-productos');
    if (!contenedor) return;

    if (productos.length === 0) {
        contenedor.innerHTML = `<div class="col-12 text-center mt-5"><h3 class="text-white">No se encontraron productos con esos criterios.</h3></div>`;
        return;
    }

    let html = '';
    productos.forEach(prod => {
        const imgSrc = prod.imagen.startsWith('http') ? prod.imagen : `/${prod.imagen}`;
        
        html += `
            <div class="col">
                <div class="card h-100 card-producto shadow-sm">
                    <div class="position-relative" style="cursor: pointer;" onclick="verDetalle(${prod.id})">
                        <img src="${imgSrc}" class="card-img-top" alt="${prod.nombre}" loading="lazy" width="300" height="250" style="object-fit: cover;">
                        <div class="descripcion-overlay flex-column">
                             <i class="bi bi-cart-plus-fill display-3 icono-hover mb-2"></i>
                             <span class="btn btn-sm btn-outline-light rounded-pill px-3">VER DETALLES</span>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fs-6 fw-bold text-white text-truncate">${prod.nombre}</h5>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="text-primary fw-bold fs-5">${prod.precio} €</span>
                            <button class="btn btn-sm btn-outline-primary" onclick="event.stopPropagation(); agregarAlCarrito(${prod.id}, '${prod.nombre}', ${prod.precio}, '${prod.imagen}')">
                                <i class="bi bi-plus-lg"></i> AÑADIR
                            </button>
                        </div>
                    </div>
                </div>
            </div>`;
    });
    contenedor.innerHTML = html;
}

function verDetalle(id) {
    const producto = productosGlobales.find(p => p.id === id);
    if (!producto) return;
    
    producto.visitas++;
    const visitasLocales = JSON.parse(localStorage.getItem('contadorVisitas')) || {};
    visitasLocales[id] = (visitasLocales[id] || 0) + 1;
    localStorage.setItem('contadorVisitas', JSON.stringify(visitasLocales));
    
    
    document.getElementById('carruselDestacados').style.display = 'none';
    document.getElementById('seccion-catalogo').style.display = 'none';
    const seccionDetalle = document.getElementById('seccion-detalle');

    const imgSrc = producto.imagen.startsWith('http') ? producto.imagen : `/${producto.imagen}`;

    seccionDetalle.innerHTML = `
        <div class="row mt-5 align-items-center">
            <div class="col-12 mb-4">
                <button class="btn btn-outline-secondary" onclick="volverAlCatalogo()"><i class="bi bi-arrow-left"></i> VOLVER</button>
            </div>
            <div class="col-md-6">
                <img src="${imgSrc}" class="img-fluid rounded w-100 border border-secondary shadow-lg">
            </div>
            <div class="col-md-6 text-white">
                <span class="badge bg-primary text-black mb-2">${producto.categoria || 'Deporte'}</span>
                <h1 class="display-4 fw-bold text-white">${producto.nombre}</h1>
                <p class="text-muted lead">${producto.descripcion || 'Sin descripción disponible.'}</p>
                <h2 class="text-primary display-5 fw-bold my-4">${producto.precio} €</h2>
                <div class="d-grid gap-2">
                     <button class="btn btn-primary btn-lg py-3" onclick="agregarAlCarrito(${producto.id}, '${producto.nombre}', ${producto.precio}, '${producto.imagen}')">
                        AÑADIR A LA CESTA
                    </button>
                </div>
            </div>
        </div>`;
    seccionDetalle.style.display = 'block';
    window.scrollTo(0, 0);
}

function volverAlCatalogo() {
    document.getElementById('seccion-detalle').style.display = 'none';
    document.getElementById('carruselDestacados').style.display = 'block';
    document.getElementById('seccion-catalogo').style.display = 'block';
}

function obtenerClaveCarrito() {
    return usuarioActual ? `carrito_${usuarioActual.user}` : 'carrito_invitado';
}

function agregarAlCarrito(id, nombre, precio, imagen) {
    if (!usuarioActual) {
        alert("Debes iniciar sesión para comprar.");
        const modalLoginEl = document.getElementById('loginModal');
        if(modalLoginEl) {
             const modalLogin = new bootstrap.Modal(modalLoginEl);
             modalLogin.show();
        }
        return;
    }

    const clave = `carrito_${usuarioActual.user}`;
    let carrito = JSON.parse(localStorage.getItem(clave)) || [];
    carrito.push({ id, nombre, precio, imagen });
    localStorage.setItem(clave, JSON.stringify(carrito));
    actualizarCarritoUI();

    console.log("Producto añadido");
}

function eliminarDelCarrito(index) {
    const clave = obtenerClaveCarrito();
    let carrito = JSON.parse(localStorage.getItem(clave)) || [];
    carrito.splice(index, 1);
    localStorage.setItem(clave, JSON.stringify(carrito));
    actualizarCarritoUI();
}

function inicializarCarrito() { actualizarCarritoUI(); }

function actualizarCarritoUI() {
    const clave = obtenerClaveCarrito();
    const carrito = JSON.parse(localStorage.getItem(clave)) || [];
    const contador = document.getElementById('contador-carrito');
    if(contador) contador.innerText = carrito.length;
    
    const contenedorCarrito = document.getElementById('carrito-body');
    const totalElemento = document.getElementById('carrito-total');
    
    if (contenedorCarrito && totalElemento) {
        contenedorCarrito.innerHTML = '';
        let total = 0;
        if (carrito.length === 0) {
            contenedorCarrito.innerHTML = `<div class="text-center mt-5"><p class="text-muted">Cesta vacía.</p></div>`;
        } else {
            carrito.forEach((prod, index) => {
                total += prod.precio;
                const imgSrc = prod.imagen && !prod.imagen.startsWith('http') ? `/${prod.imagen}` : prod.imagen;
                contenedorCarrito.innerHTML += `
                    <div class="card mb-3 bg-dark text-white border-secondary">
                        <div class="row g-0 align-items-center">
                            <div class="col-3"><img src="${imgSrc}" class="img-fluid rounded-start"></div>
                            <div class="col-9">
                                <div class="card-body p-2 position-relative">
                                    <h6 class="mb-0 small fw-bold">${prod.nombre}</h6>
                                    <p class="mb-0 small text-primary">${prod.precio} €</p>
                                    <button onclick="eliminarDelCarrito(${index})" class="btn btn-link text-danger p-0 position-absolute top-0 end-0 me-2"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>`;
            });
        }
        totalElemento.innerText = total.toFixed(2) + ' €';
    }
}

function configurarBusqueda() {
    const inputBuscar = document.getElementById('inputBuscar');
    const btnVoz = document.getElementById('btnVoz');
    const botonesFiltro = document.querySelectorAll('.filter-btn, .btn-categoria');

    inputBuscar.addEventListener('input', (e) => {
        const texto = e.target.value;
        
        clearTimeout(timeoutBuscador);

        timeoutBuscador = setTimeout(() => {
            if (document.getElementById('seccion-detalle').style.display === 'block') volverAlCatalogo();
            
            if(texto.trim() === '') cargarProductos();
            else cargarProductos(`?buscar=${texto}`);
        }, 300);
    });

    botonesFiltro.forEach(btn => {
        btn.addEventListener('click', (e) => {
            botonesFiltro.forEach(b => b.classList.remove('active'));
            const botonPulsado = e.target.closest('button');
            if(botonPulsado) botonPulsado.classList.add('active');

            volverAlCatalogo();
            
            const cat = botonPulsado.getAttribute('data-cat') || botonPulsado.getAttribute('data-categoria');
            inputBuscar.value = '';

            if (cat === 'all' || cat === 'todos' || !cat) {
                cargarProductos(); 
            } else {
                cargarProductos(`?categoria=${cat}`);
            }
        });
    });

    if (btnVoz && inputBuscar) {
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

        if (!SpeechRecognition) {
            console.warn("Navegador sin soporte de voz.");
            btnVoz.style.display = 'none';
            return;
        }

        const recognition = new SpeechRecognition();
        recognition.lang = 'es-ES';
        recognition.continuous = true; 
        recognition.interimResults = true;

        let temporizadorSilencio;

        btnVoz.addEventListener('click', () => {
            try {
                recognition.start();
            } catch (error) {
                console.log("Ya activo");
            }
        });

        recognition.onstart = () => {
            btnVoz.innerHTML = '<i class="bi bi-mic-fill text-danger"></i>';
            inputBuscar.placeholder = "Escuchando...";
            inputBuscar.value = '';
        };

        recognition.onend = () => {
            btnVoz.innerHTML = '<i class="bi bi-mic-fill text-white"></i>';
            inputBuscar.placeholder = "Buscar productos...";
            clearTimeout(temporizadorSilencio);
            
            const textoFinal = inputBuscar.value;
            if(textoFinal) cargarProductos(`?buscar=${textoFinal}`);
        };

        recognition.onresult = (event) => {
            clearTimeout(temporizadorSilencio);

            const transcript = Array.from(event.results)
                .map(result => result[0].transcript)
                .join('');
            
            inputBuscar.value = transcript;
            
            temporizadorSilencio = setTimeout(() => {
                recognition.stop();
            }, 2000);
        };

        recognition.onerror = (event) => {
            console.error("Error voz:", event.error);
            btnVoz.innerHTML = '<i class="bi bi-mic-fill text-white"></i>';
        };
    }
}

function checkCookies() {
    if (!document.cookie.includes("aceptar_cookies=true")) {
        const modalElement = document.getElementById('cookieModal');
        if(modalElement) {
            const cookieModal = new bootstrap.Modal(modalElement, { backdrop: 'static', keyboard: false });
            cookieModal.show();
            
            document.getElementById('btn-aceptar-cookies').addEventListener('click', () => {
                const datos = `host=${window.location.hostname}|path=${window.location.pathname}`;
                const fecha = new Date();
                fecha.setTime(fecha.getTime() + (365*24*60*60*1000));
                
                document.cookie = `aceptar_cookies=true; expires=${fecha.toUTCString()}; path=/`;
                document.cookie = `info_ubicacion=${datos}; expires=${fecha.toUTCString()}; path=/`;
                
                localStorage.setItem('cookiesAceptadas', 'true');
                cookieModal.hide();
            });
        }
    }
}

function initGeolocalizacion() {
    const geoDiv = document.getElementById('geo-info');
    if (!geoDiv) return;

    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const lat = position.coords.latitude.toFixed(2);
                const long = position.coords.longitude.toFixed(2);
                geoDiv.innerHTML = `<i class="bi bi-geo-alt-fill"></i> Lat: ${lat}, Long: ${long}`;
            },
            (error) => {
                geoDiv.innerHTML = `<i class="bi bi-geo-alt"></i> Ubicación no permitida`;
            }
        );
    } else {
        geoDiv.style.display = 'none';
    }
}