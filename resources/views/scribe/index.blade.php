<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.6.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.6.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                                <a href="#endpoints-GETapi-user">GET api/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-productos">
                                <a href="#endpoints-GETapi-productos">Nivel Oro: Lectura con filtros</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-productos">
                                <a href="#endpoints-POSTapi-productos">POST api/productos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-productos--id-">
                                <a href="#endpoints-GETapi-productos--id-">GET api/productos/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-productos--id-">
                                <a href="#endpoints-PUTapi-productos--id-">PUT api/productos/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-productos--id-">
                                <a href="#endpoints-DELETEapi-productos--id-">DELETE api/productos/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: February 1, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-productos">Nivel Oro: Lectura con filtros</h2>

<p>
</p>



<span id="example-requests-GETapi-productos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/productos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/productos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-productos">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;nombre&quot;: &quot;Nike Air Zoom Pegasus 40&quot;,
        &quot;precio&quot;: 130,
        &quot;descripcion&quot;: &quot;La zapatilla de running m&aacute;s fiable y vers&aacute;til para entrenamiento diario.&quot;,
        &quot;imagen&quot;: &quot;img/nike_running_shoe.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 5500,
        &quot;stock&quot;: 20,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 2,
        &quot;nombre&quot;: &quot;Adidas Ultraboost Light&quot;,
        &quot;precio&quot;: 190,
        &quot;descripcion&quot;: &quot;Retorno de energ&iacute;a incre&iacute;ble con un 30% menos de peso.&quot;,
        &quot;imagen&quot;: &quot;img/adidas_running_shoe.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 4200,
        &quot;stock&quot;: 15,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 3,
        &quot;nombre&quot;: &quot;Asics Novablast 4&quot;,
        &quot;precio&quot;: 150,
        &quot;descripcion&quot;: &quot;Efecto trampol&iacute;n y m&aacute;xima reactividad para ritmos alegres.&quot;,
        &quot;imagen&quot;: &quot;img/asics_running_shoe.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 3800,
        &quot;stock&quot;: 12,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 4,
        &quot;nombre&quot;: &quot;Hoka Clifton 9&quot;,
        &quot;precio&quot;: 150,
        &quot;descripcion&quot;: &quot;Amortiguaci&oacute;n suave y ligera para devorar kil&oacute;metros sin impacto.&quot;,
        &quot;imagen&quot;: &quot;img/hoka_running_shoe.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 4900,
        &quot;stock&quot;: 18,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 5,
        &quot;nombre&quot;: &quot;Saucony Endorphin Speed 4&quot;,
        &quot;precio&quot;: 180,
        &quot;descripcion&quot;: &quot;Placa de nylon y espuma PWRRUN PB para entrenamientos r&aacute;pidos.&quot;,
        &quot;imagen&quot;: &quot;img/saucony_running_shoe.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 2100,
        &quot;stock&quot;: 8,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 6,
        &quot;nombre&quot;: &quot;Brooks Ghost 15&quot;,
        &quot;precio&quot;: 150,
        &quot;descripcion&quot;: &quot;Pisada suave y fluida, la favorita para corredores neutros.&quot;,
        &quot;imagen&quot;: &quot;img/brooks_running_shoe.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 3100,
        &quot;stock&quot;: 25,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 7,
        &quot;nombre&quot;: &quot;New Balance Fresh Foam X 1080v13&quot;,
        &quot;precio&quot;: 190,
        &quot;descripcion&quot;: &quot;La m&aacute;xima expresi&oacute;n de comodidad y amortiguaci&oacute;n de New Balance.&quot;,
        &quot;imagen&quot;: &quot;img/new_balance_running_shoe.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 2800,
        &quot;stock&quot;: 10,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 8,
        &quot;nombre&quot;: &quot;Mizuno Wave Rider 27&quot;,
        &quot;precio&quot;: 160,
        &quot;descripcion&quot;: &quot;Equilibrio perfecto entre propulsi&oacute;n y estabilidad.&quot;,
        &quot;imagen&quot;: &quot;img/mizuno_running_shoe.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 1500,
        &quot;stock&quot;: 14,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 9,
        &quot;nombre&quot;: &quot;Garmin Forerunner 265&quot;,
        &quot;precio&quot;: 500,
        &quot;descripcion&quot;: &quot;Reloj GPS con pantalla AMOLED brillante y m&eacute;tricas avanzadas.&quot;,
        &quot;imagen&quot;: &quot;img/sports_watch.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 6200,
        &quot;stock&quot;: 5,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 10,
        &quot;nombre&quot;: &quot;Polar Pacer Pro&quot;,
        &quot;precio&quot;: 330,
        &quot;descripcion&quot;: &quot;Reloj de running ultraligero con bar&oacute;metro integrado.&quot;,
        &quot;imagen&quot;: &quot;img/sports_watch.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 1800,
        &quot;stock&quot;: 9,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 11,
        &quot;nombre&quot;: &quot;Coros Pace 3&quot;,
        &quot;precio&quot;: 250,
        &quot;descripcion&quot;: &quot;La mejor bater&iacute;a del mercado para un reloj GPS ligero.&quot;,
        &quot;imagen&quot;: &quot;img/sports_watch.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 3500,
        &quot;stock&quot;: 20,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 12,
        &quot;nombre&quot;: &quot;Apple Watch Ultra 2&quot;,
        &quot;precio&quot;: 900,
        &quot;descripcion&quot;: &quot;El reloj deportivo definitivo para aventuras extremas.&quot;,
        &quot;imagen&quot;: &quot;img/sports_watch.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 8000,
        &quot;stock&quot;: 2,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 13,
        &quot;nombre&quot;: &quot;Auriculares Shokz OpenRun Pro&quot;,
        &quot;precio&quot;: 190,
        &quot;descripcion&quot;: &quot;Conducci&oacute;n &oacute;sea para escuchar m&uacute;sica sin aislarte del entorno.&quot;,
        &quot;imagen&quot;: &quot;img/headphones.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 2200,
        &quot;stock&quot;: 30,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 14,
        &quot;nombre&quot;: &quot;Camiseta Nike Dri-FIT Miler&quot;,
        &quot;precio&quot;: 35,
        &quot;descripcion&quot;: &quot;Tejido transpirable que capilariza el sudor.&quot;,
        &quot;imagen&quot;: &quot;img/t-shirt.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 1200,
        &quot;stock&quot;: 50,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 15,
        &quot;nombre&quot;: &quot;Pantal&oacute;n Adidas Own The Run&quot;,
        &quot;precio&quot;: 40,
        &quot;descripcion&quot;: &quot;Shorts ligeros con detalles reflectantes para la noche.&quot;,
        &quot;imagen&quot;: &quot;img/pantalon.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 900,
        &quot;stock&quot;: 45,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 16,
        &quot;nombre&quot;: &quot;Calcetines Lurbel Desafio&quot;,
        &quot;precio&quot;: 22,
        &quot;descripcion&quot;: &quot;Tecnolog&iacute;a Bmax para prevenir ampollas en largas distancias.&quot;,
        &quot;imagen&quot;: &quot;img/calcetines.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 600,
        &quot;stock&quot;: 100,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 17,
        &quot;nombre&quot;: &quot;Gorra Salomon XA Cap&quot;,
        &quot;precio&quot;: 30,
        &quot;descripcion&quot;: &quot;Ligera, transpirable y de secado r&aacute;pido.&quot;,
        &quot;imagen&quot;: &quot;img/gorra.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 400,
        &quot;stock&quot;: 25,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 18,
        &quot;nombre&quot;: &quot;Cintur&oacute;n Salomon Pulse Belt&quot;,
        &quot;precio&quot;: 30,
        &quot;descripcion&quot;: &quot;Ajuste perfecto para llevar el m&oacute;vil y las llaves sin rebote.&quot;,
        &quot;imagen&quot;: &quot;img/cinturon.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 1100,
        &quot;stock&quot;: 35,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 19,
        &quot;nombre&quot;: &quot;Chaleco Salomon Adv Skin 12&quot;,
        &quot;precio&quot;: 160,
        &quot;descripcion&quot;: &quot;El rey de la hidrataci&oacute;n para trail running y ultra fondo.&quot;,
        &quot;imagen&quot;: &quot;img/chaleco_trail_running.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 2500,
        &quot;stock&quot;: 7,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 20,
        &quot;nombre&quot;: &quot;Cortavientos Odlo Zeroweight&quot;,
        &quot;precio&quot;: 100,
        &quot;descripcion&quot;: &quot;Protecci&oacute;n contra el viento en un paquete ultraligero.&quot;,
        &quot;imagen&quot;: &quot;img/cortavientos.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 750,
        &quot;stock&quot;: 12,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 21,
        &quot;nombre&quot;: &quot;Nike Vaporfly 3&quot;,
        &quot;precio&quot;: 260,
        &quot;descripcion&quot;: &quot;La zapatilla de competici&oacute;n m&aacute;s famosa con placa de carbono.&quot;,
        &quot;imagen&quot;: &quot;img/nike_running_shoe.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 7000,
        &quot;stock&quot;: 3,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 22,
        &quot;nombre&quot;: &quot;Adidas Adizero Adios Pro 3&quot;,
        &quot;precio&quot;: 250,
        &quot;descripcion&quot;: &quot;R&eacute;cords mundiales avalan esta zapatilla de marat&oacute;n.&quot;,
        &quot;imagen&quot;: &quot;img/adidas_running_shoe.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 4500,
        &quot;stock&quot;: 4,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 23,
        &quot;nombre&quot;: &quot;Asics Metaspeed Sky Paris&quot;,
        &quot;precio&quot;: 250,
        &quot;descripcion&quot;: &quot;Dise&ntilde;ada para corredores que aumentan su zancada al acelerar.&quot;,
        &quot;imagen&quot;: &quot;img/asics_running_shoe.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 3200,
        &quot;stock&quot;: 5,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 24,
        &quot;nombre&quot;: &quot;On Running Cloudmonster&quot;,
        &quot;precio&quot;: 180,
        &quot;descripcion&quot;: &quot;La mayor amortiguaci&oacute;n CloudTec para una pisada monstruosa.&quot;,
        &quot;imagen&quot;: &quot;img/saucony_running_shoe.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 2900,
        &quot;stock&quot;: 11,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 25,
        &quot;nombre&quot;: &quot;Pack Geles Maurten Gel 100&quot;,
        &quot;precio&quot;: 40,
        &quot;descripcion&quot;: &quot;Caja de 12 geles con tecnolog&iacute;a de hidrogel para evitar problemas estomacales.&quot;,
        &quot;imagen&quot;: &quot;img/geles.jpg&quot;,
        &quot;categoria&quot;: &quot;running&quot;,
        &quot;visitas&quot;: 1500,
        &quot;stock&quot;: 60,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 26,
        &quot;nombre&quot;: &quot;Specialized Tarmac SL8 Pro&quot;,
        &quot;precio&quot;: 6500,
        &quot;descripcion&quot;: &quot;La bicicleta m&aacute;s r&aacute;pida del mundo, combinaci&oacute;n de aero y ligereza.&quot;,
        &quot;imagen&quot;: &quot;img/bicicleta.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 9000,
        &quot;stock&quot;: 1,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 27,
        &quot;nombre&quot;: &quot;Trek Madone SLR 7&quot;,
        &quot;precio&quot;: 9000,
        &quot;descripcion&quot;: &quot;Tecnolog&iacute;a IsoFlow para una aerodin&aacute;mica sin precedentes.&quot;,
        &quot;imagen&quot;: &quot;img/bicicleta.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 8500,
        &quot;stock&quot;: 1,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 28,
        &quot;nombre&quot;: &quot;Canyon Ultimate CF SL 8&quot;,
        &quot;precio&quot;: 3000,
        &quot;descripcion&quot;: &quot;Relaci&oacute;n calidad-precio imbatible para una escaladora pura.&quot;,
        &quot;imagen&quot;: &quot;img/bicicleta.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 6700,
        &quot;stock&quot;: 3,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 29,
        &quot;nombre&quot;: &quot;Orbea Orca M30&quot;,
        &quot;precio&quot;: 2600,
        &quot;descripcion&quot;: &quot;Bicicleta de carretera de carbono ligera y reactiva.&quot;,
        &quot;imagen&quot;: &quot;img/bicicleta.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 5200,
        &quot;stock&quot;: 5,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 30,
        &quot;nombre&quot;: &quot;Giant Propel Advanced&quot;,
        &quot;precio&quot;: 3200,
        &quot;descripcion&quot;: &quot;Minimiza la resistencia al aire y maximiza la velocidad.&quot;,
        &quot;imagen&quot;: &quot;img/bicicleta.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 4100,
        &quot;stock&quot;: 2,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 31,
        &quot;nombre&quot;: &quot;Casco Specialized S-Works Evade 3&quot;,
        &quot;precio&quot;: 300,
        &quot;descripcion&quot;: &quot;El casco aero m&aacute;s ventilado del pelot&oacute;n.&quot;,
        &quot;imagen&quot;: &quot;img/casco.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 3200,
        &quot;stock&quot;: 10,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 32,
        &quot;nombre&quot;: &quot;Casco Giro Aether Spherical&quot;,
        &quot;precio&quot;: 320,
        &quot;descripcion&quot;: &quot;Protecci&oacute;n MIPS Spherical integrada para m&aacute;xima seguridad.&quot;,
        &quot;imagen&quot;: &quot;img/casco.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 1500,
        &quot;stock&quot;: 8,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 33,
        &quot;nombre&quot;: &quot;Casco POC Ventral Air Mips&quot;,
        &quot;precio&quot;: 260,
        &quot;descripcion&quot;: &quot;Dise&ntilde;o &uacute;nico y ventilaci&oacute;n extrema para d&iacute;as calurosos.&quot;,
        &quot;imagen&quot;: &quot;img/casco.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 2100,
        &quot;stock&quot;: 12,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 34,
        &quot;nombre&quot;: &quot;Gafas Oakley Sutro Lite&quot;,
        &quot;precio&quot;: 170,
        &quot;descripcion&quot;: &quot;Campo de visi&oacute;n amplio y lentes Prizm de alto contraste.&quot;,
        &quot;imagen&quot;: &quot;img/gafas.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 4800,
        &quot;stock&quot;: 25,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 35,
        &quot;nombre&quot;: &quot;Gafas 100% Speedcraft&quot;,
        &quot;precio&quot;: 190,
        &quot;descripcion&quot;: &quot;Las gafas favoritas de Peter Sagan.&quot;,
        &quot;imagen&quot;: &quot;img/gafas.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 3000,
        &quot;stock&quot;: 20,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 36,
        &quot;nombre&quot;: &quot;Maillot Castelli Gabba RoS 2&quot;,
        &quot;precio&quot;: 200,
        &quot;descripcion&quot;: &quot;La prenda original para lluvia y fr&iacute;o, ahora mejorada.&quot;,
        &quot;imagen&quot;: &quot;img/maillot.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 2500,
        &quot;stock&quot;: 15,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 37,
        &quot;nombre&quot;: &quot;Culotte Assos Equipe RS&quot;,
        &quot;precio&quot;: 240,
        &quot;descripcion&quot;: &quot;El est&aacute;ndar de oro en comodidad para largas distancias.&quot;,
        &quot;imagen&quot;: &quot;img/culotte.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 1800,
        &quot;stock&quot;: 10,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 38,
        &quot;nombre&quot;: &quot;Maillot Gobik CX Pro 3.0&quot;,
        &quot;precio&quot;: 75,
        &quot;descripcion&quot;: &quot;Ultraligero y ajustado, dise&ntilde;o espa&ntilde;ol de moda.&quot;,
        &quot;imagen&quot;: &quot;img/maillot.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 5500,
        &quot;stock&quot;: 30,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 39,
        &quot;nombre&quot;: &quot;Culotte Gobik Absolute&quot;,
        &quot;precio&quot;: 120,
        &quot;descripcion&quot;: &quot;Compresi&oacute;n excelente y badana K10 de carbono.&quot;,
        &quot;imagen&quot;: &quot;img/culotte.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 5200,
        &quot;stock&quot;: 25,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 40,
        &quot;nombre&quot;: &quot;Zapatillas Shimano S-Phyre RC903&quot;,
        &quot;precio&quot;: 380,
        &quot;descripcion&quot;: &quot;Transferencia de potencia profesional y ajuste BOA doble.&quot;,
        &quot;imagen&quot;: &quot;img/zapatillas.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 2000,
        &quot;stock&quot;: 6,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 41,
        &quot;nombre&quot;: &quot;Zapatillas Fizik Vento Infinito&quot;,
        &quot;precio&quot;: 350,
        &quot;descripcion&quot;: &quot;Suela de carbono r&iacute;gida y dise&ntilde;o italiano elegante.&quot;,
        &quot;imagen&quot;: &quot;img/zapatillas.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 1200,
        &quot;stock&quot;: 8,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 42,
        &quot;nombre&quot;: &quot;Garmin Edge 1040 Solar&quot;,
        &quot;precio&quot;: 750,
        &quot;descripcion&quot;: &quot;El ciclocomputador definitivo con carga solar.&quot;,
        &quot;imagen&quot;: &quot;img/ciclocomputador.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 6500,
        &quot;stock&quot;: 4,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 43,
        &quot;nombre&quot;: &quot;Wahoo Elemnt Bolt V2&quot;,
        &quot;precio&quot;: 280,
        &quot;descripcion&quot;: &quot;Navegaci&oacute;n aerodin&aacute;mica y f&aacute;cil de usar.&quot;,
        &quot;imagen&quot;: &quot;img/ciclocomputador.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 3100,
        &quot;stock&quot;: 12,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 44,
        &quot;nombre&quot;: &quot;Radar Garmin Varia RTL515&quot;,
        &quot;precio&quot;: 200,
        &quot;descripcion&quot;: &quot;Luz trasera que te avisa de los coches que se acercan.&quot;,
        &quot;imagen&quot;: &quot;img/radar.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 5800,
        &quot;stock&quot;: 20,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 45,
        &quot;nombre&quot;: &quot;Pedales Shimano Ultegra&quot;,
        &quot;precio&quot;: 150,
        &quot;descripcion&quot;: &quot;Cuerpo de carbono compuesto, ligeros y duraderos.&quot;,
        &quot;imagen&quot;: &quot;img/pedales.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 2200,
        &quot;stock&quot;: 30,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 46,
        &quot;nombre&quot;: &quot;Potenci&oacute;metro Favero Assioma Duo&quot;,
        &quot;precio&quot;: 700,
        &quot;descripcion&quot;: &quot;Medici&oacute;n de potencia en ambos pedales, fiable y preciso.&quot;,
        &quot;imagen&quot;: &quot;img/potenciometro.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 1900,
        &quot;stock&quot;: 5,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 47,
        &quot;nombre&quot;: &quot;Rodillo Wahoo Kickr Core&quot;,
        &quot;precio&quot;: 600,
        &quot;descripcion&quot;: &quot;Entrenamiento indoor silencioso y realista.&quot;,
        &quot;imagen&quot;: &quot;img/rodillo.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 2400,
        &quot;stock&quot;: 3,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 48,
        &quot;nombre&quot;: &quot;Cubierta Continental GP5000 S TR&quot;,
        &quot;precio&quot;: 80,
        &quot;descripcion&quot;: &quot;El neum&aacute;tico tubeless m&aacute;s r&aacute;pido y resistente.&quot;,
        &quot;imagen&quot;: &quot;img/cubierta.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 7000,
        &quot;stock&quot;: 100,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 49,
        &quot;nombre&quot;: &quot;Bomba Topeak JoeBlow Sport&quot;,
        &quot;precio&quot;: 50,
        &quot;descripcion&quot;: &quot;La bomba de pie cl&aacute;sica, robusta y fiable.&quot;,
        &quot;imagen&quot;: &quot;img/bomba.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 800,
        &quot;stock&quot;: 15,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    },
    {
        &quot;id&quot;: 50,
        &quot;nombre&quot;: &quot;Bolsa Sill&iacute;n Ortlieb Micro Two&quot;,
        &quot;precio&quot;: 40,
        &quot;descripcion&quot;: &quot;Impermeable y compacta para llevar herramientas.&quot;,
        &quot;imagen&quot;: &quot;img/bolsa_sillin.jpg&quot;,
        &quot;categoria&quot;: &quot;ciclismo&quot;,
        &quot;visitas&quot;: 600,
        &quot;stock&quot;: 22,
        &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-productos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-productos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-productos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-productos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-productos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-productos" data-method="GET"
      data-path="api/productos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-productos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-productos"
                    onclick="tryItOut('GETapi-productos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-productos"
                    onclick="cancelTryOut('GETapi-productos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-productos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/productos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-productos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-productos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-productos">POST api/productos</h2>

<p>
</p>



<span id="example-requests-POSTapi-productos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/productos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/productos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-productos">
</span>
<span id="execution-results-POSTapi-productos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-productos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-productos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-productos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-productos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-productos" data-method="POST"
      data-path="api/productos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-productos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-productos"
                    onclick="tryItOut('POSTapi-productos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-productos"
                    onclick="cancelTryOut('POSTapi-productos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-productos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/productos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-productos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-productos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-productos--id-">GET api/productos/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-productos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/productos/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/productos/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-productos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;nombre&quot;: &quot;Nike Air Zoom Pegasus 40&quot;,
    &quot;precio&quot;: 130,
    &quot;descripcion&quot;: &quot;La zapatilla de running m&aacute;s fiable y vers&aacute;til para entrenamiento diario.&quot;,
    &quot;imagen&quot;: &quot;img/nike_running_shoe.jpg&quot;,
    &quot;categoria&quot;: &quot;running&quot;,
    &quot;visitas&quot;: 5500,
    &quot;stock&quot;: 20,
    &quot;created_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2026-01-31T22:06:05.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-productos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-productos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-productos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-productos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-productos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-productos--id-" data-method="GET"
      data-path="api/productos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-productos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-productos--id-"
                    onclick="tryItOut('GETapi-productos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-productos--id-"
                    onclick="cancelTryOut('GETapi-productos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-productos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/productos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-productos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-productos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-productos--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the producto. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-productos--id-">PUT api/productos/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-productos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/productos/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/productos/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-productos--id-">
</span>
<span id="execution-results-PUTapi-productos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-productos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-productos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-productos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-productos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-productos--id-" data-method="PUT"
      data-path="api/productos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-productos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-productos--id-"
                    onclick="tryItOut('PUTapi-productos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-productos--id-"
                    onclick="cancelTryOut('PUTapi-productos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-productos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/productos/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/productos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-productos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-productos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-productos--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the producto. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-productos--id-">DELETE api/productos/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-productos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/productos/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/productos/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-productos--id-">
</span>
<span id="execution-results-DELETEapi-productos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-productos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-productos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-productos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-productos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-productos--id-" data-method="DELETE"
      data-path="api/productos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-productos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-productos--id-"
                    onclick="tryItOut('DELETEapi-productos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-productos--id-"
                    onclick="cancelTryOut('DELETEapi-productos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-productos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/productos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-productos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-productos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-productos--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the producto. Example: <code>1</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
