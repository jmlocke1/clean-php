<?php
require __DIR__.'/../../config/app.php';


use Helpers\Math;

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase {
	public function testSumaDeDosNumerosEnteros() {
		// AAA Pattern - Patrón de las tres A

		// 1- Arrange = Organizar o inicializar
		$math = new Math(40, 10);

		// 2- Act = Actuar
		$resultSum = $math->sum();
		
		// 3- Assert = Comprobar
		$this->assertEquals(50, $resultSum);
	}

	public function testSumaDeDosNumerosFlotantes() {
		// AAA Pattern - Patrón de las tres A

		// 1- Arrange = Organizar o inicializar
		$math = new Math(5.5, 8.8);

		// 2- Act = Actuar
		$resultSum = $math->sum();
		
		// 3- Assert = Comprobar
		$this->assertEquals(14.3, $resultSum);
	}

	public function testSubtraction(){
		$math = new Math(5, 8);
		$result = $math->subtraction();
		$this->assertEquals(-3, $result);
	}

	public function testMultiply(){
		$math = new Math(5, 8);
		$result = $math->multiply();
		$this->assertEquals(40, $result);
	}

	public function testDivision(){
		$math = new Math(5, 2);
		$result = $math->division();
		$this->assertEquals(2.5, $result);
	}

	public function testDivisionByZero(){
		$math = new Math(5, 0);
		$this->expectException(DivisionByZeroError::class);
		$this->expectExceptionMessage(trad());
		$result = $math->division();
		
	}
}