<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ExportUser implements FromQuery, WithHeadings, WithMapping, WithChunkReading, WithColumnFormatting
{
    public function query()
    {
        return User::query();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Type',
            'City',
            'Number of Invitations'
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->type,
            $user->country ? $user->country->name : '-',
            $user->event
        ];
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_TEXT,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true, 'size' => 50, 'italic' => true]],
        ];
    }
}
