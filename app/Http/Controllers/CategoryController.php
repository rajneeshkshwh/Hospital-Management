<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CategoryController extends Controller
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

        $this->data['category_list'] = DB::select('select (CASE WHEN Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",UniqueId,CategoryName from mstrcategory');
        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_category',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){
        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
       $this->data['category_list'] = DB::select('select (CASE WHEN Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",UniqueId,CategoryName from mstrcategory');
       $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_category',$this->data);
    }
     
     public function insert(Request $request)
    {
        $CategoryName = $request->CategoryName;
        $Status = $request->has('Status') ?'Y' : 'N';

        DB::insert('insert into mstrcategory (CategoryName, Status, BranchCode,CreatedBy,CreateDate) values(?,?,?,?,?)', [$CategoryName, $Status, Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s')]);
        $this->data['rights']= $this->getUserRights();
        return redirect()->back()->with('message','Details Added Successfully');
    }

    public function edit(Request $request,$UniqueId)
    {
        if($_POST){
              $CategoryName = $request->CategoryName;
              $Status = $request->has('Status') ?'Y' : 'N';
              DB::table('mstrcategory')
                  ->where('UniqueId', $UniqueId)
                  ->update(['CategoryName' => $CategoryName,'Status' => $Status, 'BranchCode' => Session::get('BranchCode'),'UpdatedBy' =>Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s')]);
              $this->data['rights']= $this->getUserRights();
              return redirect('/admin/category')->with ('message','Details Updated Successfully ');
            }
            $this->data['edit'] = TRUE;

           $this->data['category_list'] = DB::select('select (CASE WHEN Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",UniqueId,CategoryName from mstrcategory');

            $this->data['r'] = DB::select('select * from mstrcategory where UniqueId = ?',[$UniqueId]);
            $this->data['rights']= $this->getUserRights();
            return view('admin.master.add_category',$this->data);
    }

    public function delete($UniqueId){
        DB::delete('delete from mstrcategory where  UniqueId= ?',[$UniqueId]);
        $this->data['category_list'] = DB::select('select (CASE WHEN Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",UniqueId,CategoryName from mstrcategory');

        $this->data['rights']= $this->getUserRights();
        return redirect('/admin/category')->with ('message',' Deleted Successfully');
    }   
}