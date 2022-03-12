<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomer;
use App\Http\Requests\UpdateCustomer;

use GuzzleHttp\Client;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:customers.index')->only('index');
        $this->middleware('can:customers.create')->only('create', 'store');
        $this->middleware('can:customers.edit')->only('edit', 'update');
        $this->middleware('can:customers.show')->only('show');
        $this->middleware('can:customers.destroy')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get();
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomer $request)
    {
        Customer::create($request->all());
        if ($request->sent_from == 'sale') {
            return redirect()->route('sales.create')->with('success', 'ok');
        }
        return redirect()->route('customers.index')->with('success', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $total_purchases = 0;
        foreach ($customer->sales as $key =>  $sale) {
            $total_purchases+=$sale->total;
        }
        return view('admin.customer.show', compact('customer', 'total_purchases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomer $request, Customer $customer)
    {
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('eliminar', 'ok');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $token = 'apis-token-1711.UYQZMRIHkH9qasi-db8zW7U3SehQvcmq';
            $numero = $request->dni;
            
            $client = new Client(['base_uri' => 'https://api.apis.net.pe', 'verify' => false]);
            $parameters = [
                'http_errors' => false,
                'connect_timeout' => 5,
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                    'Referer' => 'https://apis.net.pe/api-consulta-dni',
                    'User-Agent' => 'laravel/guzzle',
                    'Accept' => 'application/json',
                ],
                'query' => ['numero' => $numero]
            ];
            $res = $client->request('GET', '/v1/dni', $parameters);
            $datos = json_decode($res->getBody()->getContents(), true);
            return response()->json($datos);
        }
    }
}
