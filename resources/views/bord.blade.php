@extends('layouts') <!-- Assurez-vous que le layout est correct -->

@section('content')
<div class="card shadow-sm">

    <!-- Titre de la page -->
   

    <!-- Graphique -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Statistiques</h2>
        <div class="w-full h-96"> <!-- Taille du graphique augmentée -->
            <canvas id="myChart" class="w-full h-full"></canvas>
        </div>
    </div>

</div>
<!-- Inclure Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Données pour le graphique
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar', // Type de graphique (bar, line, pie, doughnut, etc.)
        data: {
            labels: ['Statistiques'], // Étiquette principale
            datasets: [
                {
                    label: 'Machines Virtuelles', // Label pour Machines Virtuelles
                    data: [{{ $totalVm }}], // Données dynamiques pour Machines Virtuelles
                    backgroundColor: 'rgba(70, 181, 241, 0.8)', // Couleur pour Machines Virtuelles
                    borderColor: 'rgba(70, 181, 241, 1)', // Bordure pour Machines Virtuelles
                    borderWidth: 1
                },
                {
                    label: 'Utilisateurs', // Label pour Utilisateurs
                    data: [{{ $totalUser }}], // Données dynamiques pour Utilisateurs
                    backgroundColor: 'rgba(255, 206, 86, 0.8)', // Couleur pour Utilisateurs
                    borderColor: 'rgba(255, 206, 86, 1)', // Bordure pour Utilisateurs
                    borderWidth: 1
                },
                {
    label: 'VM Actives', // VMs Actives
    data: [{{ $totalVmActive }}],
    backgroundColor: 'rgba(54, 162, 235, 0.8)', // Bleu
    borderColor: 'rgba(54, 162, 235, 1)',      // Bleu foncé
    borderWidth: 1
},
{
    label: 'VM Inactives', // VMs Inactives
    data: [{{ $totalVmInactive }}],
    backgroundColor: 'rgba(255, 99, 132, 0.8)', // Rouge
    borderColor: 'rgba(255, 99, 132, 1)',      // Rouge foncé
    borderWidth: 1
}

            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1000, // Durée de l'animation
                easing: 'easeInOutQuad' // Type d'animation
            },
            scales: {
                y: {
                    beginAtZero: true, // Commencer l'axe Y à 0
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)' // Couleur de la grille
                    }
                },
                x: {
                    grid: {
                        display: false // Masquer la grille sur l'axe X
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top', // Position de la légende
                    labels: {
                        font: {
                            size: 14 // Taille de la police de la légende
                        }
                    }
                },
                tooltip: {
                    enabled: true, // Activer les tooltips
                    backgroundColor: 'rgba(0, 0, 0, 0.8)', // Couleur de fond des tooltips
                    titleFont: {
                        size: 16 // Taille de la police du titre des tooltips
                    },
                    bodyFont: {
                        size: 14 // Taille de la police du corps des tooltips
                    }
                }
            }
        }
    });
</script>
@endsection