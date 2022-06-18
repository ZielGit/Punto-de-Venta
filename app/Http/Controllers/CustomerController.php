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
        $token = config('services.apisunat.token');
        $baseurl = config('services.apisunat.baseurl');
        $urldni = config('services.apisunat.urldni');
        $urlruc = config('services.apisunat.urlruc');

        if ($request->ajax()) {
            $numero = $request->document_number;
            $client = new Client(['base_uri' => $baseurl, 'verify' => false]);

            if ($request->document_type == 'DNI') {
                $parameters = [
                    'http_errors' => false,
                    'connect_timeout' => 5,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token,
                        'Referer' => $urldni,
                        'User-Agent' => 'laravel/guzzle',
                        'Accept' => 'application/json',
                    ],
                    'query' => ['numero' => $numero]
                ];
                $res = $client->request('GET', '/v1/dni', $parameters);
            } else if ($request->document_type == 'RUC') {
                $parameters = [
                    'http_errors' => false,
                    'connect_timeout' => 5,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token,
                        'Referer' => $urlruc,
                        'User-Agent' => 'laravel/guzzle',
                        'Accept' => 'application/json',
                    ],
                    'query' => ['numero' => $numero]
                ];
                $res = $client->request('GET', '/v1/ruc', $parameters);
            }
            
            $datos = json_decode($res->getBody()->getContents(), true);
            return response()->json($datos);
        }
    }
}
