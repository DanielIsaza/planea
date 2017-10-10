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

      //$templateword = new TemplateProcessor(storage_path().'/app'.'/syllabus.docx');
      $templateword = new TemplateProcessor('syllabus.docx');

        $nombre = "Este es un nombre, por favor funciona";
         $templateword->setValue('nombre_espacio',$nombre);
         $templateword->saveAs("prueba.docx");
          return response()->download("prueba.docx")->deleteFileAfterSend(true);
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
     \Storage::disk()->put($nombre,  \File::get($file));
     //\Storage::move($nombre,$nombre);

     return "archivo guardado";
  }
}
