<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all()->count();

        // gráfico 1
        $usersData = User::select([
            DB::raw('YEAR(created_at) as year'),
            DB::raw('COUNT(*) as total')
        ])
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();

        // preparar arrays
        foreach ($usersData as $userData) {
            $year[] = $userData->year;
            $total[] = $userData->total;
        }

        // formatar para o chart js
        $userLabel = "'Comparativo de cadastros de usuários'";
        $userYear = implode(', ', $year);
        $userTotal = implode(', ', $total);

        // gráfico 2

        $categoriesData = Category::with('products')->get();

        foreach ($categoriesData as $category) {
            $catName[] = "'" . $category->name . "'";
            $catTotal[] = $category->products->count();
        }
        // formatar para o chart js
        $categoryLabel = "'Comparativo entre categorias'";
        $categoryName = implode(', ', $catName);
        $categoryTotal = implode(',', $catTotal);

        return view('admin.dashboard', [
            'user' => $user,
            'userLabel' => $userLabel,
            'userYear' => $userYear,
            'userTotal' => $userTotal,
            'categoryLabel' => $categoryLabel,
            'name' => $categoryName,
            'categoryTotal' => $categoryTotal
        ]);
    }
}
