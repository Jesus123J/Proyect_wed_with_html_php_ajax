<main class="complaints-form">
  <h2 class="mb-4">Libro de reclamaciones</h2>
  <form class="container" id="form-complaint">
    <div class="form-group mb-3">
      <label for="name" class="form-label">Nombre:</label>
      <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre">
    </div>
    <div class="form-group mb-3">
      <label for="lastname" class="form-label">Apellidos:</label>
      <input type="text" class="form-control" name="lastname" placeholder="Ingrese su apellido">
    </div>
    <div class="form-group  mb-3">
      <label for="email" class="form-label">Correo electrónico:</label>
      <input type="email" class="form-control" name="email" placeholder="Ingrese su correo electrónico">
    </div>
    <div class="form-group mb-3">
      <label for="order_id" class="form-label">ID de orden:</label>
      <input type="text" class="form-control" name="order_id" placeholder="Ingrese el ID del orden">
    </div>
    <div class="form-group mb-3">
      <label for="complaint_text" class="form-label">Ingrese su queja:</label>
      <textarea class="form-control" name="complaint_text" rows="4" placeholder="Escriba la queja aquí"></textarea>
    </div>
    <button type="submit" class="btn btn-primary d-flex text-center mx-auto" id="button-complaint">Enviar</button>
  </form>
</main>

<script type="module" src="./app/views/js/clientComplaint.js"></script>