@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de Paralelos</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9"> 
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Paralelos registrados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCreate">
                            Crear nuevo paralelo
                        </button>

                        {{-- Modal Create --}}
                        <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #007bff; color:white;">
                                        <h5 class="modal-title">Registro de un nuevo paralelo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/admin/paralelos/create') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Grados</label><b> (*)</b>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                    class="fas fa-list-alt"></i></span>
                                                            </div>
                                                            <select name="grado_id_create" class="form-control"
                                                                id="gradoe_id_create" required>
                                                                <option value="">Seleccione un grado</option>
                                                                @foreach ($grados as $grado)
                                                                    <option value="{{ $grado->id }}">
                                                                        {{ $grado->nombre }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('grado_id_create')
                                                            <small style="color: red">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nombre del paralelo</label><b> (*)</b>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-clone"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" name="nombre_create"
                                                                value="{{ old('nombre_create') }}"
                                                                placeholder="Escriba aquí..." required>
                                                        </div>
                                                        @error('nombre_create')
                                                            <small style="color: red">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">CANCELAR</button>
                                                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example" class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th width="50px">Nro</th>
                                <th>Grados</th>
                                <th>Paralelos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grados as $grado)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td>{{ $grado->nombre }}</td>
                                    <td>
                                        @foreach ($grado->paralelos as $paralelo)
                                            <button class="btn btn-info btn-sm btn-block mb-1">{{ $paralelo->nombre }}</button>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($grado->paralelos as $paralelo)
                                            <div class="row justify-content-center d-flex mb-1">
                                                <button type="button" class="btn btn-success btn-sm mr-1"
                                                    data-toggle="modal" data-target="#ModalUpdate{{ $paralelo->id }}">
                                                    <i class="fas fa-pencil-alt"></i> EDITAR
                                                </button>

                                                <form action="{{ url('/admin/paralelos/' . $paralelo->id) }}" method="post"
                                                    id="miFormulario{{ $paralelo->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="preguntar{{ $paralelo->id }}(event)">
                                                        <i class="fas fa-trash"></i> ELIMINAR
                                                    </button>
                                                </form>
                                            </div>

                                            {{-- Modal Update --}}
                                            <div class="modal fade" id="ModalUpdate{{ $paralelo->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header"
                                                            style="background-color: #08a35b; color:white;">
                                                            <h5 class="modal-title">Editar paralelo</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('/admin/paralelos/' . $paralelo->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group text-left">
                                                                            <label>Grados</label><b> (*)</b>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-list-alt"></i></span>
                                                                                </div>
                                                                                <select name="grado_id"
                                                                                    class="form-control" required>
                                                                                    <option value="">Seleccione un grado</option>
                                                                                    @foreach ($grados as $grado)
                                                                                        <option
                                                                                            value="{{ $grado->id }}"
                                                                                            {{ $grado->id == $paralelo->grado_id ? 'selected' : '' }}>
                                                                                            {{ $grado->nombre }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group text-left">
                                                                            <label>Nombre del paralelo</label><b> (*)</b>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-clone"></i></span>
                                                                                </div>

                                                                                <input type="text" class="form-control"
                                                                                    name="nombre"
                                                                                    value="{{ old('nombre', $paralelo->nombre) }}"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12 text-right">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">CANCELAR</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success">ACTUALIZAR</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                function preguntar{{ $paralelo->id }}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: '¿Desea eliminar este registro?',
                                                        icon: 'question',
                                                        showDenyButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        confirmButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('miFormulario{{ $paralelo->id }}').submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
