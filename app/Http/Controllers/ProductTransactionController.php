<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductTransaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $date = $request->input('date');
        $user = Auth::user();

        $dates = DB::table('product_transactions')
            ->select(DB::raw('DATE(created_at) as date'))
            ->distinct()
            ->orderBy('date', 'desc')
            ->get();



        if ($user->hasRole('buyer')) {
            $product_transactions = $user->productTransactions()->latest()->when($date, function($query) use ($date) {
                return $query->whereDate('created_at', '=', $date);
            })->get();

            $totalTransaction = $product_transactions
            ->when($date, function($query) use ($date) {
                return $query->whereDate('created_at', '=', $date);
            })
            ->sum('total_amount');
        } else {
            $product_transactions = ProductTransaction::latest()
                ->when($date, function($query) use ($date) {
                    return $query->whereDate('created_at', '=', $date);
                })
                ->get();

            $totalTransaction = $product_transactions
            ->when($date, function($query) use ($date) {
                return $query->whereDate('created_at', '=', $date);
            })
            ->sum('total_amount');

        }

        return view('admin.product_transactions.index', compact('product_transactions', 'dates', 'totalTransaction'));
    }


    public function searchDate($date = '')
    {
        $user = Auth::user();

        if($user->hasRole('buyer')){
            $product_transactions = $user->productTransactions()->latest()->get();
        } else {
            $product_transactions = ProductTransaction::latest()->where('created_at', 'LIKE', '%'.$date.'%')->get();

        }
        return view('admin.product_transactions.index', compact('product_transactions', 'totalTransaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'proof' => 'required|image|mimes:png,jpg,jpeg,svg|max:2000',
            'notes' => 'required|string|max:65535',
            'post_code' => 'required|integer',
            'phone_number' => 'required|integer',
        ]);

        DB::beginTransaction();

        try {
            $subTotalCents = 0;
            $deliveryFeeCents = 10000 * 100;

            $cartItems = $user->carts;

            foreach($cartItems as $item) {
                $subTotalCents += $item->product->price * 100;
            }


            $grandTotalCents = $subTotalCents + $deliveryFeeCents;

            $grandTotal = $grandTotalCents / 100;

            $validated['user_id'] = $user->id;
            $validated['total_amount'] = $grandTotal;
            $validated['is_paid'] = false;

            if($request->hasFile('proof')) {
                $proofPath = $request->file('proof')->store('payment_proofs', 'public');
                $validated['proof'] = $proofPath;

            }

            $newTransaction = ProductTransaction::create($validated);

            foreach($cartItems as $item) {
                TransactionDetail::create([
                    'product_transaction_id' => $newTransaction->id,
                    'product_id' => $item->product->id,
                    'price' => $item->product->price,
                ]);

                $item->delete();
            }

            DB::commit();

            return redirect()->route('product_transactions.index');


        } catch(\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'systemm_error' => ['System error!' => $e->getMessage()],
            ]);

            throw $error;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductTransaction $productTransaction)
    {
        $productTransaction = ProductTransaction::with('transactionDetails.product')->find($productTransaction->id);
        return view('admin.product_transactions.details')->with('productTransaction', $productTransaction);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductTransaction $productTransaction)
    {
        $productTransaction->update([
            'is_paid' => true,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductTransaction $productTransaction)
    {
        //
    }
}
