<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * @return create();
	 */
	public function run()
	{   
		factory(App\User::class,5)->create();

		factory(App\Destination::class)->create([
			'name'=>'Bagan',
			'description'=> 'The ancient city of Bagan is perhaps one of the most interesting places in Myanmar. Over 2,000 Buddhist monuments dot the Bagan Archeological Zone that’s spread across 26 square miles. The best way to take in the entirety of this breathtaking city is to hop into a hot air balloon and fly over it. The rides take place in the wee hours of the morning. Carry a good camera so you can take photos of the monuments',
			'city'=>'Bagan',
			'division'=>'Mandalay',
		]);

		factory(App\Destination::class)->create([
			'name'=> 'Loikaw',
			'description'=> 'Loikaw was the Headquarters of the Political Officer in Charge of the Karenni States, part of the Princely States of British Burma, in 1922 during British rule in Burma. The town was located in the only flat part of the Karenni area',
			'city'=>'Loikaw',
			'division'=> 'Kayah',
		]);

		factory(App\Destination::class)->create([
			'name'=> 'Kyaiktiyo Pagoda',
			'description'=>'Mount Kyaiktiyo (Kyite Htee Yoe), famous for the huge golden rock perched at its summit, is one of the three most sacred religious sites in Myanmar, along with the Shwedagon Pagoda and the Mahamuni Temple. It is a wellknown Buddhist pilgrimage site in Mon State, Burma.',
			'city'=>'Kyaik Hto',
			'division'=> 'Mon',
		]);

		factory(App\Destination::class)->create([
			'name'=> 'Mount Popa',
			'description'=>'Mount Popa is one of the best Myanmar points of interest especially if you love to hike. The extinct volcano is not just magnificent to look at in itself but it’s topped by the Popa Taungkalat Monastery that’s perched on an outcrop. 777 steps will take you all the way to the top and reward you with panoramic views of the plains.',
			'city'=>'Mandalay',
			'division'=> 'Mandalay',
		]);

		factory(App\Destination::class)->create([
			'name'=> 'Ngwe Saung',
			'description'=>'Ngwe Saung or Silver Beach is one of the most popular. There are scuba diving and snorkeling facilities too if you want to explore the water. Cafes and restaurants nearby serve up dish after dish of lip-smacking seafood and snacks.Beaches in Myanmar are best visited during December-April when spring lends itself to deliciously warm weather. You can also catch the Water Festival (Thingyan) in April where everyone comes out to celebrate.',
			'city'=>'Ayeyarwady',
			'division'=> 'Ayeyarwady',
		]);

		factory(App\Destination::class)->create([
			'name'=> 'Kalaw',
			'description'=>'Ngwe Saug or Silver Beach is one of the most popular. There are scuba diving and snorkeling facilities too if you want to explore the water. Cafes and restaurants nearby serve up dish after dish of lip-smacking seafood and snacks.Beaches in Myanmar are best visited during December-April when spring lends itself to deliciously warm weather. You can also catch the Water Festival (Thingyan) in April where everyone comes out to celebrate.',
			'city'=>'Kalaw',
			'division'=> 'Shan',
		]);

		factory(App\Destination::class)->create([
			'name'=> 'Ngapali',
			'description'=>'Ngapali the most popular sand stretch around in Myanmar and does make up for one of the most popular relaxing spots in the entirety of Myanmar. The combination of the yellow-white sand is what makes it one of the most beautiful spots that you can sit and tan yourself and let loose of the thoughts that do intrigue you.',
			'city'=>'Thandwe',
			'division'=> 'Rakhine',
		]);

		factory(App\Destination::class)->create([
			'name'=> 'Pindaya',
			'description'=>'Pindaya is one of the off the beaten track sites that you will possibly come across. It is predominantly known around to provide a glimpse into the Buddhist histories in the nation. The entire landmark has completely formed from a series of deep caves and alone is home to over 8000 images of Lord Buddha. The statues and images are adorned in beautiful hues of gold and brass with the glimmering effect under the shadowy caverns. Apart from the spots around celebrating the religion, you will also find an amazing influx of tourists visiting the lake beside Pindaya. You can also trek through the region and cross mountains from Kalaw to Boot.',
			'city'=>'Pindaya',
			'division'=> 'Shan',
		]);

		factory(App\Destination::class)->create([
			'name'=> 'Hpa-An',
			'description'=>'Hpa-An is a very popular traveler town around in Myanmar which is not necessarily a lot visited around by the tourist but does make up for providing you with an amazing experience altogether. The rugged and rustic vibes from this specific town are what makes it unique and loved by the majority of the tourists who visit it. One of the most important and popular spots to visit around in Hpa-An is the Zaydan Road which is littered around with coffee joints and amazing spots to just sit down and have a relaxing day. The lakeside of Kan Thar Yar is yet another of the amazing spots to be around in and make sure to enjoy the reflective transparency of the water when you walk along it',
			'city'=>'Hpa-An',
			'division'=> 'Kayin',
		]);

		factory(App\Destination::class)->create([
			'name'=> 'Mandalay Palace',
			'description'=>'This is one of the best places to visit in Myanmar. The palace consists of a watchtower which you can climb and soak in the beautiful views of the city it offers. The most compelling thing about this palace is a pyramid which is made of gilt filigree built above the main throne of the palace. This is one of the important places to visit in Myanmar.',
			'city'=>'Mandalay',
			'division'=> 'Mandalay',
		]);

		//For Packages 
		//For Bagan
		factory(App\Package::class)->create([
			'destination_id' =>1,
			'name'=>'Normal',
			'description'=>'Boasting a bar, shared lounge and views of city, Bagan HMWE Hotel is situated in Bagan, 3.2 km from Manuha Temple. A wonderful place and the kindest service ever!',
			'price'=>37916,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>1,
			'name'=>'Premium',
			'description'=>'Situated in Bagan, 2.2 km from Izza Gawna Pagoda, Bagan Wynn Hotel features accommodation with a restaurant, free private parking, an outdoor swimming pool and a fitness centre. ',
			'price'=>49480,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>1,
			'name'=>'Gold',
			'description'=>'Golden View Hotel features a restaurant, outdoor swimming pool, a bar and garden in Bagan. Each accommodation at the 3-star hotel has pool views and free WiFi. Superb experience!',
			'price'=>62561,			
		]);

		//For Loikaw
		factory(App\Package::class)->create([
			'destination_id' =>2,
			'name'=>'Normal',
			'description'=>'The rooms come with air conditioning, a flat-screen TV with satellite channels, an electric tea pot, a bath, a hairdryer and a desk. Rooms are complete with a private bathroom equipped with free toiletries, while certain accommodations at the hotel also feature a seating area. All rooms have a closet.An Asian breakfast is available each morning at Myat Nan Taw Hotel.The nearest airport is Loikaw Airport, 3.5 km from the accommodation.  ',
			'price'=>26400,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>2,
			'name'=>'Premium',
			'description'=>'Located in Loikaw, Hotel Empire provides a bar and shared lounge. Among the facilities of this property are a restaurant, a 24-hour front desk and room service, along with free WiFi. Private parking can be arranged at an extra charge. At the hotel every room is equipped with a closet, a flat-screen TV and a private bathroom. A buffet breakfast is available daily at Hotel Empire.The nearest airport is Loikaw Airport, 2.3 km from the accommodation.',
			'price'=>47550,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>2,
			'name'=>'Gold',
			'description'=>'Demoso Lodge offers 4-star accommodations with a bar. Among the facilities of this property are a restaurant, a 24-hour front desk and room service, along with free WiFi throughout the property. Private parking can be arranged at an extra charge. At the hotel, the rooms come with a closet. Complete with a private bathroom, all rooms at Demoso Lodge come with air conditioning, and some rooms also feature a seating area.Guests at the accommodation can enjoy a continental breakfast.The nearest airport is Loikaw Airport, 22.5 km from the hotel. ',
			'price'=>135500,			
		]);

		//For Kyaiktiyo Pagoda
		factory(App\Package::class)->create([
			'destination_id' =>3,
			'name'=>'Normal',
			'description'=>'Pann Myo Thu Inn is offering accommodations in Kinmun. The property has a 24-hour front desk as well as free WiFi.At the inn, all rooms come with a desk. At Pann Myo Thu Inn the rooms include air conditioning and a private bathroom. Solo travelers in particular like the location – they rated it 8.5 for a one-person stay.  ',
			'price'=>20400,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>3,
			'name'=>'Premium',
			'description'=>'Every room is equipped with a satellite TV, a seating area and an electric kettle with coffee/tea making facilities. Air conditioning is also available in selected rooms. Fitted with shower facilities, the private bathroom includes free toiletries, a hairdryer and bathrobes.Located on the hilltop and surrounded by nature, guests can enjoy hiking with a local expert at the property. Other facilities such as meeting rooms, laundry and currency exchange can all be arranged at the 24-hour front desk.Guests can enjoy meals at the hotel restaurant as well as drinks at the bar. Room service is also available throughout the day.',
			'price'=>58000,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>3,
			'name'=>'Gold',
			'description'=>'The Merit Resort features a restaurant, outdoor swimming pool, a bar and shared lounge in Kinmun. The property has a garden, as well as a terrace. The property provides a 24-hour front desk, a shuttle service, room service and free WiFi.At the hotel, each room comes with a desk. Complete with a private bathroom equipped with a shower and a hairdryer, guest rooms at The Merit Resort have a flat-screen TV and air conditioning, and selected rooms are equipped with a seating area.The accommodation offers a continental or buffet breakfast.Guests at The Merit Resort will be able to enjoy activities in and around Kinmun, like cycling.ort Bagan',
			'price'=>79000,			
		]);

		//For Mount Popa
		factory(App\Package::class)->create([
			'destination_id' =>4,
			'name'=>'Normal',
			'description'=>'Located in the heartland of ancient Bagan, Myanmar Han Hotel Lays at the foot of Mt. Tu-Yin Taung, one of the beautiful landmarks of the region. Surrounding the hotel are the archaeological sites and monuments that have stood against the test of time. The hotel is only 15 mins drive away from the airport as well as the bus terminal.',
			'price'=>26395,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>4,
			'name'=>'Premium',
			'description'=>'The resort offers quiet and tranquil surroundings and the most stunning views of the beautiful Taung Kalatt monastery as the sun sets over the infinity pool.',
			'price'=>57452,		
		]);

		factory(App\Package::class)->create([
			'destination_id' =>4,
			'name'=>'Gold',
			'description'=>'The rooms offer air conditioning, and getting online is possible, as free wifi is available, allowing you to rest and refresh with ease.
				Popa Garden Resort features a 24 hour front desk, room service, and a coffee shop. ',
			'price'=>94362,			
		]);

		//For Ngwe Saung
		factory(App\Package::class)->create([
			'destination_id' =>5,
			'name'=>'Normal',
			'description'=>'Come join us at Dream House Guest House & Restaurant, only a 5 minute walk from Nwge Saung Beach. Rooms start at $10 and All rooms are private with bath room, clean and cozy, Banana Pan Cake, Vegetable Sandwich, Pad Thai Noodle, Fried Rice, Fried Noodle, Fried Vermicelli Coffee, Tea and Juice provided for breakfast and we offer the welcome juice, purified water, hot water, coffee, tea, green tea, cigar and thanakhar for face free anytime ',
			'price'=>12669,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>5,
			'name'=>'Premium',
			'description'=>'If you’re looking for a family-friendly small hotel in Ngwe Saung, look no further than Central Hotel Ngwesaung Beach.
				Ngwe Saung Beach (2.9 mi), located nearby, makes Central Hotel Ngwesaung Beach a great place to stay for those interested in visiting this popular Ngwe Saung landmar. Central Hotel Ngwesaung Beach is a family-friendly small hotel offering air conditioning and a minibar in the rooms, and it is easy to stay connected during your stay as free wifi is offered to guests.',
			'price'=>66611,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>5,
			'name'=>'Gold',
			'description'=>'Sunny Paradise Hotel offers guests an array of room amenities including a minibar, a refrigerator, and air conditioning, and getting online is possible, as free internet access is available.
				The resort offers a 24 hour front desk, a concierge, and room service, to make your visit even more pleasant. The property also features a pool and free breakfast. Guests arriving by vehicle have access to free parking.',
			'price'=>86177,			
		]);

		//For Kalaw
		factory(App\Package::class)->create([
			'destination_id' =>6,
			'name'=>'Normal',
			'description'=>'A charming two story colonial style red bricked B&B with wide welcoming porch, immaculate exterior, beautiful garden, marvelous fireplace and unique touches of Myanmar culture located at the heart of quiet and peaceful neighborhood in Kalaw. Rooms are spacious with gorgeous hardwood floors and private bathroom in the company of Myanmar rattan furniture and comfortable king-size or twins bed ',
			'price'=>36964,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>6,
			'name'=>'Premium',
			'description'=>'Set in Kalaw, 2.1 km from Shwe Oo Min Pagoda, Pine Land Oasis Hotel offers accommodation with a restaurant, free private parking and a bar. The accommodation features a 24-hour front desk, room service and ticket service for guests.',
			'price'=>58657,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>6,
			'name'=>'Gold',
			'description'=>'Dream Mountain Resort offers high standard hotel facilities, friendly services and good quality of foods with reasonable price.',
			'price'=>85893,			
		]);

		//For Ngapali
		factory(App\Package::class)->create([
			'destination_id' =>7,
			'name'=>'Normal',
			'description'=>'Golden Queen Hotel offers accommodation in Ngapali, a short walk from the beach. Private rooms include a seating area and air-conditioning for your convenience.  ',
			'price'=>48749,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>7,
			'name'=>'Premium',
			'description'=>'Located in Ngapali, 300 metres from Ngapali Beach, May 18 Guest House Ngapali provides accommodation with a garden and free private parking. ',
			'price'=>50780,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>7,
			'name'=>'Gold',
			'description'=>'Hotel Per night: Aureum Palace Hotel & Resort Bagan',
			'price'=>192700,			
		]);

		//For Pindaya
		factory(App\Package::class)->create([
			'destination_id' =>8,
			'name'=>'Normal',
			'description'=>'With a stay at Full Moon Guest House in Kalaw, you will be a 4-minute walk from Christ the King Church and 12 minutes by foot from Shwe Oo Min Phaya. Featured amenities include a 24-hour front desk, luggage storage, and laundry facilities. Free self parking is available onsite. ',
			'price'=>24600,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>8,
			'name'=>'Premium',
			'description'=>'Location close to the cave - gardens - large individual bungalows and terrace with nice view - Heated mattress (nights can be a bit cold) - free bikes - staff kindliness and service
				noise from prayers at night from close by pagoda (but not the hotel’s fault) - room equipment a bit outdated. Bed was good, airco worked well, good hot water, also room could use some maintenance but is acceptable and clean. Nice balcony, well maintained garden, quiet atmosphere.',
			'price'=>60200,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>8,
			'name'=>'Gold',
			'description'=>'A wonderful welcome and a real feeling of being part of a family are some of the joys of Pindaya Farm. Add to that great food, fabulous service, lovely rooms and peace and quiet and you get a splendid spot to sty, just outside of Pindaya.',
			'price'=>69700,			
		]);

		//For Hpa-An
		factory(App\Package::class)->create([
			'destination_id' =>9,
			'name'=>'Normal',
			'description'=>'Offering a restaurant, Hotel Angels Land is located in Kyaikhtaw. It offers comfortable rooms with air conditioning and free WiFi access. Guests enjoy the convenience of a 24-hour front desk. ',
			'price'=>18281,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>9,
			'name'=>'Premium',
			'description'=>'Golden Palace Hotel is located in Hpa-an, within 1.7 km of Hpa-an Night Market and 1.4 km of Shwe Yin Mhyaw Pagoda. This 3-star hotel offers a 24-hour front desk, room service and free WiFi. Really nice room in Hpa An and great price. Breakfast is a delicious buffet with many options. Great staff who are helpful with local area and onward travel. Really happy with this place.',
			'price'=>32500,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>9,
			'name'=>'Gold',
			'description'=>'Situated in Hpa-an, 5 km from Hpa-an Night Market, Thiri Hpa An Hotel features accommodation with a restaurant, free private parking, an outdoor swimming pool and a fitness centre. ',
			'price'=>65000,			
		]);

		//For Mandalay Palace
		factory(App\Package::class)->create([
			'destination_id' =>10,
			'name'=>'Normal',
			'description'=>'Located on 30th Street Between 77th & 76th Street, Mandalay, Myanmar. Near railway station, walk 1 minute, Diamond Palaza walk just 3 minutes, Gold Leave work walk 5 minutes and Maharmuni Image walk 10 Minutes. Zegyo Market walk 10 Minutes and Bagan & Mingoon jutty drive 10 minutes. Bus Station 15 minutes drive. U Bain Bridge 30 minutes driving. International airport 50 minutes driving. Hotel is located in central Mandalay. ',
			'price'=>26300,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>10,
			'name'=>'Premium',
			'description'=>'Shwe Ingyinn Hotel (SIG HOTEL) is located in 0.0 km from the center of Mandalay City near by famous Tourist places such as Mya Nan San Kyaw Palace, Mandalay Hill, Khuthotaw Pagoda where the World Largest book existed etc... Moreover Shwe Ingyinn Hotel opposites by Mandalay Central Railway Station and it just takes 45 minutes drive from Mandalay International Airport.',
			'price'=>48200,			
		]);

		factory(App\Package::class)->create([
			'destination_id' =>10,
			'name'=>'Gold',
			'description'=>'Yadanarpon Dynasty Hotel is quite close to Mandalay Royal Palace which is peaceful, delighted silent zone road-map of 65th, between 27th and 28th street. Decorated with contemporary implement to enjoy the odour age of Yadanarpon Dynasty. Sixth stories building design and/is nestled with cozy Villas, improved a beautiful green landscape. Organized with total of 80 rooms and 3 room types as Superior, Deluxe and Villa',
			'price'=>95600,			
		]);
	}
}