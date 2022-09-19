<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\ActiveLinkHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\ActiveLinkHelper Test Case
 */
class ActiveLinkHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\ActiveLinkHelper
     */
    public $ActiveLink;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->ActiveLink = new ActiveLinkHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActiveLink);

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
