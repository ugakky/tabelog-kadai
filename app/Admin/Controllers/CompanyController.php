<?php

namespace App\Admin\Controllers;

use App\Models\Company;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CompanyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Company';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Company());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('company_name', __('Company Name'));
        $grid->column('representative', __('Representative'));
        $grid->column('address', __('Address'));
        $grid->column('telephone', __('Telephone'));
        $grid->column('business', __('Business'));
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        $grid->filter(function ($filter) {
            $filter->like('company_name', '会社名');
            $filter->like('representative', '代表');
            $filter->like('address', '住所');
            $filter->like('telephone', '電話番号');
            $filter->like('business', '事業内容');
            $filter->between('created_at', '登録日')->datetime();
        });

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
        $show = new Show(Company::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('company_name', __('Company Name'));
        $show->field('representative', __('Representative'));
        $show->field('address', __('Address'));
        $show->field('telephone', __('Telephone'));
        $show->field('business', __('Business'));
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
        $form = new Form(new Company());

        $form->text('company_name', __('Company Name'));
        $form->text('representative', __('Representative'));
        $form->text('address', __('Address'));
        $form->text('telephone', __('Telephone'));
        $form->text('business', __('Business'));

        return $form;
    }
}

?>