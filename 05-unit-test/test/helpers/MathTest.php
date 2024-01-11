<?php
require __DIR__.'/../../config/app.php';


use Helpers\Math;

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase {
	public string $regex;
	public function setUp(): void {
		$num = "-?\d+(\.\d+)?";
		$this->regex = $this->matchOp($num, $num, $num);
	}

	public function matchOp($num1, $num2, $result){
		return "/^(La ((suma obtenida de {$num1} \+)|(resta obtenida de {$num1} \-)) {$num2} es igual a {$result})$/";
	}
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
		$this->expectExceptionMessage("No puedes dividir entre cero");
		$result = $math->division();
		
	}

	public function testVerifySumFormatted() {
		$math = new Math(15.3, 88.8);
		$math->viewSum('+');
		$this->expectOutputRegex($this->regex);
	}

	public function testVerifySumExact(){
		$math = new Math(15.3, 88.8);
		$math->viewSum('+');
		$this->expectOutputRegex($this->matchOp(15.3, 88.8, 104.1));
	}

	public function testVerifySubtractExact(){
		$math = new Math(15.3, 88.8);
		$math->viewSum('-');
		$this->expectOutputRegex($this->matchOp(15.3, 88.8, -73.5));
	}

	/**
	 * Undocumented function
	 *
	 * @small
	 */
	public function testPruebaRiesgo() {
		// Omitimos esta prueba
		$this->markTestSkipped("Esta prueba está siendo omitida porque es lenta y no es necesario ejecutarla siempre");
		$math = new Math(5.5, 8.8);

		// 2- Act = Actuar
		$resultSum = $math->pruebaLenta();
		
		// 3- Assert = Comprobar
		$this->assertEquals(14.3, $resultSum);		
	}

	/**
	 * @requires PHP <= 7
	 */
	public function testIncomplete(){
		$math = new Math(15.3, 88.8);
		$math->viewSum('+');
		// $this->markTestIncomplete("Esta prueba aún está incompleta");
	}

	public function testGeneraUnNumeroAleatorio() {
		$mathMock = $this->getMockBuilder(Math::class)->setConstructorArgs([0, 0])->getMock();
		$mathMock->expects($this->once())->method("getRandom")->willReturn(7);
		$result = $mathMock->getRandom();
		$this->assertEquals(7, $result);
	}

}