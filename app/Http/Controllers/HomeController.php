<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:home.index')->only('index');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product['active'] = Product::where('status','ACTIVE')->count();
        $provider['all'] = Provider::count();
        $customer['all'] = Customer::count();
        $user['all'] = User::count();

        // $totales=DB::select('SELECT (select ifnull(sum(c.total),0) from purchases c where DATE(c.purchase_date)=curdate() and c.status="VALID") as totalcompra, (select ifnull(sum(v.total),0) from sales v where DATE(v.sale_date)=curdate() and v.status="VALID") as totalventa');
        $purchasesToday = Purchase::where('purchase_date', '>=', Carbon::now()->subDays(1))->where('status', 'VALID')->sum('total');
        $salesToday = Sale::where('sale_date', '>=', Carbon::now()->subDays(1))->where('status', 'VALID')->sum('total');

        $comprasmes=DB::select('SELECT month(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALID" group by month(c.purchase_date) order by month(c.purchase_date) desc limit 12');
        $ventasmes=DB::select('SELECT month(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALID" group by month(v.sale_date) order by month(v.sale_date) desc limit 12');
        // $comprasmes=DB::select('SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALID" group by monthname(c.purchase_date) order by month(c.purchase_date) desc limit 12');
        // $ventasmes=DB::select('SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALID" group by monthname(v.sale_date) order by month(v.sale_date) desc limit 12');

        // $ventasdia=DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") as dia, sum(v.total) as totaldia from sales v where v.status="VALID" 
        //     group by v.sale_date order by day(v.sale_date) desc limit 15');
        // $ventasdia=DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") as dia, count(*) as totaldia from sales v where v.status="VALID" 
        //     group by v.sale_date order by day(v.sale_date) desc limit 15');
        // Ultimo 30 dias
        $ventasdia = Sale::where('status', 'VALID')->select(
            DB::raw("sum(total) as total"),
            DB::raw("DATE_FORMAT(sale_date, '%d/%m/%Y') as date")
        )->groupBy('date')->take(30)->get();

        // Ventas diarias en los ultimos 30 dias
        $dailySales=Sale::where('created_at', '>=', Carbon::now()->subDays(30))->where('status', 'VALID')
            ->selectRaw('DATE_FORMAT(sale_date, "%d/%m/%Y") as dia')
            ->selectRaw('sum(total) as totaldia')
            ->groupBy('sale_date')
            ->get();

        $mostSelledProducts = Product::join('sale_details', 'products.id', '=', 'sale_details.product_id')
            ->join('sales', 'sale_details.sale_id', '=', 'sales.id')->where('sales.status', 'VALID')
            // ->sum('sale_details.quantity')
            ->select('code', 'sale_details.quantity','name', 'products.id', 'stock')
            ->groupBy('products.code', 'products.name','products.id','products.stock','sale_details.quantity');

        $productosvendidos=DB::select(
            'SELECT p.code as code, sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p 
            inner join sale_details dv on p.id=dv.product_id 
            inner join sales v on dv.sale_id=v.id where v.status="VALID" 
            and year(v.sale_date)=year(curdate()) 
            group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10'
        );
        // $products = Product::with('provider')->get();

        // dd($ventasmes);
       
        return view('home', compact('purchasesToday','salesToday', 'product', 'comprasmes', 'ventasmes', 'ventasdia', 'productosvendidos', 'provider', 'customer', 'user'));
    }
}
