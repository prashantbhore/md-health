<?php

namespace App\Http\Controllers\admin\ads_and_promo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdsPromo;
use App\Traits\MediaTrait;
use Crypt;

class AdsPromoController extends Controller
{
    use MediaTrait;

    public function index(Request $request) {
        $filter = $request->input('filter');
    
        $adsQuery = AdsPromo::where('status', '!=', 'delete');
    
        if (!empty($filter) && $filter !== 'all') {
            $adsQuery->where('promo_status', $filter);
        }
    
        $ads = $adsQuery->get();
    
        return view('admin.ads.ads-promo', compact('ads', 'filter'));
    }



    public function store(Request $request){
        
        $input = [
            'ads_for_page' => $request->page_name,
            'date' => $request->date,
            'ads_url' => $request->url,
            'promo_status'=>$request->promo_status,
        ];


        if ($request->has('ads_image')){
            $input['ads_image_path'] = $this->verifyAndUpload($request, 'ads_image','\ads_promo');
            $original_name = $request->file('ads_image')->getClientOriginalName();
            $input['ads_image_name'] = $original_name;
        }

      
       if(!empty($request->id)){ 
         $ads=AdsPromo::where('id',$request->id)->update($input);
         if($ads){
            return redirect('admin/ads-promo')->with('success','Ads Updated');
          }else{
            return redirect('admin/ads-promo')->with('error','Ads Not Updated');
          }
       }else{
        $ads=AdsPromo::create($input);
        if($ads){
            return redirect('admin/ads-promo')->with('success','Ads Stored');
          }else{
            return redirect('admin/ads-promo')->with('error','Ads Not Stored');
          }
       }
      
       
        
       
    }





    public function edit(Request $request){
        
        $id = !empty($request->id) ? Crypt::decrypt($request->id) : null;
    
        $edit_data = '';
        if (!empty($id)) {
            $edit_data = AdsPromo::where('id', $id)->first();
        }
    
        $ads = AdsPromo::where('status', '!=', 'delete')->get();
        
        // Define $filter to prevent "Undefined variable" error
        $filter = $request->input('filter', 'all');
    
        return view('admin.ads.ads-promo', compact('ads', 'edit_data', 'filter'));
    }
    

    
    public function delete(Request $request){
        $id=!empty($request->id)?Crypt::decrypt($request->id):null;

        if(!empty($id)){
         $data=AdsPromo::where('id',$id)->update(['status'=>'delete']);
         if($data){
          return redirect('admin/ads-promo')->with('success','Ads Deleted');
         }else{
            return redirect('admin/ads-promo')->with('error','Ads Not Deleted');
         }
        }else{
            return redirect('admin/ads-promo')->with('error','Ads Not Deleted');
        }
}



}
