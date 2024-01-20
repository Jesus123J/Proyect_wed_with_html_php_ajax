<main class="p-md-5 p-4 d-flex flex-lg-row flex-column gap-4 min-vw-100 min-vh-100 justify-content-center">
  <?php require_once "./app/views/layouts/sidebarClient.php"; ?>
  <form id="form-edit-client" class="bg-light shadow p-md-5 p-3 rounded w-100" style="height:min-content">
    <h1>Información de tu cuenta</h1>
    <hr>
    <div class="d-flex gap-md-5 flex-md-row flex-column">
      <div class="w-100">
        <div class="form-group mb-3">
          <label class="form-label" for="name">Nombre:</label>
          <input type="text" class="form-control" name="name" placeholder="Ingresa tu(s) nombre(s)"
            value="<?php echo $_SESSION["name"] ?>" autocomplete="off">
          <div class="invalid-feedback">El nombre debe contener solo letras y al menos 2</div>
        </div>
        <div class="form-group mb-3">
          <label class="form-label" for="lastname">Apellidos:</label>
          <input type="text" class="form-control" name="lastname" placeholder="Ingresa tus apellidos"
            value="<?php echo $_SESSION["lastname"] ?>" autocomplete="off">
          <div class="invalid-feedback">El apellido debe contener al menos 2 letras</div>
        </div>
        <div class="form-group mb-3">
          <label class="form-label" for="email">Correo electrónico:</label>
          <input type="text" class="form-control" name="email" placeholder="Gmail o Outlook"
            value="<?php echo $_SESSION["email"] ?>" autocomplete="off">
        </div>
      </div>

      <div class="w-100">
        <div class="form-group mb-3">
          <label class="form-label" for="dni">Dni:</label>
          <input type="text" class="form-control" name="dni" placeholder="Ingresa tu dni"
            value="<?php echo $_SESSION["dni"] ?>" autocomplete="off" disabled>
          <div class="invalid-feedback">
            El dni debe contener 8 dígitos
          </div>
        </div>
        <div class="form-group mb-3">
          <label class="form-label" for="phone">Celular:</label>
          <input type="text" class="form-control" name="phone" placeholder="Ingrese su número de celular"
            value="<?php echo $_SESSION["phone"] ?>" autocomplete="off">
          <div class="invalid-feedback">Formato no válido</div>
        </div>
        <div class="form-group mb-3">
          <label class="form-label" for="genre">Género</label>
          <select class="form-select form-control" name="genre">
            <option <?php echo $_SESSION["genre"] == "Masculino" ? "selected" : "" ?> value="Masculino">Masculino</option>
            <option <?php echo $_SESSION["genre"] == "Femenino" ? "selected" : "" ?> value="Femenino">Femenino</option>
          </select>
          <div class="invalid-feedback">Debe seleccionar un género</div>
        </div>
      </div>

    </div>
    <hr>
    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
  </form>
</main>

<script type="module" src="./app/views/js/clientMyAccount.js"></script>