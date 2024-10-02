<?php 

namespace App\Exports;
use App\Models\Awblabel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class AwblabelListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(Awblabel::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
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
