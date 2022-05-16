<?php 

 function fetch_data()  
 {  
  $con = mysqli_connect("localhost", "root", "", "land_tenure"); 
      $output = '';  
      $sql = "SELECT a.updated_at,p.firstName,p.lastName,a.infrastracture_category,a.parcel_id,pr.amount FROM application a, person p,property pr WHERE a.investor_id=p.personId AND a.status='Paid' AND a.appId=pr.application_id";  
      $result = mysqli_query($con, $sql);
      $a=1;  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr> 
                          <td>'.$a++.'</td>
                          <td>'.$row["firstName"].'</td>
                          <td>'.$row["lastName"].'</td> 
                          <td>'.$row["infrastracture_category"].'</td>
                          <td>'.$row["parcel_id"].'</td> 
                          <td>'.$row["amount"].'</td>
                          <td>'.$row["updated_at"].'</td>  
                           
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["print"]))  
 {  
      require_once('tcpdf/tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Payment Information");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= ' 
      
      <h4 align="center">Payment Information</h4><br /><hr> 
      <table>
      <tr>
              <th>No</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Property Type</th>
              <th>Parcel</th>
              <th>Amount</th>
              <th>Date</th>
              
           </tr>';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 }  
 ?>