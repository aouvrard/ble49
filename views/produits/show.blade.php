@extends('layouts.ble_admin')

@section('main')

<h1>Show Produit</h1>

<p>{{ link_to_route('produits.index', 'Return to all produits') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Libelle</th>
			<th>Prix</th>
            <th>Unite</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $produit->libelle }}}</td>
            <td>{{{ $produit->prix }}}</td>
            <td>{{{ $produit->unite }}}</td>
            <td>{{ link_to_route('produits.edit', 'Edit', array($produit->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('produits.destroy', $produit->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
    </tbody>
</table>

@stop