<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo mr-auto">
      <a href="#top">
          <img src="img/logo-kblh.png" class="img-fluid"/>
      </a>
    </h1>
    
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="#top"><?php echo __('custom.home');?></a></li>
        <li><a href="<?php echo env('R_BOOKS')?>"><?php echo __('custom.books');?></a></li>
        <li><a href="<?php echo env('R_AUTHORS')?>"><?php echo __('custom.authors');?></a></li>
        <li><a href="<?php echo env('R_BOOKS')?>"><?php echo __('custom.categories');?></a></li>
      </ul>
    </nav><!-- .nav-menu -->

  </div>
</header><!-- End Header -->
