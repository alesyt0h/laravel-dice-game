<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function play(Int $id){

        if(!isSameUser($id)) return response(['message' => 'Unauthorized']);

        $blackDice = rand(1, 6);
        $redDice = rand(1, 6);

        $result = ($blackDice + $redDice === 7) ? 'lost' : 'win';

        $throw = Game::create([
            'player_id' => $id,
            'black_dice' => $blackDice,
            'red_dice' => $redDice,
            'result' => $result
        ]);

        unset($throw->player_id);

        return response(['result' => $throw]);
    }

    public function getThrows(Int $id){

        if(!isSameUser($id)) return response(['message' => 'Unauthorized']);

        $throws = Game::where('player_id', $id)->get();

        if(!count($throws)) return response(['message' => 'This user doesn\'t have any throws']);

        $wins = calculateWins($throws);

        return response(['throws' => $throws, 'winning_percentage' => $wins]);
    }

    public function ranking(){

        $throws = Game::all();

        if(!count($throws)) return response(['message' => 'There are no throws in the system :(']);

        $wins = calculateWins($throws);

        return response(['winning_percentage' => $wins]);
    }

    public function loser(){

    }

    public function winner(){

    }
}
