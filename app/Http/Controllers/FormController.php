<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon;
use File;
use DB;

class FormController extends Controller
{
    public function index()
    {
        
        if(!isset($_GET['reg_no'])){
            $std_data=  new \App\Student;
            $readOnly = 0; 
            $payment=0;
            $level="Membership";
           
            $allunpaid= new \App\Session();
        //     $allunpaid = \App\Session::select('*','sessions.id as id', 'subjects.id as subid', 'class_types.id as classtypeid')
        // ->join('subjects','subjects.id','=','sessions.subject')
        // ->join('class_types','class_types.id','=','sessions.class_type')
        // ->where('sessions.level',$level)->get();
           // dd($readOnly);
           // return view('form', compact('std_data','readOnly','courses','payment','level','allunpaid'));
         //   abort(404);
        }else{

        $regNo = $_GET['reg_no'];
        $level = '';
        if (strpos($regNo, 'FN00') === 0 ) {
            $level="CAP III";
        }else if (strpos($regNo, 'KI00') === 0 ) {
            $level="CAP II";
        }else if (strpos($regNo, 'KF00') === 0 ) {
            $level="CAP I";
        }

        $std_data = \App\Student::where("reg_no",$regNo)
        ->first();
       
        if(empty($std_data))
        abort(404);
            $readOnly = 1; 
            $payment=0;
            
        //      $allunpaid = \App\Session::select('*','sessions.id as id', 'subjects.id as subid', 'class_types.id as classtypeid')
        // ->join('students_enroll','sessions.id','=','students_enroll.session_id')
        // ->leftjoin('subjects','subjects.id','=','sessions.subject')
        // ->join('class_types','class_types.id','=','sessions.class_type')
        // ->where("students_enroll.paid_status",0)
        // ->where("students_enroll.completed_process",0)
        // ->where("students_enroll.student_id",$std_data->id)
        // ->get();
        
        
       
        
        }
             $allunpaid = \App\Session::select('*','sessions.id as id', 'subjects.id as subid', 'class_types.id as classtypeid')
          
        ->join('subjects','subjects.id','=','sessions.subject')
        ->join('class_types','class_types.id','=','sessions.class_type')
         
        ->where('sessions.level',$level)->get();
        
          $registered = \App\StudentEnroll::select('*','students_enroll.id as enrollId','sessions.id as id')
        ->join('sessions','sessions.id','=','students_enroll.session_id')
        ->join('subjects','subjects.id','=','sessions.subject')
        ->join('class_types','class_types.id','=','sessions.class_type')
        ->where("student_id",$std_data->id)
          ->where("completed_process",1)
         ->where("sch_verified",0)
        ->where("paid_status",0)->get();
        
       $allunpaid = $allunpaid->merge($registered);

       
       // array_push($allunpaid,$registered);
       
       // dd($allunpaid);
       
        $courses = \App\StudentEnroll::select('*','sessions.id as id', 'subjects.id as subid', 'class_types.id as classtypeid','students_enroll.id as enrollId')
        ->join('sessions','sessions.id','=','students_enroll.session_id')
        ->join('subjects','subjects.id','=','sessions.subject')
        ->join('class_types','class_types.id','=','sessions.class_type')
        ->where("students_enroll.student_id",$std_data->id)
        ->whereNull('sessions.deleted_at') //added for not shown
        ->where('sessions.level',$level)->get();
        //dd($courses);
        foreach($allunpaid as $unpaid){
            foreach($courses as $course)
            {
              
                if($course->id == $unpaid->id )
                {
                    $unpaid->enrollId = $course->enrollId;
                     $unpaid->paid_status = $course->paid_status;
                     $unpaid->completed_process = $course->completed_process;
                     
                }
            }
            
        }
           // dd($courses);
       
        // $courses = \App\Session::select('*','sessions.id as id', 'subjects.id as subid', 'class_types.id as classtypeid')
        // ->join('subjects','subjects.id','=','sessions.subject')
        // ->join('class_types','class_types.id','=','sessions.class_type')
        // ->where('sessions.level',$level)->get();
        
        $message="";
        return view('form', compact('std_data','readOnly','courses','payment','level','allunpaid','message'));
    
    }

