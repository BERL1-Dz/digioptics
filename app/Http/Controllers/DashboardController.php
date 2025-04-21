<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Correction;
use App\Models\Vent;
use App\Models\Achat;
use App\Models\Fournisseur;
use App\Models\Monture;
use App\Models\Verre;
use App\Models\Lentille;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total patients
        $totalPatients = Patient::count();
        
        // Get total prescriptions
        $totalPrescriptions = Correction::count();
        
        // Get total sales
        $totalSales = Vent::sum('total');
        
        // Get total purchases
        $totalPurchases = Achat::sum('total');
        
        // Get recent prescriptions
        $recentPrescriptions = Correction::with('patient')
            ->latest()
            ->take(5)
            ->get();
            
        // Get recent sales
        $recentSales = Vent::with('fournisseur')
            ->latest()
            ->take(5)
            ->get();

        // Get total suppliers
        $totalSuppliers = Fournisseur::count();

        // Get total products
        $totalMontures = Monture::count();
        $totalVerres = Verre::count();
        $totalLentilles = Lentille::count();
        $totalProducts = $totalMontures + $totalVerres + $totalLentilles;

        // Get today's sales
        $todaySales = Vent::whereDate('created_at', Carbon::today())->sum('total');

        // Get today's purchases
        $todayPurchases = Achat::whereDate('created_at', Carbon::today())->sum('total');

        // Get top selling products using the pivot table
        $topMontures = Monture::select('montures.*', DB::raw('COUNT(vent_monture.monture_id) as vents_count'))
            ->join('vent_monture', 'montures.id', '=', 'vent_monture.monture_id')
            ->groupBy('montures.id')
            ->orderBy('vents_count', 'desc')
            ->take(5)
            ->get();

        // Get top suppliers
        $topSuppliers = Fournisseur::withSum('vents', 'total')
            ->orderBy('vents_sum_total', 'desc')
            ->take(5)
            ->get();

        // Get monthly sales data for chart
        $monthlySales = Vent::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->get()
            ->pluck('total', 'month')
            ->toArray();
            
        // Fill in missing months with 0
        $monthlySalesData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlySalesData[] = $monthlySales[$i] ?? 0;
        }

        return view('dashboard', compact(
            'totalPatients',
            'totalPrescriptions',
            'totalSales',
            'totalPurchases',
            'recentPrescriptions',
            'recentSales',
            'monthlySalesData',
            'totalSuppliers',
            'totalProducts',
            'todaySales',
            'todayPurchases',
            'topMontures',
            'topSuppliers'
        ));
    }
} 