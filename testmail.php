<?php
$mailto = $email;
		$subject = 'PaySlip '.$fname.' '.$lname.' | Miraj Infotech';
		$message ="Dear ".$fname.", Below is the attached automated generated Salary Slip. \n\n\n\n\n\n\n\nMiraj Infotech Pvt. Ltd. \nAddress Line 1, Address Line 2, Danapur, Patna \nBihar-801503";

		$content = file_get_contents($full_path);
		$content = chunk_split(base64_encode($content));

		$separator = md5(time());

		$eol = "\r\n";

		$headers = "From: Ankit Kumar <ankkr645@gmail.com>" . $eol;
		$headers .= "MIME-Version: 1.0" . $eol;
		$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
		$headers .= "Content-Transfer-Encoding: 7bit" . $eol;
		$headers .= "This is a MIME encoded message." . $eol;

		$body = "--" . $separator . $eol;
		$body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
		$body .= "Content-Transfer-Encoding: 8bit" . $eol;
		$body .= $message . $eol;

		// attachment
		$body .= "--" . $separator . $eol;
		$body .= "Content-Type: application/octet-stream; name=\"" . $FileName . "\"" . $eol;
		$body .= "Content-Transfer-Encoding: base64" . $eol;
		$body .= "Content-Disposition: attachment" . $eol;
		$body .= $content . $eol;
		$body .= "--" . $separator . "--";
		
		if (mail($mailto, $subject, $body, $headers))
		{
			echo "Sent";
		}
		else{
			echo "NO";
		}
?>