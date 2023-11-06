@extends('layouts.pdf')

@section('content')

@foreach ($abonos as $abono)
    @include('PDF.partials.det-cuenta')
    @include('PDF.partials.det-cuenta')
    <small>Generado por: {{ Auth::user()->name }}</small>

    @if ($loop->index > 0 && ($loop->index + 1) % 2 == 0)
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="page-break"></div>
    @endif
@endforeach


@endsection
