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

class PackageExport implements FromCollection, WithHeadings, WithTitle, WithEvents, ShouldAutoSize
{
  /**
  * Create package export constructor.
  * @param $year
  * @param $packages
  */

  public function __construct($year, $packages){
    $this->packages = $packages;
    $this->year = $year;
  }
  /**
  * Show heading in excel file.
  * @return array
  */
  public function headings(): array
  {
    {
      return ["No", "Package", "Destination Name", "No of Booking"];
    }
  }
  /**
  * Display most demand package in excel file.
  * @return \Illuminate\Support\Collection
  */
  public function collection()
  {
    return  $this->packages;
  }
  /**
  * Display a title for searching year's most demand package report.
  * @return string
  */
  public function title(): string
  {
    return  $this->year."_Most_Demanded_Package";
  }
  /**
  * Display design in excel file.
  * @return array
  */
  public function registerEvents(): array
  {
    $styleArray = [
      'borders' => ['allBorders' => [
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
      $cellRange = 'A1:D1'; // All headers
      $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
      $event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);
      $event->sheet->getDelegate()->getStyle('A2:' .
      $event->sheet->getDelegate()->getHighestColumn() .
      $event->sheet->getDelegate()->getHighestRow())->ApplyFromArray($inner);
    },
  ];
}
}
