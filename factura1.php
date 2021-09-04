<?php

 require_once('base1.php');
 include 'cabeza_factura.php';
 
 
        $connexion2 = new base();

        $conex2=$connexion2->conecta();
 
   
        $codigo_productos = json_decode($_POST['array_con_codigos']);
    
       
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        
        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(30,6,'CATEGORIA',1,0,'C',1);
        $pdf->Cell(70,6,'NOMBRE PRODUCTO',1,0,'C',1);
        $pdf->Cell(30,6,'CODIGO',1,0,'C',1);
        $pdf->Cell(30,6,'PRECIO',1,1,'C',1);

        $pdf->SetFont('Arial','',10);


        $contador = 0; //para aumentar de uno en uno


        while ($contador < count($codigo_productos)) { 
            

            $result = $conex2->query("SELECT * FROM productos where codigo_p = '$codigo_productos[$contador]'");

            $row= mysqli_fetch_array($result);

            //$pdf->Cell(70,6,utf8_decode($row['estado']),1,0,'C');
            $pdf->Cell(30,6,utf8_decode($row['categoria']),1,0,'C');
            $pdf->Cell(70,6,utf8_decode($row['nompro']),1,0,'C');
            $pdf->Cell(30,6,$row['codigo_p'],1,0,'C');
            $pdf->Cell(30,6,$row['precio'],1,1,'C');

            $contador++; 
            $tot1=$tot1+$row['precio'];


        }


            $iva=0.03;

            $tot2 = $iva * $tot1;

            $tot3=$tot1+$tot2;



            $pdf->Cell(30,6,"",0,1,'C');

            $pdf->Cell(100,6);

            $pdf->SetFillColor(124, 252, 0);
            
                    
            $pdf->Cell(30,6,'SUB TOTAL',1,0,'C',1);

            $pdf->Cell(30,6,$tot1,1,1,'C');


            $pdf->Cell(100,6);


            $pdf->Cell(30,6,'IVA (3%)',1,0,'C',1);
            $pdf->Cell(30,6,$tot2,1,1,'C');


            $pdf->SetFont('Arial','B',12);
            $pdf->SetFillColor(240, 230, 140);
            $pdf->Cell(100,6);
            $pdf->SetTextColor(0,0,0);
            $pdf->Cell(30,6,'TOTAL',1,0,'C',1);
            $pdf->SetTextColor(0,0,255);
            $pdf->Cell(30,6,$tot3,1,1,'C');


            //$pdf->Output(); 

            $pdf->Output("facturas/factura.pdf"); 

             
    
?>
