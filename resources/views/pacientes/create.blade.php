<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Paciente</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">
    
    <h2>Registrar Nuevo Paciente</h2>

    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf
        
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label>Nombre:</label><br>
            <input type="text" name="nombre" required>
        </div>
        <br>
        <div>
            <label>Apellido:</label><br>
            <input type="text" name="apellido" required>
        </div>
        <br>
        <div>
            <label>DNI:</label><br>
            <input type="text" name="dni" required>
        </div>
        <br>
        <div>
            <label>Email:</label><br>
            <input type="email" name="email" required>
        </div>
        <br>
        <div>
            <label>Password:</label><br>
            <input type="password" name="password" required>
        </div>
        <br>
        <div>
            <label>Confirmar Password:</label><br>
            <input type="password" name="password_confirmation" required>
        </div>
        <br>
        <button type="submit">Guardar Paciente</button>
    </form>

    <br>
    <a href="{{ route('pacientes.index') }}" style="color: blue; text-decoration: none;">← Volver a la lista</a>

</body>
</html>