<?php
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('imagen/brito.jpg', 5, 5, 30 );

				
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'FACTURA PRODUCTOS',1,0,'C');
            
            

            $this->SetFont('Arial','B',6);

            $this->Cell(12,10, 'FECHA:',1,0,'C');

            $this->Ln();

            $this->Cell(30);

            $this->Cell(120,10, '                 ',1,0,'C');

            $this->Cell(12,10, 'Numero Fact:',1,0,'C');


            $this->Ln(40);


		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>