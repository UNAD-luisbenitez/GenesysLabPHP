<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 4/05/2016
 * Time: 11:41 PM
 * UNAD 2016 Programacion de sitios web
 * GenesysLab
 */

//incluyo clausura si existe session modulo 4
if($_SESSION['IdModulo']!=4){
    header('Location: ../');//si no hay sesion lo devuelvo al login
}

$subject= isset($_GET['subject']) ? intval($_GET['subject']) : '0';

if($subject==2){
    $dependencia= isset($_GET['dependencia'])? $_GET['dependencia']: "todas" ;
    $tipopersonal= isset($_GET['modulo'])? $_GET['modulo']: "0" ;
    $cedula= isset($_GET['cedula'])? $_GET['cedula']: "0" ;
    header("Location: ../../utilities/info-pdf.php?dependencia={$dependencia}&tipopersonal={$tipopersonal}&cedula={$cedula}");
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

    if($result->num_rows){

        imprime($result);// envia todos los datos de mysql a imprimir
    }else{
        //no hay nada
    }

}

function imprime($result){
    while($data = $result->fetch_assoc()){?>
       <tr>
           <td><?php echo $data['IdPersonas']; ?></td>
           <td><?php echo $data['NamePersonas']?></td>
           <td><?php echo $data['ApellidoPersonas']?></td>
           <td><?php echo $data['GeneroPersonas']?></td>
           <td><?php echo $data['ProfesionPersonas']?></td>
           <td><?php echo $data['NameCargo']?></td>
           <td><?php echo $data['NameDependencia']?></td>
           <td><?php echo $data['HoraIngreso']?></td>
           <td><?php echo $data['HoraSalida']?></td>
           <td><?php echo $data['NameModulo']?></td>
       </tr>
  <?php  }
}
?>