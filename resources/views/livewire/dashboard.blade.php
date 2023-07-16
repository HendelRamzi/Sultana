          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
                          <!-- Small boxes (Stat box) -->
              <div class="row">
        
        
        
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>{{$products}}</h3>
        
                      <p>produits</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('admin.products.list')}}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
        
        
        
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>{{$commentaire}}</h3>
        
                      <p>Commentaire en attente</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('admin.products.list')}}" class="small-box-footer">Aller les voirs<i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
        
        
        
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{$clients}}</h3>
        
                      <p>Clients</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('admin.clients.list')}}" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
        
        
        
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>{{$commandes}}</h3>
        
                      <p>Nouvelle commandes</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('admin.orders.list')}}" class="small-box-footer">Voir les commandes <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
        
        
              </div>
              <!-- /.row -->
            </div>
          </section>
        
