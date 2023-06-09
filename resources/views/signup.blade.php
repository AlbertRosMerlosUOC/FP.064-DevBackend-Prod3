<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestor de eventos DevBackend - Registro</title>
    @include('partials.includes')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <main class="form-signup">
        <form class="formLogin" action="{{ route('register') }}" method="POST">
            @csrf
            <h1 class="mb-3">Registro</h1>
            <div class="form-floating">
                <input type="text" class="form-control" name="User" id="floatingUser" placeholder="Usuario" class="input-ini" required>
                <label for="floatingUser">Usuario</label>
            </div>
            <div class="mt-3 form-floating">
                <input type="text" class="form-control" name="email" id="floatingEmail" placeholder="Email" required>
                <label for="floatingEmail">Email</label>
            </div>
            <div class="mt-3 form-floating">
                <input type="text" class="form-control" name="Nombre" id="floatingName" placeholder="Nombre" required>
                <label for="floatingNombre">Nombre</label>
            </div>
            <div class="mt-3 form-floating">
                <input type="text" class="form-control" name="Apellido1" id="floatingApellido1" placeholder="Nombre" required>
                <label for="floatingApellido1">Primer apellido</label>
            </div>
            <div class="mt-3 form-floating">
                <input type="text" class="form-control" name="Apellido2" id="floatingApellido2" placeholder="Nombre" required>
                <label for="floatingApellido2">Segundo apellido</label>
            </div>
            <div class="mt-3 form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Contraseña" required>
                <label for="floatingPassword">Contraseña</label>
            </div>
            <div class="mt-3 form-floating">
                <input type="password" class="form-control" name="confirm_password" id="floatingConfirmPassword" placeholder="Confirma la contraseña" style="margin-bottom: 10px !important;" required>
                <label for="floatingConfirmPassword">Confirma la contraseña</label>
            </div>
            <div class="mb-3">
                @if (!empty($message))
                    {{ $message }}
                @endif
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Enviar</button>
            <p class="mt-3">¿Ya estás registrad@? Inicia sesión <a href="{{ route('login') }}">aquí</a></p>
            <p class="mt-4 mb-3 text-muted"><span style="font-family: 'Shantell Sans';">DevBackend</span> &copy; 2023</p>
        </form>
    </main>
</body>
</html>
