<x-app-layout>
  <section class="grid grid-cols-5 gap-10 container mx-auto my-5"> 

    @forEach($courses as $course)
    <x-card href="{{route('course.show',$course['id'])}}">
      <x-slot name="title">
        {{$course['name']}}  <small> #{{$course['code']}}</small>
      </x-slot>
      <x-slot name="desc">
        {{$course['teacher']['name']}}
      </x-slot> 
    </x-card>
    @endForEach
  </section>
</x-app-layout>