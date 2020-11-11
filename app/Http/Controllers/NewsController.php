<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $apikey = "f84143a15370430ca3520550e2459063";

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

        for ($i = 0; $i < sizeof($data['recent_news']->articles); $i++){
            $data['recent_news']->articles[$i]->urltoPost = '
            <form method="post" class="form-inline" action="'. url('news').'/'. urlencode(str_replace(" ", "-", str_replace("-", "dash", strtolower($data['recent_news']->articles[$i]->title)))) .'">
            '.csrf_field().'
            <input type="hidden" name="title" value="'. $data['recent_news']->articles[$i]->title .'">
            <input type="hidden" name="urlToImage" value="'. $data['recent_news']->articles[$i]->urlToImage .'">
            <input type="hidden" name="publishedAt" value="'. $data['recent_news']->articles[$i]->publishedAt .'">
            <input type="hidden" name="content" value="'. $data['recent_news']->articles[$i]->content .'">
            <input type="hidden" name="author" value="'. $data['recent_news']->articles[$i]->author .'">
            <input type="hidden" name="source" value="'. $data['recent_news']->articles[$i]->source->name .'">
            <h3 class="post-title"><button type="submit" class="link-button">'. $data['recent_news']->articles[$i]->title .'</button></h3>
            </form>
            ';
        }

        for ($i = 0; $i < sizeof($data['news_headline_us']->articles); $i++){
            $data['news_headline_us']->articles[$i]->urltoPost = '
            <form method="post" class="form-inline" action="'. url('news').'/'. urlencode(str_replace(" ", "-", str_replace("-", "dash", strtolower($data['news_headline_us']->articles[$i]->title)))) .'">
            '.csrf_field().'
            <input type="hidden" name="title" value="'. $data['news_headline_us']->articles[$i]->title .'">
            <input type="hidden" name="urlToImage" value="'. $data['news_headline_us']->articles[$i]->urlToImage .'">
            <input type="hidden" name="publishedAt" value="'. $data['news_headline_us']->articles[$i]->publishedAt .'">
            <input type="hidden" name="content" value="'. $data['news_headline_us']->articles[$i]->content .'">
            <input type="hidden" name="author" value="'. $data['news_headline_us']->articles[$i]->author .'">
            <input type="hidden" name="source" value="'. $data['news_headline_us']->articles[$i]->source->name .'">
            <h3 class="post-title"><button type="submit" class="link-button">'. $data['news_headline_us']->articles[$i]->title .'</button></h3>
            </form>
            ';
        }

        return view('index', $data);
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

            for ($i = 0; $i < sizeof($data['news']->articles); $i++){
                $data['news']->articles[$i]->urltoPost = '
                <form method="post" class="form-inline" action="'. url('news').'/'. urlencode(str_replace(" ", "-", str_replace("-", "dash", strtolower($data['news']->articles[$i]->title)))) .'">
                '.csrf_field().'
                <input type="hidden" name="title" value="'. $data['news']->articles[$i]->title .'">
                <input type="hidden" name="urlToImage" value="'. $data['news']->articles[$i]->urlToImage .'">
                <input type="hidden" name="publishedAt" value="'. $data['news']->articles[$i]->publishedAt .'">
                <input type="hidden" name="content" value="'. $data['news']->articles[$i]->content .'">
                <input type="hidden" name="author" value="'. $data['news']->articles[$i]->author .'">
                <input type="hidden" name="source" value="'. $data['news']->articles[$i]->source->name .'">
                <h3 class="post-title"><button type="submit" class="link-button">'. $data['news']->articles[$i]->title .'</button></h3>
                </form>
                ';
            }

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
        for ($i = 0; $i < sizeof($data['news']->articles); $i++){
            $data['news']->articles[$i]->urltoPost = '
            <form method="post" class="form-inline" action="'. url('news').'/'. urlencode(str_replace(" ", "-", str_replace("-", "dash", strtolower($data['news']->articles[$i]->title)))) .'">
            '.csrf_field().'
            <input type="hidden" name="title" value="'. $data['news']->articles[$i]->title .'">
            <input type="hidden" name="urlToImage" value="'. $data['news']->articles[$i]->urlToImage .'">
            <input type="hidden" name="publishedAt" value="'. $data['news']->articles[$i]->publishedAt .'">
            <input type="hidden" name="content" value="'. $data['news']->articles[$i]->content .'">
            <input type="hidden" name="author" value="'. $data['news']->articles[$i]->author .'">
            <input type="hidden" name="source" value="'. $data['news']->articles[$i]->source->name .'">
            <h3 class="post-title"><button type="submit" class="link-button">'. $data['news']->articles[$i]->title .'</button></h3>
            </form>
            ';
        }
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
                    for ($i = 0; $i < sizeof($data['news']->articles); $i++){
                        $data['news']->articles[$i]->urltoPost = '
                        <form method="post" class="form-inline" action="'. url('news').'/'. urlencode(str_replace(" ", "-", str_replace("-", "dash", strtolower($data['news']->articles[$i]->title)))) .'">
                        '.csrf_field().'
                        <input type="hidden" name="title" value="'. $data['news']->articles[$i]->title .'">
                        <input type="hidden" name="urlToImage" value="'. $data['news']->articles[$i]->urlToImage .'">
                        <input type="hidden" name="publishedAt" value="'. $data['news']->articles[$i]->publishedAt .'">
                        <input type="hidden" name="content" value="'. $data['news']->articles[$i]->content .'">
                        <input type="hidden" name="author" value="'. $data['news']->articles[$i]->author .'">
                        <input type="hidden" name="source" value="'. $data['news']->articles[$i]->source->name .'">
                        <h3 class="post-title"><button type="submit" class="link-button">'. $data['news']->articles[$i]->title .'</button></h3>
                        </form>
                        ';
                    }
                    return view('searchresults', $data);
                }
            }
        }
    }

    public function viewNewsDetail(Request $request, $news_title)
    {
        $valid = $this->validate($request, [
            'title' => 'required',
            'urlToImage' => 'required',
            'publishedAt' => 'required',
            'content' => 'required',
            'author' => 'required',
            'source' => 'required',
        ]);

        $data['news'] = [
            'title' => $request->title,
            'urlToImage' => $request->urlToImage,
            'publishedAt' => $request->publishedAt,
            'content' => $request->content,
            'author' => $request->author,
            'source' => $request->source
        ];

        return view('newspost', $data);
    }
}
