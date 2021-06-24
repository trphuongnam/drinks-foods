<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Exports\ExportStatistics;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportExcelController extends Controller
{
    use Exportable;
    function exportStatistics()
    {
        return Excel::download(new ExportStatistics(), 'statistics.xlsx');
    }

    public function headings(): array
    {
        return [
            'STT',
            'Trạng thái',
            'Số lượng',
            'Tổng cộng',
        ];
    }
}
