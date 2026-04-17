@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>BIENVENIDO: </b>{{ Auth::user()->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/colegio.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Gestiones registrados</b></span>
                    <span class="info-box-number" style="color: rgb(59, 211, 231)">{{ $total_gestiones }} gestiones</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/calendario.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Periodos registrados</b></span>
                    <span class="info-box-number" style="color: rgb(59, 211, 231)">{{ $total_periodos }} periodos</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/lista.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Niveles registrados</b></span>
                    <span class="info-box-number" style="color: rgb(59, 211, 231)">{{ $total_niveles }} niveles</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/grado.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Grados registrados</b></span>
                    <span class="info-box-number" style="color: rgb(59, 211, 231)" >{{ $total_grados }} grados</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/paralelos.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Paralelos registrados</b></span>
                    <span class="info-box-number" style="color: rgb(59, 211, 231)">{{ $total_paralelos }} paralelos</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/relojgif.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Turnos registrados</b></span>
                    <span class="info-box-number" style="color: rgb(59, 211, 231)">{{ $total_turnos }} turnos</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/libros.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Materias registrados</b></span>
                    <span class="info-box-number" style="color: rgb(59, 211, 231)">{{ $total_materias }} materias</span>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
