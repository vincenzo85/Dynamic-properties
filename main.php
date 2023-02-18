<?php

class Test {
  public $a = 'a';
  public $array_random = [];
  public $prodotti_listino_a=[];
  public $prodotti_listino_b=[];
  public $prodotti_listino_c=[];
  public $prodotti_listino_d=[];
  
  public function __construct(){


    $this -> array_random = $this -> create_random_array();
    $this -> suddividi_per_listino_variabili();
    //var_dump($t);
  }

  public function random_property(){
      $codice_listino = ['a','b','c', 'd'];
      return $codice_listino[rand(0, count($codice_listino)-1)];
  }

  public function random(){
       $characters = 'BCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 6; $i++) {
            $randstring = $characters[rand(0, strlen($characters))];
            $randstring .= $characters[rand(0, strlen($characters))];
            $randstring .= $characters[rand(0, strlen($characters))];
            $randstring .= $characters[rand(0, strlen($characters))];
            $randstring .= $characters[rand(0, strlen($characters))];
        }
        return $randstring;
  }

  public function create_random_array(){
      $array = [];
       for ($i = 0; $i < 20; $i++) {
         $el = [
                'sku'=>$this->random(), 
                'listino'=>$this->random_property()
               ];
                array_push($array, $el);
        }
     return $array;
  }
 

  public function suddividi_per_listino(){
    // per ogni prodotto
    
    foreach($this -> array_random as $prodotto){
      if ($prodotto['listino'] =='a'){
        array_push($this->prodotti_listino_a, $prodotto);  
      }
      if ($prodotto['listino'] =='b'){
        array_push($this->prodotti_listino_b, $prodotto);  
      }
      if ($prodotto['listino'] =='c'){
        array_push($this->prodotti_listino_c, $prodotto);  
      }
      if ($prodotto['listino'] =='d'){
        array_push($this->prodotti_listino_d, $prodotto);  
      }
    }

 
    
  }

  public function mostra_risultati(){
      var_dump($this->prodotti_listino_a);
      var_dump($this->prodotti_listino_b);
      var_dump($this->prodotti_listino_c);
      var_dump($this->prodotti_listino_d);
  }

   public function suddividi_per_listino_variabili(){
      foreach($this -> array_random as $prodotto){
        $this -> condizioni('prodotti_listino_a', $prodotto, 'a');
        $this -> condizioni('prodotti_listino_b', $prodotto, 'b');
        $this -> condizioni('prodotti_listino_c', $prodotto, 'c');
        $this -> condizioni('prodotti_listino_d', $prodotto, 'd');
      }

     $this -> mostra_risultati();
   }

  public function condizioni($prodotti_listino, $prodotto, $listino){

          if ($prodotto['listino'] ==$listino){
          array_push($this->{$prodotti_listino}, $prodotto);  
          }
  }

  
}

$a = new Test();