<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Cookie;
use DB;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash; 

class AdminController extends Controller
{
    public function login(Request $request){
    	if($request->isMethod('post')){
    		$data =$request->input();

    		if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
    			// echo "Success"; die;
    			//Session One way 
                 $result = User::where(['email'=>$data['email']])->first();
                 if($result!='')
                  {     
                     Session::put('Username',$result->name);  
                     Session::put('BranchCode',$result->BranchCode);  
                     Session::put('role',$result->role);  
                     Session::put('id',$result->id);  
                  }
               return redirect('/dashboard');
    		}else{
    			//echo "Failed"; die;
    			return redirect('login')->with('flash_message_error','Invalid User Name & Password');
    		}
    	}
    	return view('login');
    }

     public function getUserRights()
    {
       $html =  DB::table('userrights')->where([['User', Session::get('id')]])->get();
       return $html;
    }

    
    // After Login View Dashboard
    public function dashboard(){
        //echo "Success"; die;
    	if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }

        $this->data['rights']= $this->getUserRights();
        
        $this->data['list'] = TRUE;

        $this->data['news'] = DB::select('select COUNT(UniqueId) AS c from news where BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['blog'] = DB::select('select COUNT(UniqueId) AS c from blog where BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['user'] = DB::select('select COUNT(id) AS c from users where BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['subcribe'] = DB::select('select COUNT(UniqueId) AS c from subcribe where BranchCode = ?',[Session::get('BranchCode')]);
     
        $this->data['news_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.NewsType,A.Title,A.Date  from news AS A where A.BranchCode = ?',[Session::get('BranchCode')] );

        return view('dashboard',$this->data);
    	
    }
     public function val(){
        //echo "Success"; die;
      if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
      // $data[] = array('Employee','Markes');
        $data = array();
        $result = DB::select('select UniqueId,CustomerName from mstrcustomer where BranchCode = ?',[Session::get('BranchCode')]);
           foreach ($result as $row) {
            $data[] = $row;
            }
      echo json_encode($data);
      
    }

    // Setting View
    public function settings(){
      $pass = DB::select('select * from users where status="Y" AND id = ?',[Session::get('id')]);

      $this->data['user_list'] = DB::select('select * from users where status="Y" AND id = ?',[Session::get('id')]);
      $this->data['cus_pass'] = bcrypt($pass[0]->password);
      $this->data['rights']= $this->getUserRights();
    	return view('password_setting',$this->data);
    }

   

    // Check Password
    public function checkpassword(Request $request){
      $data = $request->all();
      $current_password = $data['current_password'];

      $check_password = User::where(['role'=>'Admin'])->first();
      if(Hash::check($current_password,$check_password->password)){
        echo "true"; die;
      }else{
        echo "false"; die;
      }
    }

    //Update Password
    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $check_password = User::where(['email'=>Auth::user()->email])->first();
            $current_password = $data['current_password'];
            if(Hash::check($current_password,$check_password->password)){
               $password = bcrypt($data['new_password']);
               User::where('id','1')->update(['password'=>$password]);
               $this->data['rights']= $this->getUserRights();
               return redirect('/admin/settings')->with('flash_message_success','Password Updated Successfully');
            }else{
                $this->data['rights']= $this->getUserRights();
                return redirect('/admin/settings')->with('flash_message_error','Incorrect Current Password');
               
            }

        }
    }
    
         // Profile Setting View


    //Profile Edit 
     public function edit(Request $request,$UniqueId)
    {
        if($_POST){
            
              $ApplicationName = $request->ApplicationName;
              $PinCode = $request->PinCode;
              $MobileNo = $request->MobileNo;
              $EmailId= $request->EmailId;
              $Status = $request->has('Status') ?'Y' : 'N';
             
              $Address = $request->Address;
              $Footer = $request->Footer;

              $Country = $request->Country;
              $State = $request->State;
              $City = $request->City;

              DB::table('companysetting')
                  ->where('UniqueId', $UniqueId)
                  ->update(['ApplicationName' => $ApplicationName,'PinCode' => $PinCode,'MobileNo' => $MobileNo,'EmailId' => $EmailId,'Status' => $Status, 'Address' => $Address,'BranchCode' => Session::get('BranchCode'),'UpdatedBy' =>Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s'),'City' => $City,'Country' => $Country,'State' => $State, 'Footer' => $Footer ]);
       
              return redirect('admin/edit_company/1')->with ('message',' Updated Successfully ');
            }
        $this->data['edit'] = TRUE;

        $this->data['c'] = DB::select('select * from companysetting where UniqueId = ?',[$UniqueId]);
        $this->data['rights']= $this->getUserRights();
        
        return view('setting',$this->data);
    }

    //Logout 
    public function logout(){

    	Session::flush();
   	return redirect('login')->with('flash_message_success','Logged Out Success');
    }


}
