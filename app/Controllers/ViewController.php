<?php

namespace App\Controllers;

class ViewController extends BaseController
{
	// Tämä näkymä ladataan Vue applikaation sisään
	public function alerts()
	{
		$data = [
			'message' => 'Toimii!',
		];

		return view('alerts', $data);
	}
}
