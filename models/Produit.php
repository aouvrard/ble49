<?php

class Produit extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'libelle' => 'required',
		'prix' => 'required',
	);
}