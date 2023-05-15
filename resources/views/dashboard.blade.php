

<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight top">
            {{ __('Tavi ieraksti') }}
        </h1>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class= 'grid'>
                    @foreach($data as $data)
                    <div class='grid_element'>
                    @if(empty($data->image) )
                    
                    @else 
                    <div class='post_img'>
                        <img src={{str_replace("localhost", "127.0.0.1:8000", $data->getFirstMediaUrl()) }}>
                    </div>
                    @endif
                        <div class='title'>{{ $data->title }}</div>
                        <div class= 'post'>{{ $data->post }}</div>
                        <div class='button_div'>
                            <a href="/update_post/{{ $data->id }}">
                                 <button class='button' type='update' value='update'>Update</button>
                            </a>
                                <a href="/delete/{{ $data->id }}">
                            <button class='button' type='delete' value='delete'>Delete</button>
                            </a>

                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
     
</x-app-layout>
<button type="submit" value="Submit">Aiziet!</button>