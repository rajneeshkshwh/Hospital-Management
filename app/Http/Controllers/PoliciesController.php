<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PoliciesController extends Controller
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

        $this->data['policies_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description  from policies AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName  from mstrcategory AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        
    
        $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_policies',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
        
        $this->data['policies_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description  from policies AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();
        $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName  from mstrcategory AS A where A.BranchCode = ?',[Session::get('BranchCode')]);

        return view('admin.master.add_policies',$this->data);
    }


   

    //Add product data
    public function insert(Request $request)
    {
        
        try {
           
            $CategoryName = $request->CategoryName;
            $Title = $request->Title;
            $Description = $request->Description;
           
            $Status = $request->has('Status') ?'Y' : 'N';
           

             DB::insert('insert into policies (CategoryName,  Title, Description, Status, BranchCode,CreatedBy,CreateDate) values(?,?,?,?,?,?,?)', [$CategoryName, $Title, $Description, $Status, Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s')]);
            

            $this->data['rights']= $this->getUserRights();

            return redirect()->back()->with('message','policies Added Successfully');

           // echo "ok";
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {

           // echo $e;

           }
      
    }

    public function edit(Request $request,$UniqueId)
    {
      if($_POST){
            $CategoryName = $request->CategoryName;
            $Title = $request->Title;
            $Description = $request->Description;
         
            $Status = $request->has('Status') ?'Y' : 'N';
          
          DB::table('policies')
              ->where('UniqueId', $UniqueId)
              ->update(['CategoryName' => $CategoryName, 'Title' => $Title, 'Description' => $Description,'Status' => $Status,'BranchCode' => Session::get('BranchCode'),'UpdatedBy' =>Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s')]);   
          $this->data['rights']= $this->getUserRights();
          return redirect('/admin/policies')->with ('message',' Updated Successfully ');
        }

       $this->data['edit'] = TRUE;

         $this->data['policies_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description  from policies AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['c'] = DB::select('select * from policies where UniqueId = ?',[$UniqueId]);
        $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName  from mstrcategory AS A where A.BranchCode = ?',[Session::get('BranchCode')]);

        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_policies',$this->data);
    }

    public function delete($UniqueId){
        
        DB::delete('delete from policies where  UniqueId= ?',[$UniqueId]);
         $this->data['policies_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description  from policies AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
         $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName  from mstrcategory AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();

        
        return redirect('/admin/policies')->with ('message',' Deleted Successfully');
    }
}