<?php

namespace PermutationTest;

require_once __DIR__ . '/TestCase.php';

use Permutation\Permutation;

class PermutationTest extends TestCase
{
    public function testCount()
    {
        $permutation = new Permutation(10);
        $this->assertEquals(10, $permutation->count());
    }

    /**
     * @expectedException \Permutation\Exception
     */
    public function testExceptionZero()
    {
        new Permutation(0);
    }

    public function testPermuteArray()
    {
        $permutation = new Permutation(2);
        $this->assertEquals([0 => [0, 1], 1 => [1, 0]], $permutation->permuteArray());
    }

    /**
     * @expectedException \Permutation\Exception
     */
    public function testExceptionMany()
    {
        new Permutation(PHP_INT_MAX);
    }

    public function testCurrent()
    {
        $permutation = new Permutation(3);
        $this->assertEquals(array(0, 1, 2), $permutation->current());
    }

    public function testNext()
    {
        $permutation = new Permutation(3);
        $this->assertEquals(array(0, 2, 1), $permutation->next());
    }

    public function testOverflow()
    {
        $permutation = new Permutation(2);
        $this->assertEquals(array(1, 0), $permutation->next());
        $this->assertEquals(array(0, 1), $permutation->next());
        $this->assertEquals(array(1, 0), $permutation->next());
        $this->assertEquals(array(0, 1), $permutation->next());
    }

}