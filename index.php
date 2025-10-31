<?php   // INICIO DEL PHP:
session_start();    // Inicia o Reanuda una existente, permite acceder a las variables en "$_SESION".
if(isset($_SESSION['user_sesion'])){    // Verifica si existe la variable de sesión 'user_sesion'.
    # Extraen de la sesión los datos del usuario:
    $roles_user = $_SESSION['user_sesion']['roles'];    // El rol del usuario (admin, cliente, cajero).
    $nombre_user = $_SESSION['user_sesion']['nombre'];  // Nombre del usuario.
    if($roles_user !== "cliente"){  // Comprueba si el rol no es "cliente".
        header('Location: dashboard.php');  // Si no lo es, redirige al usuario a 'dashboard.php'.
    }
}
?>  <!-- CIERRE DEL PHP. -->

<!DOCTYPE html> <!-- Version actual del estandar web, "HTML5" -->
<html lang="es">    <!-- Idioma del contenido de la web -->

<head>  <!-- Etiqueta. -->
    <meta charset="UTF-8">  <!-- Permite mostrar caracteres especiales (ñ, tildes, $, &, @). -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- Permite que el sitio web sea responsive, que se adapte a móviles, tables, etc. -->
    <title>La casa del Maestro | ¡Productos de Alta Calidad!</title>    <!-- Titulo de pestaña de navegador. -->    
    <!-- Hojas de estilo CSS: -->
    <link rel="stylesheet" href="assets/css/styles.css" />  <!-- Estilos principales. -->
    <link rel="stylesheet" href="assets/css/responsive.css" />  <!-- Adaptaciones para móviles -->
    <link rel="stylesheet" href="assets/css/modal_login.css">   <!-- Estilos específicos del modal de inicio de sesión. -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>      
    <!-- SweetAlert2 (Libreria) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>  <!-- Etiqueta. -->
    <header class="header"> <!-- Etiqueta principal del encabezado: -->
        <div class="header-content">    <!-- Contenedor interno. -->
            <a href="#" class="logo">LA CASA DEL MAESTRO</a>    <!-- Logo y tema de la pagina. -->
            <div class="search-container">
                <input type="text" class="search-input" placeholder="¿Que deseas buscar hoy?"/> <!-- Campo donde el usuario escribe lo que quiere buscar. -->
                <button class="search-btn"> <!-- Botón que acompaña al "input". -->
                    <i class="fas fa-search"></i>   <!-- Icono de Font Awesome. -->
                </button>
            </div>
            <!-- ZONA IMPORTANTE DEL USUARIO (Iniciar sesión y Cerrar sesión). -->
            <div class="header-actions">    
                <!-- MENU DESPLEGABLE -->
                <div class="dropdown">  
                    <a href="#" class="header-link" onclick="toggleDropdown(event)">    <!-- Mostrar y ocultar el menu desplegable. -->
                        <span class="greeting">Hola,</span> <!-- Muestra un texto decorativo (Utilizado para CSS). -->
                        <span class="action">   <!-- Mostrara accion del menu desplegable. -->
                            <?php
                                if(isset($nombre_user)){    // Comprueba si existe la variable '$nombre_user' y si tiene valor.
                                    echo $nombre_user;  // Si el usuario ya inicio sesión, mostrara su nombre.
                                }else{
                                    echo "Iniciar Sesión";  // Si no hay usuario activo, mostrara "Iniciar Sesión".
                                }
                            ?>
                        </span>
                    </a>
                    <div class="dropdown-menu"> <!-- Aparece al hacer click en el usuario. -->
                        <?php
                            if(!isset($_SESSION['user_sesion'])) {  // Verifica si NO existe una sesión activa:
                                ?>
                                    <!-- Si no hay mostrara el formulario del login: -->
                                    <a href="#" class="dropdown-item" id="btnLogin">Iniciar Sesión</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item" id="btnRegistrarse">Regístrarse</a>
                                <?php
                            } else {
                                ?>
                                    <!-- Si hay sesión mostrara solo la opción de "Cerrar Sesión". -->
                                    <div class="dropdown-divider"></div>    <!-- Linea separadora (solo CSS) -->
                                    <a href="php/cerrar_sesion.php" class="dropdown-item">Cerrar Sesión</a>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <a href="#" class="header-link cart-icon">  <!-- "header-link" = Enlace del encabezado, "cart-icon" = Estilo especifico del icono. -->  
                    <i class="fas fa-shopping-cart"></i>    <!-- Icono de Font Awesome. -->
                    <span class="cart-badge">0</span>   <!-- Contador que moestra la cantidad de productos. --> 
                </a>
            </div>
        </div>
    </header>

    <!-- CARRUSEL DE IMAGENES: -->
    <section class="hero">  <!-- Define una sección grande de presentación al inicio del sitio web. -->
        <div class="carousel-container">    <!-- Contenedor principal del carrusel (sliders). -->
            <!-- SLIDE 1: -->
            <!-- El ".active" indica que esta visible. -->
            <div class="carousel-slide active" style="background-image: url('https://wallpapers.com/images/featured/cocina-jb1us5vijpv5fs41.jpg');"></div>

            <!-- SLIDE 2: -->
            <div class="carousel-slide" style="background-image: url('https://i.pinimg.com/originals/1f/fc/27/1ffc2732fd1f4a03802051f0f38cd7dd.jpg');"></div>

            <!-- SLIDE 3: -->
            <div class="carousel-slide" style="background-image:  url('https://png.pngtree.com/thumb_back/fh260/background/20230610/pngtree-kitchen-has-different-pots-and-pans-on-it-image_2894675.jpg');"></div>
        </div>
        <div class="hero-content">  <!-- Capa de texto del carrusel. -->
            <h1>¡Calidad Superior en Cocina, Ferretería y Mucho Mas!</h1>
            <p>Más de 100 años de experiencia en productos premium para tu hogar</p>
        </div>
        <div class="carousel-dots"> <!-- Contiene los botones circulares que permiten navegar entre las imagenes. -->
            <!-- Cada <span class="dot"> representa una diapositiva, cada "dot" tiene un evento. -->
            <span class="dot active" onclick="currentSlide(0)"></span>  <!-- El ".active" indica que esta visible. --> 
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
        </div>
    </section>

    <!-- Breadcrumd -->
    <div class="breadcrumb">    <!-- Muestra la ubicación del usuario dentro del sitio web. -->    
        <a href="#">   <!-- No redirige a ningun otra parte. --> 
            <i class="fas fa-home"></i> Home</a>    <!-- Icono de Font Awesome. -->
        <select name="#" id="#" class="categoria-btn">  <!-- Menu selector desplegable de categoria de productos. -->
            <!-- Categorias -->
            <option value="">Explorar Categorias</option>
            <option value="">Cocina</option>
            <option value="">Muebles</option>
            <option value="">Dormitorio</option>
            <option value="">Iluminación</option>
            <option value="">Baños</option>
            <option value="">ElectroHogar</option>
            <option value="">Pisos y Ceramicos</option>
            <option value="">Ferretería</option>
            <option value="">Construcción</option>
            <option value="">Herramientas</option>
            <option value="">Pinturas y Acabados</option>
            <option value="">Electricidad</option>
            <option value="">Gasfitería</option>
        </select>
    </div>

    <!-- Main Content -->
    <div class="main-content">  <!-- Contenedor Principal. -->
        <!-- Products Section -->
        <section class="products-section">  <!-- Define una sección dedicada a los productos. -->
            <div class="sort-container">    <!-- Opciones de ordenamiento (menor a mayor). -->
                <div style="display: flex; gap: 15px; align-items: center"> <!-- Aplica un diseño flexible para alinear los elementos horizontalmente. -->
                    <span class="sort-label">Ver:</span>    <!-- Etiqueta de texto que acompaña al selector. -->
                    <select class="sort-select">    <!-- Menu desplegable que ofrece distintas formas de ordenar productos. -->
                        <option>Recomendados</option>
                        <option>Menor precio</option>
                        <option>Mayor precio</option>
                        <option>Más vendidos</option>
                    </select>
                </div>
            </div>
            <!-- Contenedores principal de productos. -->
            <section class="container" id="productos">
                <!-- Titulo de la sección: -->
                <h2 class="section-title">Productos Destacados - Cocina</h2>
                <div class="products-grid" id="productsGrid">   <!-- Contenedor que agrupa todas las tarjetas de productos. -->
                    <!-- PRODUCTO 1: -->
                    <div class="product-card">  <!-- Tarjeta de producto. -->
                        <!-- Muestra la imagen del producto. -->
                        <img src="https://previews.123rf.com/images/urfingus/urfingus1710/urfingus171000302/87756183-set-of-saucepans-isolated-on-white-background-3d-illustration.jpg" alt="Set de Ollas Premium" class="product-image">   <!-- "alt" = atributo que sirve como texto alternativo. -->
                        <div class="product-brand">Set de Ollas Premium</div>   <!-- Nombre comercial o principal del producto. -->
                        <!-- Decripción corta del producto. -->
                        <div class="product-name">
                            Acero inoxidable de alta calidad con fondo térmico tricapa para distribución uniforme del
                            calor
                        </div>
                        <div class="price-container">   <!-- Encierra el precio dentro de un contenedor para darle estilos (CSS). -->
                            <div>
                                S/<span class="price">.699.00</span>    <!-- Aplica un formato especifico al número. -->
                            </div>
                        </div>
                        <!-- <button class="add-to-cart-btn" onclick=""><i class="fas fa-plus"></i></button> -->
                        <button class="product-btn">Añadir al Carrito</button>  <!-- Boton principal, permite agregar un producto al carrito de compras. -->
                    </div>

                    <!-- PRODUCTO 2:-->
                    <div class="product-card">
                        <img src="https://http2.mlstatic.com/D_NQ_NP_834202-MPE69761501236_062023-O-juego-de-sartenes-antiadherentes-de-3-piezas-de-8-10-y.webp"
                            alt="Sartén Antiadherente" class="product-image">
                        <div class="product-brand">Sartén Antiadherente</div>
                        <div class="product-name">
                            Revestimiento cerámico de grado profesional, resistente a altas temperaturas y libre de PFOA
                        </div>
                        <div class="price-container">
                            <div>
                                S/<span class="price">.168.03</span>
                            </div>
                        </div>
                        <!-- <button class="add-to-cart-btn" onclick=""><i class="fas fa-plus"></i></button> -->
                        <button class="product-btn">Añadir al Carrito</button>
                    </div>

                    <!-- PRODUCTO 3:-->
                    <div class="product-card">
                        <img src="https://www.inche.com.pe/wp-content/uploads/2022/10/123804-05.jpg"
                            alt="Set de Cuchillos" class="product-image">
                        <div class="product-brand">Set de Cuchillos Profesional</div>
                        <div class="product-name">
                            Acero alemán forjado con mango ergonómico, incluye bloque de madera de bambú
                        </div>
                        <div class="price-container">
                            <div>
                                S/<span class="price">.199.90</span>
                            </div>
                        </div>
                        <!-- <button class="add-to-cart-btn" onclick=""><i class="fas fa-plus"></i></button> -->
                        <button class="product-btn">Añadir al Carrito</button>
                    </div>
                </div>
            </section>
    </div>

    <!-- Footer -->
    <footer class="footer"> <!-- "<footer>" Etiqueta Semantica HTML que indica el pie de pagina. --> 
        <div class="footer-bottom"> <!-- Agrupa el contenido del pie (CSS). --> 
            <div class="social-links">  <!-- Contiene los iconos de redes sociales. -->
                <!-- Cada enlace "<a>" usa una clase de Font Awesome -->
                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>   <!-- "fab" = Font Awesome Brand (Marca o red social). -->
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                <a href="#" class="social-link"><i class="fab fa-tiktok"></i></a>
            </div>
            <div class="footer-legal">  <!-- El atributo contiene los enlaces obligatorios o informativos. -->
                <a href="#">Términos y condiciones</a>
                <a href="#">Política de cookies</a>
                <a href="#">Política de privacidad</a>
            </div>
            <p class="copyright">   <!-- Muestra la frase de derechos reservados del sitio, incluye el © y el simbolo de direccion de la empresa. -->
                © TODOS LOS DERECHOS RESERVADOS<br />
                Nombre de la Calle no me acuerdo
            </p>
        </div>
    </footer>

    <!-- The Modal LOGIN -->
    <div id="modalLogin" class="modal"> <!-- Contenedor principal del modal. -->
        <!-- Modal content -->
        <div class="modal-content"> <!-- Es el cuerpo del modal, la ventana que aparece encima (es la caja blanca centrada donde el usuario interactúa). -->
            <span class="close">&times;</span>  <!-- Muestra una "x" para cerrar el modal. -->
            <h2>Iniciar Sesión</h2>
            <form action="php/iniciar_sesion.php" method="POST">    <!-- Inicia el formulario de inicio de sesión. -->
                <label class="labelModal" for="correo">Correo</label>   <!-- El "<label>" muestra el texto "correo". -->
                <input class="inputGeneral" type="email" id="correo" name="usercorreo" placeholder="Ingresa tu usuario" />  <!-- El "<input>" es de tipo "email", asi que el navegador validará que tenga el formato de correo. 
                                                                                                                                El atributo name"usercorreo" es el nombre de variable que PHP usará para recibir el valor. -->
                <label class="labelModal" for="password">Contraseña</label>
                <input class="inputGeneral" type="password" id="password" name="userpass" placeholder="Ingresa tu contraseña" />    <!-- type="password" oculta los caracteres al escribir.
                                                                                                                                name="userpass" será la clave para leer la contraseña en PHP "($_POST['userpass'])". -->
                <button type="submit" class="btnEntrarLogin">Entrar</button>    <!-- Envia los datos al archivo PHP configurado en "action" (Cuando se hace click, se valida el usuario con PHP y la base de datos). -->
            </form>
        </div>
    </div>

    <div id="modalRegistrarUser" class="modal"> <!-- Contenedor principal del modal de registro. --> 
        <!-- Modal content -->
        <div class="modal-content"> <!-- Contiene el contenido visible del formulario. -->
            <span class="closeRUser">&times;</span>
            <h2>Registrar Usuario</h2>
            <form action="php/registrar_usuario.php" method="POST">
                <label class="labelModal" for="nombre_completo">Nombre Completo</label>
                <input class="inputGeneral" type="text" id="nombre_completo" name="nom_comp"
                    placeholder="Ingresa tu usuario" />
                <label class="labelModal" for="correo">Correo</label>
                <input class="inputGeneral" type="text" id="correo" name="correo"
                    placeholder="Ingresa tu Correo Electrónico" />
                <label class="labelModal" for="password">Contraseña</label>
                <input name="pass" type="password" id="password" class="inputGeneral"
                    placeholder="Ingresa tu contraseña" />
                <button type="submit" class="btnEntrarLogin">Entrar</button>
            </form>
        </div>
    </div>

    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/carousel.js"></script>
    <script src="assets/js/modal_login.js"></script>
    <script src="assets/js/modal_registrarse_usuario.js"></script>

    <?php 
    if(isset($_GET['msj'])){
        if($_GET['msj'] == "ok"){
        ?>
            <script>
                Swal.fire({
                icon: "success",
                title: "Registrado",
                text: "¡Usted esta registrado en el sistema!",
                });
            </script>
        <?php
        }else{
        ?>
            <script>
                Swal.fire({
                icon: "error",
                title: "Oops!",
                text: "¡Usted no esta registrado en el sistema!",
                });
            </script>
        <?php
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error'] == "user"){
        ?>
            <script>
                Swal.fire({
                icon: "error",
                title: "Oops!",
                text: "¡Contraseña o Correo incorrecta!",
                });
            </script>
        <?php
        }
    }


    ?>
</body>

</html>