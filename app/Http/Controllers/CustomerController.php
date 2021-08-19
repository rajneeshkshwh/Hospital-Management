<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CustomerController extends Controller
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

        $this->data['customer_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CustomerName,A.MobileNo,A.EmailId,B.Religion,C.AreaName,A.SoftwareCode,A.CustomerCode,A.mob2,D.Language  from mstrcustomer AS A LEFT JOIN mstrReligion AS B ON A.Religion=B.UniqueId INNER JOIN mstrarea AS C ON A.area=C.UniqueId INNER JOIN mstrlanguage AS D ON A.Language=D.UniqueId where A.BranchCode = ?',[Session::get('BranchCode')]);


        // $this->data['type_list'] = DB::select('select * from grouptype where status="Y"');
        $this->data['language_list'] = DB::select('select * from mstrlanguage where status="Y"');
        $this->data['place_list'] = DB::select('select * from mstrplace where status="Y"');
        $this->data['state_list'] = DB::select('select * from mstrstate where status="Y"');
        $this->data['religion_list'] = DB::select('select * from mstrreligion where status="Y"');

        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_customer',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
        
       $this->data['customer_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CustomerName,A.MobileNo,A.EmailId,B.Religion,C.AreaName,A.SoftwareCode,A.CustomerCode,A.mob2,D.Language  from mstrcustomer AS A LEFT JOIN mstrReligion AS B ON A.Religion=B.UniqueId INNER JOIN mstrarea AS C ON A.area=C.UniqueId INNER JOIN mstrlanguage AS D ON A.Language=D.UniqueId where A.BranchCode = ?',[Session::get('BranchCode')]);


        // $this->data['type_list'] = DB::select('select * from grouptype where status="Y"');
        $this->data['language_list'] = DB::select('select * from mstrlanguage where status="Y"');
        $this->data['place_list'] = DB::select('select * from mstrplace where status="Y"');
        $this->data['state_list'] = DB::select('select * from mstrstate where status="Y"');
        $this->data['religion_list'] = DB::select('select * from mstrreligion where status="Y"');

        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_customer',$this->data);
    }


    public function getArea(Request $request)
    {
      $CId=$request->id;
      $area =DB::table('mstrarea')->where('Place','=',[$CId])->get();
      foreach ($area as $key) {
        # code...
         echo "<option value=".$key->UniqueId.">".$key->AreaName."</option>";
      }
     
    }

    public function geteditArea(Request $request)
    {
      $CId=$request->id;
      $SId=$request->id2;
      $area =DB::table('mstrarea')->where('Place','=',[$CId])->get();
      foreach ($area as $key) {
        ?>
          <option value="<?php echo $key->UniqueId; ?>" <?php if($SId == $key->UniqueId) { echo 'selected="selected"';}  ?>  > <?php echo $key->AreaName; ?></option>
          <?php
      }
    }

    //Add Customer data
    public function insert(Request $request)
    {
        $CustomerCode = $request->CustomerCode;
        $CustomerName = $request->CustomerName;
        $Area = $request->Area;
        $SoftwareCode = $request->SoftwareCode;
        $Place = $request->Place;
        $Religion = $request->Religion;
        $State = $request->State;
        $Address = $request->Address;
        $PinCode = $request->PinCode;
        $MobileNo = $request->MobileNo;
        $mob2 = $request->mob2;
        $EmailId= $request->EmailId;
        $Language = $request->Language;
        $Status = $request->has('Status') ?'Y' : 'N';

        DB::insert('insert into mstrcustomer ( CustomerCode, CustomerName,Area,SoftwareCode,Place,Religion,State, Address, PinCode, MobileNo, EmailId,mob2, Status, BranchCode,CreatedBy,CreateDate,Language) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [$CustomerCode, $CustomerName,$Area,$SoftwareCode,$Place,$Religion,$State,$Address,$PinCode,$MobileNo,$EmailId,$mob2
          , $Status, Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s'),$Language]);

        $this->data['rights']= $this->getUserRights();

        return redirect()->back()->with('message','Customer Added Successfully');
    }

    public function edit(Request $request,$UniqueId)
    {
      if($_POST){
          $CustomerCode = $request->CustomerCode;
          $CustomerName = $request->CustomerName;
          $Area = $request->Area;
          $SoftwareCode = $request->SoftwareCode;
          $Place = $request->Place;
          $Religion = $request->Religion;
          $State = $request->State;
          $Address = $request->Address;
          $PinCode = $request->PinCode;
          $MobileNo = $request->MobileNo;
          $mob2 = $request->mob2;
          $EmailId= $request->EmailId;
          $Language = $request->Language;
          $Status = $request->has('Status') ?'Y' : 'N';
          
          DB::table('mstrcustomer')
              ->where('UniqueId', $UniqueId)
              ->update(['CustomerCode' => $CustomerCode,'CustomerName' => $CustomerName,'Area' => $Area,'SoftwareCode' => $SoftwareCode,'Place' => $Place,'Religion' => $Religion,'State' => $State,'PinCode' => $PinCode,'MobileNo' => $MobileNo,'EmailId' => $EmailId,'Status' => $Status, 'Address' => $Address,'BranchCode' => Session::get('BranchCode'),'UpdatedBy' =>Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s'),'Language' => $Language]);   
          $this->data['rights']= $this->getUserRights();
          return redirect('/admin/customer')->with ('message',' Updated Successfully ');
        }

       $this->data['edit'] = TRUE;

       $this->data['customer_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CustomerName,A.MobileNo,A.EmailId,B.Religion,C.AreaName,A.SoftwareCode,A.CustomerCode,A.mob2  from mstrcustomer AS A LEFT JOIN mstrReligion AS B ON A.Religion=B.UniqueId INNER JOIN mstrarea AS C ON A.area=C.UniqueId where A.BranchCode = ?',[Session::get('BranchCode')]);

        // $this->data['type_list'] = DB::select('select * from grouptype where status="Y"');
        $this->data['language_list'] = DB::select('select * from mstrlanguage where status="Y"');
        $this->data['place_list'] = DB::select('select * from mstrplace where status="Y"');
        $this->data['state_list'] = DB::select('select * from mstrstate where status="Y"');
        $this->data['religion_list'] = DB::select('select * from mstrreligion where status="Y"');
        $this->data['c'] = DB::select('select * from mstrcustomer where UniqueId = ?',[$UniqueId]);

        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_customer',$this->data);
    }

    public function delete($UniqueId){
        DB::delete('delete from mstrcustomer where  UniqueId= ?',[$UniqueId]);
        $this->data['customer_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CustomerName,A.MobileNo,A.EmailId,B.Religion,C.AreaName,A.SoftwareCode,A.CustomerCode,A.mob2  from mstrcustomer AS A LEFT JOIN mstrReligion AS B ON A.Religion=B.UniqueId INNER JOIN mstrarea AS C ON A.area=C.UniqueId where A.BranchCode = ?',[Session::get('BranchCode')]);

        // $this->data['type_list'] = DB::select('select * from grouptype where status="Y"');
         $this->data['language_list'] = DB::select('select * from mstrlanguage where status="Y"');
        $this->data['place_list'] = DB::select('select * from mstrplace where status="Y"');
        $this->data['state_list'] = DB::select('select * from mstrstate where status="Y"');
        $this->data['religion_list'] = DB::select('select * from mstrreligion where status="Y"');

        $this->data['rights']= $this->getUserRights();
        
        return redirect('/admin/customer')->with ('message',' Deleted Successfully');
    }
}