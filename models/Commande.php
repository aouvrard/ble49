<?php

class Commande extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
    	'nomClient' => 'required',
		'prenomClient' => 'required',
		'produitsSelect' => 'required'
	);

	public static $listeProduitCommande = array();

	public static function ajouterProduitCommande(ProduitCommande $monProduitCommande)
    {
        if(!isset(self::$listeProduitCommande[$monProduitCommande->id]))
        { 
            self::$listeProduitCommande[$monProduitCommande->id] = $monProduitCommande;
        }
    }
}