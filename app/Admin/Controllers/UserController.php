<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->column('id', __('序号'));
        $grid->column('name', __('名称'));
        $grid->column('email', __('邮箱'));
        $grid->column('phone', __('手机'));
//        $grid->column('github_name', __('Github name'));
        $grid->column('real_name', __('真实姓名'));
//        $grid->column('introduction', __('Introduction'));
        $grid->column('city', __('所在城市'));
//        $grid->column('hobby', __('爱好'));
        $grid->column('signature', __('署名'));
        $grid->column('sex', __('性别'));
        $grid->column('score', __('积分'));
        $grid->column('company', __('公司'));
//        $grid->column('job_title', __('Job title'));
//        $grid->column('per_web', __('Per web'));
//        $grid->column('github_site', __('Github site'));
//        $grid->column('weibo_site', __('Weibo site'));
//        $grid->column('wc_qrcode', __('Wc qrcode'));
//        $grid->column('pay_qrcode', __('Pay qrcode'));
//        $grid->column('password', __('Password'));
//        $grid->column('remember_token', __('Remember token'));
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('github_name', __('Github name'));
        $show->field('real_name', __('Real name'));
        $show->field('introduction', __('Introduction'));
        $show->field('city', __('City'));
        $show->field('hobby', __('Hobby'));
        $show->field('signature', __('Signature'));
        $show->field('sex', __('Sex'));
        $show->field('score', __('Score'));
        $show->field('company', __('Company'));
        $show->field('job_title', __('Job title'));
        $show->field('per_web', __('Per web'));
        $show->field('github_site', __('Github site'));
        $show->field('weibo_site', __('Weibo site'));
        $show->field('wc_qrcode', __('Wc qrcode'));
        $show->field('pay_qrcode', __('Pay qrcode'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
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
        $form = new Form(new User);

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->number('phone', __('Phone'));
        $form->text('github_name', __('Github name'));
        $form->text('real_name', __('Real name'));
        $form->text('introduction', __('Introduction'));
        $form->text('city', __('City'));
        $form->text('hobby', __('Hobby'));
        $form->text('signature', __('Signature'));
        $form->switch('sex', __('Sex'));
        $form->number('score', __('Score'));
        $form->text('company', __('Company'));
        $form->text('job_title', __('Job title'));
        $form->text('per_web', __('Per web'));
        $form->text('github_site', __('Github site'));
        $form->text('weibo_site', __('Weibo site'));
        $form->text('wc_qrcode', __('Wc qrcode'));
        $form->text('pay_qrcode', __('Pay qrcode'));
        $form->password('password', __('Password'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
