<x-app-layout>
  <section class="container mx-auto my-5 ">
    <div class="p-12 bg-gray-800  rounde-lg">
      <div class="bg-cover bg-center h-80 rounded-lg shadow-md" style="background-image: url('{{url('/')}}/image/liquid-cheese.svg');">
        <div class="flex justify-between items-end h-full px-5 py-4">
          <h1 class="text-2xl capitalize font-bold">{{$course['name'] }} <small class="font-thin"> #{{$course['code']}} </small></h1>
          <h5 class="text-2xl capitalize font-bold">{{$course['teacher']['name']}}</h5>
        </div>
      </div>
      <h5 class="text-2xl font-semibold">Module</h5>

       @if(auth()->user()->role=='teacher')
        <form action="{{route('course.add-resource',$course['id'])}}" method="POST" class="flex gap-4 w-full"  enctype="multipart/form-data">
          @csrf
          @method('POST')
          <div class="flex-1 flex flex-col gap-2">
            <input type="text" name="title" id="name" class="w-full rounded-lg shadow-md px-5 py-3 bg-gray-200 text-gray-800" placeholder="Module Name">
            {{-- @if($errors->has('title'))
            <span class="text-red-500 text-sm">{{$errors->first('title')}}</span>
            @endif --}}
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" name="file" type="file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">
            {{-- @if($errors->has('file'))
            <span class="text-red-500 text-sm">{{$errors->first('file')}}</span>
            @endif --}}
          </div>
          <button type="submit" class="bg-blue-700 px-5 py-3 rounded-lg shadow-md text-white">Add Module</button>
        </form>
        @endif

      <div class="flex flex-col gap-4 mt-5">
       
      @foreach($course['resources'] as $resource)
      <x-resource-card href="{{url('storage'.substr($resource['file'],6))}}">
        <p>{{$resource['name']}}</p>
        <p>{{$resource['created_at']}}</p>

      </x-resource-card>
      
      @endforeach
      </div>

    </div>
  </section>
</x-app-layout>