<?php

use Lessons\Lesson;
use Lessons\Lesson1;


beforeEach(function () {
    $this->distance = new Lesson();
});


test('that there is no difference between identical strands', function () {
    $this->assertEquals(0, $this->distance->render('A', 'A'));
});

it('completes hamming distance of single nucleotide strand', function () {
    $this->assertEquals(1, $this->distance->render('A', 'G'));
});

it('completes hamming distance of small nucleotide strand', function () {
    $this->assertEquals(2, $this->distance->render('AG', 'CT'));
});

it('calculates hamming distance', function () {
    $this->assertEquals(1, $this->distance->render('AT', 'CT'));
});

it('calculates hamming distance on a longer strand', function () {
    $this->assertEquals(1, $this->distance->render('GGACG', 'GGTCG'));
});

it('calculates hamming distance on a large strand', function () {
    $this->assertEquals(4, $this->distance->render('GATACA', 'GCATAA'));
});

it('calculates hamming distance on a very large strand', function () {
    $this->assertEquals(9, $this->distance->render('GGACGGATTCTG', 'AGGACGGATTCT'));
});

test('if correct exceptions are thrown', function()
{
    $this->expectException('InvalidArgumentException');
    $this->expectExceptionMessage('DNA strands must be of equal length.');
    $this->distance->render('GGACG', 'AGGACGTGG');
});