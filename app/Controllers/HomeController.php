<?php

namespace App\Controllers;

class HomeController extends BaseController
{
	public function index(): string
	{
		$data = [
			'isVue' => true,
			'message' => 'Tervetuloa Luukkuun!',
			'news' => [
				[
					'title' => 'Uusi Portaali avattu',
					'date' => '2024-09-01',
				],
				[
					'title' => 'Tiedote uusista ominaisuuksista',
					'date' => '2023-08-02',
				],
				[
					'title' => 'Henkilöhaut toimivat',
					'date' => '2023-04-20',
				],
				[
					'title' => 'Tietokanta päivitetty',
					'date' => '2023-02-08',
				]
			]
		];

		return view('app', ['page' => 'Home', 'data' => $data]);
	}

	public function list(): string
	{
		$data = [
			'isVue' => true,
			'message' => 'Oma lista - Lisää listaan asioita ja posita turhat',
			'list' => [],
		];

		return view('app', ['page' => 'List', 'data' => $data]);
	}

	public function ticket(): string
	{
		$data = [
			'isVue' => true,
			'message' => 'Asiointilippu hakemus',
			'popovers' => [
				[
					'id' => 'duration',
					'content' => 'Valitse toistaiseksi, jos lupa on voimassa toistaiseksi. Valitse määräajaksi, jos lupa on voimassa määräajan.',
				],
			],
		];

		return view('app', ['page' => 'Ticket', 'data' => $data]);
	}

	public function alerts(): string
	{
		// return view('app', ['page' => 'Alerts']);
		$data = [
			'isVue' => false,
			'phpViewUrl' => '/viewcontroller/alerts'
		];

		return view('app', ['page' => 'Alerts', 'data' => $data]);
	}
}
