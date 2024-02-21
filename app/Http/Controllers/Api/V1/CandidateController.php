<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {
        try{
            $candidate = DB::transaction(function() use($request){
                $input = $request->input();

                # insert data candidate
                $dataCandidate = Arr::except($input,['skills','job']);
                $candidate = Candidate::create($dataCandidate);

                # karena dibuat sendiri, maka isi created_by dengan id sendiri
                $candidate->created_by = $candidate->id;
                $candidate->updated_by = $candidate->id;
                $candidate->save();

                # buat skill set
                $skills = $input['skills'];
                $candidate->skills()->sync($skills);

                # menampakkan data job dan skill juga pada response
                $candidate->loadMissing('job','skills');

                return $candidate;
            });

            return (new CandidateResource($candidate))->response()->setStatusCode(201);
        }catch(Exception $e){
            $message = $e->getMessage()??"Terjadi Error";
            $code = $e->getCode();

            if(is_string($code) || $code < 200 || 500 < $code){
                $code = 500;

                # kalo ga normal, tulis di log atau notif slack jika tersambung
                Log::critical('Terjadi masalah di pendaftaran candidate',[
                    'error_code' => $e->getCode(),
                    'message'=>$e->getMessage()
                ]);
            }

            return response()->json([
                'message'=>$message
            ],$code);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
