<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Title;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testTitlesModeCount()
    {
        $title = new Title();
        //$value = 2;
        //$this->assertTrue( 1 === $value, 'Value should be 1' );
        $this->assertTrue( count( $title->all() ) === 6, 'It should have 6 titles');
    }
}
