<?php

class ProduitsController extends BaseController {

    /**
     * Produit Repository
     *
     * @var Produit
     */
    protected $produit;

    public function __construct(Produit $produit)
    {
        $this->produit = $produit;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $produits = $this->produit->all();

        return View::make('produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Produit::$rules);

        if ($validation->passes())
        {
            $this->produit->create($input);

            return Redirect::route('produits.index');
        }

        return Redirect::route('produits.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $produit = $this->produit->findOrFail($id);

        return View::make('produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $produit = $this->produit->find($id);

        if (is_null($produit))
        {
            return Redirect::route('produits.index');
        }

        return View::make('produits.edit', compact('produit'));
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
        $validation = Validator::make($input, Produit::$rules);

        if ($validation->passes())
        {
            $produit = $this->produit->find($id);
            $produit->update($input);

            return Redirect::route('produits.show', $id);
        }

        return Redirect::route('produits.edit', $id)
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
        $this->produit->find($id)->delete();

        return Redirect::route('produits.index');
    }

}