<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\PtcView;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function transaction()
    {
        $page_title = 'Transaction Logs';
        $transactions = Transaction::with('user')->latest()->paginate(getPaginate());
        $empty_message = 'No transactions.';
        return view('admin.reports.transactions', compact('page_title', 'transactions', 'empty_message'));
    }

    public function transactionSearch(Request $request)
    {
        $request->validate(['search' => 'required']);
        $search = $request->search;
        $page_title = 'Transactions Search - ' . $search;
        $empty_message = 'No transactions.';

        $transactions = Transaction::with('user')->whereHas('user', function ($user) use ($search) {
            $user->where('username', 'like',"%$search%");
        })->orWhere('trx', $search)->paginate(getPaginate());

        return view('admin.reports.transactions', compact('page_title', 'transactions', 'empty_message'));
    }

    public function ptcview()
    {
        $page_title = 'PTC View Logs';
        $ptcviews = PtcView::latest()->with(['user','ptc'])->paginate(getPaginate());
        $empty_message = 'No PTC View Yet.';
        return view('admin.reports.ptcview', compact('page_title', 'ptcviews', 'empty_message'));
    }

    public function ptcviewSearch(Request $request)
    {
        $request->validate(['search' => 'required']);
        $search = $request->search;
        $page_title = 'PTC View Search - ' . $search;
        $empty_message = 'No PTC View.'; 

        $ptcviews = PtcView::latest()->with(['user','ptc'])->whereHas('user', function ($user) use ($search) {
            $user->where('username', 'like',"%$search%");
        })->paginate(getPaginate());
        return view('admin.reports.ptcview', compact('page_title', 'ptcviews', 'empty_message','search'));
    }
}
