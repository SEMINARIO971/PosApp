<?php

namespace App\Livewire;

use App\Models\Venta;
use Livewire\Component;

class ReportesLivewire extends Component
{
    public $selectedPeriod = 'day'; // Día por defecto
    public $sales=[];
    public $salesData=[];

    public function updatedSelectedPeriod()
    {
        $this->generateReport();
    }
    public function generateReport()
    {
        $query = Venta::query();

        switch ($this->selectedPeriod) {
            case 'day':
                $query->whereDate('created_at', today());

                break;
            case 'week':
                $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'month':
                $query->whereMonth('created_at', now()->month);
                break;
        }

        $this->sales = $query->with('detalles')->get();
        // dd($this->sales);
    }
    public function mount()
    {
        // Cargar los datos de ventas (ajusta la consulta según tus necesidades)

    }
    public function render()
    {


        return view('livewire.reportes-livewire',[
            'sales' => $this->sales,
            'salesData'=>$this->salesData,
        ])->layout('layouts.pos');
    }
}
