<?php
namespace App\Http\Controllers\super_admin\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\CategoryModel;
use App\Model\Offer\OfferModel;

class OfferController extends Controller
{
    public function index(){      
        $fetchAllCatagory = DB::table('pos_category_list_item')->get();
        $uniqueCollection = $fetchAllCatagory->unique('category_name');      
        $uniqueCollection->all();      
      return view('super_admin.pages.offer.add_offer',compact('uniqueCollection'));
    }
  
  
  	public function save_offer(Request $request){
      	$base_url = env("APP_URL");
      	
      	$pos_offer_activity_key	= uniqid();
    	$pos_offer_name = $request->input('offer_name');
      	$pos_offer_type = $request->input('offer_type');
      	$pos_offer_catagroy_id = $request->input('offer_catagory');
      	$pos_offer_start_date = $request->input('offer_start_time');
      	$pos_offer_end_date = $request->input('offer_end_time');
      	$pos_offer_amount = $request->input('offer_amount');
      	$pos_offer_image = $request->file('offer_image');
      	$pos_offer_terms_conditions = $request->input('offer_terms_conditions');
      	$pos_offer_status = $request->input('offer_status');
     	//echo $pos_offer_type;die;
      
      	if(empty($pos_offer_name) || empty($pos_offer_type) || empty($pos_offer_catagroy_id) || empty($pos_offer_start_date) || empty($pos_offer_end_date) || empty($pos_offer_amount) ||empty($pos_offer_terms_conditions)){
        	 return redirect(route('superadmin::add_offer_page'))->with('required_field', "Required Field Canno't Be empty!!!");
        }
        else{
        	if(empty($pos_offer_image)){
            	$offer_save = new OfferModel();
                $offer_save->pos_offer_activity_key = $pos_offer_activity_key;
              	$offer_save->pos_offer_name = $pos_offer_name;
                $offer_save->pos_offer_type = $pos_offer_type;
                $offer_save->pos_offer_catagroy_id = $pos_offer_catagroy_id;
                $offer_save->pos_offer_start_date = $pos_offer_start_date;
                $offer_save->pos_offer_end_date = $pos_offer_end_date;
                $offer_save->pos_offer_amount = $pos_offer_amount;
                $offer_save->pos_offer_terms_conditions = $pos_offer_terms_conditions;
                $offer_save->pos_offer_status = $pos_offer_status;
                $offer_save->pos_offer_image = $base_url. 'storage/app/default_image/NA.png';
              	
              	$save_offer = $offer_save->save();
            }
          	else{
            	$offer_save = new OfferModel();
                $offer_save->pos_offer_activity_key = $pos_offer_activity_key;
              	$offer_save->pos_offer_name = $pos_offer_name;
                $offer_save->pos_offer_type = $pos_offer_type;
                $offer_save->pos_offer_catagroy_id = $pos_offer_catagroy_id;
                $offer_save->pos_offer_start_date = $pos_offer_start_date;
                $offer_save->pos_offer_end_date = $pos_offer_end_date;
                $offer_save->pos_offer_amount = $pos_offer_amount;
                $offer_save->pos_offer_terms_conditions = $pos_offer_terms_conditions;
                $offer_save->pos_offer_status = $pos_offer_status;
                $offer_save->pos_offer_image = $base_url.'storage/app/'. $pos_offer_image->store('offer_image');
              
              	$save_offer = $offer_save->save();
            }
          if($save_offer){
          	return redirect(route('superadmin::display_offer'))->with('offer_added', 'Offer Successfully Added');
          }
        }
    }
  
  
  	public function display(){
      	$fetchAllOffer = DB::table('pos_offer_list')->get();
      	//$fetch_catagory = DB::table('pos_category_list_item')->where('category_activity_key',$fetchAllOffer->pos_offer_catagroy_id)->get();
    	return view('super_admin.pages.offer.display_offer',compact('fetchAllOffer'));
    }
  
