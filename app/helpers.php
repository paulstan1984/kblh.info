<?php

if (! function_exists('paginatedQuery')) {
  function paginatedQuery($baseUrl, $pagination, $updateParams){
    $params = [];
    $params['page'] = $pagination->page;
    $params['orderby'] = $pagination->orderby;
    $params['orderbydir'] = $pagination->orderbydir;

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

