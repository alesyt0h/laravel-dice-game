<?php

    if (! function_exists('isSameUser')) {
        function isSameUser(Int $id)
        {
            if($id === auth()->user()->id){
                return true;
            }
        }
    }

    if (! function_exists('calculateWins')) {
        function calculateWins(Illuminate\Database\Eloquent\Collection $throws)
        {
            $wins = 0;

            for ($i = 0; $i < count($throws); $i++) {
                if($throws[$i]->result === 'win'){
                    $wins++;
                }
            }

            return number_format($wins / count($throws) * 100, 2);
        }
    }

?>
