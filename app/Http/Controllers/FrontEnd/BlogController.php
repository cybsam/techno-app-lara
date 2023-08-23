<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
    public function index(){
        $fetchAllBlocgFromDb = Blog::where('__blog_status',0)->get();
        return view('FrontEndView.blog.index',[
            'fetchAllBlocgFromDb'=>$fetchAllBlocgFromDb,
        ]);
    }

    public function showSingleBlog(Request $request, $blog_slug){
        $blogDetailesView = Blog::where('__blog_slug',$blog_slug)->where('__blog_status',0)->first();
        if($blogDetailesView){
            //view count
            views($blogDetailesView)->record();
            $postViewCount = views($blogDetailesView)->unique()->count();
            //end view count

            //reletated some blog
            $reletedBlog = Blog::where('__blog_status',0)->inRandomOrder()->take(5)->get();
            // end reletated blog

            // share
            $currentUrl = url()->current();
            $postName = $blogDetailesView->__blog_name;
            $socialShare = \Share::page(
                $currentUrl,
                $postName,
            )->facebook()
             ->twitter()
             ->linkedin()
             ->whatsapp()
             ->reddit()
             ->telegram();
            // end share
            return view('FrontEndView.blog.details',[
                'blogDetailesView'=>$blogDetailesView,
                'reletedBlog'=>$reletedBlog,
                'postViewCount'=>$postViewCount,
                'socialShare'=>$socialShare,
            ]);

        }else{
            abort(404);
        }
    }

    public function FrontSearch(Request $request){
        $inputData = $request->input('searchData');
        
        $searchData = Blog::where('__blog_name','LIKE','%'.$inputData.'%')
                            ->orWhere('__blog_short_description','LIKE','%'.$inputData.'%')
                            ->get();
        
        $commentDataFromDB = DB::table('comments')->where('comment','LIKE','%'.$inputData.'%')->get();

        if($searchData || $commentDataFromDB){
            return view('FrontEndView.search.index',[
                'inputData'=>$inputData,
                'searchData'=>$searchData,
                'commentDataFromDB'=>$commentDataFromDB,
            ]);
        }else{
            abort(404);
        }
    }
}
