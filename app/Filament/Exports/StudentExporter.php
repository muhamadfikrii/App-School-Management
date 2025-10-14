<?php

namespace App\Filament\Exports;

use App\Models\Student;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;
use OpenSpout\Common\Entity\Style\CellAlignment;
use OpenSpout\Common\Entity\Style\Style;

class StudentExporter extends Exporter
{
    protected static ?string $model = Student::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('nisn')->label('NISN'),
            ExportColumn::make('full_name')->label('Nama Lengkap'),
            ExportColumn::make('date_of_birth')->label('Tanggal Lahir'),
            ExportColumn::make('address')->label('Alamat'),
            ExportColumn::make('gender')->label('Jenis Kelamin'),
            ExportColumn::make('email')->label('Email'),
            ExportColumn::make('avatar_url')->label('Avatar'),
            ExportColumn::make('phone')->label('Nomor HP'),
            ExportColumn::make('parent_name')->label('Nama Orang Tua'),
            ExportColumn::make('parent_phone')->label('Nomor HP Orang Tua'),
            ExportColumn::make('status')->label('Status'),
            ExportColumn::make('year_enrollment')->label('Tahun Masuk'),
            ExportColumn::make('classRombel.name')->label('Kelas'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Ekspor data siswa selesai! '
            .Number::format($export->successful_rows)
            .' '.str('baris')->plural($export->successful_rows)
            .' berhasil diekspor.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' '
                .Number::format($failedRowsCount)
                .' '.str('baris')->plural($failedRowsCount)
                .' gagal diekspor.';
        }

        return $body;
    }

    public function getXlsxCellStyle(): ?Style
    {
        return (new Style)
            ->setFontSize(12)
            ->setFontBold()
            ->setCellAlignment(CellAlignment::CENTER)
            ->setFontName('Times New Roman');
    }
}
