<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Mahasiswa;
use App\Models\Pkl;

class PerwalianPklChart
{
    protected $perwalianPklChart;

    public function __construct(LarapexChart $perwalianPklChart)
    {
        $this->chart = $perwalianPklChart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $currentUser = auth()->user();
        
        // Assuming there is a relationship defined in the Pkl model like 'mahasiswa'
        $pklData = Pkl::whereHas('mahasiswa', function ($query) use ($currentUser) {
            $query->where('nama_doswal', $currentUser->nama);
        })->get();

        $data = [
            $pklData->where('status_pkl', 'Lulus')->count(),
            $pklData->where('status_pkl', 'Belum Lulus')->count(),
        ];

        $label = [
            'Lulus',
            'Belum Lulus',
        ];

        return $this->chart->pieChart()
            ->setTitle('Progres PKL Perwalian Mahasiswa')
            ->setSubtitle('berdasarkan status Lulus dan Belum Lulus')
            ->addData($data)
            ->setLabels($label);
    }
}
