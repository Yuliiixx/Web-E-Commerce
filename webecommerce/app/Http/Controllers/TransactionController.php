<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $totalPemasukanOrders = Order::sum('total_amount');
        $totalPemasukanTransactions = Transaction::where('transaction_type', 'Pemasukan')->sum('jumlah');
        $totalPengeluaran = Transaction::where('transaction_type', 'Pengeluaran')->sum('jumlah');
        
        return view('transactions.index', compact('totalPemasukanOrders', 'totalPemasukanTransactions', 'totalPengeluaran'));
    }

    public function pemasukan()
    {
        $pemasukanTransactions = Transaction::where('transaction_type', 'Pemasukan')->get();
        return view('transactions.pemasukan', compact('pemasukanTransactions'));
    }
    
    public function pengeluaran()
    {
        $pengeluaranTransactions = Transaction::where('transaction_type', 'Pengeluaran')->get();
        return view('transactions.pengeluaran', compact('pengeluaranTransactions'));
    }
    

    public function create(Request $request)
    {
        $type = $request->get('type');
        return view('transactions.create', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_type' => 'required|in:Pemasukan,Pengeluaran',
            'jumlah' => 'required|numeric',
            'description' => 'required|string',
            'date' => 'required|date',
            'category' => 'required|string',
            'payment_method' => 'required|string',
            'reference_number' => 'nullable|string',
            'id_user' => 'nullable|integer',
            'id_order' => 'nullable|integer',
            'status' => 'nullable|string',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'transaction_type' => 'required|in:Pemasukan,Pengeluaran',
            'jumlah' => 'required|numeric',
            'description' => 'required|string',
            'date' => 'required|date',
            'category' => 'required|string',
            'payment_method' => 'required|string',
            'reference_number' => 'nullable|string',
            'id_user' => 'nullable|integer',
            'id_order' => 'nullable|integer',
            'status' => 'nullable|string',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
