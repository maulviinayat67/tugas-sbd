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
        <li class="<?php if($this->uri->segment(1)=="home"){echo "active";}?>">
          <a href="<?php echo base_url('home') ?>">
            <i class="fa fa-dashboard" aria-hidden="true"></i> 
            <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

          <li class="<?php if($this->uri->segment(2)=="makanan"){echo "active";}?>">
            <a href="<?php echo base_url('manajer/makanan') ?>">
              <i class="fa fa-cutlery" aria-hidden="true"></i>
              <span>Makanan & Minuman</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>

          <li class="<?php if($this->uri->segment(2)=="transaksi"){echo "active";}?>">
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
           <li class="<?php if($this->uri->segment(1)=="home"){echo "active";}?>">
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