<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use Sober\Controller\Controller;

class Search extends Controller
{
	protected $SEARCH_API_URL = '';

	public function __construct()
	{
		// Add field to .env in root
		// SEARCH_API_URL=<URL to the search>
		if (!empty(env('SEARCH_API_URL'))) {
			$this->SEARCH_API_URL = env('SEARCH_API_URL');
		}
	}

	public function results()
	{
		$query = $_GET["s"];
		//$paged = $_GET["p"];
		$client = new Client([
		    'base_uri' => $this->SEARCH_API_URL,
		    // You can set any number of default request options.
		    'timeout'  => 15.0,
		]);

		$response = $client->request('GET', '', [
			'query' => [
				'q' => $query,
				'hits' => 50,
			]
		]);

		$response_body = json_decode($response->getBody());
		
		foreach ($response_body->vardgivarwebben->documents as $key => $vdoc) {
			$vdoc->category = "vgw";
		}
		foreach ($response_body->styrdadokument->documents as $key => $sdoc) {
			$sdoc->category = "std";
		}
		$all = array_merge($response_body->vardgivarwebben->documents, $response_body->styrdadokument->documents);

		return array(
			#JSON SAKNAS-HOS-FINDWISE--> "all_documents" => $response_body->documents->documents,
			"all_documents" => $response_body->halland->documents, #<-- JOHN ÄNDRAT 
			
			"vgw" => $response_body->vardgivarwebben->documents,
			"stats" => array(
				#JSON SAKNAS-HOS-FINDWISE--> "all_hits" => $response_body->documents->numberOfHits,
				"all_hits" => $response_body->halland->numberOfHits, #<-- JOHN ÄNDRAT 
				"vgw_hits" => $response_body->vardgivarwebben->numberOfHits,
				"std_hits" => $response_body->styrdadokument->numberOfHits

	/*  JOHN 5 DEC 2018 ######################################################################
	FINDWISE NI MÅSTE LÄGGA TILL/TILLBAKA nedan på json indexeringen för att anropet ska fungera
	VARIABEL RAD 52 $response_body->documents->documents

	JSON - http://193.183.15.219:8080/rest/apps/regionhalland/searchers/halland

  	"documents" : {
    "id" : "vardgivarwebben",
    "displayName" : "Documents",
    "numberOfHits" : 76,
    "documents" : [ { xxxxx } ]
		},
		
	########################################################################################### */


			)
		);
	}
}
