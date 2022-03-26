<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $transaction = Transaction::all();

        return view('checkout.index', ['transactions' => $transactions]);
    }

    public function show(Transaction $transaction)
    {
        return view('checkout.show', ['transaction' => $transaction]);
    }
}