    public function payment()
    {

    }

    public function generate_otp(Request $request)
    {
        $passPhone = rand(10,99);
        $passEmail = rand(10,99);
    //   $passPhone = 10;
    //   $passEmail = 20;
         
        
         if(!empty($request["regNo"])){
         $store = \App\Student::where("reg_no",$request["regNo"] )
         ->orWhere('phone', $request["phone"])
         ->first();
         $store->reg_no = $request["regNo"];
         }
         else
         $store = \App\Student::where("phone",$request["phone"])
         ->first();
        $status = 0;
        if(empty($store)){
            
         
              $store = new \App\Student;
            //   $status=1;
            //   $text = 'Please add this '.$passPhone .' with the number you received in email to use sum as the OTP ';
            //   $textEmail = 'Please add this '.$passEmail .' with the number you received in phone to use sum as the OTP ';;
          //   UtilController::sendSMS($request->phone,$text);
           //   UtilController::sendEmail($request->email,"OTP Password",$textEmail,$store->name,$store->reg_no);
        }
        if($store->is_verified==0){
             $otp = new \App\OtpPass;
         $otp->contact = $request->phone;
         $otp->email = $request->email;
         $otp->otp_phone= $passPhone;
         $otp->otp_email= $passEmail;
         $otp->save();
         
              $status=1;
              $text = $passPhone.' is your number to sum with number from email.';
              $textEmail = $passEmail.' is your number to sum with number from phone.';
             UtilController::sendSMS($request->phone,$text);
              UtilController::sendEmail($request->email,"Number for verification",$textEmail,$request["name"],$store->reg_no);
            
        }
        $store->name= $request["name"];
        $store->reg_no= $request["regNo"];
        $store->address= $request["address"];
        $store->email= $request["email"];
        $store->phone= $request["phone"];
       // $total = 0;
        $store->save();

        return response(['status' => $status]);
    }
    
     public function checkdues($regno)
    {
         $store = \App\Student::where("reg_no",$regno)
        ->first();
        
         if($store){
        $allunpaid = \App\StudentEnroll::select('*','students_enroll.id as id','sessions.id as sessid')
        ->join('sessions','sessions.id','=','students_enroll.session_id')
        ->join('subjects','subjects.id','=','sessions.subject')
        ->join('class_types','class_types.id','=','sessions.class_type')
        ->where("student_id",$store->id)
         ->where("completed_process",1)
         ->where("sch_verified",0)
        ->where("paid_status",0)->get();
        if(count($allunpaid)>0){
        
            return response(['status' => 1]);
        } else{
            return response(['status' => 0]);
        }
    }
       return response(['status' => 0]);
    }
    public function paydues($regno)
    {
        

        $regNo = $regno;
        $level = '';
        if (strpos($regNo, 'FN00') === 0 ) {
            $level="CAP III";
        }else if (strpos($regNo, 'KI00') === 0 ) {
            $level="CAP II";
        }else if (strpos($regNo, 'KF00') === 0 ) {
            $level="CAP I";
        }

        $std_data = \App\Student::where("reg_no",$regNo)
        ->first();
       
        if(empty($std_data))
        abort(404);
            $readOnly = 2; 
            $payment=1;
            
            $allunpaid = \App\StudentEnroll::select('*','students_enroll.id as enrollId','sessions.id as id')
        ->join('sessions','sessions.id','=','students_enroll.session_id')
        ->join('subjects','subjects.id','=','sessions.subject')
        ->join('class_types','class_types.id','=','sessions.class_type')
        ->where("student_id",$std_data->id)
         ->where("completed_process",1)
         ->where("sch_verified",0)
        ->where("paid_status",0)->get();
        
       
       // dd($allunpaid);
       
        $courses = \App\StudentEnroll::select('*','sessions.id as id', 'subjects.id as subid', 'class_types.id as classtypeid','students_enroll.id as enrollId')
        ->join('sessions','sessions.id','=','students_enroll.session_id')
        ->join('subjects','subjects.id','=','sessions.subject')
        ->join('class_types','class_types.id','=','sessions.class_type')
        ->where("students_enroll.student_id",$std_data->id)
        //added for not shown
        ->where('sessions.level',$level)->get();
      //  dd($courses);
        foreach($allunpaid as $unpaid){
            foreach($courses as $course)
            {
              
                if($course->id == $unpaid->id )
                {
                    $unpaid->enrollId = $course->enrollId;
                     $unpaid->paid_status = $course->paid_status;
                     $unpaid->completed_process = $course->completed_process;
                     
                }
            }
            
        }
           
        
        $message="";
        return view('form', compact('std_data','readOnly','courses','payment','level','allunpaid','message'));
        
    }
    

