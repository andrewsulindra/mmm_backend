<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\KipHistory;
use Illuminate\Support\Facades\Validator;

class KipHistoryController extends Controller
{

    function __construct()
    {

    }

    public function index(Request $request)
    {
        $data = KipHistory::orderBy('created_at', 'DESC')->get();

        if($data->isEmpty())
        {
            $message = 'empty';
        } else {
            $message = 'success';
        }
        return response()->json([
            'message'    => $message,
            'data'      => $data
        ], Response::HTTP_OK);
    }

    public function show($id)
    {
        $data = KipHistory::find($id);

        if(!$data)
        {
            $message = 'empty';
        } else {
            $message = 'success';
        }

        return response()->json([
            'message'    => $message,
            'data'      => $data
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'value'  => 'required',
        ]);

        // If validation fails, return a JSON response with the errors
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);  // HTTP status code for validation error
        }

        // Store the data if validation passes
        try {
            $form_data = $request->all();
            $data = KipHistory::create($form_data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data successfully saved.',
                'data' => $data  // Optionally return the created data
            ], 201);  // HTTP status code for created resource
        } catch (\Exception $e) {
            // If there’s an exception, return an error response
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving data.',
                'error' => $e->getMessage()
            ], 500);  // HTTP status code for server error
        }
    }

}
