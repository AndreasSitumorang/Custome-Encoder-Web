<?php
namespace web;
class Status
{
 
protected $jsonPath;
protected $statuses;
 
public function __construct($jsonPath)
{
$this->jsonPath = $jsonPath;
$this->loadStatus();
}
 
private function loadStatus()
{
    $this->statuses = json_decode(\file_get_contents($this->jsonPath));
    }
   
    public function getLatestText()
    {
    $lastIndex = sizeof($this->statuses) - 1;
    return ($this->statuses[$lastIndex]->text);
    }
     
    public function getLatestDate()
    {
    $lastIndex = sizeof($this->statuses) - 1;
    return ($this->statuses[$lastIndex]->date);
    }

    public function getLatestText1()
    {
    $lastIndex = sizeof($this->statuses) - 1;
    return ($this->statuses[$lastIndex]->text);
    }
     
    public function getLatestDate1()
    {
    $lastIndex = sizeof($this->statuses) - 1;
    return ($this->statuses[$lastIndex]->date);
    }

    public function getLatestText2()
    {
    $lastIndex = sizeof($this->statuses) - 1;
    return ($this->statuses[$lastIndex]->text);
    }
     
    public function getLatestDate2()
    {
    $lastIndex = sizeof($this->statuses) - 1;
    return ($this->statuses[$lastIndex]->date);
    }

    public function getLatestText3()
    {
    $lastIndex = sizeof($this->statuses) - 1;
    return ($this->statuses[$lastIndex]->text);
    }
     
    public function getLatestDate3()
    {
    $lastIndex = sizeof($this->statuses) - 1;
    return ($this->statuses[$lastIndex]->date);
    }







    // to retrieve all the published statuses
    public function allStatuses()
    {
        return ($this->statuses);
        }
        // to add a new status
        public function addStatus($text)
        {
        $time = time();
        $date = date("d m Y H:i:s", $time);
        $this->statuses[] = [
        "time" => $time,
        "date" => $date,
        "text" => $text,
        ];
        // write the new list of statuses into a persistent file
        file_put_contents(
        $this->jsonPath, json_encode(
        $this->statuses, JSON_PRETTY_PRINT)
        );
        return (true);
        }
        }