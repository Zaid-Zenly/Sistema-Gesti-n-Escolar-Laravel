@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de periodos académicos</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Periodos registrados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCreate">
                            Crear nuevo periodo
                        </button>

                        {{-- MODAL CREATE --}}
                        <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #007bff; color:white;">
                                        <h5 class="modal-title">Registro de un nuevo periodo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/admin/periodos/create') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Gestiones</label><b> (*)</b>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-university"></i></span>
                                                            </div>
                                                            <select name="gestion_id_create" class="form-control" required>
                                                                <option value="">Seleccione una gestion</option>
                                                                @foreach ($gestiones as $g)
                                                                    <option value="{{ $g->id }}">{{ $g->nombre }}
                                                                    </option>
                                                                @endforeach
                                                            </select> {{-- CORRECCIÓN: Se cerró el select --}}
                                                        </div>
                                                        @error('gestion_id_create')
                                                            <small style="color: red">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nombre del periodo</label><b> (*)</b>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-layer-group"></i></span>
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
                                <th>Nro</th>
                                <th>Gestion</th>
                                <th>Periodos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gestiones as $gestion)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td>{{ $gestion->nombre }}</td>
                                    <td>
                                        @foreach ($gestion->periodos as $periodo)
                                            <button class="btn btn-info btn-sm btn-block">{{ $periodo->nombre }}</button>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($gestion->periodos as $periodo)
                                            <div class="row justify-content-center d-flex mb-1">
                                                <button type="button" class="btn btn-success btn-sm mr-1"
                                                    data-toggle="modal" data-target="#ModalUpdate{{ $periodo->id }}">
                                                    <i class="fas fa-pencil-alt"></i> EDITAR
                                                </button>

                                                <form action="{{ url('/admin/periodos/' . $periodo->id) }}" method="post"
                                                    id="miFormulario{{ $periodo->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="preguntar{{ $periodo->id }}(event)">
                                                        <i class="fas fa-trash"></i> ELIMINAR
                                                    </button>
                                                </form>
                                            </div>

                                            {{-- MODAL UPDATE --}}
                                            <div class="modal fade" id="ModalUpdate{{ $periodo->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header"
                                                            style="background-color: #08a35b; color:white;">
                                                            <h5 class="modal-title">Editar periodo</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('/admin/periodos/' . $periodo->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group text-left">
                                                                            <label>Gestiones</label><b> (*)</b>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-university"></i></span>
                                                                                </div>
                                                                                <select name="gestion_id"
                                                                                    class="form-control" required>
                                                                                    <option value="">Seleccione una gestion</option>
                                                                                    @foreach ($gestiones as $g)
                                                                                        <option
                                                                                            value="{{ $g->id }}"
                                                                                            {{ $g->id == $periodo->gestion_id ? 'selected' : '' }}>
                                                                                            {{ $g->nombre }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            @error('gestion_id')
                                                                                <small style="color: red;">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group text-left">
                                                                            <label>Nombre del periodo</label><b> (*)</b>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-layer-group"></i></span>
                                                                                </div>
                                                                                <input type="text" class="form-control"
                                                                                    name="nombre"
                                                                                    value="{{ old('nombre', $periodo->nombre) }}"
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
                                                function preguntar{{ $periodo->id }}(event) {
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
                                                            document.getElementById('miFormulario{{ $periodo->id }}').submit();
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
