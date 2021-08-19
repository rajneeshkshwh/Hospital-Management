<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class NewsController extends Controller
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

        $this->data['news_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.NewsType,A.Description,A.Photo  from news AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        
    
        $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_news',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
        
         $this->data['news_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.NewsType,A.Description,A.Photo  from news AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_news',$this->data);
    }


   

    //Add product data
    public function insert(Request $request)
    {
        
        try {
            $NewsType = $request->NewsType;
            $Title = $request->Title;
            $Date = $request->Date;
            $Description = $request->Description;
           
            $Status = $request->has('Status') ?'Y' : 'N';
            $file = $request->file('Photo');

            if($file!=''){
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $Photo ='assets/uploads/news/'.$name;
            $request->file('Photo')->move("assets/uploads/news/", $name);
            }else{
            $Photo ='assets/uploads/news/product-unknow.jpg';
           
            }

             $file = $request->file('PDF');
             if($file!=''){
             $uniqueFileName ='assets/uploads/Whitepapers/'. uniqid() . $file->getClientOriginalName();
             $exten =  $file->getClientOriginalExtension();

             $request->file('PDF')->move("assets/uploads/Whitepapers/", $uniqueFileName);
             }else{
              $uniqueFileName = '';
             }
             DB::insert('insert into news (NewsType, Title, Date, Description,Photo, Status, PDF, BranchCode,CreatedBy,CreateDate) values(?,?,?,?,?,?,?,?,?,?)', [$NewsType, $Title, $Date, $Description, $Photo, $Status, $uniqueFileName,  Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s')]);
            

            $this->data['rights']= $this->getUserRights();

            return redirect()->back()->with('message','news Added Successfully');

           // echo "ok";
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {

           // echo $e;

           }
      
    }

    public function edit(Request $request,$UniqueId)
    {
      if($_POST){
            $NewsType = $request->NewsType;
            $Title = $request->Title;
            $Date = $request->Date;
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
            $Photo ='assets/uploads/news/'.$name;
            $request->file('Photo')->move("assets/uploads/news/", $name);
            }else{
              if($prev_photo!=''){
                     $Photo = $prev_photo;
            }else{
            $Photo ='assets/uploads/news/product-unknow.jpg';
            //$request->file('Photo')->move("assets/uploads/", $name);
                }
            }
             $prev_file = $request->prev_file;
             $file = $request->file('PDF');
             if($file!=''){
                $old_file = $prev_file;
                      if (file_exists($old_file)) {
                         @unlink($old_file);
                      }
             $uniqueFileName ='assets/uploads/Whitepapers/'. uniqid() . $file->getClientOriginalName();
             $exten =  $file->getClientOriginalExtension();

             $request->file('PDF')->move("assets/uploads/Whitepapers/", $uniqueFileName);
             }else{
              $uniqueFileName = '';
             }
        
          
          DB::table('news')
              ->where('UniqueId', $UniqueId)
              ->update(['Title' => $Title,'Photo' => $Photo,'NewsType' => $NewsType,'Date' => $Date, 'PDF' => $uniqueFileName, 'Description' => $Description,'Status' => $Status,'BranchCode' => Session::get('BranchCode'),'UpdatedBy' =>Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s')]);   
          $this->data['rights']= $this->getUserRights();
          return redirect('/admin/news')->with ('message',' Updated Successfully ');
        }

       $this->data['edit'] = TRUE;

          $this->data['news_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.NewsType,A.Description,A.Photo  from news AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['c'] = DB::select('select * from news where UniqueId = ?',[$UniqueId]);

        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_news',$this->data);
    }

    public function delete($UniqueId){
        $data = DB::select('select Photo from news where UniqueId= ?',[$UniqueId]);
        //echo $data[0]->Photo;
        $old_image = $data[0]->Photo;
                      if (file_exists($old_image)) {
                         @unlink($old_image);
                      }
        DB::delete('delete from news where  UniqueId= ?',[$UniqueId]);
         $this->data['banner_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.Title,A.NewsType,A.Description,A.Photo  from news AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();
        
        return redirect('/admin/news')->with ('message',' Deleted Successfully');
    }
}