    public function check_otp(Request $r)
    {
        $otp = \App\OtpPass::where('contact', $r->phone)->orderBy('id', 'desc')->first();
        $total = $otp->otp_phone +  $otp->otp_email;
        
         $store = \App\Student::where("phone",$r->phone )
         ->first();
         
        if($total == $r->otp){
             $store->is_verified=1;
             $store->save();
            return response(['status' => 1]);
        } else{
            return response(['status' => 0]);
        }
    }
    
    public function saveform(Request $request)
    {
        if(!empty($request["regNo"]))
        $store = \App\Student::where("reg_no",$request["regNo"] )
        ->first();
        else
        $store = \App\Student::where("phone",$request["phone"] )
        ->first();
        if(empty($store))
              $store = new \App\Student;
        
        $store->name= $request["name"];
        $store->reg_no= $request["regNo"];
        $store->address= $request["address"];
        $store->email= $request["email"];
        $store->phone= $request["phone"];
        $total = 0;
        $store->save();

        $incomplete = \App\StudentEnroll::where("student_id",$store->id)
        ->where("paid_status",0)
        ->where("completed_process",0)->get();
       
        
        $sessions = explode(",",$request["courseids"]);
       
        foreach($incomplete as $incom){
            $deleted = true;
            foreach ($sessions as $sess){
                if($incom->session_id == $sess)
                {
                    $deleted = false;
                }

            }
            if($deleted){
                $incom->forceDelete();
            }
           
        }
     
        foreach ($sessions as $sess)
        {
            if($sess)
            {
            $session =  \App\Session::withTrashed()->find($sess);
            

            $total +=  $session->cost_per_sub;
            $stdEnroll = \App\StudentEnroll::where("student_id",$store->id)
                        ->where("session_id",$sess)
                        ->first();
                          if(empty($stdEnroll)){
                                $stdEnroll = new \App\StudentEnroll;
                          }
            
            
            $stdEnroll->reg_no = $request["regNo"];
            $stdEnroll->student_id =  $store->id;
            $stdEnroll->session_id = $sess;
            if($stdEnroll->completed_process != 1)
            $stdEnroll->completed_process = 0;
            $stdEnroll->payable_amount =$session->cost_per_sub;
            if($stdEnroll->paid_status != 1)
            $stdEnroll->paid_status =0; // paid status 0 unpaid, 1 paid 2 verified
            $stdEnroll->save();
            }
        }

        $store->total_amount= $total;
        $store->save();
         
        $allunpaid = \App\StudentEnroll::select('*','students_enroll.id as enid','sessions.id as sessid')
        ->join('sessions','sessions.id','=','students_enroll.session_id')
        ->join('subjects','subjects.id','=','sessions.subject')
        ->join('class_types','class_types.id','=','sessions.class_type')
        ->where("student_id",$store->id)
        ->where("paid_status",0)->get();
        
        
        
       // dd( $allunpaid);
        $total = 0;
        $trxnid = 0;

        $ref_id="2C_".$store->reg_no;
        if(empty($ref_id))
            $ref_id = $store->id;
            
        foreach ($allunpaid as $stdEnroll)
        {
           $stdEnroll->completed_process = 1;
           $total+=$stdEnroll->payable_amount;

           if($trxnid < (int)$stdEnroll->enid)
           {
            $trxnid= $stdEnroll->enid;
           }
           $ref_id.="-";
           $ref_id.=$stdEnroll->sessid;

        }
        $ref_id="2C_".$store->reg_no."_".$trxnid;
        
        $total= $total*100;
        $mytime = Carbon\Carbon::now();
        $trxn_dt =date_format($mytime,"d/m/Y"); 
        $string = "MERCHANTID=360,APPID=MER-360-APP-1,APPNAME=ICAN,TXNID=".$trxnid.",TXNDATE=".$trxn_dt.",TXNCRNCY=NPR,TXNAMT=".$total.",REFERENCEID=".$ref_id.",REMARKS=ican,PARTICULARS=Online Class Registration for ".$store->reg_no.",TOKEN=TOKEN";
       // dd($string);
  
         $token = FormController::token($string);
         $payment= [
             'allunpaid'=>$allunpaid,
             'token'=> $token,
             'TXNID'=> $trxnid,
             'TXNDATE'=> $trxn_dt,
             'TXNAMT'=> $total,
             'REFERENCEID'=> $ref_id,
             'pid'=> '2E_'.$store->reg_no.'_'.$trxnid,
             'PARTICULARS'=> "Online Class Registration for ".$store->reg_no,
         ];
        return $payment;


    }

