<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use TCPDF;

class PdfController extends Controller
{
    public function generatePdf(Request $request, Course $course)
    {
        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator('Media Social Academy');
        $pdf->SetAuthor('Jeff Cote');
        $pdf->SetTitle('Certificado de finalzación');
        $pdf->SetSubject('Curso '. $course->title);
        $pdf->SetKeywords('PDF', 'Curso', $course->title);
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // set margins
        $pdf->SetMargins(45, 25, 45);
        $pdf->SetHeaderMargin(0);
        $pdf->SetFooterMargin(0);
        // remove default footer
        $pdf->setPrintFooter(false);
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        // set font
        $pdf->SetFont('helvetica');
        // remove default header
        $pdf->setPrintHeader(false);
        // add a page
        $pdf->AddPage();
        // get the current page break margin
        $bMargin = $pdf->getBreakMargin();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = asset('/img/courses/certificate/certificate_template.jpg');
        $pdf->Image($img_file, 0, 0, 295, 210, '', '', '', false, 300, '', false, false, 0);
        // set the starting point for the page content
        $pdf->setPageMark();
        $user =auth()->user();
        $course_duration = gmdate("i", $course->lessons->sum('duration'));
        $teacher = $course->teacher->name;
        $date = \Carbon\Carbon::parse($course->students()->where('user_id', $user->id)->first()->pivot->created_at, 'UTC')->isoFormat('D [de] MMMM [del] YYYY');
        // Print a text
        $html = <<<EOF
        <style>
            .title {
                text-align: center;
                color: #fff;
                font-family: times;
                font-size: 40pt;
                letter-spacing: 1px;
            }
            .message {
                text-align: center;
                font-size: 22pt;
                color: #666666;
            }
            .signature{
                text-align: center;
                line-height: 0.4;
            }
            .signature_line{
                color: #666666;
            }
            .signature_subline{
                line-height: 0.75;
                font-size: 12pt;
                color:#999999;
            }
            .signature_name{
                color: #666666;
                font-size: 25pt;
                font-family: times;
            }
        </style>
        <div>
            <h1 class="title"><i>Certificado de finalización</i></h1>
            <p></p>
            <p class="message">&nbsp;<br/>Este documento certifica que <b> $user->name </b> ha completado con éxito el curso en línea $course->title el $date</p>
            <div class="signature">
            <h2 class="signature_name"><i>$teacher</i></h2>
            <p class="signature_line">____________________________________</p>
            <p class="signature_subline" >Instructor del curso</p>
            </div>
        </div>
        EOF;
        $pdf->writeHTML($html, true, false, true, false, '');
        //Close and output PDF document
        $pdf->Output('certificado-curso-'.$course->slug.'.pdf', 'I');
    }
}