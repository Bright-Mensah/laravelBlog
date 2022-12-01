<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

    <!-- component -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{url()->previous()}}" class="bg-neutral-900 text-white rounded p-3 mb-3">Go back</a>
                <form method="POST" action="{{route('Admin.store')}}" class="mt-5">
                    @csrf
                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="{{old('title')}}"/>
                        {{-- show error when the title is empty --}}
                        @error('title')
                        <div class="bg-red-600 text-white p-2">
                            {{$message}}
                        </div>
                            
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Description</label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="description" id="description" placeholder="(Optional)"
                        value="{{old('description')}}">
                                              {{-- show error when the description is more than 120 characters --}}
                                              @error('description')
                                              <div class="bg-red-600 text-white p-2">
                                                  {{$message}}
                                              </div>
                                                  
                                              @enderror
                    </div>

                    <div class="mb-8">
                       
                        <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                        <textarea name="content" class="border-2 border-gray-500">
                          {{old('content')}}
                            
                        </textarea>
                                              {{-- show error when the content is emmpty --}}
                                              @error('content')
                                              <div class="bg-red-600 text-white p-2">
                                                  {{$message}}
                                              </div>
                                                  
                                              @enderror
                    </div>

                    <div class="flex p-1">
                        
                        <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400 rounded" >Add Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'content' );
</script>
    
</body>
</html>