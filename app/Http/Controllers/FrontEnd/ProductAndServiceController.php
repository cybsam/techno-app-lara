<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductService;
use App\Models\ProductServiceSub;

use Illuminate\Support\Facades\URL;
// seo tools
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;

class ProductAndServiceController extends Controller
{
    public function ProductFetch(Request $request, $slug){
        $proSlug = $slug;
        $fetchPro = ProductService::where('__proserslug',$proSlug)->first();

        if ($fetchPro) {

            // for seo tools
            $explodeKeyword = explode(',',$fetchPro->__proserkeyword);
            SEOMeta::setTitle($fetchPro->__prosername);
            SEOMeta::setDescription($fetchPro->__proserkeyword);
            SEOMeta::addMeta('article:published_time', $fetchPro->created_at->toW3CString(), 'property');
            SEOMeta::addMeta('article:section', $fetchPro->__prosername, 'property');
            SEOMeta::addKeyword($explodeKeyword);

            OpenGraph::setDescription($fetchPro->__proserkeyword);
            OpenGraph::setTitle($fetchPro->__prosername);
            OpenGraph::setUrl(URL::current());
            OpenGraph::addProperty('type', 'Product And Service');
            OpenGraph::addProperty('locale', 'BD');
            OpenGraph::addProperty('locale:alternate', ['BD', 'en-us']);

            OpenGraph::addImage(url('/').'/public/image/productservice/'.$fetchPro->__proserheadimage);
            OpenGraph::addImage(url('/').'/public/image/productservice/'.$fetchPro->__proserheadimage);
            OpenGraph::addImage(['url' => url('/').'/public/image/productservice/'.$fetchPro->__proserheadimage, 'size' => 300]);
            OpenGraph::addImage(url('/').'/public/image/productservice/'.$fetchPro->__proserheadimage, ['height' => 750, 'width' => 1000]);

            JsonLd::setTitle($fetchPro->__prosername);
            JsonLd::setDescription($fetchPro->__proserkeyword);
            JsonLd::setType('Product And Service - Techno Apogee');
            JsonLd::addImage($fetchPro->keyword_title);

            // end seo tools

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

            // for seo tools
            $explodeKeyword = explode(',',$fetchFromDb->__proserkeyword);
            SEOMeta::setTitle($fetchFromDb->__prosername);
            SEOMeta::setDescription($fetchFromDb->__proserkeyword);
            SEOMeta::addMeta('article:published_time', $fetchFromDb->created_at->toW3CString(), 'property');
            SEOMeta::addMeta('article:section', $fetchFromDb->__prosername, 'property');
            SEOMeta::addKeyword($explodeKeyword);

            OpenGraph::setDescription($fetchFromDb->__proserkeyword);
            OpenGraph::setTitle($fetchFromDb->__prosername);
            OpenGraph::setUrl(URL::current());
            OpenGraph::addProperty('type', 'Product And Service');
            OpenGraph::addProperty('locale', 'BD');
            OpenGraph::addProperty('locale:alternate', ['BD', 'en-us']);

            OpenGraph::addImage(url('/').'/public/image/productservice/subproduct/'.$fetchFromDb->__proserheadimage);
            OpenGraph::addImage(url('/').'/public/image/productservice/subproduct/'.$fetchFromDb->__proserheadimage);
            OpenGraph::addImage(['url' => url('/').'/public/image/productservice/subproduct/'.$fetchFromDb->__proserheadimage, 'size' => 300]);
            OpenGraph::addImage(url('/').'/public/image/productservice/subproduct/'.$fetchFromDb->__proserheadimage, ['height' => 750, 'width' => 1000]);

            JsonLd::setTitle($fetchFromDb->__prosername);
            JsonLd::setDescription($fetchFromDb->__proserkeyword);
            JsonLd::setType('Product And Service - Techno Apogee');
            JsonLd::addImage($fetchFromDb->keyword_title);

            // end seo tools

            $currentUrlSub = URL()->current();
            $subProductname = $fetchFromDb->__prosername;
            $subProductSocialShare = \Share::page(
                $currentUrlSub,
                $subProductname,
            )->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->reddit()
            ->telegram();
            return view('FrontEndView.product-service.subproduct',[
                '__fetchFromDb'=>$fetchFromDb,
                'subProductSocialShare'=>$subProductSocialShare,
            ]);
        }else{
            abort(404);
        }

        
    }
}
