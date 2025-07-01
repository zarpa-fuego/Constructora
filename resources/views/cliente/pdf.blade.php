<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #444; padding: 6px 4px; text-align: left; }
        th { background: #f0f0f0; }
        h2 { margin-bottom: 0; }
        .small { font-size: 11px; color: #888; }
    </style>
</head>
<body>
    <h2>Listado de Clientes</h2>
    <div class="small">Fecha de exportación: {{ date('d/m/Y H:i') }}</div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre Completo</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Ubicación</th>
                <th>Estado Civil</th>
                <th>Fecha Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }} {{ $cliente->apellido }}</td>
                    <td>{{ $cliente->dni_numero }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>
                        {{ $cliente->distrito->nombre }},
                        {{ $cliente->distrito->provincia->nombre }},
                        {{ $cliente->distrito->provincia->departamento->nombre }}
                    </td>
                    <td>{{ $cliente->estado_civil }}</td>
                    <td>{{ $cliente->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
