<?php

$id= $_GET['id'];


require('mysql_table.php');
include 'conexion.php';//abre concexion con mysql

$num=$mysqli->query("select l.num_telefono from linea l where l.id_linea=".$id.";")->fetch_object()->num_telefono;

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Title
    $str=utf8_decode("ñ");
    $this->SetFont('Arial','',18);
    include 'conexion.php';//abre concexion con mysql
    $id= $_GET['id'];
    $num=$mysqli->query("select l.num_telefono from linea l where l.id_linea=".$id.";")->fetch_object()->num_telefono;

    $this->Cell(0,6,'Historial de llamadas recibidas de: '.$num.'' ,0,1,'C');
    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}

// Connect to database


$pdf = new PDF();
$pdf->AddPage();

// First table: output all columns
// $pdf->Table($mysqli,"select l.num_telefono, t.costo
//                        from linea l join (select ll.num_destino nd, ll.costo costo from
//                        llamada ll where ll.num_saliente=".$id.") t
//                        on l.id_linea=t.nd;");

// $pdf->AddPage();
// $pdf->MultiCell(0,1 ,'Llamadas Recibidas\n.', 0);
// // First table: output all columns
$pdf->Table($mysqli,"select l.num_telefono, t.costo
                       from linea l join (select ll.num_saliente ns, ll.costo costo from
                       llamada ll where ll.num_destino=".$id.") t
                       on l.id_linea=t.ns;");

$pdf->Output();
$mysqli->close();
?>
