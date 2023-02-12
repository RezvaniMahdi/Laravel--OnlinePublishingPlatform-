<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    //

    public function index()
    {
        $articles = Article::where('accept', 'yes')->paginate(5);
        $newestArticle = Article::where('accept', 'yes')->latest()->get();
        $bestArticles= Article::where('accept', 'yes')->orderBy('num_likes', 'DESC')->get();
        $categoris = array("science", "history", "technology", "physics","sport", "other");
        $points = array();
        $i = 0;
        foreach ($categoris as $category)
        {
            $temp = Article::where('accept', 'yes')->where('category', $category)->sum('num_likes');
            $points[$i] = $temp;
            $i++;
        }
        $max = array();
        $max[0] = array_search(max($points), $points);
        $points[$max[0]] = -1;
        $max[1] = array_search(max($points), $points);
        $points[$max[1]] = -1;
        $max[2] = array_search(max($points), $points);
        $best_categories = array();
        $i = 0;
        foreach ($max as $element)
        {
            $best_categories[$i] = $categoris[$element];
            $i++;
        }
        $bestWriters = User::where('active', 'yes')->orderBy('num_followers', 'DESC')->get();
        return view('home', compact('articles', 'newestArticle', 'bestArticles', 'best_categories', 'bestWriters'));
    }


    public function search(Request $request)
    {
        $request->validate([
            'search' => ['required', 'string'],
        ]);

        if (auth()->user())
        {
            $articles_result = array();
            $i  = 0;
            $articles = null;

            if (auth()->user()->type === 'user')
            {
                $articles = Article::where('accept', 'yes')->get();

            }else{
                $articles = Article::all();

            }

            foreach ($articles as $article)
            {
                if ((strpos(strtolower($article->title), strtolower($request->search)) != null) || (strpos(strtolower($article->introduction), strtolower($request->search)) != null) || (strpos(strtolower($article->body), strtolower($request->search)) != null) || (strpos(strtolower($article->result), strtolower($request->search)) != null))
                {
                        $articles_result[$i] = $article;
                        $i++;
                }

            }
            $type = "Result";
            $currentPage = LengthAwarePaginator::resolveCurrentPage();

            $articles = new LengthAwarePaginator(
                array_slice($articles_result, ($currentPage - 1) * 10, 10),
                count($articles),
                10,
                $currentPage,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                ]
            );

            if (auth()->user()->type === 'user')
            {
                $type = "Result";
                return view('user.show_special_type_Articles', compact('articles', 'type'));

            }else{
                $title = "Result";
                return view('admin.show_list_articles', compact('articles', 'title'));

            }




        }else{

            abort(404);
        }
    }





    public function our_story()
    {
        return view ('our_story');
    }

    public function contact_us()
    {
        return view('contact_us');
    }
}
