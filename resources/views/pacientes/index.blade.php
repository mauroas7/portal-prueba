<!DOCTYPE html>
<html>
<head>
    <title>Portal Hospital</title>
</head>
<body>
    <h1>Pacientes Registrados</h1>
    <p>
        <a href="{{ route('pacientes.create') }}" style="display: inline-block; padding: 10px 14px; background-color: #28a745; color: #fff; text-decoration: none; border-radius: 4px;">Agregar paciente</a>
    </p>
    <ul>
        @foreach($pacientes as $paciente)
            <li>{{ $paciente->nombre }} - DNI: {{ $paciente->dni }}</li>
        @endforeach
    </ul>
</body>
</html>