<?php 
$level = $this->session->userdata('level');
?>
<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu tree" data-widget="tree">

      <li><a href="#"><i class="fa fa-home text-primary"></i> <span>Acces to the Website</span></a></li>
      <li class="header">MAIN NAVIGATION</li>

      <?php if($level == 'manajer') 
      {?>
        <li class="active">
          <a href="<?php echo base_url('Home') ?>">
            <i class="fa fa-dashboard" aria-hidden="true"></i> 
            <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

          <li>
            <a href="<?php echo base_url('manajer/makanan') ?>">
              <i class="fa fa-cutlery" aria-hidden="true"></i>
              <span>Makanan</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url('manajer/minuman') ?>">
              <i class="fa fa-glass" aria-hidden="true"></i>
              <span>Minuman</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url('manajer/transaksi') ?>">
              <i class="fa fa-money" aria-hidden="true"></i>
              <span>Transaksi</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>

          <?php }
          else if($level == 'kasir')
          {
           ?>
           <li class="active treeview menu-open">
            <a href="#">
              <i class="fa fa-dashboard"></i> 
              <span>Dashboard</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>

          <li class="treeview menu-open">
            <a href="#">
              <i class="fa fa-address-book" aria-hidden="true"></i>
              <span>Pemesanan</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
          <?php } ?>

          <li><a href="<?php echo base_url('Login/logout') ?>"><i class="fa fa-power-off text-primary"></i> <span>Logout</span></a></li>

        </ul>
      </section>
    </aside>