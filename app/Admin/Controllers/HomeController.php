<?php
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard123')
            ->description('Description...hello')
            // ->row(Dashboard::title())
            ->row(function (Row $row) {
                $row->column(4, function (Column $column) {
                    // $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    // $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    // $column->append(Dashboard::dependencies());
                    $column->append('hello');
                    $column->row('what');
                    $column->row('how');
                    $column->row(function (Row $row) {
                        $row->column(1, 'a');
                        $row->column(2, 'a');
                    });
                });
            });
        // ->body('hello world')
            // ->body('hello universal');
        // ->view('dashboard');
    }
}
