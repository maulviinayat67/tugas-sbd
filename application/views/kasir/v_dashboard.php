<section class="content-header">
 <h1>
  Dashboard
</h1>
<ol class="breadcrumb">
    <li>
        <a href="<?php echo base_url('Home') ?>">
            <i class="fa fa-dashboard"></i>
            <?php echo $judul ?></a>
    </li>
    <li class="active"><?php echo $sub_judul ?></li>
</ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
              <div class="inner">
                  <h3><?php echo $jml_pemesanan ?></h3>

                  <p>Pemesanan</p>
              </div>
              <div class="icon">
                  <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url().'manajer/transaksi'?>" class="small-box-footer">More info
                  <i class="fa fa-arrow-circle-right"></i>
              </a>
          </div>
      </div>

    </div>
  </div>
</section>
</div>
