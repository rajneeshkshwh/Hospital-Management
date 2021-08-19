<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class EmployeeController extends Controller
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

        $this->data['emp_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,EmpName,MobileNo,EmailId,GardianName,RelationShip,B.AreaName,C.PlaceName from mstremployee AS A INNER JOIN mstrarea AS B ON A.area=B.UniqueId INNER JOIN mstrPlace AS C ON A.Place=C.UniqueId where A.BranchCode = ?',[Session::get('BranchCode')]);

        $this->data['place_list'] = DB::select('select * from mstrplace where status="Y"');
        $this->data['state_list'] = DB::select('select * from mstrstate where status="Y"');
        $this->data['religion_list'] = DB::select('select * from mstrreligion where status="Y"');
        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_employee',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
        
        $this->data['emp_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,EmpName,MobileNo,EmailId,GardianName,RelationShip,B.AreaName,C.PlaceName from mstremployee AS A INNER JOIN mstrarea AS B ON A.area=B.UniqueId INNER JOIN mstrPlace AS C ON A.Place=C.UniqueId where A.BranchCode = ?',[Session::get('BranchCode')]);

        $this->data['place_list'] = DB::select('select * from mstrplace where status="Y"');
        $this->data['state_list'] = DB::select('select * from mstrstate where status="Y"');
        $this->data['religion_list'] = DB::select('select * from mstrreligion where status="Y"');
        $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_employee',$this->data);
    }


    public function getearea(Request $request)
    {
      $CId=$request->id;
      $area =DB::table('mstrarea')->where('Place','=',[$CId])->get();
      foreach ($area as $key) {
        # code...
         echo "<option value=".$key->UniqueId.">".$key->AreaName."</option>";
      }
    }

    public function geteearea(Request $request)
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

    //Edit Customer data
    public function edit(Request $request,$UniqueId)
    {
        if($_POST){
              $EmpCode = $request->EmpCode;
              $EmpName = $request->EmpName;
              $PinCode = $request->PinCode;
              $MobileNo = $request->MobileNo;
              $EmailId= $request->EmailId;
              $Status = $request->has('Status') ?'Y' : 'N';
              $Address = $request->Address;
              $State = $request->State;
              $GardianName = $request->GardianName;
              $RelationShip = $request->RelationShip;
              $Place = $request->Place;
              $Area = $request->Area;
              $Religion = $request->Religion;

              DB::table('mstremployee')
                  ->where('UniqueId', $UniqueId)
                  ->update(['EmpCode' => $EmpCode,'Religion' => $Religion,'EmpName' => $EmpName,'PinCode' => $PinCode,'MobileNo' => $MobileNo,'EmailId' => $EmailId,'Status' => $Status,'Address' => $Address,'BranchCode' => Session::get('BranchCode'),'UpdatedBy' =>Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s'),'State' => $State,'GardianName' => $GardianName,'RelationShip' => $RelationShip,'Place' => $Place,'Area' => $Area]);
       $this->data['rights']= $this->getUserRights();
              return redirect('/admin/employee')->with ('message','Details  Updated Successfully ');
            }
        $this->data['edit'] = TRUE;

        $this->data['emp_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,EmpName,MobileNo,EmailId,GardianName,RelationShip,B.AreaName,C.PlaceName from mstremployee AS A INNER JOIN mstrarea AS B ON A.area=B.UniqueId INNER JOIN mstrPlace AS C ON A.Place=C.UniqueId where A.BranchCode = ?',[Session::get('BranchCode')]);

        $this->data['place_list'] = DB::select('select * from mstrplace where status="Y"');
        $this->data['state_list'] = DB::select('select * from mstrstate where status="Y"');
        $this->data['religion_list'] = DB::select('select * from mstrreligion where status="Y"');

        $this->data['c'] = DB::select('select * from mstremployee where UniqueId = ?',[$UniqueId]);
        $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_employee',$this->data);
    }

    // Delete Customer Data
    public function delete($UniqueId){

        DB::delete('delete from mstremployee where  UniqueId= ?',[$UniqueId]);
        
        $this->data['emp_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,EmpName,MobileNo,EmailId,GardianName,RelationShip,B.AreaName,C.PlaceName from mstremployee AS A INNER JOIN mstrarea AS B ON A.area=B.UniqueId INNER JOIN mstrPlace AS C ON A.Place=C.UniqueId where A.BranchCode = ?',[Session::get('BranchCode')]);


        $this->data['place_list'] = DB::select('select * from mstrplace where status="Y"');
        $this->data['state_list'] = DB::select('select * from mstrstate where status="Y"');
        $this->data['religion_list'] = DB::select('select * from mstrreligion where status="Y"');
        $this->data['rights']= $this->getUserRights();
        return redirect('/admin/employee')->with ('message',' Deleted Successfully');
    }

    public function insert(Request $request)
    {
        $EmpCode = $request->EmpCode;
        $EmpName = $request->EmpName;
        $PinCode = $request->PinCode;
        $MobileNo = $request->MobileNo;
        $EmailId= $request->EmailId;
        $Status = $request->has('Status') ?'Y' : 'N';
        $Address = $request->Address;
        $State = $request->State;
        $GardianName = $request->GardianName;
        $RelationShip = $request->RelationShip;
        $Place = $request->Place;
        $Area = $request->Area;
        $Religion = $request->Religion;
    

        DB::insert('insert into mstremployee (Religion,EmpCode, EmpName, Address, PinCode, MobileNo, EmailId, Status, BranchCode,CreatedBy,CreateDate,State,GardianName,RelationShip,Place,Area) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [$Religion,$EmpCode, $EmpName, $Address, $PinCode, $MobileNo, $EmailId, $Status, Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s'),$State,$GardianName,$RelationShip,$Place,$Area]);
         $this->data['rights']= $this->getUserRights();
         return redirect()->back()->with('message','Details Added Successfully');
    }
}