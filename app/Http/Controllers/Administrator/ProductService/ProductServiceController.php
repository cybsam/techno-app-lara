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
        return view('dashboard.productService.index');
    }

    public function insertCheck(){
        return view('dashboard.productService.insert');
    }

    public function insert(Request $request){
        dd($request->all());
    }

    public function archive(){
        return view('dashboard.productService.archive');
    }

    public function delete(){
        return view('dashboard.productService.trash');
    }
}
