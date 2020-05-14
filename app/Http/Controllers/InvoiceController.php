<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Invoice::select([
                'user_id', 'invoiceDate', 'invoiceDue'
            ]))
                ->addIndexColumn()
                ->addColumn('action', function ($data) {

                    $editUrl = url('update/' . $data->id);
                    $btn = '<a href="' . $editUrl . '" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteTodo">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('invoice');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'user_id' => 'required',
            'invoiceDate' => 'required',
            'invoiceDue' => 'required',
        ]);

        $invoice = $request->all();
        $invo = Invoice::create($invoice);
        $invo->save();
        if ($invo) {
            return response()->json([
                'success' => true,
                'message' => 'Invoice Created'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::find($id);
        return $invoice;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);

        $invoice->user_id = $request->user_id;
        $invoice->invoiceDate = $request->invoiceDate;
        $invoice->invoiceDue = $request->invoiceDue;

        $invoice->save();

        return response()->json([
            'success' => true,
            'message' => 'Invoice Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return response()->json([
            'success' => true,
            'message' => 'Invoice Deleted'
        ]);
    }
}
