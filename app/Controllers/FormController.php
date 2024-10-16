<?php

namespace App\Controllers;

class FormController extends BaseController
{
		public function index(): string
		{
				$data = [
						'message' => 'Tämä on generoitu formi',
						'form' => [
                'name' => 'Testi lomake',
                'fields' => [
                    [
                        'name' => "Haluttu toimenpide",
                        'type' => "select",
                        'savedTo' => "acco_type",
                        'order' => 5,
                        'required' => true,
                        'values' => [
                            "Käyttöoikeuden lisäys",
                            "Käyttöoikeuden muutos",
                            "Käyttöoikeuden poisto"
                        ],
                    ],
                    [
                        'name' => "Lopetuspäivä",
                        'type' => "date",
                        'savedTo' => "end_date",
                        'order' => 10,
                        'required' => true,
                    ],
                    [
                        'name' => "Testi kenttä",
                        'type' => "text",
												'savedTo' => "test_field",
												'order' => 15,
												'required' => false,
                    ],
                    [
                        'name' => "Käyttöoikeuskohtainen rooli",
                        'type' => "select",
                        'savedTo' => "role",
                        'order' => 20,
                        'required' => true,
                        'values' => [
                            "Asianohjaaja (esihenkilö)",
                            "Valmistelija",
                            "Viranhaltija (esihenkilö)"
                        ],
                    ],
                ]
            ]
        ];

				return view('app', ['page' => 'TestForm', 'data' => $data]);
		}
}