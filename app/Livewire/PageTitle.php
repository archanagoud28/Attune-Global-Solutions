<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class PageTitle extends Component
{
    public $pageTitle;

    public function mount()
    {
        // Fetch the title dynamically based on the current route
        $this->pageTitle = $this->getTitleFromRoute();
    }

    private function getTitleFromRoute()
    {
        // Get the current route name
        $routeName = Route::currentRouteName();

        // You can customize this logic to provide a more user-friendly title
        // For example, remove prefixes or customize as needed
        return $this->mapRouteToTitle($routeName);
    }

    private function mapRouteToTitle($routeName)
    {
        $routeTitleMap = [
            'home-page' => 'Home',
            'customer-page' => 'Customers',
            'customer-pages' => 'Customers',
            'contractor-page' => 'Contractors',
            'vendor-page' => 'Vendors',
            'vendor-pages' => 'Vendors',
            'employee-list-page' => 'Employees',
            'time-sheet-display' => 'Time Sheets',
            'time-sheets-display' => 'Time Sheets',
            'employee-pages' => 'Employees',
            'salesOrPurchase' => 'Sales / Purchase Orders',
            'billsOrInvoices' => 'Bills / Invoices',
            // Add more mappings as needed
        ];

        // Use the mapped title or fallback to the original route name
        return $routeTitleMap[$routeName] ?? ucwords(str_replace('-', ' ', $routeName));
    }

    public function render()
    {
        return view('livewire.page-title');
    }
}
