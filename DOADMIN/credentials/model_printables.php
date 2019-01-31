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


<body style="font-family: calibri;">

    <div style="margin: auto; width: 50%; border: 1px solid black;">
        <div style="display: flex; padding: 20px 0 20px 0; margin-left: 20%;">  
              <div class="container"><img src="left.png" style="width: 75px;  height: 75px;"></div>
            <div style="margin-left: 5%; margin-right: 5%;">
              <p style="margin: 0; padding: 0;  font-size: 12px; text-align: center;">Republic of the Philippines</p>
              <p style="margin: 0; padding: 0; font-size: 12px; text-align: center;">Department of Education</p>
              <p style="margin: 0; padding: 0; font-size: 12px; text-align: center;">National Capital Region</p>
              <p style="margin: 0; padding: 0; font-size: 12px; text-align: center;"><b>SCHOOLS DIVISION OFFICE</b></p>
              <p style="margin: 0; padding: 0; font-size: 12px; text-align: center;"><b>QUEZON CITY</b></p>
              <p style="margin: 0; padding: 0; font-size: 12px; text-align: center;">Nueva Ecija St., Bago Bantay, Quezon City</p>
              <p style="margin: 0; padding: 0; font-size: 12px; text-align: center;">www.depedqc.ph</p>
            </div>
            <div class="container"><img src="right.png" style="width: 75px; height: 75px;"></div>
        </div>
    </div>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
           		 <th>RANK</th>
                   <th>NAME</th>
                 
                      <th>TOTAL POINTS</th>
           </tr>  
      ';  


    
	 	$cnt='';
		$sql = "SELECT * from view_rank";

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