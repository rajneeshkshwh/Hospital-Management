<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Cookie;
use DB;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash; 

class WebsiteController extends Controller
{


 public function search(Request $request){
        
        $type = $request->all();
        $id = $request->search;
       $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo, A.serving, A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');
       $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');
     
     
        
         // $this->data['result'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.DoctorName,A.DoctorDesignation,A.Photo,A.Description  from doctor AS A  where A.DoctorName like, '%' . $id . '%'');

        $this->data['result'] =  DB::table('doctor')->where('DoctorName', 'like', '%'.$id.'%')->get();
        return view('website.search',$this->data);
     }

    public function home(){

        $this->data['banner_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description,A.Photo  from banner AS A ');

        $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo, A.serving, A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');

        $this->data['aboutus'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Photo,A.Description  from aboutus AS A ');
        $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');
           $this->data['service'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Photo,A.Description from service AS A ');
         $this->data['doctor_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.DoctorName,A.DoctorDesignation,A.Photo,A.Description  from doctor AS A   ORDER BY A.List ASC');
          $this->data['gallery_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type,A.Name,A.Photo  from portfolio AS A LIMIT 5');
     
        
    
        $this->data['Title'] = 'Home';
        return view('website.index',$this->data);
    	
    	//return view('website.index');
    }
    public function about(){

        $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo, A.serving, A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');
       $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');
     $this->data['gallery_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type,A.Name,A.Photo  from portfolio AS A LIMIT 5');

        $this->data['aboutus'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Photo,A.Description  from aboutus AS A ');


 $this->data['principle_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description  from principle AS A ');

      

        return view('website.about',$this->data);
   
    }
     public function department(Request $request){
        
        $type = $request->all();
        $id = $request->UniqueId;
       $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName, A.serving, A.ContactNo,A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');
       $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');
     $this->data['gallery_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type,A.Name,A.Photo  from portfolio AS A LIMIT 5');
     
        $this->data['department_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName,A.Title,A.Photo,A.Description  from department AS A where A.CategoryName = ?',[$id]);

        return view('website.department',$this->data);
 
    }
     public function overview(){
        
      
       $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo, A.serving, A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');
       $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');
       $this->data['gallery_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type,A.Name,A.Photo  from portfolio AS A LIMIT 5');
     
        $this->data['overview_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Photo,A.Description  from overview AS A ');

  
        return view('website.overview',$this->data);
 
    }



    public function doctor(){
        
      
       $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo, A.serving, A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');
       $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');
       $this->data['gallery_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type,A.Name,A.Photo  from portfolio AS A LIMIT 5');
     
       $this->data['doctor_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.DoctorName,A.DoctorDesignation,A.Photo,A.Description  from doctor AS A ');
       $this->data['doctor'] = DB::table('doctor')->get();

        return view('website.doctor',$this->data);
 
    }

     public function portfolio(){
        
      
       $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo, A.serving, A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');
       $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');
       $this->data['gallery_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type,A.Name,A.Photo  from portfolio AS A LIMIT 5');
      $this->data['portfolio_list_type'] = DB::select('select distinct(A.Type)  from portfolio AS A ');
        $this->data['portfolio_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type,A.Name,A.Photo  from portfolio AS A ');
       
  
        return view('website.portfolio',$this->data);
 
    }

    public function blog(Request $request){
        
      if($_POST){
         $type = $request->all();
        $id = $request->UniqueId;

         $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo, A.serving, A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');
       $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');
       $this->data['gallery_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type,A.Name,A.Photo  from portfolio AS A LIMIT 5');
     
      $this->data['blog_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName,A.Title,A.Photo,A.Description,A.Date  from blog AS A  LEFT JOIN mstrcategory AS B ON A.CategoryName = B.UniqueId where B.UniqueId=?',[$id]);

             //return redirect('website/blog',$this->data);
       return view('website.blog',$this->data);
            }
      $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo, A.serving,A.serving,A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');
       $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');
       $this->data['gallery_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type,A.Name,A.Photo  from portfolio AS A LIMIT 5');
     
     
   $this->data['blog_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName,A.Title,A.Photo,A.Description,A.Date  from blog AS A ');
       
     
     
        return view('website.blog_list',$this->data);
      
    }
     public function blogsingle(Request $request){
         $type = $request->all();
        $id = $request->UniqueId;
     
       $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo, A.serving, A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');
       $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');
       $this->data['leadership_list_type'] = DB::select('select distinct(A.Team)  from leadership AS A ');
       $this->data['fellowship_list_type'] = DB::select('select distinct(A.Type)  from fellowship AS A ');
     
     
   $this->data['blog_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName,A.Title,A.Photo,A.Description,A.Date  from blog AS A ');

   $this->data['blog_list_details'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName,A.Title,A.Photo,A.Description,A.Date  from blog AS A  where A.UniqueId=?',[$id]);
       
     
     
        return view('website.single_blog',$this->data);
      
    }
    public function chapter(){

        $this->data['banner_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description,A.Photo  from banner AS A ');

        $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo, A.serving, A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');

        $this->data['aboutus'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Photo,A.Description  from aboutus AS A ');
        $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');
        $this->data['leadership_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Team,A.Name,A.Designation,A.Photo,A.Description,A.Information,A.EmailId  from leadership AS A ');
        $this->data['leadership_list_type'] = DB::select('select distinct(A.Team)  from leadership AS A ');
           $this->data['fellowship_list_type'] = DB::select('select distinct(A.Type)  from fellowship AS A ');
         $this->data['fellowship_type'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type from fellowship AS A ');
         $this->data['news_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.NewsType,A.Title,A.Photo,A.Description,A.Date  from news AS A ');
     
         $this->data['district_list'] = DB::select('select * from districts');
    
     
        return view('website.chapter',$this->data);
      
      //return view('website.index');
    }
     public function chapter_get(Request $request){
        $id=$request->id;
        $podata = DB::table('chapter')
                     ->select('chapter.*','districts.district_name')
                     ->leftjoin('districts','districts.id','=','chapter.DistrictName')
                   
                     ->where('chapter.DistrictName', $id)
                     ->get();

      echo $podata;

    //    echo $id;
    
     
      
    }

    public function contact(){

     $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo, A.serving, A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');
       $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');
      $this->data['gallery_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type,A.Name,A.Photo  from portfolio AS A LIMIT 5');
     
      return view('website.contact',$this->data); 
     // return view('website.contact');
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

        $this->data['category_count'] = DB::select('select COUNT(UniqueId) AS c from mstrcategory where BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['product_count'] = DB::select('select COUNT(UniqueId) AS c from mstrproduct where BranchCode = ?',[Session::get('BranchCode')]);
      
        $this->data['product_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.ProductCode,A.ProductName  from mstrproduct AS A where A.BranchCode = ?',[Session::get('BranchCode')] );

        return view('dashboard',$this->data);
    	
    }
    //User Accounts
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
     
     public function register(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        $password = bcrypt($request->password);
        $Status = $request->has('Status') ?'Y' : 'N';

        $val = $this->Checkdata($email,$name);

        if($val == '0')
        {
            DB::insert('insert into users (name,email,password, status,role, BranchCode,created_at) values(?,?,?,?,?,?,?)', [$name,$email,$password, $Status,'User', 'HSR',date('Y-m-d H:i:s')]);
             $result = User::where(['email'=>$data['email']])->first();
                 if($result!='')
                  {     
                     Session::put('Username',$result->name);  
                     Session::put('BranchCode',$result->BranchCode);  
                     Session::put('role',$result->role);  
                     Session::put('id',$result->id);  
                  }
            return redirect('webiste.user_dashboard')->back()->with('message','Register Successfully');
        }
        else
        {
            return redirect()->back()->with('message','Details Already Added');
        }
    }

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
       $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo, A.serving, A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');

        $this->data['aboutus'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Photo,A.Description  from aboutus AS A ');
        $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');
        $this->data['leadership_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Team,A.Name,A.Designation,A.Photo,A.Description,A.Information,A.EmailId  from leadership AS A ');
        $this->data['leadership_list_type'] = DB::select('select distinct(A.Team)  from leadership AS A ');
           $this->data['fellowship_list_type'] = DB::select('select distinct(A.Type)  from fellowship AS A ');
      return view('website.login',$this->data);
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
