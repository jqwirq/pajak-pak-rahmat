<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::paginate(10);
        // dd($purchases);
        foreach ($purchases as $p) {
            $p->price = number_format($p->price, 0, '', '.');
            $p->tax = number_format($p->tax, 0, ',', '.');
            $p->sub_total = number_format($p->sub_total, 0, '', '.');
            $p->total = number_format($p->total, 0, '', '.');
        }

        return view("items/index", [
            "purchases" => $purchases
        ]);
    }

    // // Request $request
    // public function store()
    // {
    //     // $validateData = $request->valdate([
    //     //     "item_name" => "required|max:255",
    //     //     "price" => "required"
    //     // ]);
    //     return request()->all();
    // }
    public function store(Request $request)
    {
        // $validateData = $request->validate([
        //     "item_name" => "required|max:255",
        //     "price" => "required",
        //     "quantity" => "required",
        // ]);
        $data = $request->all();
        // @dd($data);
        Purchase::create($data);
        // return $request->all();
        return redirect("/purchases");
    }
}
