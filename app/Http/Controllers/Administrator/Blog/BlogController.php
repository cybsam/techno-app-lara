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

        $randStr = Carbon::now()->format('Y-m-d-H-i-s-u');
        $blogSlug = Str::slug($request->input('blogName'));
        $blogHeaderImageNewName = $blogSlug.'-'.$randStr.'.'.$headerImage->getClientOriginalExtension();
        $uploadLocation = base_path('public/image/blog/'.$blogHeaderImageNewName);
        $checkBlogSlug = Blog::where('__blog_slug',$blogSlug)->first();
        if($checkBlogSlug){
            return redirect()->back()->with('bloginsertFailed','Already available this blog, try new or change something');
        }else{
            
            Image::make($headerImage)->save($uploadLocation);

            $insBlog = new Blog();
            $insBlog->__blog_name = $request->input('blogName');
            $insBlog->__blog_slug = $blogSlug;
            $insBlog->__blog_header_image = $blogHeaderImageNewName;
            $insBlog->__blog_meta_title = $request->input('blogName');
            $insBlog->__blog_meta_keyword = $request->input('blogKeyword');
            $insBlog->__blog_short_description = $request->input('blogShortDesc');
            $insBlog->__blog_description = $request->input('blogDescriptions');
            $insBlog->__blog_added_by = Auth::user()->id.'-'.Auth::user()->name;
            $insBlog->__blog_status = 1;
            $insBlogSave = $insBlog->save();
            if($insBlogSave){
                return redirect()->back()->with('insertBlogSuccess','Blog Insert Success!');
            }else{
                return redirect()->back()->with('bloginsertFailed','Something went wrong! try again...');
            }
        }

    }
}
