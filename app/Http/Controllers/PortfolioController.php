<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PortfolioController extends Controller
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

        $this->data['portfolio_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type,A.Name,A.Photo  from portfolio AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName  from mstrcategory AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        
    
        $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_portfolio',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
        
        $this->data['portfolio_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type,A.Name,A.Photo  from portfolio AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();
        $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName  from mstrcategory AS A where A.BranchCode = ?',[Session::get('BranchCode')]);

        return view('admin.master.add_portfolio',$this->data);
    }


   

    //Add product data
    public function insert(Request $request)
    {
        
        try {
           
            $Type = $request->Type;
            $Name = $request->Name;
           $file = $request->file('Photo');
         
           
            $Status = $request->has('Status') ?'Y' : 'N';
            if($file!=''){
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $Photo ='assets/uploads/portfolio/'.$name;
            $request->file('Photo')->move("assets/uploads/portfolio/", $name);
            }else{
            $Photo ='assets/uploads/portfolio/product-unknow.jpg';
           
            }

             DB::insert('insert into portfolio (Type,  Name, Photo, Status, BranchCode,CreatedBy,CreateDate) values(?,?,?,?,?,?,?)', [$Type, $Name, $Photo, $Status, Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s')]);
            

            $this->data['rights']= $this->getUserRights();

            return redirect()->back()->with('message','portfolio Added Successfully');

           // echo "ok";
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {

           // echo $e;

           }
      
    }

    public function edit(Request $request,$UniqueId)
    {
      if($_POST){
             $Type = $request->Type;
            $Name = $request->Name;
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
            $Photo ='assets/uploads/portfolio/'.$name;
            $request->file('Photo')->move("assets/uploads/portfolio/", $name);
            }else{
              if($prev_photo!=''){
                     $Photo = $prev_photo;
            }else{
            $Photo ='assets/uploads/portfolio/product-unknow.jpg';
            //$request->file('Photo')->move("assets/uploads/", $name);
                }
            }
          DB::table('portfolio')
              ->where('UniqueId', $UniqueId)
              ->update(['Type' => $Type, 'Name' => $Name, 'Photo' => $Photo, 'Status' => $Status,'BranchCode' => Session::get('BranchCode'),'UpdatedBy' =>Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s')]);   
          $this->data['rights']= $this->getUserRights();
          return redirect('/admin/portfolio')->with ('message',' Updated Successfully ');
        }

       $this->data['edit'] = TRUE;

         $this->data['portfolio_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type,A.Name,A.Photo  from portfolio AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['c'] = DB::select('select * from portfolio where UniqueId = ?',[$UniqueId]);
        $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName  from mstrcategory AS A where A.BranchCode = ?',[Session::get('BranchCode')]);

        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_portfolio',$this->data);
    }

    public function delete($UniqueId){
        
        DB::delete('delete from portfolio where  UniqueId= ?',[$UniqueId]);
         $this->data['portfolio_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Type,A.Name,A.Photo  from portfolio AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
         $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName  from mstrcategory AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();

        
        return redirect('/admin/portfolio')->with ('message',' Deleted Successfully');
    }
}