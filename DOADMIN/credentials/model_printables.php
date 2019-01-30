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


    <div class="div-1">
        <div class="div-2"> 
              <div class="container"><img src="left.png"></div>
            <div class="div-2">
              <p>Republic of the Philippines</p>
              <p>Department of Education</p>
              <p>National Capital Region</p>
              <p><b>SCHOOLS DIVISION OFFICE</b></p>
              <p><b>QUEZON CITY</b></p>
              <p>Nueva Ecija St., Bago Bantay, Quezon City</p>
              <p>www.depedqc.ph</p>
            </div>
            <div class="container"><img src="right.png"></div>
        </div>
    </div>


      	<h2 align="center">QCDO</h2>
      	<h4 align="center">"RANKINGS - 2019"</h4>
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