<?php

namespace App\Filters;

class SearchFilter extends QueryFilter{

    function rubric_id($id){
        return $this->builder->where('rubric_news_id',$id);

    }
    function author_id($id){
        return $this->builder->where('news_author_id',$id);

    }
    public function search_field($search_string = ''){
        return $this->builder
            ->where('heading', 'LIKE', '%'.$search_string.'%')
            ->orWhere('anons', 'LIKE', '%'.$search_string.'%')
            ->orWhere('text','LIKE', '%'.$search_string.'%');
    }
}
