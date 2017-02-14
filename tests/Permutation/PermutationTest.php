<?php

namespace PermutationTest;

use PHPUnit\Framework\TestCase;
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

    public function testGetByPos()
    {
        $permutation = new Permutation(2);
        $exists = [];
        for ($i=1;$i<=2;$i++) {
            $shift = $permutation->getByPos($i);
            $this->assertFalse(in_array($shift, $exists), 'Error in iteration #' . $i);
            $exists[]=$shift;
        }

        $permutation = new Permutation(3);
        $exists = [];
        for ($i=1;$i<=6;$i++) {
            $shift = $permutation->getByPos($i);
            $this->assertFalse(in_array($shift, $exists), 'Error in iteration #' . $i);
            $exists[]=$shift;
        }

        $permutation = new Permutation(4);
        $exists = [];
        for ($i=1;$i<=24;$i++) {
            $shift = $permutation->getByPos($i);
            $this->assertFalse(in_array($shift, $exists), 'Error in iteration #' . $i);
            $exists[]=$shift;
        }

        $permutation = new Permutation(5);
        $exists = [];
        for ($i=1;$i<=120;$i++) {
            $shift = $permutation->getByPos($i);
            $this->assertFalse(in_array($shift, $exists), 'Error in iteration #' . $i);
            $exists[]=$shift;
        }

        $exists2 = [];
        for ($i=121;$i<=240;$i++) {
            $shift = $permutation->getByPos($i);
            $this->assertTrue(in_array($shift, $exists), 'Error in iteration #' . $i);
            $this->assertFalse(in_array($shift, $exists2), 'Error in iteration #' . $i);
            $exists2[]=$shift;
        }
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