    public function storewebdata(Request $request)
    {
        $store = \App\Student::where("reg_no",$request["reg_no"] )
        ->first();
       // dd($store);
        if(empty($store)){
        $store = new \App\Student;
        $store->name= $request["name"];
        $store->reg_no= $request["reg_no"];
        $store->address= $request["address"];
        $store->email= $request["email"];
        $store->phone= $request["phone"];
        $total = 0;
        $store->save();
        }
        return response(['status' => 1]);

    }
    public function loadpayment(Request $request)
    {
        if(!empty($request["regNo"]))
        $store = \App\Student::where("reg_no",$request["regNo"] )
        ->first();
        else
        $store = \App\Student::where("phone",$request["phone"] )
        ->first();

        // $allunpaid = \App\StudentEnroll::select('*','students_enroll.id as id','sessions.id as sessid')
        // ->join('sessions','sessions.id','=','students_enroll.session_id')
        // ->join('subjects','subjects.id','=','sessions.subject')
        // ->join('class_types','class_types.id','=','sessions.class_type')
        // ->where("student_id",$store->id)
        // ->where("paid_status",0)->get();
        
         $allunpaid = \App\StudentEnroll::select('*','students_enroll.id as enrollId','sessions.id as id')
        ->join('sessions','sessions.id','=','students_enroll.session_id')
        ->join('subjects','subjects.id','=','sessions.subject')
        ->join('class_types','class_types.id','=','sessions.class_type')
        ->where("student_id",$store->id)
         ->where("completed_process",1)
         ->where("sch_verified",0)
        ->where("paid_status",0)->get();

        $total =0;
        $trxnid=0;
        $ref_id=$store->reg_no;
        foreach ($allunpaid as $stdEnroll)
        {
           $stdEnroll->completed_process = 1;
           $total+=$stdEnroll->payable_amount;
           if($trxnid < $stdEnroll->enrollId)
           {
            $trxnid=$stdEnroll->enrollId;
           }
           $ref_id+=",";
           $ref_id+=$stdEnroll->sessid;

        }
        $total= $total*100;
        $mytime = Carbon\Carbon::now();
        $trxn_dt =date_format($mytime,"d/m/Y"); 
        $string = "MERCHANTID=360,APPID=MER-360-APP-1,APPNAME=ICAN,TXNID=".$trxnid.",TXNDATE=".$trxn_dt.",TXNCRNCY=NPR,TXNAMT=".$total.",REFERENCEID=".$ref_id.",REMARKS=ican,PARTICULARS=Online Class Registration for ".$store->reg_no.",TOKEN=TOKEN";
         $token = StudentController::token($string);
        return $allunpaid ;
    }


