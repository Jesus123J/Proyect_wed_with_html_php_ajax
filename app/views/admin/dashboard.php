<main class="d-flex flex-column gap-3 p-4">
	<i class="ti ti-menu-2 fs-1 d-sm-none mb-1" data-bs-toggle="offcanvas" data-bs-target="#nav-mobile"></i>
	<div class="text-dark">
		<h4>Bienvenido</h4>
		<h4>
			<?php echo $_SESSION["name"] . " " . $_SESSION["lastname"] ?>
		</h4>
		<p id="current-date" class="text-muted">29 de noviembre del 2023</p>
	</div>
	<div class="gap-4 stats mb-3 row gx-0">
		<div class="d-flex gap-3 shadow px-3 rounded py-3 col">
			<div class="iconDashboard">
				<i class="ti ti-user-filled"></i>
			</div>
			<div>
				<h5>Total Personal</h5>
				<p id="total-workers"></p>
			</div>
		</div>
		<div class="d-flex gap-3 shadow px-3 rounded py-3 col">
			<div class="iconDashboard">
				<i class="ti ti-shopping-cart-copy"></i>
			</div>
			<div>
				<h5>Productos Vendidos</h5>
				<p id="products-sold"></p>
			</div>
		</div>
		<div class="d-flex gap-3 shadow px-3 rounded py-3 col">
			<div class="iconDashboard">
				<i class="ti ti-clipboard-text"></i>
			</div>
			<div>
				<h5>Total Ordenes</h5>
				<p id="total-orders"></p>
			</div>
		</div>
		<div class="d-flex gap-3 shadow px-3 rounded py-3 col">
			<div class="iconDashboard">
				<i class="ti ti-cash"></i>
			</div>
			<div>
				<h5>Total Ventas</h5>
				<p id="total-sales"></p>
			</div>
		</div>
	</div>
	<div class="gap-3 d-flex flex-lg-row flex-column">
		<div id="orders" class="col shadow"></div>
		<div id="sells" class="col shadow"></div>
	</div>
	<div class="gap-3 row gx-0 bg-white">
		<div class="col shadow p-3 rounded">
			<div class="d-flex justify-content-between">
				<h2>Últimas 5 ordenes</h2>
				<a href="orders" class="btn btn-primary" style="height:min-content">Ver más</a>
			</div>
			<div class="overflow-auto">
				<table class="table table-striped text-nowrap mt-3 rounded">
					<thead class="table-dark">
						<tr class="text-center">
							<th scope="col">Dni</th>
							<th scope="col">Fecha</th>
							<th scope="col">Total</th>
							<th scope="col">Cantidad</th>
						</tr>
					</thead>
					<tbody id="table-orders">
					</tbody>
				</table>
			</div>
		</div>
		<div class="col shadow p-3 rounded bg-white">
			<h2>Top 5 productos más vendidos</h2>
			<div class="overflow-auto">
				<table class="table table-striped text-nowrap mt-3 rounded">
					<thead class="table-dark">
						<tr class="text-center align-middle">
							<th>#</th>
							<th class="text-start">Nombre</th>
							<th class="text-center">Cantidad</th>
						</tr>
					</thead>
					<tbody id="table-top-products">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>

<script type="module" src="./app/views/js/adminDashboard.js"></script>