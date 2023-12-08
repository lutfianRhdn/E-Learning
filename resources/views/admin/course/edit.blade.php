<x-app-layout>
  <section class="container mx-auto my-5 dark:text-gray-200">

    <h1 class="text-4xl font-bold">Course Management</h1>
      <section class="my-10 ">
        <form action="{{route('admin.course.update',$course['id'])}}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-5"> 
            <x-input-label>
              Course Name
            </x-input-label>
            <x-text-input class="w-full" name="name" value="{{$course['name']}}"   />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

          </div>
          <div class="flex justify-between gap-10">

          <div class="w-full mb-5">
            <x-input-label>
              Assign Teacher
            </x-input-label>
            <x-select-input name="teacher_id">
              @foreach($teachers as $teacher)
              <option value="{{$teacher['id']}}" {{$teacher['id']=== $course['teacher_id']?'selected':''}} >{{$teacher['name']}}</option>
              @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('teacher_id')" class="mt-2" />

          </div>
          </div>

          <div class="flex gap-5 items-center">

            <x-primary-button>
              Submit
            </x-primary-button>
          </div>
        </form>
      </section>
  </section>
</x-app-layout>
