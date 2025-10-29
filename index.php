<?php     
session_start();
if(isset($_SESSION['user_sesion'])){
    $roles_user = $_SESSION['user_sesion']['roles'];
    $nombre_user = $_SESSION['user_sesion']['nombre'];
    if($roles_user !== "cliente"){
        header('Location: dashboard.php');
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La casa del Maestro | ¡Productos de Alta Calidad!</title>
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <link rel="stylesheet" href="assets/css/modal_login.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <header class="header">
        <div class="header-content">
            <a href="#" class="logo">LA CASA DEL MAESTRO</a>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="¿Que deseas buscar hoy?" />
                <button class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div class="header-actions">
                <div class="dropdown">
                    <a href="#" class="header-link" onclick="toggleDropdown(event)">
                        <span class="greeting">Hola,</span>
                        <span class="action">
                            <?php
                                if(isset($nombre_user)){
                                    echo $nombre_user;  
                                }else{
                                    echo "Iniciar Sesión";
                                }
                            ?>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <?php
                            if(!isset($_SESSION['user_sesion'])) {
                                ?>
                                    <a href="#" class="dropdown-item" id="btnLogin">Iniciar Sesión</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item" id="btnRegistrarse">Regístrarse</a>
                                <?php
                            } else {
                                ?>
                                    <div class="dropdown-divider"></div>
                                    <a href="php/cerrar_sesion.php" class="dropdown-item">Cerrar Sesión</a>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <a href="#" class="header-link cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-badge">0</span>
                </a>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="carousel-container">
            <!-- SLIDE 1: -->
            <div class="carousel-slide active"
                style="background-image:   url('https://wallpapers.com/images/featured/cocina-jb1us5vijpv5fs41.jpg');">
            </div>

            <!-- SLIDE 2: -->
            <div class="carousel-slide"
                style="background-image:  url('https://i.pinimg.com/originals/1f/fc/27/1ffc2732fd1f4a03802051f0f38cd7dd.jpg');">
            </div>

            <!-- SLIDE 3:-->
            <div class="carousel-slide"
                style="background-image:  url('https://png.pngtree.com/thumb_back/fh260/background/20230610/pngtree-kitchen-has-different-pots-and-pans-on-it-image_2894675.jpg');">
            </div>
        </div>
        <div class="hero-content">
            <h1>¡Calidad Superior en Cocina, Ferretería y Mucho Mas!</h1>
            <p>Más de 100 años de experiencia en productos premium para tu hogar</p>
        </div>
        <div class="carousel-dots">
            <span class="dot active" onclick="currentSlide(0)"></span>
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
        </div>
    </section>

    <!-- Breadcrumd -->
    <div class="breadcrumb">
        <a href="#"><i class="fas fa-home"></i> Home</a>
        <select name="#" id="#" class="categoria-btn">
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
    <div class="main-content">
        <!-- Products Section -->
        <section class="products-section">
            <div class="sort-container">
                <div style="display: flex; gap: 15px; align-items: center">
                    <span class="sort-label">Ordenar por:</span>
                    <select class="sort-select">
                        <option>Recomendados</option>
                        <option>Menor precio</option>
                        <option>Mayor precio</option>
                        <option>Más vendidos</option>
                    </select>
                </div>
            </div>
            <section class="container" id="productos">
                <h2 class="section-title">Productos Destacados - Cocina</h2>

                <div class="products-grid" id="productsGrid">
                    <!-- PRODUCTO 1:-->
                    <div class="product-card">
                        <img src="https://previews.123rf.com/images/urfingus/urfingus1710/urfingus171000302/87756183-set-of-saucepans-isolated-on-white-background-3d-illustration.jpg"
                            alt="Set de Ollas Premium" class="product-image">
                        <div class="product-brand">Set de Ollas Premium</div>
                        <div class="product-name">
                            Acero inoxidable de alta calidad con fondo térmico tricapa para distribución uniforme del
                            calor
                        </div>
                        <div class="price-container">
                            <div>
                                S/<span class="price">.699.00</span>
                            </div>
                        </div>
                        <!-- <button class="add-to-cart-btn" onclick=""><i class="fas fa-plus"></i></button> -->
                        <button class="product-btn">Añadir al Carrito</button>
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
    <footer class="footer">
        <div class="footer-bottom">
            <div class="social-links">
                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                <a href="#" class="social-link"><i class="fab fa-tiktok"></i></a>
            </div>
            <div class="footer-legal">
                <a href="#">Términos y condiciones</a>
                <a href="#">Política de cookies</a>
                <a href="#">Política de privacidad</a>
            </div>
            <p class="copyright">
                © TODOS LOS DERECHOS RESERVADOS<br />
                Nombre de la Calle no me acuerdo
            </p>
        </div>
    </footer>

    <!-- The Modal LOGIN -->
    <div id="modalLogin" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Iniciar Sesión</h2>
            <form action="php/iniciar_sesion.php" method="POST">
                <label class="labelModal" for="correo">Correo</label>
                <input class="inputGeneral" type="email" name="ucorreo" id="correo" placeholder="Ingresa tu usuario" />
                <label class="labelModal" for="password">Contraseña</label>
                <input name="upass" type="password" id="password" class="inputGeneral"
                    placeholder="Ingresa tu contraseña" />
                <button type="submit" class="btnEntrarLogin">Entrar</button>
            </form>
        </div>
    </div>

    <div id="modalRegistrarUser" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
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