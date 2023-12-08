<x-app-layout>
  <section class="container mx-auto my-5 dark:text-gray-200">

    <h1 class="text-4xl font-bold">Add Class to {{ $course['name'] }} <small> [{{$course['code']}}]</small></h1>
      <section class="my-10 ">
        <form action="{{route('admin.course.store-class',$course['id'])}}" method="POST" >
          @csrf
          @method('POST')
          <div class="grid grid-cols-12 gap-5 mb-5  ">
            @error('class_id')
            <p class="text-red-500 col-span-12">{{$message}}</p>
            @enderror
            @forelse($classes as $index =>$class)
            <div class="flex gap-2">
            

          <input
              class="peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-pink-500 checked:bg-pink-500 checked:before:bg-pink-500 hover:before:opacity-10 focus:ring-opacity-50" name="class_id[]" id="{{$index}}" value="{{$class['id']}}" type="checkbox"
                  {{ (in_array($class['id'], array_column($course['classes'], 'id'))) ? 'checked' : '' }}
              />
              <x-input-label for="{{$index}}">
                {{$class['name']}} 
              </x-input-label>
            </div>
           
            @empty
            <p class="text-center">Don't have any class</p>
            @endforelse
        </div>
          <x-primary-button>
            Submit
          </x-primary-button>
        </form>
      </section>
    
  </section>
</x-app-layout>
