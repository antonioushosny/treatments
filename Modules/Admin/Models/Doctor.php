<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class Doctor extends Model
{
    use  StorageHandle;
    protected $connection = 'mysql';
    // use   StorageHandle;

    /**
     * Primary key. 
     * 
     * @var string
     */
    protected $primaryKey = 'doctors_id';
 

    /**
     * 
     * Timestamps.
     * 
     * @var string
     */
    const CREATED_AT = 'doctors_created_at';
    const UPDATED_AT = 'doctors_updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctors_name', 'specialties_id','departments_id','doctors_status','doctors_phone','doctors_email','doctors_civil_no','password','hospitals_id','countries_id'
    ];
 
    /**
     * Many to one relation with country.
     * 
     * @return collection of country
     */
    public function country()
    {
    	return $this->belongsTo('Modules\Admin\Models\Country', 'countries_id', 'countries_id');
    }
        
    /**
     * Many to one relation with hospitals.
     * 
     * @return collection of hospital
     */
    public function hospital()
    {
    	return $this->belongsTo('Modules\Admin\Models\Hospital', 'hospitals_id', 'hospitals_id');
    }
    /**
     * Many to one relation with departments.
     * 
     * @return collection of department
     */
    public function department()
    {
    	return $this->belongsTo('Modules\Admin\Models\Department', 'departments_id', 'departments_id');
    }
    /**
     * Many to one relation with specialties.
     * 
     * @return collection of specialty
     */
    public function specialty()
    {
    	return $this->belongsTo('Modules\Admin\Models\Specialty', 'specialties_id', 'specialties_id');
    }
    /**
     * Scope a query to order data.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $type    ['asc', 'desc']
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSorted($query, $type='asc')
    {
        // return $query->orderBy('doctors_position', $type)->orderBy('doctors.doctors_id', $type);
    }

    /**
     * Scope a query to fetch Active data only.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('doctors_status', 'active');
    }

     

}
