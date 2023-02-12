<?php

namespace App\Http\Controllers;

use \Response;
use App\Models\Like;
use App\Models\User;
use App\Models\Flower;
use App\Models\Article;
use App\Models\Comment;
use App\Models\SavedArticle;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\Paginator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    // this method is for shows home page for users
    public function index()
    {
       $articles = Article::where('accept', 'yes')->get();
       $newestArticle = Article::where('accept', 'yes')->latest()->get();
       $bestArticles= Article::where('accept', 'yes')->orderBy('num_likes', 'DESC')->get();

       return view('home', compact('articles', 'newestArticle', 'bestArticles'));
    //    $temp = User::all();
    //    dd($temp);
    }
    // this method show profile of current user
    public function show_profile()
    {
        $user = auth()->user();
        return view('user.show_profile' , compact('user'));

    }
    // this method shows a view that users can edit thier profile
    public function edit_profile()
    {
        $user = auth()->user();
        return view('user.edit_profile', compact('user'));
    }

    // after user change his profile this method save it on database
    public function store_profile(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'profile_image' => ['nullable', 'image'],
            'name' => ['required', 'alpha_dash' , 'string'],
            'biography' => ['nullable', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['nullable' , 'size:11', 'string'],
            'birth' => ['nullable', 'date_format:Y-m-d'],
            'gender' => ['required' , Rule::in(['other', 'male', 'female'])],
            'facebook' => ['nullable', 'string'],
            'linkdin' => ['nullable', 'string']
        ]);
        User::find($user->id)->update([
            'name'=> $request->name,
            'email'=>$request->email,
            'photo'=>$request->profile_image,
            'biography'=>$request->biography,
            'phone_number'=> $request->phone,
            'birth_date'=> $request->birth,
            'gender'=>$request->gender,
            'facebook'=>$request->facebook,
            'linkdin'=> $request->linkdin
        ]);
        alert('Done','Profile changed successfully', 'success');
        return redirect()->route('user.show_profile');
    }

    // this method show view that user can create his article
    public function create_article()
    {
        $user = auth()->user();
        if ($user->active === "no")
        {
            abort(403);
        }
        return view('user.create_article');
    }
    // after created article by user we save it on our database
    public function store_myarticle(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'title'=> ['required' , 'string', 'max:500'],
            'introduction' =>['required', 'string'],
            'body' => ['required', 'string'],
            'result' => ['nullable', 'string'],
            'category' => ['required' , Rule::in(['science', 'history', 'technology', 'physics', 'sport', 'other'])]

        ]);
        Article::create([
            'title'=> $request->title,
            'introduction' => $request->introduction,
            'body' => $request->body,
            'result' => $request->result,
            'category' => $request->category,
            'user_id' => $user->id
        ]);
        alert('Done','Article created successfully', 'success');
        return redirect()->route('user.show_myarticles');

    }
    // this method show articles of current user for editing
    public function show_myarticles()
    {
        $user = auth()->user();
        $articles = Article::where('user_id', $user->id)->latest()->paginate(10);
        return view('user.show_myarticles', compact('articles'));
    }
    // this method delete a article (each user can delete thier articles)
    public function delete_myarticle(Article $id)
    {
        $id->delete();
        alert('Done','Article removed successfully', 'success');
        return redirect()->route('user.show_myarticles');

    }
    // this method show one of the article of current user for editing
    public function edit_myarticle(Article $article)
    {
        $user = auth()->user();
        if ($user->active === "no")
        {
            abort(403);
        }
        return view('user.edit_myarticle', compact('article'));

    }
    // after article of current user edited we update that article
    public function update_myarticle(Request $request,Article $article)
    {
        $request->validate([
            'title'=> ['required' , 'string' , 'max:500'],
            'introduction' =>[ 'required' , 'string'],
            'body' => ['required', 'string'],
            'result' => ['nullable', 'string'],
            'category' => ['required']
        ]);
        $article->update([
            'title'=> $request->title,
            'introduction' => $request->introduction,
            'body' => $request->body,
            'result' => $request->result,
            'category'=> $request->category,
            'accept' => 'no'
        ]);
        alert('Done','Article changed successfully', 'success');
        return redirect()->route('user.show_myarticles');

    }
    // this method shows all articles that admins accepted them
    public function show_article(Article $article)
    {
        $user = auth()->user();
        $writer = $article->user;
        $comments = Comment::where('article_id', $article->id)->where('accept', 'yes')->latest()->paginate(10);
        $likes = Like::where('article_id', $article->id)->get();
        $done = "no";
        if(Like::where('user_id', $user->id)->where('article_id', $article->id)->exists())
        {
            $done = "yes";
        }
        $follow = "Follow";
        if (Flower::where('user_id', $article->user->id)->where('flower_id', $user->id)->exists())
        {
            $follow = "Unfollow";
        }
        return view('user.show_article', compact('article','writer', 'comments', 'likes', 'done','follow'));
    }

    // if a user send a comment for a article we save that comment
    public function store_comment(Request $request, Article $article)
    {
        $comment_writer = auth()->user();
        $request->validate([
            'content'=> ['required' , 'string'],
        ]);
        Comment::create([
            'article_id'=> $article->id,
            'user_id' => $comment_writer->id,
            'body' => $request->content,
        ]);
        $count = $article->comments->where('accept', 'yes')->count();
        return Response::json($count);

    }

    // when a user liked a article we check that user liked it before or not
    // if liked it before we clear his liked
    // if didnt like this article before , we save his liked
    public function store_like(Request $request,Article $article)
    {
        $liker = auth()->user();
        $liked = Like::where('user_id', $liker->id)->where('article_id', $article->id)->get();
        if(count($liked) == 0)
        {
            Like::create([
                'article_id' => $article->id,
                'user_id' => $liker->id
            ]);
            $count = count($article->likes);
            $article->update([
                'num_likes'=> $count
            ]);
            // $increase = 1;
            // return Response::json($increase);
            $done = 'yes';
            // return redirect()->route('user.show_article', ['article' => $article]);
            return Response::json([$count, $done]);
        }else{
            $liked->get(0)->delete();
            $count = count($article->likes);
            $article->update([
                'num_likes'=> $count
            ]);
            // $decrease = -1;
            // return Response::json($decrease);
            // return redirect()->route('user.show_article', ['article' => $article]);
            $done = 'no';
            return Response::json([$count, $done]);

        }


    }
    //when user wants to saved on a list that read it later
    public function save_article(Article $article)
    {
        $user = auth()->user();
        $save = SavedArticle::where('user_id', $user->id)->where('article_id', $article->id)->exists();

        if($save === false)
        {
            SavedArticle::create([
                'article_id' => $article->id,
                'user_id' => $user->id
            ]);
            $result = "Article add to your list successfully";
            return Response::json($result);

        }else{
            $result = "Article has already been added to the list";
            return Response::json($result);
        }
    }
    // articles that user save them
    public function show_savedlist()
    {
        $user = auth()->user();
        $saved = SavedArticle::where('user_id', $user->id)->latest()->get();
        $articles = array();
        for($i = 0; $i < count($saved); $i++)
        {
            $articles[$i] = Article::find($saved->get($i)->article_id);
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Create a new paginator instance
        $articles = new LengthAwarePaginator(
            array_slice($articles, ($currentPage - 1) * 10, 10),
            count($articles),
            10,
            $currentPage,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
            ]
        );
        return view('user.show_savedarticles', compact('articles'));

    }

    // maybe user wants to remove a article from saved list
    public function delete_savedarticle(Article $article)
    {
        $user = auth()->user();
        SavedArticle::where('user_id', $user->id)->where('article_id', $article->id)->delete();
        alert('Done','article remove from your list successfully', 'success');
        return redirect()->route('user.show_savedlist');
    }

    // follow a writer
    public function follow(User $writer)
    {
        $user = auth()->user();
        $myself = false;
        if ($user->id === $writer->id){
            $myself = true;
        }
        $follow = Flower::where('user_id', $writer->id)->where('flower_id', $user->id)->exists();
        if($follow === false && $myself === false)
        {
            Flower::create([
                'flower_id' => $user->id,
                'user_id' => $writer->id
            ]);
            $count = Flower::where('user_id', $writer->id)->count();
            $writer->update([
                'num_followers'=> $count
            ]);
            $result = "Now you are his follower";
            return Response::json($result);

        }else{
            if ($myself === true)
            {
                $result = "You can not follow yourself!!!";
                return Response::json($result);

            }else{
                Flower::where('user_id', $writer->id)->where('flower_id', $user->id)->delete();
                $count = Flower::where('user_id', $writer->id)->count();
                $writer->update([
                    'num_followers'=> $count
                ]);
                $result = "Now You unfollow this writer";
                return Response::json($result);
            }

        }
    }

    public function dashbord(User $user)
    {
        $login_user = auth()->user();
        $articles = Article::where('user_id', $user->id)->latest()->paginate(10);
        $follower = Flower::where('user_id', $user->id)->get();
        $following = Flower::where('flower_id', $user->id)->get();


        $follow = "Follow";
        if (Flower::where('user_id', $user->id)->where('flower_id', $login_user->id)->exists())
        {
            $follow = "Unfollow";
        }


        // we finds users that follows this user
        $followers = array();
        for($i = 0; $i < count($follower); $i++)
        {
            $followers[$i] = User::find($follower->get($i)->flower_id);
        }

        // we finds users that follows by this user

        $followings = array();
        for($i = 0; $i < count($following); $i++)
        {
            $followings[$i] = User::find($following->get($i)->user_id);
        }


        return view('user.dashbord', compact('user', 'articles', 'followers', 'followings', 'follow'));
    }

    public function newestArticles()
    {
        $articles= Article::where('accept', 'yes')->latest()->paginate(10);
        $type = "Newest Articles";
        return view('user.show_special_type_Articles', compact('articles', 'type'));
    }

    public function bestArticles()
    {
        $articles= Article::where('accept', 'yes')->orderBy('num_likes', 'DESC')->paginate(10);
        $type = "Best Articles";
        return view('user.show_special_type_Articles', compact('articles', 'type'));
    }

    public function categoryArticles($category)
    {
        $articles = Article::where('accept', 'yes')->where('category', $category)->orderBy('num_likes', 'DESC')->paginate(10);
        $type = $category . " Category";
        return view('user.show_special_type_Articles', compact('articles', 'type'));
    }

    public function bestWriters()
    {
        $bestWriters = User::where('active', 'yes')->orderBy('num_followers', 'DESC')->paginate(10);
        $type = "Best Writers in Orders";
        return view('user.show_best_writers', compact('bestWriters', 'type'));
    }


    public function delete_account()
    {
        $user = auth()->user();
        $user->delete();
        return redirect()->route('home');
    }


}
