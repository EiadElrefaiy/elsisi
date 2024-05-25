<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Admin;
use App\Models\Attendance;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Money;
use App\Models\Offer;
use App\Models\OfferItem;
use App\Models\Product;
use App\Models\Representative;
use App\Models\Supplier;
use App\Models\Procedure;

trait ModelHelperTrait
{
    /**
     * Get the model class based on the table name
     *
     * @param string $table
     * @return string|null
     */
    private function getModelClass($table)
    {
        $models = [
            'users' => User::class,
            'admins' => Admin::class,
            'attendance' => Attendance::class,
            'clients' => Client::class,
            'employees' => Employee::class,
            'invoices' => Invoice::class,
            'invoice_items' => InvoiceItem::class,
            'money' => Money::class,
            'offers' => Offer::class,
            'offer_items' => OfferItem::class,
            'products' => Product::class,
            'representatives' => Representative::class,
            'suppliers' => Supplier::class,
            'procedures' => Procedure::class,
        ];

        return $models[$table] ?? null;
    }

    /**
     * Get the relationships to be eager loaded based on the model class
     *
     * @param string $modelClass
     * @return array
     */
    private function getRelationships($modelClass)
    {
        $relationships = [
            Attendance::class => ['employee'],
            Client::class => ['offers'],
            Employee::class => ['attendances', 'absences', 'rewards', 'discounts'],
            Invoice::class => ['supplier', 'items', 'products'],
            InvoiceItem::class => ['invoice'],
            Money::class => ['representative'],
            Offer::class => ['client', 'items', 'products', 'representatives'],
            OfferItem::class => ['offer'],
            Product::class => ['invoices', 'offers'],
            Representative::class => ['money', 'offers'],
            Supplier::class => ['invoices'],
            Procedure::class => ['employee'],
            // Add other relationships here
        ];

        return $relationships[$modelClass] ?? [];
    }
}
