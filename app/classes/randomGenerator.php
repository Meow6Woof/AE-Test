<?php 
namespace App;

/**
 * Random Generator
 * 
 * @author Ivan Glibko 
 * @version 1.0
 */
class RandomGenerator{
    public function randomFloat(int $min, int $max, int $charactersAfterTheDot): float{
        $float = $min+lcg_value()*(abs($max-$min));
        
        return round($float, $charactersAfterTheDot);
    }

    public function randomWord(int $wordSize): string{
        $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        return substr(str_shuffle($permitted_chars), 0, $wordSize);
    }
}
?>