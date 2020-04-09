<?php

namespace App\Admin\Controllers;

use App\Models\Fans;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FansController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户关注';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Fans());

        $grid->column('id', __('序号'));
        $grid->column('f_uid', __('粉丝'));
        $grid->column('a_uid', __('关注人'));
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));

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
        $show = new Show(Fans::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('f_uid', __('F uid'));
        $show->field('a_uid', __('A uid'));
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
        $form = new Form(new Fans);

        $form->number('f_uid', __('F uid'));
        $form->number('a_uid', __('A uid'));

        return $form;
    }
}
