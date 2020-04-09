<?php

namespace App\Admin\Controllers;

use App\Models\CourseBook;
use App\Models\Resource;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CourseBookController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '书籍管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CourseBook);

        $grid->column('id', __('序号'));
        $grid->column('title', __('标题'));
        $grid->column('excerpt', __('摘要'));
        $grid->column('prices', __('单价'));
        $grid->column('user_id', __('用户'));
//        $grid->column('image_id', __('Image id'));
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
        $show = new Show(CourseBook::findOrFail($id));

        $show->field('id', __('序号'));
        $show->field('title', __('标题'));
        $show->field('excerpt', __('摘要'));
        $show->field('prices', __('单价'));
//        $show->field('user_id', __('User id'));
//        $show->field('image', __(''));
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('更新时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CourseBook);

        $form->text('title', __('标题'));
        $form->textarea('excerpt', __('摘要'));
        $form->decimal('prices', __('Prices'))->default(9.99);
//        $form->number('user_id', __('User id'));
        $form->image('image', __('封面'));
        $form->saving(function (Form $form) {
//            Resource::create();

        });
        return $form;
    }
}
