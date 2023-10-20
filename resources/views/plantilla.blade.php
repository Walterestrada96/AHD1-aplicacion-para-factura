<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    </script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Administracion de Facturas</title>
</head>

<body style="background-color:azure">
    <div>
        <h1 class="text-center p-5">Control de Facturas</h1>
    </div>
    <div class="container-fluid p-5 table-responsive">
        <div>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#Modalcrearusuario">Crear
                Factura</button>
            <div class="modal fade" id="Modalcrearusuario" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nueva factura</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('facturas.create') }} "method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">

                                    <div class="mb-3">
                                        <label class="form-label">Nit</label>
                                        <input type="number" class="form-control" name="nit">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Descripcion</label>
                                        <input type="text" class="form-control" name="descripcion">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Precio</label>
                                        <input type="number" class="form-control" name="precio">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Cantidad</label>
                                        <input type="number" class="form-control" name="cantidad">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <table class="table table-success table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Id factura</th>
                    <th scope="col">Nombre cliente</th>
                    <th scope="col">Nit</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total a Pagar</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $row)
                    <tr>
                        <th scope="row">{{ $row->id }} </th>
                        <td>{{ $row->nombre }}</td>
                        <td>{{ $row->nit }}</td>
                        <td>{{ $row->descripcion }}</td>
                        <td>{{ $row->precio }}</td>
                        <td>{{ $row->cantidad }}</td>
                        <td>{{ "Q ".$row->total }}</td>
                        <td>
                            <a href="" data-bs-toggle="modal"
                                data-bs-target="#ModalEditar{{ $row->id }}"><button type="button"
                                    class="btn btn-warning">Editar</button>
                            </a>
                            <a href="{{ route('facturas.delete', $row->id) }} "><button type="button"
                                    class="btn btn-danger">Eliminar</button>
                            </a>
                        </td>

                        <!-- Modal -->
                        <div class="modal fade" id="ModalEditar{{ $row->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="{{ route('facturas.update') }} "method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Id</label>
                                                <input type="text" class="form-control" name="id"
                                                    value="{{ $row->id }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nombre</label>
                                                <input type="text" class="form-control"
                                                    name="nombre"value="{{ $row->nombre }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nit</label>
                                                <input type="text" class="form-control" name="nit"
                                                    value="{{ $row->nit }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Descripcion</label>
                                                <input type="text" class="form-control" name="descripcion"
                                                    value="{{ $row->descripcion }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">precio</label>
                                                <input type="text" class="form-control" name="precio"
                                                    value="{{ $row->precio }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">cantidad</label>
                                                <input type="text" class="form-control" name="cantidad"
                                                    value="{{ $row->cantidad }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
