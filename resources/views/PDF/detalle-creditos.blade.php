@extends('layouts.pdf')

@section('content')

@foreach ($retiros as $retiro)

    @include('PDF.partials.det-credito')

    @include('PDF.partials.det-credito')
    <br>

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
