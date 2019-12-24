<?php

namespace App\Admin\Controllers;

use App\User;
use App\UserRole;
use App\UserData;
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
  protected $title = 'User Management';

  /**
     * Make a grid builder.
     *
     * @return Grid
     */
  protected function grid()
  {
    $grid = new Grid(new User);

    $grid->column('id', __('Id'));
    $grid->column('data.nama', __('Nama'));
    $grid->column('email', __('Email'));
    $grid->column('role.role', __('Role'));
    $grid->column('created_at', __('Created at'));
    $grid->column('updated_at', __('Updated at'));

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

    $show->data('Data', function ($data) {
      $data->nama();
      $data->nomor_hp();
    });
    $show->field('id', __('Id'));
    $show->field('email', __('Email'));
    $show->field('password', __('Password'));
    $show->role('Role', function ($role) {
      $role->role();
    });
    $show->textarea('api_token', __('Api token'));

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

    $form->tab('Basic info', function ($form) {
      $form->text('data.nama', __('Nama'));
      $form->text('data.usia', __('Usia'));
      $form->text('data.nomor_hp', __('Nomor HP'));
    })
    ->tab('Credential', function ($form) {
      $form->email('email', __('Email'));
      $form->password('password', __('Password'));
      $form->select('role_id', __('Role'))->options(function ($id) {
        $roles = UserRole::all()->toArray();
        $final = [];
        foreach ($roles as $i) {
          $final[$i['id']] = $i['role'];
        }
        return $final;
      });
    });

    if (!$form->isCreating() && in_array(request()->password,['',null])) {
      $form->ignore(['password']);
    }

    $form->submitted(function (Form $form) {
      $form->ignore(['data']);
    });

    $form->saved(function (Form $form) {
      if ($form->isCreating()) {
        UserData::create([
          'nama' => request()->data->nama,
          'usia' => request()->data->usia,
          'nomor_hp' => request()->data->nomor_hp,
          'user' => $form->model()->id
        ]);
      }
      else {
        $data = UserData::where('user',$form->model()->id)->first();
        $data->update([
          'nama' => request()->data['nama'],
          'usia' => request()->data['usia'],
          'nomor_hp' => request()->data['nomor_hp']
        ]);
      }
    });

    return $form;
  }
}
