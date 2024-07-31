<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payment.index', compact('payments'));
    }

    public function create()
    {
        return view('payment.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'package_type' => 'required|string',
            'amount' => 'required|string', // Processed later
            'jenis_payment' => 'required|string',
            'payment_date' => 'required|date_format:Y-m-d H:i|after_or_equal:now',
        ]);

        // Remove currency symbols and convert to float
        $validated['amount'] = floatval(str_replace(['RP', '.', ','], '', $validated['amount']));

        // Convert date format before saving
        $validated['payment_date'] = Carbon::createFromFormat('Y-m-d H:i', $validated['payment_date'])->format('Y-m-d H:i:s');

        Payment::create($validated);

        return redirect()->route('payments.index')->with('data_added', 'Data added successfully!!');
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payment.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'package_type' => 'required|string',
            'amount' => 'required|numeric|min:0|max:99999999.99',
            'jenis_payment' => 'required|string',
            'payment_date' => 'required|date_format:Y-m-d H:i|after_or_equal:now',
        ]);

        $payment = Payment::findOrFail($id);

        // Remove currency symbols and convert to float
        $validated['amount'] = floatval(str_replace(['RP', '.', ','], '', $validated['amount']));

        // Convert date format before updating
        $validated['payment_date'] = Carbon::createFromFormat('Y-m-d H:i', $validated['payment_date'])->format('Y-m-d H:i:s');

        $payment->update($validated);

        return redirect()->route('payments.index')->with('success', 'Data updated successfully!!');
    }

    public function destroy($id)
    {
        Payment::destroy($id);
        return redirect()->route('payments.index')->with('delete', 'Data deleted successfully!!');
    }
}
