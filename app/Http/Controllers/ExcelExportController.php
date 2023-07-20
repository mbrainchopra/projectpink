<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\pink; // Assuming you have a User model for the 'users' table

class ExcelExportController extends Controller
{
    public function export()
    {
        $data = pink::select('name', 'email')->get();

     
        $fileName = 'users_data.csv';

     
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename=' . $fileName);

      
        $output = fopen('php://output', 'w');

      
        fputcsv($output, ['Name', 'Email']);

       
        foreach ($data as $row) {
            fputcsv($output, [$row->name, $row->email]);
        }

     
        fclose($output);
    }
}