<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Shop;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function shopping(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'createddate' => "required",
            'name' => 'required|string',
        ]);

        $shoppings = Shop::create([
            'created_date' => $request->get('createddate'),
            'name' => $request->get('name'),
        ]);

        return response()->json(
            ['data' => $shoppings], 201);
    }

    public function getShoppings()
    {
        $shoppings = Shop::all();

        return response()->json(
            ['data' => $shoppings], 200);
    }

    public function getShoppingsById($id)
    {
        $shoppings = Shop::find($id);

        return response()->json(
            ['data' => $shoppings], 200);
    }

    public function updateShopping(Request $request, $id)
    {
        Shop::where('id', $id)
        ->update([
            "created_date" => $request->get('createddate'),
            "name" => $request->get('name'),
        ]);

        $shopping = Shop::find($id);

        return response()->json(
            ['data' => $shopping], 200);
    }

    public function deleteShopping($id)
    {
        $shopping = Shop::find($id);
        $shopping->delete();

        return response()->json(
            ['message' => 'Data successfully deleted'], 200);
    }
}
