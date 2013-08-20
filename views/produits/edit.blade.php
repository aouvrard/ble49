@extends('layouts.ble_admin')

@section('main')

<h1>Edit Produit</h1>
{{ Form::model($produit, array('method' => 'PATCH', 'route' => array('produits.update', $produit->id))) }}
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
            {{ Form::label('visible', 'Visible:') }}
            {{ Form::checkbox('visible') }}
        </li>
        
        <li>
            {{ Form::label('unite', 'Unite:') }}
            {{ Form::text('unite') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('produits.show', 'Cancel', $produit->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop