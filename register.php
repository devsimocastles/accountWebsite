<?php include "./templates/header.php" ?>
    <h1>Registrate</h1>
    <form action="register.php" action="post">
        <label for="">Usuario<input type="text" name="user" placeholder="Usuario..."></label>
        <label for="">Email<input type="email" name="email" placeholder="Email..."></label>
        <label for="">Confirma Email<input type="email" name="emailRepeat" placeholder="Confirma Email..."></label>
        <label for="">Contraseña<input type="password" name="pass" placeholder="Contraseña..."></label>
        <label for="">Repite Contraseña<input type="password" name="repeatPass" placeholder="Confirma Contraseña..."></label>
        <input type="submit" value="Registrarme">
        <div>
        <p>¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a></p>
    </div>
    </form><hr>
    <ul class="error">
        
    </ul>
<?php include "./templates/header.php" ?>