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
            Image::make($headerImage)->save($uploadLocation);

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
