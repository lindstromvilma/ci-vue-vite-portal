<?php

namespace App\Controllers;

class ProfileController extends BaseController
{
	public function index(): string
	{
		// get logged in person and pass to view
		$data = [
			'isVue' => true,
			'title' => 'Käyttäjän tiedot',
			'user' => [
				'id' => 1,
				'name' => 'John Doe',
				'email' => 'john.doe@example.com',
				'phone' => '+1234567890',
				'branch' => 'New York',
				'role' => 'Admin',
				'permissions' => ['create', 'read', 'update', 'delete'],
				'created_at' => '2023-01-01 12:00:00',
				'updated_at' => '2023-01-10 15:30:00',
			],
		];

		return view('app', ['page' => 'Profile', 'data' => $data]);
	}

	public function edit(): string
	{
		// save edited data to database
	}
}
