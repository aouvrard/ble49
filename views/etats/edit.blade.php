@extends('layouts.scaffold')

@section('main')

<h1>Edit Etat</h1>
{{ Form::model($etat, array('method' => 'PATCH', 'route' => array('etats.update', $etat->id))) }}
    <ul>
        <li>
            {{ Form::label('libelle', 'Libelle:') }}
            {{ Form::text('libelle') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('etats.show', 'Cancel', $etat->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop