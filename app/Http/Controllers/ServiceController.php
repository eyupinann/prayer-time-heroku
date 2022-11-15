<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use App\Models\City;
use App\Models\Country;
use App\Models\PrayerTime;
use App\Models\State;

class ServiceController extends Controller
{
    public function country()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://ezanvakti.herokuapp.com/ulkeler');

        return $response->getBody();
    }

    public function city(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://ezanvakti.herokuapp.com/sehirler/' . $request->id);

        return $response->getBody();
    }

    public function district(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://ezanvakti.herokuapp.com/ilceler/' . $request->id);

        return $response->getBody();
    }

    public function city_date(Request $request)
    {
        $client = new Client();
        $client->request('GET', 'https://ezanvakti.herokuapp.com/vakitler/'.$request->districtes ?? '9541');

        Session::put('key', $request->districtes ?? '9541');

        return redirect()->route('detail');
    }

    public function filter_data()
    {
        $client = new Client();

        $response = $client->request('GET', 'https://ezanvakti.herokuapp.com/vakitler/' . session()->get('key') ?? '9541');

        return $response->getBody();

    }

    public function index()
    {
       /* $client = new Client();

        $country = $client->request('GET','https://namaz-vakti-api.herokuapp.com/cities?country=2');

        $count = json_decode($country->getBody(), true);

        foreach ($count as $item) {
            $response = $client->request('GET', 'https://namaz-vakti-api.herokuapp.com/regions?country=2&city=' . $item['sehirID']);
            $ress = json_decode($response->getBody(), true);
            foreach ( $ress as $res)
            {
                State::create([
                    'IlceUrl' => $res['IlceUrl'],
                    'IlceAdi' => $res['IlceAdi'],
                    'IlceAdiEn' => $res['IlceAdiEn'],
                    'IlceID' => $res['IlceID'],
                    'cities' => $item['sehirID']
                ]);
            }

        }*/

        return view('index');
    }

    public function detail()
    {

        return view('detail');
    }

}
