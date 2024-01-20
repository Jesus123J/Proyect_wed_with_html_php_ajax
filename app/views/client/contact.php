<main class="flex flex-column gap-3 container p-5 text-stone-700 font-medium self-center items-center">
  <h1 class="text-4xl text-amber-950 font-bold text-center mb-5">Contactenos</h1>
  <div id="map" style="height:600px"></div>
  <div class="flex flex-column mt-5 text-break">
    <h3 class="mb-4 text-center">Información de Contacto</h3>
    <p class="mb-2"><strong>Dirección:</strong> Av. Alfredo Mendiola 6037</p>
    <p class="mb-2"><strong>Correo Electrónico:</strong> info.foodlicious.2023@gmail.com</p>
    <p class="mb-2"><strong>Teléfono:</strong> (123) 456-7890</p>
  </div>
  <div class="flex flex-column mt-5">
    <h3 class="text-xl font-semibold mb-4">Envíanos un Mensaje</h3>
    <form action="#" method="post">
      <div class="mb-4">
        <label for="nombre" class="block mb-2">Nombre(s) y Apellidos:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" required>
      </div>
      <div class="mb-4">
        <label for="correo" class="block mb-2">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" class="form-control" required>
      </div>
      <div class="mb-4">
        <label for="mensaje" class="block mb-2">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" class="form-control" rows="5" required></textarea>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
      </div>
    </form>
  </div>
</main>

<script src="./app/views/js/clientContact.js"></script>