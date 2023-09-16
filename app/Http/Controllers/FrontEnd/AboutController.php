<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AboutUsInformation;
use App\Models\AboutOurTeam;
use App\Models\AboutUs;
use App\Models\MissionAndVission;
use App\Models\OurConcern;
use App\Models\Expertise;
use App\Models\StrategicPartner;
use Illuminate\Support\Facades\URL;
// seo tools
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;

class AboutController extends Controller
{
    public function aboutUs(){
        $fetchAboutData = AboutUs::where('id','1')->firstOrFail();
        

        // SEOTools::setTitle('About Us - Techno Apogee');
        // SEOTools::setDescription('This is my page description');
        // SEOTools::opengraph()->setUrl('http://current.url.com');
        // SEOTools::setCanonical('https://codecasts.com.br/lesson');
        // SEOTools::opengraph()->addProperty('type', 'articles');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        // SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');

        $explodeKeyword = explode(',',$fetchAboutData->keyword_title);

        // SEOMeta::setTitle($fetchAboutData->keyword_title);
        SEOMeta::setDescription($fetchAboutData->keyword_description);
        SEOMeta::addMeta('article:published_time', $fetchAboutData->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $fetchAboutData->keyword_title, 'property');
        SEOMeta::addKeyword($explodeKeyword);

        OpenGraph::setDescription($fetchAboutData->keyword_description);
        OpenGraph::setTitle($fetchAboutData->keyword_title);
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'about us');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        OpenGraph::addImage(url('/').'/public/image/about-us/about-us/'.$fetchAboutData->image);
        OpenGraph::addImage(url('/').'/public/image/about-us/about-us/'.$fetchAboutData->image);
        OpenGraph::addImage(['url' => url('/').'/public/image/about-us/about-us/'.$fetchAboutData->image, 'size' => 300]);
        OpenGraph::addImage(url('/').'/public/image/about-us/about-us/'.$fetchAboutData->image, ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($fetchAboutData->keyword_title);
        JsonLd::setDescription($fetchAboutData->keyword_title);
        JsonLd::setType('About Us - Techno Apogee');
        JsonLd::addImage($fetchAboutData->keyword_title);


        return view('FrontEndView.about-us.about-us',[
            'fetchAboutData'=>$fetchAboutData,
        ]);
    }

    // Our mission and vission
    public function missionAndVission(){
        $missionAndVission = MissionAndVission::where('id','1')->firstOrFail();

        $afterExplode = explode(',',$missionAndVission->mission_vission_keyword);
        SEOMeta::setTitle('Our Mission and Vission');
        SEOMeta::setDescription($missionAndVission->mission_description.' & '.$missionAndVission->vission_description);
        SEOMeta::addMeta('article:published_time', $missionAndVission->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $missionAndVission->created_at, 'property');
        SEOMeta::addKeyword($afterExplode);

        OpenGraph::setDescription($missionAndVission->mission_description.' & '.$missionAndVission->vission_description);
        OpenGraph::setTitle('Our Mission and Vission');
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'Mission And Vission');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        OpenGraph::addImage(url('/').'/public/image/about-us/mission-vission/'.$missionAndVission->mission_image);
        OpenGraph::addImage(url('/').'/public/image/about-us/mission-vission/'.$missionAndVission->mission_image);
        OpenGraph::addImage(['url' => url('/').'/public/image/about-us/mission-vission/'.$missionAndVission->mission_image, 'size' => 300]);
        OpenGraph::addImage(url('/').'/public/image/about-us/mission-vission/'.$missionAndVission->mission_image, ['height' => 300, 'width' => 300]);

        JsonLd::setTitle('Our Mission and Vission');
        JsonLd::setDescription($missionAndVission->mission_description.' & '.$missionAndVission->vission_description);
        JsonLd::setType('Article');
        JsonLd::addImage(url('/').'/public/image/about-us/mission-vission/'.$missionAndVission->mission_image);

