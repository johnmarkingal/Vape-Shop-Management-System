<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vape Shop Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Added Chart.js for graph -->
    <style>
        body {
            background-color: #1a1a1a;
            font-family: 'Arial', sans-serif;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #2d2d2d;
            padding: 20px;
            position: fixed;
            left: 0;
            top: 0;
        }
        .sidebar a {
            display: block;
            padding: 15px;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background: #ff00ff;
            border-radius: 5px;
        }
        .content {
            margin-left: 270px; /* Increased margin to avoid overlap with sidebar */
            padding: 20px;
            margin-top: 40px; /* Added margin to ensure content starts below the top of the page */
        }
        canvas {
            max-width: 100%;
        }
        .product-card {
            background-color: #333;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
        }
        .product-card img {
            width: 80%;  /* Smaller size for the image */
            margin-bottom: 10px;
            border-radius: 6px;
        }
        .product-card h4 {
            color: white;
            font-size: 14px;
        }
        .product-card p {
            color: #8e8e8e;
            font-size: 12px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2 class="text-white text-2xl mb-4">VAPE SHOP</h2>
        <a href="#" onclick="showSection('sales')"><i class="fas fa-chart-line"></i> Sales</a>
        <a href="#" onclick="showSection('inventory')"><i class="fas fa-box"></i> Inventory</a>
        <a href="#" onclick="showSection('management')"><i class="fas fa-users"></i> Management</a>
        <a href="#" onclick="showSection('reports')"><i class="fas fa-file-alt"></i> Reports</a>
        <a href="#" onclick="showSection('economics')"><i class="fas fa-money-bill"></i> Economics</a>
        <a href="logout.php" class="text-red-500"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

   <div id="sales" class="section">
    <h2 class="text-3xl text-white mb-6">Sales Dashboard</h2>
    <p class="text-light-blue mb-4">Latest sales performance and trends.</p>

    <div class="sales-overview mb-6">
        <h3 class="text-xl text-white mb-3">Sales Overview</h3>
        <p class="text-light-blue mb-4">Here is the overview of today's sales performance:</p>
        <ul class="text-light-blue list-disc ml-6">
            <li>Today's Total Sales: <span class="font-semibold">$1,200</span></li>
            <li>Top-selling product: <span class="font-semibold">"Vape Model A"</span></li>
            <li>Units sold today: <span class="font-semibold">250</span></li>
        </ul>
    </div>

    <div class="sales-trend mb-6">
        <h3 class="text-xl text-white mb-3">Sales Trend</h3>
        <p class="text-light-blue mb-4">Check the sales trend of the last 7 days:</p>
        <!-- Added Canvas for the chart -->
        <canvas id="salesChart" class="w-full mt-4"></canvas>
    </div>

    <div class="trending-products mb-6">
        <h3 class="text-xl text-white mb-3">Trending Vape Products</h3>
        <div class="product-grid grid grid-cols-3 gap-6">
            <!-- Product cards with better spacing and more organized layout -->
            <div class="product-card bg-gray-800 p-4 rounded-lg text-center">
                <img src="https://placehold.co/150x150" alt="Vape Model A" class="mb-4 rounded-md"/>
                <h4 class="text-white text-lg">Vape Model A</h4>
                <p class="text-light-blue text-sm">$45.00</p>
            </div>
            <div class="product-card bg-gray-800 p-4 rounded-lg text-center">
                <img src="https://placehold.co/150x150" alt="Vape Model B" class="mb-4 rounded-md"/>
                <h4 class="text-white text-lg">Vape Model B</h4>
                <p class="text-light-blue text-sm">$55.00</p>
            </div>
            <div class="product-card bg-gray-800 p-4 rounded-lg text-center">
                <img src="https://placehold.co/150x150" alt="Vape Model C" class="mb-4 rounded-md"/>
                <h4 class="text-white text-lg">Vape Model C</h4>
                <p class="text-light-blue text-sm">$60.00</p>
            </div>
            <div class="product-card bg-gray-800 p-4 rounded-lg text-center">
                <img src="https://placehold.co/150x150" alt="Vape Model D" class="mb-4 rounded-md"/>
                <h4 class="text-white text-lg">Vape Model D</h4>
                <p class="text-light-blue text-sm">$50.00</p>
            </div>
            <div class="product-card bg-gray-800 p-4 rounded-lg text-center">
                <img src="https://placehold.co/150x150" alt="Vape Model E" class="mb-4 rounded-md"/>
                <h4 class="text-white text-lg">Vape Model E</h4>
                <p class="text-light-blue text-sm">$65.00</p>
            </div>
            <div class="product-card bg-gray-800 p-4 rounded-lg text-center">
                <img src="https://placehold.co/150x150" alt="Vape Model F" class="mb-4 rounded-md"/>
                <h4 class="text-white text-lg">Vape Model F</h4>
                <p class="text-light-blue text-sm">$70.00</p>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <img src="https://placehold.co/300x200" class="w-full mt-4 rounded-lg" alt="Product Image"/>
    </div>
</div>

<!-- Chart.js Script for Sales Trend -->
<script>
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
            datasets: [{
                label: 'Sales Trend',
                data: [1200, 1100, 1500, 1300, 1600, 1700, 1400],
                borderColor: '#ff00ff',
                backgroundColor: 'rgba(255, 0, 255, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return '$' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
</script>

    <div id="inventory" class="section" style="display:none;">
        <h2 class="text-3xl text-light-purple">Inventory</h2>
        <p class="text-light-blue">Track your available products.</p>
        <img src="https://placehold.co/300x200" class="w-full mt-2" />
    </div>

    <div id="management" class="section" style="display:none;">
        <h2 class="text-3xl text-light-purple">Management</h2>
        <p class="text-light-blue">Manage employees and tasks.</p>
        <img src="https://placehold.co/300x200" class="w-full mt-2" />
    </div>

    <div id="reports" class="section" style="display:none;">
        <h2 class="text-3xl text-light-purple">Reports</h2>
        <p class="text-light-blue">Generate financial and sales reports.</p>
        <img src="https://placehold.co/300x200" class="w-full mt-2" />
    </div>

    <div id="economics" class="section" style="display:none;">
        <h2 class="text-3xl text-light-purple">Economics</h2>
        <p class="text-light-blue">Understand business economics.</p>
        <img src="https://placehold.co/300x200" class="w-full mt-2" />
    </div>

    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
</body>
</html>

<?php } ?>
