<?php

class Model
{
	public function listEleve()
	{
        $csvData = file_get_contents('list.csv');
        $lines = explode(PHP_EOL, $csvData);
        $array = array();
        foreach ($lines as $line) {
            $array[] = str_getcsv($line);
        }
        $list = array();

        foreach ($array as $eleve) {
            foreach ($eleve as $key) {
                array_push($list, $key);
            }
        }

        for ($i = 0; $i < 3; $i++) {
            array_shift($list);
        }

        return $list;
	}
}