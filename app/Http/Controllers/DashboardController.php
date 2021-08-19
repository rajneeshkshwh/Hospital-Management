<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class DashboardController extends Controller
{

     public function getUserRights()
    {
       $html =  DB::table('userrights')->where([['User', Session::get('id')]])->get();
       return $html;
    }
    

  /*****SMS simple*****/
    public function index()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        
        $this->data['list'] = TRUE;

        $this->data['sms_list'] = DB::select('select UniqueId,SenderId,ContactNo,GatewayType,Message,Status from sms where BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['user_list'] = DB::select('select A.Status,A.UniqueId,A.CustomerName,A.MobileNo,A.EmailId  from mstrcustomer AS A where A.BranchCode = ?',[Session::get('BranchCode')]);

        $this->data['rights']= $this->getUserRights();

      return view('admin.sms.add_sms',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
        $this->data['sms_list'] = DB::select('select UniqueId,SenderId,ContactNo,GatewayType,Message,Status from sms where BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['user_list'] = DB::select('select A.Status,A.UniqueId,A.CustomerName,A.MobileNo,A.EmailId  from mstrcustomer AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
         $this->data['group_list'] = DB::select('select * from grouptype');

         $this->data['rights']= $this->getUserRights();

        return view('admin.sms.add_sms',$this->data);
    }


    public function getStates(Request $request)
    {
      $CId=$request->id;
      $StatesDetails =DB::table('states')->where('country_id','=',[$CId])->get();
      foreach ($StatesDetails as $key) {
        # code...
         echo "<option value=".$key->id.">".$key->name."</option>";
      }
     
    }

    public function geteditStates(Request $request)
    {
      $CId=$request->id;
      $SId=$request->id2;

      $StatesDetails =DB::table('states')->where('country_id','=',[$CId])->get();
      foreach ($StatesDetails as $key) {
        ?>
  
          <option value="<?php echo $key->id; ?>" <?php if($SId == $key->id) { echo 'selected="selected"';}  ?>  > <?php echo $key->name; ?></option>
          <?php
      }
     
    }

    //ADD SMS
     public function insert(Request $request)
    {
        $SenderId = $request->SenderId;
        $GatewayType = $request->GatewayType;
        $Catergory = $request->Catergory;
        $SmsType = $request->SmsType;
        $ContactNo = $request->ContactNo;
        $GroupType = $request->GroupType;
        $Message = $request->Message;
        $Status = $request->has('Status') ?'Y' : 'N';
            if($SmsType=='1'){

               DB::insert('insert into sms (SenderId, GatewayType, Catergory, SmsType, ContactNo, GroupType, Message, Status, BranchCode,CreatedBy,CreateDate) values(?,?,?,?,?,?,?,?,?,?,?)', [$SenderId, $GatewayType, $Catergory, $SmsType, $ContactNo, $GroupType, $Message, $Status, Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s')]);

            }else if($SmsType=='2')
            {
                DB::insert('insert into sms (SenderId, GatewayType, Catergory, SmsType, ContactNo, GroupType, Message, Status, BranchCode,CreatedBy,CreateDate) values(?,?,?,?,?,?,?,?,?,?,?)', [$SenderId, $GatewayType, $Catergory, $SmsType, $ContactNo, $GroupType, $Message, $Status, Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s')]);


            }else{

              DB::insert('insert into sms (SenderId, GatewayType, Catergory, SmsType, ContactNo, GroupType, Message, Status, BranchCode,CreatedBy,CreateDate) values(?,?,?,?,?,?,?,?,?,?,?)', [$SenderId, $GatewayType, $Catergory, $SmsType, $ContactNo, $GroupType, $Message, $Status, Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s')]);

            }
    

        $this->data['rights']= $this->getUserRights();
        
         return redirect()->back()->with('message','Details Added Successfully');
    }



    // Delete Customer Data
    public function delete($UniqueId){

        DB::delete('delete from mstremployee where  UniqueId= ?',[$UniqueId]);
        

        $this->data['emp_list'] = DB::select('select (CASE WHEN Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",UniqueId,EmpName,MobileNo,EmailId from mstremployee where BranchCode = ?',[Session::get('BranchCode')]);

        $this->data['rights']= $this->getUserRights();
       
        return redirect('/admin/employee')->with ('message',' Deleted Successfully');
    }

   

    /***Group SMS ***/
    public function groupindex()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['list'] = TRUE;

        $this->data['sms_list'] = DB::select('select UniqueId,SenderId,ContactNo,GatewayType,Message,Status from sms where BranchCode = ?',[Session::get('BranchCode')]);

       $this->data['rights']= $this->getUserRights();

        return view('admin.sms.add_groupsms',$this->data);
    }

    public function addnewgroupsms()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
         $this->data['sms_list'] = DB::select('select UniqueId,SenderId,ContactNo,GatewayType,Message,Status from sms where BranchCode = ?',[Session::get('BranchCode')]);

         $this->data['rights']= $this->getUserRights();

        return view('admin.sms.add_groupsms',$this->data);
    }


}