<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RestaurantController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Restaurant';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Restaurant());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('store_name', __('Store name'));
        $grid->column('telephone', __('Telephone'));
        $grid->column('address', __('Address'));
        $grid->column('open_time', __('Open time'));
        $grid->column('close_time', __('Close time'));
        $grid->column('regular_holiday', __('Regular holiday'));
        $grid->column('max_price', __('Max price'));
        $grid->column('lower_price', __('Lower price'));
        $grid->column('category_id', __('Category Name'));
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        $grid->filter(function ($filter) {
            $filter->like('store_name', '店舗名');
            $filter->like('address', '住所');
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
        $show = new Show(Restaurant::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('store_name', __('Store name'));
        $show->field('telephone', __('Telephone'));
        $show->field('address', __('Address'));
        $show->field('open_time', __('Open time'));
        $show->field('close_time', __('Close time'));
        $show->field('regular_holiday', __('Regular holiday'));
        $show->field('max_price', __('Max price'));
        $show->field('lower_price', __('Lower price'));
        $show->field('category_id', __('Category Name'));
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
        $form = new Form(new Restaurant());

        $form->text('store_name', __('Store name'));
        $form->text('telephone', __('Telephone'));
        $form->text('address', __('Address'));
        $form->time('open_time', __('Open time'))->default(date('H:i:s'));
        $form->time('close_time', __('Close time'))->default(date('H:i:s'));
        $form->text('regular_holiday', __('Regular holiday'));
        $form->number('max_price', __('Max price'));
        $form->number('lower_price', __('Lower price'));
        $form->number('category_id', __('Category Name'))->options(Category::all()->pluck('name', 'id'));

        return $form;
    }
}
