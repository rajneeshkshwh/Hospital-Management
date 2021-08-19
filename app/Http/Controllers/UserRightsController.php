<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserRightsController extends Controller
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

        $this->data['user_list'] = DB::select('select (CASE WHEN Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",id,name,email from users where role="User"');


        $this->data['user_details'] = DB::select('select A.UniqueId,(CASE WHEN A.DashBoard="Y" THEN "True" ELSE "False" END) AS "Dash",(CASE WHEN A.Setting="Y" THEN "True" ELSE "False" END) AS "Set",(CASE WHEN A.Master="Y" THEN "True" ELSE "False" END) AS "Mas",(CASE WHEN A.Sms="Y" THEN "True" ELSE "False" END) AS "sm",(CASE WHEN A.Report="Y" THEN "True" ELSE "False" END) AS "Repo",B.name from userrights AS A INNER JOIN users AS B ON A.User=B.id');
        $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_userrights',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){
        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;

       $this->data['user_list'] = DB::select('select (CASE WHEN Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",id,name,email from users where role="User"');

       $this->data['user_details'] = DB::select('select A.UniqueId,(CASE WHEN A.DashBoard="Y" THEN "True" ELSE "False" END) AS "Dash",(CASE WHEN A.Setting="Y" THEN "True" ELSE "False" END) AS "Set",(CASE WHEN A.Master="Y" THEN "True" ELSE "False" END) AS "Mas",(CASE WHEN A.Sms="Y" THEN "True" ELSE "False" END) AS "sm",(CASE WHEN A.Report="Y" THEN "True" ELSE "False" END) AS "Repo",B.name from userrights AS A INNER JOIN users AS B ON A.User=B.id');
       $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_userrights',$this->data);
    }

     public function Checkdata($User)
    {
       $html =  DB::table('userrights')->where([['User', $User]])->get();
       
       if(!empty($html[0]->UniqueId))
       {
        $val = '1';
       }
       else
       {
        $val = '0';
       }
      return $val;
    }

     public function insert(Request $request)
    {
        $User = $request->User;
        $Dashboard = $request->has('Dashboard') ?'Y' : 'N';
        $Setting = $request->has('Setting') ?'Y' : 'N';
        $Master = $request->has('Master') ?'Y' : 'N';
        $Sms = $request->has('Sms') ?'Y' : 'N';
        $Report = $request->has('Report') ?'Y' : 'N';

        $val = $this->Checkdata($User);

        if($val == '0')
        {
            DB::insert('insert into userrights (User,Dashboard,Setting,Master,Sms,Report,Status, BranchCode,CreatedBy,CreateDate) values(?,?,?,?,?,?,?,?,?,?)', [$User,$Dashboard,$Setting,$Master, $Sms,$Report,'Y', Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s')]);
            $this->data['rights']= $this->getUserRights();
            return redirect()->back()->with('message','Details Added Successfully');
        }
        else
        {
            $this->data['rights']= $this->getUserRights();
            return redirect()->back()->with('message','Details Already Added');
        }
    }

    public function edit(Request $request,$UniqueId)
    {
        if($_POST){
            $User = $request->User;
            $Dashboard = $request->has('Dashboard') ?'Y' : 'N';
            $Setting = $request->has('Setting') ?'Y' : 'N';
            $Master = $request->has('Master') ?'Y' : 'N';
            $Sms = $request->has('Sms') ?'Y' : 'N';
            $Report = $request->has('Report') ?'Y' : 'N';

              DB::table('userrights')
                  ->where('UniqueId', $UniqueId)
                  ->update(['Dashboard' => $Dashboard,'Setting' => $Setting,'Master' => $Master,'Sms' => $Sms,'Report' => $Report, 'BranchCode' => Session::get('BranchCode'),'UpdatedBy' => Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s')]);
              $this->data['rights']= $this->getUserRights();
              return redirect('/admin/rights')->with ('message','Details Updated Successfully ');
            }
            $this->data['edit'] = TRUE;

            $this->data['user_list'] = DB::select('select (CASE WHEN Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",id,name,email from users where role="User"');

            $this->data['user'] = DB::select('select * from userrights where UniqueId = ?',[$UniqueId]);
            $this->data['rights']= $this->getUserRights();
            return view('admin.master.add_userrights',$this->data);
    }

    public function delete($UniqueId){
        DB::delete('delete from userrights where  UniqueId= ?',[$UniqueId]);
       
        $this->data['user_list'] = DB::select('select (CASE WHEN Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",id,name,email from users where role="User"');
        $this->data['rights']= $this->getUserRights();
        return redirect('/admin/rights')->with ('message',' Deleted Successfully');
    }   
}