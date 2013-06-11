<?php namespace components\archive; if(!defined('TX')) die('No direct access.');

class Views extends \dependencies\BaseViews
{
  
  protected function archive_manager()
  {
    
    return array(
      
      'archives' => mk('Sql')
        ->table('archive', 'Archives')
        ->order('dt_last_modified', 'DESC')
        ->execute()
      
    );
    
  }
  
}
