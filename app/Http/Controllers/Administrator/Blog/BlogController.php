<?php

namespace App\Http\Controllers\Administrator\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        return view('dashboard.blog.index');
    }

    public function insertIndex(){
        return view('dashboard.blog.insert');
    }

    public function insert(Request $request){
        
        $request->validate([
            'blogName'=>['required','string'],
            'blogImage'=>['required','mimes:png,jpg,jpeg,ico,gif'],
            'blogKeyword'=>['required','string'],
            'blogShortDesc'=>['required','string'],
            'blogDescriptions'=>['required']
        ]);

        $headerImage = $request->file('blogImage');

    }
}
