<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\DateHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\DateHelper Test Case
 */
class DataHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\DateHelper
     */
    public $Data;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Data = new DateHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Data);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
