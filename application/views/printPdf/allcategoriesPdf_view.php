<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed'); //just make sure they cant access this file directly

class RPDF extends FPDF {

// Page header
    function Header() {
        // Logo
        $this->Image(base_url() . 'assets/images/logo_techneeds.jpg', 10, 6, 30);
        // Arial bold 15
        //$this->SetFont('FontFamily','B',FontSize);
        $this->SetFont('Arial', 'B', 15);
        // Title
        //$this->Cell(width,height,'Text',border,newLine,'Text align');
        $this->Cell(0, 10, 'All Item Categories', 0, 0, 'C');
        // Line break
        $this->Ln(20);
    }

// Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

// Instanciation of inherited class
$this->myfpdf = new RPDF();
$this->myfpdf->AliasNbPages();
$this->myfpdf->AddPage();
$this->myfpdf->SetFont('Arial', '', 12);

//Print categary list
foreach ($catList as $rec) {
    $this->myfpdf->Cell(0, 10, '' . $rec->grpCd . ' - ' . $rec->grp, 0, 1);
}

$this->myfpdf->Output();
?>


