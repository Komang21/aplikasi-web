@extends('layouts.admin')

@section('content')
    <div class="col-md-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5><i class="fas fa-server"></i> Sistem</h5>

                <p>Laravel Version: {{ app()->version() }}</p>
                <p>PHP Version: {{ phpversion() }}</p>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <canvas id="userChart"></canvas>
        <h2 class="mb-4">Dashboard Admin</h2>

        <div class="row">

            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h5><i class="fas fa-users"></i> Total User</h5>
                        <h2>{{ $totalUser }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h5><i class="fas fa-user-shield"></i> Total Role</h5>
                        <h2>{{ $totalRole }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h5><i class="fas fa-key"></i> Total Permission</h5>
                        <h2>{{ $totalPermission }}</h2>
                    </div>
                </div>
            </div>

        </div>

        <br>

        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Statistik User
                    </div>

                    <div class="card-body">
                        <canvas id="userChart"></canvas>
                    </div>

                </div>
            </div>

            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        Recent Users
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($recentUsers as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="3" class="text-center">
                                            Belum ada user
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>
        const ctx = document.getElementById('userChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['User', 'Role', 'Permission'],
                datasets: [{
                    label: 'Statistik Sistem',
                    data: [
                        {{ $totalUser }},
                        {{ $totalRole }},
                        {{ $totalPermission }}
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
