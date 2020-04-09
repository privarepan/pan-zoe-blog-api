<?php

namespace App\Admin\Controllers;

use App\Models\Replies;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RepliesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '评论管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Replies);

        $grid->column('id', __('序号'));
        $grid->column('topic_id', __('话题'));
        $grid->column('user_id', __('用户'));
        $grid->column('type', __('类型'));
        $grid->column('pid', __('Pid'));
        $grid->column('body', __('内容'));
        $grid->column('verify', __('审核'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));

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
        $show = new Show(Replies::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('topic_id', __('Topic id'));
        $show->field('user_id', __('User id'));
        $show->field('type', __('Type'));
        $show->field('pid', __('Pid'));
        $show->field('body', __('Body'));
        $show->field('verify', __('Verify'));
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
        $form = new Form(new Replies);

        $form->number('topic_id', __('Topic id'));
        $form->number('user_id', __('User id'));
        $form->switch('type', __('Type'))->default(1);
        $form->number('pid', __('Pid'));
        $form->textarea('body', __('Body'));
        $form->switch('verify', __('Verify'));
        return $form;
    }
}
