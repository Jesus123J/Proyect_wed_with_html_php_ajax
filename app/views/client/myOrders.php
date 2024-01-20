<main
  class="my-orders-main p-md-5 p-4 d-flex flex-lg-row flex-column gap-4 vw-100 min-vh-100 justify-content-lg-center">
  <?php require_once "./app/views/layouts/sidebarClient.php"; ?>
  <div class="bg-light shadow p-md-5 p-3 rounded w-100" style="min-width: 0">
    <h1>¡Mis ordenes!</h1>
    <p>Hazle seguimiento al detalle a tus ordenes anteriores y solicita ayuda si hay algún inconveniente con una de tus
      compras.</p>
    <hr>
    <div class="overflow-auto w-100">
      <table class="table table-striped text-nowrap">
        <thead class="table-dark">
          <tr class="text-center align-middle">
            <th>#</th>
            <th class="text-start">ID de orden</th>
            <th>Fecha</th>
            <th>Dirección de envío</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Detalle</th>
          </tr>
        </thead>
        <tbody id="table-orders">
        </tbody>
      </table>
    </div>
  </div>
</main>

<div class="modal fade" id="modal-detail-order" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h1 class="modal-title fs-5">Detalle del Pedido
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pb-0">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead class="table-dark">
              <tr class="align-middle text-center">
                <th class="text-start">Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody id="table-orders-details">
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer border-top-0">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="module" src="./app/views/js/clientMyOrders.js"></script>