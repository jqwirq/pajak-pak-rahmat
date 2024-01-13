<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate(10);
        foreach ($items as $i) {
            $i->price = number_format($i->price, 0, '', '.');
            $i->tax = number_format($i->tax, 0, ',', '.');
            $i->sub_total = number_format($i->sub_total, 0, '', '.');
            $i->total = number_format($i->total, 0, '', '.');
        }

        return view("items/index", [
            "items" => $items
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
        Item::create($data);
        // return $request->all();
        return redirect("/items");
    }
    public function destroy(Item $item) {
        Item::destroy($item->id);
        return redirect("/items");
    }
}
