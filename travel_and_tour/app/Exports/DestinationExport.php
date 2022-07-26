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

class DestinationExport implements FromCollection, WithHeadings, WithEvents, WithTitle, ShouldAutoSize
{
  public $destinations, $year;
  /**
  * Create Destination Export Constructor.
  * @param $year
  * @param $bookingCustomers
  */
  public function __construct($year, $destinations)
  {
    $this->year = $year;
    $this->destinations = $destinations;
  }
  /**
  * Display a title for searching year's most popular destination report.
  * @return string
  */
  public function title(): string
  {
    return  $this->year."_Poupular_Destination";
  }
  /**
  * Show heading in excel file.
  * @return array
  */
  public function headings(): array
  {
    return ["No", "Name", "City", "Division", "No of Guest"];
  }
  /**
  * Display most popular destination in excel file.
  * @return \Illuminate\Support\Collection
  */
  public function collection()
  {
    return  $this->destinations;
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
        $cellRange = 'A1:e1'; // All headers

        $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
        $event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);
        $event->sheet->getDelegate()->getStyle('A2:' .
        $event->sheet->getDelegate()->getHighestColumn() .
        $event->sheet->getDelegate()->getHighestRow())->ApplyFromArray($inner);
      },
    ];
  }
}
