@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.cssperso')


<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->




    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
<div class="col-lg-8">
  <div class="row">
  




      <!-- Total Orders Card -->
      <div class="col-xxl-4 col-md-6">
    <div class="card info-card orders-card">
        <div class="dropdown">
            <!-- Dropdown Trigger -->
            <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots"></i>
            </a>

            <!-- Dropdown Menu -->
            <ul class="dropdown-menu dropdown-menu-end">
                <li class="dropdown-header text-start">
                    <h6>Filtrer</h6>
                </li>
                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'today']) }}">Aujourd'hui</a></li>
                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'this_month']) }}">Ce mois-ci</a></li>
                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'this_year']) }}">Cette année</a></li>
                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'all_time']) }}">Tout le temps</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Nombre Total de Commandes <span>| {{ $filterName }}</span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                    <h6>{{ $totalOrders }}</h6>
                    <span class="text-success small pt-1 fw-bold">{{ $orderIncreasePercentage }}%</span>
                    <span class="text-muted small pt-2 ps-1">d'augmentation</span>
                </div>
            </div>
        </div>
    </div>
      </div>
        <!-- End Total Orders Card -->



  





       <!-- Total Custom Orders Card -->
      <div class="col-xxl-4 col-md-6">
    <div class="card info-card orders-card">
        <div class="dropdown">
            <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li class="dropdown-header text-start">
                    <h6>Filtrer</h6>
                </li>
                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'today']) }}">Aujourd'hui</a></li>
                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'this_month']) }}">Ce mois-ci</a></li>
                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'this_year']) }}">Cette année</a></li>
                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'all_time']) }}">Tout le temps</a></li>
            </ul>
        </div>
        <div class="card-body">
            <h5 class="card-title">Nombre Total de Commandes Personnalisées <span>| {{ $filterName }}</span></h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cup"></i> <!-- Changez l'icône selon vos besoins -->
                </div>
                <div class="ps-3">
                    <h6>{{ $totalCommandes }}</h6>
                    <span class="text-success small pt-1 fw-bold">{{ $commandeIncreasePercentage }}%</span>
                    <span class="text-muted small pt-2 ps-1">d'augmentation</span>
                </div>
            </div>
        </div>
    </div>
      </div>
      <!-- End Total Custom Orders Card -->






      <div class="chart-container">
            <canvas id="orderStateChart"></canvas>
        </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Récupérer les données de l'état des commandes et les étiquettes
            var barChartLabels = @json($barChartLabels);
            var barChartData = @json($barChartData);

            var ctx = document.getElementById('orderStateChart').getContext('2d');
            var orderStateChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: barChartLabels,
                    datasets: [{
                        label: 'Nombre de Commandes par État',
                        data: barChartData,
                        backgroundColor: [
                            '#FF6384',
                            '#36A2EB',
                            '#FFCE56',
                            '#4BC0C0',
                            '#F39C12'
                        ],
                        borderColor: [
                            '#FF6384',
                            '#36A2EB',
                            '#FFCE56',
                            '#4BC0C0',
                            '#F39C12'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>





<!-- Total Groups Card -->
<div class="col-xxl-4 col-md-6">
    <div class="card info-card orders-card">
   

        <div class="card-body">
            <h5 class="card-title">Nombre De Commandes Personnalisées En Attentes</h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-calendar"></i> <!-- Vous pouvez changer l'icône si nécessaire -->
                </div>
                <div class="ps-3">
                    <h6>{{ $groupCount }}</h6>
                    @if($groupCount < 3)
                    "Très bien ! On est dans les temps, pas de panique !"

                        @elseif($groupCount >= 3 && $groupCount <= 5)
                        "Ça commence à s’accumuler. Mettez le turbo !"
                        @else
                        "Situation critique ! Nous devons nous mobiliser immédiatement."
                        @endif                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Total Groups Card -->
<!-- Total Products in Carts Card -->
<div class="col-xxl-4 col-md-6">
    <div class="card info-card orders-card">
  

        <div class="card-body">
            <h5 class="card-title">Produits dans les Paniers <span>|</span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                    <h6>{{ $totalProductsInCarts }}</h6>
                    <span class="text-success small pt-1 fw-bold">{{ number_format($totalPriceInCarts, 2) }} DT</span>
                    <span class="text-muted small pt-2 ps-1">en produits non commandés</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Total Products in Carts Card -->

<style>#pr{margin-top:20px}</style>





 <!-- Revenue Card -->
 <div id="rev" class="col-xxl-4 col-md-6">
    <div class="card info-card revenue-card">

    <div class="dropdown">
            <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li class="dropdown-header text-start">
                    <h6>Filtrer</h6>
                </li>
                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'today']) }}">Aujourd'hui</a></li>
                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'this_month']) }}">Ce mois-ci</a></li>
                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'this_year']) }}">Cette année</a></li>
                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'all_time']) }}">Tout le temps</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Revenus Totals <span>| {{ $filterName }}</span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                </div>


             <div class="ps-3">
                    <h6>{{ $totalRevenue }}</h6>

                    
                </div>
                
            </div>
            
      <div class="card-body">

            <!-- Pie Chart -->
            <div id="pieChart" style="min-height: 400px;" class="echart"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const pieChartData = @json($pieChartData);

                    echarts.init(document.querySelector("#pieChart")).setOption({
                        title: {
                            text: '',
                            subtext: '',
                            left: 'center'
                        },
                        tooltip: {
                            trigger: 'item'
                        },
                        legend: {
                            orient: 'vertical',
                            left: 'left'
                        },
                        series: [{
                            name: 'Revenus',
                            type: 'pie',
                            radius: '50%',
                            data: pieChartData,
                            itemStyle: {
                                normal: {
                                    color: function(params) {
                                        // Define colors for each segment
                                        const colors = ['#cfe2ff', '#f5d7dc']; // Add more colors if needed
                                        return colors[params.dataIndex % colors.length];
                                    }
                                }
                            },
                            emphasis: {
                                itemStyle: {
                                    shadowBlur: 10,
                                    shadowOffsetX: 0,
                                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                                }
                            }
                        }]
                    });
                });
            </script>
            <!-- End Pie Chart -->

        </div>
        </div>
        





        <div class="card-body">

            <!-- Revenue Chart -->

            <!-- Clients Chart -->
            <div id="clientsChart" class="mt-4"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    // Revenue Chart
                    new ApexCharts(document.querySelector("#revenueChart"), {
                        series: [{
                            name: 'Commandes',
                            data: [{{ $totalRevenueCommandes }}]
                        }, {
                            name: 'Commandes Personnalisées',
                            data: [{{ $totalRevenueOrders }}]
                        }],
                        chart: {
                            height: 250,
                            type: 'bar',
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#4154f1', '#2eca6a'],
                        xaxis: {
                            categories: ['Revenue'],
                        },
                        yaxis: {
                            title: {
                                text: 'Montant'
                            }
                        },
                        dataLabels: {
                            enabled: false
                        }
                    }).render();

                    // Clients Chart
                  
                });
            </script>
            <!-- End Charts -->

        </div>







    </div>
      </div><!-- End Revenue Card -->


