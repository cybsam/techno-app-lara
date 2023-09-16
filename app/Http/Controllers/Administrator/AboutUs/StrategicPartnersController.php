<?php

namespace App\Http\Controllers\Administrator\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use App\Models\User;
use App\Models\StrategicPartnersCategory;
use Illuminate\Support\Str;

use App\Models\StrategicPartner;
use Symfony\Component\Console\Input\Input;

class StrategicPartnersController extends Controller
{
    public function IndexPartners(){
        $listPartners = StrategicPartner::all();
        $partnesCategory = StrategicPartnersCategory::all();
        return view('dashboard.about-us.strategic-partners.index',[
            'listPartners'=>$listPartners,
            'partnesCategory'=>$partnesCategory,
        ]);
    }

    public function InsertPartners(Request $request){
        //
    }

    public function IndexPartnersSave(Request $request){
        $request->validate([
            'strategic_partners_name'=>['required'],
            'strategic_partners_about'=>['required'],
            'strategic_partners_logo'=>['required','mimes:png,jpg,ico,jpeg,gif,bmp,svg'],
            'strategic_partner_categroy'=>['required'],
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

                // category

                $categorySlug = Str::slug($request->input('strategic_partner_categroy'));

                Image::make($imageFr)->resize(285,190)->save($imageLocation);

                $insDBStra = new StrategicPartner();
                $insDBStra->strategic_partners_name = $request->input('strategic_partners_name');
                $insDBStra->strategic_partners_logo = $imageNewname;
                $insDBStra->strategic_partner_categroy = $request->input('strategic_partner_categroy');
                $insDBStra->strategic_partner_categroy_slug = $categorySlug;
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
        $category = StrategicPartnersCategory::all();
        if($FromDatabase && $category){
            return view('dashboard.about-us.strategic-partners.update',[
                'FromDatabase'=>$FromDatabase,
                'category'=>$category,
            ]);
        }else{
            abort(403);
        }
        
    }

    public function IndexPartnersUpdateSave(Request $request){
        $request->validate([
            'strategic_partners_name'=>['required'],
            'Strid'=>['required'],
            // 'strategic_partners_logo'=>['required','mimes:png, jpeg, ico'],
            'strategic_partners_about'=>['required'],
            'strategic_partner_categroy'=>['required'],
        ]);
        // check data found or not
        $checkDataStra = StrategicPartner::where('id',$request->input('Strid'))->first();

        if($request->hasFile('strategic_partners_logo')){
            $request->validate([
                'strategic_partners_logo'=>['required','mimes:png,jpg,ico,jpeg,gif,bmp,svg'],
            ]);
            if($checkDataStra){
                $oldImagepath = base_path('public/image/about-us/strategic-partners/'.$checkDataStra->strategic_partners_logo);
                $randStr = Carbon::now()->format('Y-m-d-h-i-s-u');
                $newImageNewName = Str::slug($request->input('strategic_partners_name')).'-'.$randStr.'.'.$request->file('strategic_partners_logo')->getClientOriginalExtension();
                $ImageNewLocation = base_path('public/image/about-us/strategic-partners/'.$newImageNewName);
                $slugCate = Str::slug($request->input('strategic_partner_categroy'));
                unlink($oldImagepath);
                Image::make($request->file('strategic_partners_logo'))->resize(285,190)->save($ImageNewLocation);

                $updDB = $checkDataStra->update([
                    'strategic_partners_name'=>$request->input('strategic_partners_name'),
                    'strategic_partners_logo'=>$newImageNewName,
                    'strategic_partner_categroy'=>$request->input('strategic_partner_categroy'),
                    'strategic_partner_categroy_slug'=>$slugCate,
                    'strategic_partners_about'=>$request->input('strategic_partners_about'),
                    'strategic_partners_addedby'=>Auth::user()->name,
                ]);

                if($updDB){
                    return redirect()->back()->with('StrategicPartnersUpdateDone','Strategic partners update done!');
                }else{
                    return redirect()->back()->with('strategicPartnersUpdateFailed','Something went wrong!');
                }

            }else{
                return redirect()->back()->with('strategicPartnersUpdateFailed','Data Not found in database!');
            }
        }else{
            
            if($checkDataStra){
                $slugCate = Str::slug($request->input('strategic_partner_categroy'));
                $updDB = $checkDataStra->update([
                    'strategic_partners_name'=>$request->input('strategic_partners_name'),
                    'strategic_partner_categroy'=>$request->input('strategic_partner_categroy'),
                    'strategic_partner_categroy_slug'=>$slugCate,
                    'strategic_partners_about'=>$request->input('strategic_partners_about'),
                    'strategic_partners_addedby'=>Auth::user()->name,

                ]);

                if($updDB){
                    return redirect()->back()->with('StrategicPartnersUpdateDone','Strategic partners update done!');
                }else{
                    return redirect()->back()->with('strategicPartnersUpdateFailed','Something went wrong!');
                }

            }else{
                return redirect()->back()->with('strategicPartnersUpdateFailed','Data Not found in database!');
            }
        }
    }

    public function IndexPartnersDelete(Request $request){
        $id = $request->input('strategicModalDeleteId');

        $deleteRequestModal = StrategicPartner::where('id',$id)->first();

        if($deleteRequestModal){
            $imageLocation = base_path('public/image/about-us/strategic-partners/'.$deleteRequestModal->strategic_partners_logo);
            unlink($imageLocation);
            $DeleteProjectId = $deleteRequestModal->delete();

            if($DeleteProjectId){
                return redirect()->back()->with('strategicPartnersError','Delete Successfully');
            }else{
                return redirect()->back()->with('strategicPartnersDone','Something went wrong!');
            }
        }else{
            abort(403);
        }
    }

    // category
    public function partnersCategory(Request $request){
        
        $request->validate([
            'strategic_partner_categroy'=>['required','min:3','max:100'],
        ]);
        $cateSlug = Str::slug($request->input('strategic_partner_categroy'));
        $insCategory = StrategicPartnersCategory::create([
            'strategic_partner_categroy'=>$request->input('strategic_partner_categroy'),
            'strategic_partner_categroy_slug'=>$cateSlug,
        ]);
        if($insCategory){
            return redirect()->back()->with('strategicPartnersDone','Category Insert Successfully!');
        }else{
            return redirect()->back()->with('strategicPartnersError','Something went wrong!');
        }
    }
}
