<?php namespace App\Http\Controllers;

use App\Models\FormData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;


class FormController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'IdProjet' => 'required|string|max:255',
            'VersionProjet' => 'required|string|max:255',
            'SQLRequetes' => 'required|string',
        ]);

        // Create a new instance of the FormData model
        $formData = new FormData();

        // Assign values to the model attributes based on the validated data
        $formData->IdProjet = $validatedData['IdProjet'];
        $formData->VersionProjet = $validatedData['VersionProjet'];
        $formData->SQLRequetes = $validatedData['SQLRequetes'];

        // Save the form data to the database
        $formData->save();

        // Return a response indicating success
        return response()->json(['message' => 'Form data saved successfully'], 201);
    }
    public function export(Request $request)
    {
    // Fetch all records from the FormData table
    $formData = FormData::all();

    // Prepare CSV data
    $csvData = [];
    $csvData[] = ['IdProjet', 'VersionProjet', 'SQLRequtes'];

    foreach ($formData as $data) {
        $csvData[] = [$data->IdProjet, $data->VersionProjet, $data->SQLRequetes];
    }

    // Generate CSV file
    $filename = 'form_data_' . date('Y-m-d_H-i-s') . '.csv';

    // Create a streamed response with CSV data
    $response = new StreamedResponse(function () use ($csvData) {
        $handle = fopen('php://output', 'w');
        foreach ($csvData as $row) {
            fputcsv($handle, $row);
        }
        fclose($handle);
    });

    // Set response headers
    $response->headers->set('Content-Type', 'text/csv');
    $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '"');

    return $response;
    }
}
