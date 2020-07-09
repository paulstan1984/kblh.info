<?php

if (! function_exists('paginatedQuery')) {
  function paginatedQuery($baseUrl, $pagination, $updateParams){
    $params = [];

    foreach($pagination as $p=>$v){
      if($p!='results'){
        $params[$p]=$v;
      }
    }

    foreach($updateParams as $p=>$v){
      $params[$p]=$v;
    }

    $qString = [];
    foreach($params as $p=>$v){
      $qString[]=$p.'='.$v;
    }

    return $baseUrl.'?'.implode('&', $qString);
  }
}

if (! function_exists('getOrderDir')) {
  function getOrderDir($pagination, $field){
    
    if($pagination->orderby == $field && $pagination->orderbydir == 'asc'){
      return 'desc';
    }
    if($pagination->orderby == $field && $pagination->orderbydir == 'desc'){
      return 'asc';
    }

    return 'asc';
  }
}

if (! function_exists('orderIcon')) {
  function orderIcon($pagination, $field){
    
    if($pagination->orderby == $field && $pagination->orderbydir == 'asc'){
      return '<i class="fas fa-arrow-up"></i>';
    }
    if($pagination->orderby == $field && $pagination->orderbydir == 'desc'){
      return '<i class="fas fa-arrow-down"></i>';
    }

    return'';
  }
}

if (! function_exists('chapter_description')) {
  function chapter_description($chapter){
    
    $descr = '<div id="chapter-' . $chapter->id . '"></div>';

    if($chapter!=null && $chapter->description != null){
      $descr.= $chapter->description;
    }

    if($chapter!=null && $chapter->subsections != null){
      foreach($chapter->subsections as $subsection){
        $descr.=chapter_description($subsection);
      }
    }

    return $descr;
  }
}

if (! function_exists('chapter_menu')) {
  function chapter_menu($chapter){
    
    $descr = '<li class="nav-item">';
    $descr.= '<a class="nav-link" href="' . env('R_BOOK').'/'.$chapter->bookid . '#chapter-' . $chapter->id . '">' . $chapter->title . '</a>';
    
    if($chapter!=null && $chapter->subsections != null){
      $descr.= '<ul class="nav flex-column ml-2">';
      foreach($chapter->subsections as $subsection){
        
        $descr.=chapter_menu($subsection);
      }
      $descr.= '</ul>';
    }


    $descr.= '</li>';
    
    return $descr;
  }
}