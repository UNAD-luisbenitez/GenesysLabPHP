<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 5/05/2016
 * Time: 5:13 PM
 * UNAD 2016 Programacion de sitios web
 * GenesysLab
 */
session_start();
if($_SESSION['IdModulo']!=4){
    header('Location: ../');//si no hay sesion lo devuelvo al login
}
require_once('../fpdf/fpdf.php');
require_once ('./bd_utilities.php');
$dependencia= isset($_GET['dependencia'])? $_GET['dependencia']: "todas" ;
$tipopersonal= isset($_GET['modulo'])? $_GET['modulo']: "0" ;
$cedula= isset($_GET['cedula'])? $_GET['cedula']: "0" ;

function create_pdf($result,$aviso){

    $pdf = new FPDF();
    $pdf->AddPage(L,'Legal');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Image('../img/lab.png' , 10 ,8, 10 , 13,'PNG');
    $pdf->Cell(15, 10, '', 0);//tamaño y alto de las celdas
    $pdf->Cell(220, 10, 'GenesysLab', 0);

    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(50, 10, 'Fecha: '.date("Y-m-d h:i:s").'', 0);
    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(110, 8, '', 0);
    $pdf->Cell(100, 8, 'HISTORIAL DE INGRESOS', 0);
    $pdf->Ln(23);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(30, 8, 'Cedula', 0);
    $pdf->Cell(35, 8, 'Nombre', 0);
    $pdf->Cell(35, 8, 'Apellido', 0);
    $pdf->Cell(25, 8, 'Genero', 0);
    //$pdf->Cell(30, 8, 'Profesion', 0);
    $pdf->Cell(30, 8, 'Cargo', 0);
    $pdf->Cell(48, 8, 'Dependencia', 0);
    $pdf->Cell(48, 8, 'Hora Ingreso', 0);
    $pdf->Cell(48, 8, 'Hora Salida', 0);
    $pdf->Cell(35, 8, 'Modulo', 0);
    $pdf->Ln(8);
    $pdf->SetFont('Arial', '', 11);
    if($aviso==1){
        while($data = $result->fetch_assoc()){
            $pdf->Cell(30, 8, $data['IdPersonas'], 0);
            $pdf->Cell(35, 8, $data['NamePersonas'], 0);
            $pdf->Cell(35, 8, $data['ApellidoPersonas'], 0);
            $pdf->Cell(25, 8, $data['GeneroPersonas'], 0);
            //$pdf->Cell(30, 8, $data['ProfesionPersonas'], 0);
            $pdf->Cell(30, 8, $data['NameCargo'], 0);
            $pdf->Cell(48, 8, $data['NameDependencia'], 0);
            $pdf->Cell(48, 8, $data['HoraIngreso'], 0);
            $pdf->Cell(48, 8, $data['HoraSalida'], 0);
            $pdf->Cell(35, 8, $data['NameModulo'], 0);
            $pdf->Ln(8);
        }
    }else{
        $pdf->Cell(30, 8, $result, 0);
    }
    ob_clean();

    $pdf->Output();
}

function consulta($dependencia,$tipopersonal,$cedula){
    global $mysqli;
    $sqlgeneral= "select personas.IdPersonas, NamePersonas, ApellidoPersonas, GeneroPersonas, ProfesionPersonas, NameCargo, NameDependencia, HoraIngreso,HoraSalida, NameModulo from personas natural join historiales natural join dependencias natural join modulos natural join cargos where(personas.IdPersonas = historiales.Personas_IdPersonas and personas.Modulos_IdModulos = modulos.IdModulo and personas.Dependencias_IdDependencia = dependencias.IdDependencia and cargos.IdCargo = personas.Cargos_IdCargo ";//falta la ) se completa en proximo

    if($dependencia=="todas" && empty($tipopersonal) && empty($cedula)){
        //si no existen filtros traigo todos los datos

        $sql= $sqlgeneral.")";
    }
    else if($dependencia!="todas" && empty($tipopersonal) && empty($cedula)){
        //si hay filtro por dependencias
        $sql= $sqlgeneral."and personas.Dependencias_IdDependencia={$dependencia})";
    }
    else if($dependencia!="todas" && !empty($tipopersonal) && empty($cedula)){
        //si hay filtro por dependencia y tipo de personal
        $sql= $sqlgeneral."and personas.Dependencias_IdDependencia={$dependencia} and personas.Modulos_IdModulos={$tipopersonal})";
    }
    else if($dependencia!="todas" && !empty($tipopersonal) && !empty($cedula)){
        //si estan los tres filtros
        $sql= $sqlgeneral."and personas.Dependencias_IdDependencia={$dependencia} and personas.Modulos_IdModulos={$tipopersonal} and personas.IdPersonas ={$cedula})";
    }
    else if($dependencia!="todas" && empty($tipopersonal) && !empty($cedula))
    {
        $sql= $sqlgeneral."and personas.Dependencias_IdDependencia={$dependencia} and personas.IdPersonas ={$cedula})";
    }
    else if($dependencia=="todas" && empty($tipopersonal) && !empty($cedula)){
        $sql= $sqlgeneral."and personas.IdPersonas ={$cedula})";
    }
    else if($dependencia=="todas" && !empty($tipopersonal) && empty($cedula)){
        $sql= $sqlgeneral."and personas.Modulos_IdModulos={$tipopersonal})";
    }
    else if($dependencia=="todas" && !empty($tipopersonal) && !empty($cedula)){
        $sql= $sqlgeneral."and personas.Modulos_IdModulos={$tipopersonal} and personas.IdPersonas ={$cedula})";
    }
    else if($dependencia!="todas" && empty($tipopersonal) && empty($cedula)){
        $sql= $sqlgeneral."and personas.Dependencias_IdDependencia={$dependencia}";
    }

    $result = $mysqli->query($sql);

    if($result->num_rows>0){
        $aviso=1;
        create_pdf($result,$aviso);
    }else{
        $aviso=0;
        $result="NO HAY REGISTROS CON ESAS CONDICIONES";
        create_pdf($result,$aviso);
    }

}
consulta($dependencia,$tipopersonal,$cedula);
?>