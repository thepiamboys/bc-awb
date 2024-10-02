<?php 

namespace App\Exports;
use App\Models\Awblabel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class AwblabelViewExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	protected $query;

	protected $rec_id;

    public function __construct($query, $rec_id)
    {
        $this->query = $query->select(Awblabel::exportViewFields());
        $this->rec_id = $rec_id;
    }


    public function query()
    {
        return $this->query->where("id", $this->rec_id);
    }


	public function headings(): array
    {
        return [
			'Id',
			'Airline',
			'Awbbc',
			'Awb',
			'Hawb',
			'Destination',
			'Origin',
			'Total'
        ];
    }


    public function map($record): array
    {
        return [
			$record->id,
			$record->airline,
			$record->awbbc,
			$record->awb,
			$record->hawb,
			$record->destination,
			$record->origin,
			$record->total
        ];
    }
}
