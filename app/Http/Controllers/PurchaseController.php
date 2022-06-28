<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Requests\StorePurchase;
use App\Models\Product;
use App\Models\Provider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade as PDF;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:purchases.index')->only('index');
        $this->middleware('can:purchases.create')->only('create', 'store');
        $this->middleware('can:purchases.show')->only('show');
        $this->middleware('can:purchases.pdf')->only('pdf');
        $this->middleware('can:change.status.purchases')->only('change_status');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::get();
        $products = Product::where('status', 'ACTIVE')->get();
        return view('admin.purchase.create', compact('providers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchase $request)
    {
        $purchase = Purchase::create($request->all()+[
            'user_id' => Auth::user()->id,
            'purchase_date' => Carbon::now('America/Lima'),
        ]);

        foreach ($request->product_id as $key => $product) {
            $result[] = array(
                "product_id" => $request->product_id[$key],
                "quantity" => $request->quantity[$key],
                "price" => $request->price[$key]
            );
        }

        $purchase->purchaseDetails()->createMany($result);
        return redirect()->route('purchases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('admin.purchase.show', compact('purchase','purchaseDetails','subtotal'));
    }

    public function pdf(Purchase $purchase)
    {
        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }

        $pdf = PDF::loadView('admin.purchase.pdf', compact('purchase','subtotal','purchaseDetails'));
        return $pdf->download('Reporte_de_compra_'.$purchase->id.'.pdf');
    }

    public function upload(Request $request, Purchase $purchase)
    {
        //Subir algun archivo
    }

    public function change_status(Purchase $purchase)
    {
        if ($purchase->status == 'VALID') {
            $purchase->update(['status'=>'CANCELED']);
            return redirect()->back();
        } else {
            $purchase->update(['status'=>'VALID']);
            return redirect()->back();
        }
    }
}
