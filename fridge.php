<?php
class Fridge
{
   
    public $serial = '111'; 
    protected $isWorking = true;
    public $degress; // Levy Kim: need to be protected;
    public $contain = [];  // Levy Kim: need to be protected;
    public $basicFood = ['milk', 'cheese', 'apple'];  // Levy Kim: need to be protected;
    protected $hasBasic = true;
    protected $MissingFoodItems =[];

    public function __construct($serial = 0, $degrees = 0, $contain = [])
    {
        /*
     // Levy Kim: 
         $tesRef = new Fridge();
         $anotherTesRef = new Fridge();
         $tesRef->serial === $anotherTesRef->serial
     קוד שלך נותן לי אופציה לעשות 2 מקררים עם אותו מספר סידורי. זה לא יכול להיות במציות 
    */
        $this->serial = $serial;
        $this->degress = $degrees;
        $this->contain = $contain;
    }

    public function getIsWorking()
    {
        if ($this->isWorking) {
            return 'true';
        } else {
            return 'false';
        }
        

    }

    public function oppositIsWorking()
    {
        $this->isWorking = !$this->isWorking;
    }

    public function setContain($array)
    {
        $this->contain = (array_merge($this->contain, $array));
    }

    // protected function outProduc($el){
    //     return !$el==$product;
    // }

    public function outOfFridge($array)
    {
        foreach ($array as $arr) {
            $this->contain = array_filter($this->contain, function ($el) use ($arr) {
                return $el != $arr;
            });
        }
    }


    public function printContainAndDegress()
    {
        var_dump($this->contain);
        // LevyKim: לא טוב להשתמש VAR_DUMP להדפסה.
       // LevyKim: שווה לעשות לולאה 
        echo "<br> the degress are: $this->degress <hr>";
    }

    public function isTooHot()
    {
        if ($this->degress > 4) {
            echo "the $this->degress degress are too hot";
        } else {
            echo "the $this->degress degress are OK";
        }
        echo "<hr>";
    }

    //     if (in_array("Glenn", $people))
    //     {
    //     echo "Match found";
    //     }
    //   else
    //     {
    //     echo "Match not found";
    //     }
    
    
    

    public function hasBasicFood()
    { 
        foreach ($this->basicFood as $el) {
            if (!in_array($el, $this->contain)) {
                $this->hasBasic =(boolean) false;
            }
        }
        echo $this->hasBasic;
         // LevyKim: פונקציה הזות בודקת רק אם קיים אחב ממוצרי BASIC במקרר. 
        
    }

    public function getMissingFoodItems(){
        echo "<hr> getMissingFoodItems ";
        foreach ($this->basicFood as $el) {
            if (!in_array($el, $this->contain)) {
                array_push($this->MissingFoodItems,$el);
            }
        }
        var_dump( $this->MissingFoodItems);

    }
}


$leaFridge = new Fridge('1234', 5);
$parentFridge = new Fridge(5678, 40, ['milk', 'cheese', 'apple']);
// echo $leaFridge->serial;
$leaFridge->oppositIsWorking();
// echo $leaFridge->getIsWorking();
$leaFridge->setContain(['banana', 'lemon', 'apple']);
$leaFridge->setContain(['avokado', 'cucumber', 'tomato']);

var_dump($leaFridge->contain);
$leaFridge->outOfFridge(['lemon', 'apple', 'banana']);
echo "<br>";
var_dump($leaFridge->contain);

echo '<hr>';
// var_dump($parentFridge->contain);
$parentFridge->printContainAndDegress();
$parentFridge->isTooHot();
$parentFridge->hasBasicFood();
$leaFridge->getMissingFoodItems();
