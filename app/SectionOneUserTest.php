<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionOneUserTest extends Model
{
    protected $table = 'section_one_user_tests';
	protected $primaryKey = 'id';
	public $timestamps = true;

    protected $fillable = [
        'id','user_id','evaluation','time',
        'question_1','question_2','question_3','question_4','question_5',
        'question_6','question_7','question_8','question_9','question_10',
        'question_11','question_12','question_13','question_14','question_15',
        'question_16','question_17','question_18','question_19','question_20',
        'question_21','question_22','question_23','question_24','question_25',
        'question_26','question_27','question_28','question_29','question_30',
        'created_at','updated_at',
    ];
    public function user()
    {
        return $this->belongsTo
        (
            'App\User',
            'user_id',
            'id'
        )
        ->withDefault();
    }
}
