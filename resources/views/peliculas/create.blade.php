<!DOCTYPE html>
<html>
<head>
    <title>Añadir Película</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Añadir Nueva Película</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('peliculas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre de la Película:</label>
                <input type="text" id="nombre" name="nombre" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <a href="{{ route('peliculas.index') }}" class="btn btn-secondary mt-3">Volver a la Lista de Películas</a>
    </div>
</body>
</html>
