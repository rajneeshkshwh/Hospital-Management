<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BlogController extends Controller
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

        $this->data['blog_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description,A.Photo  from blog AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
          $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName  from mstrcategory AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
    
        $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_blog',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
        
        $this->data['blog_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description,A.Photo  from blog AS A where A.BranchCode = ?',[Session::get('BranchCode')]);

          $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName  from mstrcategory AS A where A.BranchCode = ?',[Session::get('BranchCode')]);

        $this->data['rights']= $this->getUserRights();
      
        return view('admin.master.add_blog',$this->data);
    }


   

    //Add product data
    public function insert(Request $request)
    {
        
        try {
            
            $CategoryName = $request->CategoryName;
            $Title = $request->Title;
            $Description = $request->Description;
            $Date = $request->Date;
           
            $Status = $request->has('Status') ?'Y' : 'N';
            $file = $request->file('Photo');

            if($file!=''){
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $Photo ='assets/uploads/blog/'.$name;
            $request->file('Photo')->move("assets/uploads/blog/", $name);
            }else{
            $Photo ='assets/uploads/blog/product-unknow.jpg';
           
            }

          

             DB::insert('insert into blog ( CategoryName, Title, Description,Photo, Date, Status, BranchCode,CreatedBy,CreateDate) values(?,?,?,?,?,?,?,?,?)', [ $CategoryName, $Title, $Description,$Photo, $Date, $Status, Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s')]);
            

            $this->data['rights']= $this->getUserRights();

            return redirect()->back()->with('message','blog Added Successfully');

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
            $Date = $request->Date;
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
            $Photo ='assets/uploads/blog/'.$name;
            $request->file('Photo')->move("assets/uploads/blog/", $name);
            }else{
              if($prev_photo!=''){
                     $Photo = $prev_photo;
            }else{
            $Photo ='assets/uploads/blog/product-unknow.jpg';
            //$request->file('Photo')->move("assets/uploads/", $name);
                }
            }
        
          
          DB::table('blog')
              ->where('UniqueId', $UniqueId)
              ->update(['CategoryName' => $CategoryName, 'Title' => $Title,'Photo' => $Photo,'Description' => $Description, 'Date' => $Date,'Status' => $Status,'BranchCode' => Session::get('BranchCode'),'UpdatedBy' =>Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s')]);
                $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName  from mstrcategory AS A where A.BranchCode = ?',[Session::get('BranchCode')]);   
          $this->data['rights']= $this->getUserRights();
          return redirect('/admin/blog')->with ('message',' Updated Successfully ');
        }

       $this->data['edit'] = TRUE;
         $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName  from mstrcategory AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
         $this->data['blog_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description,A.Photo  from blog AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['c'] = DB::select('select * from blog where UniqueId = ?',[$UniqueId]);

        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_blog',$this->data);
    }

    public function delete($UniqueId){
        $data = DB::select('select Photo from blog where UniqueId= ?',[$UniqueId]);
        //echo $data[0]->Photo;
        $old_image = $data[0]->Photo;
                      if (file_exists($old_image)) {
                         @unlink($old_image);
                      }
        DB::delete('delete from blog where  UniqueId= ?',[$UniqueId]);
         $this->data['blog_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.Description,A.Photo  from blog AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
           $this->data['menu_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName  from mstrcategory AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();
        
        return redirect('/admin/blog')->with ('message',' Deleted Successfully');
    }
}