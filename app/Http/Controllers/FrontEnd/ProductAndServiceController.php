<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductService;

class ProductAndServiceController extends Controller
{
    public function ProductFetch(Request $request, $slug){
        $proSlug = $slug;
        $fetchPro = ProductService::where('__proserslug',$proSlug)->first();

        return view('FrontEndView.product-service.details',[
            'fetchPro'=>$fetchPro,
        ]);
    }
}