<style>#cst{margin-top:20px;
height:510px;}</style>
      
<!-- Customers Card -->
<div class="col-xxl-4 col-xl-6" id="cst">
  <div class="card info-card customers-card">

    <div class="dropdown">
      <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li class="dropdown-header text-start">
          <h6>Filtrer</h6>
        </li>
        <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'today']) }}">Aujourd'hui</a></li>
        <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'this_month']) }}">Ce mois-ci</a></li>
        <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'this_year']) }}">Cette année</a></li>
        <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'all_time']) }}">Tout le temps</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Clients <span>| {{ $filterName }}</span></h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-people"></i>
        </div>
        <div class="ps-3">
          <h6>{{ $femaleClients + $maleClients + $otherClients }}</h6>
          <!-- Ici vous pouvez ajouter la logique pour les pourcentages d'augmentation/diminution -->
          @if($filterName == 'all_time')
            <!-- Si vous avez les données pour la période précédente -->
            <span class="text-danger small pt-1 fw-bold">{{ $orderIncreasePercentage }}%</span>
            <span class="text-muted small pt-2 ps-1">d'augmentation</span>
          @else
            <span class="text-danger small pt-1 fw-bold">{{ $orderIncreasePercentage }}%</span>
            <span class="text-muted small pt-2 ps-1">changement</span>
          @endif
        </div>
      </div>

    </div>
    <div class="card-body">

            <!-- Pie Chart -->
            <div id="pieChartclients" style="min-height: 400px;" class="echart"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const pieChartDataclients = @json($pieChartDataclients);

                    echarts.init(document.querySelector("#pieChartclients")).setOption({
                        title: {
                            text: '',
                            subtext: '',
                            left: 'center'
                        },
                        tooltip: {
                            trigger: 'item'
                        },
                        legend: {
                            orient: 'vertical',
                            left: 'left'
                        },
                        series: [{
                            name: 'Revenus',
                            type: 'pie',
                            radius: '50%',
                            data: pieChartDataclients,
                            itemStyle: {
                                normal: {
                                    color: function(params) {
                                        // Define colors for each segment
                                        const colors = ['#f5d7dc','#cfe2ff', '#c0fdbb']; // Add more colors if needed
                                        return colors[params.dataIndex % colors.length];
                                    }
                                }
                            },
                            emphasis: {
                                itemStyle: {
                                    shadowBlur: 10,
                                    shadowOffsetX: 0,
                                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                                }
                            }
                        }]
                    });
                });
            </script>
            <!-- End Pie Chart -->

        </div>
  </div>
