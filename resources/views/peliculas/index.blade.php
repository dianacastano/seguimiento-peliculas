<!DOCTYPE html>
<html>
<head>
    <title>Lista de Películas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Películas</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <ul class="list-group mb-4">
            @foreach ($peliculas as $index => $pelicula)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $pelicula['nombre'] }}</span>
                    <div>
                        @if (!$pelicula['vista'])
                            <form action="{{ route('peliculas.complete', $index) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Marcar como Vista</button>
                            </form>
                        @else
                            <span class="badge badge-success">Vista</span>
                        @endif
                        <form action="{{ route('peliculas.destroy', $index) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('peliculas.create') }}" class="btn btn-primary">Añadir Nueva Película</a>
    </div>
</body>
</html>
