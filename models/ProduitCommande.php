<?php

class ProduitCommande extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'idProduit' => 'required',
		'idCommande' => 'required',
		'qte' => 'required'
	);

	public $commande;
	public $produit;
	public $qte;

	

}