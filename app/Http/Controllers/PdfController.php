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
  public function descarga($espacio_id){
    $espacio = Academicspace::find($espacio_id);
    $view2 = \View::make('pdf.portada')->render();
    $view = \View::make('pdf.academicspace',compact('espacio'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view2);
    $pdf->loadHTML($view);
    return $pdf->stream('');
  }

  public function descarga1($id){

          $templateword = new TemplateProcessor("syllabus.docx");
        $nombre = "Este es un nombre, por favor funciona";
         $templateword->setValue('nombre_espacio',$nombre);
         $templateword->saveAs("prueba.docx");
          return response()->download("prueba.docx")->deleteFileAfterSend(true);
  }

  public function prueba(){
    $data = $this->getData();
    $date = date('Y-m-d');
    $invoice = "2222";
    $view =  \View::make('pdf.invoice', compact('data', 'date', 'invoice'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    //return $pdf->stream('invoice'); mostrar
    //return $pdf->download('invoice.pdf'); descargar
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

     return "archivo guardado";
  }


  public function getData()
  {
      $data =  [
          'quantity'      => '1' ,
          'description'   => 'some ramdom text',
          'price'   => '500',
          'total'     => '500'
      ];
      return $data;
  }

}
