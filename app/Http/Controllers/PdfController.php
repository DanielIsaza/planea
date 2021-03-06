<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academicspace;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;

class PdfController extends Controller
{
  /**
 * Permite descargar el syllabus de un espacio académico
 * @param  int $espacio_id identificador del espacio académico
 * @return [type]             [description]
 */

public function descarga1($id){
  try{
    $espacio = Academicspace::find($id);

    $templateword = new TemplateProcessor('storage/syllabus.docx');

    $templateword->setValue('nombre',$espacio->nombre);
    $templateword->setValue('descripcion',$espacio->descripcion);
    $templateword->setValue('justificacion',$espacio->justificacion);
    $templateword->setValue('descripcion',$espacio->descripcion);
    $templateword->setValue('horasTeoricas',$espacio->horasTeoricas);
    $templateword->setValue('horas_semestre',intval($espacio->horasTeoricas)*16);
    $templateword->setValue('metodologia',$espacio->metodologia);
    $templateword->setValue('codigo',$espacio->codigo);
    $templateword->setValue('tipo_actividad',$espacio->activityacademic->nombre);
    $templateword->setValue('semestre',$espacio->semester->nombre);
    $templateword->setValue('naturaleza',$espacio->nature->nombre);
    $templateword->setValue('nucleoTematico',$espacio->nucleoTematico);
    $templateword->setValue('numeroCreditos',$espacio->numeroCreditos);
    $templateword->setValue('tipo_evaluacion',$espacio->typeevaluation->nombre);
    $templateword->setValue('horasIndependiente',$espacio->horasIndependiente);
    $templateword->setValue('horasPracticas',$espacio->horasPracticas);
    $templateword->setValue('horasTeoPract',$espacio->horasTeoPract);
    $templateword->setValue('horasAsesorias',$espacio->horasAsesorias);
    if($espacio->habilitable == 1){
      $templateword->setValue('habilitable','Si');
    }else {
      $templateword->setValue('habilitable','No');
    }
    if($espacio->validable == 1){
      $templateword->setValue('validable','Si');
    }else{
      $templateword->setValue('validable','No');
    }
    if($espacio->homologable == 1){
      $templateword->setValue('homologable','Si');
    }else{
      $templateword->setValue('homologable','No');
    }

    $templateword->setValue('procesosIntegrativos',$espacio->procesosIntegrativos);
    $templateword->setValue('contenidoConceptual',$espacio->contenidoConceptual);
    $templateword->setValue('contenidoProcedimental',$espacio->contenidoProcedimental);
    $templateword->setValue('contenidoActitudinal',$espacio->contenidoActitudinal);
    $templateword->setValue('metodologia',$espacio->metodologia);
    $templateword->setValue('evaluacion',$espacio->evaluacion);
    $templateword->setValue('horasSemanales',$espacio->horasSemanales);
    $templateword->setValue('competenciasPropias',$espacio->competenciasPropias);
    $templateword->setValue('bibliografia',$espacio->bibliografia);
    $templateword->setValue('historialRevision',$espacio->historialRevision);
    $templateword->setValue('vigencia',$espacio->vigencia);
    $templateword->setValue('responsables',$espacio->responsables);
    $templateword->setValue('unidades',$espacio->unidades); 
    $templateword->setValue('recusosElectronicos',$espacio->recusosElectronicos);
    $templateword->setValue('planAcademico',$espacio->academicplan->nombre);      
    $templateword->setValue('actividadAcademica',$espacio->activityacademic->nombre);
    $templateword->setValue('tipoEvaluacion',$espacio->typeevaluation->nombre);
    $templateword->setValue('tipoMetodologia',$espacio->typemethodology->nombre);
    $templateword->setValue('areaConocimiento',$espacio->knowledgearea->nombre);
    $requisitos = "";

    for ($i=0; $i < sizeof($espacio->requirement); $i++) { 
      $requisitos = $requisitos." ".Academicspace::find($espacio->requirement[$i]->academicspace_id)->nombre;
    }
    
    $templateword->setValue('requisitos',$requisitos);
    $templateword->saveAs("syllabus_".$espacio->nombre.".docx");
    return response()->download("syllabus_".$espacio->nombre.".docx")->deleteFileAfterSend(true);
    }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/descarga_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/espaciosacademicos');
    }
}

  public function formulario(){
    try{
    $fp = fopen("storage/home.txt", "r");
        $linea = "";
        while(!feof($fp)) {
            $linea = $linea.' '.fgets($fp);
        }
    fclose($fp);
    return view("pdf.formulario",["contenido"=>$linea]);
    }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/formulario_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/');
    }
  }

  public function subir(Request $request){
    try{
    //obtenemos el campo file definido en el formulario
     $file = $request->file('file');
     //obtenemos el nombre del archivo
     $nombre = $file->getClientOriginalName();

     //indicamos que queremos guardar un nuevo archivo en el disco local
     \Storage::disk()->put('public/'.$nombre,  \File::get($file));
     //\Storage::move($nombre,$nombre);

      \Alert::message('Archivo subido correctamente', 'success');
      $fp = fopen("storage/home.txt", "r");
        $linea = "";
        while(!feof($fp)) {
            $linea = $linea.' '.fgets($fp);
        }
     fclose($fp);
      return view("pdf.formulario",["contenido"=>$linea]);
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/formulario_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/');
    }
  }
  /**
  * Metodo que permite almacenar la informacion que sera mostrada en home
  *
  */
  public function home(Request $request){
    try{
    $archivo = fopen("storage/home.txt", "w") or die("No se pudo abrir el archivo!");

    fwrite($archivo, $request->contenido);
    fclose($archivo);

    \Alert::message('Información actualizada correctamente', 'success');
    return redirect('/');
    }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/formulario_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/');
    }
  }
}
