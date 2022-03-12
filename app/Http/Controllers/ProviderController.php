<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProvider;
use App\Http\Requests\UpdateProvider;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:providers.index')->only('index');
        $this->middleware('can:providers.create')->only('create', 'store');
        $this->middleware('can:providers.edit')->only('edit', 'update');
        $this->middleware('can:providers.show')->only('show');
        $this->middleware('can:providers.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::get();
        return view('admin.provider.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProvider $request)
    {
        Provider::create($request->all());
        if ($request->sent_from == 'purchase') {
            return redirect()->route('purchases.create')->with('success', 'ok');
        }
        return redirect()->route('providers.index')->with('success', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return view('admin.provider.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('admin.provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProvider $request, Provider $provider)
    {
        $provider->update($request->all());
        return redirect()->route('providers.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('providers.index')->with('eliminar', 'ok');
    }
}
