<x-app-layout>
<x-slot name="header">
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

              <form action="/save" class="activities" method="post" enctype="multipart/form-data">
              <!--@vite(['resources/css/post.css'])-->
              {{ csrf_field() }}

              <label for='title'>Title</label>
              <input type="text" id="title" name='title'>
              <label for="post">Post</label>
              <input type="text" id="post" name='post'>
              <div class='button_div'>
  
                <input class="button" type="file" accept="image/png, image/jpeg" name='image' >
              
                <button class="button"type="submit" value="Submit">Aiziet!</button>
            </div>
  
              </form> 
        </div>
    </div>
</div>

</x-app-layout>