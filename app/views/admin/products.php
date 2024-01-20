<main class="d-flex flex-column main p-4 gap-4">
  <i class="ti ti-menu-2 fs-1 d-sm-none mb-2" data-bs-toggle="offcanvas" data-bs-target="#nav-mobile"></i>
  <div class="d-flex flex-sm-row flex-column justify-content-between gap-2">
    <form class="d-flex gap-2 flex-sm-row flex-column" id="form-question-find">
      <select class="form-select" id="select-frequent-questions">
        <option value="all">Todos</option>
        <option value="category">Por Categoria</option>
        <option value="name">Por Nombre</option>
      </select>
      <input class="form-control d-none" type="search" id="input-search" style="max-width:250px">
      <button type="button" class="btn btn-secondary" id="btn-search" data-bs-dismiss="modal"
        style="background-color : #715c20">buscar</button>
    </form>
    <button class="btn btn-outline-primary" data-bs-toggle="modal" id="btnCrear" data-bs-target="#register-modal"
      style="min-width:min-content; height:min-content">Crear Producto</button>
  </div>
  <div class="table-container" style="max-height: 800px; overflow-y: auto;">
    <table class="table table-hover">
      <thead style="position: sticky; top: 0; background-color: black; z-index: 1; color: white;">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Precio</th>
          <th scope="col">Categoría</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody id="productTableBody">
        <!-- Aquí se agregarán los datos de productos -->
      </tbody>
    </table>
  </div>

  <!---->
</main>
<!-- MODAL PRODUCT UPDATE -->
<div class="modal fade" id="edit-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Editar Producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body-edit">
        <form class="form d-flex flex-column gap-3" id="form-edit-product">
          <div class="form-group mb-3">
            <label class="form-label" for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" placeholder="Ingresa un Nombre" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="price">Precio:</label>
            <input type="text" class="form-control edtPrice" name="price" placeholder="Ingresa un Priceo"
              autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="select-frequent-questions">Categoría:</label>
            <div class="input-group">
              <select class="form-control" id="selectValueProduct">
                <option value="">SELECCIONE UNA CATEGORIA</option>
                <option value="hamburguesas">HAMBURGUESAS</option>
                <option value="pizzas">PIZZA</option>
                <option value="bebidas">BEBIDAS</option>
                <option value="postres">POSTRES</option>
              </select>
            </div>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="imagen">Imagen:</label>
            <input type="file" id="upload-widget2" class="form-control" name="imagen" accept="image/*">
            
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-edit"
          style="background-color: #715c20">Editar Producto</button>
      </div>

    </div>
  </div>
</div>
<!-- MODAL PRODUCT REGISTER -->
<div class="modal fade" id="register-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Registrar Producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body-register">
        <form class="form d-flex flex-column gap-3" id="form-register-product">

          <div class="form-group mb-3">
            <label class="form-label" for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" placeholder="Ingresa un Nombre " autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="price">Precio:</label>
            <input type="text" class="form-control edtPrice" name="price" placeholder="Ingresa un Priceo"
              autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="select-frequent-questions">Categoría:</label>
            <div class="input-group">
              <select class="form-control" id="select-Category-products">
                <option value="">SELECCIONE UNA CATEGORIA</option>
                <option value="hamburguesa">HAMBURGUESAS</option>
                <option value="pizza">PIZZA</option>
                <option value="bebidas">BEBIDAS</option>
                <option value="postres">POSTRES</option>
              </select>
            </div>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="imagen">Imagen:</label>
            <input type="file" id="upload-widget" class="form-control" name="imagen" accept="image/*">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn-register-product" data-bs-dismiss="modal"
          style="background-color : #715c20">Guardar Producto</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
          id="btn-register-question">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL DELETE PRODUCT -->
<div class="modal fade" id="customModal" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="customModalLabel">ATENCIÓN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Está seguro de que desea eliminar este producto? Esto también eliminará las órdenes asociadas.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
      </div>
    </div>
  </div>
</div>
<script type="module" src="./app/views/js/productAdminShow.js"></script>