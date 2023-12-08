<x-app-layout>
  <section class="container mx-auto my-5 dark:text-gray-200">

    <h1 class="text-4xl font-bold">User Management</h1>
      <section class="my-10 ">
        <form action="{{route('admin.user.store')}}" method="POST">
          @csrf
          @method('POST')
        

          <div class="mb-5"> 
            <x-input-label>
              Name
            </x-input-label>
            <x-text-input class="w-full" name="name"/>
          </div>

          <div class="mb-5"> 
            <x-input-label>
              email
            </x-input-label>
            <x-text-input class="w-full" type="email" required name="email"/>
          </div>

          <div class="mb-5 "> 
            <x-input-label>
              Role
            </x-input-label>
            <x-select-input name="role" >
              <option value="student">Student</option>
            <option value="teacher">Teacher</option>
            </x-select-input>
          </div>
            <div class="mb-5 class"> 
            <x-input-label>
              Class Name 
            </x-input-label>
            <x-select-input name="class_id">
              <option value="" selected disabled >Select Class</option>
              @foreach($classes as $class)
              <option value="{{$class['id']}}">{{$class['name']}}</option>
              @endforeach
            </x-select-input>
            
          </div>
          <div class="flex gap-5 items-center">

            <x-primary-button>
              Submit
            </x-primary-button>
            <p class="text-blue-600">Note: Password by default is <b>"password"</b></p>
          </div>
        </form>
      </section>
    
  </section>
  <x-slot name="scripts">
    <script>
      const role = document.querySelector('select[name="role"]');
      role.addEventListener('change', (e) => {
        const classDiv = document.querySelector('.class');
        if(e.target.value === 'student'){
          classDiv.classList.remove('hidden');
        }else{
          classDiv.classList.add('hidden');
        }
      })

    </script> 
  </x-slot>
</x-app-layout>
