<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AdvertController extends Controller
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

        $this->data['advert_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description,A.Link  from advert AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        
    
        $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_advert',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
        
        $this->data['advert_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description,A.Link  from advert AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_advert',$this->data);
    }


   

    //Add product data
    public function insert(Request $request)
    {
        
        try {
            $Title = $request->Title;
            $Description = $request->Description;
           
            $Status = $request->has('Status') ?'Y' : 'N';
            $file = $request->file('Link');

            if($file!=''){
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $Link ='assets/uploads/advert/'.$name;
            $request->file('Link')->move("assets/uploads/advert/", $name);
            }else{
            $Link ='assets/uploads/advert/product-unknow.jpg';
           
            }

             DB::insert('insert into advert ( Title, Description,Link, Status, BranchCode,CreatedBy,CreateDate) values(?,?,?,?,?,?,?)', [$Title, $Description,$Link, $Status, Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s')]);
            

            $this->data['rights']= $this->getUserRights();

            return redirect()->back()->with('message','advert Added Successfully');

           // echo "ok";
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {

           // echo $e;

           }
      
    }

    public function edit(Request $request,$UniqueId)
    {
      if($_POST){
            $Title = $request->Title;
            $Description = $request->Description;
            $prev_Link = $request->prev_Link;
            $Status = $request->has('Status') ?'Y' : 'N';
            $file = $request->file('Link');
            if($file!=''){
                $old_image = $prev_Link;
                      if (file_exists($old_image)) {
                         @unlink($old_image);
                      }
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();

            # save to DB
            //$tickes = Users::create(['imagePath' => 'storage/'.$name]);
            $Link ='assets/uploads/advert/'.$name;
            $request->file('Link')->move("assets/uploads/advert/", $name);
            }else{
              if($prev_Link!=''){
                     $Link = $prev_Link;
            }else{
            $Link ='assets/uploads/advert/product-unknow.jpg';
            //$request->file('Link')->move("assets/uploads/", $name);
                }
            }
        
          
          DB::table('advert')
              ->where('UniqueId', $UniqueId)
              ->update(['Title' => $Title,'Link' => $Link,'Description' => $Description,'Status' => $Status,'BranchCode' => Session::get('BranchCode'),'UpdatedBy' =>Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s')]);   
          $this->data['rights']= $this->getUserRights();
          return redirect('/admin/advert')->with ('message',' Updated Successfully ');
        }

       $this->data['edit'] = TRUE;

         $this->data['advert_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description,A.Link  from advert AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['c'] = DB::select('select * from advert where UniqueId = ?',[$UniqueId]);

        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_advert',$this->data);
    }

    public function delete($UniqueId){
        $data = DB::select('select Link from advert where UniqueId= ?',[$UniqueId]);
        //echo $data[0]->Link;
        $old_image = $data[0]->Link;
                      if (file_exists($old_image)) {
                         @unlink($old_image);
                      }
        DB::delete('delete from advert where  UniqueId= ?',[$UniqueId]);
         $this->data['advert_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description,A.Link  from advert AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();
        
        return redirect('/admin/advert')->with ('message',' Deleted Successfully');
    }
}