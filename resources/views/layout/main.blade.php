<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Movie app</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<livewire:styles>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</head>
<body class="font-sans bg-gray-900 text-white">
	<nav class="border-b border-gray-800">
		<div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
			<ul class="flex flex-col md:flex-row   item-center ">
				<li>
					<a href="">LOGO</a>
				</li>
				<li class="md:ml-16 mt-3 md:mt-0">
					<a href="{{ route('movie.index') }}" class="hover:text-gray-300">Movies</a>
				</li>
				<li class="md:ml-6 mt-3 md:mt-0">
					<a href="{{ route('tv.index') }}" class="hover:text-gray-300">Tv Shows</a>
				</li><li class="md:ml-6 mt-3 md:mt-0">
					<a href="{{ route('actor.index') }}" class="hover:text-gray-300">Actors</a>
				</li>
			</ul>
			<div class="flex flex-col md:flex-row items-center">
				<livewire:search-dropdown>
				<div class="md:ml-4 mt-3 md:mt-0">
					<a href=""><img src="{{ asset('img/avatar.jpg') }}" alt="avatar" class="rounded-full w-8 h-8" ></a>
				</div>
			</div>
		</div>
	</nav>
	@yield('content')
	<livewire:scripts>
	@yield('scripts')
</body>
</html>