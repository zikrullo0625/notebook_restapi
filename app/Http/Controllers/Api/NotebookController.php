<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\SuccessResource;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): SuccessResource
    {
        $notes = Note::all();

        return new SuccessResource([
            'data' => $notes,
            'http_code' => Response::HTTP_OK
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): ErrorResource|SuccessResource
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'company' => 'nullable|string',
            'phone' => ['required', 'string', 'max:12', 'regex:/^[0-9]*$/'],
            'email' => 'required|string',
            'birth_date' => 'nullable|date',
            'photo_path' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return new ErrorResource([
                'http_code' => Response::HTTP_BAD_REQUEST,
                'messages' => $validator->messages()
            ]);
        }

        $data = $validator->validated();

        $note = Note::create($data);

        return new SuccessResource([
            'data' => $note,
            'http_code' => Response::HTTP_OK
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note): SuccessResource
    {
        return new SuccessResource([
            'data' => $note,
            'http_code' => Response::HTTP_OK
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note): ErrorResource|SuccessResource
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'string',
            'company' => 'nullable|string',
            'phone' => ['string', 'max:12', 'regex:/^[0-9]*$/'],
            'email' => 'string',
            'birth_date' => 'nullable|date',
            'photo_path' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return new ErrorResource([
                'http_code' => Response::HTTP_BAD_REQUEST,
                'messages' => $validator->messages()
            ]);
        }

        $data = $validator->validated();

        $note->update($data);

        return new SuccessResource([
            'data' => $note,
            'http_code' => Response::HTTP_OK
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note): SuccessResource
    {
        $result = $note->delete();

        return new SuccessResource([
            'data' => $result,
            'http_code' => Response::HTTP_OK
        ]);
    }
}
