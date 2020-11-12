<div class="mt-8">
	<a href="{{ route('tv.show',$tv['id']) }}">
		<img src="{{$tv['poster_path']}}" alt="" class="hover:opacity-75 transition ease-in-out duration-500">
	</a>
	<div class="mt-2">
		<a href="{{ route('tv.show',$tv['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{$tv['name']}}</a>
		<div class="flex items-center text-gray-400 text-sm mt-1">
			<i class="fas fa-star text-orange-500"></i>
			<span class="ml-1">{{$tv['vote_average']}}</span>
			<span class="mx-2">|</span>
			<span>{{$tv['first_air_date']}}</span>
		</div>
		<div class="text-gray-400 text-sm">{{$tv['genres']}}</div>
	</div>
</div>