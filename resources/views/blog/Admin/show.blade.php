<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('updateSuccess'))
            
        <p class="bg-lime-600 text-center font-bold p-4 text-white">
            {{session('updateSuccess')}}
        </p>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <div class="flex">
                <div class="opacity-70">
                    
                    @if (request()->routeIs('trashed.show'))
                        
                    created at: {{$postData->created_at->diffForHumans()}}
                    @else
                        
                    created at: {{$data->created_at->diffForHumans()}}
                    @endif
                </div>
                <div class="opacity-70 ml-32">
                    @if (request()->routeIs('trashed.show'))
                    deleted at: {{$postData->deleted_at->diffForHumans()}}
                    @else
                    updated at: {{$data->updated_at->diffForHumans()}}

                    @endif
                </div>

                @if (request()->routeIs('trashed.show'))
                {{-- <a href="{{route('trashed.edit',$postData->uuid)}}" class="text-white bg-blue-500 rounded p-2 ml-auto hover:bg-blue-900">Restore</a> --}}
                <div class="ml-auto">
                <form action="{{route('trashed.update',$postData->uuid)}}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="text-white bg-blue-500 rounded-md p-2  hover:bg-blue-900" onclick="return confirm('Are you sure you want to restore  post ?')">Restore</button>
                </form>
            </div>
                @else
                <a href="{{route('Admin.edit',$data->uuid)}}" class="text-white bg-blue-500 rounded p-2 ml-auto hover:bg-blue-900">Edit</a>
                @endif

                @if(request()->routeIs('trashed.show'))
                <form action="{{route('trashed.destroy',$postData->uuid)}}" method="POST" class="ml-5">
                    @method('delete')
                    @csrf
                    <button type="submit" class="text-white bg-red-600 rounded p-2 ml-auto hover:bg-red-900" onclick="return confirm('Post can\'t be restored after deleting forever ?')">Delete Forever</button>
                    
                </form>

                @else
                <form action="{{route('Admin.destroy',$data->uuid)}}" method="POST" class="ml-5">
                    @method('delete')
                    @csrf
                    <button type="submit" class="text-white bg-red-600 rounded p-2 ml-auto hover:bg-red-900" onclick="return confirm('Are you sure you want to delete this post ?')">Delete</button>
                </form>
                @endif
            </div>
            
           

            <div class="bg-white # p-3 mt-5">
                    {{-- title --}}
                    <h1 class="font-bold text-2xl">
                        @if (request()->routeIs('trashed.show'))
                         {{$postData->title}} 
                         @else
                         {{$data->title}} 
                         @endif
                        </h1>
                
               {{-- content --}}
               @if (request()->routeIs('trashed.show'))

               <p class="whitespace-pre-wrap">{{ strip_tags($postData->content)  }}</p>
               @else
               <p class="whitespace-pre-wrap">{{ strip_tags($data->content)  }}</p>
               @endif
               

               {{-- updated_at --}}
               {{-- <p class="opacity-70">created at : {{$data->updated_at->diffForHumans()}}</p> --}}
                </div>
             
               
                
              
               
                
        </div>

    </div>
</x-app-layout>
