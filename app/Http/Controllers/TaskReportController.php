<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TaskReportController extends Controller
{
    public function __invoke(Request $request)
    {
        $tasks = $request->has('lead') ? Task::filterLead($request)->withLead()->get() : Task::withLead()->get();
        $pdf = Pdf::loadView('pdf.task_report', ['tasks'=>$tasks]);
        return $pdf->download('task_report.pdf');
    }
}
