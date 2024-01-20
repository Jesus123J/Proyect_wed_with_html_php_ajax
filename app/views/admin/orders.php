<main class="d-flex flex-column main p-4 gap-4">
  <i class="ti ti-menu-2 fs-1 d-sm-none mb-2" data-bs-toggle="offcanvas" data-bs-target="#nav-mobile"></i>
  <div class="search">
    <label>
      <input type="text" placeholder="Busque aqui">
      <ion-icon name="search-outline"></ion-icon>
    </label>
  </div>
  <div class="table-container" style="max-height: 800px; overflow-y: auto;">
    <table class="table table-hover">
      <thead>
        <tr>
        <th scope="col">#</th>
          <th scope="col">DNI</th>
          <th scope="col">FECHA </th>
          <th scope="col">DIRECCION</th>
          <th scope="col">TOTAL</th>
          <th scope="col">ESTATUS</th>
          <th scope="col">Editar</th>
        </tr>
      </thead>
      <tbody id="productTableBody">
        <!-- Aquí se agregarán los datos de productos -->
      </tbody>
    </table>
  </div>
</main>
<!-- Modal Update Orders-->
<div class="modal fade" id="modal-update-order" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Editar Orden</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
      </div>
      <div class="modal-body">
            <select class="form-select form-control" name="genre">
              <option selected disabled>Seleccione el estado</option>
              <option value="En Proceso">En Proceso</option>
              <option value="En Camino">En Camino</option>
              <option value="Entregado">Entregado</option>
            </select>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="btn-update-order">Guardar</button>
      </div>
    </div>
  </div>
</div>
<script type="module" src="./app/views/js/ordersAdminShow.js"></script>

