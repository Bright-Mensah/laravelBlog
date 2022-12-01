<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('Admin.create')}}" class="bg-stone-800 text-white rounded p-3">+ New Post</a>
            
            <div class="bg-white overflow-hidden p-3 mt-10">
                @if (session('postSuccess'))
                    
                <p class="bg-lime-600 text-center font-bold p-4 text-white">
                    {{session('postSuccess')}}
                </p>
                @endif
                {{-- <div class=" p-4">
                    @forelse ($postData as $data)
                        
                    <h1 class=" font-bold">{{$data->title}}</h1>
                    <p class="opacity-50">{{$data->description?'available':'note available'}}</p>
                    <p class="opacity-70">{{$data->content}}</p>
                    @empty
                        
                    @endforelse
                </div> --}}
            </div>
        </div>

    </div>
</x-app-layout>
