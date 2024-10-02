<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Awblabel extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'awblabel';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'airline','awbbc','awb','hawb','destination','origin','total'
	];
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				id LIKE ?  OR 
				airline LIKE ?  OR 
				awbbc LIKE ?  OR 
				awb LIKE ?  OR 
				hawb LIKE ?  OR 
				origin LIKE ?  OR 
				destination LIKE ?  OR 
				total LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"id",
			"airline",
			"awbbc",
			"awb",
			"hawb",
			"origin",
			"destination",
			"total" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id",
			"airline",
			"awbbc",
			"awb",
			"hawb",
			"origin",
			"destination",
			"total" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"id",
			"airline",
			"awbbc",
			"awb",
			"hawb",
			"destination",
			"origin",
			"total" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"id",
			"airline",
			"awbbc",
			"awb",
			"hawb",
			"destination",
			"origin",
			"total" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"airline",
			"awbbc",
			"awb",
			"hawb",
			"destination",
			"origin",
			"total",
			"id" 
		];
	}
}
