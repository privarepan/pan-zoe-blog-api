<?php

namespace App\Admin\Controllers;

use App\Models\Course;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CourseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '教程管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Course);

        $grid->column('id', __('序号'));
        $grid->column('title', __('标题'));
//        $grid->column('body', __('内容'));
//        $grid->column('reply_count', __('Reply count'));
//        $grid->column('view_count', __('View count'));
        $grid->column('slug', __('SEO'));
        $grid->column('policy', __('模式'));
        $grid->column('course_section_id', __('章节'));
        $grid->column('user_id', __('用户'));
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
        $show = new Show(Course::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('body', __('Body'));
        $show->field('reply_count', __('Reply count'));
        $show->field('view_count', __('View count'));
        $show->field('slug', __('Slug'));
        $show->field('policy', __('Policy'));
        $show->field('course_section_id', __('Course section id'));
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
        $form = new Form(new Course);

        $form->text('title', __('Title'));
        $form->textarea('body', __('Body'));
        $form->number('reply_count', __('Reply count'));
        $form->number('view_count', __('View count'));
        $form->text('slug', __('Slug'));
        $form->switch('policy', __('Policy'));
        $form->number('course_section_id', __('Course section id'));
        $form->number('user_id', __('User id'));

        return $form;
    }
}
