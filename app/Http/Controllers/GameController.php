<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;

class GameController extends Controller
{
    protected string $forbiddenMsg = 'You are not authorized to perform this action';

    public function play(Int $id){

        if(!isSameUser($id) && !isAdmin()) return response()->json(['message' => $this->forbiddenMsg], 403);

        $blackDice = rand(1, 6);
        $redDice = rand(1, 6);

        $result = ($blackDice + $redDice !== 7) ? 'lost' : 'win';

        $throw = Game::create([
            'player_id' => $id,
            'black_dice' => $blackDice,
            'red_dice' => $redDice,
            'result' => $result
        ]);

        unset($throw->player_id);

        return response()->json(['result' => $throw]);
    }

    public function getThrows(Int $id){

        if(!isSameUser($id) && !isAdmin()) return response()->json(['message' => $this->forbiddenMsg], 403);

        $throws = Game::where('player_id', $id)->get();

        if(!count($throws)) return response()->json(['message' => 'This user doesn\'t have any throws'], 409);

        $wins = calculateWins($throws);

        return response()->json(['throws' => $throws, 'winning_percentage' => $wins]);
    }

    public function ranking(){

        if(!isAdmin()) return response()->json(['message' => $this->forbiddenMsg], 403);

        $throws = Game::all();

        if(!count($throws)) return response()->json(['message' => 'There are no throws in the system :('], 409);

        $wins = calculateWins($throws);

        return response()->json(['winning_percentage' => $wins]);
    }

    public function loser(){

        $players = User::all();
        $loser = perUserPercentage($players, 'loser');

        $loser = anonymousSetter($loser);

        return response()->json(['loser' => $loser]);
    }

    public function winner(){

        $players = User::all();
        $winner = perUserPercentage($players, 'winner');

        $winner = anonymousSetter($winner);

        return response()->json(['winner' => $winner]);
    }
}
