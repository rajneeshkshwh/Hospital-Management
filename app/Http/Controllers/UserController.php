<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller
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
        $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_user',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){
        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;

       $this->data['user_list'] = DB::select('select (CASE WHEN Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",id,name,email from users where role="User"');
        $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_user',$this->data);
    }

    public function Checkdata($email,$name)
    {
       $html =  DB::table('users')->where([['email', $email],['name', $name]])->get();
       
       if(!empty($html[0]->id))
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
        $email = $request->email;
        $name = $request->name;
        $password = bcrypt($request->password);
        $Status = $request->has('Status') ?'Y' : 'N';

        $val = $this->Checkdata($email,$name);

        if($val == '0')
        {
            DB::insert('insert into users (name,email,password, status,role, BranchCode,created_at) values(?,?,?,?,?,?,?)', [$name,$email,$password, $Status,'User', Session::get('BranchCode'),date('Y-m-d H:i:s')]);
            return redirect()->back()->with('message','Details Added Successfully');
        }
        else
        {
            return redirect()->back()->with('message','Details Already Added');
        }
    }

    public function edit(Request $request,$UniqueId)
    {
        if($_POST){
            $email = $request->email;
            $name = $request->name;
            $password = bcrypt($request->password);
            $Status = $request->has('Status') ?'Y' : 'N';
              DB::table('users')
                  ->where('id', $UniqueId)
                  ->update(['name' => $name,'email' => $email,'password' => $password,'Status' => $Status, 'BranchCode' => Session::get('BranchCode'),'updated_at' =>date('Y-m-d H:i:s')]);
              $this->data['rights']= $this->getUserRights();
              return redirect('/admin/user')->with ('message','Details Updated Successfully ');
            }
            $this->data['edit'] = TRUE;

            $this->data['user_list'] = DB::select('select (CASE WHEN Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",id,name,email from users where role="User"');

            $this->data['r'] = DB::select('select * from users where id = ?',[$UniqueId]);
            $this->data['rights']= $this->getUserRights();
            return view('admin.master.add_user',$this->data);
    }

    public function delete($UniqueId){
        DB::delete('delete from users where  id= ?',[$UniqueId]);
       
        $this->data['user_list'] = DB::select('select (CASE WHEN Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",id,name,email from users where role="User"');
        $this->data['rights']= $this->getUserRights();
        return redirect('/admin/user')->with ('message',' Deleted Successfully');
    }   
}