    public function saveEsewa()
    {
        
          $readOnly = 1; 
            $payment=1;
            $message="";
          
        if($_GET['q'] == 'su'){
            
            $post_data['amt'] = $_GET['amt'];
            $post_data['scd'] = "NP-ES-ICANONLINE";
            $post_data['pid'] = $_GET['oid'];
            $post_data['rid'] = $_REQUEST['refId'];
           
        foreach ($post_data as $key => $value) {
            $post_items[] = $key . '=' . $value;
        }
    $post_string = implode('&', $post_items);
    $curl_connection = curl_init('https://esewa.com.np/epay/transrec');
    curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($curl_connection, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
    curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);
    $result = curl_exec($curl_connection);
    curl_close($curl_connection);
   // dd($post_string);

    $verification_response  = strtoupper( trim( strip_tags( $result ) ) ) ;
    $message = $verification_response ;
   // dd($verification_response);
    if( $verification_response == "SUCCESS"){
        $subject ="";
        $store = \App\Student::where("phone",$_REQUEST["phone"] )
        ->first();
        $total = 0;
        $store->save();
        
        $allunpaid = \App\StudentEnroll::where("student_id",$store->id)
        ->where("paid_status",0)->get();

        $sub="";
        $links="";
        foreach ($allunpaid as $stdEnroll)
        {
             $session =  \App\Session::withTrashed()->find($stdEnroll->session_id);
         if(!empty($session)){
         $subject = \App\Subject::where("id",$session->subject)->first();
           $classType = \App\ClassType::where("id",$session->class_type)->first();
        // dd($session);
            if(!empty($sub))
                 $sub.=",";
                 $sub.=$classType->name;
                 $sub.=" - ";
                 $sub.=$subject->subject_name;
                 
                   if(!empty($links))
                 $links.="<br/>";
                  $links.="<strong>".$classType->name;
                  $links.=" - ";
                 $links.=$subject->subject_name;
                 $links.="</strong> : ";
                 $links.=$session->links;
                 
           $stdEnroll->completed_process = 1;
            $stdEnroll->ref_code =$_REQUEST['refId'];
              $stdEnroll->payment_medium ='Esewa';
          //  $stdEnroll->payable_amount =$session->cost_per_sub;
            $stdEnroll->paid_status =1; // paid status 0 unpaid, 1 paid 2 verified
           
            $stdEnroll->save();
        }
        }
       //   $textEmail ="You have successfully registered for <strong>".$sub."</strong> .".$msg." You can join the course on scheduled date.";
      
    $link = "<br/>  <br/><br/> ".$links;
       // $link = "<br/> <br/> <u><strong>Links: </strong> </u> <br/><br/> ".$links;
        $textEmail ="You have successfully registered for".$sub." and your payment has been approved. You can join the course on scheduled date.";
       // $textEmail="You are successfully registered for online revision class. You will receive the link for class in your email one day before the class starts.";
        UtilController::sendSMS($store->phone,$textEmail);
              UtilController::sendEmail($store->email,"Registration for online classes",$textEmail.$link,$store->name,$store->reg_no);
         $message= "You have successfully paid from Esewa.";
         $payment=3;
    }else
    {
       $message= "Payment could not be verified. Please contact ICAN ";
    }
}else{
    
       $message="Payment from Esewa failed. \n Please try again"; 
}
$std_data = \App\Student::where("phone",$_REQUEST["phone"] )
        ->first();
            
            if(empty($std_data->reg_no)){
            $level="Membership";
           } else
            {
                $regNo = $std_data->reg_no;
        $level = '';
        if (strpos($regNo, 'FN00') === 0 ) {
            $level="CAP III";
        }else if (strpos($regNo, 'KI00') === 0 ) {
            $level="CAP II";
        }else if (strpos($regNo, 'KF00') === 0 ) {
            $level="CAP I";
        }
            }
            
        
         $allunpaid = \App\StudentEnroll::select('*','students_enroll.id as enrollId','sessions.id as id')
        ->join('sessions','sessions.id','=','students_enroll.session_id')
        ->join('subjects','subjects.id','=','sessions.subject')
        ->join('class_types','class_types.id','=','sessions.class_type')
        ->where("student_id",$std_data->id)
        // ->where("completed_process",1)
         ->where("sch_verified",0)
        ->where("paid_status",0)->get();
       
        //dd($allunpaid);
       
        $courses = \App\StudentEnroll::select('*','sessions.id as id', 'subjects.id as subid', 'class_types.id as classtypeid','students_enroll.id as enrollId')
        ->join('sessions','sessions.id','=','students_enroll.session_id')
        ->join('subjects','subjects.id','=','sessions.subject')
        ->join('class_types','class_types.id','=','sessions.class_type')
        ->where("students_enroll.student_id",$std_data->id)
         ->whereNull('sessions.deleted_at') //added for not shown
        ->where('sessions.level',$level)->get();
        
        foreach($allunpaid as $unpaid){
            foreach($courses as $course)
            {
              
                if($course->id == $unpaid->id )
                {
                    $unpaid->enrollId = $course->enrollId;
                     $unpaid->completed_process = $course->completed_process;
                }
            }
            
        }
  //dd($allunpaid);
      return view('form', compact('std_data','readOnly','courses','payment','level','allunpaid','message'));
        
}


public function saveConnectIPS()
{
    $message="";
     $readOnly = 1; 
            $payment=1;
            
        $statuss = $_GET['status'];
         $post_string = explode('?', $statuss);
         $txn = explode('=', $post_string[1]);
        $trxnId = $txn[1];
        $status = $post_string[0];
            $lastTrxn = \App\StudentEnroll::select('*','students_enroll.id as id','students.id as stdid')
            ->join('students','students.id',"students_enroll.student_id")
        ->where("students_enroll.id", $trxnId)->first();
      // dd($lastTrxn);
        if(strpos(@strtoupper( trim($status ) ), 'SUCCESS') === 0)
        {
         $total =0;
         
        // $allunpaid = \App\StudentEnroll::select('*','students_enroll.id as id','sessions.id as sessid')
        // ->join('sessions','sessions.id','=','students_enroll.session_id')
        // ->where("student_id",$lastTrxn->student_id)
        // ->where("paid_status",0)->get();
        
         $allunpaid = \App\StudentEnroll::select('*','students_enroll.id as enrollId','sessions.id as id')
        ->join('sessions','sessions.id','=','students_enroll.session_id')
        ->join('subjects','subjects.id','=','sessions.subject')
        ->join('class_types','class_types.id','=','sessions.class_type')
        ->where("student_id",$lastTrxn->student_id)
         //->where("completed_process",1)
         ->where("sch_verified",0)
        ->where("paid_status",0)->get();
        
        //dd($allunpaid);
       
        $ref_id=$lastTrxn->reg_no;
        if(empty($ref_id))
            $ref_id = $lastTrxn->student_id;
        foreach ($allunpaid as $stdEnroll)
        {
           $stdEnroll->completed_process = 1;
           $total+=$stdEnroll->payable_amount;
         
           $ref_id.=",";
           $ref_id.=$stdEnroll->session_id;

        }
        
        $total= $total*100;
        $mytime = Carbon\Carbon::now();
        $trxn_dt =date_format($mytime,"d/m/Y"); 
       
       // $string = "MERCHANTID=227,APPID=MER-227-APP-3,REFERENCEID={$trxnId},TXNAMT={$total}";
       $string = "MERCHANTID=360,APPID=MER-360-APP-1,REFERENCEID={$trxnId},TXNAMT={$total}";
       
     // dd($string);
     //MERCHANTID=<Merchant Id>,APPID=<App Id>,REFERENCEID=<TXNID in the Request>,TXNAMT=<Transaction Amount>
        $token = FormController::token($string); 
     // dd( $token);
     https://login.connectips.com:7443/connectipswebws/api/creditor/validatetxn
            $url = "https://login.connectips.com:7443/connectipswebws/api/creditor/validatetxn";
            //$url ='https://uat.connectips.com:7443/connectipswebws/api/creditor/validatetxn';
        $data = array(
            "merchantId"=> "360",
            "appId"=> "MER-360-APP-1",
            "referenceId"=> $trxnId,
            "txnAmt"=> $total, 
            "token"=> $token,
            );
            
         
                                                                       
$data_string = json_encode($data);                                                                                   
$ch = curl_init($url);                             

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);     
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string) ,
    'Authorization: Basic '. base64_encode("MER-360-APP-1:Abcd@123") )
);                                                                                                                   
                                 
       //dd($data_string);                                                                                                               
