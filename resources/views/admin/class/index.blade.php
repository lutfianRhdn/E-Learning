<x-app-layout>
  <section class="container mx-auto my-5 dark:text-gray-200">

    <h1 class="text-4xl font-bold">Class Management</h1>
      <section class="my-10 ">
        <x-table  message="{{ Session::has('message') ? Session::get('message'): ''}}" module="admin.class">
          <x-slot name="headers">
            <th class="py-3 px-4 text-left">No</th>
            <th class="py-3 px-4 text-left">Name</th>
            <th class="py-3 px-4 text-left">Code</th>
            <th class="py-3 px-4 text-left">Action</th>
          </x-slot>
          <x-slot name="body">
            @forelse ($classes->items() as $index =>$class)
            <tr class="border-t border-blue-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
              <td class="py-3 px-4 text-left whitespace-nowrap">
                {{$index+1}}
              </td>
              <td class="py-3 px-4 text-left whitespace-nowrap">
                {{$class['name']}}
              </td>
              <td class="py-3 px-4 text-left whitespace-nowrap">
                {{$class['code']}}
              </td>
              <td class="py-3 px-4 text-left flex gap-2">
                <x-button
                  as="link"
                  link="{{ route('admin.class.edit', $class['id']) }}"
                  icon="fa-solid fa-pencil"
                  text="Edit"
                />
                <form action="{{ route('admin.class.destroy', $class['id']) }}" method="POST">
                  @csrf
                  @method('DELETE')
                <x-button
                  as="button"
                  icon="fa-solid fa-trash"
                  text="Delete"
                />
                </td>
              </form>
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
            {{$classes->links()}}
          </x-slot>
        </x-table>
      </section>
    
  </section>
</x-app-layout>
