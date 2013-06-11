<?php namespace components\archive; if(!defined('TX')) die('No direct access.'); ?>

<div id="archive-manager">
  
  <h1><?php __($names->component, 'ARCHIVE_MANAGER_VIEW_TITLE'); ?></h1>
  
  <!-- keeps the 100% width view -->
  <div class="pagination-viewport">
    
    <!-- has a 100% * pages width -->
    <div class="pagination-wrapper">
      
      <div class="page-1">
        
        <div class="archive-list">
          <?php
          
          echo $data->archives->as_table(array(
            __('Title', true) => 'title',
            __($names->component, 'Entries', true) => 'num_entries',
            __($names->component, 'Owner', true) => function($row){ return $row->owner->user_info->full_name->otherwise($row->owner->email); },
            __($names->component, 'Created', true) => 'dt_created',
            __($names->component, 'Last modified', true) => 'dt_last_modified',
            __('Actions', true) => function($row){
              return '<a class="icon-eye-open view-archive-entries action" href="#" data-id="'.$row->id.'"></a>'.n.
                '<a class="icon-pencil edit-archive action" href="#" data-id="'.$row->id.'"></a>'.n.
                '<a class="icon-trash delete-archive action" href="#" data-id="'.$row->id.'"></a>';
            }
          ));
          
          ?>
        </div>
        
      </div>
      
      <div class="page-2"></div>
      
    </div>
  </div>
  
</div>