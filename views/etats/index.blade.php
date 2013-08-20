@extends('layouts.scaffold')

@section('main')

<h1>All Etats</h1>

<p>{{ link_to_route('etats.create', 'Add new etat') }}</p>

@if ($etats->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Libelle</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($etats as $etat)
                <tr>
                    <td>{{{ $etat->libelle }}}</td>
                    <td>{{ link_to_route('etats.edit', 'Edit', array($etat->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('etats.destroy', $etat->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no etats
@endif

@stop