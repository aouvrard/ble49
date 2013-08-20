@extends('layouts.scaffold')

@section('main')

<h1>Edit Commande</h1>
{{ Form::model($commande, array('method' => 'PATCH', 'route' => array('commandes.update', $commande->id))) }}
    <ul>
        <li>
            {{ Form::label('nomClient', 'NomClient:') }}
            {{ Form::text('nomClient') }}
        </li>

        <li>
            {{ Form::label('prenomClient', 'PrenomClient:') }}
            {{ Form::text('prenomClient') }}
        </li>

        <li>
            {{ Form::label('date', 'Date:') }}
            {{ Form::text('date') }}
        </li>

        <li>
            {{ Form::label('id_etat', 'Id_etat:') }}
            {{ Form::input('number', 'id_etat') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('commandes.show', 'Cancel', $commande->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop