<?php
namespace App\Providers\ViewComposers;

use App\Models\Catalog;
use Illuminate\Contracts\View\View;

class BaseComposer
{
    public function compose(View $view){
        $catalog=Catalog::all();
        $view->with('catalog', $catalog);
    }
}
