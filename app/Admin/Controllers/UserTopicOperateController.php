<?php

namespace App\Admin\Controllers;

use App\Models\UserTopicOperate;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserTopicOperateController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '话题操作记录';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserTopicOperate);

        $grid->column('id', __('序号'));
        $grid->column('o_type', __('类型'));
        $grid->column('topic_id', __('话题'));
        $grid->column('user_id', __('用户'));
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
        $show = new Show(UserTopicOperate::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('o_type', __('O type'));
        $show->field('topic_id', __('Topic id'));
        $show->field('user_id', __('User id'));
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
        $form = new Form(new UserTopicOperate);

        $form->switch('o_type', __('类型'));
        $form->number('topic_id', __('话题'));
        $form->number('user_id', __('用户'));

        return $form;
    }
}
