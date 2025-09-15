@props(['img', 'title', 'desc'])

<div class="bg-white rounded-xl shadow-lg hover:shadow-2xl border hover:bg-blue-700 hover:text-white border-gray-200 transition p-8 text-center">
    <img src="{{ asset('img/' . $img) }}" alt="{{ $title }}" class="w-20 h-20 mx-auto mb-6">
    <h3 class="text-xl font-semibold mb-3">{{ $title }}</h3>
    <p class="text-sm">{{ $desc }}</p>
</div>
