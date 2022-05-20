<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\ { Column, DateColumn };

class PaymentsTable extends LivewireDatatable
{
    public $model = Payment::class;

    public function columns()
    {
        return [
            DateColumn::name('created_at')
                ->label('Date de paiment'),
            Column::name('event.home.title')
                ->label('Gîte'),
            DateColumn::name('event.start')
                ->label('Début du séjour'),
        ];
    }
}