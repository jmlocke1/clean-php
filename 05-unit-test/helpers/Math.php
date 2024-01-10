<?php
namespace Helpers;
require_once __DIR__ . "/../config/app.php";
use DivisionByZeroError;

class Math {
	private float $firstValue, $secondValue;

	public function __construct(float $firstValue, float $secondValue)
	{
		$this->firstValue = $firstValue;
		$this->secondValue = $secondValue;
	}
	public function sum(): float {
		return $this->firstValue + $this->secondValue;
	}

	public function subtraction(): float {
		return $this->firstValue - $this->secondValue;
	}

	public function multiply(): float {
		return $this->firstValue * $this->secondValue;
	}

	public function division(): float {
		if($this->secondValue === 0.0){
			throw new DivisionByZeroError("No puedes dividir entre cero");
		}
		return $this->firstValue / $this->secondValue;
	}

	public function viewSum($op){
		if($op === '+'){
			$word = 'suma';
			$result = $this->sum();
		}else if($op === '-'){
			$word = 'resta';
			$result = $this->subtraction();
		}else{
			return;
		}
		// echo "La {$word} obtenida de {$this->firstValue} {$op} {$this->secondValue} es igual a {$result}";
		echo "La {$word} obtenida de {$this->firstValue} {$op} {$this->secondValue} es igual a {$result}";
	}

	public function pruebaLenta(){
		$m= 0;
		for($i=0; $i < 1000000000; $i++){
			$m += $i*2;
			$t = $i*$m;
		}
		return $this->sum();
	}

	public function getRandom() {
		return rand(5, 20);
	}
}
