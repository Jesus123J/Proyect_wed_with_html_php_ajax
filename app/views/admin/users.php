<main class="d-flex p-4 flex-column gap-4">
  <i class="ti ti-menu-2 fs-1 d-sm-none mb-2" data-bs-toggle="offcanvas" data-bs-target="#nav-mobile"></i>
  <h1 class="text-center">Usuarios</h1>
  <div class="d-flex flex-sm-row flex-column justify-content-between gap-2">
    <form class="d-flex gap-2 flex-sm-row flex-column" id="form-user-find">
      <select class="form-select" id="select-users">
        <option value="all">Todos</option>
        <option value="dni">Por Dni</option>
        <option value="name">Por Nombre</option>
      </select>
      <input class="form-control d-none" type="search" id="input-search" style="max-width:250px">
      <button class="btn btn-outline-success" type="submit" style="min-width:min-content">Buscar</button>
    </form>
    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-create-user"
      style="min-width:min-content; height:min-content">Registrar Usuarios</button>
  </div>
  <div class="w-100 overflow-auto shadow">
    <table class="table table-striped mb-0">
      <thead class="table-dark">
        <tr class="align-middle text-center">
          <th scope="col">#</th>
          <th scope="col">Dni</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Género</th>
          <th scope="col">Correo</th>
          <th scope="col">Teléfono</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody id="table-users">
      </tbody>
    </table>
  </div>
</main>

<!-- Modal Create User-->
<div class="modal fade" id="modal-create-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Registrar Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="d-flex flex-column" autocomplete="off" id="form-create-user">
          <div class="form-group mb-3">
            <label class="form-label" for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" placeholder="Ingresa tu(s) nombre(s)"
              autocomplete="off">
            <div class="invalid-feedback">El nombre debe contener al menos 2 letras</div>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="lastname">Apellidos:</label>
            <input type="text" class="form-control" name="lastname" placeholder="Ingresa tus apellidos">
            <div class="invalid-feedback">El apellido debe contener al menos 2 letras</div>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="email">Correo electrónico:</label>
            <input type="text" class="form-control" name="email" placeholder="Gmail o Outlook">
            <div class="invalid-feedback">Formato de correo no válido</div>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="dni">Dni:</label>
            <input type="text" class="form-control" name="dni" placeholder="Ingresa tu dni">
            <div class="invalid-feedback">
              El dni debe contener 8 dígitos
            </div>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="password">Contraseña:</label>
            <input type="password" class="form-control" name="password"
              placeholder="Debe contener al menos un símbolo y una mayúscula">
            <div class="invalid-feedback">Formato de contraseña no válido</div>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="phone">Celular:</label>
            <input type="text" class="form-control" name="phone" placeholder="Ingrese su número de celular">
            <div class="invalid-feedback">Formato no válido</div>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="genre">Género</label>
            <select class="form-select form-control" name="genre">
              <option selected disabled>Seleccione su género</option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
            </select>
            <div class="invalid-feedback">Debe seleccionar un género</div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="btn-create-user">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Update User-->
<div class="modal fade" id="modal-update-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Editar Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="d-flex flex-column" autocomplete="off" id="form-update-user">
          <div class="form-group mb-3">
            <label class="form-label" for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" placeholder="Ingresa tu(s) nombre(s)"
              autocomplete="off">
            <div class="invalid-feedback">El nombre debe contener al menos 2 letras</div>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="lastname">Apellidos:</label>
            <input type="text" class="form-control" name="lastname" placeholder="Ingresa tus apellidos">
            <div class="invalid-feedback">El apellido debe contener al menos 2 letras</div>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="email">Correo electrónico:</label>
            <input type="text" class="form-control" name="email" placeholder="Gmail o Outlook">
            <div class="invalid-feedback">Formato de correo no válido</div>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="phone">Celular:</label>
            <input type="text" class="form-control" name="phone" placeholder="Ingrese su número de celular">
            <div class="invalid-feedback">Formato no válido</div>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="genre">Género</label>
            <select class="form-select form-control" name="genre">
              <option selected disabled>Seleccione su género</option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
            </select>
            <div class="invalid-feedback">Debe seleccionar un género</div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="btn-update-user">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete User-->
<div class="modal fade" id="modal-delete-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Eliminar Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body-delete">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn-delete-user">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<script type="module" src="./app/views/js/adminUsers.js"></script>