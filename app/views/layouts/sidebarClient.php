<aside class="aside-client bg-light shadow p-3 rounded d-flex flex-column w-25"
  style="height: min-content; min-width: 240px;">
  <div class="d-flex gap-3">
    <img class="img-thumbnail border-0 shadow-lg rounded-circle p-1 m-1" id="img-genre" />
    <div>
      <h6 class="text-muted">Mi perfil</h6>
      <p class="fw-bold" id="user-name">
        <?php echo $_SESSION["name"] ?>
      </p>
    </div>
  </div>
  <hr />
  <ul class="navbar-nav gap-2 text-muted fw-bold">
    <li class="nav-item d-flex gap-2 align-items-center">
      <i class="ti ti-user-edit icon-menu"></i>
      <a class="nav-link" href="myAccount">Mi cuenta</a>
    </li>
    <li class="nav-item d-flex gap-2 align-items-center">
      <i class="ti ti-list icon-menu"></i>
      <a class="nav-link" href="myOrders">Mis ordenes</a>
    </li>
  </ul>
  <hr>
  <a class="btn btn-primary d-flex align-items-center justify-content-center gap-2" href="products" role="button">
    <i class="ti ti-building-store icon-menu text-white"></i>
    <p class="mb-0"> Regresar a la tienda</p>
  </a>
</aside>

<script type="module" src="./app/views/js/layoutsSidebarClient.js"></script>