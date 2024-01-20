<main class="suggestions-form">
  <h2 class="mb-4">Formulario de Sugerencias</h2>
  <form class="container" id="form-suggestion">
    <div class="form-group mb-3">
      <label for="name" class="form-label">Nombre:</label>
      <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre">
    </div>
    <div class="form-group mb-3">
      <label for="lastname" class="form-label">Apellidos:</label>
      <input type="text" class="form-control" name="lastname" placeholder="Ingrese su apellido">
    </div>
    <div class="form-group  mb-3">
      <label for="email" class="form-label">Correo Electrónico:</label>
      <input type="email" class="form-control" name="email" placeholder="Ingrese su correo electrónico">
    </div>
    <div class="form-group mb-3">
      <label for="dni" class="form-label">Dni:</label>
      <input type="text" class="form-control" name="dni" placeholder="Ingrese su DNI">
    </div>
    <div class="form-group  mb-3">
      <label for="suggestion" class="form-label">Sugerencia:</label>
      <textarea class="form-control" name="suggestion" rows="4" placeholder="Escriba su sugerencia aquí"></textarea>
    </div>
    <button type="submit" class="btn btn-primary d-flex text-center mx-auto" id="button-suggestion">Enviar
      Sugerencia</button>
  </form>
</main>

<script type="module" src="./app/views/js/clientSuggestion.js"></script>