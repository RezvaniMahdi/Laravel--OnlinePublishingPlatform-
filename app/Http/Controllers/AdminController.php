<?php

namespace App\Http\Controllers;


use \Response;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

        // here we checked a user that come here is admin
        $this->middleware(function($request, $next){
            $user = auth()->user();

            if($user->type === 'admin')
            {
                return $next($request);
            }else{
                abort(404);
            }
        });
    }
    // return the view of options that admin can change them
    public function index()
    {
        $accepted_articles = Article::where('accept', 'yes')->count();
        $unaccepted_articles = Article::where('accept', 'no')->count();
        $active_users = User::where('active', 'yes')->count();
        $inactive_users = User::where('active', 'no')->count();
        $comments = Comment::count();
        return view('admin.index' ,compact('accepted_articles', 'unaccepted_articles', 'active_users', 'inactive_users', 'comments'));
    }

    // show different types og categories for select by admin for see articles of that category
    public function show_categoris($type)
    {
        $categoris = array("science", "history", "technology", "physics","sport", "other");
        if($type == 'accepted')
        {
            $count_articles = array();
            $i = 0;
            foreach ($categoris as $category)
            {
                $temp = Article::where('accept', 'yes')->where('category', $category)->count();
                $count_articles[$i] = $temp;
                $i++;
            }
            return view('admin.show_categories', compact('type','count_articles'));

        }else{
            $count_articles = array();
            $i = 0;
            foreach ($categoris as $category)
            {
                $temp = Article::where('accept', 'no')->where('category', $category)->count();
                $count_articles[$i] = $temp;
                $i++;
            }
            return view('admin.show_categories', compact('type','count_articles'));
        }

    }

    public function show_certain_list_articles($type , $category)
    {
        $accept = 'no';
        if ($type === 'accepted')
        {
            $accept = 'yes';
        }
        if ($category === 'all')
        {
            $articles = Article::latest()->paginate(10);
            $title = "Newest articles";
            return view('admin.show_list_articles', compact('articles', 'title'));

        }else{
            $articles = Article::where('accept', $accept)->where('category', $category)->latest()->paginate(10);
            $title = $category . " Category";
            return view('admin.show_list_articles', compact('articles', 'title'));
        }

    }

    public function show_article(Article $article)
    {
        $writer = $article->user;
        $comments = Comment::where('article_id', $article->id)->latest()->paginate(10);
        return view('admin.show_article', compact('article', 'writer', 'comments'));
    }

    public function change_category(Request $request,Article $article)
    {
        $request->validate([
            'content' => ['required' , Rule::in(['science', 'history', 'technology', 'physics', 'sport', 'other'])],

        ]);
        $article->update([
            'category' => $request->content
        ]);
        // alert('Done','Category changed successfully', 'success');
        $result = "Category : " . $article->category;
        return Response::json($result);
    }


    public function change_status(Request $request, Article $article)
    {
        $request->validate([
            'content' => ['required' , Rule::in(['yes', 'no'])],

        ]);
        $article->update([
            'accept' => $request->content
        ]);

        $result = "Accepted : " . $article->accept;
        return Response::json($result);
    }


    public function delete_article(Article $article)
    {
        $type = $article->accept;
        $category = $article->category;
        $article->delete();
        alert('Done','Article removed successfully', 'success');
        return redirect()->route('admin.show_list_articles', ['type' => $type, 'category' => $category]);
    }

    public function show_users_list($status)
    {
        $active = 'no';
        if ($status === 'active')
        {
            $active = 'yes';
        }
        $users = User::where('active', $active)->latest()->paginate(10);
        $type = $status . " users";
        return view('admin.show_list_users', compact('users', 'type'));
    }

    public function edit_user_profile(User $user)
    {
        return view('admin.edit_user_profile', compact('user'));
    }

    public function store_profile(Request $request, User $user)
    {
        $status = "inactive";
        if ($user->active === 'yes'){
            $status = "active";
        }
        $request->validate([
            'active' => ['required' , Rule::in(['yes', 'no'])],
            'type' => ['required' , Rule::in(['admin', 'user'])],
            'name' => ['required', 'alpha_dash' , 'string'],
            'biography' => ['nullable', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['nullable' , 'size:11', 'string'],
            'birth' => ['nullable', 'date_format:Y-m-d'],
            'gender' => ['required' , Rule::in(['other', 'male', 'female'])],
            'facebook' => ['nullable', 'string'],
            'linkdin' => ['nullable', 'string']
        ]);
        $user->update([
            'active' => $request->active,
            'type' => $request->type,
            'name'=> $request->name,
            'email'=>$request->email,
            'biography'=>$request->biography,
            'phone_number'=> $request->phone,
            'birth_date'=> $request->birth,
            'gender'=>$request->gender,
            'facebook'=>$request->facebook,
            'linkdin'=> $request->linkdin
        ]);
        alert('Done','Profile of user changed successfully', 'success');
        return redirect()->route('admin.show_users_list', ['status'=> $status]);
    }



    public function show_comments()
    {
        $comments = Comment::latest()->paginate(10);

        return view('admin.show_comments', compact('comments'));
    }

    public function delete_comment(Request $request)
    {
        $request->validate([
            'content' => ['required' ,'integer'],
        ]);
        Comment::find($request->content)->delete();

        return Response::json("done");

    }
}
