<?php

class APITest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('<img src="http://media.giphy.com/media/13d2jHlSlxklVe/giphy.gif">');
    }

    /**
     * Test API Call
     *
     * @return void
     */
    public function testApiCall(){
        $this->get('api/v1/SAFEEqualiser/1/json')
                ->seeJson([
                    'ID' => 1,
                ]);
        $this->get('api/v1/SAFEEqualiser/1/xml');
    }
}   
