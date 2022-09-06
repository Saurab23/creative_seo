<?php

// Show all information, defaults to INFO_ALL
//phpinfo();

  $toEmail = $_GET['email'].",".'ram.nepal@ican.org.np';
    $subject = 'Registration for online classes';
    $details = ' Register here for the link of class- https://event.webinarjam.com/register/72/109zma3m';
         $fromEmail="no-reply-ICAN@classregister.ican.org.np";
       
		$MyBody ="<html>\n<body>\n";
      	
		$MyBody.="<p>$details</p><br /><br /><br />";
		$MyBody.= "<p style='margin: 0'>Thanks & Regards</p>";
		$MyBody.= "<p style='margin: 0'>The Institute of Chartered Accountants of Nepal</p>";
		$MyBody.= "<p style='margin: 0'>ICAN Marg, Satdobato, Lalitpur</p>";
		$MyBody.= "<p style='margin: 0'>Post Box No.: 5289</p>";
		$MyBody.= "<p style='margin: 0'>Tel.: +977-1-5530730, 5530832</p>";
		$MyBody.= "<p style='margin: 0'>Fax: +977-1-5550774</p>";
		$MyBody.= "<p style='margin: 0'>URL: http://www.ican.org.np</p><br />";
		$MyBody.= "<p style='margin: 0'>Disclaimer</p><hr>";
		$MyBody.= "<p style='margin: 0; text-align: justify;'>The information transmitted, including attachments, is intended only for the person(s) or entity to which it is addressed and may contain confidential and/or privileged material. Any review, retransmission, dissemination or other use of, or taking of any action in reliance upon this information by persons or entities other than the intended recipient is prohibited. If you received this in error, please contact the sender and destroy any copies of this information. ICAN does not guarantee that any email or any attachments are free from computer viruses or other conditions which may damage or interfere with recipient data, hardware or software.  The recipient relies on its own procedures and assumes all risk of use and of opening any attachments.</p>";
		$MyBody.= "<p style='margin: 0; color: #00b050'>We encourage paperless environment. Please think before printing this email.</p><br />";
		$MyBody.="</body>\n</html>";
		/*
		$headers .= "To: ".$toEmail."\r\n";
		$headers .= "From: ".$fromEmail."\r\n";
		*/
		$headers  = "From: Noreply-ICAN <".$fromEmail. ">\r\n" ;
		$headers .= "To: ".$toEmail. "\r\n" ;
		$headers .= "X-Mailer: PHP/".phpversion();
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		
	 $status=	mail($toEmail, $subject, $MyBody, $headers);


	
if($status)
{
    echo '<p>Your mail has been sent!</p>';
} else {
    echo '<p>Something went wrong. Please try again!</p>';
}


?>