<?php

// ==========================================
//  Author: Mujahid Abdillah
//  Date:   22 April 2020
// ==========================================

namespace App\Http\Controllers;

class NewsController extends Controller
{
    private $apikey = "INSERT_YOUR_API_KEY_HERE";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    private function getDataFromHttpApiRequest($url)
    {
        $data = file_get_contents($url);
        $result = json_decode($data);

        return $result;
    }

    public function index()
    {
        $recent_news_url = 'https://newsapi.org/v2/everything?q=*&language=en&apiKey='.$this->apikey;
        $news_headline_us_url = 'https://newsapi.org/v2/top-headlines?country=us&pageSize=4&apiKey='.$this->apikey;

        $data['recent_news'] = $this->getDataFromHttpApiRequest($recent_news_url);
        $data['news_headline_us'] = $this->getDataFromHttpApiRequest($news_headline_us_url);

        return view('frontpage', $data);
    }

    public function viewNewsbyCategory($category)
    {
        $category_list = ['entertainment', 'business' , 'health', 'science', 'sports', 'technology'];
        $match = false;

        $data['news'] = "";
        for ($i = 0; $i < sizeof($category_list); $i++){
            if ($category_list[$i] ==  $category){
                $match = true;
            }
        }

        if ($match){
            $url = 'https://newsapi.org/v2/top-headlines?country=us&category='. $category .'&apiKey='.$this->apikey;
            
            $data['news'] = $this->getDataFromHttpApiRequest($url);
            $data['category'] = $category;

            return view('category', $data);
        } else {
            abort(404);
        }
        
    }

    public function viewHeadlineNews()
    {
        $country_name = ['Argentina', 'Australia', 'Austria', 'Belgium', 'Brazil', 'Bulgaria', 'Canada', 'China', 'Colombia', 'Cuba', 'Czech Republic', 'Egypt', 'France', 'Germany', 'Greece', 'Hong Kong', 'Hungary', 'India', 'Indonesia', 'Ireland', 'Israel', 'Italy', 'Japan', 'Latvia', 'Lithuania', 'Malaysia', 'Mexico', 'Morocco', 'Netherlands', 'New Zealand', 'Nigeria', 'Norway', 'Philippines', 'Poland', 'Portugal', 'Romania', 'Russia', 'Saudi Arabia', 'Serbia', 'Singapore', 'Slovakia', 'Slovenia', 'South Africa', 'South Korea', 'Sweden', 'Switzerland', 'Taiwan', 'Thailand', 'Turkey', 'UAE', 'Ukraine', 'United Kingdom', 'United States', 'Venuzuela'];
        $country_code = ['ar', 'au', 'at', 'be', 'br', 'bg', 'ca', 'cn', 'co', 'cu', 'cz', 'eg', 'fr', 'de', 'gr', 'hk', 'hu', 'in', 'id', 'ie', 'il', 'it', 'jp', 'lv', 'lt', 'my', 'mx', 'ma', 'nl', 'nz', 'ng', 'no', 'ph', 'pl', 'pt', 'ro', 'ru', 'sa', 'rs', 'sg', 'sk', 'si', 'za', 'kr', 'se', 'ch', 'tw', 'th', 'tr', 'ae', 'ua', 'gb', 'us', 've'];
        $match = false;

        if (!isset($_GET['country'])){
            $url = 'https://newsapi.org/v2/top-headlines?country=us&apiKey='.$this->apikey;
            
            $data['country_name_set'] = "United States";
            $data['country_code_set'] = "us";

        } else {
            if ($_GET['country'] == ''){
                abort(404);

            } else {
                for ($i = 0; $i < sizeof($country_code); $i++){
                    if($country_code[$i] == $_GET['country']){
                        $data['country_name_set'] = $country_name[$i];
                        $data['country_code_set'] = $country_code[$i];
                        $match = true;
                        break;
                    }
                }
    
                if($match){
                    $url = 'https://newsapi.org/v2/top-headlines?country='. $_GET['country'] .'&apiKey='.$this->apikey;

                } else {
                    abort(404);
                }
            }
        }
        
        $data['news'] = $this->getDataFromHttpApiRequest($url);
        $data['country_name'] = $country_name;
        $data['country_code'] = $country_code;
        return view('headlines', $data);
    }

    public function viewSearchResult()
    {
        if (!isset($_GET['q'])){
            $data['message'] = 'No query inserted';
            return view('searchnoresult', $data);
        } else {
            if ($_GET['q'] == ''){
                $data['message'] = 'No query inserted';
                return view('searchnoresult', $data);
            } else {
                $url = 'https://newsapi.org/v2/everything?q='. $_GET['q'] .'&language=en&apiKey='.$this->apikey;

                $data['query'] = $_GET['q'];
                $data['news'] = $this->getDataFromHttpApiRequest($url);

                if($data['news']->totalResults == '0'){
                    $data['message'] = "No result for '". $data['query'] ."'";
                    return view('searchnoresult', $data);
                } else {
                    return view('searchresults', $data);
                }
            }
        }
    }

    public function viewNewsDetail($news_title)
    {
        $title = urldecode($news_title);
        $encodedtitle = urlencode(str_replace("dash", "-", str_replace("-", " ", $title)));
        $url = 'https://newsapi.org/v2/everything?qInTitle='. $encodedtitle .'&apiKey='.$this->apikey;
        $data['news'] = $this->getDataFromHttpApiRequest($url);

        if(intval($data['news']->totalResults) == 0){
            abort(404);
        } else if(intval($data['news']->totalResults) > 2){
            abort(404);
        } else {
            return view('newspost', $data);
        }
    }

}
