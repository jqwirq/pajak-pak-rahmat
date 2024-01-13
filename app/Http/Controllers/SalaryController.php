<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::all();

        return view("salaries/index", [
            "salaries" => $salaries
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
        Salary::create($data);
        // return $request->all();
        return redirect("/salaries");
    }
    public function destroy(Salary $salary) {
        Salary::destroy($salary->id);
        return redirect("/salaries");
    }
}
