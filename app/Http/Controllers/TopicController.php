<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only('store','update');
    }

    public function index()
    {
        $topics = Topic::where(function (Builder $query) {
            $content = request()->get('content');
            if ($content != '') {
                $query->where('body', 'like', "%$content%")
                    ->orWhere('title','like',"%$content%");
            }
        })->latest()->with('Category','Tag','UserCount')->paginate(5);
        $category_count = Category::select('id','name')->withCount('Topic')->get();
        $place_on_file = Topic::groupBy(DB::raw('date(created_at)'))
            ->selectRaw('date(created_at) as `date`,count(*) as `count`')
            ->orderByDesc('date')
            ->take(7) //只取前7天都记录
            ->get()
            ->makeHidden(
                [
                    'is_zan','collect_with_user','created_at_label','updated_at_label','is_collect'
                ]);
        return $this->success(compact('topics','category_count','place_on_file'));
    }

    public function show($id)
    {
        $topic = Topic::findOrFail($id);
        $topic = $topic->load('Category', 'User', 'Reply.subset', 'UserCount')
            ->load(['Tag' => function (BelongsToMany $query)use($topic) {
                $query->withCount(['withTag' => function (Builder $builder)use($topic) {
                    $builder->where('user_id',$topic->user_id);
                }]);
            }]);

        $dom = $topic->User->Topic()
            ->groupBy(DB::raw('date(created_at)'))
            ->selectRaw('date(created_at) as `date`,count(*) as `count`')
            ->get()
            ->makeHidden(
                [
                    'is_zan','collect_with_user','created_at_label','updated_at_label','is_collect'
                ]);

        $user_category = Category::select('id','name')->withCount(['Topic' => function (Builder $query) use ($topic) {
            $query->where('user_id', $topic->user_id);
        }])->get();
        $topic->counting();
        $topic->place_on_file = $dom;
        $topic->user_category = $user_category;
        return $this->success($topic);
    }

    public function store(Request $request)
    {
        $rule = [
            'title' => 'required|string|max:30',
            'category_id' => 'required|exists:categories,id',
            'tag' => 'nullable|array|max:3',
            'body' => 'required|string|min:3',
        ];
        $data = $request->validate($rule);
        $uid = auth()->id();
        $data['user_id'] = $uid;
        $topic = DB::transaction(function ()use($data) {
            return Topic::create($data);
        });
        return $this->success($topic);
    }

    public function update(Request $request,$id)
    {
        $topic = Topic::findOrFail($id);
        $this->authorize('update', $topic);
        $rule = [
            'body' => 'required|string|min:3',
        ];
        $data = $request->validate($rule);
        $topic = DB::transaction(function ()use($topic,$data) {
            return $topic->update($data);
        });
        return $this->success($topic);
    }

    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
        $this->authorize('delete', $topic);
        $topic->delete();
        return $this->success();
    }

}
