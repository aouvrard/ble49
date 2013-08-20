<?php

class CommandesController extends BaseController {

    /**
     * Commande Repository
     *
     * @var Commande
     */
    protected $commande;

    public function __construct(Commande $commande)
    {
        $this->commande = $commande;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $commandes = $this->commande->all();

        return View::make('commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $produits = Produit::all();
//        $users = User::all();
        
        return View::make('commandes.create',  compact('produits'), compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Commande::$rules);
        $validationProduitCommande = Validator::make($input, ProduitCommande::$rules);


        if ($validation->passes())
        {
            $tabProdSelect=Input::get('produitsSelect');
            $tabQte=Input::get('quantite');
            $tabProduits=Input::get('produits');

            //Insertion de la commande
            DB::table('commandes')->insert(
                array(
                    'nomClient' => Input::get('nomClient'),
                    'prenomClient' => Input::get('prenomClient'),
                    'date' => new DateTime,
                    'id_etat' => '1',
                    )
                );
            

            //on récupère l'id de la commande nouvellement créé
            $lastCommande=Commande::orderBy('id', 'desc')->first();

            // Pour chaque produits contenu dans la base on regarde si il a été sélectionné.
            // si oui on vérifie avec le tableau des quantités, au même index que les produits,
            // si une quantité est présente.

            for ($i=0; $i<count($tabProduits); $i++) 
            {
                for ($j=0; $j<count($tabProdSelect); $j++)
                {
                    //si le produit à été sélectionné
                    if ($tabProduits[$i] == $tabProdSelect[$j])
                    {
                        //on récupère la quantité
                        if(!empty($tabQte[$i]))
                        {
                            //on enrichie la table produitCommande
                            DB::table('produitCommande')->insert(
                                array(
                                    'idCommande' => $lastCommande->id,
                                    'idProduit' => $tabProdSelect[$j],
                                    'qte' => $tabQte[$i],
                                    )
                            );
                        }
                        //quantité non présente ou mal saisie
                        else
                        {
                            return Redirect::route('commandes.create')
                                ->withInput()
                                ->withErrors($validation)
                                ->with('message', 'Erreur, Merci de bien vérifier votre saisie');
                        }
                    }
                }
            }
            return Redirect::route('commandes.show', $lastCommande->id);
        }

        return Redirect::route('commandes.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'Erreur, Merci de bien vérifier votre saisie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $commande = $this->commande->findOrFail($id);
        $produitsCommande = produitComm::join('commandes', 'commandes.id', '=', 'produitCommande.idCommande')
            ->where('produitCommande.idCommande','=',$id)
            ->get();

        foreach ($produitsCommande as $produitCommande) {
            $commande::ajouterProduitCommande($produitCommande);
        }


        return View::make('commandes.show', compact('commande'), compact('produitsCommande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $commande = $this->commande->find($id);

        if (is_null($commande))
        {
            return Redirect::route('commandes.index');
        }

        return View::make('commandes.edit', compact('commande'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Commande::$rules);

        if ($validation->passes())
        {
            $commande = $this->commande->find($id);
            $commande->update($input);

            return Redirect::route('commandes.show', $id);
        }

        return Redirect::route('commandes.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->commande->find($id)->delete();
        DB::table('produitCommande')->where('idCommande' ,'=', $id)->delete();

        return Redirect::route('commandes.index');
    }

}