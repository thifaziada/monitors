<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Skripsi;

class MahasiswaSkripsiChart
{
    protected $mahasiswaSkripsiChart;

    public function __construct(LarapexChart $mahasiswaSkripsiChart)
    {
        $this->chart = $mahasiswaSkripsiChart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {   
        $skripsi = Skripsi::get();
        $data = [
            $skripsi->where('status_skripsi','Lulus')->count(),
            $skripsi->where('status_skripsi','Belum Lulus')->count(),
        ];

        $label = [
            'Lulus',
            'Belum Lulus',
        ];

        return $this->chart->pieChart()
            ->setTitle('Progres Skripsi Seluruh Mahasiswa')
            ->setSubtitle('berdasarkan status Lulus dan Belum Lulus')
            ->addData($data)
            ->setLabels($label);
    }
}
