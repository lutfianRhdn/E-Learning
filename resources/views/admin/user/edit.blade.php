<x-app-layout>
  <section class="container mx-auto my-5 dark:text-gray-200">

    <h1 class="text-4xl font-bold">User Management</h1>
      <section class="my-10 ">
        <form action="{{route('admin.user.update',$user['id'])}}" method="POST">
          @csrf
          @method('PUT')
        

          <div class="mb-5"> 
            <x-input-label>
              Name
            </x-input-label>
            <x-text-input class="w-full" name="name" value="{{$user['name']}}" />
          </div>

          <div class="mb-5"> 
            <x-input-label>
              email
            </x-input-label>
            <x-text-input class="w-full" type="email" required value="{{$user['email']}}" name="email"/>
          </div>

          <div class="mb-5 "> 
            <x-input-label>
              Role
            </x-input-label>
            <x-select-input name="role" >
              <option value="student" {{$user['role'] == 'student' ?'selected' :''}} >Student</option>
            <option value="teacher" {{$user['role'] == 'teacher' ?'selected' :''}}>Teacher</option>
            </x-select-input>
          </div>
            <div class="mb-5 class"> 
            <x-input-label>
              Class Name 
            </x-input-label>
            <x-select-input name="class_id">
              @foreach($classes as $class)
              <option value="{{$class['id']}}" {{$user['class_id'] == $class['id'] ?'selected' :''}}>{{$class['name']}}</option>
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
      const classDiv = document.querySelector('.class');
      if(role.value !='student') classDiv.classList.add('hidden')
      role.addEventListener('change', (e) => {
        if(e.target.value === 'student'){
          classDiv.classList.remove('hidden');
        }else{
          classDiv.classList.add('hidden');
        }
      })

    </script> 
  </x-slot>
</x-app-layout>