        return view('FrontEndView.about-us.our-mission-vission',[
            'missionAndVission'=>$missionAndVission,
        ]);
    }

    // Our team
    public function OurTeam(){
        // $AboutUsInformation = AboutUsInformation::where('id',1)->first();
        $management = AboutOurTeam::where('department','management')->get();
        $project_engineering_operation_department = AboutOurTeam::where('department','project-engineering-operation-department')->get();
        $admin_operation = AboutOurTeam::where('department','admin-operation')->get();
        $business_development = AboutOurTeam::where('department','business-development')->get();
        $information_technology_design = AboutOurTeam::where('department','information-technology-design')->get();
        $support_team_electrical_maintenance = AboutOurTeam::where('department','support-team-electrical-maintenance')->get();
        $development = AboutOurTeam::where('department','development')->get();

        SEOTools::setTitle('Our Team');
        SEOTools::setDescription('We manage complex projects offering results that fit our client’s needs including general contracting, design, construction management, business development, feasibility studies and production planning among others. We are committed to continuous training and instruction to ensure a safe working environment for our employees and the clients we serve. We also provide a full range of virtual design and construction services, as well as the latest in smart mapping and computerized modeling with our In house expert and chartered highly qualified expert consultant.');
        SEOTools::opengraph()->setUrl(url::current());
        SEOTools::setCanonical('');
        SEOTools::opengraph()->addProperty('type', 'expertise');
        SEOTools::twitter()->setSite('cybsam');
        SEOTools::jsonLd()->addImage(URL::current());
        
        return view('FrontEndView.about-us.our-team',[
            // 'AboutUsInformation'=>$AboutUsInformation,
            'management'=>$management,
            'project_engineering_operation_department'=>$project_engineering_operation_department,
            'admin_operation'=>$admin_operation,
            'business_development'=>$business_development,
            'information_technology_design'=>$information_technology_design,
            'support_team_electrical_maintenance'=>$support_team_electrical_maintenance,
            'development'=>$development,
        ]);
    }


    // Our Concern
    public function OurConcern(){
        $fetchFromDb = OurConcern::where('is_active','0')->get();
        $description = "Apogee Engineering Limited an Inspiring background Techno Apogee founded in 2006 as a sole trading firm for service provider in the in the field of Substation, BBT, Fire Protection (Hydrants & Sprinkler systems), Fire Detection & Alarm system, Fire Suppression (Gas Flooding system), Lighting Protection System (LPS). Techno Apogee moves forward proudly with diversification of trades and businesses with the mission and vision of becoming the local leader for global business establishing itself as a trusted partner with the customers and principals alike. & Apogee Automation Limited is one of the few automation & security solution companies since 2006 in Bangladesh. We provide hardware & software supply with smart integration and consultation service for different sector.“Our objective is to become the leading independent auto-motion & security solution company and provide qualified technical support to achieve highest customer satisfaction. & APOGEE CONSULTANCY LTD. is a leading creator, developer, and integrator of energy efficiency and infrastructure renewal solutions in support of economic and environmental sustainability. Apogee Consultancy was established in 2014 with a vision to commit to helping our customers find engineering solutions that deliver immediate and long-term, bottom line results";
        SEOTools::setTitle('Our Concern');
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl(url::current());
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('cybsam');
        SEOTools::jsonLd()->addImage(URL::current());

        
        return view('FrontEndView.about-us.our-concern',['fetchFromDb'=>$fetchFromDb]);
    }

    // Our Expertise
    public function ourExpertise(){
        $expertiseFetch = Expertise::where('is_active','0')->get();
        
        SEOTools::setTitle('Our Expertise');
        SEOTools::setDescription('We manage complex projects offering results that fit our client’s needs including general contracting, design, construction management, business development, feasibility studies and production planning among others. We are committed to continuous training and instruction to ensure a safe working environment for our employees and the clients we serve. We also provide a full range of virtual design and construction services, as well as the latest in smart mapping and computerized modeling with our In house expert and chartered highly qualified expert consultant.');
        SEOTools::opengraph()->setUrl(url::current());
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'expertise');
        SEOTools::twitter()->setSite('cybsam');
        SEOTools::jsonLd()->addImage(URL::current());

        return view('FrontEndView.about-us.our-expertise',['expertiseFetch'=>$expertiseFetch]);
    }

    // Our Strategic Partners
    public function strategicPartners(){

        $listStretegicPartnersList = StrategicPartner::where('is_active','0')->paginate(12);

        if($listStretegicPartnersList){
            SEOTools::setTitle('Our Stretegic Partners');
            SEOTools::setDescription('We manage complex projects offering results that fit our client’s needs including general contracting, design, construction management, business development, feasibility studies and production planning among others. We are committed to continuous training and instruction to ensure a safe working environment for our employees and the clients we serve. We also provide a full range of virtual design and construction services, as well as the latest in smart mapping and computerized modeling with our In house expert and chartered highly qualified expert consultant.');
            SEOTools::opengraph()->setUrl(url::current());
            SEOTools::setCanonical(URL::current());
            SEOTools::opengraph()->addProperty('type', 'about-us/strategic-partners');
            SEOTools::twitter()->setSite('cybsam');
            SEOTools::jsonLd()->addImage(URL::current());
            return view('FrontEndView.about-us.our-strategic-partners',[
                'listStretegicPartnersList'=>$listStretegicPartnersList,
            ]);
        }else{
            abort(403);
        }
        
    }
}
