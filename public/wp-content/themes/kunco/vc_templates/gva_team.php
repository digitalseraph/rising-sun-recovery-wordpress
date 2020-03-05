<?php
$link = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$avata = wp_get_attachment_image_src($photo, 'full');
$image = (isset($avata[0]) && $avata[0]) ? $avata[0] : '';

//Style display horizontal
if($style=='horizontal'){ ?>
<div class="widget gsc-team team-horizontal <?php echo esc_attr($style) ?> <?php echo esc_attr($el_class) ?>">
  <div class="row">
    <div class="col-lg-6 col-md-6">
      <div class="team-header">
        <img alt="<?php echo esc_attr($name); ?>" src="<?php echo esc_url_raw($image); ?>" class="img-responsive"> 
        <div class="box-hover">
          <div class="content-inner">
            <div class="social-list text-center">
              <?php if($facebook){ ?>
                <a href="<?php echo esc_url_raw( $facebook ); ?>"><i class="gv-icon-1405"></i></a>
              <?php } ?>
              <?php if($twitter){ ?>   
                <a href="<?php echo esc_url_raw( $twitter ); ?>"><i class="gv-icon-1406"></i></a>
              <?php } ?>
              <?php if($pinterest){ ?>   
                <a href="<?php echo esc_url_raw( $pinterest ); ?>"><i class=" gv-icon-1416"></i></a>
              <?php } ?>
              <?php if($google){ ?>   
                <a href="<?php echo esc_url_raw( $google ); ?>"><i class="gv-icon-1409"></i></a>
              <?php } ?>  
              <?php if($linkedin){ ?>
                <a href="<?php echo esc_url_raw( $linkedin ); ?>"><i class="gv-icon-1408"></i></a>
              <?php } ?>                                              
            </div>  
          </div>   
        </div>
      </div> 
    </div>
    <div class="col-lg-6 col-md-6">
      <div class="team-body">
        <div class="team-body-content">
          <h3 class="team-name">
            <?php if($link){ ?> <a href="<?php echo esc_url_raw($link); ?>"><?php } ?>   
              <?php echo esc_html($name) ?>
            <?php if($link){ ?> </a> <?php } ?>
          </h3>
          <p class="team-position"><?php echo esc_html($job) ?></p>
        </div>  
        <p class="team-info"><?php echo esc_html($content) ?></p>      
      </div>                            
    </div>
  </div>
</div>
<?php } ?>

<?php 
   //Style display vertical
if($style=='vertical'){ ?>
<div class="widget gsc-team team-vertical <?php echo esc_attr($style) ?> <?php echo esc_attr($el_class) ?>">
  <div class="widget-content text-center">
    <div class="team-header text-center">
      <img alt="<?php echo esc_attr($name); ?>" src="<?php echo esc_url_raw( $image ) ?>" class="img-responsive"> 
      <div class="box-hover">
        <div class="team-content"><?php echo esc_html( $content ) ?></div>     
      </div>   
    </div> 
    <div class="team-body">
      <div class="info">
        <h3 class="team-name">
          <?php if($link){ ?><a href="<?php echo esc_url( $link ); ?>"><?php } ?>  
            <?php echo esc_html( $name ) ?>
          <?php if($link){ ?> </a> <?php } ?>
        </h3>
        <p class="team-position"><?php echo esc_html( $job ) ?></p>
        <div class="social-list">
          <?php if($facebook){ ?>
            <a href="<?php echo esc_url_raw( $facebook ); ?>"><i class="gv-icon-1405"></i></a>
          <?php } ?>
          <?php if($twitter){ ?>   
            <a href="<?php echo esc_url_raw( $twitter ); ?>"><i class="gv-icon-1406"></i></a>
          <?php } ?>
          <?php if($pinterest){ ?>   
            <a href="<?php echo esc_url_raw( $pinterest ); ?>"><i class=" gv-icon-1416"></i></a>
          <?php } ?>
          <?php if($google){ ?>   
            <a href="<?php echo esc_url_raw( $google ); ?>"><i class="gv-icon-1409"></i></a>
          <?php } ?>  
          <?php if($linkedin){ ?>
            <a href="<?php echo esc_url_raw( $linkedin ); ?>"><i class="gv-icon-1408"></i></a>
          <?php } ?>                                          
        </div>
      </div>
    </div>                            
  </div>
</div>
<?php } ?>

