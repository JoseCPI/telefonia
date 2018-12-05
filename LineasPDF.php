<?php
require('mysql_table.php');
include 'conexion.php';//abre concexion con mysql

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Title
    $str=utf8_decode("ñ");
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'Clientes de la Compa'.$str.'ia',0,1,'C');
    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}

// Connect to database


$pdf = new PDF();
$pdf->AddPage();
// First table: output all columns
$pdf->Table($mysqli,'select c.apellido ,c.nombre, l.num_telefono, l.tipo_linea
                        from cliente c join linea l
                        on c.id_cliente=l.id_cliente
                        order by apellido;');
$pdf->Output();
?>
