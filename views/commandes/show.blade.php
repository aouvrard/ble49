@extends('layouts.scaffold')

@section('main')

<h1>Show Commande</h1>

<p>{{ link_to_route('commandes.index', 'Return to all commandes') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>NomClient</th>
			<th>PrenomClient</th>
			<th>Date</th>
			<th>Id_etat</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $commande->nomClient }}}</td>
			<td>{{{ $commande->prenomClient }}}</td>
			<td>{{{ $commande->date }}}</td>
			<td>{{{ $commande->id_etat }}}</td>
            <td>{{ link_to_route('commandes.edit', 'Edit', array($commande->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('commandes.destroy', $commande->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
    </tbody>
</table>

<h3>Produit(s) commandé(s)</h3>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Libelle</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($produitsCommande as $produit)
        <tr>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop