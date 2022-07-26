<?php

namespace App\Exports;
use App\Destination;
use App\Booking;
use App\Package;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;

class TourMonthExport implements FromCollection, WithHeadings, WithTitle, WithEvents, ShouldAutoSize
{
	public $tourmonths;
	/**
  * Create tour month export constructor.
  * @param $year
  * @param $tourmonths
  */

	public function __construct($year, $tourmonths) {
		$this->year = $year;
		$this->tourmonths = $tourmonths;
	}
	/**
  * Display a title for searching year's most tour month report.
  * @return string
  */
	public function title(): string {
		return $this->year."_Most_Tour_Month";
	}

	/**
  * Show heading in excel file.
  * @return array
  */
	public function headings(): array {
		return ["No", "Month", "No of Guest", "No of Booking"];
	}
	/**
  * Display monthly booking customer in excel file.
  * @return \Illuminate\Support\Collection
  */
	public function collection() {
		return $this->tourmonths;
	}
	/**
  * Display design in excel file.
  * @return array
  */
	public function registerEvents(): array {
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
			AfterSheet::class    => function(AfterSheet $event) use ($styleArray, $inner) {
				$cellRange = 'A1:d1'; // All headers
				$event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
				$event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);
				$event->sheet->getDelegate()->getStyle('A2:' .
				$event->sheet->getDelegate()->getHighestColumn() .
				$event->sheet->getDelegate()->getHighestRow())->ApplyFromArray($inner);
			},
		];
	}
}
