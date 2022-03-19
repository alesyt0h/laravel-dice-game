<?php

use App\Models\Game;

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

            return round($wins / count($throws) * 100, 2);
        }
    }

    if (! function_exists('perUserPercentage')) {
        function perUserPercentage(Illuminate\Database\Eloquent\Collection $players, string $type = null)
        {
            if($type === 'winner'){
                $initialValue = 0;
            } else if($type === 'loser'){
                $initialValue = 100;
            }

            for ($i=0; $i < count($players); $i++) {
                $players[$i]->throws = Game::where('player_id', $players[$i]->id)->get();

                if (!count($players[$i]->throws)){
                    continue;
                }

                $players[$i]->winning_percentage = calculateWins($players[$i]->throws);

                if($type === 'loser'){
                    if($players[$i]->winning_percentage < $initialValue){
                        $initialValue = $players[$i]->winning_percentage;
                        $resultingPlayer = $players[$i];

                        unset($resultingPlayer->throws);
                    }
                } else if ($type === 'winner'){
                    if($players[$i]->winning_percentage > $initialValue){
                        $initialValue = $players[$i]->winning_percentage;
                        $resultingPlayer = $players[$i];

                        unset($resultingPlayer->throws);
                    }
                }
            }

            return ($type) ? $resultingPlayer : $players;
        }
    }


?>
