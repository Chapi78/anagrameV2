<?php

class anagram{

    public $mot;
    public $option;
    public $index;

    public function initialise($argv) {
        // var_dump($argv);
        $mot = $argv[1];
        $limite = strlen($mot);
        if(isset($argv[2])) {
            $option = $argv[2];
            if($option <= 0 || $option > $limite) {
                echo 'Veuillez entrer un nombre correct'. PHP_EOL;
            }
        }
        $first = $this->word_count($mot);
        // var_dump($first);
        // $this->compare($lettres);
        // $dico = fopen("anagram-master-dictionnaire.txt", 'r');
        // $i = 1;
        // while($i <= 3) {
        //     $test = $this->word_count(trim(fgets($dico)));
        //     if($this->compare($first, $test) === 1) {
        //         echo trim(fgets($dico))."\n";
        //     }
        //     // var_dump($test);
        //     $i++;
        // }
        // fclose($dico);
    }

    public function word_count($mot) {
        $alphabet = [
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
        ];

        foreach($alphabet as $cara) { 
            $alphaCount[] = $this->checkCara($cara, $mot);
        }
        return $alphaCount;
    }

    public function checkCara($cara, $mot) {
        echo "\ncara :".$cara."\n";
        $alphabet = [
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
        ];
        $trimlist = "";
        foreach($alphabet as $admi) {
            if($admi !== $cara) {
                $trimlist = $admi.$trimlist;
            }
        }
        var_dump($trimlist);
        $initialLen = strlen($mot);
        $out = trim($mot, $trimlist);
        $outLen = strlen($out);
        $diff = $initialLen - $outLen;
        echo "diff: ".$diff."\n";
        echo "outlen: ".$outLen."\n";
        echo "initialLen: ".$initialLen."\n";
        if($diff <= 0) {
            return 0;
        } else {
            return $outLen;
        }
    }

    public function compare($first, $test) {
        for($i = 0; $i < 25; $i++) {
            if($first[$i] !== $test[$i]) {
                return 0;
            }
            // echo "first: ".$first[$i]."\n";
            // echo "test: ".$test[$i]."\n";
        }
        echo "end next word\n\n";
        return 1;
    }
}

$yolo = new anagram();
$yolo->initialise($argv);