<?php

namespace App\Exports;
use App\Destination;
use App\Booking;
use App\Package;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use \Maatwebsite\Excel\Sheet;

class TourYearExport implements FromCollection, WithHeadings, WithEvents, WithTitle, ShouldAutoSize
{
  public $touryears, $year;
  /**
  * Create tour yearly export constructor.
  * @param $year
  * @param $touryears
  */
  public function __construct($year, $touryears)
  {
    $this->year = $year;
    $this->touryears = $touryears;
  }
  /**
  * Display a title for searching year's finance report.
  * @return string
  */
  public function title(): string
  {
    return  $this->year."_Year_Finance";
  }
  /**
  * Show heading in excel file.
  * @return array
  */
  public function headings(): array {
    return [ "Month", "Total Income Per Month", "Total Booking Per Month"];
  }
  /**
  * Display yearly booking finance in excel file.
  * @return \Illuminate\Support\Collection
  */
  public function collection()
  {
    return collect($this->touryears);
  }
  /**
  * Display design in excel file.
  * @return array
  */
  public function registerEvents(): array
  {
    $styleArray = [
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
          'color' => ['argb' => '000000'],
        ],
      ],
    ];
    $inner = [
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
          'color' => ['argb' => '000000'],
        ],
      ],
    ];
    return [
      AfterSheet::class => function(AfterSheet $event) use ($styleArray, $inner)
      {
        $cellRange = 'A1:C1'; // All headers

        $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
        $event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);
        $event->sheet->getDelegate()->getStyle('A2:' .
        $event->sheet->getDelegate()->getHighestColumn() .
        $event->sheet->getDelegate()->getHighestRow())->ApplyFromArray($inner);
      },
    ];
  }
}
