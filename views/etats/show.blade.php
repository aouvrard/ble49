@extends('layouts.scaffold')

@section('main')

<h1>Show Etat</h1>

<p>{{ link_to_route('etats.index', 'Return to all etats') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Libelle</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $etat->libelle }}}</td>
                    <td>{{ link_to_route('etats.edit', 'Edit', array($etat->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('etats.destroy', $etat->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop