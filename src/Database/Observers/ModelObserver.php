<?php

namespace App\Observers;
use Auth;

class ModelObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  \App\Model  $model
     * @return void
     */
    public function creating($model)
    {
        if($model->metadata){
            $teamid = (Auth::user() ? Auth::user()->roles->first()->pivot->team_id: null);
            $model->created_by = $teamid;
        }
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  \App\Model  $model
     * @return void
     */
    public function updating($model)
    {
        if($model->metadata){
            $teamid = (Auth::user() ? Auth::user()->roles->first()->pivot->team_id: null);
            $model->updated_by = $teamid;
        }        
    }
}