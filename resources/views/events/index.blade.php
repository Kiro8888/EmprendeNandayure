<x-app-layout>  

    <div class="container">
     <div class="grid grid-cols-3 gap-x-6 gap-y-3">

        @foreach ($events as $event)
        <article class="w-full h-80 bg-cover bg-center" style="background-image:url({{Storage::url($events->evt_img->url)}})">


        </article>
        @endforeach

     </div>
    </div>

</x-app-layout>