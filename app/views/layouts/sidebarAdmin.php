<aside class="navigation d-none d-sm-block shadow">
  <i class="ti ti-circle-arrow-left-filled"></i>
  <ul class="p-0 h-100 d-flex flex-column">
    <li class="p-3 d-flex justify-content-center mb-3">
      <img src="./app/views/img/logo2.png" alt="" class="w-100" style="max-width:192px; height:auto">
    </li>
    <hr>
    <li class="ps-3">
      <a href="dashboard">
        <i class="ti ti-chart-histogram icon"></i>
        <span class="title">Dashboard</span>
      </a>
    </li>
    <hr>
    <li class="ps-3">
      <a href="products">
        <i class="ti ti-building-store icon"></i>
        <span class="title">Productos</span>
      </a>
    </li>
    <hr>
    <li class="ps-3">
      <a href="orders">
        <i class="ti ti-clipboard-text icon"></i>
        <span class="title">Ordenes-Pedidos</span>
      </a>
    </li>
    <hr>
    <li class="ps-3">
      <a href="users">
        <i class="ti ti-users icon"></i>
        <span class="title">Usuarios</span>
      </a>
    </li>
    <hr>
    <li class="ps-3">
      <a href="frequentQuetions">
        <i class="ti ti-message-2-question icon"></i>
        <span class="title">Preguntas Frecuentes</span>
      </a>
    </li>
    <hr>
    <li class="ps-3">
      <a href="complaintsBook">
        <i class="ti ti-address-book icon"></i>
        <span class="title">Libro de Reclamaciones</span>
      </a>
    </li>
    <hr>

    <li class="ps-3 pb-3 mt-auto">
      <a href="#" id="btn-logout" data-bs-toggle="modal" data-bs-target="#modal-logout">
        <i class="ti ti-logout icon"></i>
        <span class="title">Cerrar sesión</span>
      </a>
    </li>
  </ul>
</aside>

<div class="offcanvas offcanvas-start d-flex d-sm-none" data-bs-backdrop="static" tabindex="-1" id="nav-mobile"
  style="background:#343541">
  <div class="offcanvas-header">
    <i class="ti ti-x text-light ms-auto icon-btn" data-bs-dismiss="offcanvas" data-bs-target="#nav-mobile"></i>
  </div>
  <div class="offcanvas-body">
    <ul class="nav flex-column fs-4">
      <li class="d-flex justify-content-center mb-2">
        <img src="./app/views/img/logo2.png" alt="" class="img-fluid w-75">
      </li>
      <li class="nav-item">
        <a class="nav-link text-light <?php echo $url[0] === "dashboard" ? "active" : "" ?>" href="dashboard">
          <i class="ti ti-chart-histogram icon"></i>
          <span class="title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light <?php echo $url[0] === "products" ? "active" : "" ?>" href="products">
          <i class="ti ti-building-store icon"></i>
          <span class="title">Productos</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light <?php echo $url[0] === "orders" ? "active" : "" ?>" href="orders">
          <i class="ti ti-clipboard-text icon"></i>
          <span class="title">Ordenes-Pedidos</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light <?php echo $url[0] === "users" ? "active" : "" ?>" href="users">
          <i class="ti ti-users icon"></i>
          <span class="title">Usuarios</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light <?php echo $url[0] === "frequentQuetions" ? "active" : "" ?>"
          href="frequentQuetions">
          <i class="ti ti-message-2-question icon"></i>
          <span class="title">Preguntas Frecuentes</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light <?php echo $url[0] === "complaintsBook" ? "active" : "" ?>" href="complaintsBook">
          <i class="ti ti-address-book icon"></i>
          <span class="title">Libro de Reclamaciones</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#" id="btn-logout" data-bs-toggle="modal" data-bs-target="#modal-logout">
          <i class="ti ti-logout icon"></i>
          <span>Cerrar sesión</span>
        </a>
      </li>
    </ul>
  </div>
</div>

<!-- Modal Logout-->
<div class="modal fade" id="modal-logout" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Cerrar Sesión</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo "¿" . $_SESSION["name"] ?> estás seguro que deseas cerrar sesión?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger w-25" id="logout">Sí</button>
      </div>
    </div>
  </div>
</div>

<script>
  const btnLogout = document.getElementById("logout");

  const links = Array.from(document.querySelectorAll('.navigation ul li a'));
  const anchorList = Array.from(document.querySelectorAll('.navigation ul li a'));
  const currentLocation = location.pathname.split('/').pop();
  const icon = document.querySelector('.ti-circle-arrow-left-filled');
  const navigation = document.querySelector('.navigation');
  const toggle = localStorage.getItem('toggle') ?? "";

  if (toggle === 'active') {
    icon.classList.add('active');
    navigation.classList.add('active');
  }

  icon.onclick = function () {
    icon.classList.toggle('active');
    navigation.classList.toggle('active');
    localStorage.setItem('toggle', icon.classList.contains('active') ? 'active' : '');
  }

  for (let i = 0; i < links.length; i++) {
    if (anchorList[i].attributes.href.value === currentLocation) {
      links[i].classList.add("active");
    }
  }

  btnLogout?.addEventListener("click", () => {
    userLogout().then((res) => {
      window.location.href = "http://localhost/foodlicious/login";
    });
  });
</script>