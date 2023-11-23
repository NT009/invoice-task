<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use Illuminate\Http\Request;

class invoicesController extends Controller
{
    //show all invoice table
    public function index()
    {
        return view('home', ['invoices' => invoices::paginate(10)]);
    }
    //show single invoice
    public function show(invoices $invoice)
    {
        return view('details', ['invoice' => $invoice]);
    }

    //create invoice form
    public function create()
    {
        return view('create');
    }
    //delete invoice
    public function delete(invoices $invoice)
    {
        $invoice->delete();
        return redirect('/')->with('message', 'invoice deleted');
    }
    //edit invoice form
    public function edit(invoices $invoice)
    {
        return view('editInvoice', ['invoice' => $invoice]);
    }
    //update invoice
    public function update(Request $request, invoices $invoice)
    {
        $formfield = $request->validate([
            'quantity' => ['required', 'numeric', 'gte:0'],
            'amount' => ['required', 'numeric', 'gte:0'],
            'tax_percentage' => ['required', 'numeric'],
            'customer_name' => ['required', 'regex:/^[a-zA-Z\s]*$/'],
            'invoice_date' => ['required', 'date', 'before_or_equal:' . now()->format('Y-m-d')],
            'file' => ['required', 'file', 'mimes:jpg,pdf,png', 'max:3072'],
            'customer_email' => ['required', 'email']
        ]);
        $formfield['quantity'] = ($formfield['quantity'] + 0);
        $formfield['amount'] = ($formfield['amount'] + 0);

        $formfield['total_amount'] = $formfield['quantity'] * $formfield['amount'];
        $formfield['tax_amount'] = ($formfield['total_amount'] * ($formfield['tax_percentage'] + 0)) / 100;
        $formfield['net_amount'] = $formfield['tax_amount'] + $formfield['total_amount'];
        $formfield['file'] = $request->file('file')->store('invoiceFiles', 'public');

        $invoice->update($formfield);
        return redirect('/')->with('message', 'invoice has sucessfully updated');
    }
    //create new invoice
    public function store(Request $request)
    {
        $formfield = $request->validate([
            'quantity' => ['required', 'numeric', 'gte:0'],
            'amount' => ['required', 'numeric', 'gte:0'],
            'tax_percentage' => ['required', 'numeric'],
            'customer_name' => ['required', 'regex:/^[a-zA-Z\s]*$/'],
            'invoice_date' => ['required', 'date', 'before_or_equal:' . now()->format('Y-m-d')],
            'file' => ['required', 'file', 'mimes:jpg,pdf,png', 'max:3072'],
            'customer_email' => ['required', 'email']
        ]);
        $formfield['quantity'] = ($formfield['quantity'] + 0);
        $formfield['amount'] = ($formfield['amount'] + 0);

        $formfield['total_amount'] = $formfield['quantity'] * $formfield['amount'];
        $formfield['tax_amount'] = ($formfield['total_amount'] * ($formfield['tax_percentage'] + 0)) / 100;
        $formfield['net_amount'] = $formfield['tax_amount'] + $formfield['total_amount'];
        $formfield['file'] = $request->file('file')->store('invoiceFiles', 'public');

        invoices::create($formfield);
        return redirect('/')->with('message', 'invoice has sucessfully create and email have been sent');
    }
}