</div><!-- End Customers Card -->



<style>#rev {
 margin-top:20px;
    height: 510px;
}</style>









<!-- Reports -->
<div class="col-6">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Produits les plus vendus ({{ $filterName }})</h5>

                <div class="dropdown">
                    <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class="dropdown-header text-start">
                            <h6>Filtrer</h6>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'today']) }}">Aujourd'hui</a></li>
                        <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'this_month']) }}">Ce mois-ci</a></li>
                        <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'this_year']) }}">Cette année</a></li>
                        <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'all_time']) }}">Tout le temps</a></li>
                    </ul>
                </div>
            </div>

            <ul class="list-group">
                @foreach($topProducts as $product)
                    @php
                        // Supposons que vous avez un modèle Produit pour récupérer les détails du produit
                        $produit = \App\Models\Produit::find($product->produit_id);
                    @endphp
                    @if($produit)
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('img/' . $produit->image) }}" alt="{{ $produit->nom }}" class="img-thumbnail" style="width: 100px; height: 100px;">
                                <div class="ms-3">
                                    <h5 class="mb-1">{{ $produit->name }}</h5>
                                    <p class="mb-1"><strong>Q.vendue : </strong>{{ $product->total_quantity }}</p>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div><!-- End Reports -->




<!-- Reports -->
<div class="col-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Produits les plus populaires de tout le temps</h5>
            <ul class="list-group">
                @foreach($topLikedProducts as $produit)
                    <li class="list-group-item">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('img/' . $produit->image) }}" alt="{{ $produit->nom }}" class="img-thumbnail" style="width: 100px; height: 100px;">
                            <div class="ms-3">
                                <h5 class="mb-1">{{ $produit->name }}</h5>
                                <p class="mb-1"><strong>Likes :</strong> {{ $produit->getLikesCountAttribute() }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div><!-- End Reports -->


<!-- Popular Customizations by Type Section -->
<div class="col-xxl-4 col-md-12" id="pr">
    <div class="card info-card customizations-card">
        <div class="card-body">
            <h5 class="card-title">Personnalisations Tendances</h5>
            <ul class="list-group">
                @foreach ($mostUsedPerType as $type => $data)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $data['nom'] }} ({{ $data['type'] }})
                        <span class="badge bg-success rounded-pill">{{ $data['count'] }} fois</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- End Popular Customizations by Type Section -->






            <!-- Recent Sales -->
          <!-- End Recent Sales -->

            <!-- Top Selling -->
           <!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
    <!-- Reports -->
    <div class="col-12">
    <div class="card" >
        
        <div class="card-body">
            <h5 class="card-title">Reports </h5>

            <!-- Line Chart -->
            <div id="reportsChart"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                        series: @json($lineChartData),
                        chart: {
                            height: 350,
                            type: 'line',
                            toolbar: {
                                show: false
                            },
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a'],
                        fill: {
                            type: "gradient",
                            gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0.3,
                                opacityTo: 0.4,
                                stops: [0, 90, 100]
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        xaxis: {
                            categories: [
                                'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                            ],
                        },
                        tooltip: {
                            x: {
                                format: 'dd/MM/yy'
                            },
                        }
                    }).render();
                });
            </script>
            <!-- End Line Chart -->

        </div>
    </div>
