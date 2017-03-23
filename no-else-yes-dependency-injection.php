<?php
/**
 *  DO NOT USE else EXAMPLE
 * - Don't use code. Refactor the code to get rid of "else"
 * - Use DI (Dependency Injection)
 * */
//////////////////////////////////////////////////////////////////////////////
/// Before refactoring: Bad way ///////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
function signUp($subscription){
    if ($subscription == 'monthly') {
        createMonthlySubscription();
    }
    else if($subscription == 'forever' )  // get rid of this part
    {
        createForeverSubscription();
    }   
}

//////////////////////////////////////////////////////////////////////////////
/// After refactoring: ///////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
/**
 * - No "else"
 * - Used interface 
 * - Used Dependency Injection 
 * 
 **/

interface Subscription{
    public function save();
}

class CreateMonthlySubscription implements Subscription{
    public function save(){
        echo("\nCreateMonthlySubscription\n");
    }
}

class CreateForeverSubscription implements Subscription{
    public function save(){
        echo("\nCreateForeverSubscription\n");
    }
}

class Subscribe{
    private $subscription;

    public function __construct(Subscription $subscription){
        $this->subscription = $subscription;
    }

    public function save(){
        $this->subscription->save();
    }
}

$subscribe = new Subscribe(new CreateForeverSubscription);
$subscribe->save();



