<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed'); //just make sure they cant access this file directly

class RPDF extends FPDF {

// Page header
    function Header() {
        // Logo
        $this->Image(base_url() . 'assets/images/logo_techneeds.jpg', 5, 5, 60);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(190,10,'TechNeeds International Company',0,0,'R');
        $this->Ln(4);
        $this->Cell(190,10,'Tel     :   011-2 733 222',0,0,'R');
        $this->Ln(4);
        $this->Cell(190,10,'Hotline :   071-9 555 500',0,0,'R');
        $this->Ln(4);
        $this->Cell(190,10,'Email   :   info@recent.lk',0,0,'R');
        $this->Ln(4);
        $this->Cell(190,10,'Web :  www.techneeds.lk',0,0,'R');
        $this->Ln(4);
        $this->Cell(190,10,'94/1/1,Pepiliyana Road,Nedimala,Dehiwala',0,0,'R');
         $this->Ln(10);
        // Arial bold 15
        //$this->SetFont('FontFamily','B',FontSize);
        $this->SetFont('Arial', 'B', 15);
        // Title
        //$this->Cell(width,height,'Text',border,newLine,'Text align');
        $this->Cell(0, 10, 'Puchasing Order', 0, 0, 'C');
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
    
    function headerTable(){
        //$this->SetFont('Time','B',12);
        $this->Cell(40,10,'PO Number',0,0,'L');
        $this->Cell(50,10,'',0,0,'L');
        $this->Cell(60,10,'Date',0,0,'L');
        $this->Cell(30,10,'',0,0,'L');
        $this->Ln();
        $this->Cell(40,10,'Supplier',1,0,'L');
        $this->Cell(140,10,'',1,0,'L');
        $this->Ln();
        $this->Cell(30,10,'Item Code',1,0,'L');
        $this->Cell(40,10,'Item Description',1,0,'L');
        $this->Cell(30,10,'Quantity',1,0,'L');
        $this->Cell(40,10,'UnitPrice',1,0,'L');
        $this->Cell(40,10,'Amount',1,0,'L');
        $this->Ln();
        
    }
    function viewTable(){
        $this->SetFont('Arial','',15);
        $this->Cell(30,10,'',1,0,'L');
        $this->Cell(40,10,'',1,0,'L');
        $this->Cell(30,10,'',1,0,'L');
        $this->Cell(40,10,'',1,0,'L');
        $this->Cell(40,10,'',1,0,'L');
        $this->Ln();
    }

}

// Instanciation of inherited class
$this->myfpdf = new RPDF();
$this->myfpdf->AliasNbPages();
$this->myfpdf->AddPage();
$this->myfpdf->SetFont('Arial', '', 12);
$this->myfpdf->headerTable();
$this->myfpdf->viewTable();
//Print categary list

$this->myfpdf->Output();

?>



