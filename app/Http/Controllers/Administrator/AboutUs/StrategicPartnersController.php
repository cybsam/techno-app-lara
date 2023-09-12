<?php

namespace App\Http\Controllers\Administrator\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use App\Models\User;
use Illuminate\Support\Str;

use App\Models\StrategicPartner;
use Symfony\Component\Console\Input\Input;

class StrategicPartnersController extends Controller
{
    public function IndexPartners(){
        $listPartners = StrategicPartner::all();
        return view('dashboard.about-us.strategic-partners.index',[
            'listPartners'=>$listPartners,
        ]);
    }

    public function InsertPartners(Request $request){
        //
    }

    public function IndexPartnersSave(Request $request){
        $request->validate([
            'strategic_partners_name'=>['required'],
            'strategic_partners_about'=>['required'],
            'strategic_partners_logo'=>['required','mimes:png,jpg,ico,jpeg,gif,bmp']
        ]);

        $checkDatabase = StrategicPartner::where('strategic_partners_name',$request->input('strategic_partners_name'))->first();

        if($request->hasFile('strategic_partners_logo')){
            if($checkDatabase == true){
                return redirect()->back()->with('strategicPartnersError','this Name already available in our system, you can check.');
            }else{
                $imageFr = $request->file('strategic_partners_logo');
                $randStr = Carbon::now()->format('Y-m-d-h-i-s-u');
                $imageNewname = Str::slug($request->input('strategic_partners_name')).'-'.$randStr.'.'.$imageFr->getClientOriginalExtension();
                $imageLocation = base_path('public/image/about-us/strategic-partners/'.$imageNewname);

                Image::make($imageFr)->save($imageLocation);

                $insDBStra = new StrategicPartner();
                $insDBStra->strategic_partners_name = $request->input('strategic_partners_name');
                $insDBStra->strategic_partners_logo = $imageNewname;
                $insDBStra->strategic_partners_about = $request->input('strategic_partners_about');
                $insDBStra->strategic_partners_addedby = Auth::user()->name;
                $insDBStraSave = $insDBStra->save();

                if($insDBStraSave){
                    return redirect()->back()->with('strategicPartnersDone','Insert Complete!');
                }else{
                    return redirect()->back()->with('strategicPartnersError','Something went wrong!');
                }
            }
        }else{
            return redirect()->back()->with('strategicPartnersError','Image Not found!');
        }
    }
    

    public function IndexPartnersUpdateSh(Request $request, $strategic_id){
        $strategic_id = $strategic_id;
        $FromDatabase = StrategicPartner::where('id',$strategic_id)->first();
        if($FromDatabase){
            return view('dashboard.about-us.strategic-partners.update',[
                'FromDatabase'=>$FromDatabase,
            ]);
        }else{
            abort(403);
        }
        
    }

    public function IndexPartnersUpdateSave(Request $request){
        //
    }

    public function IndexPartnersDelete(Request $request){
        //
    }
}
