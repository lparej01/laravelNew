<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;

class PDFController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function existCatPdf(Request $request)
    {
        
        $existencia  = DB::connection('sqlite') 
        ->table('existencia')
        ->join('sku', 'sku.sku', '=', 'existencia.sku') 
        ->join('categorias', 'categorias.catId', '=', 'sku.catId') 
        ->select('categorias.catId','categorias.categoria','periodo',
            DB::raw('sum(invInicial) as invInicial '),
            DB::raw('sum(entradas) as entradas'),
            DB::raw('sum(salidas) as salidas') ,
            DB::raw('sum(merma) as merma'),
            DB::raw('sum(invFinal)as invFinal'))       
        ->where('periodo',$request->rpte)
        ->groupBy('categorias.catId')
        ->orderBy('categorias.catId', 'asc')        
        ->get();

        ///dd($existencia );

        $pdf = PDF::loadView('abastecimiento.reportes.pdf.existencia-categ-pdf',compact('existencia'));
        return $pdf->stream('existencia-categ.pdf');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function existSkuPdf(Request $request)
    {
       

        $existencia  = DB::connection('sqlite') 
        ->table('existencia')
        ->join('sku', 'sku.sku', '=', 'existencia.sku')      
        ->select('existencia.*','sku.descripcion')             
        ->where('periodo',$request->rpte)      
        ->orderBy('sku.descripcion', 'asc')        
        ->get();

       // dd($existencia);
        $pdf = PDF::loadView('abastecimiento.reportes.pdf.existencia-sku-pdf',compact('existencia'));
        return $pdf->stream('existencia-sku.pdf');
       // $pdf->stream();
 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function existCostoSkuPdf(Request $request)
    {
     
        $existencia  = DB::connection('sqlite') 
        ->table('existencia')
        ->join('sku', 'sku.sku', '=', 'existencia.sku')      
        ->select('existencia.*','sku.descripcion')             
        ->where('periodo',$request->rpte)      
        ->orderBy('sku.descripcion', 'asc')        
        ->get();

        //dd($existencia);
        $pdf = PDF::loadView('abastecimiento.reportes.pdf.existencia-costo-sku-pdf',compact('existencia'));
        return $pdf->stream('existencia-costo-sku.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function existCostoCatPdf(Request $request)
    {
       

        $existencia  = DB::connection('sqlite') 
        ->table('existencia')
        ->join('sku', 'sku.sku', '=', 'existencia.sku') 
        ->join('categorias', 'categorias.catId', '=', 'sku.catId') 
        ->select('categorias.catId','categorias.categoria','periodo','existencia.costoUnitario',          
            DB::raw('sum(invFinal)as invFinal'))       
        ->where('periodo',$request->rpte)
        ->groupBy('categorias.catId')
        ->orderBy('categorias.catId', 'asc')        
        ->get();

      
        $pdf = PDF::loadView('abastecimiento.reportes.pdf.existencia-costo-categ-pdf',compact('existencia'));
        return $pdf->stream('existencia-costo-categ.pdf');

    }
}
