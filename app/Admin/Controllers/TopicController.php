<?php

namespace App\Admin\Controllers;

use App\Models\Topic;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TopicController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '话题管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Topic);

        $grid->column('id', __('序号'));
        $grid->column('category_id', __('分类'));
        $grid->column('user_id', __('用户'));
        $grid->column('title', __('标题'));
//        $grid->column('excerpt', __('摘要'));
//        $grid->column('slug', __('SEO友好URI'));
//        $grid->column('body', __('内容'));
        $grid->column('w_type', __('文章类型'));
//        $grid->column('image_id', __('Image id'));
        $grid->column('view_count', __('浏览量'));
        $grid->column('reply_count', __('回复数'));
        $grid->column('vote_count', __('赞'));
        $grid->column('collect_count', __('收藏'));
        $grid->column('order', __('排序'));
        $grid->column('is_top', __('置顶'));
        $grid->column('is_reply', __('评论 开/关'));
        $grid->column('is_secret', __('私密 可见度'));
        $grid->column('created_at', __('创建时间'));
//        $grid->column('updated_at', __('更新时间'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Topic::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'));
        $show->field('user_id', __('User id'));
        $show->field('title', __('Title'));
        $show->field('excerpt', __('Excerpt'));
        $show->field('slug', __('Slug'));
        $show->field('body', __('Body'));
        $show->field('w_type', __('W type'));
        $show->field('image_id', __('Image id'));
        $show->field('view_count', __('View count'));
        $show->field('reply_count', __('Reply count'));
        $show->field('vote_count', __('Vote count'));
        $show->field('collect_count', __('Collect count'));
        $show->field('order', __('Order'));
        $show->field('is_top', __('Is top'));
        $show->field('is_reply', __('Is reply'));
        $show->field('is_secret', __('Is secret'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Topic);

        $form->switch('category_id', __('Category id'));
        $form->number('user_id', __('User id'));
        $form->text('title', __('Title'));
        $form->textarea('excerpt', __('Excerpt'));
        $form->text('slug', __('Slug'));
        $form->textarea('body', __('Body'));
        $form->switch('w_type', __('W type'));
        $form->number('image_id', __('Image id'));
        $form->number('view_count', __('View count'));
        $form->number('reply_count', __('Reply count'));
        $form->number('vote_count', __('Vote count'));
        $form->number('collect_count', __('Collect count'));
        $form->number('order', __('Order'));
        $form->switch('is_top', __('Is top'));
        $form->switch('is_reply', __('Is reply'));
        $form->switch('is_secret', __('Is secret'));

        return $form;
    }
}
