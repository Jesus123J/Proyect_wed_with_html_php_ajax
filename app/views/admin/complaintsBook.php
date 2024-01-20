<main class="d-flex p-4 flex-column gap-4">
  <i class="ti ti-menu-2 fs-1 d-sm-none mb-2" data-bs-toggle="offcanvas" data-bs-target="#nav-mobile"></i>
  <h1>Libro de Reclamaciones</h1>
  <form class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Busca por nombre">
    <button class="btn btn-outline-success" type="submit">Buscar</button>
  </form>
  <div class="w-100">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Orden ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Email</th>
          <th scope="col">Fecha de Creación</th>
          <th scope="col">Reclamo</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody id="table-complaint">
      </tbody>
    </table>
  </div>
</main>

<script type="module" src="./app/views/js/adminComplaintsBook.js"></script>