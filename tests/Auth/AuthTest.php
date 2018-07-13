<?php

namespace CodePress\CodeUser\Tests\Auth;

use CodePress\CodeUser\Tests\AbstractTestCase;
use Illuminate\Support\Facades\Auth;

/**
 * Description of AuthTest
 *
 * @author gabriel
 */
class AuthTest extends AbstractTestCase
{

    protected function setUp()
    {
        parent::setUp();
        $this->migrate();
    }

    public function test_check_if_not_authenticated()
    {
        $this->assertEquals(false, Auth::check());
    }

}
