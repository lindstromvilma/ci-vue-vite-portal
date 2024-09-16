<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        $data = [
            'message' => 'Tervetuloa Luukkuun!',
        ];

        return view('app', ['page' => 'Home', 'data' => json_encode($data)]);
    }

		public function list(): string
    {
        $data = [
            'message' => 'Oma lista - Lisää listaan asioita ja posita turhat',
        ];

        return view('app', ['page' => 'List', 'data' => json_encode($data)]);
    }

		public function ticket(): string
    {
        $data = [
            'message' => 'Asiointilippu hakemus',
        ];

        return view('app', ['page' => 'Ticket', 'data' => json_encode($data)]);
    }

		public function persons(): string
    {
        $data = [
            'message' => 'Työntekijät',
        ];

        return view('app', ['page' => 'Persons', 'data' => json_encode($data)]);
    }
}