<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public function rubric()
    {
        return $this->belongsTo('App\Models\Rubric', 'rubric_news_id');
    }
    public function author(){
        return $this->belongsTo('App\Models\Author','rubric_news_id');
    }
    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
