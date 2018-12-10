<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use App\Http\Resources\Loan as LoanResource;
use App\LoanType as LoanType;


class LoanController extends Controller
{
    public function index(){
        // Ambil data Loan Type dari Table terus dijadiin array yang bener
        $loanoptions = LoanType::select('id AS value', 'loan_type AS text')->get();
        $loanoptions = $loanoptions->toJson();

        return view('simulation', compact('loanoptions'));
    }

    public function show ($id)
    {
        return new LoanResource(Loan::find($id));
    }

    public function store(Request $request)  {
 
        $loan = new Loan;
            
        $loan->rekening = $request->input('rekening');
        $loan->nama = $request->input('nama');
        $loan->telepon = $request->input('telepon');
        $loan->plafon = $request->input('plafon');
        $loan->tipe_pinjaman = $request->input('tipe_pinjaman');
        $loan->kmk = $request->input('kmk');
        $loan->dsc = $request->input('dsc');
 
        if($loan->save()) {
            return new LoanResource($loan);
        } 
    }
}
