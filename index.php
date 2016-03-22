<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>MDA Sorting algorithms</title>
    </head>
    <body>
        <?php
        
        $a = new ArrayGenerator();
        $testArr = $a->generate_array();
        print_r($testArr[0]["models"]);
        $z = sizeof($testArr[0]["models"]);
        
        //echo $z;
        $sorter = new Sorter($testArr);
        $sorted = $sorter->sortMDArray($testArr[0]["models"]);
        testSort();
        echo "SORT:".$ss.":SORT";
        //print_r($sorted);
        
        $asd = $sorter->newTest($testArr);
        echo "<br></br><br></br>".$asd;
        //print_r($asd);
        
        function testSort() {
                //$size = sizeof($arr[0]);
                $size = 123;
                echo "SORT:".$ss.":SORT";
                return $size;
            }

        class Sorter {
            
            public $arr_length;
            public $arrayToSort;
            
            function __construct($array) {
                $this->arr_length = count($array, 1);
                $this->arrayToSort = $array;
            }
            
            
            
            function sortMDArray($arr) {
                $step1 = $this->unite_array($arr);
                $step2 = $this->sort_array($step1);
                $step3 = $this->divide_array($step2);
                //var_dump($step3);
                return $step3;
            }
            
            function unite_array($testArr) {
                
                
                $array_length = count($testArr, 1);
                $newArr = array();

                for ($i = 0; $i < $array_length; $i++) {
                    for ($l = 0; $l < count($testArr[$i]); $l++) {
                        array_push($newArr, $testArr[$i][$l]);
                    }
                }
                return $newArr;
            }
            
            function sort_array($arr) {
                $cna = count($arr);
                $temp = 0;
                
                for ($j = 0; $j < $cna; $j++) {
                    for ($k = 0; $k < $cna; $k++) {
                        if ($arr[$j] < $arr[$k]) {
                            $temp = $arr[$j];
                            $arr[$j] = $arr[$k];
                            $arr[$k] = $temp;
                        }
                    }
                }
                return $arr;
            }
            
            function divide_array($arr) {
               
                $y = 0;
                for ($i = 0; $i < $this->arr_length; $i++) {
                    for ($l = 0; $l < count($this->arrayToSort[$i]); $l++) {
                        $this->arrayToSort[$i][$l] = $arr[$y];
                        $y++;
                    }
                }
                return $this->arrayToSort;
            }
            
            
        }
       
        class ArrayGenerator {
            /*
             * 
             */
            
            function generate_array() {
                $numbersArray = array
                    (
                    array(17,40,8,22),
                    array(3,1,5,21,11),
                    array(6,5,2,62),
                    array(4,17,15,12)
                    );
                $json = file_get_contents('./models-json.txt');
                $obj = json_decode($json,1);
                return $obj;
            }    
        }
        ?>
    </body>
</html>
