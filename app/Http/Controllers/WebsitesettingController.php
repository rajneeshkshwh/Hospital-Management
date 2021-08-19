<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class WebsitesettingController extends Controller
{
     public function getUserRights()
    {
       $html =  DB::table('userrights')->where([['User', Session::get('id')]])->get();
       return $html;
    }

    public function index()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['list'] = TRUE;
       $this->data['web_list'] = DB::select('select A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo,A.MailID  from websitesetting AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();
        return view('admin.websetting',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
        
       $this->data['api_list'] = DB::select('select A.UniqueId,A.ProviderName,A.ApiLink,A.Status,A.Type  from api AS A where A.BranchCode = ?',[Session::get('BranchCode')]);

       $this->data['rights']= $this->getUserRights();

        return view('admin.api',$this->data);
    }



    //Add Customer data
 

    //Edit Customer data
    public function edit(Request $request,$UniqueId)
    {
        if($_POST){
          $WebSiteName = $request->WebSiteName;
          $ContactPersonName = $request->ContactPersonName;
          $ContactNo = $request->ContactNo;
          $MailID = $request->MailID;
          $Address = $request->Address;  
          $serving = $request->serving;     
          $FaceBookUrl = $request->FaceBookUrl;       
          $InstagramUrl = $request->InstagramUrl;       
          $TwitterUrl = $request->TwitterUrl;       
          $GooglePlusUrl = $request->GooglePlusUrl;       
          $Status = $request->has('Status') ?'Y' : 'N';
          $prev_photo = $request->prev_photo;
          $file = $request->file('Logo');
            if($file!=''){
                $old_image = $prev_photo;
                      if (file_exists($old_image)) {
                         @unlink($old_image);
                      }
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();

            # save to DB
            //$tickes = Users::create(['imagePath' => 'storage/'.$name]);
            $Photo ='assets/uploads/logo/'.$name;
            $request->file('Logo')->move("assets/uploads/logo/", $name);
            }else{
              if($prev_photo!=''){
                     $Photo = $prev_photo;
            }else{
            $Photo ='assets/uploads/logo/product-unknow.jpg';
            //$request->file('Photo')->move("assets/uploads/", $name);
                }
            }
             
              DB::table('websitesetting')
                  ->where('UniqueId', $UniqueId)
                  ->update(['WebSiteName' => $WebSiteName,'ContactPersonName' => $ContactPersonName,'ContactNo' => $ContactNo, 'serving' => $serving, 'MailID' => $MailID,'Status' => $Status,'Address' => $Address,'FaceBookUrl' => $FaceBookUrl,'InstagramUrl' => $InstagramUrl,'TwitterUrl' => $TwitterUrl,'GooglePlusUrl' => $GooglePlusUrl,'Logo' => $Photo,'BranchCode' => Session::get('BranchCode'),'UpdatedBy' =>Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s') ]);
       
              return redirect('/admin/websitesetting')->with ('message',' Updated Successfully ');
            }
        $this->data['edit'] = TRUE;

         $this->data['web_list'] = DB::select('select A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo, A.serving, A.MailID  from websitesetting AS A where A.BranchCode = ?',[Session::get('BranchCode')]);

        $this->data['c'] = DB::select('select * from websitesetting where UniqueId = ?',[$UniqueId]);

        $this->data['rights']= $this->getUserRights();

        return view('admin.websetting',$this->data);
    }

    // Delete Customer Data
    public function delete($UniqueId){
        DB::delete('delete from api where  UniqueId= ?',[$UniqueId]);
        $this->data['api_list'] = DB::select('select A.UniqueId,A.ProviderName,A.ApiLink,A.Status,A.Type  from api AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();
        return redirect('/admin/api')->with ('message',' Deleted Successfully');
    }

    
}