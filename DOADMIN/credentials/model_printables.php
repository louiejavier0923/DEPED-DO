<?php
	   include 'connection.php';


		
	

	require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('Payroll: "Ranking -  2019"');  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '


    <div style="width:100; height:50px;"><img src="header.png"></div>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
           		 <th>RANK</th>
                   <th>NAME</th>
                 
                      <th>TOTAL POINTS</th>
           </tr>  
      ';  


    
	 	$cnt='';
		$sql = "SELECT DISTINCT LASTNAME,FIRSTNAME,MIDDLENAME,TOTALPOINTS from view_rank";

		$query = $conn->query($sql);
		$total = 0;
		while($row = $query->fetch_assoc()){
		        $cnt+=1;
			$content .= "
			<tr>
			 <td>".$cnt."</td>
                           <td>".$row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MIDDLENAME']. "</td>
                        
                                 <td>".$row['TOTALPOINTS']."</td>
				
				
			</tr>
			";
		}
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('ranking.pdf', 'I');



    

?>