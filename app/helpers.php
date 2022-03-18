<?php

    if (! function_exists('isSameUser')) {
        function isSameUser(Int $id)
        {
            if($id === auth()->user()->id){
                return true;
            }
        }
    }

?>
