@extends('layouts.ble_admin')

@section('main')

<p>{{ link_to_route('produits.index', 'Gérer les produits') }}</p>
<p>{{ link_to_route('commandes.create', 'Créer une commande') }}</p>
<p>{{ link_to_route('commandes.index', 'Consulter les commande') }}</p>
