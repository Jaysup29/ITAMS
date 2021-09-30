<?php
session_start();
include 'dbcon.php';

$recordid = $_SESSION['record_id'];
$accid = $_SESSION['Acc_id'];

    $query = "SELECT rec.id, rec.date_created, rec.location, rec.record_status, rec.acc_status, emp.id, CONCAT(emp.first_name,' ',emp.last_name), emp.position, dept.dept_name, sbu.sbu_name, rec.asset_tag, rec.asset_name, item.itemname, rec.asset_descriptions, rec.asset_remarks, ass.quantity, ass.sbu, ass.id 
    FROM tbl_records rec
    INNER JOIN tbl_employees emp ON rec.emp_id = emp.id
    INNER JOIN tbl_sbu sbu ON emp.sbu_id = sbu.id
    INNER JOIN tbl_dept dept ON emp.dept_id = dept.id
    INNER JOIN tbl_assets ass ON rec.asset_id = ass.id
    INNER JOIN tbl_item item ON ass.type_of = item.id
    WHERE rec.id = $recordid";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
        $rec_id = $row[0];
        $date_issued = date("M d, Y", strtotime($row[1]));
        $emp_id = $row[5];
        $emp_fullname = strtoupper($row[6]);
        $emp_position = strtoupper($row[7]);
        $emp_dept = strtoupper($row[8]);
        $asset_id = $row[17];
        $asset_tag = strtoupper($row[10]);
        $asset_name = strtoupper($row[11]);
        $asset_type = $row[12];
        $asset_descriptions = $row[13];
        $asset_remarks = strtoupper($row[14]);
        $asset_quantity = $row[15];
        $asset_sbu = strtoupper($row[16]);
        }
    }
$year = date("Y");
$formid = $asset_sbu."-".$year."-".$accid;