<?php 
   //Style display vertical small
if($style=='vertical-small'){ ?>
<div class="widget gsc-team team-vertical-small <?php echo esc_attr($style) ?> <?php echo esc_attr($el_class) ?>">
  <div class="widget-content text-center">
    <div class="team-header text-center margin-bottom-10">
      <img alt="<?php echo esc_attr($name); ?>" src="<?php echo esc_url($image) ?>" class="img-responsive"> 
    </div> 
    <div class="team-body">
      <div class="team-body-content">
        <h3 class="team-name">
          <?php if($link){ ?><a href="<?php echo esc_url($link); ?>"><?php } ?>  
            <?php echo esc_html($name) ?>
          <?php if($link){ ?> </a> <?php } ?>
        </h3>
        <div class="team-position"><?php  echo esc_html($job) ?></div>
      </div>  
     <div class="team-info"><?php echo esc_html( $content ) ?></div>      
     <div class="social-icons">
        <?php if($facebook){ ?>
          <a href="<?php echo esc_url_raw( $facebook ); ?>"><i class="gv-icon-1405"></i></a>
        <?php } ?>
        <?php if($twitter){ ?>   
          <a href="<?php echo esc_url_raw( $twitter ); ?>"><i class="gv-icon-1406"></i></a>
        <?php } ?>
        <?php if($pinterest){ ?>   
          <a href="<?php echo esc_url_raw( $pinterest ); ?>"><i class=" gv-icon-1416"></i></a>
        <?php } ?>
        <?php if($google){ ?>   
          <a href="<?php echo esc_url_raw( $google ); ?>"><i class="gv-icon-1409"></i></a>
        <?php } ?>  
        <?php if($linkedin){ ?>
          <a href="<?php echo esc_url_raw( $linkedin ); ?>"><i class="gv-icon-1408"></i></a>
        <?php } ?>                                               
      </div>                         
    </div>                            
  </div>
</div>
<?php } ?>

<?php 
   //circle
if($style=='circle'){ ?>
<div class="widget gsc-team team-vertical team-circle <?php echo esc_attr($style) ?> <?php echo esc_attr($el_class) ?>">
 <div class="widget-content text-center">
    <div class="team-header text-center">
      <img alt="<?php echo esc_attr($name); ?>" src="<?php echo esc_url( $image ) ?>" class="img-responsive"> 
      <div class="box-hover">
        <div class="team-content"><?php echo esc_html( $content ) ?></div>     
      </div>   
    </div> 
    <div class="team-body">
      <div class="info">
        <h3 class="team-name">
         <?php if($link){ ?><a href="<?php echo esc_url($link); ?>"><?php } ?>  
           <?php echo esc_html($name) ?>
           <?php if($link){ ?> </a> <?php } ?>
        </h3>
        <p class="team-position"><?php echo esc_html($job) ?></p>
        <div class="social-list">
          <?php if($facebook){ ?>
            <a href="<?php echo esc_url_raw( $facebook ); ?>"><i class="gv-icon-1405"></i></a>
          <?php } ?>
          <?php if($twitter){ ?>   
            <a href="<?php echo esc_url_raw( $twitter ); ?>"><i class="gv-icon-1406"></i></a>
          <?php } ?>
          <?php if($pinterest){ ?>   
            <a href="<?php echo esc_url_raw( $pinterest ); ?>"><i class=" gv-icon-1416"></i></a>
          <?php } ?>
          <?php if($google){ ?>   
            <a href="<?php echo esc_url_raw( $google ); ?>"><i class="gv-icon-1409"></i></a>
          <?php } ?>  
          <?php if($linkedin){ ?>
            <a href="<?php echo esc_url_raw( $linkedin ); ?>"><i class="gv-icon-1408"></i></a>
          <?php } ?>                                        
        </div>
      </div>
    </div>                            
  </div>
</div>
<?php } ?>

