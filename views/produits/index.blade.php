@extends('layouts.ble_admin')

@section('main')

<h1>Tous les Produits</h1>

<p>{{ link_to_route('produits.create', 'Add new produit') }}</p>

@if ($produits->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Libelle</th>
                <th>Prix</th>
                <th>Unite</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($produits as $produit)
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
            @endforeach
        </tbody>
    </table>
@else
    There are no produits
@endif

@stop