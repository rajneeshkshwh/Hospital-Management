<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
// use App\Mail\SendMailable;
class MailController extends Controller 
{
   public function sendder(Request $request)
   {
      $this->validate($request, [
        'name' => 'required',
        'dname' => 'required',
        'subject' => 'required',
        'date' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'message' => 'required',
       
        ]);

         try{
             $data = array(
                 'name' => $request->name,
                 'dname' => $request->dname,
                 'subject' => $request->subject,
                 'date' => $request->date,
                 'email' => $request->email,
                 'phone' => $request->phone,
                 'bodymessage' => $request->message
             );

        
             Mail::send('website.appoint', $data, function ($message)  use($data){

                 $message->from($data['email'], $data['name']);

                 $message->to('guna1081994@gmail.com')->subject($data['bodymessage']);
             
             });
          

           $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo,A.serving,A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');

            $this->data['product_category'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');

            $this->data['products'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,B.CategoryName,A.CategoryCode,A.ProductCode,A.ProductName,A.Photo,A.Description from mstrproduct AS A LEFT JOIN mstrcategory AS B ON A.CategoryCode = B.UniqueId');

            return redirect()->back()->with('message','Your Appointment has been sent successfully...! ');
          
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                     echo $e;
            }
   }
   
   
    public function send(Request $request){
         
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'subject' => 'required',
        'message' => 'required',

       
        ]);

         try{
             $data = array(
                 'name' => $request->name,
                 'email' => $request->email,				
                 'bodymessage' => $request->message
             );

           

             Mail::send('website.test', $data, function ($message)  use($data){

                 $message->from($data['email'], $data['name']);

                 $message->to('ppprasanth680@gmail.com')->subject($data['bodymessage']);
             
             });
          
           
             $this->data['website_setting'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.WebSiteName,A.ContactPersonName,A.ContactNo,A.serving,A.MailID,A.Address,A.Logo,A.FaceBookUrl,A.InstagramUrl,A.TwitterUrl,A.GooglePlusUrl  from websitesetting AS A ');

            $this->data['product_category'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,A.CategoryName from mstrcategory AS A ');

            $this->data['products'] = DB::select('select (CASE WHEN A.Status="Y" THEN "Active" ELSE "In-Active" END) AS "sts",A.UniqueId,B.CategoryName,A.CategoryCode,A.ProductCode,A.ProductName,A.Photo,A.Description from mstrproduct AS A LEFT JOIN mstrcategory AS B ON A.CategoryCode = B.UniqueId');

           // return view('website.index',$this->data)->with('message',' Your email has been sent successfully '); 
            return redirect()->back()->with('message','Your Message has been sent successfully ');
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                     echo $e;

            }    

   }

  public function subscribesend(Request $request){
         
      $this->validate($request, [
       
        'email' => 'required|email'
       
        ]);

         try{
             $data = array(
                
                 'email' => $request->email
              
             );

             // echo $data['name'];
             // echo $data['email'];

             Mail::send('website.subscribe', $data, function ($message)  use($data){

                 $message->from($data['email'], 'RBJ');
                 $message->to('ppprasanth680gmail.com')->subject('New subscriber ');
             
             });
          
             

           // return view('website.index',$this->data)->with('message',' Your email has been sent successfully '); 
            return redirect()->back()->with('message','Your email subscriber has been sent successfully ');
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                     echo $e;

            }

   }
  public function feedbacksend(Request $request){
         
      $this->validate($request, [
       
        'username' => 'required',
        'productname' => 'required',
        'email' => 'required|email',
        'feedback' => 'required'
       
        ]);

         try{
             $data = array(
                
                 'name' => $request->username,
                 'productname' => $request->productname,
                 'email' => $request->email,
                 'feedback' => $request->feedback
              
             );

              // echo $data['name'];
              // echo $data['email'];
              // echo $data['productname'];
              // echo $data['feedback'];

             Mail::send('website.feedback', $data, function ($message)  use($data){

                 $message->from($data['email'], $data['name']);
                 $message->to('sabarigiri1704@gmail.com')->subject($data['feedback']);
             
             });
          
             

           // return view('website.index',$this->data)->with('message',' Your email has been sent successfully '); 
            return redirect()->back()->with('message','Your Feedback has been sent successfully ');
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                     echo $e;

            }

   }
   // public function basic_email(){
   //    $data = array('name'=>"Virat Gandhi");

   //    //echo "ok"; die();
   
   //    Mail::send(['text'=>'mail'], $data, function($message) {
   //       $message->to('sabarigiri1704@gmail.com', 'Tutorials Point')->subject
   //          ('Laravel Basic Testing Mail');
   //       $message->from('sabarigiri1704@gmail.com','Sabari');
   //    });
   //    echo "Basic Email Sent. Check your inbox.";
   // //    $name = 'Krunal';
   // // Mail::to('sabarigiri1704@gmail.com')->send(new SendMailable($name));
   
   // // return 'Email was sent';
   // }
   // public function html_email(){
   //    $data = array('name'=>"Virat Gandhi");
   //    Mail::send('mail', $data, function($message) {
   //       $message->to('abc@gmail.com', 'Tutorials Point')->subject
   //          ('Laravel HTML Testing Mail');
   //       $message->from('xyz@gmail.com','Virat Gandhi');
   //    });
   //    echo "HTML Email Sent. Check your inbox.";
   // }
   // public function attachment_email(){
   //    $data = array('name'=>"Virat Gandhi");
   //    Mail::send('mail', $data, function($message) {
   //       $message->to('abc@gmail.com', 'Tutorials Point')->subject
   //          ('Laravel Testing Mail with Attachment');
   //       $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
   //       $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
   //       $message->from('xyz@gmail.com','Virat Gandhi');
   //    });
   //    echo "Email Sent with attachment. Check your inbox.";
   // }
}
