@extends('layouts.app')

@section('content')
<div class="container py-8 mx-auto">
    <div class="flex items-center mb-8">
        <img src="{{ asset('images/logistics.svg') }}" alt="Logistik" class="w-20 h-20 mr-4">
        <div>
            <h1 class="text-3xl font-bold">Selamat Datang, {{ Auth::user()->name }}!</h1>
            <p class="text-gray-600">Manajemen Supir & Kendaraan Logistik</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
        <div class="flex items-center p-6 bg-white rounded-lg shadow">
            <div class="p-3 mr-4 bg-orange-100 rounded-full">
                <i class="text-2xl text-orange-500 fas fa-users"></i>
            </div>
            <div>
                <div class="text-2xl font-bold">{{ $totalSupir }}</div>
                <div class="text-gray-500">Total Supir</div>
            </div>
        </div>
        <div class="flex items-center p-6 bg-white rounded-lg shadow">
            <div class="p-3 mr-4 bg-blue-100 rounded-full">
                <i class="text-2xl text-blue-500 fas fa-car"></i>
            </div>
            <div>
                <div class="text-2xl font-bold">{{ $totalKendaraan }}</div>
                <div class="text-gray-500">Total Kendaraan</div>
            </div>
        </div>
        <div class="flex items-center p-6 bg-white rounded-lg shadow">
            <div class="p-3 mr-4 bg-green-100 rounded-full">
                <i class="text-2xl text-green-500 fas fa-route"></i>
            </div>
            <div>
                <div class="text-2xl font-bold">{{ $totalPerjalanan }}</div>
                <div class="text-gray-500">Total Perjalanan</div>
            </div>
        </div>
    </div>

    {{-- Contoh Chart --}}
    <div class="p-6 bg-white rounded-lg shadow">
        <canvas id="statistikChart"></canvas>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('statistikChart').getContext('2d');
    var statistikChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Jumlah Perjalanan',
                data: {!! json_encode($data) !!},
                backgroundColor: 'rgba(59, 130, 246, 0.5)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        }
    });
</script>
@endpush
