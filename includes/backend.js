;(function($){
  
  //Create namespace.
  ns('window.mokuji.archive');
  
  //ArchiveManager class.
  window.mokuji.archive.ArchiveManager = new Controller.sub({
    
    el: '#archive-manager',
    namespace: 'mokuji.archive',
    onPage: 1,
    
    elements: {
      'archive-list': '.archive-list',
      'paginationWrapper': '.pagination-wrapper',
      'page-1': '.page-1',
      'page-2': '.page-2',
      'page-3': '.page-3',
    },
    
    toPage: function(page){
      
      page = parseInt(page, 10);
      
      var self = this;
      self.paginationWrapper.animate({left: (-((page-1)*100))+'%'}, 300);
      
    }
    
  });
  
  
})(jQuery);