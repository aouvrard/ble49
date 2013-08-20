@extends('layouts.ble_admin')

@section('main')

<h1>Ajouter un Produit</h1>

{{ Form::open(array('route' => 'produits.store')) }}
    <ul>
        <li>
            {{ Form::label('libelle', 'Libelle:') }}
            {{ Form::text('libelle') }}
        </li>

        <li>
            {{ Form::label('prix', 'Prix:') }}
            {{ Form::text('prix') }}
        </li>

        <li>
            {{ Form::label('unite', 'Unité:') }}
            {{ Form::text('unite') }}
        </li>

        <li>
            {{ Form::submit('Valider', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


