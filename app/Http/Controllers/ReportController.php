<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;
class ReportController extends Controller
{
       public function getUserRights()
    {
       $html =  DB::table('userrights')->where([['User', Session::get('id')]])->get();
       return $html;
    }
    
    /******************Customer Report******************/
    public function index()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }

        $this->data['add'] = TRUE;

        $this->data['customer_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CustomerName,A.MobileNo,A.EmailId  from mstrcustomer AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();
        return view('admin.report.customer',$this->data);
    }

    public function customerreport(Request $request)
    {
         $this->data['customer_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CustomerName,A.MobileNo,A.EmailId  from mstrcustomer AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        
        $Query='';
        $branch=Session::get('BranchCode');
        $FDate=$request->FromDate;
        $TDate=$request->ToDate;
        $CustomerName=$request->CustomerName;
      
        if($request->FDate != "" && $request->TDate != "")
        {
              $Query.=" WHERE A.BranchCode ='$branch'";
            $Query.= " AND  STR_TO_DATE(A.Date, '%Y-%m-%d') BETWEEN '$FDate' AND '$TDate' ";
        }
        if($request->CustomerName != "")
        {
             $Query.=" WHERE A.BranchCode ='$branch'";
            $Query.=" AND A.UniqueId='$CustomerName'";
        }
        $this->data['customer_list_search'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CustomerName,A.MobileNo,A.EmailId from mstrcustomer AS A ' .$Query);

        $this->data['list'] = TRUE;
        $this->data['FromDate'] = $request->FromDate;
        $this->data['ToDate'] = $request->ToDate;
        $this->data['rights']= $this->getUserRights();
        return view('admin.report.customer',$this->data);
    }

    /******************Supplier Report******************/
     public function supplierindex()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }

        $this->data['add'] = TRUE;

        $this->data['supplier_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.SupplierName,A.MobileNo,A.EmailId  from mstrsupplier AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();
        return view('admin.report.supplier',$this->data);
    }

    public function supplierreport(Request $request)
    {
          $this->data['supplier_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.SupplierName,A.MobileNo,A.EmailId  from mstrsupplier AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        
        $Query='';
        $branch=Session::get('BranchCode');
        $FDate=$request->FromDate;
        $TDate=$request->ToDate;
        $SupplierName=$request->SupplierName;
       
        if($request->FDate != "" && $request->TDate != "")
        {
             $Query.=" WHERE A.BranchCode ='$branch'";
            $Query.= " AND A.Date BETWEEN '$FDate' AND '$TDate' ";
        }
        if($request->SupplierName != "")
        {
             $Query.=" WHERE A.BranchCode ='$branch'";
            $Query.="AND A.UniqueId='$SupplierName'";
        }
        $this->data['supplier_list_search'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.SupplierName,A.MobileNo,A.EmailId from mstrsupplier AS A' .$Query);

         $this->data['list'] = TRUE;
         $this->data['FromDate'] = $request->FromDate;
        $this->data['ToDate'] = $request->ToDate;
        $this->data['rights']= $this->getUserRights();
        return view('admin.report.supplier',$this->data);
    }

    /******************Employee Report******************/
    public function employeeindex()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }

        $this->data['add'] = TRUE;

        $this->data['employee_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.EmpName,A.MobileNo,A.EmailId  from mstremployee AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['rights']= $this->getUserRights();
        return view('admin.report.employee',$this->data);
    }

       public function employeereport(Request $request)
    {
         $this->data['employee_list'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.EmpName,A.MobileNo,A.EmailId  from mstremployee AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        
        $Query='';
        $branch=Session::get('BranchCode');
        $FDate=$request->FromDate;
        $TDate=$request->ToDate;
        $EmployeeName=$request->EmployeeName;
       
        if($request->FDate != "" && $request->TDate != "")
        {
             $Query.=" WHERE A.BranchCode ='$branch'";
            $Query.= " AND A.Date BETWEEN '$FDate' AND '$TDate' ";
        }
        if($request->EmployeeName != "")
        {
             $Query.=" WHERE A.BranchCode ='$branch'";
            $Query.="AND A.UniqueId='$EmployeeName'";
        }
        $this->data['employee_list_search'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.EmpName,A.MobileNo,A.EmailId from mstremployee AS A' .$Query);

         $this->data['list'] = TRUE;
        $this->data['FromDate'] = $request->FromDate;
        $this->data['ToDate'] = $request->ToDate;
        $this->data['rights']= $this->getUserRights();
        return view('admin.report.employee',$this->data);
    }

     /******************Sms Report******************/
    public function smsindex()
    {
        if(Session::has('Username')){

        }else{
            return redirect('')->with('flash_message_error','Please Login First');
        }

        $this->data['add'] = TRUE;

        $this->data['sms_list'] = DB::select('select A.Grouptype,A.ProviderName,A.Category,A.SmsType,A.Message  from sms AS A where A.BranchCode = ?',[Session::get('BranchCode')]);
        $this->data['provider_list'] = DB::select('select * from api where status="Y"');
        $this->data['rights']= $this->getUserRights();
        return view('admin.report.sms',$this->data);
    }

       public function smsreport(Request $request)
    {
        
        
        $Query='';
        $branch=Session::get('BranchCode');
        $FDate=$request->FromDate;
        $TDate=$request->ToDate;
        $ProviderName=$request->ProviderName;
        $Category=$request->Category;
        $Query.=" WHERE A.BranchCode ='$branch'";
        if($request->FDate != "" && $request->TDate != "")
        {
            $Query.= " AND A.CreateDate BETWEEN '$FDate' AND '$TDate' ";
        }
        if($request->GatewayType != "")
        {
            $Query.="AND A.ProviderName='$ProviderName'";
        }
        if($request->Category != "")
        {
            $Query.="AND A.Category='$Category'";
        }
        $this->data['sms_list_search'] = DB::select('select A.ProviderName,A.Category,A.SmsType,A.Message from sms AS A' .$Query);

         $this->data['list'] = TRUE;

         $this->data['provider_list'] = DB::select('select * from api where status="Y"');

         $this->data['rights']= $this->getUserRights();
        return view('admin.report.sms',$this->data);
    }
}