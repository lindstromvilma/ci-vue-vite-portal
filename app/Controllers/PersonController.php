<?php

namespace App\Controllers;

class PersonController extends BaseController
{
		public function persons(): string
		{
				// testi data
				$data = [
						'message' => 'Työntekijät',
						'persons' => [
								[
										'id' => 1,
										'sukunimi' => 'Johnson',
										'etunimi' => 'Alice',
										'sähköposti' => 'alice.johnson@example.com',
										'puhelin' => '2354235645642576',
										'tehtävänimike' => 'Developer',
										'toimiala' => 'Tech',
										'työsuhteen_alkamispvm' => '2020-01-01',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 2,
										'sukunimi' => 'Smith',
										'etunimi' => 'Bob',
										'sähköposti' => 'bob.smith@example.com',
										'puhelin' => '4534535647',
										'tehtävänimike' => 'Designer',
										'toimiala' => 'Design',
										'työsuhteen_alkamispvm' => '2019-07-22',
										'työsuhteen_päättymispvm' => '2021-06-24'
								],
								[
										'id' => 3,
										'sukunimi' => 'Brown',
										'etunimi' => 'Charlie',
										'sähköposti' => 'charlie.brown@example.com',
										'puhelin' => '',
										'tehtävänimike' => 'Product Manager',
										'toimiala' => 'Product',
										'työsuhteen_alkamispvm' => '2018-03-10',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 4,
										'sukunimi' => 'Prince',
										'etunimi' => 'Diana',
										'sähköposti' => 'diana.prince@example.com',
										'puhelin' => '050593435845',
										'tehtävänimike' => 'Marketing Specialist',
										'toimiala' => 'Marketing',
										'työsuhteen_alkamispvm' => '2021-11-15',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 5,
										'sukunimi' => 'Norton',
										'etunimi' => 'Edward',
										'sähköposti' => 'edward.norton@example.com',
										'puhelin' => '',
										'tehtävänimike' => 'CTO',
										'toimiala' => 'Tech',
										'työsuhteen_alkamispvm' => '2015-05-20',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 6,
										'sukunimi' => 'Green',
										'etunimi' => 'Fiona',
										'sähköposti' => 'fiona.green@example.com',
										'puhelin' => '1234567890',
										'tehtävänimike' => 'HR Manager',
										'toimiala' => 'HR',
										'työsuhteen_alkamispvm' => '2016-09-12',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 7,
										'sukunimi' => 'King',
										'etunimi' => 'George',
										'sähköposti' => 'george.king@example.com',
										'puhelin' => '0987654321',
										'tehtävänimike' => 'Sales Executive',
										'toimiala' => 'Sales',
										'työsuhteen_alkamispvm' => '2017-10-02',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 8,
										'sukunimi' => 'Lewis',
										'etunimi' => 'Hannah',
										'sähköposti' => 'hannah.lewis@example.com',
										'puhelin' => '5678901234',
										'tehtävänimike' => 'Customer Support',
										'toimiala' => 'Support',
										'työsuhteen_alkamispvm' => '2018-04-05',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 9,
										'sukunimi' => 'Clark',
										'etunimi' => 'Ian',
										'sähköposti' => 'ian.clark@example.com',
										'puhelin' => '',
										'tehtävänimike' => 'Web Developer',
										'toimiala' => 'Tech',
										'työsuhteen_alkamispvm' => '2019-12-12',
										'työsuhteen_päättymispvm' => '2025-01-20'
								],
								[
										'id' => 10,
										'sukunimi' => 'Doe',
										'etunimi' => 'Jane',
										'sähköposti' => 'jane.doe@example.com',
										'puhelin' => '6543210987',
										'tehtävänimike' => 'Content Writer',
										'toimiala' => 'Content',
										'työsuhteen_alkamispvm' => '2020-08-19',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 11,
										'sukunimi' => 'Adams',
										'etunimi' => 'Karl',
										'sähköposti' => 'karl.adams@example.com',
										'puhelin' => '3214569870',
										'tehtävänimike' => 'Finance Analyst',
										'toimiala' => 'Finance',
										'työsuhteen_alkamispvm' => '2014-11-30',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 12,
										'sukunimi' => 'White',
										'etunimi' => 'Laura',
										'sähköposti' => 'laura.white@example.com',
										'puhelin' => '7890123456',
										'tehtävänimike' => 'Operations Manager',
										'toimiala' => 'Operations',
										'työsuhteen_alkamispvm' => '2017-06-25',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 13,
										'sukunimi' => 'Wilson',
										'etunimi' => 'Mike',
										'sähköposti' => 'mike.wilson@example.com',
										'puhelin' => '2345678901',
										'tehtävänimike' => 'Project Coordinator',
										'toimiala' => 'Projects',
										'työsuhteen_alkamispvm' => '2019-03-08',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 14,
										'sukunimi' => 'Martinez',
										'etunimi' => 'Nina',
										'sähköposti' => 'nina.martinez@example.com',
										'puhelin' => '3456789012',
										'tehtävänimike' => 'Graphic Designer',
										'toimiala' => 'Design',
										'työsuhteen_alkamispvm' => '2021-01-15',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 15,
										'sukunimi' => 'Brown',
										'etunimi' => 'Oscar',
										'sähköposti' => 'oscar.brown@example.com',
										'puhelin' => '4567890123',
										'tehtävänimike' => 'Software Engineer',
										'toimiala' => 'Tech',
										'työsuhteen_alkamispvm' => '2016-07-10',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 16,
										'sukunimi' => 'Harris',
										'etunimi' => 'Paul',
										'sähköposti' => 'paul.harris@example.com',
										'puhelin' => '5678901234',
										'tehtävänimike' => 'UX Designer',
										'toimiala' => 'Design',
										'työsuhteen_alkamispvm' => '2018-02-20',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 17,
										'sukunimi' => 'Turner',
										'etunimi' => 'Quinn',
										'sähköposti' => 'quinn.turner@example.com',
										'puhelin' => '6789012345',
										'tehtävänimike' => 'SEO Specialist',
										'toimiala' => 'Marketing',
										'työsuhteen_alkamispvm' => '2017-05-30',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 18,
										'sukunimi' => 'Green',
										'etunimi' => 'Rachel',
										'sähköposti' => 'rachel.green@example.com',
										'puhelin' => '7890123456',
										'tehtävänimike' => 'Business Analyst',
										'toimiala' => 'Business',
										'työsuhteen_alkamispvm' => '2020-03-15',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 19,
										'sukunimi' => 'Rogers',
										'etunimi' => 'Steve',
										'sähköposti' => 'steve.rogers@example.com',
										'puhelin' => '8901234567',
										'tehtävänimike' => 'Network Administrator',
										'toimiala' => 'Tech',
										'työsuhteen_alkamispvm' => '2015-09-01',
										'työsuhteen_päättymispvm' => ''
								],
								[
										'id' => 20,
										'sukunimi' => 'Turner',
										'etunimi' => 'Tina',
										'sähköposti' => 'tina.turner@example.com',
										'puhelin' => '',
										'tehtävänimike' => 'Administrative Assistant',
										'toimiala' => 'Admin',
										'työsuhteen_alkamispvm' => '2022-01-01',
										'työsuhteen_päättymispvm' => ''
								]
						]
				];

				return view('app', ['page' => 'Persons', 'data' => $data]);
		}
}