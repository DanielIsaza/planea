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
    $templateword->setValue('horasTeoricas',$espacio->horasTeoricas);
    $templateword->setValue('horasTeoPract',$espacio->horasTeoPract);
    $templateword->setValue('horasAsesorias',$espacio->horasAsesorias);
    $templateword->setValue('habilitable',$espacio->habilitable);
    $templateword->setValue('validable',$espacio->validable);
    $templateword->setValue('homologable',$espacio->homologable);
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
    $requisitos = "";

    for ($i=0; $i < sizeof($espacio->requirement); $i++) { 
      $requisitos = $requisitos." ".Academicspace::find($espacio->requirement[$i]->academicspace_id)->nombre;
    }
    //$templateword->setValue('requisitos',$requisitos);


    $templateword->saveAs("syllabus_".$espacio->nombre.".docx");
    return response()->download("syllabus_".$espacio->nombre.".docx")->deleteFileAfterSend(true);
}

  public function formulario(){
    return view("pdf.formulario");
  }

  public function subir(Request $request){
    //obtenemos el campo file definido en el formulario
     $file = $request->file('file');

     //obtenemos el nombre del archivo
     $nombre = $file->getClientOriginalName();

     //indicamos que queremos guardar un nuevo archivo en el disco local
     \Storage::disk()->put('public/'.$nombre,  \File::get($file));
     //\Storage::move($nombre,$nombre);

      \Alert::message('Archivo subido correctamente', 'success');
          return view("pdf.formulario");
  }
}
