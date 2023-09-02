<?php

namespace App\Http\Controllers\Administrator\ProductService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;
use App\Models\ProductService;
use App\Models\ProductServiceSub;

class ProSerSubController extends Controller
{
    public function index(Request $request, $menu_slug){
        $menu_slug = $menu_slug;
        $ProductServiceSubMenu = ProductServiceSub::where('__prosermaincateslug',$menu_slug)->get();
        return view('dashboard.productService.subProductService.index',[
            'ProductServiceSubMenu'=>$ProductServiceSubMenu,
            'menu_slug'=>$menu_slug,
        ]);
    }

    public function InsertSh(Request $request, $menu_slug){
        $menu_slug = $menu_slug;
        return view('dashboard.productService.subProductService.insert',[
            'menu_slug'=>$menu_slug,
        ]);
    }

    public function InsertSave(Request $request){
        $input = $request->all();
        $request->validate([
            '__prosername'=>['required','max:255'],
            '__prosermaincateslug'=>['required'],
            '__proserheadimage'=>['required','mimes:png,jpg,jpeg,ico,gif','max:2048'],
            '__proserkeyword'=>['required'],
            '__proserdescription'=>['required'],
        ]);

        $randstr = Carbon::now()->format('Y-m-d-H-i-s-u');
            
        $productSlug = Str::slug($input['__prosername']);
        $checkSlug = ProductService::where('__proserslug',$input['__prosermaincateslug'])->first();
        if($checkSlug == true){
            $headerImage = $request->file('__proserheadimage');
            $ImageNewName = $productSlug.'-'.$input['__prosermaincateslug'].'-'.$randstr.'.'.$headerImage->getClientOriginalExtension();
            $uploadLocation = base_path('public/image/productservice/subproduct/'.$ImageNewName);
            Image::make($headerImage)->resize(1000,750)->save($uploadLocation);

            $insDbProSub = new ProductServiceSub();
            $insDbProSub->__prosername = $input['__prosername'];
            $insDbProSub->__proserslug = $productSlug;
            $insDbProSub->__prosermaincateslug = $input['__prosermaincateslug'];
            $insDbProSub->__prosermaincateid = $checkSlug->id;
            $insDbProSub->__proserheadimage = $ImageNewName;
            $insDbProSub->__proserkeyword = $input['__proserkeyword'];
            $insDbProSub->__proserdescription = $input['__proserdescription'];
            $insDbProSub->added_by = Auth::user()->id.'-'.Auth::user()->name;
            $saveDb = $insDbProSub->save();
            if($saveDb){
                return redirect()->back()->with('prosubInsCom','Product insert Complete');
            }else{
                return redirect()->back()->with('prosubInsErr','Something went wrong, try again!');
            }

        }else{
            return redirect()->back()->with('prosubInsErr','Over smart!');
        }
    }

    public function UpdateShow(Request $request, $subProUpdate_slug){
        $subProUpdate_slug = $subProUpdate_slug;
        $fetchProductFromDB = ProductServiceSub::where('__proserslug',$subProUpdate_slug)->first();
        if($fetchProductFromDB){
            return view('dashboard.productService.subProductService.update',[
                'fetchProductFromDB'=>$fetchProductFromDB,
            ]);
        }else{
            abort(403);
        }
    }

    public function Update(Request $request){
        $request->validate([
            '__proserkeyword'=>['required'],
            '__proserdescription'=>['required'],
            
        ]);
        $productId = $request->input('product_id');
        $productSlug = $request->input('product_slug');
        $updateFetchProduct = ProductServiceSub::where('id',$productId)->where('__proserslug',$productSlug)->first();
        if($request->hasFile('__proserheadimage')){
            if($updateFetchProduct){
                $request->validate([
                    '__proserheadimage'=>['mimes:png,jpg,ico,gif,jpeg','max:2048']
                ]);
                $imageFromForm = $request->file('__proserheadimage');
                $randStr = Carbon::now()->format('Y-m-d-H-i-s-u');
                $imageNewName = $productSlug.'-'.$randStr.'.'.$imageFromForm->getClientOriginalExtension();
                $basePath = base_path('public/image/productservice/subproduct/'.$imageNewName);

                $dbHeaderImage = $updateFetchProduct->__proserheadimage;
                $dbBasePath = base_path('public/image/productservice/subproduct/'.$dbHeaderImage);
                unlink($dbBasePath);

                Image::make($imageFromForm)->resize(918,450)->save($basePath);

                $updateFetchProduct->__proserheadimage = $imageNewName;
                $updateFetchProduct->__proserkeyword = $request->input('__proserkeyword');
                $updateFetchProduct->__proserdescription = $request->input('__proserdescription');
                $updateFetchProduct->added_by = Auth::user()->id.'-'.Auth::user()->name;
                $saveUpdateProduct = $updateFetchProduct->save();
                if($saveUpdateProduct){
                    return redirect()->back()->with('productUpdateCompleteSub','Product and Service Update Complete, check it now!');
                }else{
                    return redirect()->back()->with('productUpdateFailedSub','Something went wrong!');
                }
            }else {
                abort(403);
            }
        }else{
            if($updateFetchProduct){
                $updateFetchProduct->__proserkeyword = $request->input('__proserkeyword');
                $updateFetchProduct->__proserdescription = $request->input('__proserdescription');
                $updateFetchProduct->added_by = Auth::user()->id.'-'.Auth::user()->name;
                $saveUpdateProduct = $updateFetchProduct->save();
                if($saveUpdateProduct){
                    return redirect()->back()->with('productUpdateCompleteSub','Product and Service Update Complete, check it now!');
                }else{
                    return redirect()->back()->with('productUpdateFailedSub','Something went wrong!');
                }
            }else{
                abort(403);
            }
        }
    }

    public function Delete(Request $request){
        $ProductId = $request->input('subProductServiceDeltid');

        $deleteProductService = ProductServiceSub::where('id',$ProductId)->delete();

        if($deleteProductService){
            return redirect()->back()->with('ProDelSuc','Product Delete Successfully');
        }else{
            return redirect()->back()->with('prodelerr','somthing went wrong!');
        }
    }
}
