<?php

namespace App\Http\Controllers\Admin;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Destination;
use App\Services\Destinations\DestinationService;
use Illuminate\Http\Request;

/**
 * Destination Controller of Admin
 */
class AdminDestinationController extends Controller {
		/**
		 * Service of Destination
		 * @var $destinationService
		 */
		private $destinationService;

		/**
		 * Constructor of AdminDestinationController
		 */
		public function __construct() {
			$this->destinationService = new DestinationService();
		}

		/**
		 * Show Destination List
		 * @return view
		 */
		public function index() {
			$data=(config('constant.location'));
			$destinations = $this->destinationService->getDestinationList();
			return view('Admin.destinations.index',compact('destinations'),compact('data'));
		}

		/**
		 * Create a destination by Admin
		 * @return view
		 */
		public function create() {
			$data=(config('constant.location'));
			return view('Admin.destinations.create',compact("data"));
		}

		/**
		 * Store destination information to Database
		 * @param  Request
		 * @return view
		 */
		public function store(Request $request) {
			$request->validate([
				'name' => ['required','not_regex:/<script\\b[^>]*>(.*?)<\\/script>/i'],
				'city' => ['required' ],
				'division' => ['required'],
				'description' => ['required','not_regex:/<script\\b[^>]*>(.*?)<\\/script>/i']
			]);
			$destination = $this->destinationService->storeDestination($request);
			if($request->hasfile('images')) {
				foreach($request->file('images') as $image) {
					$name = $image->getClientOriginalName();
					$image->storeAs('/images/destination/'.$destination->id, $name);
				}
			}
			return redirect()->route('destinations.index')
			->with('success','Destination created successfully.');
		}

		/**
		 * Show Destination information by Id
		 * @param  Destination
		 * @return view
		 */
		public function show(Destination $destination) {
			$destination = $this->destinationService->showDestination($destination->id);
			return view('Admin.destinations.show',compact('destination'));
		}

		/**
		 * Edit Destination information by Admin
		 * @param  Destination
		 * @return view
		 */
		public function edit(Destination $destination) {
			$data=(config('constant.location'));

			return view('Admin.destinations.edit',compact('destination'),compact('data'));
		}

		/**
		 * Update Destination Information by Admin
		 * @param  Request
		 * @param  $id
		 * @return view
		 */
		public function update(Request $request, $id) {
			$request->validate([
				'name' => ['required','not_regex:/<script\\b[^>]*>(.*?)<\\/script>/i'],
				'city' => ['required'],
				'division' => ['required'],
				'description' => ['required','not_regex:/<script\\b[^>]*>(.*?)<\\/script>/i']
			]);
			$destination = $this->destinationService->updateDestination($request,$id);
			$img = count($destination->image);
			if($img < 5){
			return redirect()->route('destinations.index')
			->with('success','Destination updated successfully.');
			}else {
				return redirect()->route('destinations.edit',$destination->id)
			->with('success','Please select four image.');
			}
		}

		/**
		 * Delete Destination Details by Admin
		 * @param  Destination
		 * @return view
		 */
		public function delete(Destination $destination) {
			$destinations = $this->destinationService->deleteDestination($destination->id);
			return redirect()->route('destinations.index')
			->with('success','Destination deleted successfully');
		}

		/**
		 * Search Destination list by Name, City and Division
		 * @param  Request
		 * @return view
		 */
		public function search(Request $request) {
			$data=(config('constant.location'));
			$destinations = $this->destinationService->searchDestination($request);
			return view('Admin.destinations.index',compact('destinations'),compact('data'));
		}
}
