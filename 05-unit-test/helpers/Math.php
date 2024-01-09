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
}
