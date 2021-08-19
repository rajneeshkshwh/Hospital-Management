<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ProductController extends Controller
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

        $this->data['product_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,B.CategoryName,A.ProductName,A.Description,A.Photo  from mstrproduct AS A LEFT JOIN mstrcategory AS B ON A.CategoryCode=B.UniqueId  where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['category_list'] = DB::select('select * from mstrcategory where status="Y"');
    
        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_product',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
        
        $this->data['product_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,B.CategoryName,A.ProductName,A.Description,A.Photo  from mstrproduct AS A LEFT JOIN mstrcategory AS B ON A.CategoryCode=B.UniqueId  where A.BranchCode = ?',[Session::get('BranchCode')]);
         $this->data['category_list'] = DB::select('select * from mstrcategory where status="Y"');

        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_product',$this->data);
    }


   

    //Add product data
    public function insert(Request $request)
    {
        
        try {
            $CategoryName = $request->CategoryName;
            $ProductCode = $request->ProductCode;
            $ProductName = $request->ProductName;
            $Description = $request->Description;
           // $Photo = $request->Photo;
           
            $Status = $request->has('Status') ?'Y' : 'N';
            $file = $request->file('Photo');

            if($file!=''){
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $Photo ='assets/uploads/'.$name;
            $request->file('Photo')->move("assets/uploads/", $name);
            }else{
            $Photo ='assets/uploads/product-unknow.jpg';
           
            }

             DB::insert('insert into mstrproduct ( CategoryCode, ProductCode,ProductName,Description,Photo, Status, BranchCode,CreatedBy,CreateDate) values(?,?,?,?,?,?,?,?,?)', [$CategoryName, $ProductCode,$ProductName,$Description,$Photo, $Status, Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s')]);
            

            $this->data['rights']= $this->getUserRights();

            return redirect()->back()->with('message','Product Added Successfully');

           // echo "ok";
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {

           // echo $e;

           }
      
    }

    public function edit(Request $request,$UniqueId)
    {
      if($_POST){
            $CategoryName = $request->CategoryName;
            $ProductCode = $request->ProductCode;
            $ProductName = $request->ProductName;
            $Description = $request->Description;
            $prev_photo = $request->prev_photo;
           // $Photo = $request->Photo;
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
            $Photo ='assets/uploads/'.$name;
            $request->file('Photo')->move("assets/uploads/", $name);
            }else{
              if($prev_photo!=''){
                     $Photo = $prev_photo;
            }else{
            $Photo ='assets/uploads/product-unknow.jpg';
            //$request->file('Photo')->move("assets/uploads/", $name);
                }
            }
        
          
          DB::table('mstrproduct')
              ->where('UniqueId', $UniqueId)
              ->update(['CategoryCode' => $CategoryName,'ProductCode' => $ProductCode,'ProductName' => $ProductName,'Photo' => $Photo,'Description' => $Description,'Status' => $Status,'BranchCode' => Session::get('BranchCode'),'UpdatedBy' =>Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s')]);   
          $this->data['rights']= $this->getUserRights();
          return redirect('/admin/product')->with ('message',' Updated Successfully ');
        }

       $this->data['edit'] = TRUE;

        $this->data['product_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,B.CategoryName,A.ProductName,A.Description,A.Photo  from mstrproduct AS A LEFT JOIN mstrcategory AS B ON A.CategoryCode=B.UniqueId  where A.BranchCode = ?',[Session::get('BranchCode')]);
         $this->data['category_list'] = DB::select('select * from mstrcategory where status="Y"');
        $this->data['c'] = DB::select('select * from mstrproduct where UniqueId = ?',[$UniqueId]);

        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_product',$this->data);
    }

    public function delete($UniqueId){
        $data = DB::select('select Photo from mstrproduct where UniqueId= ?',[$UniqueId]);
        //echo $data[0]->Photo;
        $old_image = $data[0]->Photo;
                      if (file_exists($old_image)) {
                         @unlink($old_image);
                      }
        DB::delete('delete from mstrproduct where  UniqueId= ?',[$UniqueId]);
         $this->data['product_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,B.CategoryName,A.ProductName,A.Description,A.Photo  from mstrproduct AS A LEFT JOIN mstrcategory AS B ON A.CategoryCode=B.UniqueId  where A.BranchCode = ?',[Session::get('BranchCode')]);
         $this->data['category_list'] = DB::select('select * from mstrcategory where status="Y"');
        $this->data['rights']= $this->getUserRights();
        
        return redirect('/admin/product')->with ('message',' Deleted Successfully');
    }
}