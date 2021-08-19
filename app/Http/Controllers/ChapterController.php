<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ChapterController extends Controller
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

        $this->data['chapter_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId, B.district_name, A.DistrictName,A.ChapterName,A.Leadership,A.Contact  from chapter AS A LEFT JOIN districts AS B ON B.id = A.DistrictName where A.BranchCode = ?',[Session::get('BranchCode')]);

        $this->data['district_list'] = DB::select('select * from districts');
      //  $this->data['district_list'] = DB::table('districts')->get();
    
        $this->data['rights']= $this->getUserRights();
        return view('admin.master.add_chapter',$this->data);
    }

    public function addnew()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }
        $this->data['add'] = TRUE;
        
         $this->data['chapter_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.DistrictName,A.ChapterName,A.Leadership,A.Contact  from chapter AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
         $this->data['district_list'] = DB::select('select * from districts');
        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_chapter',$this->data);
    }


   

    //Add product data
    public function insert(Request $request)
    {
        
        try {
            $ChapterName = $request->ChapterName;
            $Leadership = $request->Leadership;
            $Contact = $request->Contact;
            $DistrictName = $request->DistrictName;
            $Date = $request->Date;
            
            $Status = $request->has('Status') ?'Y' : 'N';
          
             DB::insert('insert into chapter (ChapterName, DistrictName, Date,  Leadership, Contact, Status,  BranchCode,CreatedBy,CreateDate) values(?,?,?,?,?,?,?,?,?)', [$ChapterName, $DistrictName, $Date, $Leadership, $Contact, $Status, Session::get('BranchCode'),Session::get('Username'),date('Y-m-d H:i:s')]);
            

            $this->data['rights']= $this->getUserRights();

            return redirect()->back()->with('message','chapter Added Successfully');

           // echo "ok";
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {

           // echo $e;

           }
      
    }

    public function edit(Request $request,$UniqueId)
    {
      if($_POST){
            $ChapterName = $request->ChapterName;
             $Leadership = $request->Leadership;
            $Contact = $request->Contact;
            $DistrictName = $request->DistrictName;
            $Date = $request->Date;
            
            $Status = $request->has('Status') ?'Y' : 'N';
           
        
          
          DB::table('chapter')
              ->where('UniqueId', $UniqueId)
              ->update(['DistrictName' => $DistrictName,'Leadership' => $Leadership,'Contact' => $Contact,'ChapterName' => $ChapterName,'Date' => $Date, 'Status' => $Status,'BranchCode' => Session::get('BranchCode'),'UpdatedBy' =>Session::get('Username'),'UpdateDate' =>date('Y-m-d H:i:s')]);   
          $this->data['rights']= $this->getUserRights();
          return redirect('/admin/chapter')->with ('message',' Updated Successfully ');
        }

       $this->data['edit'] = TRUE;

          $this->data['chapter_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.DistrictName,A.ChapterName,A.Leadership,A.Contact  from chapter AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
           $this->data['district_list'] = DB::select('select * from districts');
        $this->data['c'] = DB::select('select * from chapter where UniqueId = ?',[$UniqueId]);

        $this->data['rights']= $this->getUserRights();

        return view('admin.master.add_chapter',$this->data);
    }

    public function delete($UniqueId){
        $data = DB::select('select Photo from chapter where UniqueId= ?',[$UniqueId]);
        //echo $data[0]->Photo;
        $old_image = $data[0]->Photo;
                      if (file_exists($old_image)) {
                         @unlink($old_image);
                      }
        DB::delete('delete from chapter where  UniqueId= ?',[$UniqueId]);
         $this->data['banner_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.DistrictName,A.ChapterName,A.Leadership,A.Contact  from chapter AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
          $this->data['district_list'] = DB::select('select * from districts');
        $this->data['rights']= $this->getUserRights();
        
        return redirect('/admin/chapter')->with ('message',' Deleted Successfully');
    }
}