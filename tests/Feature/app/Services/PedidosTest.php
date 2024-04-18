<?php

namespace Tests\Feature\app\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class PedidosTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $pedidos =  DB::connection('sqlite')->table('pedidos')      
        ->join('proveedores', 'pedidos.provId', '=', 'proveedores.provId') 
        ->join('sku', 'pedidos.sku', '=', 'sku.sku')   
        ->select('proveedores.nombre','sku.marca','sku.descripcion','pedidos.*')      
        ->get();   
  
  
    
       $response = $this->get('/');
       $response->assertStatus(200);
       
       

    }
}
