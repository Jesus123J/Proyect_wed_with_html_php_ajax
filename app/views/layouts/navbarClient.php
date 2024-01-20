<header class="header-c shadow">
  <nav class="navbar navbar-expand-lg bg-light py-3">
    <div class="container-fluid">
      <i class="ti ti-menu-2 btn-icon w-auto" data-bs-toggle="offcanvas" data-bs-target="#menu"></i>
      <div class="vr mx-3"></div>
      <img class="mw-100 h-auto my-1 img-fluid d-sm-block d-none" src="<?php echo APP_URL ?>app/views/img/logo3.png"
        alt="foodlicious">
      <div class="shopping-cart me-2 ms-auto">
        <i class="position-relative ti ti-shopping-cart" data-bs-toggle="offcanvas" data-bs-target="#cart-list"
          id="btn-cart"></i>
        <span id="qty-products" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          0
        </span>
      </div>
    </div>
  </nav>
</header>

<div class="offcanvas offcanvas-start" tabindex="-1" id="menu">
  <div class="offcanvas-header">
    <img class="mw-100 h-auto mt-3" src="<?php echo APP_URL ?>app/views/img/logo3.png" alt="foodlicious">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav gap-2 fw-bolder text-muted">
      <hr>
      <?php if ($role === "Client") { ?>
        <li class="nav-item d-flex flex-column gap-1">
          <h2 class="text-dark">Bienvenido
            <?php echo $_SESSION["name"] ?>
          </h2>
          <a class="nav-link d-flex gap-2 align-items-center" href="myAccount"><i class="ti ti-user-edit icon-menu"></i>Mi
            Cuenta</a>
          <a class="nav-link d-flex gap-2 align-items-center" href="myOrders"><i class="ti ti-list icon-menu"></i>Mis
            Ordenes</a>
        </li>
      <?php } else { ?>
        <a class="btn btn-dark w-75 mx-auto mb-2" href="login" role="button">Iniciar Sesión</a>
        <a class="btn btn-outline-dark w-75 mx-auto" href="register" role="button">Registrarse</a>
      <?php } ?>
      <hr>
      <h2 class="text-dark">Categorías</h2>
      <li class="nav-item d-flex gap-2" data-bs-dismiss="offcanvas">
        <img class="img-thumbnail" src="<?php echo APP_URL ?>app/views/img/diet.png" alt="">
        <a class="nav-link category active" href="#Hamburguesas">Hamburguesas</a>
      </li>
      <li class="nav-item d-flex gap-2" data-bs-dismiss="offcanvas">
        <img class="img-thumbnail" src="<?php echo APP_URL ?>app/views/img/pizza.png" alt="">
        <a class="nav-link category" href="#Pizzas">Pizzas</a>
      </li>
      <li class="nav-item d-flex gap-2" data-bs-dismiss="offcanvas">
        <img class="img-thumbnail" src="<?php echo APP_URL ?>app/views/img/soft-drink.png" alt="">
        <a class="nav-link category" href="#Bebidas">Bebidas</a>
      </li>
      <li class="nav-item d-flex gap-2" data-bs-dismiss="offcanvas">
        <img class="img-thumbnail" src="<?php echo APP_URL ?>app/views/img/sweets.png" alt="">
        <a class="nav-link category" href="#Postres">Postres</a>
      </li>
      <?php if ($role === "Client") { ?>
        <hr>
        <button class="btn btn-danger d-flex align-items-center justify-content-center" data-bs-toggle="modal"
          data-bs-target="#modal-logout">
          <i class="ti ti-logout icon-logout"></i>
          <p class="fw-bolder mb-0"> Cerrar Sesión</p>
        </button>
      <?php } ?>
      <button id="upload-widget" class="btn btn-primary">Subir</button>
    </ul>
  </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="cart-list">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title me-1">Lista de compras:</h5>
    <span class="nav-total-price mb-0 bg-success py-1 px-2 text-success fw-bold bg-opacity-25 me-auto rounded">S/.
      0.00</span>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="alert alert-danger fade-in mx-3" id="alert-cart">
    No hay productos en el carrito 😔
  </div>
  <div class="offcanvas-body" id="cart-list-items">
  </div>
  <hr>
  <button type="button" class="btn btn-success mb-1 mx-3" id="btn-checkout">Procesar orden</button>
  <button type="button" class="btn btn-secondary mb-3 mx-3" id="btn-clean">Limpiar carrito</button>
</div>

<!-- Modal Success Order-->
<div class="modal fade" id="success-order" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="gif-modal mx-auto">
          <iframe src="https://lottie.host/?file=25302f0d-fb54-4074-ad22-0625dddb6279/1OQBHG5T24.json"></iframe>
        </div>
        <h6 class="text-center">
          Felicidades tu orden fue registrada con éxito!!!!
        </h6>
      </div>
      <button type="button" class="btn btn-secondary mx-auto w-50 mb-4" data-bs-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>

<!-- Modal Logout-->
<div class="modal fade" id="modal-logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Cerrar Sesión</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿
        <?php echo $_SESSION["name"] ?> estás seguro que deseas cerrar sesión?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger w-25" id="logout">Sí</button>
      </div>
    </div>
  </div>
</div>

<script type="module" src="./app/views/js/layoutsNavbar.js"></script>