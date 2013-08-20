@extends('layouts.scaffold')

@section('main')

<h1>Create Commande</h1>

{{ Form::open(array('route' => 'commandes.store')) }}
    <ul>
        <li>
            {{ Form::label('nomClient', 'Nom:') }}
            {{ Form::text('nomClient') }}
        </li>
        
        <li>
            {{ Form::label('prenomClient', 'Prenom:') }}
            {{ Form::text('prenomClient') }}
        </li>
        
        <li>
        @if ($produits->count())
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sélectionnez</th>
                        <th>Libelle</th>
                        <th>Prix</th>
                        <th>Unite</th>
                        <th>Quantité</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($produits as $produit)
                        <tr>
                            <td>{{ Form::checkbox('produitsSelect[]',$produit->id) }}</td>
                            <td>{{{ $produit->libelle }}}</td>
                            <td>{{{ $produit->prix }}}</td>
                            <td>{{{ $produit->unite }}}</td>
                            <td>{{ Form::text('quantite[]') }}</td>
                            <td>{{ Form::hidden('produits[]',$produit->id) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </li>
        
        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
        @else
            Il n'y a pas de produits
        @endif
        
        @stop
        
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


