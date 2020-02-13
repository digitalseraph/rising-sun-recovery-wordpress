<?php if(kunco_get_option('enable_topbar', 'disable') == 'enable'){ ?>
  <div class="topbar hidden-sm hidden-xs">
    <div class="container">
      <div class="content-inner">
        <div class="left pull-left">
          <?php echo kunco_get_option('topbar_information', '<ul class="inline"><li><span> <i class="fa fa-clock-o"></i>Mon - Fri : 09:00 - 17:00</span> </li><li><span><i class="fa fa-envelope"></i>contact@kunco-demo.com</span></li></ul>') ?>
        </div> 
        <div class="right pull-right">
          <?php get_template_part( 'templates/parts/socials' ); ?>
        </div>   
      </div>   
    </div>   
  </div>
<?php } ?>  