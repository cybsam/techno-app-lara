<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductService;
use App\Models\ProductServiceSub;

class ProductAndServiceController extends Controller
{
    public function ProductFetch(Request $request, $slug){
        $proSlug = $slug;
        $fetchPro = ProductService::where('__proserslug',$proSlug)->first();

        if ($fetchPro) {
            $currentUrl = URL()->current();
            $productName = $fetchPro->__prosername;
            $socialShareUrl = \Share::page(
                $currentUrl,
                $productName,
            )->facebook()
             ->twitter()
             ->linkedin()
             ->whatsapp()
             ->reddit()
             ->telegram();
            return view('FrontEndView.product-service.details',[
                'fetchPro'=>$fetchPro,
                'socialShareUrl'=>$socialShareUrl,
            ]);
        }else{
            abort(404);
        }

        
    }

    public function SubProductFetch(Request $request, $s_slug, $sub_slug){
        $s_slug = $s_slug;
        $sub_slug = $sub_slug;
        $fetchFromDb = ProductServiceSub::where('__prosermaincateslug',$s_slug)->where('__proserslug',$sub_slug)->first();

        if($fetchFromDb){
            return view('FrontEndView.product-service.subproduct',[
                '__fetchFromDb'=>$fetchFromDb,
            ]);
        }else{
            abort(404);
        }

        
    }
}
