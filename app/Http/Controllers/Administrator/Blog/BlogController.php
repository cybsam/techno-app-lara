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
        $allListBlog = Blog::all();
        return view('dashboard.blog.index',[
            'allListBlog'=>$allListBlog,
        ]);
    }

    public function insertIndex(){
        return view('dashboard.blog.insert');
    }

    public function insert(Request $request){
        
        $request->validate([
            'blogName'=>['required','string'],
            'blogImage'=>['required','mimes:png,jpg,jpeg,ico,gif','max:2048'],
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
            
            Image::make($headerImage)->resize(798,500)->save($uploadLocation);

            $insBlog = new Blog();
            $insBlog->__blog_name = $request->input('blogName');
            $insBlog->__blog_slug = $blogSlug;
            $insBlog->__blog_header_image = $blogHeaderImageNewName;
            $insBlog->__blog_meta_title = $request->input('blogName');
            $insBlog->__blog_meta_keyword = $request->input('blogKeyword');
            $insBlog->__blog_short_description = $request->input('blogShortDesc');
            $insBlog->__blog_description = $request->input('blogDescriptions');
            $insBlog->__blog_added_by = Auth::user()->id.'-'.Auth::user()->name;
            $insBlog->__blog_status = $request->input('checkbox');
            $insBlogSave = $insBlog->save();
            if($insBlogSave){
                return redirect()->back()->with('insertBlogSuccess','Blog Insert Success!');
            }else{
                return redirect()->back()->with('bloginsertFailed','Something went wrong! try again...');
            }
        }

    }

    public function delete(Request $request){
        $deleteId = $request->input('DeleteBlogServiceId');
        $getBlogFromDb = Blog::where('id',$deleteId)->first();
        $imagePath = base_path('public/image/blog/'.$getBlogFromDb->__blog_header_image);
        unlink($imagePath);
        $getBlogFromDb->delete();
        if($getBlogFromDb){
            return redirect()->back()->with('blogDeleteComplete','Blog Delete Complete,');
        }else{
            return redirect()->back()->with('blogDeleteFailed','Something went wrong!');
        }
    }

    public function Update(Request $request, $blog_id, $blog_slug){
        $blog_id = $blog_id;
        $blog_slug = $blog_slug;
        $getDataFromBlog = Blog::where('id',$blog_id)->where('__blog_slug',$blog_slug)->first();

        if($getDataFromBlog){
            return view('dashboard.blog.update',[
                'getDataFromBlog'=>$getDataFromBlog,
            ]);
        }else{
            abort(404);
        }
    }

    public function UpdateSave(Request $request){
        $request->validate([
            'blogMetaKeyword'=>['required'],
            'blogShortDesc'=>['required'],
            'blogDescription'=>['required'],
            'blogMetaTitle'=>['required']
        ]);

        $blogSlugFrom = $request->input('blog_slug');
        $checkFromDatabase = Blog::where('__blog_slug',$blogSlugFrom)->first();
        if ($checkFromDatabase) {
            if ($request->hasFile('blogfeatureImage')) {
                $request->validate([
                    'blogfeatureImage'=>['required','mimes:png,jpg,jpeg,ico,gif','max:2048'],
                ]);
                $headerImageFile = $request->file('blogfeatureImage');
                $randStr = Carbon::now()->format('Y-m-d-H-i-s-u');
                // $blogSlug = Str::slug($request->input('blog_slug'));
                $blogFeatureNewImageName = $checkFromDatabase->__blog_slug.'-'.$randStr.'.'.$headerImageFile->getClientOriginalExtension();
                $blogNewImageFolder = base_path('public/image/blog/'.$blogFeatureNewImageName);

                // unlink from db and image location
                $dbImage = $checkFromDatabase->__blog_header_image;
                $imageFolderLocation = base_path('public/image/blog/'.$dbImage);
                unlink($imageFolderLocation);
                // end unlink image

                Image::make($headerImageFile)->resize(798,500)->save($blogNewImageFolder);

                $checkFromDatabase->__blog_header_image = $blogFeatureNewImageName;
                $checkFromDatabase->__blog_meta_title = $request->input('blogMetaTitle');
                $checkFromDatabase->__blog_meta_keyword = $request->input('blogMetaKeyword');
                $checkFromDatabase->__blog_short_description = $request->input('blogShortDesc');
                $checkFromDatabase->__blog_description = $request->input('blogDescription');
                $checkFromDatabase->__blog_status = $request->input('checkActiveOrNot');
                $saveDb = $checkFromDatabase->save();
                if($saveDb){
                    return redirect()->back()->with('blogUpdateComplete','Blog Update Complete');
                }else{
                    return redirect()->back()->with('blogUpdateFailed','Something went wrong!');
                }
            }else{
                
                $checkFromDatabase->__blog_meta_title = $request->input('blogMetaTitle');
                $checkFromDatabase->__blog_meta_keyword = $request->input('blogMetaKeyword');
                $checkFromDatabase->__blog_short_description = $request->input('blogShortDesc');
                $checkFromDatabase->__blog_description = $request->input('blogDescription');
                $checkFromDatabase->__blog_status = $request->input('checkActiveOrNot');
                $saveDb = $checkFromDatabase->save();
                if($saveDb){
                    return redirect()->back()->with('blogUpdateComplete','Blog Update Complete');
                }else{
                    return redirect()->back()->with('blogUpdateFailed','Something went wrong!');
                }
            }
        }
        
    }
}
