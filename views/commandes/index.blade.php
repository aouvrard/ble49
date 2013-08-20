@extends('layouts.scaffold')

@section('main')

<h1>All Commandes</h1>

<p>{{ link_to_route('commandes.create', 'Add new commande') }}</p>

@if ($commandes->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nom du Client</th>
				<th>Prenom du Client</th>
				<th>Date</th>
				<th>Id_etat</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($commandes as $commande)
                <tr>
                    <td>{{{ $commande->nomClient }}}</td>
					<td>{{{ $commande->prenomClient }}}</td>
					<td>{{{ $commande->date }}}</td>
					<td>{{{ $commande->id_etat }}}</td>
                    <td>
                        {{ link_to_route('commandes.show', 'Voir', array($commande->id), array('class' => 'btn btn-info')) }}
                        {{ link_to_route('commandes.edit', 'Modifier', array($commande->id), array('class' => 'btn btn-info')) }}
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('commandes.destroy', $commande->id))) }}
                            {{ Form::submit('Supprimer', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no commandes
@endif

@stop