</div><!-- End Reports -->

      
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Adresse les Plus Frequentes</h5>

            <!-- Bar Chart -->
            <div id="barChart"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#barChart"), {
                        series: [{
                            data: @json($barChartDataadresse['data'])
                        }],
                        chart: {
                            type: 'bar',
                            height: 350
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: false,
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        xaxis: {
                            categories: @json($barChartDataadresse['categories']),
                        }
                    }).render();
                });
            </script>
            <!-- End Bar Chart -->

        </div>
    </div>
</div>


<!-- Recent Activity -->
<div class="card" id="commandesrecentes">


  <div class="card-body">
    <h5 class="card-title">Messages Récemment Recues</h5>


    <div class="activity">
      @foreach($recentMessages as $message)
        <div class="activity-item d-flex message-item"
             data-name="{{ $message->name }}"
             data-subject="{{ $message->subject }}"
             data-message="{{ $message->message }}"
             data-email="{{ $message->email }}"
             data-bs-toggle="tooltip" data-bs-placement="top"
             title="{{ $message->message }}">
          <div class="activite-label">{{ $message->created_at->diffForHumans() }}</div>
          <i class='bi bi-circle-fill activity-badge {{ $message->is_read ? 'text-muted' : 'text-warning' }} align-self-start'></i>
          <div class="activity-content">
            <strong>{{ $message->name }}</strong> a envoyé un message concernant <a href="#" class="fw-bold text-dark">{{ $message->subject }}</a>
          </div>
        </div><!-- End activity item-->
      @endforeach
    </div>
  </div>
  <a href="{{ route('contact.index') }}" class="btn btn-primary">Voir Tous les Messages</a>

</div><!-- End Recent Activity -->

<!-- Message Modal -->
<div class="modal fade" id="messageModall" tabindex="-1" aria-labelledby="messageModallLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="messageModallLabel">Message Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="messageContent"></p>
      </div>
      <div class="modal-footer">
        <a id="sendEmailButton" href="#" class="btn btn-primary" target="_blank">Send Email</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Initialiser les tooltips de Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Gérer le clic sur un message
    var messageItems = document.querySelectorAll('.message-item');
    messageItems.forEach(function(item) {
      item.addEventListener('click', function() {
        var name = item.getAttribute('data-name');
        var subject = item.getAttribute('data-subject');
        var message = item.getAttribute('data-message');
        var email = item.getAttribute('data-email');

        document.getElementById('messageModallLabel').innerText = 'Message from ' + name;
        document.getElementById('messageContent').innerText = message;
        document.getElementById('sendEmailButton').href = 'mailto:' + email + '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(message);

        // Afficher la modale
        var messageModall = new bootstrap.Modal(document.getElementById('messageModal'));
        messageModall.show();
      });
    });
  });
