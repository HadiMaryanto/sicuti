<div class="col-12 col-md-7 col-lg-8" >
	<div class="card" style="width:1000px;height:400px;">
		<div class="card-body" >
			<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active" style="height:350px;">
						<img class="d-block w-100" src="assets/img/blog/img05.png" alt="First slide">
						<div class="carousel-caption d-none d-md-block">
							<h5>Heading</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
					<div class="carousel-item" style="height:350px;">
						<img class="d-block w-100" src="assets/img/ana.jpg" alt="Second slide">
						<div class="carousel-caption d-none d-md-block">
							<h5>Heading</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
					<div class="carousel-item" style="height:350px;">
						<img class="d-block w-100" src="assets/img/blog/img08.png" alt="Third slide">
						<div class="carousel-caption d-none d-md-block">
							<h5>Heading</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button"
					data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators2" role="button"
					data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="row">
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Total Pengajuan Cuti</h4>
                  </div>
                  <div class="card-body">
                    <p style="text-align:center;"><strong style="font-size:23px;"><?php echo $cutisel; ?></strong> </p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-danger">
                  <div class="card-header">
                    <h4>Total Pengajuan Izin</h4>
                  </div>
                  <div class="card-body">
                    <p style="text-align:center;"><strong style="font-size:20px;"><?php echo $izinsel; ?></strong> </p>
                  </div>
                </div>
              </div>
							<div class="col-12 col-md-6 col-lg-3">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h4>Cuti Yang Belum Disetujui</h4>
                  </div>
                  <div class="card-body">
                    <p style="text-align:center;"><strong style="font-size:20px;"><?php echo $cutikonfir; ?></strong> </p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-warning">
                  <div class="card-header">
                    <h4>Izin Yang Belum Disetujui</h4>
                  </div>
                  <div class="card-body">
                    <p style="text-align:center;"><strong style="font-size:20px;"><?php echo $izinkonfir; ?></strong> </p>
                  </div>
                </div>
              </div>
            </div>