$response = curl_exec($ch);

      
       $result =json_decode($response);
     // dd($result);
       if(!empty($result)&&$result->status == "SUCCESS"){
            $store = \App\Student::where("phone", $lastTrxn->phone)
        ->first();
        $total = 0;
        //dd($lastTrxn->phone);
        $store->save();

        $allunpaid = \App\StudentEnroll::where("student_id",$store->id)
        ->where("paid_status",0)->get();
            $sub="";
            $links="";
        foreach ($allunpaid as $stdEnroll)
        {
            $session =  \App\Session::withTrashed()->find($stdEnroll->session_id);
         if(!empty($session)){
         $subject = \App\Subject::where("id",$session->subject)->first();
           $classType = \App\ClassType::where("id",$session->class_type)->first();
        // dd($session);
            if(!empty($sub))
                 $sub.=",";
                 $sub.=$classType->name;
                 $sub.=" - ";
                 $sub.=$subject->subject_name;
                 
                    if(!empty($links))
                 $links.="<br/>";
                  $links.="<strong>".$classType->name;
                  $links.=" - ";
                 $links.=$subject->subject_name;
                 $links.="</strong> : ";
                 $links.=$session->links;
       
           $stdEnroll->completed_process = 1;
            $stdEnroll->ref_code =$ref_id;
              $stdEnroll->payment_medium ='ConnectIps';
          //  $stdEnroll->payable_amount =$session->cost_per_sub;
            $stdEnroll->paid_status =1; // paid status 0 unpaid, 1 paid 2 verified
           
            $stdEnroll->save();
        }
        }
         //dd($stdEnroll);
         $message= "You have successfully paid from Connect IPS.";
         $payment=3;
         
         
         
         $link = "<br/> </u> <br/><br/> ".$links;
                   $textEmail ="You have successfully registered for ".$sub." You can join the course on scheduled date.";

        // $textEmail="You are successfully registered for online revision class. You will receive the link for class in your email one day before the class starts.";
        //UtilController::sendSMS($store->phone,$textEmail);
              UtilController::sendEmail($store->email,"Registration for online classes",$textEmail.$link,$store->name,$store->reg_no);
       }else
       {
           $message= "Payment Could not be validated. Please Contact ICAN.";
       }
    }else
    {
        $message= "Payment Failed from Connect IPS. Please try again.";
    }
    // dd($lastTrxn);
       $std_data = \App\Student::where("id",$lastTrxn->student_id )
        ->first();
            
            if(empty($std_data->reg_no)){
            $level="Membership";
           } else
            {
                $regNo = $std_data->reg_no;
        $level = '';
        if (strpos($regNo, 'FN00') === 0 ) {
            $level="CAP III";
        }else if (strpos($regNo, 'KI00') === 0 ) {
            $level="CAP II";
        }else if (strpos($regNo, 'KF00') === 0 ) {
            $level="CAP I";
        }
            }
  
          
        
         $allunpaid = \App\StudentEnroll::select('*','students_enroll.id as enrollId','sessions.id as id')
        ->join('sessions','sessions.id','=','students_enroll.session_id')
        ->join('subjects','subjects.id','=','sessions.subject')
        ->join('class_types','class_types.id','=','sessions.class_type')
        ->where("student_id",$std_data->id)
      //   ->where("completed_process",1)
         ->where("sch_verified",0)
        ->where("paid_status",0)->get();
        
       
        //dd($allunpaid);
       
        $courses = \App\StudentEnroll::select('*','sessions.id as id', 'subjects.id as subid', 'class_types.id as classtypeid','students_enroll.id as enrollId')
        ->join('sessions','sessions.id','=','students_enroll.session_id')
        ->join('subjects','subjects.id','=','sessions.subject')
        ->join('class_types','class_types.id','=','sessions.class_type')
         ->whereNull('sessions.deleted_at') //added for not shown
        ->where("students_enroll.student_id",$std_data->id)
        ->where('sessions.level',$level)->get();
        
        foreach($allunpaid as $unpaid){
            foreach($courses as $course)
            {
              
                if($course->id == $unpaid->id )
                {
                    $unpaid->enrollId = $course->enrollId;
                     $unpaid->completed_process = $course->completed_process;
                }
            }
            
        }
       // dd($allunpaid);
      return view('form', compact('std_data','readOnly','courses','payment','level','allunpaid','message'));
    
}

