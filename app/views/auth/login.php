<main class="login-form">
    <div class="login-box">
        <form id="form-login">
            <h1>Inicio de sesión</h1>
            <div class="input-box">
                <input name="email" type="text" placeholder="Correo electrónico" required>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="25" height="25"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                </svg>
            </div>
            <div class="input-box">
                <input name="password" type="password" placeholder="Contraseña" required>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="25" height="25"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                    <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                    <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                </svg>
            </div>
            <button type="submit" class="btn-login">Iniciar sesión</button>
            <div class="login-register">
                <p>¿Primera vez? <a href="register" class="register-link">Crear cuenta</a></p>
            </div>
        </form>
    </div>
</main>
<script type="module" src="./app/views/js/authLogin.js">
</script>