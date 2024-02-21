<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class CandidateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $response =  [
            'id'=>$this->id,
            'name'=>$this->name,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'job'=>$this->mergeWhen($this->relationLoaded('job'),[
                'id'=>$this->job_id,
                'name'=>$this->job->name,
            ]),
            'skills'=>$this->mergeWhen($this->relationLoaded('skills'),function(){
                return $this->skills->map(fn($skill)=>[
                    'id'=>$skill->id,
                    'name'=>$skill->name,
                ]);
            })
        ];

        return Arr::sortRecursive($response);
    }
}
