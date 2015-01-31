<?php

class OperatorController extends BaseController {

	public function getIndex()
	{
		return 'oii';
	}
	public function getMasuk()
	{
		return View::make('operator.masuk');
	}

}