  	public function update_offer_status($pos_offer_activity_key)
   {
      $get_res_status = DB::table('pos_offer_list')->where('pos_offer_activity_key', $pos_offer_activity_key)->first();
      if ($get_res_status->pos_offer_status == 1) {
         $update_status = DB::table('pos_offer_list')->where('pos_offer_activity_key', $pos_offer_activity_key)->update([
            'pos_offer_status' => 0
         ]);

         return redirect(route('superadmin::display_offer'))->with('status_inactive_msg', 'Status Deactivated');
      } else {
         $update_status = DB::table('pos_offer_list')->where('pos_offer_activity_key', $pos_offer_activity_key)->update([
            'pos_offer_status' => 1
         ]);

         return redirect(route('superadmin::display_offer'))->with('status_active_msg', 'Status Activated');
      }
   }
  
  
  	 public function update_offer_data(Request $request, $pos_offer_activity_key)
   {
      $fetch_offer = DB::table('pos_offer_list')->where('pos_offer_activity_key', $pos_offer_activity_key)->first();
      if (!empty($fetch_offer)) {
        $fetchAllCatagory = DB::table('pos_category_list_item')->get();
        $uniqueCollection = $fetchAllCatagory->unique('category_name');      
        $uniqueCollection->all();
         return view('super_admin.pages.offer.add_offer', compact('fetch_offer','uniqueCollection'));
      } else {
         return redirect(route('superadmin::error_404_found'));
      }
   }
  
  	public function delete_offer($pos_offer_activity_key)
   {
      $offer_delete = DB::table('pos_offer_list')->where('pos_offer_activity_key', $pos_offer_activity_key)->delete();
      if ($offer_delete) {
         return redirect(route('superadmin::display_offer'))->with('delete_msg', 'Deleted Successsfully');
      }
   }
  
  
  public function offer_edit_save(Request $request, $pos_offer_activity_key)
   {
    	//echo $pos_offer_activity_key;die;
        $base_url = env("APP_URL");
        $pos_offer_name = $request->input('offer_name');
        $pos_offer_type = $request->input('offer_type');
        $pos_offer_catagroy_id = $request->input('offer_catagory');     
        $pos_offer_start_date = $request->input('offer_start_time');
        $pos_offer_end_date = $request->input('offer_end_time');    
        $pos_offer_amount = $request->input('offer_amount');
        $pos_offer_image = $request->file('offer_image');    
        $pos_offer_terms_conditions = $request->input('offer_terms_conditions');
        $pos_offer_status = $request->input('offer_status');

      if (empty($pos_offer_image)) {
         $offer_update = DB::table('pos_offer_list')->where('pos_offer_activity_key', $pos_offer_activity_key)->update([
            'pos_offer_name' => $pos_offer_name,
            'pos_offer_type' => $pos_offer_type,
            'pos_offer_catagroy_id' => $pos_offer_catagroy_id,
            'pos_offer_start_date' => $pos_offer_start_date,
            'pos_offer_end_date' => $pos_offer_end_date,
            'pos_offer_amount' => $pos_offer_amount,
            'pos_offer_terms_conditions' => $pos_offer_terms_conditions,
            'pos_offer_status' => $pos_offer_status
         ]);
      } else {
         $offer_update = DB::table('pos_offer_list')->where('pos_offer_activity_key', $pos_offer_activity_key)->update([
            'pos_offer_name' => $pos_offer_name,
            'pos_offer_type' => $pos_offer_type,
            'pos_offer_catagroy_id' => $pos_offer_catagroy_id,
            'pos_offer_start_date' => $pos_offer_start_date,
            'pos_offer_end_date' => $pos_offer_end_date,
            'pos_offer_amount' => $pos_offer_amount,
            'pos_offer_terms_conditions' => $pos_offer_terms_conditions,
            'pos_offer_status' => $pos_offer_status,
           	'pos_offer_image'=>$base_url.'storage/app/'. $pos_offer_image->store('offer_image')
         ]);
      }

      if ($offer_update) {
         return redirect(route('superadmin::display_offer'))->with('update_msg', 'updated Successsfully');
      }
    else{
      return redirect(route('superadmin::display_offer'))->with('not_change', 'you cannot change anything');
    }
   }
}
