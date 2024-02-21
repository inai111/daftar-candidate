<?php

namespace App\Observers;

use App\Models\Candidate;

class UserStampObserver
{
    /**
     * Handle the Candidate "created" event.
     */
    public function created($model): void
    {
        # cek terlebih dahulu apakah sudah di input di dalam db
        if(!$model->created_by && auth()->user()){
            # cek siapa pembuatnya dari yang login dan melakukan create
            $model->created_by = auth()->user()->id;
        }
    }

    /**
     * Handle the Candidate "updated" event.
     */
    public function updated($model): void
    {
        # cek terlebih dahulu apakah sudah di input di dalam db
        if(!$model->created_by && auth()->user()){
            # cek siapa yang mengupdate dari yang login
            $model->updated_by = auth()->user()->id;
        }
    }

    /**
     * Handle the Candidate "deleted" event.
     */
    public function deleted($model): void
    {
        # cek terlebih dahulu apakah sudah di input di dalam db
        if(!$model->created_by && auth()->user()){
            # cek siapa menghapus dari yang login
            $model->deleted_by = auth()->user()->id;
        }
    }
}
