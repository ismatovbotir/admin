<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Http;
use App\Models\PriceList;
use App\Models\Adines;

class PriceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->shop->price_code == null) {
            $content = "please select shop";
            $tableData = array();
        } else {
            $content = 'home';
            $tableData = PriceList::where('user_id', Auth::user()->id)->get();
            //dd($tableData);
        }
        return view('price.index', ['content' => $content, 'tableData' => $tableData]);
    }

    public function item(Request $request)
    {
        $barcode = $request->input('barcode');
        $price_code = Auth::user()->shop->price_code;
        $ware_code = Auth::user()->shop->shop_code;
        if ($barcode == null) {
            return redirect()->route('price.index');
        }
        $adines = Adines::first();
        //dd($adines);
        $auth = base64_encode($adines->login . ':' . $adines->password);
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $auth,
            'Cache-Control' => 'no-cache',
            'Content-Type' => 'application/json'

        ])->post($adines->adress . 'item?code=' . $price_code . '&barcode=' . $barcode . '&ware=' . $ware_code);
        if ($response->successful()) {
            $res = $response->json();
            //dd($res);    
            if ($res["code"] == 1) {
                return redirect('price.index');
            } else {

                return view('price.item', ["data" => $res['data']]);
            }
        } else {
            return redirect()->route('price.index')->withErrors('1c Server Connection error');
        }
    }

    public function additem(Request $request)
    {
        $code = $request->input('code');
        $name = $request->input('name');
        $price = $request->input('price');
        $barcode = $request->input('barcode');
        $qty = $request->input('qty');
        $user_id = Auth::user()->id;
        $price_code = Auth::user()->shop->price_code;
        $pricelist = PriceList::create([
            'user_id' => $user_id,
            'code' => $code,
            'price' => $price,
            'qty' => $qty,
            'barcode' => $barcode,
            'name' => $name,
            'price_code' => $price_code


        ]);
        return redirect()->route('price.index');
    }
    public function dellitem(Request $request)
    {
        $id = $request->input('id');
        $item = PriceList::where('id', $id)->delete();
        return redirect()->route('price.index');
    }
    public function load1c(Request $request)
    {
        $tableData = PriceList::where('user_id', Auth::user()->id)->get();
        if (count($tableData) > 0) {
            $products = [];
            foreach ($tableData as $item) {
                $product = array(
                    "code" => $item["code"],
                    "price" => $item["price"]
                );
                $products[] = $product;
            }
            //dd($products);
            $data = array(
                "comment" => "test",
                "user" => Auth::user()->name,
                "code" => Auth::user()->shop->price_code,
                "productList" => $products
            );
            $adines = Adines::first();
            $auth = base64_encode($adines->login . ':' . $adines->password);

            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . $auth,
                'Cache-Control' => 'no-cache',
                'Content-Type' => 'application/json'

            ])->withBody(json_encode($data))->post($adines->adress . 'pricelist');
            if ($response->successful()) {
                $res = $response->json();
                if ($res["status"] == "ok") {
                    $del = PriceList::where('user_id', Auth::user()->id)->delete();
                }
                return redirect()->route('price.index');
            } else {
                return redirect()->route('price.index')->withErrors(['1c connection error']);
            }
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('main');
    }
}
