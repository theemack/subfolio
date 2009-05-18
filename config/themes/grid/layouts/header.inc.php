<?php
    $showHide = "showSwitch";
    $showHideLabel = "".Kohana::lang('filebrowser.collapseheader');
    if (isset($_COOKIE['logo'])) {
        if ($_COOKIE['logo'] == "hideSwitch") {
            $showHide = "hideSwitch";
            $showHideLabel = "".Kohana::lang('filebrowser.expandheader');;
        }
    }
?>
<div id="header">
  <?
    $site_name_display = Kohana::config('filebrowser.site_name');
    $logo = Kohana::config('filebrowser.site_logo_url');
    if ($logo <> "") {
      $site_name_display = "<img src='$logo' />";
    }
  ?>
  
	<h1 id="logo" class="logo <?php print "".$showHide;?>"><a href='/' ><?php echo $site_name_display ?></a></div>
</div>

<div id="navigation">
  <div id="path">
    <?php if ($this->auth->logged_in()) { ?>
      <?php echo $this->auth->get_user()->name ?> browsing
    <?php } ?>

    <?php 
      $ff = $this->filebrowser->get_path(); 
      $parts = explode( "/", $ff);
    ?>
    <?php if ($ff <> "" && sizeof($parts) > 0) { 
      $path = "/";
      ?>
      <?php echo Kohana::lang('filebrowser.indexof'); ?> <a href="/"><?php echo Kohana::config('filebrowser.site_domain'); ?></a>
  
      <?php 
      $count = 1;
      foreach ($parts as $key => $value): ?>
        &nbsp;/&nbsp;
        
        <?php if ($count == sizeof($parts)) { ?>
          <?php echo FileFolder::fix_display_name($value) ?>
        <?php } else { ?>
          <a href="<?php echo $path.$value ?>"><?php echo FileFolder::fix_display_name($value) ?></a>
        <?php }  ?>
      <?php 
        $path .=  $value . "/";
        $count ++;
      endforeach ?>
  
    <?php } else { ?>
      <?php echo Kohana::lang('filebrowser.indexof'); ?> <a href="/"><?php echo Kohana::config('filebrowser.site_domain'); ?></a>
    <?php } ?>
  </div>
  <div id="pathlinks">
      <?php
      if ($this->auth->logged_in()) {
          print "<a title='Logout' alt='' href='/logout'>".Kohana::lang('filebrowser.logout')."</a> | ";
      }
  
      $subject = "Link from " . $_SERVER["SERVER_NAME"];
      $body = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
      ?>
    <script>
      <!--
      document.write('<a href="mailto:?subject=<?php print "".$subject?>&body='+location.href+'"><?php echo Kohana::lang('filebrowser.sendpage') ?></a>');
      -->
    </script>
    | <a id="showHideSwitch" href="javascript:showHideSwitch('logo', document.getElementById('hideText')); "><FONT id="hideText"><?php print "".$showHideLabel;?></FONT></a>
    <?php /* ?> | <a href="javascript:void(location.href='http://tinyurl.com/create.php?url='+encodeURIComponent(location.href))">generate tiny url</a><?php */ ?>

  </div>

  <?php require("prev_next.inc.php") ?>
</div>