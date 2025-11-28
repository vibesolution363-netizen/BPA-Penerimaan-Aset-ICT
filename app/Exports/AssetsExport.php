<?php

namespace App\Exports;

use App\Models\Recipient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AssetsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    protected $rowNumber = 0;
    protected $year;

    public function __construct($year = null)
    {
        $this->year = $year ?? date('Y');
    }

    public function collection()
    {
        return Recipient::with('assets')
            ->where('tahun', $this->year)
            ->orderBy('nama')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Bil',
            'Nama Penerima',
            'Jenis Aset',
            'Tarikh Penerimaan',
            'Laptop/AIO/Desktop',
            'Adapter Charger',
            'DVD Drive',
            'Power Cord',
            'Dongle',
            'Mouse',
            'Monitor',
            'Keyboard',
            'UPS',
            'Status Tandatangan',
        ];
    }

    public function map($recipient): array
    {
        $rows = [];
        $assets = $recipient->assets;
        
        if ($assets->isEmpty()) {
            return [];
        }

        $signatureStatus = $recipient->signature ? 'DITERIMA' : 'BELUM DITERIMA';

        foreach ($assets as $index => $asset) {
            $this->rowNumber++;
            
            $rows[] = [
                $index === 0 ? $this->rowNumber : '',
                $index === 0 ? $recipient->nama : '',
                $asset->jenis,
                $asset->tarikh_penerimaan ? \Carbon\Carbon::parse($asset->tarikh_penerimaan)->format('d/m/Y') : '-',
                $asset->siri_device ?: '-',
                $asset->siri_adapter ?: '-',
                $asset->siri_dvd_drive ?: '-',
                $asset->siri_cord ?: '-',
                $asset->siri_dongle ?: '-',
                $asset->siri_mouse ?: '-',
                $asset->siri_monitor ?: '-',
                $asset->siri_keyboard ?: '-',
                $asset->siri_ups ?: '-',
                $index === 0 ? $signatureStatus : '',
            ];
        }

        return $rows;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'size' => 12],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'E2E8F0']
                ],
                'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 8,
            'B' => 25,
            'C' => 20,
            'D' => 20,
            'E' => 20,
            'F' => 15,
            'G' => 15,
            'H' => 15,
            'I' => 15,
            'J' => 15,
            'K' => 15,
            'L' => 15,
            'M' => 15,
            'N' => 20,
        ];
    }
}