switch($asset_sbu){
        
    case "PNKC":
        include('TCPDF/tcpdf.php');
    class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'gililogo.jpg';
        $this->Image($image_file, 20, 10, 52, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->Ln(5);
        $this->SetFont('helvetica', 'B', 10);
        // Title
        $this->Cell(180, 10, 'FORM 2023', 0, 1, 'R');
        $this->Cell(196, 10, 'PHIL NIPPON KYOEI CORP.', 0, 1, 'C');
        $this->SetFont('helvetica', '', 10);
        $this->Cell(185, 2, 'Suite 705 Royal Plaza Twin Towers.', 0, 1, 'C');
        $this->Cell(182, 2, '648 Remedios St., Malate, Manila', 0, 1, 'C');
        $this->SetFont('helvetica', 'B', 14);
        $this->Ln(10);
        $this->Cell(170, 5, 'ACCOUNTABILITY FORM', 0, 1, 'C');
    }
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
    // Page footer
    public function Footer() {
        
        // Position at 15 mm from bottom
        $this->SetY(-70);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->Cell(18, 5, 'ISSUER:', 1, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', '', 8);
        $this->Cell(72, 5, "$f_issuer", 1, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->Cell(0, 5, 'ACCEPTANCE AND AGREEMENT', 1, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->SetFont('helvetica', '', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->MultiCell(90, 20, 'That the above Asset/s or Properties is issued in good condition and accepted by employee', 1, 'L', 0, 0, '','', true);
        $this->MultiCell(90, 20, 'This constitute responsibility and I understand that the above asset(s) &/or property(ies) is under my care. In case of repair, damage, and/or loss while in possession, I shall be liable for the immediate restoration &/or replacement cost.', 1, 'L', 0, 1, '','', true);
        
        $this->setCellPaddings(1, 1, 1, 1);
        $this->SetFont('helvetica', 'B', 8);
        $this->Cell(90, 0, 'PREPARE AND PROVIDED BY:', 1, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(90, 0, 'RECEIVED BY:', 1, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->SetFont('helvetica', '', 8);
        $this->MultiCell(90, 15, '', 1, 'C', 0, 0, '', '', true, 0, false, true, 15, 'B');
        $this->MultiCell(90, 15, '', 1, 'C', 0, 1, '', '', true, 0, false, true, 15, 'B');
        
        $this->SetFont('helvetica', 'B', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->Cell(90, 0, 'SIGNATURE OVER PRINTED NAME', 1, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(90, 0, 'SIGNATURE OVER PRINTED NAME', 1, false, 'C', 0, '', 0, false, 'T', 'M');

        $this->SetY(-10);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(90, 2, 'Accountability Form', 0, false, 'L', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();
   
//add content
$pdf->Ln(35);
$pdf->setCellPaddings(1, 1, 1, 1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'ISSUED TO:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $emp_fullname, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, 0, 'SHEET NO.', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $formid, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, 0, 'POSITION', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(30, 0, $emp_position, 1, 1, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'DATE ISSUED:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $date_issued, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(40, 0, 'DEPARTMENT:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(70, 0, $emp_dept, 1, 1, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Ln(1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'ASSET TAG', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(35, 0, 'DEVICE', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(65, 0, 'DESCRIPTION.', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(15, 0, 'QTY', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(35, 0, 'CONDITION', 1, 1, 'C', 0, '', 0, false, 'T', 'M');

$pdf->SetFont('helvetica', '', 8);

//        $html = '<table border="1" style="text-align:center; ">
//            <tr>
//                <td style="width: 106px;">'.$asset_tag.'</td>
//                <td style="width: 124px;"></td>
//                <td style="width: 231px;" colspan="2">'.$asset_descriptions.'</td>
//                <td style="width: 53px;"></td>
//                <td style="width: 124px;">'.$asset_remarks.'</td>
//            </tr>
//        </table>';
            $pdf->setCellPaddings(1, 1, 1, 1);
            $pdf->MultiCell(30, 10, $asset_tag, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(35, 10, $asset_type, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(65, 10, $asset_descriptions, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(15, 10, $asset_quantity, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(35, 10, $asset_remarks, 1, 'C', 0, 1, '', '', true);

//Close and output PDF document
$pdf->Output(''.$emp_fullname.'_'.'accountabilityform.pdf','I');

        break;
    case "GILI":
        include('TCPDF/tcpdf.php');
    class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'gililogo.jpg';
        $this->Image($image_file, 20, 10, 52, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->Ln(5);
        $this->SetFont('helvetica', 'B', 10);
        // Title
        $this->Cell(180, 10, 'FORM 2023', 0, 1, 'R');
        $this->Cell(196, 10, 'GLACIER INTEGRATED LOGISTICS INC', 0, 1, 'C');
        $this->SetFont('helvetica', '', 10);
        $this->Cell(185, 2, 'Suite 705 Royal Plaza Twin Towers.', 0, 1, 'C');
        $this->Cell(182, 2, '648 Remedios St., Malate, Manila', 0, 1, 'C');
        $this->SetFont('helvetica', 'B', 14);
        $this->Ln(10);
        $this->Cell(170, 5, 'ACCOUNTABILITY FORM', 0, 1, 'C');
    }
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
    // Page footer
    public function Footer() {
        
        // Position at 15 mm from bottom
        $this->SetY(-70);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->Cell(18, 5, 'ISSUER:', 1, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', '', 8);
        $this->Cell(72, 5, "$f_issuer", 1, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->Cell(0, 5, 'ACCEPTANCE AND AGREEMENT', 1, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->SetFont('helvetica', '', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->MultiCell(90, 20, 'That the above Asset/s or Properties is issued in good condition and accepted by employee', 1, 'L', 0, 0, '','', true);
        $this->MultiCell(90, 20, 'This constitute responsibility and I understand that the above asset(s) &/or property(ies) is under my care. In case of repair, damage, and/or loss while in possession, I shall be liable for the immediate restoration &/or replacement cost.', 1, 'L', 0, 1, '','', true);
        
        $this->setCellPaddings(1, 1, 1, 1);
        $this->SetFont('helvetica', 'B', 8);
        $this->Cell(90, 0, 'PREPARE AND PROVIDED BY:', 1, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(90, 0, 'RECEIVED BY:', 1, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->SetFont('helvetica', '', 8);
        $this->MultiCell(90, 15, '', 1, 'C', 0, 0, '', '', true, 0, false, true, 15, 'B');
        $this->MultiCell(90, 15, '', 1, 'C', 0, 1, '', '', true, 0, false, true, 15, 'B');
        
        $this->SetFont('helvetica', 'B', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->Cell(90, 0, 'SIGNATURE OVER PRINTED NAME', 1, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(90, 0, 'SIGNATURE OVER PRINTED NAME', 1, false, 'C', 0, '', 0, false, 'T', 'M');

        $this->SetY(-10);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(90, 2, 'Accountability Form', 0, false, 'L', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();
   
//add content
$pdf->Ln(35);
$pdf->setCellPaddings(1, 1, 1, 1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'ISSUED TO:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $emp_fullname, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, 0, 'SHEET NO.', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $formid, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, 0, 'POSITION', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(30, 0, $emp_position, 1, 1, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'DATE ISSUED:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $date_issued, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(40, 0, 'DEPARTMENT:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(70, 0, $emp_dept, 1, 1, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Ln(1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'ASSET TAG', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(35, 0, 'DEVICE', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(65, 0, 'DESCRIPTION.', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(15, 0, 'QTY', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(35, 0, 'CONDITION', 1, 1, 'C', 0, '', 0, false, 'T', 'M');

$pdf->SetFont('helvetica', '', 8);

//        $html = '<table border="1" style="text-align:center; ">
//            <tr>
//                <td style="width: 106px;">'.$asset_tag.'</td>
//                <td style="width: 124px;"></td>
//                <td style="width: 231px;" colspan="2">'.$asset_descriptions.'</td>
//                <td style="width: 53px;"></td>
//                <td style="width: 124px;">'.$asset_remarks.'</td>
//            </tr>
//        </table>';
            $pdf->setCellPaddings(1, 1, 1, 1);
            $pdf->MultiCell(30, 10, $asset_tag, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(35, 10, $asset_type, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(65, 10, $asset_descriptions, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(15, 10, $asset_quantity, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(35, 10, $asset_remarks, 1, 'C', 0, 1, '', '', true);

//Close and output PDF document
$pdf->Output(''.$emp_fullname.'_'.'accountabilityform.pdf','I');

        
        break;
    case "AIC":
        include('TCPDF/tcpdf.php');
    class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'gililogo.jpg';
        $this->Image($image_file, 20, 10, 52, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->Ln(5);
        $this->SetFont('helvetica', 'B', 10);
        // Title
        $this->Cell(180, 10, 'FORM 2023', 0, 1, 'R');
        $this->Cell(196, 10, 'AURA INTEGRATORS CORPORATION', 0, 1, 'C');
        $this->SetFont('helvetica', '', 10);
        $this->Cell(185, 2, 'Suite 705 Royal Plaza Twin Towers.', 0, 1, 'C');
        $this->Cell(182, 2, '648 Remedios St., Malate, Manila', 0, 1, 'C');
        $this->SetFont('helvetica', 'B', 14);
        $this->Ln(10);
        $this->Cell(170, 5, 'ACCOUNTABILITY FORM', 0, 1, 'C');
    }
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
    // Page footer
    public function Footer() {
        
        // Position at 15 mm from bottom
        $this->SetY(-70);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->Cell(18, 5, 'ISSUER:', 1, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', '', 8);
        $this->Cell(72, 5, "$f_issuer", 1, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->Cell(0, 5, 'ACCEPTANCE AND AGREEMENT', 1, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->SetFont('helvetica', '', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->MultiCell(90, 20, 'That the above Asset/s or Properties is issued in good condition and accepted by employee', 1, 'L', 0, 0, '','', true);
        $this->MultiCell(90, 20, 'This constitute responsibility and I understand that the above asset(s) &/or property(ies) is under my care. In case of repair, damage, and/or loss while in possession, I shall be liable for the immediate restoration &/or replacement cost.', 1, 'L', 0, 1, '','', true);
        
        $this->setCellPaddings(1, 1, 1, 1);
        $this->SetFont('helvetica', 'B', 8);
        $this->Cell(90, 0, 'PREPARE AND PROVIDED BY:', 1, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(90, 0, 'RECEIVED BY:', 1, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->SetFont('helvetica', '', 8);
        $this->MultiCell(90, 15, '', 1, 'C', 0, 0, '', '', true, 0, false, true, 15, 'B');
        $this->MultiCell(90, 15, '', 1, 'C', 0, 1, '', '', true, 0, false, true, 15, 'B');
        
        $this->SetFont('helvetica', 'B', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->Cell(90, 0, 'SIGNATURE OVER PRINTED NAME', 1, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(90, 0, 'SIGNATURE OVER PRINTED NAME', 1, false, 'C', 0, '', 0, false, 'T', 'M');

        $this->SetY(-10);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(90, 2, 'Accountability Form', 0, false, 'L', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();
   
//add content
$pdf->Ln(35);
$pdf->setCellPaddings(1, 1, 1, 1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'ISSUED TO:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $emp_fullname, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, 0, 'SHEET NO.', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $formid, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, 0, 'POSITION', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(30, 0, $emp_position, 1, 1, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'DATE ISSUED:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $date_issued, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(40, 0, 'DEPARTMENT:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(70, 0, $emp_dept, 1, 1, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Ln(1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'ASSET TAG', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(35, 0, 'DEVICE', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(65, 0, 'DESCRIPTION.', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(15, 0, 'QTY', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(35, 0, 'CONDITION', 1, 1, 'C', 0, '', 0, false, 'T', 'M');

$pdf->SetFont('helvetica', '', 8);

//        $html = '<table border="1" style="text-align:center; ">
//            <tr>
//                <td style="width: 106px;">'.$asset_tag.'</td>
//                <td style="width: 124px;"></td>
//                <td style="width: 231px;" colspan="2">'.$asset_descriptions.'</td>
//                <td style="width: 53px;"></td>
//                <td style="width: 124px;">'.$asset_remarks.'</td>
//            </tr>
//        </table>';
            $pdf->setCellPaddings(1, 1, 1, 1);
            $pdf->MultiCell(30, 10, $asset_tag, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(35, 10, $asset_type, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(65, 10, $asset_descriptions, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(15, 10, $asset_quantity, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(35, 10, $asset_remarks, 1, 'C', 0, 1, '', '', true);

//Close and output PDF document
$pdf->Output(''.$emp_fullname.'_'.'accountabilityform.pdf','I');

        
        break;
    case "MANNVITS":
        include('TCPDF/tcpdf.php');
    class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'gililogo.jpg';
        $this->Image($image_file, 20, 10, 52, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->Ln(5);
        $this->SetFont('helvetica', 'B', 10);
        // Title
        $this->Cell(180, 10, 'FORM 2023', 0, 1, 'R');
        $this->Cell(196, 10, 'MANNVITS CORPORATION', 0, 1, 'C');
        $this->SetFont('helvetica', '', 10);
        $this->Cell(185, 2, 'Suite 705 Royal Plaza Twin Towers.', 0, 1, 'C');
        $this->Cell(182, 2, '648 Remedios St., Malate, Manila', 0, 1, 'C');
        $this->SetFont('helvetica', 'B', 14);
        $this->Ln(10);
        $this->Cell(170, 5, 'ACCOUNTABILITY FORM', 0, 1, 'C');
    }
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
    // Page footer
    public function Footer() {
        
        // Position at 15 mm from bottom
        $this->SetY(-70);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->Cell(18, 5, 'ISSUER:', 1, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', '', 8);
        $this->Cell(72, 5, "$f_issuer", 1, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->Cell(0, 5, 'ACCEPTANCE AND AGREEMENT', 1, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->SetFont('helvetica', '', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->MultiCell(90, 20, 'That the above Asset/s or Properties is issued in good condition and accepted by employee', 1, 'L', 0, 0, '','', true);
        $this->MultiCell(90, 20, 'This constitute responsibility and I understand that the above asset(s) &/or property(ies) is under my care. In case of repair, damage, and/or loss while in possession, I shall be liable for the immediate restoration &/or replacement cost.', 1, 'L', 0, 1, '','', true);
        
        $this->setCellPaddings(1, 1, 1, 1);
        $this->SetFont('helvetica', 'B', 8);
        $this->Cell(90, 0, 'PREPARE AND PROVIDED BY:', 1, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(90, 0, 'RECEIVED BY:', 1, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->SetFont('helvetica', '', 8);
        $this->MultiCell(90, 15, '', 1, 'C', 0, 0, '', '', true, 0, false, true, 15, 'B');
        $this->MultiCell(90, 15, '', 1, 'C', 0, 1, '', '', true, 0, false, true, 15, 'B');
        
        $this->SetFont('helvetica', 'B', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->Cell(90, 0, 'SIGNATURE OVER PRINTED NAME', 1, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(90, 0, 'SIGNATURE OVER PRINTED NAME', 1, false, 'C', 0, '', 0, false, 'T', 'M');

        $this->SetY(-10);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(90, 2, 'Accountability Form', 0, false, 'L', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();
   
//add content
$pdf->Ln(35);
$pdf->setCellPaddings(1, 1, 1, 1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'ISSUED TO:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $emp_fullname, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, 0, 'SHEET NO.', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $formid, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, 0, 'POSITION', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(30, 0, $emp_position, 1, 1, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'DATE ISSUED:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $date_issued, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(40, 0, 'DEPARTMENT:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(70, 0, $emp_dept, 1, 1, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Ln(1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'ASSET TAG', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(35, 0, 'DEVICE', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(65, 0, 'DESCRIPTION.', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(15, 0, 'QTY', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(35, 0, 'CONDITION', 1, 1, 'C', 0, '', 0, false, 'T', 'M');

$pdf->SetFont('helvetica', '', 8);

//        $html = '<table border="1" style="text-align:center; ">
//            <tr>
//                <td style="width: 106px;">'.$asset_tag.'</td>
//                <td style="width: 124px;"></td>
//                <td style="width: 231px;" colspan="2">'.$asset_descriptions.'</td>
//                <td style="width: 53px;"></td>
//                <td style="width: 124px;">'.$asset_remarks.'</td>
//            </tr>
//        </table>';
            $pdf->setCellPaddings(1, 1, 1, 1);
            $pdf->MultiCell(30, 10, $asset_tag, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(35, 10, $asset_type, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(65, 10, $asset_descriptions, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(15, 10, $asset_quantity, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(35, 10, $asset_remarks, 1, 'C', 0, 1, '', '', true);

//Close and output PDF document
$pdf->Output(''.$emp_fullname.'_'.'accountabilityform.pdf','I');

        
        break;
    case "CLDI":
        include('TCPDF/tcpdf.php');
    class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'gililogo.jpg';
        $this->Image($image_file, 20, 10, 52, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->Ln(5);
        $this->SetFont('helvetica', 'B', 10);
        // Title
        $this->Cell(180, 10, 'FORM 2023', 0, 1, 'R');
        $this->Cell(196, 10, 'CLDI', 0, 1, 'C');
        $this->SetFont('helvetica', '', 10);
        $this->Cell(185, 2, 'Suite 705 Royal Plaza Twin Towers.', 0, 1, 'C');
        $this->Cell(182, 2, '648 Remedios St., Malate, Manila', 0, 1, 'C');
        $this->SetFont('helvetica', 'B', 14);
        $this->Ln(10);
        $this->Cell(170, 5, 'ACCOUNTABILITY FORM', 0, 1, 'C');
    }
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
    // Page footer
    public function Footer() {
        
        // Position at 15 mm from bottom
        $this->SetY(-70);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->Cell(18, 5, 'ISSUER:', 1, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', '', 8);
        $this->Cell(72, 5, "$f_issuer", 1, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->Cell(0, 5, 'ACCEPTANCE AND AGREEMENT', 1, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->SetFont('helvetica', '', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->MultiCell(90, 20, 'That the above Asset/s or Properties is issued in good condition and accepted by employee', 1, 'L', 0, 0, '','', true);
        $this->MultiCell(90, 20, 'This constitute responsibility and I understand that the above asset(s) &/or property(ies) is under my care. In case of repair, damage, and/or loss while in possession, I shall be liable for the immediate restoration &/or replacement cost.', 1, 'L', 0, 1, '','', true);
        
        $this->setCellPaddings(1, 1, 1, 1);
        $this->SetFont('helvetica', 'B', 8);
        $this->Cell(90, 0, 'PREPARE AND PROVIDED BY:', 1, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(90, 0, 'RECEIVED BY:', 1, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->SetFont('helvetica', '', 8);
        $this->MultiCell(90, 15, '', 1, 'C', 0, 0, '', '', true, 0, false, true, 15, 'B');
        $this->MultiCell(90, 15, '', 1, 'C', 0, 1, '', '', true, 0, false, true, 15, 'B');
        
        $this->SetFont('helvetica', 'B', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->Cell(90, 0, 'SIGNATURE OVER PRINTED NAME', 1, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(90, 0, 'SIGNATURE OVER PRINTED NAME', 1, false, 'C', 0, '', 0, false, 'T', 'M');

        $this->SetY(-10);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(90, 2, 'Accountability Form', 0, false, 'L', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();
   
//add content
$pdf->Ln(35);
$pdf->setCellPaddings(1, 1, 1, 1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'ISSUED TO:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $emp_fullname, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, 0, 'SHEET NO.', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $formid, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, 0, 'POSITION', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(30, 0, $emp_position, 1, 1, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'DATE ISSUED:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $date_issued, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(40, 0, 'DEPARTMENT:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(70, 0, $emp_dept, 1, 1, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Ln(1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'ASSET TAG', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(35, 0, 'DEVICE', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(65, 0, 'DESCRIPTION.', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(15, 0, 'QTY', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(35, 0, 'CONDITION', 1, 1, 'C', 0, '', 0, false, 'T', 'M');

$pdf->SetFont('helvetica', '', 8);

//        $html = '<table border="1" style="text-align:center; ">
//            <tr>
//                <td style="width: 106px;">'.$asset_tag.'</td>
//                <td style="width: 124px;"></td>
//                <td style="width: 231px;" colspan="2">'.$asset_descriptions.'</td>
//                <td style="width: 53px;"></td>
//                <td style="width: 124px;">'.$asset_remarks.'</td>
//            </tr>
//        </table>';
            $pdf->setCellPaddings(1, 1, 1, 1);
            $pdf->MultiCell(30, 10, $asset_tag, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(35, 10, $asset_type, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(65, 10, $asset_descriptions, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(15, 10, $asset_quantity, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(35, 10, $asset_remarks, 1, 'C', 0, 1, '', '', true);

//Close and output PDF document
$pdf->Output(''.$emp_fullname.'_'.'accountabilityform.pdf','I');

        
        break;
    case "SUKIKO":
        include('TCPDF/tcpdf.php');
    class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'gililogo.jpg';
        $this->Image($image_file, 20, 10, 52, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->Ln(5);
        $this->SetFont('helvetica', 'B', 10);
        // Title
        $this->Cell(180, 10, 'FORM 2023', 0, 1, 'R');
        $this->Cell(196, 10, 'SUKIKO', 0, 1, 'C');
        $this->SetFont('helvetica', '', 10);
        $this->Cell(185, 2, 'Suite 705 Royal Plaza Twin Towers.', 0, 1, 'C');
        $this->Cell(182, 2, '648 Remedios St., Malate, Manila', 0, 1, 'C');
        $this->SetFont('helvetica', 'B', 14);
        $this->Ln(10);
        $this->Cell(170, 5, 'ACCOUNTABILITY FORM', 0, 1, 'C');
    }
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
    // Page footer
    public function Footer() {
        
        // Position at 15 mm from bottom
        $this->SetY(-70);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->Cell(18, 5, 'ISSUER:', 1, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', '', 8);
        $this->Cell(72, 5, "$f_issuer", 1, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->Cell(0, 5, 'ACCEPTANCE AND AGREEMENT', 1, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->SetFont('helvetica', '', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->MultiCell(90, 20, 'That the above Asset/s or Properties is issued in good condition and accepted by employee', 1, 'L', 0, 0, '','', true);
        $this->MultiCell(90, 20, 'This constitute responsibility and I understand that the above asset(s) &/or property(ies) is under my care. In case of repair, damage, and/or loss while in possession, I shall be liable for the immediate restoration &/or replacement cost.', 1, 'L', 0, 1, '','', true);
        
        $this->setCellPaddings(1, 1, 1, 1);
        $this->SetFont('helvetica', 'B', 8);
        $this->Cell(90, 0, 'PREPARE AND PROVIDED BY:', 1, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(90, 0, 'RECEIVED BY:', 1, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->SetFont('helvetica', '', 8);
        $this->MultiCell(90, 15, '', 1, 'C', 0, 0, '', '', true, 0, false, true, 15, 'B');
        $this->MultiCell(90, 15, '', 1, 'C', 0, 1, '', '', true, 0, false, true, 15, 'B');
        
        $this->SetFont('helvetica', 'B', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->Cell(90, 0, 'SIGNATURE OVER PRINTED NAME', 1, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(90, 0, 'SIGNATURE OVER PRINTED NAME', 1, false, 'C', 0, '', 0, false, 'T', 'M');

        $this->SetY(-10);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(90, 2, 'Accountability Form', 0, false, 'L', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();
   
//add content
$pdf->Ln(35);
$pdf->setCellPaddings(1, 1, 1, 1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'ISSUED TO:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $emp_fullname, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, 0, 'SHEET NO.', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $formid, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, 0, 'POSITION', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(30, 0, $emp_position, 1, 1, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'DATE ISSUED:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $date_issued, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(40, 0, 'DEPARTMENT:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(70, 0, $emp_dept, 1, 1, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Ln(1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'ASSET TAG', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(35, 0, 'DEVICE', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(65, 0, 'DESCRIPTION.', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(15, 0, 'QTY', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(35, 0, 'CONDITION', 1, 1, 'C', 0, '', 0, false, 'T', 'M');

$pdf->SetFont('helvetica', '', 8);

//        $html = '<table border="1" style="text-align:center; ">
//            <tr>
//                <td style="width: 106px;">'.$asset_tag.'</td>
//                <td style="width: 124px;"></td>
//                <td style="width: 231px;" colspan="2">'.$asset_descriptions.'</td>
//                <td style="width: 53px;"></td>
//                <td style="width: 124px;">'.$asset_remarks.'</td>
//            </tr>
//        </table>';
            $pdf->setCellPaddings(1, 1, 1, 1);
            $pdf->MultiCell(30, 10, $asset_tag, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(35, 10, $asset_type, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(65, 10, $asset_descriptions, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(15, 10, $asset_quantity, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(35, 10, $asset_remarks, 1, 'C', 0, 1, '', '', true);

//Close and output PDF document
$pdf->Output(''.$emp_fullname.'_'.'accountabilityform.pdf','I');

        
        break;
    case "EXERGY":
        include('TCPDF/tcpdf.php');
    class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'gililogo.jpg';
        $this->Image($image_file, 20, 10, 52, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->Ln(5);
        $this->SetFont('helvetica', 'B', 10);
        // Title
        $this->Cell(180, 10, 'FORM 2023', 0, 1, 'R');
        $this->Cell(196, 10, 'EXERGY PHILIPPINES CORP.', 0, 1, 'C');
        $this->SetFont('helvetica', '', 10);
        $this->Cell(185, 2, 'Suite 705 Royal Plaza Twin Towers.', 0, 1, 'C');
        $this->Cell(182, 2, '648 Remedios St., Malate, Manila', 0, 1, 'C');
        $this->SetFont('helvetica', 'B', 14);
        $this->Ln(10);
        $this->Cell(170, 5, 'ACCOUNTABILITY FORM', 0, 1, 'C');
    }
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
    // Page footer
    public function Footer() {
        
        // Position at 15 mm from bottom
        $this->SetY(-70);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->Cell(18, 5, 'ISSUER:', 1, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', '', 8);
        $this->Cell(72, 5, "$f_issuer", 1, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->Cell(0, 5, 'ACCEPTANCE AND AGREEMENT', 1, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->SetFont('helvetica', '', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->MultiCell(90, 20, 'That the above Asset/s or Properties is issued in good condition and accepted by employee', 1, 'L', 0, 0, '','', true);
        $this->MultiCell(90, 20, 'This constitute responsibility and I understand that the above asset(s) &/or property(ies) is under my care. In case of repair, damage, and/or loss while in possession, I shall be liable for the immediate restoration &/or replacement cost.', 1, 'L', 0, 1, '','', true);
        
        $this->setCellPaddings(1, 1, 1, 1);
        $this->SetFont('helvetica', 'B', 8);
        $this->Cell(90, 0, 'PREPARE AND PROVIDED BY:', 1, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(90, 0, 'RECEIVED BY:', 1, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->SetFont('helvetica', '', 8);
        $this->MultiCell(90, 15, '', 1, 'C', 0, 0, '', '', true, 0, false, true, 15, 'B');
        $this->MultiCell(90, 15, '', 1, 'C', 0, 1, '', '', true, 0, false, true, 15, 'B');
        
        $this->SetFont('helvetica', 'B', 8);
        $this->setCellPaddings(1, 1, 1, 1);
        $this->Cell(90, 0, 'SIGNATURE OVER PRINTED NAME', 1, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(90, 0, 'SIGNATURE OVER PRINTED NAME', 1, false, 'C', 0, '', 0, false, 'T', 'M');

        $this->SetY(-10);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(90, 2, 'Accountability Form', 0, false, 'L', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();
   
//add content
$pdf->Ln(35);
$pdf->setCellPaddings(1, 1, 1, 1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'ISSUED TO:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $emp_fullname, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, 0, 'SHEET NO.', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $formid, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, 0, 'POSITION', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(30, 0, $emp_position, 1, 1, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'DATE ISSUED:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(40, 0, $date_issued, 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(40, 0, 'DEPARTMENT:', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(70, 0, $emp_dept, 1, 1, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Ln(1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 0, 'ASSET TAG', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(35, 0, 'DEVICE', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(65, 0, 'DESCRIPTION.', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(15, 0, 'QTY', 1, 0, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(35, 0, 'CONDITION', 1, 1, 'C', 0, '', 0, false, 'T', 'M');

$pdf->SetFont('helvetica', '', 8);

//        $html = '<table border="1" style="text-align:center; ">
//            <tr>
//                <td style="width: 106px;">'.$asset_tag.'</td>
//                <td style="width: 124px;"></td>
//                <td style="width: 231px;" colspan="2">'.$asset_descriptions.'</td>
//                <td style="width: 53px;"></td>
//                <td style="width: 124px;">'.$asset_remarks.'</td>
//            </tr>
//        </table>';
            $pdf->setCellPaddings(1, 1, 1, 1);
            $pdf->MultiCell(30, 10, $asset_tag, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(35, 10, $asset_type, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(65, 10, $asset_descriptions, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(15, 10, $asset_quantity, 1, 'C', 0, 0, '', '', true);
            $pdf->MultiCell(35, 10, $asset_remarks, 1, 'C', 0, 1, '', '', true);

//Close and output PDF document
$pdf->Output(''.$emp_fullname.'_'.'accountabilityform.pdf','I');

        break;
    default:
        echo "FORM NOT FOUND!";
    
}

?>