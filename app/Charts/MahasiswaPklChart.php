<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Pkl;

class MahasiswaPklChart
{
    protected $mahasiswaPklChart;

    public function __construct(LarapexChart $mahasiswaPklChart)
    {
        $this->chart = $mahasiswaPklChart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $Pkl = Pkl::get();
        $data = [
            $Pkl->where('status_pkl','Lulus')->count(),
            $Pkl->where('status_pkl','Belum Lulus')->count(),
        ];
        
        $label = [
            'Lulus',
            'Belum Lulus',
        ];



        return $this->chart->pieChart()
            ->setTitle('Progres PKL Seluruh Mahasiswa')
            ->setSubtitle('berdasarkan status Lulus dan Belum Lulus')
            ->addData($data)
            ->setLabels($label);
    }
}
