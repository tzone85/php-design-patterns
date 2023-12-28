<?php
// Subscriber Interface
interface Subscriber {
    public function update($postId);
}

//Publisher
class HealthyMe
{
    private $subscribers = array();
    private $post; 

    public function registerSubscriber(Subscriber $subs)
    {
        $this->subscribers[] = $subs;
        echo "Subscriber Added! ".PHP_EOL;
    }

    public function notifySubscibers()
    {
        foreach ($this->subscribers as $subscriber) {
            $subscriber->update($this->post);
        }
    }
    public function publishPost($post)
    {
        $this->post = $post;
        $this->notifySubscibers();
    }
}

// Concrete Subscriber (Can be many subscribers)
class FoodUpdateSubscribers implements Subscriber {
    public function update($postId)
    {
        echo "New Post with ID $postId, Published.".PHP_EOL;
    }
}

// client code
$publisher = new HealthyMe();
$subscriber = new FoodUpdateSubscribers();

$publisher->registerSubscriber($subscriber);
$publisher->publishPost(12);