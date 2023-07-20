<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\pink;

class ExcelImportController extends Controller
{
    public function import(Request $request)
    {
        // Validate the file upload
        $request->validate([
            'excel_file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('excel_file')) {
            $path = $request->file('excel_file')->getRealPath();
            $data = Excel::toArray([], $path);
            $rows = $data[0];

            foreach ($rows as $row) {
               
                $name = $row[0];
                $email = $row[1];

              
                pink::create([
                    'name' => $name,
                    'email' => $email,
                ]);
            }

           
            return redirect()->back()->with('success', 'Excel data imported successfully!');
        }

       
        return redirect()->back()->with('error', 'Please select an Excel file to import.');
    }
}