public function savePayLater(Request $request)
{
    
    $store = \App\Student::where("phone",$request["phone"] )
    ->first();
    $total = 0;
    $store->save();

    $allunpaid = \App\StudentEnroll::where("student_id",$store->id)
    ->where("paid_status",0)->get();
    $sub="";
    $links="";
    foreach ($allunpaid as $stdEnroll)
    {
         $session = \App\Session::where("id",$stdEnroll->session_id)->first();
         if(!empty($session)){
         $subject = \App\Subject::where("id",$session->subject)->first();
         $classType = \App\ClassType::where("id",$session->class_type)->first();
        // dd($session);
            if(!empty($sub))
                 $sub.=", ";
                 $sub.=$classType->name;
                 $sub.=" - ";
                 $sub.=$subject->subject_name;
                 
         if(!empty($links))
                 $links.="<br/>";
                  $links.="<strong>".$classType->name;
                  $links.=" - ";
                 $links.=$subject->subject_name;
                 $links.="</strong> : ";
                 $links.=$session->links;
       $stdEnroll->completed_process = 1;
       $stdEnroll->is_scholarship = $request["scholarship"];
        $stdEnroll->save();

    }
    }
    $msg="";
    if($request["scholarship"]==1)
    {
         $msg=" You have applied for scholarship. Decision regarding scholarship will be done once the office resume.";
    }else{
          $msg=" Payment must be done before filling exam forms.";
    }
   
          $textEmail ="You have successfully registered for ".$sub.".".$msg." You can join the course on scheduled date.";
      
    $link = "<br/>  <br/><br/> ".$links;

  // $textEmail="You are successfully registered for online revision class. You will receive the link for class in your email one day before the class starts.";
        UtilController::sendSMS($store->phone,$textEmail);
             UtilController::sendEmail($store->email,"Registration for online classes",$textEmail.$link,$store->name,$store->reg_no);
    return response(['status' => 1]);
    
    
}


    public function token(string $string = null): string
    {
       /* 
        if (!$string) {
            $string = "MERCHANTID={$this->merchant_id},APPID={$this->app_id},APPNAME={$this->app_name},TXNID={$this->txn_id},TXNDATE={$this->txn_date},TXNCRNCY={$this->txn_currency},TXNAMT={$this->txn_amount},REFERENCEID={$this->reference_id},REMARKS={$this->remarks},PARTICULARS={$this->particulars},TOKEN=TOKEN";
        }
*/
      //  dd($string);
        $private_key = null;
        $certificate = File::get(public_path()."/ICAN.pfx");
        if (openssl_pkcs12_read($certificate, $cert_info, '123')) {
            $private_key = openssl_pkey_get_private($cert_info['pkey']);
           
        } 

        if (openssl_sign($string, $signature, $private_key, 'sha256WithRSAEncryption')) {
            $hash = base64_encode($signature);
            openssl_free_key($private_key);
        } 
        return $hash;
    }
    

}