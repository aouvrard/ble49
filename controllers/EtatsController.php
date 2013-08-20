<?php

class EtatsController extends BaseController {

    /**
     * Etat Repository
     *
     * @var Etat
     */
    protected $etat;

    public function __construct(Etat $etat)
    {
        $this->etat = $etat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $etats = $this->etat->all();

        return View::make('etats.index', compact('etats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('etats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Etat::$rules);

        if ($validation->passes())
        {
            $this->etat->create($input);

            return Redirect::route('etats.index');
        }

        return Redirect::route('etats.create')
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
        $etat = $this->etat->findOrFail($id);

        return View::make('etats.show', compact('etat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $etat = $this->etat->find($id);

        if (is_null($etat))
        {
            return Redirect::route('etats.index');
        }

        return View::make('etats.edit', compact('etat'));
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
        $validation = Validator::make($input, Etat::$rules);

        if ($validation->passes())
        {
            $etat = $this->etat->find($id);
            $etat->update($input);

            return Redirect::route('etats.show', $id);
        }

        return Redirect::route('etats.edit', $id)
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
        $this->etat->find($id)->delete();

        return Redirect::route('etats.index');
    }

}