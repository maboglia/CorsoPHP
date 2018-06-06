<?php

/**
 *
 */
class Serie
{
  private $nomeSerie;
  private $valutazione;
  private $locandina;

  public static function accapocchia(){
    return "accapocchia";
  }
  public function getNomeSerie(){
    return $this->nomeSerie;
  }


  function __construct($n,$v,$l)
  {
    $this->nomeSerie=$n;
    $this->valutazione=$v;
    $this->locandina=$l;

  }
  public function __toString()
  {
    return "<h1>".$this->nomeSerie."</h1>"
    ."<img src= '".$this->locandina."'>"
    ."<h2>  la valutazione di questa serie è: ".$this->valutazione."</h2>";
  }

}


 ?>
