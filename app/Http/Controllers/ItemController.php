<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required',
            'item' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $items = $request->all();
        $item = Item::create($items);
        $item->save();
        if ($item) {
            return response()->json([
                'success' => true,
                'message' => 'Item Created'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Item::find($id);
        return $items;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $items = Item::findOrFail($id);

        $items->invoice_id = $request->invoice_id;
        $items->item = $request->item;
        $items->product_id = $request->product_id;
        $items->quantity = $request->quantity;

        $items->save();

        return response()->json([
            'success' => true,
            'message' => 'Item Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::findOrFail($id);
        $items->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item Deleted'
        ]);
    }
}
