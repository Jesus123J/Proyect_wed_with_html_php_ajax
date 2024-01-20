<?php if ($role === "Admin") { ?>
  <link rel="stylesheet" href="<?php echo APP_URL; ?>app/views/css/styleAdministrador.css">
  <link rel="stylesheet" href="<?php echo APP_URL; ?>app/views/css/styleProduct.css">
<?php } else { ?>
  <link rel="stylesheet" href="<?php echo APP_URL; ?>app/views/css/main.css">
<?php } ?>