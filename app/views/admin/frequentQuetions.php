<main class="d-flex p-4 flex-column gap-4">
  <i class="ti ti-menu-2 fs-1 d-sm-none mb-2" data-bs-toggle="offcanvas" data-bs-target="#nav-mobile"></i>
  <h1 class="text-center">Preguntas Frecuentes</h1>
  <div class="d-flex flex-sm-row flex-column justify-content-between gap-2">
    <form class="d-flex gap-2 flex-sm-row flex-column" id="form-question-find">
      <select class="form-select" id="select-frequent-questions">
        <option value="all">Todos</option>
        <option value="question">Por Pregunta</option>
        <option value="answer">Por Respuesta</option>
      </select>
      <input class="form-control d-none" type="search" id="input-search" style="max-width:250px">
      <button class="btn btn-outline-success" type="submit" style="min-width:min-content">Buscar</button>
    </form>
    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-create-question"
      style="min-width:min-content; height:min-content">Crear
      Pregunta</button>
  </div>

  <div class="w-100 overflow-auto shadow">
    <table class="table table-striped mb-0">
      <thead class="table-dark">
        <tr class="align-middle">
          <th scope="col">#</th>
          <th scope="col">Pregunta</th>
          <th scope="col">Respuesta</th>
          <th scope="col" class="text-center">Creación</th>
          <th scope="col" class="text-center">Modificación</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody id="table-frequent-questions">
      </tbody>
    </table>
  </div>
</main>

<!-- Modal Update Question-->
<div class="modal fade" id="modal-update-question" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Actualizar pregunta frequente <i class="ti ti-pencil"></i></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form d-flex flex-column gap-3" id="form-update-question">
          <div class="form-group">
            <label class="form-label fw-semibold">Pregunta:</label>
            <input class="form-control" name="question">
          </div>
          <div class="form-group">
            <label class="form-label fw-semibold">Respuesta:</label>
            <input class="form-control" name="answer">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btn-update-question">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete Question-->
<div class="modal fade" id="modal-delete-question" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Eliminar pregunta frequente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body-delete">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn-delete-question">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Create Question-->
<div class="modal fade" id="modal-create-question" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Crear pregunta frequente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form d-flex flex-column gap-3" id="form-create-question">
          <div class="form-group">
            <label class="form-label fw-semibold">Pregunta:</label>
            <input class="form-control" name="question">
          </div>
          <div class="form-group">
            <label class="form-label fw-semibold">Respuesta:</label>
            <input class="form-control" name="answer">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btn-create-question">Crear</button>
      </div>
    </div>
  </div>
</div>

<script type="module" src="./app/views/js/adminFrequentQuestions.js"></script>