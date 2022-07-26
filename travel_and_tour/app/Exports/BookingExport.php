<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use \Maatwebsite\Excel\Sheet;
use User;
use Booking;


class BookingExport implements FromCollection, WithHeadings, WithEvents, WithTitle, ShouldAutoSize
{
  public $bookingCustomers, $year;
  /**
  * Create booking export constructor.
  * @param $year
  * @param $bookingCustomers
  */

  public function __construct($year, $bookingCustomers)
  {
    $this->year = $year;
    $this->bookingCustomers = $bookingCustomers;
  }
  /**
  * Show heading in excel file.
  * @return array
  */
  public function headings(): array
  {
    return ["No", "Customer Name","User Type", "No of Booking", "Email", "Phone No"];
  }
  /**
  * Display most popular booking customer in excel file.
  * @return \Illuminate\Support\Collection
  */
  public function collection()
  {
    return $this->bookingCustomers;
  }
  /**
  * Display a title for searching year's most popular booking report.
  * @return string
  */
  public function title(): string
  {
    return $this->year."_Popular_Booking_Report";
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
        $cellRange = 'A1:F1'; // All headers
        $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
        $event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);
        $event->sheet->getDelegate()->getStyle('A2:' .
        $event->sheet->getDelegate()->getHighestColumn() .
        $event->sheet->getDelegate()->getHighestRow())->ApplyFromArray($inner);
      },
    ];
  }
}
