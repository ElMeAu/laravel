<x-app-layout>
<x-slot name="header">
</x-slot> 
  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <form action="/update_post/{{$data->id}}" class="activities" method="post">
                {{ csrf_field() }}
                <label for='title'>Title</label>
                <input type="text" id="title" name='title' value={{ $data->title }}>
                <label for="post">Post</label>
                <input type="text" id="post" name='post'value={{ $data->post }}>
  
                <div class="button_div">
                  <button class="button" type="submit" value="Submit">Aiziet!</button>
                </div>
              </form> 
            </div>
        </div>
  </div>
</x-app-layout>
