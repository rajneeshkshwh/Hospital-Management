<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ClientsController extends Controller
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

        $this->data['clients_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Name,A.Photo  from clients AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        
    
        $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_clients',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
        
        $this->data['clients_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Name,A.Photo  from clients AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_clients',$this->data);
    }


   

    //Add product data
    public function insert(Request $request)
    {
        
        try {
            $Name = $request->Name;
            $Description = $request->Description;
           
            $Status = $request->has('Status') ?'Y' : 'N';
            $file = $request->file('Photo');

            if($file!=''){
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $Photo ='assets/uploads/clients/'.$name;
            $request->file('Photo')->move("assets/uploads/clients/", $name);
            }else{
            $Photo ='assets/uploads/clients/product-unknow.jpg';
           
            }

             DB::insert('insert into clients ( Name, Photo, Status, BranchCode,CreatedBy,CreateDate) values(?,?,?,?,?,?,?)', [$Name, $Photo, $Status, Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s')]);
            

            $this->data['rights']= $this->getUserRights();

            return redirect()->back()->with('message','clients Added Successfully');

           // echo "ok";
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {

           // echo $e;

           }
      
    }

    public function edit(Request $request,$UniqueId)
    {
      if($_POST){
            $Name = $request->Name;
            $Description = $request->Description;
            $prev_photo = $request->prev_photo;
            $Status = $request->has('Status') ?'Y' : 'N';
            $file = $request->file('Photo');
            if($file!=''){
                $old_image = $prev_photo;
                      if (file_exists($old_image)) {
                         @unlink($old_image);
                      }
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();

            # save to DB
            //$tickes = Users::create(['imagePath' => 'storage/'.$name]);
            $Photo ='assets/uploads/clients/'.$name;
            $request->file('Photo')->move("assets/uploads/clients/", $name);
            }else{
              if($prev_photo!=''){
                     $Photo = $prev_photo;
            }else{
            $Photo ='assets/uploads/clients/product-unknow.jpg';
            //$request->file('Photo')->move("assets/uploads/", $name);
                }
            }
        
          
          DB::table('clients')
              ->where('UniqueId', $UniqueId)
              ->update(['Name' => $Name,'Photo' => $Photo, 'Status' => $Status,'BranchCode' => Session::get('BranchCode'),'UpdatedBy' =>Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s')]);   
          $this->data['rights']= $this->getUserRights();
          return redirect('/admin/clients')->with ('message',' Updated Successfully ');
        }

       $this->data['edit'] = TRUE;

         $this->data['clients_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId, A.Name, A.Photo  from clients AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['c'] = DB::select('select * from clients where UniqueId = ?',[$UniqueId]);

        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_clients',$this->data);
    }

    public function delete($UniqueId){
        $data = DB::select('select Photo from clients where UniqueId= ?',[$UniqueId]);
        //echo $data[0]->Photo;
        $old_image = $data[0]->Photo;
                      if (file_exists($old_image)) {
                         @unlink($old_image);
                      }
        DB::delete('delete from clients where  UniqueId= ?',[$UniqueId]);
         $this->data['clients_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Name,A.Photo  from clients AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();
        
        return redirect('/admin/clients')->with ('message',' Deleted Successfully');
    }
}