@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>DATOS DEL SISTEMA</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                        <h3 class="card-title">Bienvenidos a la seccion de configuracion del sistema</h3>
                </div>
                <div>

                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/configuracion/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                        <label for="">Logo de  la institucion</label>

                                            <input type="file" class="form-control" 
                                                value="{{ old('logo', $configuracion->logo ?? '') }}" name="logo" 
                                                placeholder="Escribe aqui..." onchange="mostrarImagen(event)" accept="image/*" style="padding: 3px;"">
                                            <br>
                                            <center>
                                            <img id="preview" src="{{ asset($configuracion->logo) }}" style="max-width: 200px; margin-top: 10px;">
                                            </center>

                                        @error('logo')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                </div>
                                <script>
                                    const mostrarImagen = e =>
                                        document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                </script>
                            </div>

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre </label><b>(*)</b>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" value="{{ old('nombre', $configuracion->nombre ?? '') }}" 
                                                    name="nombre" placeholder="Escribe aqui..." required>
                                                </div>
                                            @error('nombre')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="">Descripcion </label><b>(*)</b>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" value="{{ old('descripcion', $configuracion->descripcion ?? '') }}" 
                                                    name="descripcion" placeholder="Escribe aqui..." required>
                                                </div>
                                                @error('descripcion')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                </div>    

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Direccion </label><b>(*)</b>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ old('direccion', $configuracion->direccion ?? '') }}" 
                                                name="direccion" placeholder="Escribe aqui..." required>
                                            </div>
                                            @error('direccion')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Telefono </label><b>(*)</b>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ old('telefono', $configuracion->telefono ?? '') }}" 
                                                name="telefono" placeholder="Escribe aqui..." required>
                                            </div>
                                            @error('telefono')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Divisa </label><b>(*)</b>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                                </div>
                                                <select name="divisa" id="" class="form-control" required>
                                                    <option value="">Seleccione una opcion</option>
                                                    @foreach ($divisas as $divisa)
                                                        <option value="{{ $divisa['symbol'] }}" {{ old('divisa', $configuracion->divisa ?? '') == $divisa['symbol'] ? 'selected' : '' }}>
                                                            {{ $divisa['name']. " (".$divisa['symbol'].")" }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('divisa')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Correo Electrocnico </label><b>(*)</b>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" 
                                                value="{{ old('correo_electronico', $configuracion->correo_electronico ?? '') }}" 
                                                name="correo_electronico" placeholder="Escribe aqui..." required>
                                            </div>
                                            @error('correo_electronico')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Sitio web </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ old('web', $configuracion->web ?? '') }}" 
                                                name="web" placeholder="Escribe aqui...">
                                            </div>
                                            @error('sitio_web')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ url('/admin') }}" class="btn btn-default"><i
                                            class="fas fa-arrow-left"></i> Cancelar</a>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                                    </div>
                                </div>
                            </div>
                    </form>

                </div>
            </div>
        </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop