<?php
namespace App\Repositories;

use App\Models\Candidate;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CandidateRepository
{
    /**
     * @param array $input
     * @return \App\Models\Candidate
     */
    public function create(array $input)
    {
        try{
            return DB::transaction(function() use($input){
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
}