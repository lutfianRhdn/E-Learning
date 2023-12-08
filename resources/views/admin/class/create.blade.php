<x-app-layout>
  <section class="container mx-auto my-5 dark:text-gray-200">

    <h1 class="text-4xl font-bold">Class Management</h1>
      <section class="my-10 ">
        <form action="{{route('admin.class.store')}}" method="POST">
          @csrf
          @method('POST')
          <div class="mb-5"> 

            <x-input-label>
              Class Name
            </x-input-label>
            <x-text-input class="w-full" name="name"/>
          </div>
          <x-primary-button>
            Submit
          </x-primary-button>
        </form>
      </section>
    
  </section>
</x-app-layout>
