<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SubscribeController extends Controller
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

        $this->data['subcribe_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.EmailId from subcribe AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        
    
        $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_subcribe',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
        
      
        $this->data['subcribe_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.EmailId from subcribe AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_subcribe',$this->data);
    }


   

    //Add product data
    public function insert(Request $request)
    {
        
        try {
            $Title = $request->Title;
            $Description = $request->Description;
           
            $Status = $request->has('Status') ?'Y' : 'N';
            $file = $request->file('Photo');

            if($file!=''){
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $Photo ='assets/uploads/subcribe/'.$name;
            $request->file('Photo')->move("assets/uploads/subcribe/", $name);
            }else{
            $Photo ='assets/uploads/subcribe/product-unknow.jpg';
           
            }

             DB::insert('insert into subcribe ( Title, Description,Photo, Status, BranchCode,CreatedBy,CreateDate) values(?,?,?,?,?,?,?)', [$Title, $Description,$Photo, $Status, Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s')]);
            

            $this->data['rights']= $this->getUserRights();

            return redirect()->back()->with('message','subcribe Added Successfully');

           // echo "ok";
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {

           // echo $e;

           }
      
    }

    public function edit(Request $request,$UniqueId)
    {
      if($_POST){
            $EmailId = $request->EmailId;
            $Status = $request->has('Status') ?'Y' : 'N';
           
        
          
          DB::table('subcribe')
              ->where('UniqueId', $UniqueId)
              ->update(['EmailId' => $EmailId,'Status' => $Status,'BranchCode' => Session::get('BranchCode'),'UpdatedBy' =>Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s')]);   
          $this->data['rights']= $this->getUserRights();
          return redirect('/admin/subscribe')->with ('message',' Updated Successfully ');
        }

       $this->data['edit'] = TRUE;

       
        $this->data['subcribe_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.EmailId from subcribe AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['c'] = DB::select('select * from subcribe where UniqueId = ?',[$UniqueId]);

        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_subcribe',$this->data);
    }

    public function delete($UniqueId){
       
        DB::delete('delete from subcribe where  UniqueId= ?',[$UniqueId]);
       
        $this->data['subcribe_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.EmailId from subcribe AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();
        
        return redirect('/admin/subscribe')->with ('message',' Deleted Successfully');
    }
}