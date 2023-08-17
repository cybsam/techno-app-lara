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
        // dd($request->all());
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

    public function archive(){
        return view('dashboard.productService.archive');
    }

    public function delete(Request $request){
        $proId = $request->input('serviceModalDeleteid');
        $archivePro = ProductService::where('id',$proId)->update([
            'is_active'=>2
        ]);
        if($archivePro){
            return redirect()->back()->with('ProSerSucc','Archive Successfully, check archive page');
        }else{
            return redirect()->back()->with('ProSerSucc','Somthing went wrong!');
        }
        // return view('dashboard.productService.trash');
    }
}
