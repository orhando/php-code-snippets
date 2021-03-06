<?php
/**
 * We are sorting an object array by their properties as ascending or descending.  
 *
 * Especially, pay attention in this rows.
 * 
 * ---------------------------------------------------------------------------
 *        usort($this->users, function($userOne, $userTwo) use ($propery, $direction){
 *           
 *           if(strtolower($direction) == 'desc')
 *               return $userTwo->$propery() <=> $userOne->$propery();
 *
 *           return $userOne->$propery() <=> $userTwo->$propery();
 *        });
 * ---------------------------------------------------------------------------
 * $collection->sortBy('age');
 * ---------------------------------------------------------------------------
 * $collection->sortBy('age', 'desc');
 * 
 **/

class User{
    protected $name;
    protected $age;
    
    public function __construct($name, $age){        
        $this->name = $name;
        $this->age = $age;
    }

    public function name(){
        return $this->name;
    }

    public function age(){
        return $this->age;
    }
}

class UserCollection{
    protected $users;

    public function __construct(array $users){

        $this->users = $users;
    }

    public function sortBy($propery, $direction='asc'){
        
        usort($this->users, function($userOne, $userTwo) use ($propery, $direction){
            
            if(strtolower($direction) == 'desc')
                return $userTwo->$propery() <=> $userOne->$propery();

            return $userOne->$propery() <=> $userTwo->$propery();
        });
    }

    public function users(){
        return $this->users;        
    }
}

$collection = new UserCollection([
        new User('Orhan', 38),
        new User('Ahmet', 37),
        new User('Turan', 38),
        new User('Serdar', 36)
    ]);

$collection->sortBy('age');
var_dump($collection->users());

$collection->sortBy('age','desc');
var_dump($collection->users());

$collection->sortBy('name');
var_dump($collection->users());

$collection->sortBy('name', 'desc');
var_dump($collection->users());