</script>
<style>.text-warning {
    --bs-text-opacity: 1;
    color: rgb(53 252 54) !important;
}</style>

 <!-- Recent Purchases -->
<div class="card" id="recentPurchases">
 

  <div class="card-body">
    <h5 class="card-title">Produits Récemment vendues</h5>

    <div class="activity">

      @foreach($lignesCommande as $ligne)
        <div class="activity-item d-flex">
          <div class="activite-label">{{ $ligne->created_at->diffForHumans() }}</div>
          <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
          <div class="activity-content">
            <strong>{{ $ligne->produit->name }}</strong> acheté par le client  <a href="#" class="fw-bold text-dark">{{ $ligne->commande->client->nom }}{{ $ligne->commande->client->preNom }}</a> - Quantité: {{ $ligne->qtecmnd }}
          </div>
        </div><!-- End activity item-->
      @endforeach

    </div>
    
  </div>
  <a href="{{ route('commandes.index') }}" class="btn btn-primary">Voir Tous les commandes</a>

</div><!-- End Recent Purchases -->
<style>.btn-primary {
    background-color: #ffffff;
    border-color: #ffffff;
    color: #ff8ad5;
}
#cmnt{height:700px;}
</style>
<!-- News & Updates Traffic -->
<div class="card" id="cmnt">
    <div class="card-body pb-0">
        <h5 class="card-title">Commentaires et Likes Récents <span>| Aujourd'hui</span></h5>

        <div class="news">
            @foreach($comments as $comment)
                <div class="post-item clearfix">
                    <!-- Affichage de l'image du commentaire s'il en existe une -->
                    @if($comment->image)
                        <img src="{{ asset('img/' . $comment->image) }}" alt="Comment Image" class="img-thumbnail" style="width: 100px; height: 100px;">
                    @else
                        <img src="{{ asset('img/' . $comment->produit->image) }}" alt="Product Image" class="img-thumbnail" style="width: 100px; height: 100px;">
                    @endif
                    <div class="content">
                        <h4>{{ $comment->produit->name }}</h4>
             
                        <!-- Affichage de l'état du commentaire -->
                        @if($comment->like && !$comment->commentaire)
                            <p><strong>Status:</strong> Le client {{$comment->client->nom}} a aimé le produit {{$comment->produit->name}} le {{$comment->created_at}}</p>
                        @elseif(!$comment->like && $comment->commentaire)
                            <p><strong>Status:</strong> Le client {{$comment->client->nom}} a commenté le produit {{$comment->produit->name}} le {{$comment->created_at}}</p>
                        @elseif($comment->like && $comment->commentaire)
                            <p><strong>Status:</strong> Le client {{$comment->client->nom}} a aimé et commenté le produit {{$comment->produit->name}} le {{$comment->created_at}}</p>
                        @else
                            <p><strong>Status:</strong> Aucun like ni commentaire</p>
                        @endif

                        <!-- Contenu du commentaire caché -->
                    
                    </div>
                </div>
            @endforeach
        </div><!-- End sidebar recent posts-->
    </div>
    <a href="{{ route('product_like_comments.index') }}" class="btn btn-primary">Voir Tous les interactions</a>

</div><!-- End News & Updates -->

          <!-- Website Traffic -->
      <!-- End Website Traffic -->

          <!-- News & Updates Traffic -->
        <!-- End News & Updates -->

        </div><!-- End Right side columns -->


<style>#commandesrecentes {height: 655px;}
#recentPurchases{height: 655px;}
.dashboard .activity .activity-item .activite-label {
    width: 70px;
}

</style>


      </div>
    </section>

@include('dashboard.layout.script')

@include('dashboard.layout.footer')
</html><!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
