<x-app-layout>
<section class="container mx-auto my-5 dark:text-gray-200" >
    <h1 class="text-4xl font-bold">Course Management</h1>
      <section class="my-10 ">
    
        {{-- @include('components.table',['headers'=>$headers, 'rows' => $courses , 'module' => 'admin.course', 'message' => Session::has('message') ? Session::get('message'): '']) --}}
        <x-table  message="{{ Session::has('message') ? Session::get('message'): ''}}" module="admin.course">
          <x-slot name="headers">
            <th class="py-3 px-4 text-left">No</th>
            <th class="py-3 px-4 text-left">Course Name</th>
            <th class="py-3 px-4 text-left">Teacher Name</th>
            <th class="py-3 px-4 text-left"> Code</th>
            <th class="py-3 px-4 text-left">Count of Class</th>

            <th class="py-3 px-4 text-left">Action</th>
          </x-slot>
          <x-slot name="body">
            @forelse ($courses as $index =>$course)
            <tr class="border-t border-blue-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
              <td class="py-3 px-4 text-left whitespace-nowrap">
                {{$index+1}}
              </td>
              <td class="py-3 px-4 text-left whitespace-nowrap">
                {{$course['name']}}
              </td>
              <td class="py-3 px-4 text-left whitespace-nowrap">
                {{$course['teacher']['name']}}
              </td>
              <td class="py-3 px-4 text-left whitespace-nowrap">
                {{$course['code']}}
              </td>
              <td class="py-3 px-4 text-left whitespace-nowrap">
                {{count($course['classes'])}}
              </td>
              <td class="py-3 px-4 text-left flex gap-2" >

                <x-button
                  as="link"
                  link="{{ route('admin.course.edit', $course['id']) }}"
                  icon="fa-solid fa-pencil"
                  text="Edit"
                />

                  <x-button
                  as="link"
                  icon="fa-solid fa-chalkboard"
                  text="Add Class"
                  link="{{ route('admin.course.add-class', $course['id']) }}"
                  />
                </div>
                <form action="{{ route('admin.course.destroy', $course['id']) }}" method="POST">
                  @csrf
                  @method('DELETE')
                <x-button
                  as="button"
                  icon="fa-solid fa-trash"
                  text="Delete"
                />
              </form>
                </td>
              </tr>
            @empty
            <tr>
              <td colspan="4" class="py-3 px-4"> 
                <p class="text-center ">Don't Have any Data</p>
              </td>
            </tr>
            @endforelse
          </x-slot>
          <x-slot name="paginate">
            {{$courses->links()}}
          </x-slot>
        </x-table>
      </section>
   
  </section>
</x-app-layout>
