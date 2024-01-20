<main class="d-flex flex-column mb-5">
  <h1 class="text-center my-5">Crea tu cuenta</h1>
  <div class="d-flex flex-wrap container shadow-lg rounded p-5">
    <div class="logo-register-container mx-auto">
      <img class="mw-100 h-auto object-fit-md-none object-fit-fill" src="<?php echo APP_URL; ?>app/views/img/logo.png"
        alt="logo">
    </div>
    <form class="d-flex flex-column flex-grow-1 mx-md-5" autocomplete="off" id="form-register-user">
      <div class="form-group mb-3">
        <label class="form-label" for="name">Nombre:</label>
        <input type="text" class="form-control" name="name" placeholder="Ingresa tu(s) nombre(s)" autocomplete="off">
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
      <div class="d-flex justify-content-between">
        <button id="button-register-user" class="btn btn-dark" type="submit">
          <div id="spinner-text">Crear cuenta</div>
          <div id="spinner-icon" class="spinner-border-sm" aria-hidden="true"></div>
        </button>
        <a href="login" class="d-flex link-dark align-items-center text-muted">¿Ya tienes cuenta?</a>
      </div>
    </form>
  </div>
  <!-- -->
  <div class="modal fade" id="success-register" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="gif-modal mx-auto">
            <img class="mw-100 h-auto object-fit-md-none object-fit-fill"
              src="<?php echo APP_URL; ?>app/views/img/confetti.gif" alt="coonfetti">
          </div>
          <h6>
            Felicidades ya puedes empezar a realizar tus ordenes y disfrutar de nuestros productos!!!!
          </h6>
        </div>
        <button type="button" class="btn btn-secondary mx-auto w-50 mb-4" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</main>
<script type="module" src="<?php echo APP_URL; ?>app/views/js/authRegister.js"></script>