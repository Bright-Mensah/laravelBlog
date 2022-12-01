<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            
            @if (request()->routeIs('trashed.index'))

             @else   
             @if (session('postSuccess'))
               
             @else
             @if (session('updateSuccess'))

             @else
             <a href="{{route('Admin.create')}}" class="bg-stone-800 text-white rounded p-3">+ New Post</a>
                 
             @endif
             @endif
           
            @endif
            
            @if (session('postSuccess'))
                
            <p class="bg-lime-600 text-center font-bold p-4 text-white">
                {{session('postSuccess')}}
            </p>
            @endif
            @if (session('updateSuccess'))
                
            <p class="bg-lime-600 text-center font-bold p-4 text-white">
                {{session('updateSuccess')}}
            </p>
            @endif
            
            
           
                
          
            @forelse ($postData as $data)
            <div class="bg-white # p-3 mt-5">
                    {{-- title --}}
                    <h1 class="font-bold text-2xl">
                       @if(request()->routeIs('trashed.index'))
                       <a href="{{route('trashed.show',$data->uuid)}}"> {{$data->title}} </a>
                       @else
                        <a href="{{route('Admin.show',$data->uuid)}}"> {{$data->title}} </a>
                        @endif
                        </h1>

           
                
                        {{-- content --}}
                        <p class="text-lg">{{ Str::limit(strip_tags($data->content), 200, '.....' )  }}</p>
                        
                        {{-- updated_at --}}
                        {{-- if the request or route is trashed then hide the deleted at --}}
                        @if (request()->routeIs('trashed.index'))
                   
               <p class="opacity-70">deleted at : {{$data->deleted_at->diffForHumans()}}</p>
               @else
               <p class="opacity-70">created at : {{$data->updated_at->diffForHumans()}}</p>
               @endif
                </div>
                @empty
                @if (request()->routeIs('trashed.index'))
                    
                <p class="text-3xl opacity-60">No post has been trashed at the moment !!!</p>
                @else
                <p class="text-3xl opacity-60">No post available at the moment!!!</p>

                @endif
                @endforelse
                
                
                
                <div class="mt-5">
                    {{$postData->links()}}
                </div>
               
                
              
               
                
        </div>

    </div>
</x-app-layout>
