<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SistemaAbastecimiento\Existencia;
use App\Models\SistemaAbastecimiento\Sku;
use App\Models\SistemaAbastecimiento\Periodo;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function existenciaCategoria()
    {
        /***aqui va al formulario para selecionar el periodo */
        return view("abastecimiento.reportes.existencia-categoria");

    }

     /*Reporte de existencia por categoria
     */
    public function exisCategReporte(Request $request){
       
         
         /**Valido los campos del formulario */
         $messages = [           
            'fechaPeriodo.required' => 'La búsqueda por periodo no puede estar en blanco'                      
        ];

        $request->validate([
            'fechaPeriodo' => ['required']
          
        ], $messages);
        
        $periodoActual = Periodo::buscarPeriodoActual();
        $periodo = $request->fechaPeriodo;

        /* SELECT categorias.catId ,existencia.sku, periodo, SUM( invInicial),SUM( entradas), sum(salidas), SUM(merma), sum(invFinal)
        FROM existencia 
        INNER JOIN sku  on sku.sku  = existencia.sku
        INNER JOIN categorias  on categorias.catId  = sku.catId
        where periodo = 202405
        GROUP BY categorias.catId
        ORDER BY categorias.catId */

        
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
        ->where('periodo',$periodo)
        ->groupBy('categorias.catId')
        ->orderBy('categorias.catId', 'asc')        
        ->get();

        

       return view("abastecimiento.reportes.existencia-categoria-reporte",compact('existencia'));
    
       
    }

     /*Reporte de existencia por categoria
     */
    public function exisCostoCategReporte(Request $request){
       
         
        /**Valido los campos del formulario */
        $messages = [           
           'fechaPeriodo.required' => 'La búsqueda por periodo no puede estar en blanco'                      
       ];

       $request->validate([
           'fechaPeriodo' => ['required']
         
       ], $messages);
       
       $periodoActual = Periodo::buscarPeriodoActual();
       $periodo = $request->fechaPeriodo;

       /* SELECT categorias.catId ,existencia.sku, periodo, SUM( invInicial),SUM( entradas), sum(salidas), SUM(merma), sum(invFinal)
       FROM existencia 
       INNER JOIN sku  on sku.sku  = existencia.sku
       INNER JOIN categorias  on categorias.catId  = sku.catId
       where periodo = 202405
       GROUP BY categorias.catId
       ORDER BY categorias.catId */

       
       $existencia  = DB::connection('sqlite') 
       ->table('existencia')
       ->join('sku', 'sku.sku', '=', 'existencia.sku') 
       ->join('categorias', 'categorias.catId', '=', 'sku.catId') 
       ->select('categorias.catId','categorias.categoria','periodo',          
           DB::raw('sum(invFinal)as invFinal'),'existencia.costoUnitario')       
       ->where('periodo',$periodo)
       ->groupBy('categorias.catId')
       ->orderBy('categorias.catId', 'asc')        
       ->get();

       

      return view("abastecimiento.reportes.existencia-costo-categoria-reporte",compact('existencia'));
   
      
   }

    /*Reporte de xistencia por categoria
     */
    public function existenciaCategoriaSkuReporte(Request $request){
       
         
        /**Valido los campos del formulario */
        $messages = [           
           'fechaPeriodo.required' => 'La búsqueda por periodo no puede estar en blanco'                      
       ];

       $request->validate([
           'fechaPeriodo' => ['required']
         
       ], $messages);
       
       $periodoActual = Periodo::buscarPeriodoActual();
       $periodo = $request->fechaPeriodo;

      
       
       $existencia  = DB::connection('sqlite') 
       ->table('existencia')
       ->join('sku', 'sku.sku', '=', 'existencia.sku')      
       ->select('existencia.*','sku.descripcion')             
       ->where('periodo',$periodo)      
       ->orderBy('sku.descripcion', 'asc')        
       ->get();

       

      return view("abastecimiento.reportes.existencia-sku-reporte",compact('existencia'));
   
      
   }
    /*Reporte de xistencia por categoria
     */
    public function existenciaCostoSkuReporte(Request $request){
       
         
        /**Valido los campos del formulario */
        $messages = [           
           'fechaPeriodo.required' => 'La búsqueda por periodo no puede estar en blanco'                      
       ];

       $request->validate([
           'fechaPeriodo' => ['required']
         
       ], $messages);
       
       $periodoActual = Periodo::buscarPeriodoActual();
       $periodo = $request->fechaPeriodo;

      
       
       $existencia  = DB::connection('sqlite') 
       ->table('existencia')
       ->join('sku', 'sku.sku', '=', 'existencia.sku')      
       ->select('existencia.*','sku.descripcion')             
       ->where('periodo',$periodo)      
       ->orderBy('sku.descripcion', 'asc')        
       ->get();

       

      return view("abastecimiento.reportes.existencia-costo-sku-reporte",compact('existencia'));
   
      
   }


    /**
     * Show the form for creating a new resource.
     */
    public function existenciaSku()
    {
        return view("abastecimiento.reportes.existencia-sku");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function existenciaCostoSku()
    {
        return view("abastecimiento.reportes.existencia-costo-sku");
    }

    /**
     * Display the specified resource.
     */
    public function existenciaCostoCategoria()
    {
        return view("abastecimiento.reportes.existencia-costo-categoria");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function resumenProveedor(string $id)
    {
        //
    }

   
}
