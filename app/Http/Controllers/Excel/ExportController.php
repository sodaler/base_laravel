<?php

namespace App\Http\Controllers\Excel;

use App\Exports\PostsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new PostsExport(), 'example.xlsx');
    }
}
