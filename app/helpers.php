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

