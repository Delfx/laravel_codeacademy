<?php

namespace App\Http\View\Composers;

use App\Models\ProductCategory;
use Illuminate\View\View;

class ProductCategoriesComposer
{
    public function compose(View $view)
    {
        $view->with('categories', ProductCategory::limit(4)->get());
    }
}
