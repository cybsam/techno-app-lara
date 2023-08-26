<?php

namespace App\Http\Controllers\Administrator\ProductService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;
use App\Models\ProductService;

class ProductServiceController extends Controller
{
    public function index(){
        $productServiceStatus = ProductService::all()->reverse();
        return view('dashboard.productService.index',[
            'productServiceStatus'=>$productServiceStatus,
        ]);
    }

    public function insertCheck(){
        return view('dashboard.productService.insert');
    }

    public function insert(Request $request){
        
        $request->validate([
            '__prosername'=>['required','max:255'],
            '__prosermenuselect'=>['required'],
            '__proserheadimage'=>['required','mimes:png,jpg,jpeg,ico,gif','max:2048'],
            '__proserkeyword'=>['required'],
            '__proserdescription'=>['required'],
        ]);

        $input = $request->all();
        $afterMenuVal = explode('.',$input['__prosermenuselect']);
        if ($afterMenuVal[0] == 0) {
            return redirect()->back()->with('ProDuctError','Menu not selected');
        }else {
            $randstr = Carbon::now()->format('Y-m-d-H-i-s-u');
            
            $productSlug = Str::slug($input['__prosername']);
            $checkSlug = ProductService::where('__proserslug',$productSlug)->first();
            if($checkSlug == true){
                return redirect()->back()->with('ProDuctError','Product or Service already available in our system, please change something!');
            }else{
                $headerImage = $request->file('__proserheadimage');
                $headerImageNewName = $productSlug.'-'.$afterMenuVal[1].'-'.$randstr.'.'.$headerImage->getClientOriginalExtension();
                $uploadLocation = base_path('public/image/productservice/'.$headerImageNewName);
                Image::make($headerImage)->save($uploadLocation);
                $insPro = new ProductService();
                $insPro->__prosername = $input['__prosername'];
                $insPro->__proserslug = $productSlug;
                $insPro->__prosermenuselect = $afterMenuVal[1];
                $insPro->__proserheadimage = $headerImageNewName;
                $insPro->__proserkeyword = $input['__proserkeyword'];
                $insPro->__proserdescription = $input['__proserdescription'];
                $insPro->added_by = Auth::user()->id.'-'.Auth::user()->name;
                $saveProd = $insPro->save();
                if($saveProd){
                    return redirect()->back()->with('proUpdSuc','Product or Service insert successfully.');
                }else{
                    return redirect()->back()->with('ProDuctError','Something went wrong!');
                }
            }
        }
    }

    public function archive(Request $request){
        $proId = $request->input('serviceModalDeleteid');
        $archivePro = ProductService::where('id',$proId)->update([
            'is_active'=>0
        ]);
        if($archivePro){
            return redirect()->back()->with('ProSerSucc','Archive Successfully, check archive page');
        }else{
            return redirect()->back()->with('ProSerSucc','Somthing went wrong!');
        }
        
    }

    public function archiveList(Request $request){
        return view('dashboard.productService.archive');
    }

    public function delete(Request $request){
        return "window.alert('be carefull')";
    }

    public function UpdateShowPro(Request $request, $product_id, $product_slug){
        $productId = $product_id;
        $productSlug = $product_slug;

        $fetchProductFromDB = ProductService::where('id',$productId)->where('__proserslug',$productSlug)->first();

        if($fetchProductFromDB){
            return view('dashboard.productService.update',[
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
        $updateFetchProduct = ProductService::where('id',$productId)->where('__proserslug',$productSlug)->first();
        if($request->hasFile('__proserheadimage')){
            if($updateFetchProduct){
                $request->validate([
                    '__proserheadimage'=>['mimes:png,jpg,ico,gif,jpeg','max:2048']
                ]);
                $imageFromForm = $request->file('__proserheadimage');
                $randStr = Carbon::now()->format('Y-m-d-H-i-s-u');
                $imageNewName = $productSlug.'-'.$randStr.'.'.$imageFromForm->getClientOriginalExtension();
                $basePath = base_path('public/image/productservice/'.$imageNewName);

                $dbHeaderImage = $updateFetchProduct->__proserheadimage;
                $dbBasePath = base_path('public/image/productservice/'.$dbHeaderImage);
                unlink($dbBasePath);

                Image::make($imageFromForm)->resize(918,450)->save($basePath);

                $updateFetchProduct->__proserheadimage = $imageNewName;
                $updateFetchProduct->__proserkeyword = $request->input('__proserkeyword');
                $updateFetchProduct->__proserdescription = $request->input('__proserdescription');
                $updateFetchProduct->added_by = Auth::user()->id.'-'.Auth::user()->name;
                $saveUpdateProduct = $updateFetchProduct->save();
                if($saveUpdateProduct){
                    return redirect()->back()->with('productUpdateComplete','Product and Service Update Complete, check it now!');
                }else{
                    return redirect()->back()->with('productUpdateFailed','Something went wrong!');
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
                    return redirect()->back()->with('productUpdateComplete','Product and Service Update Complete, check it now!');
                }else{
                    return redirect()->back()->with('productUpdateFailed','Something went wrong!');
                }
            }else{
                abort(403);
            }
        }
    }
}
